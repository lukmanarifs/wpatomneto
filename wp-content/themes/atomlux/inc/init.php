<?php

include get_template_directory() . '/premium/functions.php';
include get_template_directory() . '/extras/adminbar/adminbar.php';
include get_template_directory() . '/extras/plugin-activation/plugin-activation.php';
include get_template_directory() . '/extras/metaslider/metaslider.php';
include get_template_directory() . '/extras/premium/premium.php';

get_template_part( THEME_INCLUDES . 'panels');
get_template_part( THEME_INCLUDES . 'extras');
get_template_part( THEME_INCLUDES . 'template-tags');
get_template_part( THEME_INCLUDES . 'gallery');
get_template_part( THEME_INCLUDES . 'metaslider');
get_template_part( THEME_INCLUDES . 'menu');
get_template_part( THEME_INCLUDES . 'custom-function');
get_template_part( THEME_INCLUDES . 'custom-post');
get_template_part( THEME_INCLUDES . 'custom-post-format');


//get_template_part( THEME_INCLUDES . 'plugins/ml-slider/ml-slider');


get_template_part(THEME_WIDGETS.'widget-atom','facebook');
get_template_part(THEME_WIDGETS.'widget-atom','service');
get_template_part(THEME_WIDGETS.'widget-atom','testimonials');
get_template_part(THEME_WIDGETS.'widget-atom','client');
get_template_part(THEME_WIDGETS.'widget-atom','gallery');
get_template_part(THEME_WIDGETS.'widget-atom','portfolio');
get_template_part(THEME_WIDGETS.'widget-atom','calltoaction');
get_template_part(THEME_WIDGETS.'widget-atom','pricing');
get_template_part(THEME_WIDGETS.'widget-atom','webinfo');