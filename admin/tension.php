

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>spandan</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  
</head>

<body>
<div class="container-fluid">
                    <?php
                    include 'connect.php';
                    $sl_time=$msg=$myclass="";
                   
                    if(isset($_POST['b1']))
                    {

                    $sl_time=$_POST['sl_time'];
                    $query="INSERT INTO slot(sl_time) VALUES('$sl_time')";
              //  echo $query;
             //  $row= mysqli_query($cn,$query);
               //var_dump($row);
              
               if(mysqli_query($cn,$query))
                {
                 $msg="Slot inserted"; 
                 $myclass="text-success";  
                }
                else
                {
                    $msg="failed to  insert"; 
                    $myclass="text-danger";  
 
                }
               
              

                    }
                    
                    ?>


                  
                    <!-- Content Row -->
                    <div class="row">
 <div class="col-md-4   ">
     <div class="bg-white shadow-lg p-3 mt-5" >
         <h1 class="h3 mb-0 text-gray-800 text-center ">Create Slot </h1>
<p> <?php echo $msg; ?></p>
                    <form action="tension.php" method="POST" enctype="multipart/form-data">
                        <div class="row p-3">
                           
                        <label for="">Add Slot</label>
                            <input type="text" name="sl_time" id="ct" class="form-control" required>
                            
                        </div>
                        <div class="col-md-2">
                        <input type="submit" name="b1" value="add" class="btn btn-primary ">
                        </div>
                        </div>
 
</div>

<div class="col-md-8 table-responsive ">
                         
                         
<table id="mytable" class="display table-bordered" style="width:100%">
        <thead>
            <tr>
                                <th>#</th>
                                <th>slot time</th>
                                
                                <th width="20%">Action</th>
                            </tr>
                            </thead>
        <tbody>

                        <?php
                       
                    $q="SELECT * FROM slot";
                    $result=mysqli_query($cn,$q);
                    $i=1;
                    while($row=mysqli_fetch_assoc($result))
                    {
                        ?>
                        <tr>
                            <td> <?php echo $i;?></td>
                            <td> <?php echo $row['sl_time'];?></td>
                          
                            <td width="20%"> 
                                <span class='delete' data-id='<?php echo $row['sl_id']; ?>'> 
                                  <a href="#" class="btn-sm btn-danger" >
                                      Delete

                                  </a>
                                </span>
                         </td>
                           
                        </tr>

                         <?php
                   $i++;
                    }

                    ?> 
                     </tbody> 
                    </table>
                    </div>
                        </div>
                    </form>
                        
                    </div>
                      
                     </div>

                       <div class="row  mt-5">
                        
                    <!-- Content Row -->

                    </div>

                      
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
          
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <!-- Bootstrap core JavaScript-->

    <!-- Custom scripts for all pages-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

   <!-- Page level plugins -->
    <script>
    $(document).ready(function() {
    $('#mytable').DataTable();
} );
</script>

<script>
    $(document).ready(function(){

// Delete 
$('.delete').click(function(){
  var el = this;
 
  // Delete id
  var deleteid = $(this).data('id');

  var confirmalert = confirm("Are you sure?");
  if (confirmalert == true) {
     // AJAX Request
     $.ajax({
       url: 'delete-slot.php',
       type: 'POST',
       data: { id:deleteid },
       success: function(response){

         if(response == 1){
       // Remove row from HTML Table
       $(el).closest('tr').css('background','tomato');
       $(el).closest('tr').fadeOut(800,function(){
          $(this).remove();
       });
         }else{
       alert('Invalid ID.');
         }

       }
     });
  }

});

});

</script>
</body>

</html>

