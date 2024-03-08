<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <link rel="stylesheet" href="form1.css">
    </head>
    <body>
        <form method="post" action="form1.php">
            <h1>Welcome Recycler!</h1>
            <p>ID Number:</p>
            <div class="textBoxdiv">
                <input type="text" placeholder="Enter student ID number" name="idnumber">
            </div>
            <input type="submit" value="Login" class="loginBtn" name="login_Btn">
        </form>
    </body>
</html>
<?php
$conn = mysqli_connect("localhost", "root", "", "student_login"); // specify the database name
if(isset($_POST['login_Btn'])){
    $idnumber = $_POST['idnumber'];
    $sql = "SELECT * FROM student_details WHERE idnumber = '$idnumber'";
    $result = mysqli_query($conn, $sql); // execute the query

    if ($result) { // check if the query was successful
        if (mysqli_num_rows($result) > 0) { // check if any rows were returned
            // Redirect to dashboard if ID number is registered
            header('Location:dashboard_student.html');
            exit(); // stop further execution
        } else {
            echo "<script>alert('ID number not registered!');</script>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_free_result($result); // free the result set
    mysqli_close($conn); // close the connection
}
?>







