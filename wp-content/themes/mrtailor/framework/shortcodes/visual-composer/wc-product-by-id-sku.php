<?php

// [product]

function product_field($settings, $value) {   
    $attr = array("post_type"=>"product", "orderby"=>"name", "order"=>"asc", 'posts_per_page'   => -1);
    $products = get_posts($attr); 
    $dependency = vc_generate_dependencies_attributes($settings);
    $data = '<select name="'.$settings['param_name'].'" class="wpb_vc_param_value wpb-input wpb-select '.$settings['param_name'].' '.$settings['type'].'">';
    foreach($products as $product) {
        $selected = '';
        if ($value!='' && $product->ID == $value) {
             $selected = ' selected="selected"';
        }
        $data .= '<option class="'.$product->ID.'" value="'.$product->ID.'"'.$selected.'>'.$product->post_title.'</option>';
    }
    $data .= '</select>';
    return $data;
}
add_shortcode_param('product' , 'product_field');

vc_map(array(
   "name" 			=> __("Single Product"),
   "category" 		=> __('Products'),
   "description"	=> __(""),
   "base" 			=> "product",
   "class" 			=> "",
   "icon" 			=> "product",
   
   "params" 	=> array(
		
		array(
			"type" => "product",
			"holder" => "div",
			"heading" => __("Product"),
			"param_name" => "id",
		)
		
   )
   
));