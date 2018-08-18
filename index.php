<!DOCTYPE html>

<html>

<form action="index.php" method="get">
  <select name="year">
  <option value="">-</option>
  <?php for ($y = 1900; $y <=2030; $y++) : ?>
  <option value="<?php echo $y ?>"><?php echo $y ?></option>
  <?php endfor; ?>
  </select>年

  <select name="month">
  <option value="">-</option>
  <?php for ($j = 1; $j <=12; $j++) : ?>
  <option value="<?php echo $j ?>"><?php echo $j ?></option>
  <?php endfor; ?>
  </select>月
<input type="submit" name="submit" value="送信" />

</form>

<?php

ini_set('display_errors', 1);
include('calendar.php');

$year = $_GET['year'];
$month = $_GET['month'];

(new Calendar($year, $month))->show();
