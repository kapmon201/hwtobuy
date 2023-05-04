<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo (isset($title)) ? $browser_title.' - '.$title : $browser_title ; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo (isset($mini_description)) ? $mini_description : ''; ?>">
    <meta name="author" content="<?php echo (isset($author)) ? $author : ''; ?>">
    <meta name="keywords" content="<?php echo (isset($keyword)) ? $keyword : ''; ?>">
    <meta name="theme-color" content="#D10015">
    <meta name="msapplication-navbutton-color" content="#D10015">
    <meta name="apple-mobile-web-app-status-bar-style" content="#D10015">
    <meta name="robots" content="index,nofollow"> 
    <meta http-equiv="expires" content="Sun, 01 Jan 2014 00:00:00 GMT"/>
    <meta http-equiv="pragma" content="no-cache" />
    <link rel="shortcut icon" href="<?php echo _ROOT; ?>favicon.png" type="image/x-icon"/>
    <link rel="alternate" href="<?php echo _ROOT; ?>" hreflang="id" />

    <link rel="stylesheet" href="<?= _A_LIBS; ?>ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= _A_C_CSS; ?>dashforge.css">
    <link rel="stylesheet" href="<?= _A_C_CSS; ?>dashforge.auth.css">
    <link rel="stylesheet" href="<?= _A_C_CSS; ?>dashforge.profile.css">
    <link rel="stylesheet" href="<?= _A_C_CSS; ?>dashforge.calendar.css">

    <link rel="stylesheet" href="<?= _A_LIBS; ?>sweetalert/css/sweetalert.css">
    <link rel="stylesheet" rel="stylesheet" href="<?= _A_LIBS; ?>dropzone/css/dropzone.css">
    <link href="<?= _A_LIBS; ?>fullcalendar/fullcalendar.min.css" rel="stylesheet">
    
    <script type="text/javascript" src="<?= _A_LIBS; ?>jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?= _A_LIBS; ?>bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?= _A_LIBS; ?>feather-icons/feather.min.js"></script>
    <script type="text/javascript" src="<?= _A_LIBS; ?>perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script type="text/javascript" src="<?= _A_LIBS; ?>angular/angular.js"></script>
    <script type="text/javascript" src="<?= _A_LIBS; ?>sweetalert/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?= _A_LIBS; ?>angular/angular.js"></script>
    <script type="text/javascript" src="<?= _A_C_JS; ?>angular.pagination.js"></script>
    <script type="text/javascript" src="<?= _A_C_JS; ?>angular.text-truncate.js"></script>
    <script type="text/javascript" src="<?= _A_LIBS; ?>dropzone/js/dropzone.js"></script>

    <script type="text/javascript" src="<?= _A_C_JS; ?>ng_event_ppni.js"></script>

    <script type="text/javascript" src="<?= _A_LIBS; ?>prismjs/prism.js"></script>
    <script type="text/javascript" src="<?= _A_LIBS; ?>parsleyjs/parsley.min.js"></script>
    <script type="text/javascript" src="<?= _A_LIBS; ?>jquery-steps/build/jquery.steps.min.js"></script>

    <script type="text/javascript" src="<?= _A_LIBS; ?>moment/min/moment.min.js"></script>
    <script type="text/javascript" src="<?= _A_LIBS; ?>fullcalendar/fullcalendar.min.js"></script>
    <script type="text/javascript" src="<?= _A_LIBS; ?>select2/js/select2.full.min.js"></script>
    
    <script type="text/javascript" src="<?= _A_C_JS; ?>dashforge.js"></script>
    <script type="text/javascript" src="<?= _A_C_JS; ?>dashforge.aside.js"></script>
  </head>

<?php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?>