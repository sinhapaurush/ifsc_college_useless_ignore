<html>
<head>
    <title>IFSC Code Finder</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .result p {
            margin-bottom: 10px;
        }

        .result a {
            color: #007bff;
            text-decoration: none;
        }

        .result a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>IFSC Code Finder</h1>
    <?php
    if (isset($_POST['ifsc_code'])) {
        $ifsc_code = $_POST['ifsc_code'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ifsc";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM bank_details WHERE ifsc_code = '$ifsc_code'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h2>Bank Details for IFSC Code: $ifsc_code</h2>";
            echo "<p><strong>Bank Name:</strong> " . $row['bank_name'] . "</p>";
            echo "<p><strong>Branch:</strong> " . $row['branch'] . "</p>";
            echo "<p><strong>Address:</strong> " . $row['address'] . "</p>";
            echo "<p><strong>City:</strong> " . $row['city'] . "</p>";
            echo "<p><strong>State:</strong> " . $row['state'] . "</p>";
            echo "<p><strong>IFSC Code:</strong> " . $row['ifsc_code'] . "</p>";
        } else {
            echo "<p>Error: Bank details not found for IFSC code: $ifsc_code</p>";
        }

        $conn->close();
    }
    ?>
    <br>
    <a href="index.html">Search Again</a>
</body>

</html>