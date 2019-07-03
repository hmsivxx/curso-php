<?php

require 'config.php';
require 'classes/Reservation.class.php';
require 'classes/Car.class.php';

$reservation = new Reservation($conn);
$car = new Car($conn);



?>

<h1>Reservation</h1>

<a href="reserve.php">Book Reservation</a>
<br/><br/>

<form method="get">
    <select name="year">
        <?php for($i = date('Y'); $i >= 2000; $i--): ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php endfor; ?>
    </select>
    <select name="month">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
    </select>
    <input type="submit" name="show" value="Show Reservations">
</form>

<?php
if (empty($_GET['year'])) {
    exit;
}

$date = $_GET['year'].'-'.$_GET['month'];
$firstDay = date('w', strtotime($date));
$qtyDays = date('t', strtotime($date));
echo "My first day is: {$firstDay}. That month has {$qtyDays} days<br>";
$calendarLines = ceil(($firstDay+$qtyDays) / 7);
$firstDay = -$firstDay;
$startDate = date('Y-m-d', strtotime($firstDay.' days', strtotime($date)));
$endDate = date('Y-m-d', strtotime(( ($firstDay + ($calendarLines*7) -1) ).' days', strtotime($date)));

echo "The calendar has {$calendarLines} lines<br>";
echo "Start date at {$startDate}<br>";
echo "End date at {$endDate}<br><br>";



$list = $reservation->getReservation($startDate, $endDate);

foreach ($list as $item) {
    $start_date = date('d/m/Y', strtotime($item['start_date']));
    $end_date = date('d/m/Y', strtotime($item['end_date']));
    echo "{$item['customer']} have reserved the {$item['id_car']} between {$start_date} and {$end_date}<br>";
}

echo "<hr>";
require 'calendar.php';
