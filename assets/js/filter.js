jQuery(function ($) {


    // Контейнер с контентом
    let mainBox = $('#response');

    // Отправка ajax запроса при клике по ссылке пагинации
    mainBox.on('click', '.pagination .nav-links a', function (e) {
        e.preventDefault();

        let linkPage = $(this).attr('href');
        let titlePage = $(this).text();

        history.pushState({ page_title: titlePage }, '', linkPage);

        ajaxPage(linkPage);

    });

    // Отслеживание события нажатия кнопок браузера Вперед/Назад
    window.addEventListener("popstate", function (e) {
        document.title = e.state.page_title;
        ajaxPage(location.href);
    }, false);

    let count_page = '';
    mainBox.on('input', '.pagination-left form input', function () {
        count_page = $(this).val();
    });

    let select = '';
    $('.filter-grid').on('change', 'select', function () {
        select = $(this).val();
    });

    let stars_value = '';

    // $('.search-filter').on('input','input', function (e) {
    //     stars_value = $(this).val();
    //     console.log(stars_value);
    // });

    // $('.search-filter').on('click', 'input', (function () {
    //     console.log(1);
    // }));

    //Villa

    let dataTerms = [];

    $('.search-filter.search-villas').on('change', 'form', function () {
        let filterTax = $(this);
        dataTerms = filterTax.serializeArray();
        let val = $("#slider-range").slider('values');
        let min_price = val[0];
        let max_price = val[1];

        let districts = [...document.querySelectorAll('.search-subdistrict input[type="checkbox"]')]
            .filter(checkbox=>checkbox.checked)
            .map(checkbox=>checkbox.value);

        // console.log(dataTerms);
        // console.log(districts);
        // let linkP = location.href;
        dataTerms.push(
            // {name: "link", value: linkP},
            { name: "action", value: 'myfilter' },
            { name: "min_price", value: min_price },
            { name: "max_price", value: max_price },
            // { name: "count_page", value: count_page },
            { name: "grid-price", value: select },
            { name: "count_page", value: count_page },
            { name: "districts", value: districts },
        );
        $.ajax({
            url: ajax_pagination.ajaxurl,
            data: dataTerms,
            type: 'POST',
            beforeSend: function (xhr) {
                $('.search-filter.search-villas .search-villas__overlay').fadeIn(300);
                mainBox.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {
                if (posts) {

                    mainBox.html(posts); // insert new posts
                }
                $('.search-filter.search-villas .search-villas__overlay').fadeOut(300);
                mainBox.animate({ opacity: 1 }, 300);

            }

        });

    });



    // Main pagination
    function ajaxPage(linkPage) {
        // let linkP = location.href;
        // console.log(select);
        let filter = $(this);
        let dataArray = filter.serializeArray();
        let val = $("#slider-range").slider('values');
        let min_price = val[0];
        let max_price = val[1];
        dataArray.push(
            { name: "action", value: 'myfilter' },
            { name: "link", value: linkPage, },
            { name: "min_price", value: min_price },
            { name: "max_price", value: max_price },
            { name: "count_page", value: count_page },
            { name: "grid-price", value: select },
            { name: "average_rating", value: stars_value },
            ...dataTerms
        );
        $.ajax({
            url: ajax_pagination.ajaxurl,
            data: dataArray,
            type: 'POST',
            beforeSend: function (xhr) {
                mainBox.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {
                if (posts) {

                    mainBox.html(posts); // insert new posts
                    // console.log(dataArray);
                }

                mainBox.animate({ opacity: 1 }, 300);

            }

        });
    }

    $("#slider-range").slider({
        stop: function (event, ui) {
            // let linkP = location.href;
            let filter = $(this);
            let dataArray = filter.serializeArray();
            let val = $("#slider-range").slider('values');
            let min_price = val[0];
            let max_price = val[1];
            dataArray.push(
                { name: "action", value: 'myfilter' },
                // {name: "link", value: linkP,},
                { name: "min_price", value: min_price },
                { name: "max_price", value: max_price },
                { name: "count_page", value: count_page },
                { name: "grid-price", value: select },
                ...dataTerms
            );
            // console.log(`$("#slider-range").slider`)
            $.ajax({
                url: ajax_pagination.ajaxurl, // обработчик
                data: dataArray, // данные
                type: 'POST',
                beforeSend: function (xhr) {
                    mainBox.animate({ opacity: 0.4 }, 300);
                },
                success: function (posts) {

                    mainBox.html(posts);
                    // console.log(dataTerms);

                    mainBox.animate({ opacity: 1 }, 300);

                }
            });
        }
    });




    mainBox.on('input', '.pagination-left form', function (e) {
        e.preventDefault();
        // console.log(this);
        let linkP = location.href;
        let filter = $(this);
        let dataArray = filter.serializeArray();
        let val = $("#slider-range").slider('values');
        let min_price = val[0];
        let max_price = val[1];
        dataArray.push(
            { name: "action", value: 'myfilter' },
            // {name: "link", value: linkP,},
            { name: "min_price", value: min_price },
            { name: "max_price", value: max_price },
            { name: "grid-price", value: select },
            ...dataTerms
        );
        
        $.ajax({
            url: ajax_pagination.ajaxurl, // обработчик
            data: dataArray, // данные
            type: filter.attr('method'), // тип запроса
            beforeSend: function (xhr) {
                mainBox.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {

                mainBox.html(posts);

                mainBox.animate({ opacity: 1 }, 300);

            }
        });
        return false;
    });


    // Filter price high and low
    $('.filter-grid form').on('change', '.filter-grid__price', function () {
        let linkP = location.href;
        let filter = $(this);
        let dataArray = filter.serializeArray();
        let val = $("#slider-range").slider('values');
        let min_price = val[0];
        let max_price = val[1];
        dataArray.push(
            { name: "action", value: 'myfilter' },
            // {name: "link", value: linkP,},
            { name: "min_price", value: min_price },
            { name: "max_price", value: max_price },
            { name: "count_page", value: count_page },
            // {name: "meta_value_num", value: 'meta_value_num'},
            ...dataTerms
        );
        $.ajax({
            url: ajax_pagination.ajaxurl,
            data: dataArray,
            type: 'POST',
            beforeSend: function (xhr) {
                mainBox.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {
                if (posts) {

                    mainBox.html(posts); // insert new posts
                    // console.log(dataArray);
                }

                mainBox.animate({ opacity: 1 }, 300);

            }

        });
    });







    // Events
    // Контейнер с контентом
    let mainBoxEvents = $('#response-events');

    // Отправка ajax запроса при клике по ссылке пагинации
    mainBoxEvents.on('click', '.pagination .nav-links a', function (e) {
        e.preventDefault();

        let linkPageEvents = $(this).attr('href');
        let titlePageEvents = $(this).text();

        history.pushState({ page_title: titlePageEvents }, '', linkPageEvents);

        ajaxPageEvents(linkPageEvents);

    });

    // Отслеживание события нажатия кнопок браузера Вперед/Назад
    window.addEventListener("popstate", function (e) {
        document.title = e.state.page_title;
        ajaxPageEvents(location.href);
    }, false);

    let count_page_events = '10';
    mainBoxEvents.on('input', '.pagination-left form input', function () {
        count_page_events = $(this).val();
    });
    //
    // let select = '';
    // $('.filter-grid').on('change', 'select', function () {
    //     select = $(this).val();
    // });

    let date_value = '';
    $('.filter-grid-events form').on('change', 'select', function () {
        date_value = $(this).val();
        // console.log(date_value);
    });


    // Ajax функция
    function ajaxPageEvents(linkPageEvents) {
        // let linkP = location.href;
        // console.log(select);
        let filter = $(this);
        let dataArray = filter.serializeArray();
        let val = $("#slider-range").slider('values');
        let min_price = val[0];
        let max_price = val[1],
        selectedDistrict = document.querySelectorAll('.events-form .filter-grid-events__district')[0].value,
        selectedDayNight = document.querySelectorAll('.events-form .filter-grid-events__day-night')[0].value;
        dataArray.push(
            { name: "action", value: 'events' },
            { name: "link", value: linkPageEvents },
            { name: "min_price", value: min_price },
            { name: "max_price", value: max_price },
            { name: "count_page", value: count_page_events },
            { name: "grid-price", value: select },
            { name: "grid-date", value: date_value },
            {name:'grid-district', value:selectedDistrict},
            {name:'grid-day-night', value:selectedDayNight},
        );
        // console.log(dataArray);
        $.ajax({
            url: ajax_pagination.ajaxurl,
            data: dataArray,
            type: 'POST',
            beforeSend: function (xhr) {
                mainBoxEvents.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {
                if (posts) {

                    mainBoxEvents.html(posts); // insert new posts
                }

                mainBoxEvents.animate({ opacity: 1 }, 300);

            }

        });

    }

    mainBoxEvents.on('input', '.pagination-left form', function (e) {
        e.preventDefault();
        // console.log(this);
        let linkP = location.href;
        let filter = $(this);
        let dataArray = filter.serializeArray();
        let val = $("#slider-range").slider('values');
        let min_price = val[0];
        let max_price = val[1],
        selectedDistrict = document.querySelectorAll('.events-form .filter-grid-events__district')[0].value,
        selectedDayNight = document.querySelectorAll('.events-form .filter-grid-events__day-night')[0].value;
        dataArray.push(
            { name: "action", value: 'events' },
            {name:'grid-district', value:selectedDistrict},
            {name:'grid-day-night', value:selectedDayNight},
            // {name: "grid-date", value: date_value},
            // {name: "link", value: linkP,},
            // {name: "min_price", value: min_price},
            // {name: "max_price", value: max_price},
            // {name: "grid-price", value: select},
            // { name: "count_page", value: count_page_events },
        );
        // console.log(dataArray);
        $.ajax({
            url: ajax_pagination_events.ajaxurl, // обработчик
            data: dataArray, // данные
            type: filter.attr('method'), // тип запроса
            beforeSend: function (xhr) {
                mainBoxEvents.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {

                mainBoxEvents.html(posts);

                mainBoxEvents.animate({ opacity: 1 }, 300);

            }
        });
        return false;
    });

    $('.filter-grid-events').on('change', 'form.events-form', function () {
        // console.log(this);
        let date_value = '';
        let linkP = location.href;
        let filter = $(this);
        let dataArray = filter.serializeArray();
        // let val = $( "#slider-range" ).slider('values');
        // let min_price = val[0];
        // let max_price = val[1];
        dataArray.push(
            { name: "action", value: 'events' },
            // {name: "link", value: linkP,},
            // {name: "min_price", value: min_price},
            // {name: "max_price", value: max_price},
            { name: "count_page", value: count_page_events },
            // {name: "grid-date", value: date_value},
            // {name: "meta_value_num", value: 'meta_value_num'},
        );
        // console.log(dataArray);
        $.ajax({
            url: ajax_pagination_events.ajaxurl,
            data: dataArray,
            type: 'POST',
            beforeSend: function (xhr) {
                mainBoxEvents.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {
                if (posts) {

                    mainBoxEvents.html(posts); // insert new posts
                }

                mainBoxEvents.animate({ opacity: 1 }, 300);

            }

        });
    });



    // Restaurants
    // Контейнер с контентом
    let mainBoxRestaurants = $('#response-restaurants');

    // Отправка ajax запроса при клике по ссылке пагинации
    mainBoxRestaurants.on('click', '.pagination .nav-links a', function (e) {
        e.preventDefault();

        let linkPageRestaurants = $(this).attr('href');
        let titlePageRestaurants = $(this).text();

        history.pushState({ page_title: titlePageRestaurants }, '', linkPageRestaurants);

        ajaxPageRestaurants(linkPageRestaurants);

    });

    // Отслеживание события нажатия кнопок браузера Вперед/Назад
    window.addEventListener("popstate", function (e) {
        document.title = e.state.page_title;
        ajaxPageRestaurants(location.href);
    }, false);

    // let count_page = '';
    // mainBoxEvents.on('input','.pagination-left form input', function () {
    //     count_page = $(this).val();
    // });
    //
    // let select = '';
    // $('.filter-grid').on('change', 'select', function () {
    //     select = $(this).val();
    // });

    let dataTermsRestaurants = [];

    $('.search-filter.search-restaurants').on('input', 'form', function () {
        let filterRestaurants = $(this);
        dataTermsRestaurants = filterRestaurants.serializeArray();
        let val = $("#slider-range").slider('values');
        let min_price = val[0];
        let max_price = val[1];
        // console.log(dataTerms);
        // let linkP = location.href;

        let districts = [...document.querySelectorAll('.search-subdistrict input[type="checkbox"]')]
            .filter(checkbox=>checkbox.checked)
            .map(checkbox=>checkbox.value);
        dataTermsRestaurants.push(
            // {name: "link", value: linkP},
            { name: "action", value: 'restaurants' },
            { name: "min_price", value: min_price },
            { name: "max_price", value: max_price },
            { name: "count_page", value: count_page },
            { name: "grid-price", value: select },
            { name: "count_page", value: count_page },
            { name: "districts", value: districts },
        );
        // console.log(dataTermsRestaurants);
        $.ajax({
            url: ajax_pagination_restaurants.ajaxurl,
            data: dataTermsRestaurants,
            type: 'POST',
            beforeSend: function (xhr) {
                $('.search-filter.search-restaurants .search-restaurants__overlay').fadeIn(300);
                mainBoxRestaurants.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {
                if (posts) {

                    mainBoxRestaurants.html(posts); // insert new posts
                    // console.log(dataTermsRestaurants);
                }
                $('.search-filter.search-restaurants .search-restaurants__overlay').fadeOut(300);
                mainBoxRestaurants.animate({ opacity: 1 }, 300);

            }

        });

    });


    // Ajax функция
    function ajaxPageRestaurants(linkPageRestaurants) {
        // let linkP = location.href;
        // console.log(this);
        let filter = $(this);
        let dataArray = filter.serializeArray();
        let val = $("#slider-range").slider('values');
        let min_price = val[0];
        let max_price = val[1];
        let checkArr = [...document.querySelectorAll('input[name="check_item"]')]
            .filter(item=>item.checked)
            .map(item=>{return {name:'check_item', value:item.value}})
        
        dataArray.push(
            { name: "action", value: 'restaurants' },
            { name: "link", value: linkPageRestaurants, },
            // {name: "min_price", value: min_price},
            // {name: "max_price", value: max_price},
            { name: "count_page", value: count_page },
            { name: "grid-price", value: select },
            ...dataTermsRestaurants,
            ...checkArr,
        );
        // console.log(dataArray);
        $.ajax({
            url: ajax_pagination_restaurants.ajaxurl,
            data: dataArray,
            type: 'POST',
            beforeSend: function (xhr) {
                mainBoxRestaurants.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {
                if (posts) {

                    mainBoxRestaurants.html(posts); // insert new posts
                }

                mainBoxRestaurants.animate({ opacity: 1 }, 300);

            }

        });

    }

    mainBoxRestaurants.on('input', '.pagination-left form', function (e) {
        e.preventDefault();
        // console.log(this);
        // let linkP = location.href;
        let filter = $(this);
        let dataArray = filter.serializeArray();
        // let val = $( "#slider-range" ).slider('values');
        // let min_price = val[0];
        // let max_price = val[1];

        let checkArr = [...document.querySelectorAll('input[name="check_item"]')]
            .filter(item=>item.checked)
            .map(item=>{return {name:'check_item', value:item.value}})
        dataArray.push(
            { name: "action", value: 'restaurants' },
            // {name: "link", value: linkP,},
            // {name: "min_price", value: min_price},
            // {name: "max_price", value: max_price},
            // {name: "grid-price", value: select},
            ...checkArr
        );
        // console.log(dataArray);
        $.ajax({
            url: ajax_pagination_restaurants.ajaxurl, // обработчик
            data: dataArray, // данные
            type: filter.attr('method'), // тип запроса
            beforeSend: function (xhr) {
                mainBoxRestaurants.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {

                mainBoxRestaurants.html(posts);

                mainBoxRestaurants.animate({ opacity: 1 }, 300);

            }
        });
        return false;
    });


    // Clubs
    // Контейнер с контентом
    let mainBoxClubs = $('#response-clubs');

    // Отправка ajax запроса при клике по ссылке пагинации
    mainBoxClubs.on('click', '.pagination .nav-links a', function (e) {
        e.preventDefault();

        let linkPageClubs = $(this).attr('href');
        let titlePageClubs = $(this).text();

        history.pushState({ page_title: titlePageClubs }, '', linkPageClubs);

        ajaxPageClubs(linkPageClubs);

    });

    // Отслеживание события нажатия кнопок браузера Вперед/Назад
    window.addEventListener("popstate", function (e) {
        document.title = e.state.page_title;
        ajaxPageClubs(location.href);
    }, false);

    // let count_page = '';
    // mainBoxEvents.on('input','.pagination-left form input', function () {
    //     count_page = $(this).val();
    // });
    //
    // let select = '';
    // $('.filter-grid').on('change', 'select', function () {
    //     select = $(this).val();
    // });


    // Ajax функция
    function ajaxPageClubs(linkPageClubs) {
        // let linkP = location.href;
        // console.log(this);
        let filter = $(this);
        let dataArray = filter.serializeArray(),
        selectedDistrict = document.querySelectorAll('.clubs-form .filter-grid-clubs__district')[0].value,
        selectedDayNight = document.querySelectorAll('.clubs-form .filter-grid-clubs__day-night')[0].value;
        selectedRating = document.querySelectorAll('.clubs-form .filter-grid-clubs__average-rating')[0].value;
        // let val = $( "#slider-range" ).slider('values');
        // let min_price = val[0];
        // let max_price = val[1];
        dataArray.push(
            { name: "action", value: 'clubs' },
            { name: "link", value: linkPageClubs, },
            // {name: "min_price", value: min_price},
            // {name: "max_price", value: max_price},
            { name: "count_page", value: count_page },
            { name: "grid-price", value: select },
            {name:'grid-district', value:selectedDistrict},
            {name:'grid-day-night', value:selectedDayNight},
            {name:'average-rating', value:selectedRating},
        );
        // console.log(dataArray);
        $.ajax({
            url: ajax_pagination_clubs.ajaxurl,
            data: dataArray,
            type: 'POST',
            beforeSend: function (xhr) {
                mainBoxClubs.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {
                if (posts) {

                    mainBoxClubs.html(posts); // insert new posts
                }

                mainBoxClubs.animate({ opacity: 1 }, 300);

            }

        });

    }

    mainBoxClubs.on('input', '.pagination-left form', function (e) {
        e.preventDefault();
        // console.log(this);
        // let linkP = location.href;
        let filter = $(this);
        let dataArray = filter.serializeArray(),
        selectedDistrict = document.querySelectorAll('.clubs-form .filter-grid-clubs__district')[0].value,
        selectedDayNight = document.querySelectorAll('.clubs-form .filter-grid-clubs__day-night')[0].value;
        selectedRating = document.querySelectorAll('.clubs-form .filter-grid-clubs__average-rating')[0].value;
        // let val = $( "#slider-range" ).slider('values');
        // let min_price = val[0];
        // let max_price = val[1];
        dataArray.push(
            { name: "action", value: 'clubs' },
            {name:'grid-district', value:selectedDistrict},
            {name:'grid-day-night', value:selectedDayNight},
            {name:'average-rating', value:selectedRating},
            // {name: "link", value: linkP,},
            // {name: "min_price", value: min_price},
            // {name: "max_price", value: max_price},
            // {name: "grid-price", value: select},
        );
        // console.log(dataArray);
        $.ajax({
            url: ajax_pagination_clubs.ajaxurl, // обработчик
            data: dataArray, // данные
            type: filter.attr('method'), // тип запроса
            beforeSend: function (xhr) {
                mainBoxClubs.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {

                mainBoxClubs.html(posts);

                mainBoxClubs.animate({ opacity: 1 }, 300);

            }
        });
        return false;
    });

    $('form.clubs-form').on('change', function () {
        // console.log(this);
        let date_value = '';
        let linkP = location.href;
        let filter = $(this);
        let dataArray = filter.serializeArray();
        // let val = $( "#slider-range" ).slider('values');
        // let min_price = val[0];
        // let max_price = val[1];
        dataArray.push(
            { name: "action", value: 'clubs' },
            // {name: "link", value: linkP,},
            // {name: "min_price", value: min_price},
            // {name: "max_price", value: max_price},
            { name: "count_page", value: count_page },
            // {name: "grid-date", value: date_value},
        );
        // console.log(dataArray);
        $.ajax({
            url: ajax_pagination_events.ajaxurl,
            data: dataArray,
            type: 'POST',
            beforeSend: function (xhr) {
                mainBoxClubs.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {
                if (posts) {

                    mainBoxClubs.html(posts); // insert new posts
                }

                mainBoxClubs.animate({ opacity: 1 }, 300);

            }

        });
    });


    // Tours
    // Контейнер с контентом
    let mainBoxTours = $('#response-tours');

    // Отправка ajax запроса при клике по ссылке пагинации
    mainBoxTours.on('click', '.pagination .nav-links a', function (e) {
        e.preventDefault();

        let linkPageTours = $(this).attr('href');
        let titlePageTours = $(this).text();

        history.pushState({ page_title: titlePageTours }, '', linkPageTours);

        ajaxPageTours(linkPageTours);

    });

    // Отслеживание события нажатия кнопок браузера Вперед/Назад
    window.addEventListener("popstate", function (e) {
        document.title = e.state.page_title;
        ajaxPageTours(location.href);
    }, false);

    // let count_page = '';
    // mainBoxEvents.on('input','.pagination-left form input', function () {
    //     count_page = $(this).val();
    // });
    //
    // let select = '';
    // $('.filter-grid').on('change', 'select', function () {
    //     select = $(this).val();
    // });

    $('.search-filter.search-tours').on('input', 'form', function () {
        let filterRestaurants = $(this);
        let dataTermsRestaurants = filterRestaurants.serializeArray();
        // let val = $("#slider-range").slider('values');
        // let min_price = val[0];
        // let max_price = val[1];
        // console.log(dataTerms);
        // let linkP = location.href;

        let districts = [...document.querySelectorAll('.search-subdistrict input[type="checkbox"]')]
            .filter(checkbox=>checkbox.checked)
            .map(checkbox=>checkbox.value);
        dataTermsRestaurants.push(
            // {name: "link", value: linkP},
            { name: "action", value: 'tours' },
            // { name: "min_price", value: min_price },
            // { name: "max_price", value: max_price },
            { name: "count_page", value: count_page },
            // { name: "grid-price", value: select },
            // { name: "count_page", value: count_page },
            { name: "districts", value: districts },
        );
        // console.log(dataTermsRestaurants);
        $.ajax({
            url: ajax_pagination_tours.ajaxurl,
            data: dataTermsRestaurants,
            type: 'POST',
            beforeSend: function (xhr) {
                $('.search-filter.search-tours .search-tours__overlay').fadeIn(300);
                mainBoxTours.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {
                if (posts) {

                    mainBoxTours.html(posts); // insert new posts
                    // console.log(dataTermsRestaurants);
                }
                $('.search-filter.search-tours .search-tours__overlay').fadeOut(300);
                mainBoxTours.animate({ opacity: 1 }, 300);

            }

        });

    });


    // Ajax функция
    function ajaxPageTours(linkPageTours) {
        // let linkP = location.href;
        // console.log(this);
        let filter = $(this);
        let dataArray = filter.serializeArray();
        // let val = $( "#slider-range" ).slider('values');
        // let min_price = val[0];
        // let max_price = val[1];
        let selectedRating = document.querySelectorAll('.tours-form .filter-grid-tours__average-rating')[0].value;
        dataArray.push(
            { name: "action", value: 'tours' },
            { name: "link", value: linkPageTours, },
            // {name: "min_price", value: min_price},
            // {name: "max_price", value: max_price},
            { name: "count_page", value: count_page },
            { name: "grid-price", value: select },
            {name:'average-rating', value:selectedRating},
        );
        // console.log(dataArray);
        $.ajax({
            url: ajax_pagination_tours.ajaxurl,
            data: dataArray,
            type: 'POST',
            beforeSend: function (xhr) {
                mainBoxTours.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {
                if (posts) {

                    mainBoxTours.html(posts); // insert new posts
                }

                mainBoxTours.animate({ opacity: 1 }, 300);

            }

        });

    }

    mainBoxTours.on('input', '.pagination-left form', function (e) {
        e.preventDefault();
        // console.log(this);
        // let linkP = location.href;
        let filter = $(this);
        let dataArray = filter.serializeArray();
        // let val = $( "#slider-range" ).slider('values');
        // let min_price = val[0];
        // let max_price = val[1];
        let selectedRating = document.querySelectorAll('.tours-form .filter-grid-tours__average-rating')[0].value;
        dataArray.push(
            { name: "action", value: 'tours' },
            // {name: "link", value: linkP,},
            // {name: "min_price", value: min_price},
            // {name: "max_price", value: max_price},
            // {name: "grid-price", value: select},
            {name:'average-rating', value:selectedRating},
        );
        // console.log(dataArray);
        $.ajax({
            url: ajax_pagination_tours.ajaxurl, // обработчик
            data: dataArray, // данные
            type: filter.attr('method'), // тип запроса
            beforeSend: function (xhr) {
                mainBoxTours.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {

                mainBoxTours.html(posts);

                mainBoxTours.animate({ opacity: 1 }, 300);

            }
        });
        return false;
    });

    $('form.tours-form').on('change', function () {
        // console.log(this);
        let date_value = '';
        let linkP = location.href;
        let filter = $(this);
        let dataArray = filter.serializeArray();
        // let val = $( "#slider-range" ).slider('values');
        // let min_price = val[0];
        // let max_price = val[1];
        dataArray.push(
            { name: "action", value: 'tours' },
            // {name: "link", value: linkP,},
            // {name: "min_price", value: min_price},
            // {name: "max_price", value: max_price},
            { name: "count_page", value: count_page },
            // {name: "grid-date", value: date_value},
        );
        // console.log(dataArray);
        $.ajax({
            url: ajax_pagination_events.ajaxurl,
            data: dataArray,
            type: 'POST',
            beforeSend: function (xhr) {
                mainBoxTours.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {
                if (posts) {

                    mainBoxTours.html(posts); // insert new posts
                }

                mainBoxTours.animate({ opacity: 1 }, 300);

            }

        });
    });




    // Rent Transport
    // Контейнер с контентом
    let mainBoxRentTransport = $('#response-rent-transport');

    // Отправка ajax запроса при клике по ссылке пагинации
    mainBoxRentTransport.on('click', '.pagination-right .nav-links a', function (e) {
        e.preventDefault();

        let linkPageRentTransport = $(this).attr('href');
        let titlePageRentTransport = $(this).text();

        history.pushState({ page_title: linkPageRentTransport }, '', titlePageRentTransport);

        ajaxPageRentTransport(linkPageRentTransport);

    });

    // Отслеживание события нажатия кнопок браузера Вперед/Назад
    window.addEventListener("popstate", function (e) {
        document.title = e.state.page_title;
        ajaxPageRentTransport(location.href);
    }, false);

    let count_page_rent_transport = '';
    mainBoxRentTransport.on('input', '.pagination-left form input', function () {
        count_page = $(this).val();
    });

    let select_rent_transport = '';
    $('.filter-grid').on('change', 'select', function () {
        select = $(this).val();
    });

    let stars_value_rent_transport = '';

    // $('.search-filter').on('input','input', function (e) {
    //     stars_value = $(this).val();
    //     console.log(stars_value);
    // });

    // $('.search-filter').on('click', 'input', (function () {
    //     console.log(1);
    // }));

    //Villa

    let dataTerms_rent_transport = [];

    $('.search-filter.search-transport').on('input', 'form', function () {
        let filterTax = $(this);
        dataTerms_rent_transport = filterTax.serializeArray();
        let val = $("#slider-range-rent-transport").slider('values');
        let min_price = val[0];
        let max_price = val[1];

        let districts = [...document.querySelectorAll('.search-subdistrict input[type="checkbox"]')]
            .filter(checkbox=>checkbox.checked)
            .map(checkbox=>checkbox.value);
        // console.log(dataTerms);
        // let linkP = location.href;
        dataTerms_rent_transport.push(
            // {name: "link", value: linkP},
            { name: "action", value: 'rent_transport' },
            { name: "min_price", value: min_price },
            { name: "max_price", value: max_price },
            { name: "count_page", value: count_page },
            { name: "grid-price", value: select },
            { name: "count_page", value: count_page },
            { name: "districts", value: districts },
        );
        $.ajax({
            url: ajax_pagination_rent_transport.ajaxurl,
            data: dataTerms_rent_transport,
            type: 'POST',
            beforeSend: function (xhr) {
                $('.search-filter.search-transport .search-transport__overlay').fadeIn(300);
                mainBoxRentTransport.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {
                if (posts) {

                    mainBoxRentTransport.html(posts); // insert new posts
                    $('.search-filter.search-transport .search-transport__overlay').fadeOut(300);
                    mainBoxRentTransport.animate({ opacity: 1 }, 300);
                    // console.log(dataTerms);
                }
            }

        });

    });



    // Main pagination
    function ajaxPageRentTransport(linkPageRentTransport) {
        // let linkP = location.href;
        // console.log(select);
        let filter = $(this);
        let dataArray = filter.serializeArray();
        let val = $("#slider-range-rent-transport").slider('values');
        let min_price = val[0];
        let max_price = val[1];
        dataArray.push(
            { name: "action", value: 'rent_transport' },
            { name: "link", value: linkPageRentTransport, },
            // { name: "min_price", value: min_price },
            // { name: "max_price", value: max_price },
            // { name: "count_page", value: count_page },
            // { name: "grid-price", value: select },
            // { name: "average_rating", value: stars_value },
            ...dataTerms
        );

        // console.log(dataArray)
        $.ajax({
            url: ajax_pagination_rent_transport.ajaxurl,
            data: dataArray,
            type: 'POST',
            beforeSend: function (xhr) {
                mainBoxRentTransport.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {
                if (posts) {

                    mainBoxRentTransport.html(posts); // insert new posts
                    // console.log(dataArray);
                }

                mainBoxRentTransport.animate({ opacity: 1 }, 300);

            }

        });
    }


    $("#slider-range-rent-transport").slider({
        stop: function (event, ui) {
            // let linkP = location.href;
            let filter = $(this);
            let dataArray = filter.serializeArray();
            let val = $("#slider-range-rent-transport").slider('values');
            let min_price = val[0];
            let max_price = val[1];
            dataArray.push(
                { name: "action", value: 'rent_transport' },
                // {name: "link", value: linkP,},
                { name: "min_price", value: min_price },
                { name: "max_price", value: max_price },
                { name: "count_page", value: count_page },
                { name: "grid-price", value: select },
                ...dataTerms
            );
            $.ajax({
                url: ajax_pagination_rent_transport.ajaxurl, // обработчик
                data: dataArray, // данные
                type: 'POST',
                beforeSend: function (xhr) {
                    mainBoxRentTransport.animate({ opacity: 0.4 }, 300);
                },
                success: function (posts) {

                    mainBoxRentTransport.html(posts);
                    // console.log(dataTerms);

                    mainBoxRentTransport.animate({ opacity: 1 }, 300);

                }
            });
        }
    });


    mainBoxRentTransport.on('input', '.pagination-left form', function (e) {
        e.preventDefault();
        // console.log(this);
        let linkP = location.href;
        let filter = $(this);
        let dataArray = filter.serializeArray();
        let val = $("#slider-range-rent-transport").slider('values');
        let min_price = val[0];
        let max_price = val[1];
        dataArray.push(
            { name: "action", value: 'rent_transport' },
            // {name: "link", value: linkP,},
            { name: "min_price", value: min_price },
            { name: "max_price", value: max_price },
            { name: "grid-price", value: select },
            ...dataTerms
        );
        $.ajax({
            url: ajax_pagination_rent_transport.ajaxurl, // обработчик
            data: dataArray, // данные
            type: filter.attr('method'), // тип запроса
            beforeSend: function (xhr) {
                mainBoxRentTransport.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {

                mainBoxRentTransport.html(posts);

                mainBoxRentTransport.animate({ opacity: 1 }, 300);

            }
        });
        return false;
    });


    // Filter price high and low
    $('.filter-grid form').on('change', '.filter-grid__price', function () {
        // console.log(this);
        let linkP = location.href;
        let filter = $(this);
        let dataArray = filter.serializeArray();
        let val = $("#slider-range-rent-transport").slider('values');
        let min_price = val[0];
        let max_price = val[1];
        dataArray.push(
            { name: "action", value: 'rent_transport' },
            // {name: "link", value: linkP,},
            { name: "min_price", value: min_price },
            { name: "max_price", value: max_price },
            { name: "count_page", value: count_page },
            // {name: "meta_value_num", value: 'meta_value_num'},
            ...dataTerms
        );
        $.ajax({
            url: ajax_pagination_rent_transport.ajaxurl,
            data: dataArray,
            type: 'POST',
            beforeSend: function (xhr) {
                mainBoxRentTransport.animate({ opacity: 0.7 }, 300);
            },
            success: function (posts) {
                if (posts) {

                    mainBoxRentTransport.html(posts); // insert new posts
                    // console.log(dataArray);
                }

                mainBoxRentTransport.animate({ opacity: 1 }, 300);

            }

        });
    });

});
