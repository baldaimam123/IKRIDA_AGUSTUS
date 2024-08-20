<?php
session_start(); // Memulai session

// username dan password default
$default_username = 'admin';
$default_password = 'admin123';

// Cek apakah form sudah disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi login
    if ($username === $default_username && $password === $default_password) {
        // Jika valid, simpan status login di session
        $_SESSION['loggedin'] = true;
        // Arahkan ke halaman utama.php
        header('Location: utama.php');
        exit();
    } else {
        // Jika tidak valid, tampilkan pesan kesalahan
        $error = 'Username atau password salah!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 400px;
            width: 100%;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin: 10px 0 5px;
            width: 100%;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 5px 0 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        input[type="submit"] {
            background-color: #2196F3;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #1976D2;
        }

        .error {
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            color: #004d00;
            text-decoration: none;
            font-size: 16px;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php } ?>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" name="submit" style="background-color:#004d00" value="Login">
        </form>
        <a href="form.php" class="back-link">Kembali ke Formulir</a>
    </div>
</body>

</html>