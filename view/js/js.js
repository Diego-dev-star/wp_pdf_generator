// auto complite field
jQuery(document).ready(function ($) {
    $("#atr-1").keyup(function () {
        var value = $(this).val();
        $("#atr-2, #atr-3, #atr-4, #atr-5, #atr-6, #atr-7 ").val(value);
    }).keyup();


});