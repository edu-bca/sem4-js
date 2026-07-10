<?php
include "dbconnection.php";

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM form WHERE id=$id";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } 
    else {
        echo "Record not found!";
        exit();
    }
}


if(isset($_POST['confirm'])) {

    $id = $_POST['id'];

    $sql = "DELETE FROM form WHERE id=$id";

    if($conn->query($sql) === TRUE) {
        header("Location: process_form.php");
        exit();
    }
    else {
        echo "Error: " . $conn->error;
    }
}


if(isset($_POST['cancel'])) {
    header("Location: process_form.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirm Delete</title>
</head>

<body>

<h2>Delete Confirmation</h2>



<p>
First Name: <?php echo $row['firstname']; ?><br>
Last Name: <?php echo $row['lastname']; ?>
</p>


<form method="POST">

    <input type="hidden" name="id" 
           value="<?php echo $row['id']; ?>">

    <input type="submit" 
           name="confirm" 
           value="Delete">

    <input type="submit" 
           name="cancel" 
           value="Cancel">

</form>

</body>
</html>