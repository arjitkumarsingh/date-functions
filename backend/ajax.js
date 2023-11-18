$(document).ready(function () {
    $("#week-form").on("submit", function (event) {
        event.preventDefault();
        
        $.ajax({
            url: "../backend/calculate.php",
            method: "post",
            data: {
                month: $("#month").val()
            },
            success: function (response) {
                console.log(response);
                $("#week").html(response + " weeks");
            },
            error: function (response) {
                console.log(response);
            }
        });
    });
});