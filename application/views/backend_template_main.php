<?php 
	$data = site_component();
	echo $this->load->view('backend/header', $data);
	echo $this->load->view('backend/body');
	echo $this->load->view('backend/search_panel', $data);
	echo $this->load->view('backend/notification_section');
	echo (isset($content)) ? $content : $this->load->view('backend/content');
	echo $this->load->view('backend/footer', $data); 
?>