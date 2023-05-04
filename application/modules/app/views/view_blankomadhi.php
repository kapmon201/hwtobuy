<script type="text/javascript">
	$(document).ready(function() { $(".select2").select2(); });
</script>

<div class='panel panel-default' style="font-size:+1.6">
	<div class="panel-body">
		<div class="row">
			<div class='col-lg-6 col-md-6 col-sm-12 p-0'>
			</div>
			<div class='col-lg-6 col-md-6 col-sm-12 p-0'>
				
				<form id="form_search" action="<?= base_url() ?>app/jadwal/validasi" method="post" style="float: right;">
					<div class="input-group">
						<!-- <input type="text" class="form-control" name="CARI_PASIEN" id="CARI_PASIEN" placeholder="Masukkan Identitas Pasien" required> -->
						<input type="date" class="form-control input-sm" id="TANGGAL" name="TANGGAL" value="<?= date("Y")."-".date("m")."-".date("d") ?>">
						<small class="form-text text-danger"><?= form_error("TANGGAL") ?></small>
					</div>
					<br>
					<input type="submit" name="btn_search" class="btn btn-info" value="Cari">
					<input type="reset" name="btn_reset" class="btn btn-success" value="Reset">
				</form>
			</div>			
		</div>	
		
		<?php if($JADWAL) : ?>
			<div class="table-responsive">
				<table class='table table-hover table-striped'>
					<thead>
						<th>No</th>
						<th>Dokter</th>						
					</thead>
					<tbody>
						<?php
						if (count($JADWAL)==0) : 
							echo "<tr colspan=\"2\">Data Masih Kosong</tr>"; 
						endif;

						$bil=1;
						foreach ($JADWAL as $JADWAL_TEMP) :
						?>
						<tr data-dir-paginate="filter:search | orderBy:sortKey:reverse | itemsPerPage:perpage" current-page='currentpage' pagination-id="prodx">
							<td align="center"><?= $bil++ ?></td>
							<td align="left"><?php echo $JADWAL_TEMP['NM_DOKTER']; ?><div class='text-muted'>hello world</div>
							</td>
						</tr> 
						<?php
						endforeach;
						?>
					</tbody>
				</table>
			</div>

			<dir-pagination-controls pagination-id="prodx" boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="<?php echo base_url().VIEWPATH;?>dir_pagination.tpl.html"></dir-pagination-controls>
		<?php
		endif;
		?>		
	</div>	
</div>

<script type="text/javascript">
	$(document).ready(function(){
		//no_need_waiting();
		$(document).find('#loading_panel_lite').hide();
	});
</script>
