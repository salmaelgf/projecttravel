<?php
class Reservation {
    public $location;
    public $checkIn;
    public $checkOut;
    public $guests;
    public $email; 
    public $phone;
    

    public function __construct($location, $checkIn, $checkOut, $guests, $email, $phone) {
        $this->location = $location;
        $this->checkIn = $checkIn;
        $this->checkOut = $checkOut;
        $this->guests = $guests;
        $this->email = $email;
        $this->phone = $phone;
    }
    public function selectAllReservations($tableName, $conn) {
        $sql = "SELECT * FROM $tableName";
        $result = $conn->query($sql);

        $reservations = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $reservations[] = $row;
            }
        }

        return $reservations;
    }

    public function saveReservation($conn) {
        $sql = "INSERT INTO reservations (location, check_in, check_out, guests,email,phone) VALUES ('$this->location', '$this->checkIn', '$this->checkOut',  '$this->guests','$this->email','$this->phone')";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>



