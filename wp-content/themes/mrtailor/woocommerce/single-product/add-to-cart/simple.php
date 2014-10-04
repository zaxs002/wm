<?php
/**
 * Simple product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $product, $mr_tailor_theme_options;

if ( ! $product->is_purchasable() ) return;
?>

<?php
	// Availability
	$availability = $product->get_availability();

	if ($availability['availability'])
		echo apply_filters( 'woocommerce_stock_html', '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>', $availability['availability'] );
?>

<?php if ( $product->is_in_stock() ) : ?>

	<?php if ( (isset($mr_tailor_theme_options['catalog_mode'])) && ($mr_tailor_theme_options['catalog_mode'] == 1) ) : ?>
    <?php else : ?>

    <?php do_action('woocommerce_before_add_to_cart_form'); ?>
    
    <div class="clearfix"></div>
    
    <?php if ( ! $product->is_sold_individually() ) { ?>
    <div class="qty"><?php _e( 'Qty', 'mr_tailor' )?></div>
    <?php } ?>
    
	<form class="cart" method="post" enctype='multipart/form-data'>
	 	<?php do_action('woocommerce_before_add_to_cart_button'); ?>

	 	<?php
	 		if ( ! $product->is_sold_individually() )
	 			woocommerce_quantity_input( array(
	 				'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
	 				'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
	 			) );
	 	?>

	 	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />

	 	<button type="submit" class="single_add_to_cart_button button alt"><?php echo $product->single_add_to_cart_text(); ?></button>

		<?php do_action('woocommerce_after_add_to_cart_button'); ?>
	</form>

	<?php do_action('woocommerce_after_add_to_cart_form'); ?>

    <?php endif; ?>

<?php endif; ?>