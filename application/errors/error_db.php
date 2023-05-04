<?php 
  $title = '500';
  $browser_title = 'Internat Server Error';

  if(array_key_exists('HTTP_X_REQUESTED_WITH', $_SERVER) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
    $status_file = 'simple';
  }else{
    $status_file = 'full_html';
    include APPPATH.'views/frontend/header.php'; 
  }
?>

<?php if($status_file=='full_html'): ?>
<div class="content content-fixed content-auth-alt">
  <div class="container ht-100p tx-center">
    <div class="ht-100p d-flex flex-column align-items-center justify-content-center">
      <div class="wd-70p wd-sm-250 wd-lg-300 mg-b-15"><img src="<?= _A_C_I_ERROR; ?>error_general.png" class="img-fluid" alt=""></div>
      <h1 class="tx-color-01 tx-24 tx-sm-32 tx-lg-36 mg-xl-b-5">500 Internal Server Error</h1>
      <h5 class="tx-16 tx-sm-18 tx-lg-20 tx-normal mg-b-20">Oopps. terjadi kesalahan hubungi administrator.</h5>
      <div class="mg-b-40"><a href="#" onclick="window.history.back();" class="btn btn-white bd-2 pd-x-30">Kembali Ke Halaman Sebelumnya</a></div>
      <?php if(DEBUG_MODE=='development'): ?>
      <code><?php echo $message; ?> </code>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php else: ?>
  <?php if(DEBUG_MODE=='development'): ?>
    <?php echo $message; ?> 
  <?php else: ?>
    500 Internal Server Error (Database General)
  <?php endif;?>
<?php endif; ?>