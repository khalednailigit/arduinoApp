<?php
  
  include 'db_conn.php';
  
    function DeleteAll()
    {
        $sql = "DELETE from DATA ;";
        $result = mysqli_query($GLOBALS['conn'],$sql);
    }
    function Getpin()
    {
        $sql = "SELECT idpin,pin FROM pins ORDER BY idpin DESC LIMIT 1;";
        $result = mysqli_query($GLOBALS['conn'],$sql);
        $row = mysqli_fetch_assoc($result);
        return $row['pin'];
    }
    function pinsgen()
    {
        $seed = "x9tr"; //random pin generation seed
        $random =rand(0, 27);//rand:fonct predefinie qui retourne un entier entre min et max
        $randompin= "";//randompin:pin a generer
        
            $randompin = substr(md5($seed), $random, $random+4);//md5 prend une chaine de caractere de n'importe quelle longeur et retourne une chaine de caractere de 32 caracteres hexadec
        $sql = "INSERT INTO pins (pin) VALUES ('$randompin');";
   
        $result = mysqli_query($GLOBALS['conn'],$sql);//mysqli_query est une fonct predefinie en php qui prend en parametre une connex, une bd et une requete sql elle retourene la reslt de cette requet

    }
    function signup($user,$pass,$isadmin)//une meth de signup protegee contre les injections sql
    {
        $sql ="select * from personnel where username=?";
      //  $sql = "INSERT INTO personnel (username,pwd,isadmin) values (?,SHA2(?, 224),?);"; //username ,SHA2('$pass', 224),false) //using a prepared statement 
        $stmt = mysqli_stmt_init($GLOBALS['conn']);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          return false;
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$user);//safe injection of data the sql quary 
           $result=mysqli_stmt_execute($stmt);
           $result=mysqli_stmt_get_result($stmt);
           $nbr =mysqli_num_rows($result);
           if($nbr>0)
           return false;
           else
           {
                $sql = "INSERT INTO personnel (username,pwd,isadmin) values (?,SHA2(?, 224),?);"; //username ,SHA2('$pass', 224),false) //using a prepared statement 
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    return false;
                  }
                  else{
                      mysqli_stmt_bind_param($stmt,"ssi",$user,$pass,$isadmin);
                     $result=mysqli_stmt_execute($stmt);
                  }
           }
           
            return true;
        }



       // $result = mysqli_query($GLOBALS['conn'],$sql);
        echo "successfull singup";
    }
    function fetchTemp()
    {
        $array = array();
        $sql = "SELECT temp,id FROM data ORDER BY id DESC LIMIT 1;";
        $result = mysqli_query($GLOBALS['conn'],$sql);
        $row = mysqli_fetch_assoc($result);
        
        return $row['temp'];
    }
    function fetchid()
    {
        $array = array();
        $sql = "SELECT time,id FROM data ORDER BY id DESC LIMIT 1;";
        $result = mysqli_query($GLOBALS['conn'],$sql);
        $row = mysqli_fetch_assoc($result);
        
        return $row['id'];

    }
    function fetchHumid()
    {
        $sql = "SELECT humidity,id FROM data ORDER BY id DESC LIMIT 1;"; 
        $result = mysqli_query($GLOBALS['conn'],$sql);
        $row = mysqli_fetch_assoc($result);
        return $row['humidity'];
    }
    function insertemp($temp,$humid)
    {
        $sql = "INSERT into data (humidity,temp) values ('$humid','$temp') ;";
        $result = mysqli_query($GLOBALS['conn'],$sql);
    }
?>