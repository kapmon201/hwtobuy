<link rel="stylesheet" href="<?= _A_LIBS; ?>datatables/css/jquery.dataTables.min.css" >

<div class='panel panel-default'>
<!-- style="font-size:+1.6"	 -->
	<div class="panel-body">
		<div class='table-filter'>				
			<div class='col-lg-12'>

			</div>
			<div class='clearfix'></div>
		</div>	
		
		<div id="wrapper">
			<div id="content-wrapper" class="d-flex flex-column">				
				<div id="content">				
					<div class='panel panel-default'>				
						<div class='panel-body'>						
							
						<!-- <div class="container"> -->
        		<h1 style="font-size:16pt">Data Pelanggan</h1>
        		<br />
        
						<table id="table" class="display" cellspacing="0" width="100%">
							<thead>
								<tr>
										<th>No</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Phone</th>
										<th>Address</th>
										<th>City</th>
										<th>Country</th>
								</tr>
							</thead>
							<tbody>
							</tbody>		
							<tfoot>
								<tr>
									<th>No</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Phone</th>
									<th>Address</th>
									<th>City</th>
									<th>Country</th>
								</tr>
							</tfoot>
						</table>
    				<!-- </div> -->

						</div>	                	
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>

<!-- <script src="base_url('assets/jquery/jquery-2.2.3.min.js')?>"></script> -->
<script type="text/javascript" src="<?= _A_C_JS; ?>jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="<?= _A_LIBS; ?>datatables/js/jquery.dataTables.min.js"></script>


<script>
var table;

$(document).ready(function(){
	//no_need_waiting();
	$(document).find('#loading_panel_lite').hide();

	//datatables
	table = $('#table').DataTable({ 
		"processing": true, //Feature control the processing indicator.
		"serverSide": true, //Feature control DataTables' server-side processing mode.
		"order": [], //Initial no order.

		// Load data for the table's content from an Ajax source
		"ajax": {
			"url": "<?= base_url() ?>app/latihan/mbahcoding_ajaxlist",
			"type": "POST"
		},
		
		//Set column definition initialisation properties.
		"columnDefs": [
			{ 
				"targets": [ 0 ], //first column / numbering column
				"orderable": false, //set not orderable
			},
		],
	});
});	
</script>