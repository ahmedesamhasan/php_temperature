<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>temp php</title>
  <style>
  body {
    background-color: #f1f1f1;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }

  h1 {
    color: #333;

  }

  button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;

  }

  button:hover {
    background-color: rgb(86, 86, 86);
  }

  .result {
    margin-top: 20px;
    padding: 10px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    font-weight: bold;
  }
  </style>
</head>

<body>
  <h1> temperature converter </h1>
  <form action="" method="post">
    <label for="temperature">Enter the temperature:"></label>
    <input type="number" name="temperature" id="temperature" placeholder="Enter the temperature" step="0.1" required>
    <br> <br>
    <label for="from_unit"> convert from :</label>
    <select name="from_unit" id="from_unit">
      <option value="celsius">Celsius</option>
      <option value="fahrenheit">Fahrenheit</option>
      <option value="kelvin">Kelvin</option>
    </select>
    <br> <br>
    <label for="to_unit">convert to:</label>
    <select name="to_unit" id="to_unit">
      <option value="celsius">Celsius</option>
      <option value="fahrenheit">Fahrenheit</option>
      <option value="kelvin">Kelvin</option>
    </select>
    <br> <br>
    <button type="submit" name="convert">Convert</button>
    <br> <br>

  </form>
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $temperature = $_POST['temperature'];
    $from_unit = $_POST['from_unit'];
    $to_unit = $_POST['to_unit'];
    function convertTemperature($temperature, $from_unit, $to_unit)
    {
      if ($from_unit == $to_unit) {
        return $temperature;
      }
      switch ($from_unit) {
        case 'celsius':
          if ($to_unit == 'fahrenheit') {
            return ($temperature * 9 / 5) + 32;
          } elseif ($to_unit == 'kelvin') {
            return $temperature + 273.15;
          }
          break;
        case 'fahrenheit':
          if ($to_unit == 'celsius') {
            return ($temperature - 32) * 5 / 9;
          } elseif ($to_unit == 'kelvin') {
            return ($temperature + 459.67) * 5 / 9;
          }
          break;
        case 'kelvin':
          if ($to_unit == 'celsius') {
            return $temperature - 273.15;
          } elseif ($to_unit == 'fahrenheit') {
            return ($temperature * 9 / 5) - 459.67;
          }
          break;
      }
      return null;
    }
    $result = convertTemperature($temperature, $from_unit, $to_unit);
    if ($result !== null) {
      echo '<div class="result">' . $result . ' ' . $to_unit . '</div>';
    } else {
      echo '<div class="result">Sorry, something went wrong</div>';
    }
    # code...
    echo "<div class='result'>Result: $temperature $from_unit = $result $to_unit</div>";
  }
  ?>
</body>

</html>