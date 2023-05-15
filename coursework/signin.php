<?php
// start session
session_start();

include 'connect.php';

// handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get form input values
    $email = $_POST["email"];
    $password = $_POST["password"];

    // prepare SQL statement
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // check if user exists and password is correct
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // set session variables and redirect to homepage
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_name"] = $row["login"];
            header("Location: ./");
            exit();
        }
    }

    // show error message
    $error_msg = "Invalid email or password";
}

// close database connection
$conn->close();
?>
    <h1>Login</h1>
    <?php if (isset($error_msg)) { ?>
        <p><?php echo $error_msg; ?></p>
    <?php } ?>
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
