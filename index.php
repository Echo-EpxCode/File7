<?php
session_start();
include "config.php";

$error = "";

if (isset($_POST['login'])) {
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        // Password_verify function
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit;
        }
         else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-400 via-green-500 to-emerald-600">

<div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">

    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">
    Access Your Account
    </h2>

    <?php if(!empty($error)): ?>
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4 text-center">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
        <input
            type="email"
            name="email"
            placeholder="Email"
            required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        >

        <input
            type="password"
            name="password"
            placeholder="Password"
            required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        >

        <button
            type="submit"
            name="login"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded transition"
        >
            Login
        </button>
    </form>

    <p class="mt-6 text-center text-gray-600">
        No account?
        <a href="register.php" class="text-blue-600 hover:underline font-medium">
            Register
        </a>
    </p>

</div>

</body>
</html>
