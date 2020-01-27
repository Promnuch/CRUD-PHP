<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>crud</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="insertData.php" method="POST">
                    <div class="modal-body">
          

                        <div class="form-group">
                            <label >Name</label>
                            <input type="text" name="fname" class="form-control" placeholder="Enter name">
                        </div>

                        <div class="form-group">
                            <label >Last Name</label>
                            <input type="text" name="lname" class="form-control" placeholder="Enter name">
                        </div>

                        <div class="form-group">
                            <label >Contact</label>
                            <input type="text" name="contact" class="form-control" placeholder="Enter name">
                        </div>

                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



<!--==================================================================================================================================================-->

    <!--Edit Modal -->
    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updateData.php" method="POST">
                    <div class="modal-body">
                    
                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label >Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter name">
                        </div>

                        <div class="form-group">
                            <label >Last Name</label>
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter name">
                        </div>

                        <div class="form-group">
                            <label >Contact</label>
                            <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter name">
                        </div>

                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Save Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<!--==================================================================================================================================================-->




<!--==================================================================================================================================================-->

    <!--Delete Modal -->
    <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deleteData.php" method="POST">
                    <div class="modal-body">
                    
                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Do you want to delete this Data?</h4>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" name="deletedata" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<!--==================================================================================================================================================-->


    <div class="container">
        <div class="jumpbotron">
            <div class="ard" style="margin:30px;">
                <h2>CRUD TEST</h2>
            </div>
            <hr>

            <div class="card-body" style="margin:30px;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add Data   
                </button>
            </div>


            <div class="card">
                <div class="card-body">

            <?php
                $connection = mysqli_connect("localhost", "root", "");
                $db = mysqli_select_db($connection, 'database_test');
                $query = "SELECT * FROM database_test";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table class="table thead-light">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Contact</th>
                            <th scope="col">EDIT</th>
                            <th scope="col">DELETE</th>
                        </tr>
                    </thead>
            <?php
                if ($query_run) {
                    # code...
                    foreach ($query_run as $row) {
                        # code...
            ?>
                    <tbody>
                        <tr>
                            <td> <?php echo $row['id']; ?></td>
                            <td> <?php echo $row['fname']; ?></td>
                            <td> <?php echo $row['lname']; ?></td>
                            <td> <?php echo $row['contact']; ?></td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm editbtn">EDIT</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm deletebtn">DELETE</button>
                            </td>
                        </tr>
                       
                    </tbody>
            <?php
                    }
                }
                else{
                    echo "No Record Found";
                }
            ?>

                    </table>
                </div>
            </div>
       
       
       
       
       
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<!--================ Edit =============================================================-->
    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function(){
                $('#edit_modal').modal('show');
                   
                $tr = $(this).closest('tr');
                    
                    var data = $tr.children("td").map(function(){
                        return $(this).text();
                    }).get();
                
                    console.log(data);
                    
                    $('#update_id').val(data[0]);
                    $('#fname').val(data[1]);
                    $('#lname').val(data[2]);
                    $('#contact').val(data[3]);
                    
            });
            
        });
    </script>

<!--===================================================================================-->


<!--================ Delete =============================================================-->
<script>
        $(document).ready(function() {
            $('.deletebtn').on('click', function(){
                $('#delete_modal').modal('show');
               
                $tr = $(this).closest('tr');
                    
                    var data = $tr.children("td").map(function(){
                        return $(this).text();
                    }).get();
                
                    console.log(data);
                    
                    $('#delete_id').val(data[0]);
              
            });
            
        });
    </script>

<!--===================================================================================-->



</body>
</html>