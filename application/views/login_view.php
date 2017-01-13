<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Boomer" />
	<title>Setiajaya Mobilindo Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>staff_site_files/css/login-style.css" />
</head>
<body>
<div id="wrapper">
    <div id="login_window">
        <div id="judul"><h1>Sign In</h1></div>
        <div class="component_wrapper">
			<?php echo form_open('index.php/verifylogin'); ?>
			<table><tr><td>
				Username &nbsp;&nbsp;</td><td><input type="text" name="username" value="<?php echo set_value('username'); ?>" size="35" placeholder="Masukkan username anda" />	
			</td></tr></table>
			<font color="red"><?php echo form_error('username'); ?></font>
        </div>
        <div class="component_wrapper">
			<table><tr><td>
				Password &nbsp;&nbsp;&nbsp;</td><td><input type="password" name="password" value="<?php echo set_value('password'); ?>" size="35" placeholder="Masukkan password anda" />	
			</td></tr></table>
			<font color="red"><?php echo form_error('password'); ?></font>       
        </div>            
        <div class="buttons"><input type='Submit' value='Login' /></div>       
    </div>  
</div>
</body>
</html>