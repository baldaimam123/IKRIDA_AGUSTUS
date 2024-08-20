<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKRIDA Competition Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            background-image: url('asset/indoo.jpg');
            background-size: cover;
            background-position: center;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            color: #004d00;
        }

        .header a {
            text-decoration: none;
            color: #004d00;
            background-color: #fff;
            padding: 10px 20px;
            border: 1px solid #004d00;
            border-radius: 4px;
        }

        .header a:hover {
            background-color: #004d00;
            color: #fff;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
        }

        h2 {
            color: #004d00;
        }

        label {
            display: block;
            margin-left: 15px;
        }

        input {
            width: 95%;
            padding: 8px;
            margin: 10px auto;
            /* Ini membuat elemen berada di tengah secara horizontal */
            border: 1px solid #ccc;
            border-radius: 4px;
            display: block;
            /* Pastikan elemen menjadi block-level untuk memanfaatkan margin auto */
        }

        select {
            width: 95%;
            padding: 8px;
            margin: 10px;
            /* Ini membuat elemen berada di tengah secara horizontal */
            border: 1px solid #ccc;
            border-radius: 4px;
            display: block;
        }

        input:focus,
        select:focus {
            border-color: #004d00;
            /* Warna hijau */
            box-shadow: 0 0 5px rgba(0, 77, 0, 0.5);
            /* Efek bayangan hijau */
        }

        button {
            padding: 10px 20px;
            background-color: #004d00;
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
            color: #004d00;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .participants-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .participants-table th,
        .participants-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .participants-table th {
            background-color: #004d00;
            color: white;
        }

        @media (max-width: 480px) {
            .header a {
                font-size: 14px;
            }

            .container {
                padding: 10px;
            }

            input,
            select {
                font-size: 14px;
            }

            button {
                font-size: 14px;
                padding: 8px 12px;
            }

            .container {
                font-size: 12px;
                overflow-x: auto;
                display: block;
            }

            .participants-table {
                font-size: 12px;
                overflow-x: auto;
                display: block;
            }

            .participants-table th,
            .participants-table td {
                padding: 6px;
            }
        }
    </style>
    <script>
        function updateClassOptions() {
            var competition = document.getElementById('competition').value;
            var classSelect = document.getElementById('class');
            var class2Input = document.getElementById('class2');

            // Reset the class select options
            classSelect.innerHTML = '';
            class2Input.value = '';

            // Define class options based on competition
            var options = {
                'Sholawat Beregu': ['SD', 'SMP'],
                'Adzan': ['SD', 'SMP'],
                'Hafalan Surat': ['SD'],
                'Fashion Show': ['SD'],
                'Mewarnai': ['TK', 'SD']
            };

            var classes = options[competition] || [];
            classes.forEach(function(cls) {
                var option = document.createElement('option');
                option.value = cls;
                option.textContent = cls;
                classSelect.appendChild(option);
            });

            // Set default value to the first option if any
            if (classes.length > 0) {
                classSelect.value = classes[0];
            }
        }

        function validateForm() {
            var competition = document.getElementById('competition').value;
            var classValue = document.getElementById('class').value;
            var validClasses = {
                'Sholawat Beregu': ['SD', 'SMP'],
                'Adzan': ['SD', 'SMP'],
                'Hafalan Surat': ['SD'],
                'Fashion Show': ['SD'],
                'Mewarnai': ['TK', 'SD']
            };

            var allowedClasses = validClasses[competition] || [];

            if (allowedClasses.indexOf(classValue) === -1) {
                alert('Perlombaan yang dipilih tidak sesuai dengan kriteria tingkatan kelas.');
                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }
    </script>
</head>

<body>
    <div class="header">
        <a href="/ikrida_lomba/login.php">Login</a>
    </div>

    <div class="container">
        <p>Mewarnai (TK - 6SD) * Adzan (SD - SMP) * Sholawatan Beregu (SD - SMP) * Fashion Show (SD) * Hafalan Surat/Qur'an (SD)</p>
        <h2>Formulir Perlombaan Agustusan IKRIDA</h2>
        <form action="" method="POST" onsubmit="return validateForm()">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Alamat:</label>
            <input type="text" id="address" name="address" required>

            <label for="age">Umur:</label>
            <input type="number" id="age" name="age" required>

            <label for="competition">Pilih Perlombaan:</label>
            <select id="competition" name="competition" required onchange="updateClassOptions()">
                <option value="Sholawat Beregu">Sholawat Beregu</option>
                <option value="Adzan">Adzan</option>
                <option value="Hafalan Surat">Hafalan Surat</option>
                <option value="Fashion Show">Fashion Show</option>
                <option value="Mewarnai">Mewarnai</option>
            </select>

            <label for="class">Tingkatan Kelas:</label>
            <select id="class" name="class" required>
                <option value="TK">TK</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
            </select>

            <label for="class2">Kelas:</label>
            <input type="number" id="class2" name="class2" required>

            <button type="submit">Submit</button>
        </form>

        <div>
            <h3>Data Peserta Berdasarkan Perlombaan</h3>
            <?php foreach ($participants as $competition => $list): ?>
                <h4><?php echo htmlspecialchars($competition); ?></h4>
                <table class="participants-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Umur</th>
                            <th>Tingkatan Kelas</th>
                            <th>Kelas</th>
                            <th>Perlombaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($list)): ?>
                            <?php foreach ($list as $participant): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($participant['name']); ?></td>
                                    <td><?php echo htmlspecialchars($participant['address']); ?></td>
                                    <td><?php echo htmlspecialchars($participant['age']); ?></td>
                                    <td><?php echo htmlspecialchars($participant['class']); ?></td>
                                    <td><?php echo htmlspecialchars($participant['class2']); ?></td>
                                    <td><?php echo htmlspecialchars($participant['competition']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3">Tidak ada data peserta untuk perlombaan ini.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            <?php endforeach; ?>
            <a href="/ikrida_lomba/" class="back-link">Kembali ke Formulir</a>
        </div>
    </div>
</body>

</html>