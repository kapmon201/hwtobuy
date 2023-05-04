<!-- <div class='panel panel-default'>
	<div class="panel-body">
		<div class="row">
				<div class='col-lg-6 col-md-6 col-sm-12 p-0'>
				</div>
				<div class='col-lg-6 col-md-6 col-sm-12 p-0'>
						form
				</div>
		</div>
	</div>
</div> -->

<div class='panel panel-default'>
	<div class="panel-body">

		<table width="100%">
			<tr>
				<td align="center">
					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert_index alert-success">
							<div class="row d-flex justify-content-center" justify-content-center style="margin-left:auto;margin-right:auto; font-size:24px;"><strong><?php echo $this->session->flashdata('header'); ?></strong></div>
							<div style="margin-left:auto;margin-right:auto; font-size:18px;"><span><?php echo $this->session->flashdata('success'); ?></span></div>
						</div>
					<?php endif; ?>
				</td>
			</tr>
		</table>

		<table width="100%">
			<tr>
				<td align="center">
					<?php if ($this->session->flashdata('error')) : ?>
						<div class="alert alert_index alert-error">
							<div class="row d-flex justify-content-center" justify-content-center style="margin-left:auto;margin-right:auto; font-size:24px;"><strong><?php echo $this->session->flashdata('header'); ?></strong></div>
							<div style="margin-left:auto;margin-right:auto; font-size:18px;"><span><?php echo $this->session->flashdata('error'); ?></span></div>
						</div>
					<?php endif; ?>
				</td>
			</tr>
		</table>

		<div class="row">
			<div class='col-lg-6'>
				&nbsp;
			</div>
			<div class='col-lg-6'>
				&nbsp;
			</div>
			<div class='clearfix'></div>
		</div>

		<div class="row">
			<div id="wrapper">
				<div id="content-wrapper" class="d-flex flex-column">
					<div id="content">
						<div class='col-lg-8'>
							<div class='panel panel-default' data-ng-controller='latang_controller' data-ng-init='awal(); base_url="<?= base_url(); ?>"'>
								<div class='panel-body'>

									<span>Hello World</span>
									<?= live_search_text('data-ng-model="search_kategori"', 'data-ng-model="perpage_pegawai" data-ng-init="perpage_pegawai=5;currentpage_pegawai=1"'); ?>

									<table class="table table-striped table-hover table-condensed">
										<thead>
											<tr>
												<th class="wid64 bgcl-blue50">Aksi</th>
												<th class="wid128 bgcl-blue50">Nama</th> <!-- fnt8 -->
												<th class="wid64 bgcl-blue50">Status</th>
												<th class="wid96 bgcl-blue50">Hak Akses</th>
											</tr>
										</thead>
										<tbody data-ng-init="ambil(); ambil_ref()"> <!-- getData(); getData_depo() -->
											<tr data-ng-if='semua.length < 1'>
												<td class='empty-row' colspan='4'>
													Data belum ada.
												</td>
											</tr>
											<tr data-ng-if="val.ID_PRIVILEGE !== '0'" data-dir-paginate="val in semua | filter:search_kategori | orderBy:sortKey:reverse | itemsPerPage:perpage_pegawai" current-page='currentpage_pegawai' pagination-id="prodx_kategori">
												<td> <!-- class="align_center" -->
													<a data-ng-click='hapus(val.ID_ADADOKSUSER);' class='btn btn-xs btn-danger' title='Hapus'><b>X</b></a>
													&bullet;
													<a data-ng-click='ambil(val.ID_ADADOKSUSER);' class='btn btn-xs btn-warning' title='Update'><b>Detail</b></a>
												</td>
												<td>
													<!-- <small class=""> -->
													{{val.NAMA | lowercase}} <br>
													{{val.NIP2 | lowercase}} <br>
													<a>{{val.TGL_INSERT}}</a> <br>
													<span class='red'>{{val.TGL_INSERTFORMATTED | timeAgo}}</span> <br>

													<b data-ng-if="val.ID_STATUS == '1'" class='btn btn-xs btn-primary'>{{val.ID_ADADOKSUSER}}</b>
													<span data-ng-if="val.ID_STATUS !== '1'">{{val.ID_ADADOKSUSER}}</span>

												</td>
												<td>
													{{val.ID_PRIVILEGE}}
													<!--
													<input class='wid50 align_center' type='text' data-ng-model='val.ID_DEPO'>
													<a class="btn btn-xs btn-warning fnt8" data-ng-click='toogleStatus_normal(val.NIP, "ID_DEPO", val.ID_DEPO);'>Update</a>
													<br><small class="">{{val.NAMA_DEPO | uppercase}}</small>
													-->
												</td>
												<td>
													<label class="switch_toogle">
														<input type="checkbox" data-ng-click='toggle(val.ID_ADADOKSUSER, "id_status", val.ID_STATUS);' data-ng-model='id_status' data-ng-checked="val.ID_STATUS=='1'" name='show' value='1'>
														<div class="slider round"></div>
													</label>
												</td>
											</tr>
										</tbody>
									</table>

									<dir-pagination-controls pagination-id="prodx_kategori" boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="<?php echo base_url() . VIEWPATH; ?>dir_pagination.tpl.html"></dir-pagination-controls>

								</div>
							</div>
						</div>
						<div class='col-lg-4'>
							<div class='panel panel-default' data-ng-controller='latang_controller' data-ng-init='awal(); base_url="<?= base_url(); ?>"'>
								<div class='panel-body'>

									<div class="mrgbt10">
										<div class="input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></span>
											<input autofocus="" data-ng-model="nip" type="text" class="form-control ng-pristine ng-valid ng-empty ng-touched" placeholder="Masukan NIP">
										</div>
									</div>

									<div class="mrgbt10">
										<div class="input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></span>
											<input autofocus="" data-ng-model="nip2" type="text" class="form-control ng-pristine ng-valid ng-empty ng-touched" placeholder="Masukan NIP2">
										</div>
									</div>

									<div class="mrgbt10">
										<div class="input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
											<input autofocus="" data-ng-model="nama" type="text" class="form-control ng-pristine ng-valid ng-empty ng-touched" placeholder="Masukan Nama">
										</div>
									</div>

									<div class="mrgbt10">
										<div class="input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
											<select class='form-control' data-ng-model='id_depo'> <!--  fnt11 -->
												<option value="">Pilih Privilege</option>
												<option data-ng-repeat='hasil_ref in ambil_ref' data-ng-value='hasil_ref.ID'>{{hasil_ref.NAMA | lowercase}}</option>
											</select>
										</div>
									</div>

									<div class="mrgbt10">
										<div class="input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
											<input class='form-control' data-ng-model='tgl_expired' type="date">
										</div>
									</div>

									<div class="mrgbt10">
										<input data-ng-click="simpan()" id="simpan" type="submit" class="btn btn-primary btn-block" value="Simpan">
										<span class="input-group-btn" id="update" style="display: none;">
											<input data-ng-click="simpan('update');" type="submit" class="form-control btn btn-warning" value="Update">
											<button data-ng-click="awal();" class="btn btn-default"><span class="glyphicon glyphicon-refresh"></span></button>
										</span>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- </div> -->

<?php
echo ($js ? $js : "");
// echo ($css ? $css : "");
?>

<script type="text/javascript">
	$(document).ready(function() {
		$(document).find('#loading_panel_lite').hide();
	});
</script>