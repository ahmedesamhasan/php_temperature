<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>form in php</title>
</head>

<body>
  <form action="process.php" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    <br><br><br>
    <label for="age">Age:</label>
    <input type="number" name="age" id="age" required>
    <br><br><br>
    <label for="number">Number:</label>
    <input type="number" name="number" id="number" required>
    <br><br><br>
    <label for="address">Address:</label>
    <input type="text" name="address" id="address" required>
    <br><br><br>
    <input type="submit" value="submit">


  </form>

</body>

</html>
