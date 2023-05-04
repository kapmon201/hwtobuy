<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	$autoload['packages']  = array(APPPATH.'third_party');
	$autoload['libraries'] = array(
								'database', 'session', 'user_agent', 'form_validation');
	$autoload['helper']    = array(
								'url', 'form', 'html', 'text', 'cookie','file','security', 
								'__data', '__template_component', '__string', '__tanggal');
	// 'my', 'tcpdf' 

	$autoload['config']    = array();
	$autoload['language']  = array();
	$autoload['model']     = array();


/* End of file autoload.php */
/* Location: ./application/config/autoload.php */