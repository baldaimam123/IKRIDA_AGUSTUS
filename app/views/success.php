<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKRIDA - Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e7f5e9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #28a745;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 4px;
        }

        a:hover {
            background-color: #0056b3;
        }

        .edit-link {
            display: block;
            margin-top: 10px;
            padding: 10px;
            color: #fff;
            background-color: #ffc107;
            text-decoration: none;
            border-radius: 4px;
        }

        .edit-link:hover {
            background-color: #e0a800;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Data Berhasil Disimpan!</h2>
        <p>Terima kasih telah mengisi formulir perlombaan.</p>
        <a href="/ikrida_lomba/">Kembali ke Formulir</a>
        <a href="/ikrida_lomba/edit.php?id=<?php echo $participantId; ?>" class="edit-link">Edit Data</a>
    </div>
</body>

</html>