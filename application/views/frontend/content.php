<div class="content ht-100v pd-0">
	<div class="content-header d-none d-sm-block"></div>
	<?php if($template['t_top']==0): ?>
	<div class='d-block d-sm-none'>
		<div class='h-75 d-inline-block'><br><br><br></div>
	</div>
	<?php endif; ?>
	<?php echo (!empty($content)) ? $content : ''; ?>
</div>