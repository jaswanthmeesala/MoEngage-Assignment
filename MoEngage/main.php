<?php
session_start();
if ((!isset($_SESSION['loggedin'])) || ($_SESSION['loggedin'] != true)) {
  header("location:login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Brewery Search</title>
  <link rel="stylesheet" href="./CSS/main.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body style="background-color: #fffbeb">
  <div id="grid1">
    <div id="box1">
      <div id="box2">


        <?php
        echo "<h1 id='user'>Hey <span>" . $_SESSION['username'] . "</span> Welcome !!!</h1>";
        ?>
        <button type="button" class="btn btn-danger" onclick="window.location='logout.php'">Log out</button>
      </div>
      <hr>
      <h2 id="h21">
        Your Search For <span> Perfect Brewery </span> Ends Here !!!
      </h2>
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend" id="part">
        <button type="button" class="btn btn-outline-secondary" id="search-button">
          Search
        </button>

        <select id="category">
          <option value="name">
            <p>By Name</p>
          </option>
          <option value="city">
            <p>By City</p>
          </option>
          <option value="state">
            <p>By State</p>
          </option>
        </select>
      </div>

      <input type="search" class="form-control" placeholder="Type here!!!" id="search-input" />
    </div>
  </div>
  <h1>Brewery List</h1>
  <div id="brewery-list" class="brewery-list">

  </div>
  <button id="show-more" class="show-more">Show More</button>

  <script src="./JS/main.js"></script>
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