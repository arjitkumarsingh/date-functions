<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["week"])) {
        http_response_code(400);
        $weekErr = "Week is required";
        echo $weekErr;
    } else {
        http_response_code(200);
        $week_number = $_POST["week"];
        getWeekStartAndEndDates($week_number);
    }
}

function getWeekStartAndEndDates($week_number) {
    $days = 7 - $_SESSION['predays'] - 1;
    $start_date = strtotime("+" . ($week_number - 1) * 7 - $_SESSION['predays'] . "days", $_SESSION['time_stamp']);
    $end_date = strtotime("+" . ($week_number - 1) * 7 + $days . "days", $_SESSION['time_stamp']);

    $start_date = date("j-m-Y", $start_date);
    $end_date = date("j-m-Y", $end_date);

    if ($week_number == 1) {
        $start_date = date("1-m-Y", $_SESSION['time_stamp']);
    }
    if ($week_number == $_SESSION['weeks']) {
        $end_date = date("t-m-Y", $_SESSION['time_stamp']);
    }
    echo "Start date: " . $start_date . "<br>";
    echo "End date: " . $end_date . "<br>";
}
?>