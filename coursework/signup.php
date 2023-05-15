<?php
// connect to the database
include 'connect.php';

// handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get form input values
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // hash password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // prepare SQL statement
    $sql = "INSERT INTO users (login, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    // execute statement and redirect to login page
    if ($stmt->execute()) {
        header("Location: ?menu=signin");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// close database connection
$conn->close();
?>
<h1>Регистрация</h1>
<form method="post">
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required><br>

    <input type="submit" value="Зарегистрироваться">
</form>