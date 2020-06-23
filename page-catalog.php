<?php

/**
 * Template name: Shop Catalog
 */

get_header('secondary');
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main catalog-page-wrapper">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <nav class="nav-breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
                <div class="catalog-page__title"><h1>Shop</h1></div>
                <div class="catalog-page">
                    <?php
                    echo do_shortcode('[product_categories columns="3" parent="0"]');
                    ?>

                </div>
            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
