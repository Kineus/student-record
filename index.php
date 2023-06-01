<?php
$connection = new mysqli("localhost", "root", "", "form records");
// check if each field is not empty
if (!empty($_POST['Name']) && !empty($_POST['Email']) && !empty($_POST['Password']) && !empty($_POST['Phone']) && !empty($_POST['gender']) && !empty($_POST['Language']) && !empty($_POST['Zipcode']) && !empty($_POST['About'])) {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $phone = $_POST['Phone'];
    $gender = $_POST['gender'];
    $language = $_POST['Language'];
    $zipcode = $_POST['Zipcode'];
    $about = $_POST['About'];

    if ($connection->connect_error) {
        die("Connection Failed: " . $connection->connect_error);
    } else {
        $sql = "INSERT INTO `students`( `Name`, `Email`, `Password`, `Phone No`, `Gender`, `language`, `Zip Code`, `About`) VALUES ('$name', '$email', '$password', '$phone', '$gender', '$language', '$zipcode', '$about')";
        $result = $connection->query($sql);
        if ($result) {
            header("Location: success.php");
        }
    }
}

// --- Languages ---
$sql2 = "SELECT language FROM languages";
$result2 = mysqli_query($connection, $sql2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <nav>
            <h1>Student Records</h1>
            <ul>
                <li><a href="index.php" class="active">Register</a></li>
                <li><a href="records.php">Records</a></li>
            </ul>
        </nav>
        <form method="POST" action="index.php" onsubmit="return ValidateForm()" name="forms">
            <div class="heading">
                <img src="Temi.jpg" alt="">
                <h2>Registration</h2>
            </div>
            <div class="form-content">
                <div class="form-field">
                    <label for="name">Name</label>
                    <input type="text" id="name" placeholder="Your Name" name="Name" autocomplete="off">
                    <div class="error" id="name-error">please Input your Name</div>
                </div>
                <div class="form-field">
                    <label for="email">Email</label>
                    <input type="text" id="email" placeholder="Your Email" name="Email">
                    <div class="error" id="email-error">Please input your Email</div>
                </div>
                <div class="form-field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="Password">
                    <div class="error" id="password-error">Please input your Password</div>
                </div>
                <div class="form-field">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="Phone">
                    <div class="error" id="phone-error">Please input your phone number</div>
                </div>
                <div class="form-field">
                    <label for="">Gender</label>
                    <div class="radio">
                        <span>Male: <input type="radio" value="male" name="gender"></span>
                        <span>Female:<input type="radio" value="female" name="gender"></span>
                        <span>Others:<input type="radio" value="others" name="gender"></span>
                    </div>
                    <div class="error" id="gender-error">Please select a gender</div>
                </div>
                <div class="form-field">
                    <label for="languages">Languages</label>
                    <select name="Language" id="languages">
                        <option value="Select a Language">Select a Language</option>
                        <?php
                        if (mysqli_num_rows($result2) > 0) {
                            while ($row = mysqli_fetch_assoc($result2)) {
                                $selected_column = $row['language'];
                                echo "
                                    <option value= $selected_column >" . $selected_column . "</option>
                                    ";
                            }
                        }
                        ?>
                    </select>
                    <div class="error" id="language-error">Please select a language</div>
                </div>
                <div class="form-field">
                    <label for="zip-code">Zip Code</label>
                    <input type="number" id="zip-code" name="Zipcode">
                    <div class="error" id="zipcode-error">Please Input Zip Code</div>
                </div>
                <div class="form-field">
                    <label for="about">About</label><br>
                    <textarea name="About" id="about" placeholder="Write About Yourself ..."></textarea>
                    <div class="error" id="about-error">Please write about yourself</div>
                </div>

                <input type="submit" id="submit" value="Register">
            </div>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>