       </div>
    </div>

    
      <!-- loading bar kiri 
      <div id='loading_panel' class='hidden-print'>
          <img src='<?php echo _A_C_I_LOADER; ?>dot_color.gif'/> 
          <a href='#' class='cancel_ajax'> 
            <span class='glyphicon glyphicon-remove'></span>
          </a>
      </div>-->
    

       <!--loading bar tengah -->
      <div id='loading_panel_lite' class='hidden-print'>
          <img src='<?php echo _A_C_I_LOADER; ?>dot_bar.gif'/> Mohon Menunggu  
          <small>
            <a data-ng-click='abort_ajax()' class='btn btn-xs btn-link'>
              <span class='glyphicon glyphicon-remove'></span> Batalkan
            </a>
          </small>
      </div>

      <!-- loading overlay 
      <div id='loading-overlay-layer' class='hidden-print'>
        <div class="progress progress-striped progress-bar-warning active">
          <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
            <span class="sr-only">Loading</span>
          </div>
        </div>
      </div>-->

      <!-- modal -->
      <div id="modal" class="modal fade hidden-print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
          </div>
        </div>
      </div>

    <?php if(_SCROLL_TOP): ?>
      <div class='scroll_top hidden-print'>
        <a id='to-top' href='javascript:void(0);'><span class='glyphicon glyphicon-chevron-up'></span></a>
      </div>
    <?php endif; ?>
    
    <?php if(_RUNNING_TEXT): ?>
      <div class='running_text'></div>
    <?php endif;?>

    <?php if(_FOOTER): ?>
      <div id="footer" class='hidden-print hidden-md hidden-sm hidden-xs'>
        <div class="container">
          <div class='pull-left'>
            <p class="text-muted credit">
              <?php if(_LOGO_AUTHOR): ?>
                <img height='46px;' title='' alt='' src='<?php echo _A_C_I_LOGO; ?>sirs_logo_transparent-xs.png' style='margin-right: 10px;'/>
              <?php endif; ?>
            </p>
          </div>
          <div></div>
          <div class="pull-right">
            <p class="credit">
            <?php if(_LOGO_COMPANY_1): ?>
              <img height='46px;' title='' alt='' src="<?= _A_C_I_LOGO; ?>logo_title.png">
            <?php endif; ?>  
            
            <?php if(_LOGO_COMPANY_2): ?>
              <img height='46px;' title='' alt='' src='<?= _A_C_I_LOGO; ?>logo_footer2.png'/>
            <?php endif; ?>  

            <?php if(_LOGO_COMPANY_3): ?>
              <img height='46px;' title='' alt='' src='<?= _A_C_I_LOGO; ?>logo_footer3.png'/>
            <?php endif; ?>  
            
            <?php if(_LOGO_COMPANY_4): ?>
              <img height='46px;' title='' alt='' src='<?= _A_C_I_LOGO; ?>logo_footer4.png'/>
            <?php endif; ?>  

            <?php if(_LOGO_COMPANY_5): ?>
              <img height='46px;' title='' alt='' src='<?= _A_C_I_LOGO?>logo_footer5'/>
            <?php endif; ?>  
            </p>
          </div>
          <p class="credit hidden-xs hidden-sm text-muted credit"><?php echo $footer; ?></p>
        </div>
      </div>
    <?php endif; ?>

      <!-- loading custom -->
      <div id='loading_custom'></div>
      <div id='loading_custom_detail'></div>
  </body>
</html>

<script type="text/javascript" src="<?php echo _A_C_JS; ?>default.js"></script>
<!--<script type="text/javascript">
  set_base_url('<?php echo base_url(); ?>');
</script>-->

