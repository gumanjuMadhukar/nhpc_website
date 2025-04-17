<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| APP CONFIG
|--------------------------------------------------------------------------
*/
$config['site_name'] = 'NHPC';

$config['site_name_short'] = 'NHPC';

// Public Template
$config['template_public'] = "../../themes/template/views/";

// Admin Template
$config['template_admin'] = "admin/";

// Default Login
$config['default_login_action'] = 'dashboard';

// Admin Login Actin
$config['admin_login_action'] = 'admin';

// Default Logout Action
$config['default_logout_action'] = '';

//logo
$config['favicon'] = 'assets/images/favicon.png';
$config['site_logo'] = 'assets/images/logo.png';

defined('DEFAULT_PASSWORD') OR define('DEFAULT_PASSWORD', 'admin123');

defined('CACHE_PATH') OR define('CACHE_PATH', APPPATH .'cache'. DIRECTORY_SEPARATOR);

defined('ADMIN_GROUP') OR define('ADMIN_GROUP', '100');

defined('SUPER_ADMIN_GROUP') OR define('SUPER_ADMIN_GROUP', '2');

defined('ACTIVE') OR define('ACTIVE', '1');

defined('BANNED') OR define('BANNED', '0');