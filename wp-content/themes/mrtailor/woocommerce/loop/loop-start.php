<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
 
global $woocommerce_loop, $mr_tailor_theme_options;
?>

<?php

if ( ( isset($woocommerce_loop['columns']) && $woocommerce_loop['columns'] != "" ) ) {
	$products_per_column = $woocommerce_loop['columns'];
} else {
	if ( ( !isset($mr_tailor_theme_options['products_per_column']) ) ) {
		$products_per_column = 4;
	} else {
		$products_per_column = $mr_tailor_theme_options['products_per_column'];
        if (isset($_GET["products_per_row"])) $products_per_column = $_GET["products_per_row"];
	}
}

?>

<?php

if ( isset($mr_tailor_theme_options['products_animation']) ) {
    $effect = $mr_tailor_theme_options['products_animation'];
} else {
    $effect = e0;
}

?>

<div class="row">
	<div class="large-12 columns">
		<ul id="products-grid" class="products products-grid effect-<?php echo $effect; ?> small-block-grid-2 medium-block-grid-3 large-block-grid-<?php echo $products_per_column; ?> columns-<?php echo $products_per_column; ?>">