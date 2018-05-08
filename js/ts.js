(function ($){
    $(document).ready(function () {

        $("header").animate({
            height: "70px"
        }, 1000, "easeOutSine");

        $("h2").slideDown(500);
        $("#task1 a").delay(600).slideDown(500);
        $("#task2 a").delay(1100).slideDown(500);
        $("#task3 a").delay(1700).slideDown(500);

        $("#task1").delay(600).slideDown(500);
        $("#task2").delay(600).slideDown(500);
        $("#task3").delay(600).slideDown(500);






    })
})(jQuery);
