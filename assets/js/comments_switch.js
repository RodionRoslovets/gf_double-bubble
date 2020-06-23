jQuery(function ($) {
    let actionObj = {
        action:'switch_comment_category',
        category:'category 1',
    };


    $('li.comments-categories__category').on('click', function(){
        actionObj.category = $(this).text();

        $('li.comments-categories__category').removeClass('comments-categories__category_active');

        $(this).addClass('comments-categories__category_active');

        filterPage('.comment-list', actionObj);
    });

    function filterPage(selector, obj) {
        $.ajax({
            url: ajax_new_filters.ajaxurl,
            type: 'POST',
            data: obj,
            beforeSend : function () {
                $(selector).animate({opacity: 0.3}, 200);
            },
            success: function (response) {
                $(selector).html(response)
                $(selector).animate({opacity: 1}, 200);
            }
        });
    }
});