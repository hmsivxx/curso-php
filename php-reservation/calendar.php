
<table border=1 width="100%" style="border-collapse: collapse; padding:40px;">
    <tr>
        <th>Sunday</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Sunday</th>
    </tr>
    <?php $count = 1; ?>
    <?php for($i = 0; $i < $calendarLines; $i++): ?>
        <tr>
            <?php for($j = 0; $j < 7; $j++): ?>
                <?php
                    $calendarDay = date('d', strtotime(($j+($i*7)).' days', strtotime($startDate)));

// -------------------------- MAKING GREY DAYS THAT AREN'T FROM THE CURRENT MONTH ------------------
                    if ($count <= 7) {
                        if($calendarDay > 10) {
                            $color = 'grey';
                        } else {
                            $color = 'black';
                        }
                    }
                    if ($count > 28 && $count <= 42 ) {
                        if($calendarDay < 10) {
                            $color = 'grey';
                        } else {
                            $color = 'black';
                        }
                    }
//--------------------------------------------------------------------------------------------------
                ?>
                <td style="color: <?php echo $color ?>">
                    <?php
                        echo $calendarDay."<br><br>";
                        $calendarDay = date(strtotime(($j+($i*7)).' days', strtotime($startDate)));;

                        foreach ($list as $item) {
                            $reservationStartDate = strtotime($item['start_date']);
                            $reservationEndDate = strtotime($item['end_date']);


                            if ($calendarDay >= $reservationStartDate && $calendarDay <= $reservationEndDate) {
                                echo $item['customer'].'<br>';
                            }
                        }
                    ?></td>
                <?php $count++; ?>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
</table>
