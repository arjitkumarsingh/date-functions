$(document).ready(function () {
    $("#month-form").on("submit", function (event) {
        event.preventDefault();

        $.ajax({
            url: "../backend/calculate-weeks.php",
            method: "post",
            data: {
                month: $("#month").val()
            },
            success: function (response) {
                let totalWeek = parseInt(response);
                console.log(totalWeek);
                $("#show-days").html("");
                $("#show-weeks").html(response + " weeks");
                $("#week").html("<option value=''>Select Week</option>");
                for (let index = 1; index <= totalWeek; index++) {
                    $("#week").append(`<option value="${index}">${index}</option>`);
                }
            },
            error: function (err) {
                console.error(err);
                $("#show-weeks").html(err.responseText);
            }
        });
    });

    $("#week-form").on("submit", function (event) {
        event.preventDefault();

        $.ajax({
            url: "../backend/calculate-days.php",
            method: "post",
            data: {
                week: $("#week").val()
            },
            success: function (response) {
                console.log(response);
                $("#show-days").html(response);
            },
            error: function (response) {
                console.error(response);
                $("#show-days").html(response.responseText);
            }
        });
    });
});