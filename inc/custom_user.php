<?php

add_action('login_head', 'my_custom_login_logo');
function my_custom_login_logo(){
    echo '<style type="text/css">
	h1 a { background-image:url('.get_bloginfo('template_directory').'/assets/img/logo/logo.png) !important; }
	</style>';
}

## Изменение внутреннего логотипа админки. Для версий с dashicons
add_action('add_admin_bar_menus', 'reset_admin_wplogo');
function reset_admin_wplogo(  ){
    remove_action( 'admin_bar_menu', 'wp_admin_bar_wp_menu', 10 ); // удаляем стандартную панель (логотип)

    add_action( 'admin_bar_menu', 'my_admin_bar_wp_menu', 10 ); // добавляем свою
}
function my_admin_bar_wp_menu( $wp_admin_bar ) {
    $wp_admin_bar->add_menu( array(
        'id'    => 'wp-logo',
        'title' => '<img style="max-width:30px;height:auto;margin-top:7px;" src="'. get_bloginfo('template_directory') .'/assets/img/logo/logo.png" alt="" >', // иконка dashicon
//        'title' => '<span style="font-family:dashicons; font-size:20px;" class="dashicons dashicons-carrot"></span>', // иконка dashicon
        // можно вставить картинку <img style="max-width:100%;height:auto;" src="'. get_bloginfo('template_directory') .'/images/custom-logo.gif" alt="" >
        'href'  => home_url('/about/'),
        'meta'  => array(
            'title' => 'О моем сайте',
        ),
    ) );
}

//Отключение сообщений о необходимости обновиться
if( ! current_user_can( 'edit_users' ) ){
    add_filter( 'auto_update_core', '__return_false' );   // обновление ядра

    add_filter( 'pre_site_transient_update_core', '__return_null' );
}

## Удаление виджетов из Консоли WordPress
add_action( 'wp_dashboard_setup', 'clear_dash', 99 );
function clear_dash(){
    $side   = & $GLOBALS['wp_meta_boxes']['dashboard']['side']['core'];
    $normal = & $GLOBALS['wp_meta_boxes']['dashboard']['normal']['core'];

    // die( print_r($GLOBALS['wp_meta_boxes']['dashboard']) ); // смотрим что есть...

    $remove = array(
        'dashboard_activity', // последняя активность
        'dashboard_primary',  // новости wordpress
        'dashboard_right_now',  // консоль
        'dashboard_quick_press',
    );
    foreach( $remove as $id ){
        unset( $side[$id], $normal[$id] ); // или $side или $normal
    }

    // удалим welcome панель
    remove_action( 'welcome_panel', 'wp_welcome_panel' );
}

//Упрощаем меню

if( !current_user_can( 'administrator' ) ) {
add_action('admin_menu', 'remove_menus');
    function remove_menus()
    {
        global $menu;
        $restricted = array(
            __('Dashboard'),
            __('Posts'),
            __('Media'),
            __('Links'),
            __('Pages'),
            __('Appearance'),
            __('Tools'),
            __('Users'),
            __('Settings'),
            __('Comments'),
            __('Plugins')
        );
        end($menu);
        while (prev($menu)) {
            $value = explode(' ', $menu[key($menu)][0]);
            if (in_array(($value[0] != NULL ? $value[0] : ""), $restricted)) {
                unset($menu[key($menu)]);
            }
        }
    }
}