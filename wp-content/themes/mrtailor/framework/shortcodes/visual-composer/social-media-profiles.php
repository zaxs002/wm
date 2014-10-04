<?php

// [social-media]

vc_map(array(
   "name"						=> __("Social Media Profiles"),
   "category"					=> __('Social'),
   "description"				=> __("Links to your social media profiles"),
   "base"						=> "social-media",
   "class"						=> "",
   "icon"						=> "social-media",
   
   "params" 	=> array(
		
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> __("Align"),
			"param_name"	=> "items_align",
			"value"			=> array(
				"Left"		=> "left",
				"Center"	=> "center",
				"Right"		=> "right"
			)
		)
   )
   
));