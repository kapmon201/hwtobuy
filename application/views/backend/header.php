<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo (isset($title)) ? $browser_title . ' - ' . $title : $browser_title; ?></title>
  <meta charset="utf-8">
  <meta name="description" content="<?php echo $mini_description; ?>">
  <meta name="author" content="<?php echo $author; ?>">
  <meta name="keywords" content="<?= $keyword; ?>">
  <meta name="theme-color" content="#4C8AFF">
  <meta name="msapplication-navbutton-color" content="#4C8AFF">
  <meta name="apple-mobile-web-app-status-bar-style" content="#4C8AFF">
  <meta name="robots" content="index,nofollow">
  <meta http-equiv="expires" content="Mon, 01 Jan 2024 00:00:00 GMT" />
  <meta http-equiv="pragma" content="no-cache" />
  <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" type="image/x-icon" />
  <link rel="alternate" href="<?= base_url(); ?>" hreflang="id" />

  <link rel="stylesheet" href="<?= _A_C_CSS; ?>ampt.bootstrap.css">
  <link rel="stylesheet" href="<?= _A_C_CSS; ?>tab_view.css">
  <link rel="stylesheet" href="<?= _A_C_CSS; ?>ampt.default.css?ca=<?php echo date('dmY'); ?>">

  <link rel="stylesheet" href="<?= _A_LIBS; ?>sweetalert/css/sweetalert.css">
  <link rel="stylesheet" href="<?= _A_LIBS; ?>dropzone/css/dropzone.css">
  <link rel="stylesheet" href="<?= _A_LIBS; ?>chosen/css/chosen.min.css">
  <link rel="stylesheet" href="<?= _A_LIBS; ?>magic_zoom/magiczoomplus.css">
  <link rel="stylesheet" href="<?= _A_C_CSS; ?>jquery-select2.css">
  <link rel="stylesheet" href="<?= _A_LIBS; ?>autocomplete/angucomplete-alt.css">
  <link rel="stylesheet" href="<?= _A_C_CSS; ?>rotating-card.css">

  <!--<link href="stylesheet" href="< _A_COMPONENT; ?>icon/pe-icon-7-stroke.css" rel="stylesheet" />-->

  <link rel="image_src" href="<?= _A_LIBS; ?>chosen/css/chosen-sprite.png">

  <!--<script type="text/javascript" src="< _A_LIBS; ?>jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="< _A_C_JS; ?>min.js/jquery.min.js"></script>-->

  <!-- Non active by Hilmi 


    -->


  <script type="text/javascript" src="<?= _A_C_JS; ?>jquery.js"></script>
  <script type="text/javascript" src="<?= _A_C_JS; ?>jquery-ui.js"></script>
  <script type="text/javascript" src="<?= _A_C_JS; ?>bootstrap.js"></script>
  <script type="text/javascript" src="<?= _A_LIBS; ?>dropzone/js/dropzone.js"></script>
  <script type="text/javascript" src="<?= _A_LIBS; ?>sweetalert/js/sweetalert.min.js"></script>
  <script type="text/javascript" src="<?= _A_LIBS; ?>tinymce/tinymce.min.js"></script>
  <script type="text/javascript" src="<?= _A_LIBS; ?>magic_zoom/test.js"></script>
  <script type="text/javascript" src="<?= _A_C_JS; ?>angular.js"></script>
  <script type="text/javascript" src="<?= _A_LIBS; ?>angular/jquery.mask.min.js"></script>
  <script type="text/javascript" src="<?= _A_C_JS; ?>choosen/chosen.jquery.min.js"></script>
  <script type="text/javascript" src="<?= _A_C_JS; ?>choosen/angular-chosen.js"></script>
  <script type="text/javascript" src="<?= _A_C_JS; ?>angular.text-truncate.js"></script>
  <script type="text/javascript" src="<?= _A_C_JS; ?>angular.pagination.js"></script>
  <script type="text/javascript" src="<?= _A_C_JS; ?>min.js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?= _A_C_JS; ?>jquery-select2.min.js"></script>
  <script type="text/javascript" src="<?= _A_LIBS; ?>autocomplete/angucomplete-alt.js"></script>
  <script type="text/javascript" src="<?= _A_C_JS; ?>tab_view_js.js"></script>
  <script type="text/javascript" src="<?= _A_C_JS; ?>colors/jscolor.js"></script>
  <script type="text/javascript" src="<?= _A_C_JS; ?>ng_telekonsultasi.js"></script>

  <!--
    <script type="text/javascript" src=" _A_LIBS; ?>jquery-ui/js/jquery-ui.js"></script>
    <script type="text/javascript" src="< _A_LIBS; ?>bootstrap/js/bootstrap.js"></script>
    -->


</head>

<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>