<?php

require 'config.php';
require 'classes/Reservation.class.php';
require 'classes/Car.class.php';

$reservation = new Reservation($conn);
$car = new Car($conn);

if (isset($_POST['carId'])) {
    $carId = addslashes($_POST['carId']);
    $startDate = explode("/", addslashes($_POST['start_date']));
    $endDate = explode("/", addslashes($_POST['end_date']));
    $customerName = addslashes($_POST['name']);

    $startDate = $startDate[2].'-'.$startDate[1].'-'.$startDate[0];
    $endDate = $endDate[2].'-'.$endDate[1].'-'.$endDate[0];

    if ($reservation->checkAvailability($carId, $startDate, $endDate)) {
        $reservation->reserve($carId, $startDate, $endDate, $customerName);
        header("Location: index.php");
        exit;
    } else {
        echo "This car is already reserved on that period. Please choose another car";
        exit;
    }
}
?>
<h1>Book reservation</h1>

<form method="post">
    Car:<br/>
    <select name="carId">
        <?php
            $list = $car->getCarName();
            foreach ($list as $item){
                $id = $item['id'];
                echo "<option value='{$id}'>{$item['name']}</option>";
            }
         ?>
    </select><br/><br/>

    Start date:<br/>
    <input type="text" name="start_date"><br/><br/>

    End date:<br/>
    <input type="text" name="end_date"><br/><br/>

    Name:<br/>
    <input type="text" name="name"><br/><br/>

    <input type="submit" name="submit" value="Book it">
</form>
