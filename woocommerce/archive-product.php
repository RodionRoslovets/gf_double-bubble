<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('secondary');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>
<header class="woocommerce-products-header">
	<?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>
	<div class="product-sorting">
		sorting:
		<!-- <span class="product-sorting__item product-sorting__by-date product-sorting__item_active">date <span class="product-sorting__arrow product-sorting__arrow_desc">&#8593;</span></span> -->
		<span class="product-sorting__item product-sorting__by-date">reset</span>
		<span class="product-sorting__item product-sorting__by-price">price <span class="product-sorting__arrow product-sorting__arrow_desc">&#8593;</span></span>
	</div>
	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action('woocommerce_archive_description');
	?>
</header>
<?php
if (woocommerce_product_loop()) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	// do_action( 'woocommerce_before_shop_loop' );
?>
	<div class="row">
		<div class="col-md-3">
			<div class="products-sidebar-widgets">
				<?php get_sidebar(); ?>

				<?php
				$category = get_queried_object();
				$cat_id = $category->term_id ? $category->term_id : 48;
				$pr = wpp_get_extremes_price_in_product_cat($cat_id);
				?>
				<div class="search-price filter-price" data-category-id=<?php echo $cat_id; ?>>
					<h5>Price</h5>
					<div class="search-price__price">
						<div class="search-price__price-in">
							<span><input type="text" class="filter-price-amount" value=<?php echo $pr['min_price']; ?> readonly>
							</span><span>$</span>
						</div>
						<div class="search-price__price-out">
							<span><input type="text" class="filter-price-amount2" value=<?php echo $pr['max_price']; ?> readonly>
							</span><span>$</span>
						</div>
					</div>

					<div id="filter-price"></div>
				</div>
				<?php
				$terms = get_terms([
					'taxonomy' => 'product_attributes',
					'hide_empty' => false,
					'get'           => 'all',
					'childless'     => true,
				]);
				?>
				<div class="search-type-of-housing product-attrs search-filter">
					<h5 class="search-reviews__heading slideup-parent">Type of tour</h5>
					<ul class="search-reviews__list slideup-child">
						<?php foreach ($terms as $k => $term) : ?>
							<li class="product-attribute__item">
								<label>
									<?php echo $term->name; ?>
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>


			</div>
		</div>
		<div class="col-md-9">
			<div class="product-content">
			<?php
			woocommerce_product_loop_start();

			if (wc_get_loop_prop('total')) {
				while (have_posts()) {
					the_post();

					/**
					 * Hook: woocommerce_shop_loop.
					 */
					do_action('woocommerce_shop_loop');

					wc_get_template_part('content', 'product');
				}
			}

			woocommerce_product_loop_end();

			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			// do_action('woocommerce_after_shop_loop');
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action('woocommerce_no_products_found');
		}
			?>
			<div class="products-pagination__block">
				<div class="pagination-left products-pagination">
					<form action="" method="POST">
						<p>Show</p>
						<label>10
							<input type="radio" id="page10" name="count_page" value="10"></label>
						<label>20
							<input type="radio" id="page20" name="count_page" value="20"></label>
						<label>30
							<input type="radio" id="page30" name="count_page" value="30"></label>
					</form>
				</div>
				<div class="pagination-right products-pagination">
					<?php $args = array(
						'show_all' => false, // показаны все страницы участвующие в пагинации
						'end_size' => 1,     // количество страниц на концах
						'mid_size' => 1,     // количество страниц вокруг текущей
						'prev_next' => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
						'prev_text' => '<img src="' . get_template_directory_uri() . '/assets/img/icons/pagin-arr-left.svg" alt="">',
						'next_text' => '<img src="' . get_template_directory_uri() . '/assets/img/icons/pagin-arr-right.svg" alt="">',
						'add_args' => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
						'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.

					);

					$pagination = get_the_posts_pagination($args);

					echo str_replace('wp-admin/admin-ajax.php', 'product-category/all-products', $pagination); ?>

				</div>
			</div>
			
			</div>
		</div>
	</div>
	<?php

	/**
	 * Hook: woocommerce_after_main_content.
	 *
	 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
	 */
	do_action('woocommerce_after_main_content');

	/**
	 * Hook: woocommerce_sidebar.
	 *
	 * @hooked woocommerce_get_sidebar - 10
	 */
	do_action('woocommerce_sidebar');


	get_footer('shop');
