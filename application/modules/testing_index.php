<div class="container"> 
	<div class="auth panel_container" >     
		<div class='panel panel-default'>	
			<div class="panel-body">
				<form method="POST" action="<?php echo base_url(); ?>app/user_testing/index_proc">
					<input class="form-control" 
						type='text' 
						name='u' 
						placeholder="Silahkan Masukan">
					</input>
					<input class="form-control" 
						type='password' 
						name='p' 
						placeholder="Silahkan Masukan">
					</input>
					<input 
						type="submit" 
						name="ok" 
						value='LOGIN' 
						class='form-control btn btn-primary'>
				</form>
			</div>
		</div>
	</div>
</div>

<?php echo $css; ?>