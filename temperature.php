<?php

require_once('includes/functions.php');

$from_value = '';
$from_unit = '';
$to_unit = '';
$to_value = '';

if(isset($_POST['submit'])) {
  $from_value = $_POST['from_value'];
  $from_unit = $_POST['from_unit'];
  $to_unit = $_POST['to_unit'];
  
  $to_value = convert_temperature($from_value, $from_unit, $to_unit);
}

$temp_options = array(
  "Celsius",
  "Fahrenheit",
  "Kelvin"
);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Convert Temperature</title>
    <link href="Styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>

    <div id="main-content">

      <h1>Convert Temperature</h1>
  
      <form action="" method="post">
        
        <div class="entry">
          <label for="temp_value_from">From:</label>&nbsp;
          <input type="text" id="temp_value" name="from_value_from" value="<?php echo $from_value; ?>" />&nbsp;
          <select name="from_unit">
            <?php
            foreach($temp_options as $unit) {
              $opt = optionize($unit);
              echo "<option value=\"{$opt}\"";
              if($from_unit == $opt) { echo " selected"; }
              echo ">{$unit}</option>";
            }
            ?>
          </select>
        </div>
        
        <div class="entry">
          <label for="from_value_to">To:</label>&nbsp;
          <input type="text" id="from_value_to" name="to_value" value="<?php echo float_to_string($to_value); ?>" />&nbsp;
          <select name="to_unit">
            <?php
            foreach($temp_options as $unit) {
              $opt = optionize($unit);
              echo "<option value=\"{$opt}\"";
              if($to_unit == $opt) { echo " selected"; }
              echo ">{$unit}</option>";
            }
            ?>
          </select>
          
        </div>
        
        <input type="submit" name="submit" value="Submit" />
      </form>
  
      <br />
        <a class="return_menu" href="index.php">Return to menu</a>
      
    </div>
  </body>
</html>
