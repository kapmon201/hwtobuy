<?php if(DEBUG_MODE !== 'development'): ?>
	<div style="border:thin solid #ccc;padding:3px;margin:0 5px 10px 0; display:inline-block;border-radius:100%">
		<p style="display:none">Severity: <?php echo $severity; ?></p>
		<p style="display:none">Message:  <?php echo $message; ?></p>
		<p style="display:none">Filename: <?php echo $filepath; ?></p>
		<p style="display:none">Line Number: <?php echo $line; ?></p>
	</div>
<?php else: ?>
	<ul>
		<li>Severity: <?php echo $severity; ?></li>
		<li>Message:  <?php echo $message; ?></li>
		<li>Filename: <?php echo $filepath; ?></li>
		<li>Line Number: <?php echo $line; ?></li>
	</ul>
<?php endif;?>