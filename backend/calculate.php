<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["month"])) {
        $monthErr = "Month is required";
    } else {
        $date_time = $_POST["month"];
        $time_stamp = strtotime($date_time);

        $start_weekday = 7;  // 1 for Monday, 2 for Tuesday, ..., 7 for for Sunday 
        $weeks_in_month = getWeeksInMonth($time_stamp, $start_weekday);
        echo $weeks_in_month;
    }
}


function getWeeksInMonth($time_stamp, $start_weekday) {
    // Get the number of days in the month
    $days_in_month = date('t', $time_stamp);
    // echo "<br>days in month: " . $days_in_month . "<br>";

    // Get the day of the week for the first day(1 for Monday, 2 for Tuesday, ..., 7 for for Sunday )
    $first_day = date('N', $time_stamp);
    // echo "<br>starting day: " . $first_day . "<br>";

    // Days before starting day
    $before_first_day = ($first_day - $start_weekday + 7) % 7;
    // echo "<br>days before first day: " . $before_first_day . "<br>";

    // Calculate the number of weeks in the month
    $weeks_in_month = ceil(($days_in_month + $before_first_day) / 7);

    return $weeks_in_month;
}
?>