/*
 * UI - Alerts
 */
$(document).ready(function () {

setTimeout(function () {
        $('.card-alert').fadeOut('300');
    }, 5000)
    });
$(".card-alert .close").click(function () {
    $(this)
        .closest(".card-alert")
        .fadeOut("slow");
});
