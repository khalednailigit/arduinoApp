<?php
   include_once 'DBfunctions.php';
if (isset($_GET['temp']) &&  isset($_GET['humid']) ) // test si la variable existe
        {
        $humid = floatval($_GET['humid']);
        $temp = floatval($_GET['temp']); // force le type float pour la variable
        echo ('donnee ' .$_GET["temp"]. ' en cours d\'ecriture</br>');
        insertemp($temp,$humid);//dbfunction
         echo ('donnee ' .$_GET['temp']. ' ecrite!');
        }
?>

