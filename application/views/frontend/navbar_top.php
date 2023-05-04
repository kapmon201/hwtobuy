<?php $user_data = $this->session->userdata('user_data'); ?>

<header class="navbar navbar-header navbar-header-fixed">
  <a href="" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
  <div class="navbar-brand">
    <a href="<?php echo base_url(); ?>" class="aside-logo"><img width='130px' src='<?php echo _A_C_I_LOGO.'logo_company.png'; ?>'></a>
  </div>
  <div id="navbarMenu" class="navbar-menu-wrapper">
    <div class="navbar-menu-header">
      <a href="<?php echo base_url(); ?>" class="aside-logo"><img width='130px' src='<?php echo _A_C_I_LOGO.'logo_company.png'; ?>'></a>
      <a id="mainMenuClose" href=""><i data-feather="x"></i></a>
    </div>
    <ul class="nav navbar-menu">
      <li class="nav-label pd-l-20 pd-lg-l-25 d-lg-none">Main Navigation</li>

      <?php if($user_data['mode_akses'] == 'anggota'): ?>
        <li class="nav-item"><a href="<?php echo base_url(); ?>index" class="nav-link"><i data-feather="pie-chart"></i> Beranda</a></li>
        <!-- <li class="nav-item"><a href="<?php echo base_url(); ?>anggota/history" class="nav-link"><i data-feather="box"></i> Riwayat Event</a></li> -->
        <li class="nav-item"><a href="<?php echo base_url(); ?>anggota/event" class="nav-link"><i data-feather="box"></i> List Kegiatan</a></li>
        <!-- <li class="nav-item"><a href="<?php echo base_url(); ?>anggota/kalender" class="nav-link"><i data-feather="archive"></i>Kalender Event</a></li> -->
      <?php endif; ?>


    
    </ul>
  </div>


  <div class="navbar-right">
    <div class="dropdown dropdown-notification">
      <a href="" class="dropdown-link new-indicator" data-toggle="dropdown">
        <i data-feather="bell"></i>
        <!-- <span>2</span> -->
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-header">Notifications</div>
        <a href="" class="dropdown-item">
          <div class="media">
            <!-- <div class="avatar avatar-sm avatar-online"><img src="../https://via.placeholder.com/350" class="rounded-circle" alt=""></div> -->
            <div class="media-body mg-l-15">
              <p>Tidak Ada Notifikasi Untuk Anda</p>
            </div>
          </div>
        </a>
        <div class="dropdown-footer"><a href="">View all Notifications</a></div>
      </div>
    </div>

    <div class="dropdown dropdown-profile">
      <a href="" class="dropdown-link" data-toggle="dropdown" data-display="static">
        <div class="avatar avatar-sm">
          <?php if($user_data['profile_picture']): ?>
          <img src="<?php echo base_url(); ?>public/profiles/<?php echo $user_data['profile_picture']; ?>" class="rounded-circle" alt="">
          <?php else: ?>
          <img src="<?php echo base_url(); ?>assets/component/images/persons/avatar.png" class="rounded-circle" alt="">
          <?php endif; ?>
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-right tx-13">
        <div class="avatar avatar-lg mg-b-15">
          <?php if($user_data['profile_picture']): ?>
          <img src="<?php echo base_url(); ?>public/profiles/<?php echo $user_data['profile_picture']; ?>" class="rounded-circle" alt="">
          <?php else: ?>
          <img src="<?php echo base_url(); ?>assets/component/images/persons/avatar.png" class="rounded-circle" alt="">
          <?php endif; ?>
        </div>
        <h6 class="tx-semibold mg-b-5"><?php echo $user_data['nama']; ?></h6>
        <p class="mg-b-25 tx-12 tx-color-03"><?php echo $user_data['email']; ?></p>
        <a href="<?php echo base_url(); ?>index/profile/<?php echo $user_data['id_person']; ?>" class="dropdown-item"><i data-feather="edit-3"></i> Edit Profile</a>
        <div class="dropdown-divider"></div>
        <a href="http://www.ppnijabar.or.id/visi-dan-misi/#contact_standart" class="dropdown-item"><i data-feather="help-circle"></i> Help Center</a>
        <a href="<?php echo base_url(); ?>auth/logout/frnt" onclick="return confirm('Anda yakin akan mengakhiri session ini?');" class="dropdown-item"><i data-feather="log-out"></i>Sign Out</a>
      </div>
    </div>
  </div>
</header>