<?php 
$menu = array();
?>

<style type="text/css">
  .content_banner-header{
  background-color: <?php echo $this->session->userdata('color'); ?> !important;
  }
</style>

<body> <!-- data-ng-app='telekonsultasi' -->
  <noscript>
  <div class="alert alert-danger">
  <strong>Oopps...Error</strong><br>
  <span><?php echo preset_message('error_java_script'); ?></span>
  </div>
  </noscript>

<div id='wrap'>
<div id='search_bar' class="navbar navbar-default">
<div class='container'>
  
  <div class="navbar-header">
    <a href="<?php echo base_url(); ?>dashboard.html" class="navbar-brand navbar-brand-default"><img width='70px' src='<?php echo _A_C_I_LOGO.'logo_company.png'; ?>'></a>
    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
  </div>

  <!--
  <button type="button" class="btn btn-primary">Profile <span class="badge badge-success">9</span>
  <span class="sr-only">unread message</span></button>
  -->

  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
    <li>&nbsp;</li>
    </ul>
    <ul class="nav navbar-nav navbar-right"> 
    <li class="dropdown" >
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    &nbsp;
    </a>
    <ul class="dropdown-menu" >
    <li>&nbsp;</li>
    </ul>
    </li>
    </ul>
  </div>

</div>
</div>