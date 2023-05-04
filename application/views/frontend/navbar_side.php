<aside class="aside aside-fixed">
  <div class="aside-header">
    <a href="<?php echo base_url(); ?>dashboard.html" class="aside-logo"><img width='130px' src='<?php echo _A_C_I_LOGO.'logo_company.png'; ?>'></a>
    <a href="" class="aside-menu-link">
      <i data-feather="menu"></i>
      <i data-feather="x"></i>
    </a>
  </div>
  <div class="aside-body">
    <ul class="nav nav-aside">
      <li class="nav-item"><a title="" href="<?php echo base_url(); ?>index" class="nav-link"><i data-feather="home"></i> <span>Beranda</span></a></li>

      <li class="nav-label mg-t-25">Halaman Register</li>
      <li class="nav-item"><a title="" href="<?php echo base_url(); ?>anggota/register" class="nav-link"><i data-feather="user-plus"></i> <span>Daftar Akun Anggota</span></a></li>
      <li class="nav-item"><a title="" href="<?php echo base_url(); ?>event_organizer/register" class="nav-link"><i data-feather="user-plus"></i> <span>Daftar Akun EO</span></a></li>

      <li class="nav-label mg-t-25">Halaman Login</li>
      <li class="nav-item"><a title="" href="<?php echo base_url(); ?>anggota/login" class="nav-link"><i data-feather="log-in"></i> <span>Akun Anggota</span></a></li>
      <li class="nav-item"><a title="" href="<?php echo base_url(); ?>event_organizer/login" class="nav-link"><i data-feather="log-in"></i> <span>Akun EO</span></a></li>

      <li class="nav-label mg-t-25">Login Manajemen</li>
      <li class="nav-item"><a title="" href="<?php echo base_url(); ?>admin" class="nav-link"><i data-feather="award"></i> <span>Akun Manajemen</span></a></li>

      <li class="nav-label mg-t-25">Bantuan</li>
      <?php if(_LIVE_CHAT): ?>
      <li class="nav-item"><a title="" href="#" class="nav-link"><i data-feather="message-circle"></i> <span>Live Chat Helpdesk</span></a></li>
      <?php endif; ?>
      <li class="nav-item"><a title="" href="<?php echo base_url(); ?>hubungi_kami" class="nav-link"><i data-feather="help-circle"></i> <span>Hubungi Kami</span></a></li>
      <!-- <li class="nav-item"><a title="" href="#" class="nav-link"><i data-feather="git-pull-request"></i> <span>Tentang Kami</span></a></li> -->

      <li class="nav-label mg-t-25">Tautan</li>
      <li class="nav-item"><a title="" href="http://ppnijabar.or.id" class="nav-link"><i data-feather="home"></i> <span>PPNI Jawa Barat</span></a></li>

    <?php if(_MODE_ONLINE!=='live'): ?>
      <li class="nav-label mg-t-80">Development</li>
      <li class="nav-item"><a target="_blank" href="<?php echo base_url(); ?>__base_aplikasi/auth/all_session" class="nav-link"><i data-feather="check-circle"></i> <span>All SESSION</span></a></li>

      <li class="nav-label mg-t-5">Apps Status</li>
      <li class="nav-item"><a title="" href="#" class="nav-link"><i data-feather="check-circle"></i><span><?php echo strtoupper(_MODE_ONLINE); ?></span></a></li>
      <li class="nav-item"><a title="" href="#" class="nav-link"><i data-feather="database"></i><span><?php echo strtoupper(_DB_MODE); ?></span></a></li>
    <?php endif; ?>
    </ul>
  </div>
</aside>