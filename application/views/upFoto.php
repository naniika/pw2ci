<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Upload Foto</title>
	<link href="<?php echo base_url('assets/css/defaultStyle.css')?>" rel="stylesheet">
</head>
<body>
<div id="container">
	<h1>Upload Foto</h1>
	<div id="body">
        <!-- Upload foto -->
        <?php echo $error;?>
        <?php echo form_open_multipart('mhs/do_upload');?>
        <input type="file" name="userfile" size="20"/>
        <br/><br/>
        <input type="submit" value="upload"/>
	</div>
	<!-- footer -->
	<p class="footer">PEMROGRAMAN WEB 2 (AE)</p>
</div>

</body>
</html>