<?php  

include 'db.php';



if(isset($_POST['btnregistrar']))
{

$nombre=$_POST['txtname'];
$ruc=$_POST['txtruc'];
$empresa=$_POST['txtempresa'];


$query="INSERT INTO tblcliente (NOMBRE,RUC,EMPRESA) VALUES ('$nombre','$ruc','$empresa')";
$result=mysqli_query($con,$query);

if(!$result)
{
    die("No se pudo guardar");  


}

$_SESSION['message']='Se guardo correctamente';
$_SESSION['message_type']="success";// para eliminar danger


header("Location: index.php");


}
 

?>