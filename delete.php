<?php

include 'db.php';

if(isset($_GET['ID']))
{
    $id=$_GET['ID'];
    $query="DELETE FROM tblcliente WHERE ID=$id";
    $result=mysqli_query($con,$query);
    if(!$result){
        die('No se pudo realizar la eliminacion');
    }

    $_SESSION['message']='Empresa eliminada';
    $_SESSION['message_type']='danger';
    header("Location: index.php");


}





?>