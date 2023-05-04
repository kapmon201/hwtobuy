<?php $user_data = $this->session->userdata('user_data'); ?>

<header class="navbar navbar-header navbar-header-fixed">
  <div class="navbar-brand">
    <a href="<?php echo base_url(); ?>" class="aside-logo"><img width='130px' src='<?php echo _A_C_I_LOGO.'logo_company.png'; ?>'></a>
  </div>

  <div class="navbar-right">
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
        <div class="dropdown-divider"></div>
        <a href="<?php echo base_url(); ?>auth/logout/frnt" onclick="return confirm('Anda yakin akan mengakhiri session ini?');" class="dropdown-item"><i data-feather="log-out"></i>Sign Out</a>
      </div>
    </div>
  </div>
</header>