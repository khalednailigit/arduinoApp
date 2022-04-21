<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1></h1>
    <form method="GET">
    <input type="submit" name="login" value="LOGIN" class="button-three">
    
    <input type="submit" name = "signup" value="SIGNUP" class="button-three">
    <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
         <?php if (isset($_GET['success'])) { ?>
     		<p class="success"><?php echo $_GET['success']; ?></p>
     	<?php } ?>
	</form>
    <img src="img/logo.png" alt="logo" class="abc">
    
    
     
</form>



</body>
</html>

<?php
session_start();

session_unset();
session_destroy();
if(isset($_GET['signup']) && $_GET['signup']!="empty" && $_GET['signup'] && $_GE['signup']!="toobig")
header("Location: pin.php");
if(isset($_GET['login']))
header("Location: login.php");
?>


