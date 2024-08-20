<?php
class FormController
{
    private $participantModel;

    public function __construct($conn)
    {
        $this->participantModel = new Participant($conn);
    }

    public function handleFormSubmission()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['id'])) {
            // Tambah data baru
            $name = $_POST['name'];
            $address = $_POST['address'];
            $age = $_POST['age'];
            $competition = $_POST['competition'];
            $class = $_POST['class']; // Tambah parameter class
            $class2 = $_POST['class2']; // Tambah parameter class

            if (!empty($name) && !empty($address) && !empty($age) && !empty($competition) && !empty($class) && !empty($class2)) {
                if ($this->participantModel->addParticipant($name, $address, $age, $competition, $class, $class2)) {
                    $participantId = $this->participantModel->getLastInsertId();
                    include_once __DIR__ . '/../views/success.php';
                } else {
                    echo "Error: Could not save participant data.";
                }
            } else {
                echo "All fields are required.";
            }
        } elseif (isset($_GET['id'])) {
            // Tampilkan form edit
            $participantId = $_GET['id'];
            $participant = $this->participantModel->getParticipantById($participantId);
            include_once __DIR__ . '/../views/edit.php';
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
            // Perbarui data
            $id = $_POST['id'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $age = $_POST['age'];
            $competition = $_POST['competition'];
            $class = $_POST['class']; // Tambah parameter class
            $class2 = $_POST['class2']; // Tambah parameter class

            if ($this->participantModel->updateParticipant($id, $name, $address, $age, $competition, $class, $class2)) {
                include_once __DIR__ . '/../views/success.php';
            } else {
                echo "Error: Could not update participant data.";
            }
        } else {
            $competitions = $this->participantModel->getAllCompetitions();
            $participants = [];
            foreach ($competitions as $competition) {
                $participants[$competition] = $this->participantModel->getParticipantsByCompetition($competition);
            }
            include_once __DIR__ . '/../views/form.php';
        }
    }
}
