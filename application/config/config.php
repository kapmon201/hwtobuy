<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config_file = parse_ini_file(___CONFIG_FILE);

/*
 *-----------------------------------
 * project configuration
 *-----------------------------------
 *
 */
$project_name = $config_file['project_nick_name'];
$root = "http://".$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

/*
 *-----------------------------------
 * Upload Document configuration
 *-----------------------------------
 *
 */
$doc_root = $_SERVER['DOCUMENT_ROOT'];
$dir = dirname(__DIR__);
$doc_root = str_replace("\\","/",$doc_root);
$dir = str_replace("\\","/",$dir);
$web_dir = str_replace($doc_root,'',$dir);

$config['upload_base']			= $config_file['upload_base'];
$config['upload_base_profile']  = $config_file['upload_base_profile'];
//$config['upload_base_ttd']  	= 'uploads/ttd';
$config['doc_root']				= $web_dir;
$config['upload_root']			= $root.$config_file['upload_base'];

/*
 *-----------------------------------
 * layout configuration
 *-----------------------------------
 *
 */
$config['project_name']			= $config_file['project_name'];
$config['site_title']           = $config_file['site_title'];
$config['browser_title']        = $config_file['company_nick_name'].' &bullet; '.strtoupper($config_file['site_title']);
$config['footer_credit']        = strtoupper($config_file['site_title'])
									. ' <br> Data Terpadu '
									. $config_file['author_nick_name']
									. ' <br> &copy; '
									. date('Y');
									
$config['author']               = $config_file['author_nick_name']
									. ' | '
									. $config_file['company_name'];

$config['description']          = $config_file['description'];
$config['search_description']   = $config_file['search_description'];
$config['mini_description']     = $config_file['mini_description'];

/*
 *-----------------------------------
 * codeigniter base configuration
 *-----------------------------------
 *
 */
$config['base_url']             = "$root"; 
$config['index_page']           = '';
$config['modules_locations']    = array(APPPATH.'modules/' => '../modules/');
$config['uri_protocol']         = 'AUTO';
$config['url_suffix']           = '.html';
$config['language']             = 'english';
$config['charset']              = 'UTF-8';
$config['enable_hooks']         = FALSE;
$config['subclass_prefix']      = 'MY_';
$config['permitted_uri_chars']  = 'a-z 0-9~%.:_\-';
$config['allow_get_array']      = TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger']   = 'c';
$config['function_trigger']     = 'm';
$config['directory_trigger']    = 'd';
$config['log_threshold']        = 1;
$config['log_path']             = '';
$config['log_date_format']      = 'Y-m-d H:i:s';
$config['cache_path']           = '';

$encryption_key = md5($project_name);
$config['encryption_key']       = $encryption_key;
$config['sess_cookie_name']     = $project_name;
$config['sess_expiration']      = $config_file['session_expiration'];
$config['sess_expire_on_close'] = TRUE;
$config['sess_encrypt_cookie']  = FALSE;
$config['sess_use_database']    = FALSE;
$config['sess_table_name']      = 'ci_sessions_'.$project_name;
$config['sess_match_ip']        = FALSE;
$config['sess_match_useragent'] = FALSE;
$config['sess_time_to_update']  = 300;
$config['cookie_prefix']        = "";
$config['cookie_domain']        = "";
$config['cookie_path']          = "/";
$config['cookie_secure']        = FALSE;
$config['global_xss_filtering'] = FALSE;
$config['csrf_protection']      = FALSE;
$config['csrf_token_name']      = 'csrf_test_name';
$config['csrf_cookie_name']     = 'csrf_cookie_name';
$config['csrf_expire']          = 7200;
$config['compress_output']      = FALSE;
$config['time_reference']       = 'gmt';
$config['rewrite_short_tags']   = FALSE;
$config['proxy_ips']            = '';

$data_ext = explode(',', trim($config_file['docs_allow_ext']));
$config['allow_ext'] = array();
foreach($data_ext as $value){
	array_push($config['allow_ext'], trim($value));
}

$config['banner_message'] = array(
	'auth_uname' => $config_file['auth_msg_banner_uname'],
	'auth_pass' => $config_file['auth_msg_banner_pass'],
);

$config['data_page_size'] = 10;

/*
 *-----------------------------------
 * constant
 *-----------------------------------
 * constanta dibagi menjadi beberapa bagian utama :
 * 1. assets
 * 2. proses (modules sistem)
 * 3. ajax (modules ajax_request)
 *
 */
define('_DB_MODE', $config_file['db_mode']);
define('_PROJECT_NAME', $config_file['project_name']);
define('_MAINTENANCE', $config_file['maintenance']);
define('_MODE_ONLINE', $config_file['mode_online']);
define('_CODE_AKSES_DEFAULT', $config_file['code_akses_default']);
define('_CODE_AKSES_OPEN_DEFAULT', $config_file['code_akses_open_default_md5']);

define('_COMPANY_NICK_NAME', $config_file['company_nick_name']);
define('_COMPANY_NAME', $config_file['company_name']);

/* template builder */
define('_FOOTER', $config_file['footer']);
define('_SCROLL_TOP', $config_file['scroll_top']);
define('_RUNNING_TEXT', $config_file['running_text']);
define('_LOGO_AUTHOR', $config_file['logo_author']);
define('_LOGO_COMPANY_1', $config_file['logo_company_1']);
define('_LOGO_COMPANY_2', $config_file['logo_company_2']);
define('_LOGO_COMPANY_3', $config_file['logo_company_3']);
define('_LOGO_COMPANY_4', $config_file['logo_company_4']);
define('_LOGO_COMPANY_5', $config_file['logo_company_5']);
define('_LOADING_BAR_SIDE', $config_file['loading_bar_side']);

/* admin access */
define('_ADMIN_DIRECT', $config_file['admin_direct_akses']);
define('_LIVE_CHAT', $config_file['live_chat']);
define('_ADMIN_ACCESS', $config_file['admin_access']);
define('_ACCESS', $config_file['access_']);
define('_ADMIN_ID', $config_file['admin_id']);

/* lokasi asset */
define('_ROOT', $root);
define('_UPLOAD', $root.'upload/');
define('_UPLOAD_BUKTI', $root.'public/');
define('_ASSETS', $root.'assets/');
define('_A_COMPONENT', _ASSETS.'component/');

define('_A_C_CSS', _A_COMPONENT.'css/');
define('_A_C_IMAGES', _A_COMPONENT.'images/');
define('_A_C_I_BACKGROUND', _A_C_IMAGES.'background/');
define('_A_C_I_CARD', _A_C_IMAGES.'card/');
define('_A_C_I_ERROR', _A_C_IMAGES.'error/');
define('_A_C_I_LOADER', _A_C_IMAGES.'loader/');
define('_A_C_I_LOGO', _A_C_IMAGES.'logo/');
define('_A_C_JS', _A_COMPONENT.'js/');
define('_A_LIBS', _ASSETS.'libs/');
define('_A_MODULES', _ASSETS.'modules/');
define('_A_JOBBOARD', _A_COMPONENT.'jobboard/');
define('_A_BUILD_PROFILE', _A_COMPONENT.'build_profile/');

define('_ASSETSCSSHILMI', _ASSETS.'css_hilmi/');
define('_ASSETSJSHILMI', _ASSETS.'js_hilmi/');
define('_ASSETSIMAGESHILMI', _ASSETS.'images_hilmi/');

/**
 * - component
 * 		-- css
 * 		-- images
 * 			-- alphabets
 *			-- background
 *			-- card
 *			-- error
 *			-- loader
 *			-- logo
 * 		-- font
 * 		-- js
 * - lib
 * - modules
 */

define('_UPLOAD_ROOT', $config['upload_root']);
define('_INPUT_SISTEM', false);
define('_DATE_FORMAT', date('d').'-'.date('m').'-'.date('Y'));

/* End of file config.php */
/* Location: ./application/config/config.php */
