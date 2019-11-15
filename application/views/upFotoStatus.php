<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Upload Foto Status</title>
	<link href="<?php echo base_url('assets/css/defaultStyle.css')?>" rel="stylesheet">
</head>
<body>
<div id="container">
	<h1>Upload Foto Status</h1>
	<div id="body">
        <!-- Upload foto status -->
        <h3>Upload foto berhasil!</h3>
        <ul>
            <?php foreach ($upload_data as $f => $value):?>
            <li><?php echo $f;?>: <?php echo $value;?></li>
            <?php endforeach;?>
        </ul>
        <p><?php echo "<a href='".base_url()."mhs/vMhs'>Kembali</a>";?></p>
	</div>
	<!-- footer -->
	<p class="footer">PEMROGRAMAN WEB 2 (AE)</p>
</div>

</body>
</html>