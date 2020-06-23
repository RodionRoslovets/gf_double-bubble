<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>
	<div class="cart_totals-total-price">
		<h2><?php esc_html_e( 'Total price', 'woocommerce' ); ?></h2>
		<?php wc_cart_totals_order_total_html(); ?>
	</div>

	<div class="cart_totals-total-quantity">
		<p>Quantity of the goods: <?php echo WC()->cart->get_cart_contents_count(); ?></p>
	</div>

	<div class="cart_totals-total-delivery">
		<p class="cart_totals-total-delivery-heading">Delivery</p>
		<p class="cart_totals-total-delivery-content">City name, Country, Streer Name, 95</p>
	</div>

	<div class="cart_totals-total-payment">
		<p class="cart_totals-total-payment-heading">Payment</p>
		<p class="cart_totals-total-payment-content">Payment at reception</p>
	</div>

	<div class="wc-proceed-to-checkout">
		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
	</div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
