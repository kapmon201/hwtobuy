
<div class='container deep_container'>

    <?php if($this->session->flashdata('info')): ?>
      <div class="alert alert_index alert-info">   
        <!-- "float: center;-->
        <div style="margin-left:auto;margin-right:auto; font-size:24px;"><strong><?php echo $this->session->flashdata('header'); ?></strong></div>
        <div style="margin-left:auto;margin-right:auto; font-size:18px;"><span><?php echo $this->session->flashdata('info'); ?></span></div>
      </div><!-- /.alert alert-info-->
    <?php endif; ?>

    <?php if($this->session->flashdata('warning')): ?>
      <div class="alert alert_index alert-warning" >
        <div style="margin-left:auto;margin-right:auto; font-size:24px;"><strong><?php echo $this->session->flashdata('header'); ?></strong></div>
        <div style="margin-left:auto;margin-right:auto; font-size:18px;"><span><?php echo $this->session->flashdata('warning'); ?></span></div>
      </div><!-- /.alert alert-warning-->
    <?php endif; ?>

   <?php //if($this->session->flashdata('success')): ?>
      <!-- <div class="alert alert_index alert-success">
        <div style="margin-left:auto;margin-right:auto; font-size:24px;"><strong><echo $this->session->flashdata('header'); ?></strong></div>
        <div style="margin-left:auto;margin-right:auto; font-size:18px;"><span><echo $this->session->flashdata('success'); ?></span></div>
      </div> -->
      
    <?php //endif; ?>

    <?php //if($this->session->flashdata('error')): ?>
      <!-- <div class="alert alert_index alert-error" >
        <div style="margin-left:auto;margin-right:auto; font-size:24px;"><strong><echo $this->session->flashdata('header'); ?></strong></div>
        <div style="margin-left:auto;margin-right:auto; font-size:18px;"><span><echo $this->session->flashdata('info'); ?></span></div>
      </div> -->
    <?php //endif; ?> 

    <?php if(validation_errors()): ?>
      <div class="alert alert-danger" style="margin-left:auto;margin-right:auto; font-size:24px;">
        <strong><h3>Proses Input Data Salah</h3></strong><hr>
        <span><?php echo validation_errors(); ?></span>
      </div><!-- /.alert alert-warning-->
    <?php endif; ?>

