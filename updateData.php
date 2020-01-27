
<?php

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'database_test');

if (isset($_POST['updatedata'])) {
    # code...
    $id = $_POST['update_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];

    $query = "UPDATE database_test SET fname = '$fname', lname = '$lname', contact = '$contact' WHERE id = '$id'  ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        # code...
        echo '<scrip> alert("Data Update"); </scrip>';
        header('Location: index.php');

    }
    else{
        echo '<scrip> alert("Data Not Update"); </scrip>';
    }

}

?>