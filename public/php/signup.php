
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iQuiz: The Ultimate iQuiz Experience</title>
    <link rel="icon" href="public/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/signup.css">
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="myForm">
        <h1 id="title">Sign Up</h1>

        <label for="name">Name<span style="color:red; font-weight:bolder;">*</span></label>
        <input type="text" id="name" name="name" placeholder="Enter Your Full Name" required><br>
        <p id="validationName" class="validation"></p>

        <label for="dob">Date Of Birth:</label>
        <input type="date" id="dob" name="dob"><br>
        <p id="validationDOB" class="validation"></p>

        <label for="contact">Contact No<span style="color:red; font-weight:bolder;">*</span></label>
        <input type="text" id="contact" name="contact" required placeholder="e.g., 9876543210" maxlength="10"><br>
        <p id="validationContact" class="validation"></p>

        <label for="username">Username<span style="color:red; font-weight:bolder;">*</span></label>
        <input type="text" id="username" name="uname" placeholder="e.g., example@gmail.com" required>
        <p id="validationUsername" class="validation"></p>

        <label for="password">Password<span style="color:red; font-weight:bolder;">*</span></label>
        <input type="password" id="password" name="password" required>
        <p id="validationPassword" class="validation"></p>
        <ul id="passwordRequirements" style="display: none;">
            <li>The password must be at least 8 characters long.</li>
            <li>At least one digit (0-9).</li>
            <li>At least one lowercase letter (a-z).</li>
            <li>At least one uppercase letter (A-Z).</li>
            <li>At least one special character from the set @#$%^&+=!.</li>
            <li>Examples: StrongP@ss12</li>
        </ul>

        <label for="confpassword">Confirm Password<span style="color:red; font-weight:bolder;">*</span></label>
        <input type="password" id="confpassword" name="confpassword" required>
        <p id="validationMatchPassword" class="validation"></p>

        <input type="submit" value="Submit" id="submitBtn">

    </form>

    <!-- <script src="../js/signup.js"></script> -->
</body>

</html>

<?php
require 'connectDB.php';

$process = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $contact = $_POST["contact"];
    $uname = $_POST["uname"];
    $password = $_POST["password"];

    $sql = "INSERT INTO $tableName (`Name`, `Date Of Birth`, `Contact`, `Username`, `Password`, `Timestamp`) 
            VALUES ('$name', '$dob', '$contact', '$uname', '$password', current_timestamp())";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo '<script>alert("Something went wrong.");</script>';
    } else {
        $process = true;
    }
}

mysqli_close($conn);

if ($process === true) {
    echo '<script>
            alert("Account creation successfully. Redirecting to Login Page.");
            window.location.href = "login.php";
          </script>';
    exit();
}
?>

