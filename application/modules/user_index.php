<div class="panel panel-body">
	<?= $this->load->view("get_flashmessage"); ?>

	<div>
		<?php 
		echo "<a class=\"btn btn-xs btn-info\" href=\"".base_url()."app/user/insert/\">Tambah</a>";
		echo "<p>&nbsp;</p>";  
		?> 		
	</div>

	<?= $cari ?>

	<table class='table table-condensed table-hover table-striped'>
		<thead>
			<th width="60">No.</th>
			<th width="360">Nama</th>			
			<th width="75">Status</th>
			<th width="75">Hak Akses</th>			
			<th colspan="2">Aksi</th>
		</thead>
		
		<tbody>
			<?php 
			foreach($user as $temp_user):
				// id inserter
				unset($strings); 
				unset($arr); 
				$arr = array(
					  	"nip"=>is_kosong($temp_user->ID_INSERTER), 
					  	"nip2"=>is_kosong($temp_user->ID_INSERTER),  
						);  
				$id_inserter = $this->User_model->get_pegawai($arr);
				if (count($id_inserter)<=0) : 
					$strings[0]="-"; 
				else : 
					foreach ($id_inserter as $id_inserter ) : 

					endforeach;
					$strings[0]=$id_inserter->NM_PEGAWAI; 
				endif; 

				// id updater 
				unset($arr); 
				$arr = array(
					  	"nip"=>is_kosong($temp_user->ID_UPDATER), 
					  	"nip2"=>is_kosong($temp_user->ID_UPDATER),  
						);  
				$id_updater = $this->User_model->get_pegawai($arr);
				if (count($id_updater)<=0) : 
					$strings[1]="-"; 
				else : 
					foreach ($id_updater as $id_updater ) : 

					endforeach;
					$strings[1]=$id_updater->NM_PEGAWAI; 
				endif;  

				if ($temp_user->TGL_UPDATE) : 
					$strings[2]="<div class=\"text-muted\">update terakhir ".$temp_user->TGL_UPDATE." oleh ".$strings[1]."</div>"; 
				else : 
					$strings[2]="&nbsp;"; 
				endif; 

			?>
				<tr class="data">
					<td><?php echo $bil; ?></td>
					<td class="nama"><?php echo ucwords(strtolower($temp_user->NM_PEGAWAI))."<div>NIP: ".$temp_user->ID_ADADOKSUSER."</div><div class=\"text-muted\">terdaftar ".$temp_user->TGL_INSERT." oleh ".$strings[0]."</div>".$strings[2]; ?></td>					
					<td align="center"><?= ($temp_user->ID_STATUS==0) ? "Tidak Aktif": "Aktif"; ?></td>
					<td align="center"><?php echo get_privilegetype($temp_user->ID_PRIVILEGE); ?></td>
					<td width="75"><a class='btn btn-xs btn-info' href="<?php echo base_url(); ?>app/user/update/<?php echo $temp_user->ID_ADADOKSUSER; ?>">Update</td>
					<td width="75"><a onClick="return confirm('Anda Yakin Menghapus Data Ini?');" class='btn btn-xs btn-danger' href="<?php echo base_url(); ?>app/user/delete/<?php echo $temp_user->ID_ADADOKSUSER; ?>">Delete</td>
				</tr>
			<?php 
				$bil+=1; 
			endforeach;
			?>
		</tbody>
	</table>
</div>

<?php echo $css; ?>
<?php echo $js; ?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#btncari").click(function() { 
			// alert("btn cari diklik"); 
		});

		$("table tr").each(function(index) {
      	if (index != 0) {
            $row = $(this);
            var id = $row.find("td.nama").text();
            console.log(id); 
            /*
            if (id.indexOf(value) != 0) {
                $(this).hide();
            } else {
                $(this).show();
            }
            */
        	}
    	});

	});  

	$("#cari").on("keyup", function() {
   	//var value = $(this).val();
   	var value = $(this).val().toLowerCase();

    	$("table tr.data").filter(function() {
      	$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    	});

    	/*
   	$("table tr").each(function(index) {
      	if (index != 0) {
            $row = $(this);
            var id = $row.find("td.nama").text();

            if (id.indexOf(value) != 0) {
                $(this).hide();
            } else {
                $(this).show();
            }
        	}
    	});
    	*/
	});		
</script>