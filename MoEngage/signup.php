<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brewery Search | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="./CSS/login.css" />
</head>

<body>
    <div id="div1">
        <form action="#" method="post">
            <fieldset>
                <legend>Signup</legend>
                <div class="mb-3">
                    <label for="username" class="form-label">User Name</label>
                    <input type="text" name="username" class="form-control" id="username" />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" />
                </div>
                <button type="submit" class="btn btn-primary" name="signup" value="signup">Signup</button>
            </fieldset>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>
<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brewery";
$connect1 = mysqli_connect($servername, $username, $password, $dbname);
if ($connect1) {
    // echo"connection OK";
    if (isset($_POST['signup'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $query = "SELECT * FROM login WHERE username='$user'";
        $data = mysqli_query($connect1, $query);
        $total = mysqli_num_rows($data);
        if ($total == 0) {
            $insert = "INSERT INTO `login`(`username`, `password`) VALUES ('$user','$pass')";
            $execute = mysqli_query($connect1, $insert);
            if ($execute) {
                echo "ACCOUNT CREATED SUCCESSFULLY";
                echo "please <a href='login.php'>Login</a>";
            } else {
                echo "<br><center>Error occuerred</center>";
            }
        } else {
            echo "<br><center>ALready User Exists</center>";
        }
    }
} else {
    echo "Connection-error Please Check!!";
}
?>