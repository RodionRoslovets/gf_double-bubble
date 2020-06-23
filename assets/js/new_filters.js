jQuery(function ($) {
    //Обьект с данными о постах из глобальной переменной
    let postsData = JSON.parse(ajax_new_filters.posts);
    console.log(postsData);    

    //Обьект с данными для отправки, содержит все данные по фильтрации, пагинации и сортировке
    let priceFilterData = {
        action: 'price_filter_wc',
        min: +$('.filter-price .filter-price-amount').attr('value'),
        max: +$('.filter-price .filter-price-amount2').attr('value'),
        cat: $('.filter-price').attr('data-category-id'),
        attrs: [],
        order: postsData.order,
        orderby:'date',
        perPage:postsData.posts_per_page,
        link:document.location.href,
        homelink:document.location.href,
    }

    //настройки ползунка для цены
    $('#filter-price').slider({
        range: true,
        min: +$('.filter-price .filter-price-amount').attr('value'),
        max: +$('.filter-price .filter-price-amount2').attr('value'),
        step: 1,
        values: [+$('.filter-price .filter-price-amount').attr('value'), +$('.filter-price .filter-price-amount2').attr('value')],
        slide: function (event, ui) {
            $('.filter-price .filter-price-amount').attr('value', ui.values[0]);
            $('.filter-price .filter-price-amount2').attr('value', ui.values[1]);
        },
        stop: function () {
            setTimeout(function () {
                priceFilterData.min = +$('.filter-price .filter-price-amount').attr('value')
                priceFilterData.max = +$('.filter-price .filter-price-amount2').attr('value')

                $('.filter-price .filter-price-amount').trigger('input');
            }, 500)
        }
    });

    //Отправка запроса при изменении значения цены
    $('.filter-price .filter-price-amount').on('input', function(){
        //Сброс на первую страницу пагинации
        priceFilterData.link = priceFilterData.homelink;
        filterPage('.product-content', priceFilterData);
    });
    
    //формирование массива при изменении чекбокса и отправка данных
    $('.product-attrs.search-filter ul li input[type="checkbox"]').on('change', function(){
        priceFilterData.attrs = [];

        //Сброс на первую страницу пагинации
        priceFilterData.link = priceFilterData.homelink;

        priceFilterData.attrs = [...document.querySelectorAll('.product-attrs.search-filter ul label input[type="checkbox"]')]
            .filter(function(item){ return item.checked})
            .map(function(item){return item.parentElement.innerText})

        filterPage('.product-content', priceFilterData);
    })

    //Изменение количества товаров на странице

    $('.product-content').on('change', '.pagination-left.products-pagination label input[type="radio"]',function(){
        let checkedItem = [...document.querySelectorAll('.pagination-left.products-pagination label input[type="radio"]')]
            .filter(function(item){return item.checked});

        priceFilterData.perPage = checkedItem[0].value;

        filterPage('.product-content', priceFilterData);
    });

    //Изменение сортировки

    $('.product-sorting .product-sorting__item').on('click', function(){
        //если по дате
        if($(this).hasClass('product-sorting__by-date')){
            // changeSortElems.apply(this, ['.product-sorting .product-sorting__item', 'product-sorting__item_active', '.product-sorting__arrow', 'product-sorting__arrow_desc']);
            $('.product-sorting .product-sorting__item').removeClass('product-sorting__item_active');
            priceFilterData.orderby = 'date';
            // priceFilterData.order = priceFilterData.order == 'DESC' ? 'ASC' : 'DESC';
            priceFilterData.order = 'DESC';
        }

        //если по цене
        if($(this).hasClass('product-sorting__by-price')){
            changeSortElems.apply(this, ['.product-sorting .product-sorting__item', 'product-sorting__item_active', '.product-sorting__arrow', 'product-sorting__arrow_desc']);
            priceFilterData.orderby = 'price';
            priceFilterData.order = priceFilterData.order == 'DESC' ? 'ASC' : 'DESC';
        }

        filterPage('.product-content', priceFilterData);
    });

    //Пагинация

    $('.product-content').on('click', '.nav-links .page-numbers', function(e){
        e.preventDefault();

        let linkPage = $(this).attr('href');
        let titlePage = $(this).text();

        history.pushState({page_title: titlePage},' ', linkPage);

        console.log(history)

        priceFilterData.link = this.href;

        console.log(history)

        filterPage('.product-content', priceFilterData);
    })

    window.addEventListener("popstate", function(e){
        document.title = e.state.page_title;
        priceFilterData.link = location.href;
        filterPage('.product-content', priceFilterData);
    }, false);

    //Функция изменения элементов сортировки
    function changeSortElems(allElemsSelector, activeElemClass, arrowSelector, activeArrowClass){
        $(allElemsSelector).removeClass(activeElemClass);
        $(this).addClass(activeElemClass);
        $(this).children(arrowSelector).toggleClass(activeArrowClass);
    }

    //Функция с запросом
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