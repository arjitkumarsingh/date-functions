<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // if (isset($_POST["month"])) {
        if (empty($_POST["month"])) {
            http_response_code(400);
            $monthErr = "Month is required";
            echo $monthErr;
        } else {
            http_response_code(200);
            $input = $_POST["month"];
            $time_stamp = strtotime($input);
            $_SESSION['time_stamp'] = $time_stamp;

            $start_weekday = 7;  // 1 for Monday, 2 for Tuesday, ..., 7 for for Sunday 
            $weeks_in_month = getWeeksInMonth($time_stamp, $start_weekday);
            echo $weeks_in_month;
        }
    // }
}

function getWeeksInMonth($time_stamp, $start_weekday) {
    // Get the number of days in the month
    $days_in_month = date('t', $time_stamp);

    // Get the first day of the month (1 for Monday, 2 for Tuesday, ..., 7 for for Sunday )
    $first_day = date('N', $time_stamp);

    // Days before starting day
    $before_first_day = ($first_day - $start_weekday + 7) % 7;
    $_SESSION['predays'] = $before_first_day;

    // Calculate the number of weeks in the month
    $weeks_in_month = ceil(($days_in_month + $before_first_day) / 7);
    $_SESSION['weeks'] = $weeks_in_month;
    return $weeks_in_month;
}

