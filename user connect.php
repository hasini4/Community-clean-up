<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    $inputUsername = $conn->real_escape_string($inputUsername);
    $inputPassword = $conn->real_escape_string($inputPassword);

    $sql = "SELECT * FROM user WHERE username = '$inputUsername' AND pass = '$inputPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: user index.html");
        exit();
    } else {
        
        echo "Invalid username or password.";
    }
}

$conn->close();
?>
