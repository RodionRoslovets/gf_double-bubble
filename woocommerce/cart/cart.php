<?php

/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>

<h1>My cart</h1>

<form class="woocommerce-cart-form row" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
	<?php do_action('woocommerce_before_cart_table'); ?>
	<div class="col-md-8">
		<?php do_action('woocommerce_before_cart_contents'); ?>

		<?php
		foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
			$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
			$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

			if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
				$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
		?>
				<div class="woocommerce-cart-form__cart-item row <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

					<div class="col-3">
						<?php
						$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

						if (!$product_permalink) {
							echo $thumbnail; // PHPCS: XSS ok.
						} else {
							printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
						}
						?>
					</div>

					<div class="col-md-4 col-5">
						<p class="cart__item-title">
						<?php
						if (!$product_permalink) {
							echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
						} else {
							echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
						} ?>
						</p>
						<div class="cart__price_mobile">
							<?php echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
							?>
						</div>
					</div>

					<div class="col-md-2 col-4 cart__quantity">
						<div class="cart__delete_mobile">
						<?php echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							'woocommerce_cart_item_remove_link',
							sprintf(
								'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
								esc_url(wc_get_cart_remove_url($cart_item_key)),
								esc_html__('Remove this item', 'woocommerce'),
								esc_attr($product_id),
								esc_attr($_product->get_sku())
							),
							$cart_item_key
						);
						?>
						</div>
						<?php
						if ($_product->is_sold_individually()) {
							$product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
						} else {
							$product_quantity = woocommerce_quantity_input(
								array(
									'input_name'   => "cart[{$cart_item_key}][qty]",
									'input_value'  => $cart_item['quantity'],
									'max_value'    => $_product->get_max_purchase_quantity(),
									'min_value'    => '0',
									'product_name' => $_product->get_name(),
								),
								$_product,
								false
							);
						}
						echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
						?>



					</div>
					<div class="col-md-3 cart__price-and-delete">
						<div class="cart__price-desktop">
							<?php echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
							?>
						</div>
						<div>
							<?php echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								'woocommerce_cart_item_remove_link',
								sprintf(
									'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times; delete</a>',
									esc_url(wc_get_cart_remove_url($cart_item_key)),
									esc_html__('Remove this item', 'woocommerce'),
									esc_attr($product_id),
									esc_attr($_product->get_sku())
								),
								$cart_item_key
							);
							?>
						</div>
					</div>
				</div>
		<?php
			}
		}
		?>

		<?php do_action('woocommerce_cart_contents'); ?>

		<!-- <tr>
					<td colspan="6" class="actions">

						<?php //if (wc_coupons_enabled()) { 
						?>
							<div class="coupon">
								<label for="coupon_code"><?php //esc_html_e('Coupon:', 'woocommerce'); 
															?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>"><?php esc_attr_e('Apply coupon', 'woocommerce'); ?></button>
								<?php //do_action('woocommerce_cart_coupon'); 
								?>
							</div>
						<?php //} 
						?>

						<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>

						<?php //do_action('woocommerce_cart_actions'); 
						?>

						<?php //wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); 
						?>
					</td>
				</tr> -->

		<?php do_action('woocommerce_after_cart_contents'); ?>

	</div>
	<div class="col-md-4 cart__checkout_desktop">
		<?php woocommerce_cart_totals(); ?>
	</div>
	<div class="cart__checkout_mobile">
		<div class="cart__checkout-total-price">
			<p>Total price</p>
			<?php echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
			?>
		</div>
		<?php woocommerce_cart_totals(); ?>
	</div>
	


	<?php do_action('woocommerce_after_cart_table'); ?>
</form>

<?php do_action('woocommerce_before_cart_collaterals'); ?>

<div class="cart-collaterals">
	<?php
	/**
	 * Cart collaterals hook.
	 *
	 * @hooked woocommerce_cross_sell_display
	 * @hooked woocommerce_cart_totals - 10
	 */
	// do_action( 'woocommerce_cart_collaterals' );
	?>
</div>

<?php do_action('woocommerce_after_cart'); ?>