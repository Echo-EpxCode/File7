<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-400 via-green-500 to-emerald-600">

<!-- Main Content -->
<div class="flex items-center justify-center mt-16 px-4">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-xl p-8 text-center">

        <h1 class="text-3xl font-bold text-gray-800 mb-4">
            Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!
        </h1>

        <p class="text-gray-600 mb-6">
            You’re successfully logged in.
        </p>

        <a href="logout.php"
           class="inline-block bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-2 rounded transition">
            Logout
        </a>

    </div>
</div>

</body>
</html>
