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
            
            $('#formku').submit(function(){
                $.ajax({
                    url: "<?= base_url() ?>app/latajax/rohi_ajaxduaproc",
                    type:"POST",
                    data : $(this).serialize(),
                    success: function (data) {
                        alert(data); 
                        $('[name=npm').val('');
                        $('[name=nama').val('');
                         

                    },
                    error: function (data) {
                        alert("tidak dapat memroses"); 
                    }
                });
                return false; 
            });
        });
    </script>
</head>
<body>
    <form id="formku">
        <table width="720" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="120">npm</td>
                <td><input type="text" name="npm"></td>
                
            </tr>
            <tr>
                <td width="120">nama</td>
                <td><input type="text" name="nama"></td>
                
            </tr>
            <tr>
                <td width="120">&nbsp;</td>
                <td><input type="submit" value="OK"></td>
                
            </tr>
        </table>
    </form>
    
</body>
</html>