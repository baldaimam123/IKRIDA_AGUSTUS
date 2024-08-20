<?php
session_start(); // Memulai session

// Cek apakah pengguna sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}

// Koneksi ke database
$servername = "localhost"; // Ganti dengan server database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "ikrida"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menghapus data peserta jika tombol hapus diklik
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM participants WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $message = "Data berhasil dihapus.";
    } else {
        $message = "Terjadi kesalahan: " . $stmt->error;
    }
    $stmt->close();
}

// Mengambil data peserta
$sql = "SELECT * FROM participants";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .logout {
            background-color: #f44336;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: block;
            margin-bottom: 20px;
            text-align: center;
        }

        .logout:hover {
            background-color: #d32f2f;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            word-wrap: break-word;
        }

        th {
            background-color: #f4f4f4;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-delete:hover {
            background-color: #d32f2f;
        }

        .message {
            color: green;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }

            th,
            td {
                padding: 8px;
            }

            .btn-delete {
                padding: 3px 6px;
                font-size: 12px;
            }

            .logout {
                padding: 8px;
            }
        }
    </style>
</head>
<script>
    function confirmLogout() {
        return confirm('Apakah Anda yakin ingin keluar?');
    }
</script>

<body>
    <div class="container">
        <h1>Selamat Datang di Halaman Utama</h1>

        <?php if (isset($message)) { ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php } ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Umur</th>
                    <th>Tingkat Kelas</th>
                    <th>Kelas</th>
                    <th>Perlombaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['address']); ?></td>
                            <td><?php echo htmlspecialchars($row['age']); ?></td>
                            <td><?php echo htmlspecialchars($row['class']); ?></td>
                            <td><?php echo htmlspecialchars($row['class2']); ?></td>
                            <td><?php echo htmlspecialchars($row['competition']); ?></td>
                            <td>
                                <form method="post" action="" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                    <input type="submit" name="delete" value="Hapus" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                </form>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="7">Tidak ada data peserta.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="logout.php" class="logout" onclick="return confirmLogout();">Logout</a>
    </div>
</body>

</html>

<?php
$conn->close();
?>