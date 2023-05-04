<?php if(isset($content_search) && !is_bool($content_search)): ?>
	<div id='search_bar' class="content_banner-search hidden-print">
		<div class='container'>
			<?php echo $content_search; ?>
		</div>
	</div>
	<div class='clearfix'></div>
<?php endif; ?>

<div class="content_banner-header hidden-print">
	<div class='container'>
		<?php $aplikasi = _PROJECT_NAME.' <small><sup class="label label-danger">'.ENVIRONMENT.'</sup></small><br>'._COMPANY_NAME; ?>
		<?php if(isset($content_banner)): ?>
			<?php echo $content_banner; ?>
		<?php else: ?>
			<h3><?php echo $aplikasi; ?></h3>
		<?php endif; ?>
	</div>
</div>
<div class='clearfix'></div>