window.addEventListener('DOMContentLoaded', () => {
    jQuery(function ($) {
        $('.favorites-posts-menu a').on('click', (e) => {
            e.preventDefault();

            let favoritesPosts = $('.favorites-posts'),
                filterBy = e.target.dataset.type,
                sendData = [
                    { name: 'action', value: 'favorites_filter' },
                    { name: 'filterBy', value: filterBy }
                ];

            $('.favorites-posts-menu li').removeClass('favorites-posts-menu_active');
            $(e.target).parent('li').addClass('favorites-posts-menu_active');

            $.ajax({
                url: favorites_data.ajaxurl,
                data: sendData,
                type: 'POST',
                beforeSend: function (xhr) {
                    favoritesPosts.animate({ opacity: 0.7 }, 300);
                },
                success: function (posts) {
                    if (posts) {
                        favoritesPosts.html(posts);
                    }

                    favoritesPosts.animate({ opacity: 1 }, 300);

                }
            });

        });
    });

});