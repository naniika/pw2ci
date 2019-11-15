<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Form Validasi</title>
	<link href="<?php echo base_url('assets/css/defaultStyle.css') ?>" rel="stylesheet">
</head>

<body>
	<div id="container">
		<h1>FORM VALIDATION</h1>
		<div id="body">
			<h1>Your form was successfully submitted!</h1>
			<h1><?php echo "<a href='" . base_url() . "mhs/fValid'>Kembali</a>"; ?></h1>
		</div>
	</div>
</body>

</html>
