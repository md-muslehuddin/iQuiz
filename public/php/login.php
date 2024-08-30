<?php
session_start();

$_SESSION = array();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iQuiz: The Ultimate iQuiz Experience</title>
    <link rel="icon" href="public/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="fContainer">
        <h1 class="fContent">
            Welcome to iQuiz
        </h1>
        <div class="form-group">
            <label for="username">Username<span style="color:red; font-weight:bolder;">*</span></label>
            <input type="text" id="username" name="uname" required>
        </div>
        <div class="form-group">
            <label for="password">Password<span style="color:red; font-weight:bolder;">*</span></label>
            <input type="password" id="password" name="password" required>
        </div>
        <div id="errmsg"></div>
        <input type="submit" value="Login" id="login">
    </form>
</body>

</html>

<?php
session_start();
require 'connectDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['uname'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM $tableName WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($conn, $sql);

    // Check if a matching user was found
    if (mysqli_num_rows($result) > 0) {
        header("Location: welcome.php");
        exit();
    } else {
        echo '<script>
        document.getElementById("errmsg").innerHTML = "Invalid username or password. Please try again.";
        setTimeout(function() { document.querySelector("#errmsg").style.display = "none"; }, 3000);
      </script>';
    }

    mysqli_close($conn);
}
?>