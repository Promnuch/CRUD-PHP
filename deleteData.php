
<?php

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'database_test');

if (isset($_POST['deletedata'])) {
    # code...
    $id = $_POST['delete_id'];

    $query = "DELETE FROM database_test WHERE id='$id' ";
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