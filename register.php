<?php
include "config.php";

$error = "";
$success = "";

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    // Password_hash function
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if user exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Email already exists!";
    } else {
        mysqli_query($conn, "INSERT INTO users(username,email,password) VALUES('$username','$email','$password')");
        $success = "Registration successful! <a href='index.php' class='underline font-medium'>Login here</a>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-400 via-green-500 to-emerald-600">

<div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">

    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">
        Register
    </h2>

    <?php if (!empty($error)): ?>
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4 text-center">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4 text-center">
            <?= $success; ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
        <input
            type="text"
            name="username"
            placeholder="Username"
            required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500"
        >

        <input
            type="email"
            name="email"
            placeholder="Email"
            required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500"
        >

        <input
            type="password"
            name="password"
            placeholder="Password"
            required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500"
        >

        <button
            type="submit"
            name="register"
            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded transition"
        >
            Register
        </button>
    </form>

    <p class="mt-6 text-center text-gray-600">
        Already have an account?
        <a href="index.php" class="text-green-600 hover:underline font-medium">
            Login
        </a>
    </p>

</div>

</body>
</html>
