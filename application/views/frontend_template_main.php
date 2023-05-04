<?php 
	$data = site_component();
	echo $this->load->view('frontend/header', $data);
	echo $this->load->view('frontend/body', $data);

	$t_side = (!isset($template['t_side'])) ? 0 : $template['t_side'];
	$t_top = (!isset($template['t_top'])) ? 0 : $template['t_top'];

	if($t_side) echo $this->load->view('frontend/navbar_side', $data);
	if($t_top) echo $this->load->view('frontend/navbar_top', $data);

	if(!$t_side && !$t_top) echo $this->load->view('frontend/navbar_top_empty', $data);

	echo $this->load->view('frontend/content', $data);
	echo $this->load->view('frontend/footer', $data); 
?> 