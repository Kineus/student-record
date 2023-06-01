<?php
$connection = new mysqli("localhost", "root", "", "form records");
if ($connection->connect_error) {
    die("Connection Failed: " . $connection->connect_error);
} else {
    $sql = "SELECT * FROM students";
    $result = mysqli_query($connection, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="record.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <div class="container">
        <nav>
            <h1>Student Records</h1>
            <ul>
                <li><a href="index.php">Register</a></li>
                <li><a href="records.php" class="active">Records</a></li>
            </ul>
        </nav>
        <div class="table-container">
            <div class="header">
                <h1>Records</h1>
                <form action="records.php" method="post" class="search-form">
                    <div class="search-box" id="search-box">
                        <input type="search" placeholder="Search Here ...">
                        <button type="submit" class="icon"><i class='bx bx-search'></i></button>
                    </div>
                </form>
                <button class="btn" id="search-close-btn">Search</button>
            </div>
            <div class="record-section">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>PASSWORD</th>
                        <th>PHONE</th>
                        <th>GENDER</th>
                        <th>LANGUAGE</th>
                        <th>ZIPCODE</th>
                        <th>ABOUT</th>
                    </tr>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            // $selected_column = $row['language'];
                            echo "
                                <tr>
                                    <td>" . $row['Id'] . "</td>
                                    <td>" . $row['Name'] . "</td>
                                    <td>" . $row['Email'] . "</td>
                                    <td>" . $row['Password'] . "</td>
                                    <td>" . $row['Phone No'] . "</td>
                                    <td>" . $row['Gender'] . "</td>
                                    <td>" . $row['language'] . "</td>
                                    <td>" . $row['Zip Code'] . "</td>
                                    <td>" . $row['About'] . "</td>
                                </tr>
                                ";
                        }
                    }
                    ?>
                </table>
            </div>

        </div>
    </div>
    <script src="record.js"></script>
</body>

</html>