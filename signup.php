<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Signup</title>
</head>
<body>
    <h1>Entre your signup name and password</h1><br>
    <form method = "POST" >
    <label for="username"><h3>Username</h3></label>
    <input type ="text" name="username" placeholder="max 20 charachters">
    <label for="pwd" ><h3>Password</h3></label>
    <input type ="password" name="pwd" placeholder="max 20 charachters"><br>
    <button type="submit">Signup</button>
    </form>
</body>
</html>

<?php
 include_once 'DBfunctions.php';
 session_start();
if(isset($_SESSION['knowspin'])) 
    {
            if(isset($_POST['username']) && isset($_POST['pwd']) )
        {
            if(strlen($_POST['username'])<20)
            {
                if(!empty($_POST['username']) && !empty($_POST['pwd'] ) )
                {
                    if(strlen($_POST['pwd'])<20)//la longeur du chaine:strlen
                    {  
                        echo "succesful signup";
                        if(signup(mysqli_real_escape_string($conn, $_POST['username']),mysqli_real_escape_string($conn, $_POST['pwd']),false))
                       { pinsgen();  
                        header('Location: index.php?success=Successful Sign up');//acheminez vers un autre lien ou pages
                        }
                        else
                        header('Location:index.php?error=username already existss');
                    }
                    else 
                    {
                        echo "error: maximum password size surpassed";
                        header('Location:index.php?error=Password is too big');
                    }
                }
                else
                header('Location:index.php?error=you left some fields empty');
            }
            else
            header('Location:index.php?error=username superior to 20 characters');
            
        }
    }
else
    header('Location:index.php?error=tried to signup without a pin');
/*
//include_once 'dbh.php';


$sql = "INSERT into personnel (username,pwd,isadmin) values ('Rootuser!',SHA2('Rootuser!', 224),false);";
mysqli_query($conn,$sql);
//header("Location: ../index.php?signup=success");
?>*/
//action="includes/signup.inc.php" 
//Rootuser!

//still need to varify if a user already exists
