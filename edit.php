<?php

include 'db.php';

if(isset($_GET['ID']))
{
    $id=$_GET['ID'];
    $query="SELECT * FROM tblcliente WHERE ID = $id";
    $result=mysqli_query($con,$query);
    
    if(mysqli_num_rows($result) == 1){

        $row=mysqli_fetch_array($result);
        $nombre=$row['NOMBRE'];
        $ruc=$row['RUC'];
        $empresa=$row['EMPRESA'];

    }



}

if(isset($_POST['update']))
{
    $id=$_GET['ID'];
    $nombre=$_POST['txtnombre'];
    $ruc=$_POST['txtruc'];
    $empresa=$_POST['txtempresa'];


    $query="UPDATE tblcliente set NOMBRE='$nombre', RUC='$ruc', EMPRESA='$empresa' WHERE ID=$id";
    mysqli_query($con,$query);

    $_SESSION['message']='Se actualizo los datos de la empresa';
    $_SESSION['message_type']='warning';
  

    header("Location: index.php");

} 





?>



<?php include 'includes/header.php'?>

<div class="container p-4">
    <div class="row">   
        <div class="col-md-4 mx-auto">
            <div class="card card-body">   
                <form action="edit.php?ID=<?php echo $_GET['ID'];?>" method="POST">
                <div class="form-group">
                        <input type="text" name="txtnombre" value="<?php echo $nombre; ?>" 
                            class="form-control" placeholder="Actualice sus nombres">
                    </div>

                    <div class="form-group">
                        <input type="text" name="txtruc" value="<?php echo $ruc; ?>" 
                            class="form-control" placeholder="Actualice el ruc">
                    </div>

                    <div class="form-group">
                        <input type="text" name="txtempresa" value="<?php echo $empresa; ?>" 
                            class="form-control" placeholder="Actualice la empresa">
                    </div>
                    <input type="submit" class="btn btn-success" name="update" value="Update">
               </form>   
                       
            </div>
        </div>
    </div>
</div>



<?php include 'includes/footer.php' ?>