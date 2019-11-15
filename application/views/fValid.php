<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Validasi</title>
	<link href="<?php echo base_url('assets/css/defaultStyle.css')?>" rel="stylesheet">
</head>
<body>
<div id="container">
	<h1>FORM VALIDATION</h1>
	<div id="body">
        <?php
            echo validation_errors();
            echo form_open('mhs/fValid');
        ?>
        <label>Username</label><br/>
        <input type="text" name="username" value="<?php echo set_value('username');?>" size="50" /><br/>
        <label>Password</label><br/>
        <input type="text" name="pass" value="<?php echo set_value('pass');?>" size="50" /><br/>
        <label>Password Confirmation</label><br/>
        <input type="text" name="passconf" size="50" /><br/>
        <label>Email</label><br/>
        <input type="text" name="email" value="<?php echo set_value('email');?>" size="50" /><br/><br/>
        <?php echo "<a href='".base_url()."mhs/vMhs'>Kembali</a>"; //tambahan ?>
        <input type="submit" value="Submit"/>
    </div>
    <!-- footer -->
	<p class="footer">Muhammad Arya Java (1811502754) - PEMROGRAMAN WEB 2 (AE)</p>
</div>  
</body>
</html>