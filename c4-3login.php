<?php
include('c4-3db.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM students WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();


        if (password_verify($password, $user['password'])) {
            setcookie('user_id', $user['id'], time() + (86400 * 30), "/");  // 30 days
            setcookie('email', $user['email'], time() + (86400 * 30), "/");
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No user found with that email.";
    }
}
?>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <label>Email: </label><br>
        <input type="email" name="email" required><br><br>
        
        <label>Password: </label><br>
        <input type="password" name="password" required><br><br>
        
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
