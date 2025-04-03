<?php
/**
 * An extension of CodeIgniter's base Model class to remove repetition and increase productivity by providing
 * a couple handy methods(powered by CI's query builder), validation-in-model support, event callbacks and more.
 *
 * @author  Jamie Rumbelow <http://jamierumbelow.net>
 * @author  Md Emran Hasan <phpfour@gmail.com>
 * @author  Roni Kumar Saha <roni.cse@gmail.com>
 * @version 2.1
 *
 * @link    http://github.com/jamierumbelow/codeigniter-base-model
 * @link    https://github.com/phpfour/MY_Model
 * @link    https://github.com/ronisaha/ci-base-model
 *
 */

class Rest_model extends CI_Model
{

	protected $deleted_at_key = 'deleted_at';
    protected $deleted_by_key = 'deleted_by';
    protected $_temporary_with_deleted = FALSE;
    protected $_temporary_only_deleted = FALSE;
    private $soft_delete = NULL;

    /**
     * Support for Timestampable
     */
    protected $timestampable;
    protected $created_at_key = 'created_at';
    protected $updated_at_key = 'updated_at';

    /**
     * Support for Blamable
     */
    protected $blamable;
    protected $created_by_key = 'created_by';
    protected $updated_by_key = 'updated_by';
    protected $return_type = 'object';
    protected $_temporary_return_type = NULL;

    /**
     * The various default callbacks available to the model. Each are
     * simple lists of method names (methods will be run on $this).
     */
    protected $before_create = array();
    protected $after_create = array();
    protected $before_update = array();
    protected $after_update = array();
    protected $before_get = array();
    protected $after_get = array();
    protected $before_delete = array();
    protected $after_delete = array();

	protected $event_listeners = array(
        'before_create' => array(),
        'after_create' => array(),
        'before_update' => array(),
        'after_update' => array(),
        'before_get' => array(),
        'after_get' => array(),
        'before_delete' => array(),
        'after_delete' => array(),
    );
    protected $_table = null;
    protected $_user_id = null;
    protected $primary_key = null;


	public function insert_API($_table,$_user_id,$data = array())
	{
		$this->_table = $_table;
		$this->_user_id = $_user_id;
        $this->_get_primary_key();
        // echo $this->_user_id; exit;
        
		// $this->_initialize_event_listeners();
  //       $this->_initialize_schema();
		if (false !== $data = $this->_do_pre_create($data)) {
            $data['created_by'] = $data['updated_by'] =  $this->_user_id;
            $data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');
            $this->db->insert($this->_table, $data);
            // echo $this->primary_key; exit;
            $insert_id = $this->db->insert_id();
            if($insert_id){
                $this->activity_log_insert($insert_id, ($this->primary_key)?$this->primary_key:'id');
            }
            // $this->trigger('after_create', $insert_id);

            return $insert_id;
        }

        return false;
	}

	public function update_API($_table,$_user_id ,$primary_value, $data)
    {
    	$this->_table = $_table;
		$this->_user_id = $_user_id;
        $this->_get_primary_key();
        $data['updated_by'] =  $this->_user_id;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data = $this->audit_log_update($data, ($this->primary_key)?$this->primary_key:'id');

        if ($data !== FALSE)
        {
            $result = $this->db->where($this->primary_key, $primary_value)
                ->set($data)
                ->update($this->_table);

            $this->trigger('after_update', array($data, $result));

            return $result;
        }
        else
        {
            return FALSE;
        }
    }

    private function _get_primary_key(){
        // $query = "SELECT a.attname as primary_key
        //         FROM   pg_index i
        //         JOIN   pg_attribute a ON a.attrelid = i.indrelid
        //                              AND a.attnum = ANY(i.indkey)
        //         WHERE  i.indrelid = 'project_activity_logs'::regclass
        //         AND    i.indisprimary;";

        // $fields = $this->db->query($query)->row_array();

        $this->primary_key =  'id';

    }

    private function _do_pre_update($data)
    {
        $data = $this->validate($data);
        $data = $this->trigger('before_update', $data);

        return $data;
    }

	public function trigger($event, $data = FALSE, $last = TRUE)
    {
        if (isset($this->event_listeners[$event]) && is_array($this->event_listeners[$event])) {
            $data = $this->_trigger_event($this->event_listeners[$event], $data, $last);
        }elseif (isset($this->$event) && is_array($this->$event)){
            $data = $this->_trigger_event($this->$event, $data, $last);
        }

        return $data;
    }

	private function _do_pre_create($data)
    {
        // $data = $this->validate($data);
        $data = $this->trigger('before_create', $data);

        return $data;
    }

    private function _trigger_event($event_listeners, $data, $last)
    {
        foreach ($event_listeners as $method) {
            if (is_string($method) && strpos($method, '(')) {
                preg_match('/([a-zA-Z0-9\_\-]+)(\(([a-zA-Z0-9\_\-\., ]+)\))?/', $method, $matches);

                $method                    = $matches[1];
                $this->callback_parameters = explode(',', $matches[3]);
            }

            $callable = $this->getCallableFunction($method);

            if (!$callable) {
                $this->callback_parameters = array();
                continue;
            }

            $data = call_user_func_array($callable, array($data, $last));
        }

        return $data;
    }

    private function getCallableFunction($method)
    {
        if (is_callable($method)) {
            return $method;
        }

        if (is_string($method) && is_callable(array($this, $method))) {
            return array($this, $method);
        }

        return FALSE;
    }

    public function validate($data)
    {
        // if($this->skip_validation)
        // {
        //     return $data;
        // }

        if(!empty($this->validate))
        {
            foreach($data as $key => $val)
            {
                $_POST[$key] = $val;
            }

            $this->load->library('form_validation');

            if(is_array($this->validate))
            {
                $this->form_validation->set_rules($this->validate);

                if ($this->form_validation->run() === TRUE)
                {
                    return $data;
                }
                else
                {
                    return FALSE;
                }
            }
            else
            {
                if ($this->form_validation->run($this->validate) === TRUE)
                {
                    return $data;
                }
                else
                {
                    return FALSE;
                }
            }
        }
        else
        {
            return $data;
        }
    }

    /* Activty Logs */
    public function activity_log_insert($id, $pk)
    {
        if ($this->_table == 'project_activity_logs')
            return;

        $activity_log = array();
        
        $this->db->where(array($pk => $id));
        $row = $this->db->get($this->_table)->row_array();

        $activity_log['table_name'] = $this->_table;
        $activity_log['table_pk'] = $id;
        $activity_log['action'] = 'insert';

        if (is_object($row))
        {
            $activity_log['user_id'] = $this->_user_id;
            $activity_log['action_dttime'] = $row->created_at;
        }
        else
        {
            $activity_log['user_id'] = $row['created_by'];
            $activity_log['action_dttime'] = $row['created_at'];
        }

        $this->db->insert('project_activity_logs', $activity_log);

        return $row;
    }

    /* Audit Logs */
    public function audit_log_update($row, $pk)
    {
        if ($this->_table == 'project_audit_logs' || $this->_table == 'project_activity_logs')
            return;

        $table_name = $this->_table;

        $activity_log = array();

        $activity_log['table_name'] = $this->_table;
        $activity_log['action'] = 'update';

        if (is_object($row))
        {
            $id = $row->id;
            $table_pk = $row->id;
            $user_id = $row->updated_by;
            $action_dttime = $row->updated_at;

            $activity_log['table_pk'] = $row->id;
            $activity_log['user_id'] = $row->updated_by;
            $activity_log['action_dttime'] = $row->updated_at;

        } 
        else 
        {
            $id = $row['id'];
            $table_pk = $row['id'];
            $user_id = $row['updated_by'];
            $action_dttime = $row['updated_at'];

            $activity_log['table_pk'] = $row['id'];
            $activity_log['user_id'] = $row['updated_by'];
            $activity_log['action_dttime'] = $row['updated_at'];
        }

        // $this->as_array();
        $this->db->where(array($pk=>$row['id']));
        $old_row = $this->db->get($this->_table)->row_array();
        // echo '<pre>'; print_r($row); exit;
        $audit_log = array();

        foreach($row as $key => $value) {
            if (!in_array($key, array('created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'))) {
                if ($value != $old_row[$key]) {
                    $temp = array();
                    $temp['user_id'] = $user_id;
                    $temp['table_name'] = $table_name;
                    $temp['table_pk'] = $id;
                    $temp['column_name'] = $key;
                    $temp['old_value'] = $old_row[$key];
                    $temp['new_value'] = $value;
                    $temp['action_dttime'] = $action_dttime;

                    $audit_log[] = $temp;
                }
            }
        }

        if (count($audit_log) > 0) {
            $this->db->insert_batch('project_audit_logs', $audit_log);
            $this->db->insert('project_activity_logs', $activity_log);
        }
        
        return $row;
    }

}