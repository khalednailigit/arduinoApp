<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Signup</title>
</head>
<body>
    <h1>Entrez votre nom et mot de passe</h1><br>
    <form method = "POST" >
    <label for="username"><h3>Username</h3></label>
    <input type ="text" name="username" placeholder="max 20 caractéres">

    <label for="pwd" ><h3>Password</h3></label>
    <input type ="password" name="pwd" placeholder="votre mdp"><br>
    <button type="submit">cliquez ici</button>
    </form>
</body>
</html>

<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['pwd'])) {//isset:si variable existe ou nn

	function validate($data){//validate:elimine les caracters dangreux . plus de protection pour l'injection sql
       $data = trim($data);//trim: elimine l'espase a la fin
	   $data = stripslashes($data);//elimine les /
	   $data = htmlspecialchars($data);// elimine =='
	   return $data;
	}

	$uname = validate($_POST['username']);
	$pass = validate($_POST['pwd']);

	if (empty($uname)) {//empty :detecte si contient pas de caract retournr true or falsess
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM personnel WHERE username='$uname' AND pwd=SHA2('$pass', 224);";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['idpers'] = $row['idpers'];
				$_SESSION['admin']=$row['isadmin'];
            	header("Location: home.php");
		        exit();
            
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}
