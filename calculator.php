<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>EcoTesla Calculator</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav>
    <ul class="nav">
      <li><a href="index.html">Home</a></li>
      <li><a href="calculator.php">EcoTesla Calculator</a></li>
      <li><a href="about.html">About</a></li>
    </ul>
  </nav>

  <section class="content">
    <h1>EcoTesla Energy Cost Calculator</h1>
    <p>Enter your trip distance and electricity rate to calculate your charging cost and carbon savings.</p>

    <form method="post" class="calc-form">
      <label>Trip Distance (miles):</label>
      <input type="number" name="miles" step="0.1" required>

      <label>Electricity Rate ($/kWh):</label>
      <input type="number" name="rate" step="0.01" required>

      <button type="submit" name="submit">Calculate</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
      $miles = $_POST['miles'];
      $rate = $_POST['rate'];

      // Tesla average efficiency: 4 miles per kWh
      $kwh_used = $miles / 4;
      $cost = $kwh_used * $rate;

      // Compare to gas vehicle (25 MPG, $3.50/gal)
      $gas_cost = ($miles / 25) * 3.50;
      $savings = $gas_cost - $cost;

      // CO2 savings (gas car ~19.6 lbs CO2 per gallon)
      $co2_saved = ($miles / 25) * 19.6; // in pounds

      echo "<div class='result-box'>";
      echo "<h3>Results:</h3>";
      echo "<p>Energy used: <strong>" . number_format($kwh_used, 2) . " kWh</strong></p>";
      echo "<p>Charging cost: <strong>$" . number_format($cost, 2) . "</strong></p>";
      echo "<p>Estimated gas cost: <strong>$" . number_format($gas_cost, 2) . "</strong></p>";
      echo "<p><strong>You save $" . number_format($savings, 2) . "</strong> and prevent <strong>" . number_format($co2_saved, 1) . " lbs</strong> of CO₂ emissions!</p>";
      echo "</div>";
    }
    ?>
  </section>
</body>
</html>
