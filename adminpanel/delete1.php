<?php

$conn = mysqli_connect("localhost", "root", "", "projectd");

if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "DELETE FROM newfund WHERE id = '$id'";
    
    if(mysqli_query($conn, $sql)) {
        header("Location: admin.php?msg=DeletedSuccessfully");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
