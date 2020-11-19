(function ($) {
    "use strict";
    $('.fancybox').fancybox();

    $(".filter-button").click(function () {
        var value = $(this).attr('data-group');

        if (value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.item').show('1000');
        } else
        {

            $(".item").not('.' + value).hide('3000');
            $('.item').filter('.' + value).show('3000');

        }
        $(".filter-button").removeClass('active');
        $(this).addClass("active");
    });



})(jQuery);
