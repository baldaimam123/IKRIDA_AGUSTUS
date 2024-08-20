<?php

class Participant
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function addParticipant($name, $address, $age, $competition, $class, $class2)
    {
        $query = "INSERT INTO participants (name, address, age, competition, class, class2) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($this->conn->error));
        }

        $stmt->bind_param("ssssss", $name, $address, $age, $competition, $class, $class2);

        if (!$stmt->execute()) {
            die('Execute failed: ' . htmlspecialchars($stmt->error));
        }

        return true;
    }


    public function getLastInsertId()
    {
        return $this->conn->insert_id;
    }

    public function getParticipantById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM participants WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateParticipant($id, $name, $address, $age, $competition, $class, $class2)
    {
        $stmt = $this->conn->prepare("UPDATE participants SET name = ?, address = ?, age = ?, competition = ?, class = ?, class2 = ? WHERE id = ?");

        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($this->conn->error));
        }

        $stmt->bind_param("ssisssi", $name, $address, $age, $competition, $class, $class2, $id);

        if (!$stmt->execute()) {
            die('Execute failed: ' . htmlspecialchars($stmt->error));
        }

        return true;
    }


    public function getAllCompetitions()
    {
        $stmt = $this->conn->query("SELECT DISTINCT competition FROM participants");
        $competitions = [];
        while ($row = $stmt->fetch_assoc()) {
            $competitions[] = $row['competition'];
        }
        return $competitions;
    }

    public function getParticipantsByCompetition($competition)
    {
        $stmt = $this->conn->prepare("SELECT * FROM participants WHERE competition = ?");
        $stmt->bind_param("s", $competition);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Fungsi login
    public function authenticate($username, $password)
    {
        // Menyiapkan query untuk mencari user berdasarkan username
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Jika user ditemukan, memverifikasi password
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }
}
