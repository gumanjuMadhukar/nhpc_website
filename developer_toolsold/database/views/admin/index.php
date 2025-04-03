<div class="page-aside-fixed page-aside-left">
  <div class="page-aside" style="position:  absolute;padding-top: 0px;margin: 0px;top: 0px; bottom: 0px; height:calc(100%)">
    <div class="page-aside-switch">
      <i class="icon wb-chevron-left" aria-hidden="true"></i>
      <i class="icon wb-chevron-right" aria-hidden="true"></i>
    </div>

    <div class="page-aside-inner page-aside-scroll">
      <div data-role="container">
        <div data-role="content">
          <section class="page-aside-section">
            <h5 class="page-aside-title">Tables</h5>
            <div class="list-group">
              <!-- <a class="list-group-item list-group-item-action active" href="javascript:void(0)"><i class="icon wb-dashboard" aria-hidden="true"></i>Overview</a> -->
              <a class="list-group-item" href="javascript:void(0)" onclick="get_new_table_form()"><i class="icon wb-plus-circle" aria-hidden="true"></i>New Table</a>
              <?php foreach ($tables as $key => $value) {?>
                <a class="list-group-item" href="javascript:void(0)" onclick="get_table_record('<?php echo $value?>')"><i class="icon wb-align-justify" aria-hidden="true"></i><?php echo $value?></a>
              <?php }?>
              
            </div>
          </section>
        </div>
      </div>
    </div>
    <!---page-aside-inner-->
  </div>

  <div class="page-main">
    <div class="page-header">
      <h1 class="page-title"><?php echo $header?></h1>
    </div>
    <div class="page-content" id="database-content" style=" padding-bottom: 0px;">
      
    </div>
  </div>
  
</div>

<script type="text/javascript">
  function get_table_record(table) {
    $.post('<?php echo site_url("admin/Database/get_table")?>',{ table:table }, function(data) {
      $('#database-content').html(data);
    },'html');
  }
</script>

<script type="text/javascript">
  function get_new_table_form() {
    $.post('<?php echo site_url("admin/Database/get_table_form")?>',{}, function(data) {
      $('#database-content').html(data);
    },'html');
  }
</script>