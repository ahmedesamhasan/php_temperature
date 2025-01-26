<?php
session_start();

if (!isset($_SESSION['poll_results'])) {
  $_SESSION['poll_results'] = [
    'Red' => 0,
    'Blue' => 0,
    'Green' => 0,
    'Yellow' => 0,
  ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['vote'])) {
  $vote = $_POST['vote'];
  if (isset($_SESSION['poll_results'][$vote])) {
    $_SESSION['poll_results'][$vote]++;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Polling System</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      padding: 0;
      line-height: 1.6;
    }

    h1 {
      color: #333;
    }

    form {
      margin-bottom: 20px;
    }

    button {
      background-color: #007BFF;
      color: #fff;
      border: none;
      padding: 10px 15px;
      cursor: pointer;
      border-radius: 5px;
    }

    button:hover {
      background-color: #0056b3;
    }

    ul {
      list-style-type: none;
      padding: 0;
    }

    ul li {
      margin: 5px 0;
    }
  </style>
</head>

<body>
  <h1>Simple Polling System</h1>

  <form action="" method="POST">
    <p>What is your favorite color?</p>
    <?php foreach ($_SESSION['poll_results'] as $option => $votes) : ?>
      <div>
        <input type="radio" id="<?php echo htmlspecialchars($option); ?>" name="vote"
          value="<?php echo htmlspecialchars($option); ?>" required>
        <label for="<?php echo htmlspecialchars($option); ?>"><?php echo htmlspecialchars($option); ?></label>
      </div>
    <?php endforeach; ?>
    <button type="submit">Vote</button>
  </form>

  <!-- عرض نتائج التصويت -->
  <h2>Poll Results</h2>
  <ul>
    <?php foreach ($_SESSION['poll_results'] as $option => $votes) : ?>
      <li><?php echo htmlspecialchars($option); ?>: <strong><?php echo htmlspecialchars($votes); ?></strong> votes</li>
    <?php endforeach; ?>
  </ul>
</body>

</html>
