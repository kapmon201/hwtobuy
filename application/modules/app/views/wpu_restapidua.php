<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<script src="<?= _A_C_JS ?>jquery-3.6.4.js"></script>

	<script src="<?= _A_C_JS ?>wpu_restapidua0.js">

	</script>

	<script>
	$.getJSON("<?= _A_C_JS ?>wpu_restapipizza.json", function (data) {
		console.log(data);
	}); 
	</script>
</body>

</html>