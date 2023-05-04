<?php
$this->load->library('user_agent');
/*
$level_akses = $this->session->userdata('level_akses'); 
$is_admin = ($this->session->userdata('is_admin') && $this->session->userdata('is_admin') == 1) ? true : false;
$check_menu_level = ($is_admin) ? false : true;
$level_akses =  (empty($level_akses)) ? _CODE_AKSES_DEFAULT : $level_akses;
$menu = get_menu(array('id_code_akses' => $level_akses));
$access = $this->session->userdata("access_");
$no_medrek = $this->session->userdata('no_medrek');
if(isset($_SESSION['no_medrek'])){ // Jika session username ada berarti dia sudah login
  header("location: welcome.php"); // Kita Redirect ke halaman welcome.php
}
*/

$menu = array();
if ($user_login) :
  foreach ($user_login as $user_login) :

  endforeach;
endif;
?>

<style type="text/css">
  /*
  .content_banner-header {
    background-color: php echo $this->session->userdata('color'); ?> !important;
  }
  */
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
          <a href="<?php echo base_url(); ?>dashboard.html" class="navbar-brand navbar-brand-default"><img width='70px' src='<?php echo _A_C_I_LOGO . 'logo_company.png'; ?>'></a>
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <!--<button type="button" class="btn btn-primary">Profile <span class="badge badge-success">9</span>
      <span class="sr-only">unread message</span></button>-->

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li>
              <a href='<?php echo base_url(); ?>'>Home</a>
            </li>

            <li>
              <a href='<?= base_url() . "app/latang" ?>'>Angular</a>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Dropdown<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?= base_url() ?>app/validasi/dokter_irjopridx">Dokter Val</a>
                  <!-- <a href="http://resume.rshs.or.id/login/logout" onclick="return confirm('Anda yakin akan logout dari session login anda ?');">
                    <span class="glyphicon glyphicon-off"></span> Logout</a> -->
                </li>
                <li>
                  <a href="<?= base_url() ?>app/validasi/dokter_oprtermin">Termin</a>
                </li>
                <li>
                  <a href="<?= base_url() ?>app/user/kelola">User Aplikasi</a>
                </li>
                <li>
                  <a href="<?= base_url() ?>app/konfigurasi">Konfigurasi</a>
                </li>
              </ul>
            </li>

          </ul>



          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-off"></span> Dropdown<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?= base_url() ?>app/validasi/dokter_irjopridx"> Dokter Val</a>
                  <!-- <a href="http://resume.rshs.or.id/login/logout" onclick="return confirm('Anda yakin akan logout dari session login anda ?');">
                    Logout</a> -->
                </li>
                <li>
                  <a href="<?= base_url() ?>app/validasi/dokter_oprtermin">Termin</a>
                </li>
                <li>
                  <a href="<?= base_url() ?>app/user/kelola">User Aplikasi</a>
                </li>
                <li>
                  <a href="<?= base_url() ?>app/konfigurasi">Konfigurasi</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>


      </div>
    </div>