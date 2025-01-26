<?php
session_start();

if (!empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['number']) && !empty($_POST['address'])) {
  $data = date("Y-m-d H:i:s");

  $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
  $age = filter_var($_POST['age'], FILTER_VALIDATE_INT);
  $number = filter_var($_POST['number'], FILTER_VALIDATE_INT);
  $address = htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8');

  if ($age === false || $age < 1 || $age > 120) {
    die("<h2>age is not right</h2></h2>");
  }

  if ($number === false || strlen((string)$number) != 10) {
    die("<h2>number is not right </h2>");
  }

  $_SESSION['data'] = $data;
  $_SESSION['name'] = $name;
  $_SESSION['age'] = $age;
  $_SESSION['number'] = $number;
  $_SESSION['address'] = $address;

  echo "<h2>done</h2>";
  echo "<p>data: $data <br> name: $name <br> age: $age <br> phone: $number <br> address: $address</p>";
  echo "<table border='1'>";
  echo "<thead><tr><th>data</th><th>name</th><th>age</th><th>phone</th><th>address</th></tr></thead>";
  echo "<tbody><tr><td>$data</td><td>$name</td><td>$age</td><td>$number</td><td>$address</td></tr></tbody>";
  echo "</table>";
} else {
  echo "<h2>fill all required filled</h2>";
}
