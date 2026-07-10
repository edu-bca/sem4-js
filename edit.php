<?php
include "dbconnection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM data WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found!";
        exit();
    }
}

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $sql = "UPDATE data
            SET firstname='$firstname',
                lastname='$lastname'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: process_form.php");   // Change to your main page name
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Record</title>
</head>
<body>

<h2>Edit User</h2>

<form method="POST">

    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <label>First Name</label><br>
    <input type="text" name="firstname"
           value="<?php echo $row['firstname']; ?>" required><br><br>

    <label>Last Name</label><br>
    <input type="text" name="lastname"
           value="<?php echo $row['lastname']; ?>" required><br><br>

    <input type="submit" name="update" value="Update">

</form>

</body>
</html>
