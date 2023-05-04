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
            var i =0; 
            $('button').click(function(){
                $.ajax({
                    url: "<?= base_url() ?>app/latajax/rohi_ajaxsatuproc",
                    type:"GET",
                    data : {count: i},
                    success: function (data) {
                        i = data; 
                        $('.tampil').append(' '+data); 

                    },
                    error: function (data) {
                        alert("tidak dapat memroses"); 
                    }
                });
            });
        });
    </script>
</head>
<body>
    <button>hitung</button>
    <div><?= base_url()." "._A_C_JS ?></div>
    <div class="tampil"></div>
</body>
</html>