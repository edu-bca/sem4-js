<?php

include"dbconnection.php";

if(isset($_POST['submit'])){

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $sql = "INSERT INTO data (firstname, lastname) VALUES ('$firstname', '$lastname')";

    if($conn -> query($sql) === TRUE){
        echo "New Record Added Succesfully";
    }else{
        echo "Error: ".$conn->error;
    }


}


$nsql = "SELECT * FROM form";
$result = $conn->query($nsql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h2>User Records</h2>

        <button><a href="Form.html">Add New Record</a></button>
 <table border="1">
<tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Action</th>
</tr>

<?php

while($row = $result->fetch_assoc()){

?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['firstname']; ?></td>
<td><?php echo $row['lastname']; ?></td>

<td>
    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
</td>

</tr>

<?php
}

?>

</table>

</body>
</html>
