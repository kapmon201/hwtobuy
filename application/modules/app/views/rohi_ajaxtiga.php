<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="<?= _A_C_JS ?>jquery-3.6.4.js"></script>
    <script>
        $(function() {                     
            $.ajax({
                url: "<?= base_url() ?>app/latajax/rohi_ajaxtigaproc",
                type:"GET",
                dataType:'JSON',
                success: function (data) {
                    for (i=0; i<data.length;i++) {
                        $('tbody').append('<tr><td>'+data[i].npm+'</td><td>'+data[i].nama+'</td></tr>');
                    }                        
                },
                error: function (data) {
                    alert("tidak dapat memroses"); 
                }
            });
            // return false;  
        });
    </script>
</head>
<body>
        <table width="720" border="0" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th>npm</th>
                    <th>nama</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    
</body>
</html>