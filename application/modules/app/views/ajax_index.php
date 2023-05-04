<h4 class="mt-2">Data Mahasiswa</h4>
<a class="btn btn-success text-white" onclick="addForm()" href=""><span class="glyphicon glyphicon-plus"></span> Tambah</a>

<div class="table-responsive mt-3">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <th>No</th>
            <th>NPM</th>
            <th>Nama</th>            
        </thead>
        <tbody>

        </tbody>  

    </table>
</div>

<?php 
echo "include form view"; 
?> 

<script>
    var table, save_method; 

    $(function() {
        // menampilkan data ke tabel dng AJAX
        table = $('.table').DataTable({
            "processing" : true, 
            "ajax" : {
                "url" : "<?= base_url() ?>latihan/ajax_get", 
                "type" : "POST"
            }
        }); 
    }); 

    $('#modalForm form').on('submit'), function(e) {
        if (! e.isDefaultPrevented() ) {
            if (save_method=="add") {
                url = "<?= base_url() ?>latihan/ajax_insert"; 
            } else {
                url = "<?= base_url() ?>latihan/ajax_update"; 
            }

            $.ajax({
                url: url, 
                type:"POST",
                data: $('#modalForm form').serialize(),
                success : function (data) {
                    $('#modalForm').modal('hide'); 
                    table.ajax.reload(null,false); 
                },
                error: function() {
                    alert("tidak dapat memroses"); 
                }
            });
            return false; 

        }
    }
</script>