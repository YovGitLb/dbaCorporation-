<?php include 'db.php';?>





<?php include 'includes/header.php'  ?>


<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if(isset($_SESSION['message'])) {?>

                <div class="alert alert-<?=$_SESSION['message_type'];?>
                 alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>


            <?php session_unset();}?>


            <div class="card card-body">
                <form action="save.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="txtname" class="form-control" placeholder="Ingresar el nombre" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="txtruc" class="form-control" placeholder="Ingresar el ruc" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="txtempresa" class="form-control" placeholder="Ingresar la empresa">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="btnregistrar" value="Register">
                </form>
            </div>
        </div>


        <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>RUC</th>
                            <th>EMPRESA</th>
                            <th>ACTIONS</th>
                        </tr>
                    
                    </thead>   
                    
                    <tbody>
                        <?php
                            $query="SELECT * FROM tblcliente";
                            $result_query=mysqli_query($con,$query);

                            while($row = mysqli_fetch_array($result_query)){?>
                            <tr>
                               <td><?php echo $row['NOMBRE'] ?></td>         
                               <td><?php echo $row['RUC'] ?></td>
                               <td><?php echo $row['EMPRESA'] ?></td>         
                               <td><a href="edit.php?ID=<?php echo $row['ID']?>" class="btn btn-secondary"><i class="fas fa-user-edit"></i></a> 
                                   <a href="delete.php?ID=<?php echo $row['ID']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>          
                            </tr>
                        
                         <?php }?>


                    </tbody>

                </table>
                
        </div>        


    </div>
</div>






<?php include 'includes/footer.php'  ?>