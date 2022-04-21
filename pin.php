
<head>
	<title>Ping</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h2>PIN</h2>
     <form method="post">
         <input type="password" name ="pin" >
   	    <button type="submit">Validate</button>
     </form>



</body>
<?php
 include_once 'DBfunctions.php';
 session_start();
   
 if(isset($_POST['pin']) )
 {
     if($_POST['pin'] == getpin() && strlen($_POST['pin'])==4)
     {
      
        $_SESSION['knowspin']=1;
     header("Location: signup.php");
        // echo "correct pin";
    }
 }
 else
 echo "wrong pin";
?>
