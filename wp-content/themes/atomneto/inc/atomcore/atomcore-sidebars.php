<?php
add_action('init', '_atomcore_sidebars_generator');

function _atomcore_sidebars_generator(){

$sidebars_new = atom_get_options_key( 'atom_sidebars', array() );

    if ($sidebars_new){
        foreach ($sidebars_new as $sidebar_new) {
            register_sidebar(array(
                'name' => $sidebar_new["title"],
                'id' => $sidebar_new["slug"],
                'description' => 'Atomlabs custom sidebars.',
				'before_widget' => '<div id="%1$s" class="content-spacing widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4><div class="line"><span class="left-line"></span><span class="right-line"></span></div><div class="clear"></div>'
            ));
        }
    }
}

function generated_dynamic_sidebar($name='global'){

$namea = atom_get_post_meta_key('sidebar-type',$post->ID);

if($namea != '' ){$name=$namea;
	dynamic_sidebar($name);	
	return true;
}
}