<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*------------------------------------------
 *  Database Primary Contact Center RSHS
 *------------------------------------------
 */


/* 
 * dynamic database config 
 * Base on Config
*/

$active_group = "default";
$active_record = TRUE;
$tnsname = '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.5.181)(PORT = 1521))';
$tnsname .= '(CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = ORCL)))';
$db['default']['hostname'] = $tnsname;

$db['default']['username'] = 'hilmi_sirs';
$db['default']['password'] = 'hilmi_sirs';
$db['default']['database'] = 'HILMI_SIRS';
$db['default']['dbdriver'] = 'oci8';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = FALSE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;




/*


-- home 
$active_group = "default";
$active_record = TRUE;
$tnsname = '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 127.0.0.1)(PORT = 1521))';
$tnsname .= '(CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = xe)))';
$db['default']['hostname'] = $tnsname;
$db['default']['username'] = 'HR1';
$db['default']['password'] = '029@D02m19';
$db['default']['database'] = 'xe';
$db['default']['dbdriver'] = 'oci8';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = FALSE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;


$active_group              = "local";
$active_record             = TRUE;
$tnsname  = 'localhost';
$db['local']['hostname'] = $tnsname;
$db['local']['username'] = 'root';
$db['local']['password'] = '';
$db['local']['database'] = 'hwtobuy';
$db['local']['dbdriver'] = 'mysqli';
$db['local']['dbprefix'] = '';
$db['local']['pconnect'] = FALSE;
$db['local']['db_debug'] = TRUE;
$db['local']['cache_on'] = FALSE;
$db['local']['cachedir'] = '';
$db['local']['char_set'] = 'utf8';
$db['local']['dbcollat'] = 'utf8_general_ci';
$db['local']['swap_pre'] = '';
$db['local']['autoinit'] = TRUE;
$db['local']['stricton'] = FALSE;

$active_group = "default";
$active_record = TRUE;
// $tnsname = '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.5.181)(PORT = 1521))';
// $tnsname .= '(CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = ORCL)))';
$tnsname  = 'localhost';
$db['default']['hostname'] = $tnsname;
$db['default']['username'] = 'root';
$db['default']['password'] = '';
$db['default']['database'] = 'hwtobuy';
$db['default']['dbdriver'] = 'mysqli';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = FALSE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

$active_group = "default";
$active_record = TRUE;
$tnsname = '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 127.0.0.1)(PORT = 1521))';
$tnsname .= '(CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = xe)))';
$db['default']['hostname'] = $tnsname;
$db['default']['username'] = 'admlatihan';
$db['default']['password'] = '201@D02m19';
$db['default']['database'] = 'xe';
$db['default']['dbdriver'] = 'oci8';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = FALSE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

$active_group = "default";
$active_record = TRUE;
$tnsname = '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.5.20)(PORT = 1521))';
$tnsname .= '(CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = ORCL)))';
$db['default']['hostname'] = $tnsname;
$db['default']['username'] = 'admsirs';
$db['default']['password'] = 'chocolate';
$db['default']['database'] = 'ADMSIRS';
$db['default']['dbdriver'] = 'oci8';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = FALSE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;
*/


/* End of file database.php */
/* Location: ./application/config/database.php */
