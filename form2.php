<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <link rel="stylesheet" href="form2.css">
    </head>
    <body>
        <form method="post" action="form2.php">
            <h1>Recyle and Earn</h1>
            <p>Username:</p>
            <div class="username_txtbox">
                <input type="text" placeholder="Enter username" name="userName">
            </div>
            <p>Password:</p>
            <div class="password_txtbox">
                <input type="passWord" placeholder="Enter password" name="passWord">
            </div>
            <input type="submit" value="Login" class="loginBtn" name="login_Btn">
        </form>
    </body>
</html>
<?php
$conn = mysqli_connect("localhost", "root", "", "owner_login"); // specify the database name
if(isset($_POST['login_Btn'])){
    $userName = $_POST['userName'];
    $passWord = $_POST['passWord'];
    $sql = "SELECT * FROM owner_details WHERE userName = '$userName' AND passWord = '$passWord'";
    $result = mysqli_query($conn, $sql); // execute the query

    if ($result) { // check if the query was successful
        if (mysqli_num_rows($result) > 0) { // check if any rows were returned
            // Redirect to dashboard if username and password match
            header('Location: dashboard_owner.html');
            exit(); // stop further execution
        } else {
            echo "<script>alert('Invalid username or password!');</script>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_free_result($result); // free the result set
    mysqli_close($conn); // close the connection
}
?>
