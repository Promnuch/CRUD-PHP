
<?php

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'database_test');

if (isset($_POST['insertdata'])) {
    # code...

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];

    $query = "INSERT INTO database_test(`fname`, `lname`, `contact`) VALUES ('$fname', '$lname', '$contact')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        # code...
        echo '<scrip> alert("Data Save"); </scrip>';
        header('Location: index.php');

    }
    else{
        echo '<scrip> alert("Data Not Save"); </scrip>';
    }

}

?>