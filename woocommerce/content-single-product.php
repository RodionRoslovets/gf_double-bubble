<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

use function Sodium\compare;

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" style="display:block" <?php wc_product_class('', $product); ?>>
	<div class="block-title-page title-club">
		<?php echo woocommerce_template_single_title(); ?>
		<div class="row product-socials">
			<div class="block-info" style="justify-content:flex-end">

				<div class="clubs-item-rating">
					<div class="rating-group">
						<?php echo do_shortcode('[average_rating]') ?>
					</div>
					<div class="addthis_inline_share_toolbox"></div>
					<div class="villa-blue-heart mobile-visible">
						<?php echo do_shortcode('[favorite_button]') ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row product-top-page">
		<div class="col-lg-8 gallery-and-description">
			<div class="summary entry-summary">
				<div class="villas-slider" data-nav="thumbs" data-autoplay="true">
					<a href="#"><?php echo get_the_post_thumbnail($product->get_id(), 'full'); ?></a>
					<?php
					$images = $product->get_gallery_image_ids();
					$image_urls = [];

					if ($images) {
						foreach ($images as $image) {
							$image_urls[] = wp_get_attachment_image_src($image, 'full');
						}
					}

					if ($image_urls) : ?>
						<?php foreach ($image_urls as $image) : ?>
							<a href="<?php echo esc_url($image[0]); ?>"><img src="<?php echo esc_url($image[0]); ?>"></a>
						<?php endforeach; ?>

					<?php endif; ?>
				</div>
			</div>
			<div class="product-description">
				<h2>About product</h2>

				<?php the_content(); ?>
			</div>
		</div>
		<div class="col-lg-4">
			<?php $tours = get_field('rent_transport_data'); ?>
			<div class="villa-top-page__info">
				<div class="villa-top-page__info-block">
					<form class="cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
						<div class="tour-top-page__price">
							<?php echo woocommerce_template_single_price(); ?>
							<?php woocommerce_quantity_input(
								array(
									'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
									'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
									'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
								)
							); ?>
						</div>
						<button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="bg-btn-red single_add_to_cart_button button alt"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>
					</form>
				</div>

				<div class="tour-top-page__info-options">
					<?php $terms = get_terms([
						'taxonomy' => 'products_facilities',
						'hide_empty' => false,
						'get'           => 'all',
						'childless'     => true,
					]); ?>

					<ul class="facilities-villas__list">
						<?php
						foreach ($terms as $k => $term) {
							echo '<li>' . $term->name . ' </li>';
						} ?>
					</ul>
				</div>

				<div class="restaurant-top-page__info-favorites desktop-visible">
					<?php echo do_shortcode('[favorite_button]') ?>
				</div>
				<div class="product-description">
					<h2>About product</h2>

					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>




	<h2 class="titles-page">Other products</h2>

	<div class="related-products-slider owl-theme owl-carousel">

		<?php // параметры по умолчанию
		$posts = get_posts(array(
			'numberposts' => 15,
			'category'    => 0,
			'orderby'     => 'date',
			'order'       => 'DESC',
			'include'     => array(),
			'exclude'     => array(),
			'meta_key'    => '',
			'meta_value'  => '',
			'post_type'   => 'product',
			'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
		));

		foreach ($posts as $post) {
			setup_postdata($post);

		?>

			<div class="restaurants-preview__item">
				<a href="<?php the_permalink(); ?>" class="restaurants-preview__item_image">
					<?php the_post_thumbnail(array(201, 107)); ?>
				</a>
				<?php echo do_shortcode('[favorite_button]') ?>
				<div class="restaurants-preview__item_content">
					<h5><?php the_title(); ?></h5>
					<?php the_excerpt(); ?>
					<div class="related-products-slider__price">
						<div class="rent_transport__price">
							<?php echo woocommerce_template_single_price(); ?>
						</div>
						<a href="<?php echo get_permalink(); ?>"><button class="bg-btn-red ajax-add-to-cart">Buy</button></a>
					</div>
				</div>

			</div>

		<?php
		}

		wp_reset_postdata(); // сброс 
		?>
	</div>
</div>

<?php do_action('woocommerce_after_single_product'); ?>