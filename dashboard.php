<?php
session_start();
// Assuming the user is logged in and username is stored in session
$_SESSION['username'] = 'TB';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];

// Database connection
$conn = new mysqli("localhost", "root", "", "car");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_model = $_POST['car_model'];
    $rental_date = $_POST['rental_date'];
    $return_date = $_POST['return_date'];

    $sql = "INSERT INTO TB (username, car_model, rental_date, return_date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $car_model, $rental_date, $return_date);

    if ($stmt->execute()) {
        echo "Car rental selected successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch user's previous selections
$sql = "SELECT car_model, rental_date, return_date FROM TB WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style2.css" rel="stylesheet">
    <title>Car Rental Dashboard</title>
</head>
<body>
    <div class="container">
        <h2>Welcome to the Car Rental Dashboard</h2>
        <form method="post">
        <div class="select-wrapper">
        <div class="custom-select" style="width:200px;">
                <select id="car_model" name="car_model" required>
                    <option selected value="Random Car">Select Car Model</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Honda">Honda</option>
                    <option value="Ford">Ford</option>
                    <option value="BMW">BMW</option>
                </select>
            </div>
            <div class="form-group">
                <input type="date" id="rental_date" name="rental_date" placeholder="Select Rental Date" required>
            </div>
            <div class="form-group">
                <input type="date" id="return_date" name="return_date" placeholder="Select Return Date" required>
            </div>
            <button class="button-64" role="button" type="submit" name="submit"><span class="text">RENT</span></button>
        </div>
        </form>
        <script src="script2.js"></script>
        <h3>Previous Selections</h3>
        <table class="custom-table">
                <tr>
                    <th>Car Model</th>
                    <th>Rental Date</th>
                    <th>Return Date</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['car_model']; ?></td>
                        <td><?php echo $row['rental_date']; ?></td>
                        <td><?php echo $row['return_date']; ?></td>
                    </tr>
                <?php endwhile; ?>
        </table>
    </div>

    <?php
    $stmt->close();
    $conn->close();
    ?>
</body>
</html>
