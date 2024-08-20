<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Peserta - IKRIDA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        h2 {
            color: #007bff;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Data Peserta</h2>
        <form action="/ikrida_lomba/" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($participant['id']); ?>">

            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($participant['name']); ?>" required>

            <label for="address">Alamat:</label>
            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($participant['address']); ?>" required>

            <label for="age">Umur:</label>
            <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($participant['age']); ?>" required>

            <label for="competition">Pilih Perlombaan:</label>
            <select id="competition" name="competition" required>
                <option value="Sholawat Beregu" <?php if ($participant['competition'] == 'Sholawat Beregu') echo 'selected'; ?>>Sholawat Beregu</option>
                <option value="Adzan" <?php if ($participant['competition'] == 'Adzan') echo 'selected'; ?>>Adzan</option>
                <option value="Hafalan Surat" <?php if ($participant['competition'] == 'Hafalan Surat') echo 'selected'; ?>>Hafalan Surat</option>
                <option value="Fashion Show" <?php if ($participant['competition'] == 'Fashion Show') echo 'selected'; ?>>Fashion Show</option>
                <option value="Mewarnai" <?php if ($participant['competition'] == 'Mewarnai') echo 'selected'; ?>>Mewarnai</option>
            </select>

            <label for="class">Tingkatan Kelas:</label>
            <select id="class" name="class" required>
                <option value="TK" <?php if ($participant['class'] == 'TK') echo 'selected'; ?>>TK</option>
                <option value="SD" <?php if ($participant['class'] == 'SD') echo 'selected'; ?>>SD</option>
                <option value="SMP" <?php if ($participant['class'] == 'SMP') echo 'selected'; ?>>SMP</option>
            </select>

            <label for="class2">Kelas:</label>
            <input type="number" id="class2" name="class2" value="<?php echo htmlspecialchars($participant['class2']); ?>" required>

            <button type="submit">Update Data</button>
        </form>
        <a href="/ikrida_lomba/" class="back-link">Kembali ke Formulir</a>
    </div>
</body>

</html>