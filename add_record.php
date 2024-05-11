<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ifsc_code = $_POST['ifsc_code'];
    $bank_name = $_POST['bank_name'];
    $branch = $_POST['branch'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ifsc";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
        $sql = "INSERT INTO bank_details (ifsc_code, bank_name, branch, address, city, state)
            VALUES ('$ifsc_code', '$bank_name', '$branch', '$address', '$city', '$state')";

    if ($conn->query($sql) === TRUE) {
        echo "New record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
