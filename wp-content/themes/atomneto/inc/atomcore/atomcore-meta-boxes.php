<?php
/**
 * Initialize the custom Meta Boxes. 
 */
add_action( 'admin_init', '_custom_post_meta_boxes' );

/**
 * Post Meta Boxes.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function _custom_post_meta_boxes() {
	
	/*
	* Get Page Templates
	*/
	$pagetemplates= array(
		array(
			'label' => 'Default Template',
			'value' => 'none'
		)
	  );
	  
	$templates = wp_get_theme()->get_page_templates();
    foreach ( $templates as $template_name => $template_filename ) {
		$array=array(
			'label' => $template_filename,
			'value' => $template_name
		);
		array_push($pagetemplates, $array);
    }
	
	/*
	* Layer Slider
	*/
	$layersliders_new = atomcore_get_layerslider();
   
	  $layersliders= array(
		array(
			'label' => 'None',
			'value' => 'none'
		)
	  );
	  
	if (is_array($layersliders_new)){
	  foreach ($layersliders_new as $layerslider_new) {
		$array=array(
			'label' => $layerslider_new['title'],
			'value' => $layerslider_new['slug']
		);
		array_push($layersliders, $array);
	  }
	}
	
	/*
	* Revolution Slider
	*/
	$revolutionsliders_new = atomcore_get_revslider();
    
	  $revolutionsliders = array(
		array(
			'label' => 'None',
			'value' => 'none'
		)
	  );
	  
	if (is_array($revolutionsliders_new)){
	  foreach ($revolutionsliders_new as $revolutionslider_new) {
		$array=array(
			'label' => $revolutionslider_new['title'],
			'value' => $revolutionslider_new['slug']
		);
		array_push($revolutionsliders, $array);
	  }
	}
	
	/*
	* Sidebar
	*/
	$sidebars_new = atom_get_options_key( 'atom_sidebars', array() );
   
	  $sidebars= array(
		array(
			'label' => 'Global Sidebar',
			'value' => 'global'
		)
	  );
  
	  foreach ($sidebars_new as $sidebar_new) {
		$array=array(
			'label' => $sidebar_new['title'],
			'value' => $sidebar_new['slug']
		);
		array_push($sidebars, $array);
	  }
	  
	if( !is_plugin_active( 'atomstore-extend/atomstore-extend.php' ) ){
		$alertextend = '<br><strong>Require ATOMSTORE Extension.</strong> <a href="http://atomlabs.me/atomstore-extension" target="_blank">Buy here</a>';
		$arrayextend = ' ( require Extension ) ';
	}
	
	/*
	* Background array
	*/
	$backgrounds = array( 
          array(
            'value'       => '0',
            'label'       => __( 'Use Global', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Pattern', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Image', 'atom' )
          ),
          array(
            'value'       => '3',
            'label'       => __( 'Color', 'atom' )
          ),
        );
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  
  $post_meta_box = array(
    'id'          => 'page_option_settings',
    'title'       => __( 'Page Option Setting', 'theme-text-domain' ),
    'desc'        => '',
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
	
	
      array(
        'label'       => __( 'General', 'theme-text-domain' ),
        'id'          => 'custom-post-general',
        'type'        => 'tab'
      ),      	  
	  
      array(
        'label'       => __( 'Layout Type', 'theme-text-domain' ),
        'id'          => 'layout-type',
        'type'        => 'radio',
		'std'    => '0',       
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Use Global', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Full Width', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Left Sidebar', 'atom' )
          ),
          array(
            'value'       => '3',
            'label'       => __( 'Right Sidebar', 'atom' )
          ),
        ),		
      ),
	  array(
        'label'       => 'Sidebar',
        'id'          => 'sidebar-type',
        'type'        => 'select',
        'desc'        => 'Select the exclusive sidebar for this post / page.',
        'choices'     => $sidebars,
        'std'         => 'default',
		'condition'   => 'layout-type:not(1)'
      ),
      array(
        'label'       => __( 'Show Page Header Title', 'theme-text-domain' ),
        'id'          => 'title-show',
        'type'        => 'on-off',
        'std'         => 'on',        
      ),	  
      array(
        'label'       => __( 'Title Style', 'theme-text-domain' ),
        'id'          => 'title-align',
		'condition'   => 'title-show:is(on)',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Use Global', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Left', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Center', 'atom' )
          ),
          array(
            'value'       => '3',
            'label'       => __( 'Right', 'atom' )
          ),
        ),		
      ),	  
      array(
        'label'       => __( 'Custom Title Content', 'theme-text-domain' ),
        'id'          => 'title-content',
        'type'        => 'textarea',		
        'desc'        => __( 'Support HTML Format content.&lt;h1 class="title"&gt;&lt;/h1&gt;', 'theme-text-domain' ),
		'condition'   => 'title-show:is(on)',
      ),	  
      array(
        'label'       => __( 'Custom Title Description', 'theme-text-domain' ),
        'id'          => 'title-desc',
        'type'        => 'textarea',		
        'desc'        => __( 'Support HTML Format content.', 'theme-text-domain' ),
		'condition'   => 'title-show:is(on)',
      ),	  
      array(
        'label'       => __( 'Show Title Breadcrumb', 'theme-text-domain' ),
        'id'          => 'title-breadcrumb',
        'type'        => 'on-off',
        'std'         => 'on',        
      ),	  	  
      array(
        'label'       => __( 'Slider Type', 'theme-text-domain' ),
        'id'          => 'slide-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'None Slider', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Layer Slider', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Revolution Slider', 'atom' )
          ),
        ),		
      ),
	  array(
        'label'       => 'Select Layer Slider',
        'id'          => 'layer-slide-id',
        'type'        => 'select',
        'choices'     => $layersliders,
        'std'         => 'default',
		'condition'   => 'slide-type:is(1)'
      ),
	  array(
        'label'       => 'Select Revolution Slider',
        'id'          => 'rev-slide-id',
        'type'        => 'select',
        'choices'     => $revolutionsliders,
        'std'         => 'default',
		'condition'   => 'slide-type:is(2)'
      ),
	  
	  
	  array(
        'label'       => __( 'Post Options', 'theme-text-domain' ),
        'id'          => 'custom-post-template',
        'type'        => 'tab'
      ),
	  
	  array(
        'label'       => 'Post Type',
        'id'          => 'post-foramt',
        'type'        => 'radio',
		'std'         => '0',
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Default', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Gallery', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Video', 'atom' )
          ),
          array(
            'value'       => '3',
            'label'       => __( 'Audio', 'atom' )
          ),
        ),        
      ),	
	  array(
		 'label'       => __( 'Gallery Images', 'theme-text-domain' ),
		 'id'          => 'gallery-images',
		 'type'        => 'list-item',
		 'condition'   => 'post-foramt:is(1)',
		 'settings'    => array(
		   array(
			 'label'       => 'Image',
			 'id'          => 'image',
			 'type'        => 'upload',
			 'desc'        => '',
			 'std'         => '',
			 'rows'        => '',
			 'post_type'   => '',
			 'taxonomy'    => '',
			 'class'       => ''
		   ),
		 ),
	),
	  array(
        'label'       => 'Video Type',
        'id'          => 'video-type',
        'type'        => 'radio',
		'std'         => '1',
		'condition'   => 'post-foramt:is(2)',
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Youtube', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Vimeo', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Custom', 'atom' )
          ),
        ),        
      ),
      array(
        'label'       => __( 'Video ID or Custom Code', 'theme-text-domain' ),
        'desc'        => __( 'Youtube Id Example : " OapE7K5KyG0 "', 'theme-text-domain' ),
        'id'          => 'video-content',
        'type'        => 'textarea-simple',
		'condition'   => 'post-foramt:is(2)',
      ),
	  array(
        'label'       => 'Audio Type',
        'id'          => 'audio-type',
        'type'        => 'radio',
		'std'         => '0',
		'condition'   => 'post-foramt:is(3)',
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Soundcloud', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Custom', 'atom' )
          ),
        ),        
      ),
      array(
        'label'       => __( 'Code', 'theme-text-domain' ),
        'desc'        => __( 'Soundcloud Example: " http://api.soundcloud.com/tracks/38987054 " ', 'theme-text-domain' ),
        'id'          => 'audio-content',
        'type'        => 'textarea-simple',
		'condition'   => 'post-foramt:is(3)',
      ),
	  
	  array(
        'label'       => 'Related Post Show Style',
        'id'          => 'related-style',
        'type'        => 'select',
		'std'         => '0',
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Use Global', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Style 1', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Style 2', 'atom' )
          ),
          array(
            'value'       => $arrayextend.'3',
            'label'       => $arrayextend.__( 'Style 3', 'atom' )
          ),
          array(
            'value'       => $arrayextend.'4',
            'label'       => $arrayextend.__( 'Style 4', 'atom' )
          ),
          array(
            'value'       => $arrayextend.'5',
            'label'       => $arrayextend.__( 'Style 5', 'atom' )
          ),
        ),        
      ),
	  
      array(
        'label'       => __( 'Post View', 'theme-text-domain' ),
        'id'          => 'post_views_count',
        'type'        => 'text'
      ),	  
      array(
        'label'       => __( 'Post Likes', 'theme-text-domain' ),
        'id'          => 'votes_count',
        'type'        => 'text'
      ),
	  
      array(
        'label'       => __( 'Background', 'theme-text-domain' ),
        'id'          => 'custom-post-background',
        'type'        => 'tab'
      ),	  	  
      array(
        'label'       => __( 'Page Body Background Type', 'theme-text-domain' ),
        'id'          => 'page-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),	  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-bg-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-bg-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-bg-type:is(3)',	
		  ),
	  
      array(
        'label'       => __( 'Page Header Background Type', 'theme-text-domain' ),
        'id'          => 'page-header-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),		  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-header-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-header-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-header-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-header-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-header-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-header-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-header-bg-type:is(3)',	
		  ),
		  
      array(
        'label'       => __( 'Page Title Background Type', 'theme-text-domain' ),
        'id'          => 'page-title-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),	  		  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-title-bg-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-title-bg-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-title-bg-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-title-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-title-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-title-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-title-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-title-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-title-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-title-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-title-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-title-bg-type:is(3)',	
		  ),
		  
      array(
        'label'       => __( 'Page Content Background Type', 'theme-text-domain' ),
        'id'          => 'page-content-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),	  		  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-content-bg-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-content-bg-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-content-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-content-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-content-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-content-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-content-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-content-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-content-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-content-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-content-bg-type:is(3)',	
		  ),
		  
      array(
        'label'       => __( 'Page Footer Background Type', 'theme-text-domain' ),
        'id'          => 'page-footer-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),	  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-footer-bg-type:is(3)',	
		  ),	  	  
		  array(
			'label'       => __( 'Border Top Color', 'theme-text-domain' ),
			'id'          => 'page-footer-border-top-color',
			'type'        => 'colorpicker',
			'std'    	  => '#e3e3e3',
			'condition'     => 'page-footer-bg-type:not(0)',	
		  ),	  	  
		  array(
			'label'       => __( 'Border Bottom Color', 'theme-text-domain' ),
			'id'          => 'page-footer-border-bottom-color',
			'type'        => 'colorpicker',
			'std'    	  => '#e3e3e3',
			'condition'     => 'page-footer-bg-type:not(0)',	
		  ),	  	  
		  array(
			'label'       => __( 'Copyright Background Color', 'theme-text-domain' ),
			'id'          => 'page-footer-copyright-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#f7f7f7',
			'condition'     => 'page-footer-bg-type:not(0)',	
		  ),	  	  
		  array(
			'label'       => __( 'Copyright Border Top Color', 'theme-text-domain' ),
			'id'          => 'page-footer-copyright-border-top-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-footer-bg-type:not(0)',	
		  ),
		  
	  	  
      array(
        'label'       => __( 'Custom CSS/JS', 'theme-text-domain' ),
        'id'          => 'custom-post-css-style',
        'type'        => 'tab'
      ),	  	  	  
      array(
        'label'       => __( 'Custom Page CSS', 'theme-text-domain' ),
        'id'          => 'post-css-style',
        'type'        => 'css',
      ),	  	  	  
      array(
        'label'       => __( 'Custom Page Retina CSS', 'theme-text-domain' ),
        'id'          => 'post-css-retina-style',
        'type'        => 'css',
      ),	  	  	  
      array(
        'label'       => __( 'Custom Page Scripts', 'theme-text-domain' ),
        'id'          => 'post-custom-scripts',
        'type'        => 'textarea',
      ),
	  
    )
  );
  
  $page_meta_box = array(
    'id'          => 'page_option_settings',
    'title'       => __( 'Page Option Setting', 'theme-text-domain' ),
    'desc'        => '',
    'pages'       => array( 'page' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
	
	
      array(
        'label'       => __( 'General', 'theme-text-domain' ),
        'id'          => 'custom-post-general',
        'type'        => 'tab'
      ),      	  
	  
      array(
        'label'       => __( 'Layout Type', 'theme-text-domain' ),
        'id'          => 'layout-type',
        'type'        => 'radio',
		'std'    => '0',       
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Use Global', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Full Width', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Left Sidebar', 'atom' )
          ),
          array(
            'value'       => '3',
            'label'       => __( 'Right Sidebar', 'atom' )
          ),
        ),		
      ),
	  array(
        'label'       => 'Sidebar',
        'id'          => 'sidebar-type',
        'type'        => 'select',
        'desc'        => 'Select the exclusive sidebar for this post / page.',
        'choices'     => $sidebars,
        'std'         => 'default',
		'condition'   => 'layout-type:not(1)'
      ),
      array(
        'label'       => __( 'Show Page Header Title', 'theme-text-domain' ),
        'id'          => 'title-show',
        'type'        => 'on-off',
        'std'         => 'on',        
      ),	  
      array(
        'label'       => __( 'Title Style', 'theme-text-domain' ),
        'id'          => 'title-align',
		'condition'   => 'title-show:is(on)',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Use Global', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Left', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Center', 'atom' )
          ),
          array(
            'value'       => '3',
            'label'       => __( 'Right', 'atom' )
          ),
        ),		
      ),	  
      array(
        'label'       => __( 'Custom Title Content', 'theme-text-domain' ),
        'id'          => 'title-content',
        'type'        => 'textarea',		
        'desc'        => __( 'Support HTML Format content.&lt;h1 class="title"&gt;&lt;/h1&gt;', 'theme-text-domain' ),
		'condition'   => 'title-show:is(on)',
      ),	  
      array(
        'label'       => __( 'Custom Title Description', 'theme-text-domain' ),
        'id'          => 'title-desc',
        'type'        => 'textarea',		
        'desc'        => __( 'Support HTML Format content.', 'theme-text-domain' ),
		'condition'   => 'title-show:is(on)',
      ),	  
      array(
        'label'       => __( 'Show Title Breadcrumb', 'theme-text-domain' ),
        'id'          => 'title-breadcrumb',
        'type'        => 'on-off',
        'std'         => 'on',        
      ),	  	  
      array(
        'label'       => __( 'Slider Type', 'theme-text-domain' ),
        'id'          => 'slide-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'None Slider', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Layer Slider', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Revolution Slider', 'atom' )
          ),
        ),		
      ),
	  array(
        'label'       => 'Select Layer Slider',
        'id'          => 'layer-slide-id',
        'type'        => 'select',
        'choices'     => $layersliders,
        'std'         => 'default',
		'condition'   => 'slide-type:is(1)'
      ),
	  array(
        'label'       => 'Select Revolution Slider',
        'id'          => 'rev-slide-id',
        'type'        => 'select',
        'choices'     => $revolutionsliders,
        'std'         => 'default',
		'condition'   => 'slide-type:is(2)'
      ),
	  
	  
	  array(
        'label'       => __( 'Template Options', 'theme-text-domain' ),
        'id'          => 'custom-post-template',
        'type'        => 'tab'
      ),
	  array(
        'label'       => 'Choose Your Page Templates',
        'id'          => 'custom-page-templates-type',
        'type'        => 'select',
		'std'         => '0',
        'choices'     => $pagetemplates
      ),	
	  array(
        'label'       => __( 'Per Page Show Number', 'atom' ),
        'id'          => 'page-show-numbers',
        'std'         => '6',
        'type'        => 'numeric-slider',
        'min_max_step'=> '1,50,1',
        'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:not(page-contact.php),custom-page-templates-type:not(page-login.php),custom-page-templates-type:not(page-sitemap.php)',
      ),  	
	  array(
        'label'       => __( 'Page Image Don\'t Crop', 'atom' ),
        'desc' 		  => __( 'Turn on will show image didn\'t crop so that show full image.', 'atom' ),
        'id'          => 'page-image-no-crop',
        'std'         => 'off',
        'type'        => 'on-off',
        'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:not(page-blog.php),custom-page-templates-type:not(page-contact.php),custom-page-templates-type:not(page-login.php),custom-page-templates-type:not(page-sitemap.php)',
      ),    	
	  array(
        'label'       => __( 'Posts Show Style', 'atom' ),
        'id'          => 'post-show-style',
        'std'         => '0',
        'type'        => 'select',
        'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:not(page-contact.php),custom-page-templates-type:not(page-login.php),custom-page-templates-type:not(page-sitemap.php)',      
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Style 1', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Style 2', 'atom' )
          ),
        ),		
      ),    	
	  array(
        'label'       => __( 'Posts Show Columns', 'atom' ),
        'id'          => 'ajax-show-columns',
        'std'         => '1',
        'type'        => 'select',
        'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:not(page-blog.php),custom-page-templates-type:not(page-blog-timeline.php),custom-page-templates-type:not(page-contact.php),custom-page-templates-type:not(page-login.php),custom-page-templates-type:not(page-sitemap.php)',      
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( ' 2 Columns ', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( ' 3 Columns ', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( ' 4 Columns ', 'atom' )
          ),
        ),		
      ),  	
	  array(
        'label'       => __( 'Enabled Auto Load', 'atom' ),
        'id'          => 'ajax-enabld-auto',
        'std'         => 'off',
        'type'        => 'on-off',
        'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:not(page-blog.php),custom-page-templates-type:not(page-portfolio.php),custom-page-templates-type:not(page-contact.php),custom-page-templates-type:not(page-login.php),custom-page-templates-type:not(page-sitemap.php)',
      ),  	
	  array(
        'label'       => __( 'Show Portfolio Filters', 'atom' ),
        'id'          => 'portfolio-show-filters',
        'std'         => 'off',
        'type'        => 'on-off',
        'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:not(page-blog.php),custom-page-templates-type:not(page-blog-ajax.php),custom-page-templates-type:not(page-blog-timeline.php),custom-page-templates-type:not(page-portfolio-ajax.php),custom-page-templates-type:not(page-contact.php),custom-page-templates-type:not(page-login.php),custom-page-templates-type:not(page-sitemap.php)',
      ),  	
	  array(
        'label'       => __( 'Support Tags Filters', 'atom' ),
        'id'          => 'portfolio-show-tags',
        'std'         => 'off',
        'type'        => 'on-off',
        'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:not(page-blog.php),custom-page-templates-type:not(page-blog-ajax.php),custom-page-templates-type:not(page-blog-timeline.php),custom-page-templates-type:not(page-portfolio-ajax.php),custom-page-templates-type:not(page-contact.php),custom-page-templates-type:not(page-login.php),custom-page-templates-type:not(page-sitemap.php),portfolio-show-filters:is(on)',
      ),   	
	  array(
        'label'       => __( 'Show Tags (Enabled Tags', 'atom' ),
        'desc'          => __( 'Input portfolio tags slug use "," like black,image .', 'atom' ),
        'id'          => 'portfolio-filters-tags',
        'std'         => '',
        'type'        => 'text',
        'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:not(page-blog.php),custom-page-templates-type:not(page-blog-ajax.php),custom-page-templates-type:not(page-blog-timeline.php),custom-page-templates-type:not(page-portfolio-ajax.php),custom-page-templates-type:not(page-contact.php),custom-page-templates-type:not(page-login.php),custom-page-templates-type:not(page-sitemap.php),portfolio-show-filters:is(on)',
      ),    	
	  array(
        'label'       => __( 'Show Categories', 'atom' ),
        'desc'          => __( 'Input portfolio category slug use "," like video,photo .', 'atom' ),
        'id'          => 'portfolio-filters-cats',
        'std'         => '',
        'type'        => 'text',
        'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:not(page-blog.php),custom-page-templates-type:not(page-blog-ajax.php),custom-page-templates-type:not(page-blog-timeline.php),custom-page-templates-type:not(page-portfolio-ajax.php),custom-page-templates-type:not(page-contact.php),custom-page-templates-type:not(page-login.php),custom-page-templates-type:not(page-sitemap.php),portfolio-show-filters:is(on)',
      ), 
      array(
        'label'       => __( 'Show Categories', 'atom' ),
        'id'          => 'ajax-cats',
        'std'         => '',
        'type'        => 'text',
        'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:not(page-portfolio.php),custom-page-templates-type:not(page-portfolio-ajax.php),custom-page-templates-type:not(page-contact.php),custom-page-templates-type:not(page-login.php),custom-page-templates-type:not(page-sitemap.php)',
      ), 
      array(
        'label'       => __( 'Show Categories', 'atom' ),
        'desc'          => 'input portfolio category slug use "," like video,photo .',
        'id'          => 'portfolio-ajax-cats',
        'std'         => '',
        'type'        => 'text',
        'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:not(page-blog.php),custom-page-templates-type:not(page-blog-ajax.php),custom-page-templates-type:not(page-blog-timeline.php),custom-page-templates-type:not(page-portfolio.php),custom-page-templates-type:not(page-contact.php),custom-page-templates-type:not(page-login.php),custom-page-templates-type:not(page-sitemap.php)',
      ),  
      array(
        'label'       => __( 'Show Tags', 'atom' ),
        'desc'       => __( 'Input portfolio tag slug use "," like video,photo .', 'atom' ),
        'id'          => 'portfolio-ajax-tags',
        'std'         => '',
        'type'        => 'text',
        'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:not(page-blog.php),custom-page-templates-type:not(page-blog-ajax.php),custom-page-templates-type:not(page-blog-timeline.php),custom-page-templates-type:not(page-portfolio.php),custom-page-templates-type:not(page-contact.php),custom-page-templates-type:not(page-login.php),custom-page-templates-type:not(page-sitemap.php)',
      ),  
	  array(
        'label'       => __( 'Show Map', 'atom' ),
        'id'          => 'contact-show-map',
        'std'         => 'off',
        'type'        => 'on-off',
        'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:is(page-contact.php)',
      ),  
	  array(
        'label'       => __( 'Map Show Height', 'atom' ),
        'id'          => 'contact-map-height',
        'std'         => '350',
        'type'        => 'text',
        'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:is(page-contact.php),contact-show-map:is(on)',
      ),    
	  array(
        'label'       => __( 'Map Skin', 'atom' ),
        'id'          => 'contact-map-theme',
        'std'         => '1',
        'type'        => 'select',
        'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:is(page-contact.php),contact-show-map:is(on)',       
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Default', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'White', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Black', 'atom' )
          ),
        ),	
      ),    
	  array(
        'label'       => __( 'Map Lat Lng', 'atom' ),
        'desc'        => __( 'e.g., 40.716038,-74.080811', 'atom' ),
        'id'          => 'contact-map-latlng',
        'std'         => '',
        'type'        => 'text',
        'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:is(page-contact.php),contact-show-map:is(on)',
      ),   
	  array(
        'label'       => __( 'Map Address', 'atom' ),
        'desc'        => __( 'Support HTML , e.g., Company Name 123 street, New Valley , USA', 'atom' ),
        'id'          => 'contact-map-address',
        'std'         => '',
        'type'        => 'textarea',
        'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:is(page-contact.php),contact-show-map:is(on)',
      ),     
	  array(
        'label'       => __( 'Contact Form Enable', 'atom' ),
        'desc'        => __( 'turn on enabled default contact template contact form.', 'atom' ),
        'id'          => 'contact-form',
        'std'         => 'off',
        'type'        => 'on-off',
        'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:is(page-contact.php)',
      ),  	     
		  array(
			'label'       => __( 'Contact Recipient Email', 'atom' ),
			'desc'        => __( 'It\'s just for default contact form.', 'atom' ),
			'id'          => 'contact-recipient',
			'std'         => '',
			'type'        => 'text',
			'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:is(page-contact.php),contact-form:is(on)',
		  ),      
		  array(
			'label'       => __( 'Sender Email Feedback', 'atom' ),
			'desc'        => __( 'If check sender will also get a success email when submit success.', 'atom' ),
			'id'          => 'contact-backsender',
			'std'         => 'off',
			'type'        => 'on-off',
			'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:is(page-contact.php),contact-form:is(on)',
		  ),  	     
		  array(
			'label'       => __( 'Contact Form Recaptcha', 'atom' ),
			'id'          => 'form-recaptcha',
			'std'         => 'off',
			'type'        => 'on-off',
			'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:is(page-contact.php),contact-form:is(on)',
		  ), 
			  array(
				'label'       => __( 'Recaptcha Public Key', 'atom' ),
				'desc'        => __( '<strong>The basic registration form requires</strong> that new users copy text from a "Captcha" image to keep spammers out of the site. You need an account at <a href="http://recaptcha.net/">recaptcha.net</a>. Signing up is FREE and easy. Once you have signed up, come back here and enter the following settings:', 'atom' ),
				'id'          => 'recaptcha-pub-api',
				'std'         => '',
				'type'        => 'text',
				'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:is(page-contact.php),form-recaptcha:is(on)',
			  ),
			  array(
				'label'       => __( 'Recaptcha Private Key', 'atom' ),
				'id'          => 'recaptcha-pri-api',
				'std'         => '',
				'type'        => 'text',
				'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:is(page-contact.php),form-recaptcha:is(on)',
			  ),    
			  array(
				'label'       => __( 'Recaptcha Theme', 'atom' ),
				'id'          => 'recaptcha-theme',
				'std'         => 'white',
				'type'        => 'select',
				'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:is(page-contact.php),form-recaptcha:is(on)',       
				'choices'     => array( 
				  array(
					'value'       => 'white',
					'label'       => __( 'White', 'atom' )
				  ),
				  array(
					'value'       => 'red',
					'label'       => __( 'Red', 'atom' )
				  ),
				  array(
					'value'       => 'blackglass',
					'label'       => __( 'Blackglass', 'atom' )
				  ),
				  array(
					'value'       => 'clean',
					'label'       => __( 'Clean', 'atom' )
				  ),
				),	
			  ),  	  
			  array(
				'label'       => __( 'Recaptcha Language', 'atom' ),
				'id'          => 'recaptcha-lang',
				'std'         => 'en',
				'type'        => 'select',
				'condition'   => 'custom-page-templates-type:not(none),custom-page-templates-type:is(page-contact.php),form-recaptcha:is(on)',       
				'choices'     => array( 
				  array(
					'value'       => 'en',
					'label'       => __( 'en', 'atom' )
				  ),
				  array(
					'value'       => 'nl',
					'label'       => __( 'nl', 'atom' )
				  ),
				  array(
					'value'       => 'fr',
					'label'       => __( 'fr', 'atom' )
				  ),
				  array(
					'value'       => 'de',
					'label'       => __( 'de', 'atom' )
				  ),
				  array(
					'value'       => 'pt',
					'label'       => __( 'pt', 'atom' )
				  ),
				  array(
					'value'       => 'ru',
					'label'       => __( 'ru', 'atom' )
				  ),
				  array(
					'value'       => 'es',
					'label'       => __( 'es', 'atom' )
				  ),
				  array(
					'value'       => 'tr',
					'label'       => __( 'tr', 'atom' )
				  ),
				),	
			  ),  	
	  
      array(
        'label'       => __( 'Background', 'theme-text-domain' ),
        'id'          => 'custom-post-background',
        'type'        => 'tab'
      ),	  	  
      array(
        'label'       => __( 'Page Body Background Type', 'theme-text-domain' ),
        'id'          => 'page-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),	  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-bg-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-bg-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-bg-type:is(3)',	
		  ),
	  
      array(
        'label'       => __( 'Page Header Background Type', 'theme-text-domain' ),
        'id'          => 'page-header-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),		  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-header-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-header-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-header-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-header-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-header-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-header-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-header-bg-type:is(3)',	
		  ),
		  
      array(
        'label'       => __( 'Page Title Background Type', 'theme-text-domain' ),
        'id'          => 'page-title-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),	  		  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-title-bg-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-title-bg-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-title-bg-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-title-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-title-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-title-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-title-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-title-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-title-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-title-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-title-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-title-bg-type:is(3)',	
		  ),
		  
      array(
        'label'       => __( 'Page Content Background Type', 'theme-text-domain' ),
        'id'          => 'page-content-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),	  		  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-content-bg-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-content-bg-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-content-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-content-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-content-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-content-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-content-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-content-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-content-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-content-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-content-bg-type:is(3)',	
		  ),
		  
      array(
        'label'       => __( 'Page Footer Background Type', 'theme-text-domain' ),
        'id'          => 'page-footer-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),	  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-footer-bg-type:is(3)',	
		  ),	  	  
		  array(
			'label'       => __( 'Border Top Color', 'theme-text-domain' ),
			'id'          => 'page-footer-border-top-color',
			'type'        => 'colorpicker',
			'std'    	  => '#e3e3e3',
			'condition'     => 'page-footer-bg-type:not(0)',	
		  ),	  	  
		  array(
			'label'       => __( 'Border Bottom Color', 'theme-text-domain' ),
			'id'          => 'page-footer-border-bottom-color',
			'type'        => 'colorpicker',
			'std'    	  => '#e3e3e3',
			'condition'     => 'page-footer-bg-type:not(0)',	
		  ),	  	  
		  array(
			'label'       => __( 'Copyright Background Color', 'theme-text-domain' ),
			'id'          => 'page-footer-copyright-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#f7f7f7',
			'condition'     => 'page-footer-bg-type:not(0)',	
		  ),	  	  
		  array(
			'label'       => __( 'Copyright Border Top Color', 'theme-text-domain' ),
			'id'          => 'page-footer-copyright-border-top-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-footer-bg-type:not(0)',	
		  ),
		  
	  	  
      array(
        'label'       => __( 'Custom CSS/JS', 'theme-text-domain' ),
        'id'          => 'custom-post-css-style',
        'type'        => 'tab'
      ),	  	  	  
      array(
        'label'       => __( 'Custom Page CSS', 'theme-text-domain' ),
        'id'          => 'post-css-style',
        'type'        => 'css',
      ),	  	  	  
      array(
        'label'       => __( 'Custom Page Retina CSS', 'theme-text-domain' ),
        'id'          => 'post-css-retina-style',
        'type'        => 'css',
      ),	  	  	  
      array(
        'label'       => __( 'Custom Page Scripts', 'theme-text-domain' ),
        'id'          => 'post-custom-scripts',
        'type'        => 'textarea',
      ),
	  
    )
  );
  
  
  
  $portfolio_meta_box = array(
    'id'          => 'page_option_settings',
    'title'       => __( 'Page Option Setting', 'theme-text-domain' ),
    'desc'        => '',
    'pages'       => array( 'portfolio' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
	
	
      array(
        'label'       => __( 'General', 'theme-text-domain' ),
        'id'          => 'custom-post-general',
        'type'        => 'tab'
      ),      	  
	  
      array(
        'label'       => __( 'Layout Type', 'theme-text-domain' ),
        'id'          => 'layout-type',
        'type'        => 'radio',
		'std'    => '0',       
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Use Global', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Full Width', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Left Sidebar', 'atom' )
          ),
          array(
            'value'       => '3',
            'label'       => __( 'Right Sidebar', 'atom' )
          ),
        ),		
      ),
	  array(
        'label'       => 'Sidebar',
        'id'          => 'sidebar-type',
        'type'        => 'select',
        'desc'        => 'Select the exclusive sidebar for this post / page.',
        'choices'     => $sidebars,
        'std'         => 'default',
		'condition'   => 'layout-type:not(1)'
      ),
      array(
        'label'       => __( 'Show Page Header Title', 'theme-text-domain' ),
        'id'          => 'title-show',
        'type'        => 'on-off',
        'std'         => 'on',        
      ),	  
      array(
        'label'       => __( 'Title Style', 'theme-text-domain' ),
        'id'          => 'title-align',
		'condition'   => 'title-show:is(on)',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Use Global', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Left', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Center', 'atom' )
          ),
          array(
            'value'       => '3',
            'label'       => __( 'Right', 'atom' )
          ),
        ),		
      ),	  
      array(
        'label'       => __( 'Custom Title Content', 'theme-text-domain' ),
        'id'          => 'title-content',
        'type'        => 'textarea',		
        'desc'        => __( 'Support HTML Format content.&lt;h1 class="title"&gt;&lt;/h1&gt;', 'theme-text-domain' ),
		'condition'   => 'title-show:is(on)',
      ),	  
      array(
        'label'       => __( 'Custom Title Description', 'theme-text-domain' ),
        'id'          => 'title-desc',
        'type'        => 'textarea',		
        'desc'        => __( 'Support HTML Format content.', 'theme-text-domain' ),
		'condition'   => 'title-show:is(on)',
      ),	  
      array(
        'label'       => __( 'Show Title Breadcrumb', 'theme-text-domain' ),
        'id'          => 'title-breadcrumb',
        'type'        => 'on-off',
        'std'         => 'on',        
      ),	  	  
      array(
        'label'       => __( 'Slider Type', 'theme-text-domain' ),
        'id'          => 'slide-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'None Slider', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Layer Slider', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Revolution Slider', 'atom' )
          ),
        ),		
      ),
	  array(
        'label'       => 'Select Layer Slider',
        'id'          => 'layer-slide-id',
        'type'        => 'select',
        'choices'     => $layersliders,
        'std'         => 'default',
		'condition'   => 'slide-type:is(1)'
      ),
	  array(
        'label'       => 'Select Revolution Slider',
        'id'          => 'rev-slide-id',
        'type'        => 'select',
        'choices'     => $revolutionsliders,
        'std'         => 'default',
		'condition'   => 'slide-type:is(2)'
      ),
	  
	  
	  array(
        'label'       => __( 'Portfolio Options', 'theme-text-domain' ),
        'id'          => 'custom-post-template',
        'type'        => 'tab'
      ),
	  array(
        'label'       => 'Portfolio Type',
        'id'          => 'post-foramt',
        'type'        => 'radio',
		'std'         => '0',
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Image', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Gallery', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Video', 'atom' )
          ),
        ),        
      ),	
	  array(
		 'label'       => __( 'Gallery Images', 'theme-text-domain' ),
		 'id'          => 'gallery-images',
		 'type'        => 'list-item',
		 'condition'   => 'post-foramt:is(1)',
		 'settings'    => array(
		   array(
			 'label'       => 'Image',
			 'id'          => 'image',
			 'type'        => 'upload',
			 'desc'        => '',
			 'std'         => '',
			 'rows'        => '',
			 'post_type'   => '',
			 'taxonomy'    => '',
			 'class'       => ''
		   ),
		 ),
	),
	  array(
        'label'       => 'Video Type',
        'id'          => 'video-type',
        'type'        => 'radio',
		'std'         => '1',
		'condition'   => 'post-foramt:is(2)',
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Youtube', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Vimeo', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Custom', 'atom' )
          ),
        ),        
      ),
      array(
        'label'       => __( 'Video ID or Custom Code', 'theme-text-domain' ),
        'desc'        => __( 'Youtube Id Example : " OapE7K5KyG0 "', 'theme-text-domain' ),
        'id'          => 'video-content',
        'type'        => 'textarea-simple',
		'condition'   => 'post-foramt:is(2)',
      ),
	  array(
        'label'       => 'Single Page Style',
        'id'          => 'post-style',
        'type'        => 'select',
		'std'         => '0',
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Global Style', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Style 1', 'atom' )
          ),
          array(
            'value'       => $arrayextend.'2',
            'label'       => $arrayextend.__( 'Style 2', 'atom' )
          ),
          array(
            'value'       => $arrayextend.'3',
            'label'       => $arrayextend.__( 'Style 3', 'atom' )
          ),
        ),        
      ),
	  
      array(
        'label'       => __( 'Client', 'theme-text-domain' ),
        'id'          => 'portfolio-client',
        'type'        => 'text'
      ),
      array(
        'label'       => __( 'Skills', 'theme-text-domain' ),
        'id'          => 'portfolio-skills',
        'type'        => 'text'
      ),	
      array(
        'label'       => __( 'Download Link', 'theme-text-domain' ),
        'id'          => 'portfolio-download',
        'type'        => 'text'
      ),	
	  array(
		 'label'       => __( 'Custom Portfolio Fields', 'theme-text-domain' ),
		 'desc'        => __( 'Icon field use fontawesome icon name', 'theme-text-domain' ),
		 'id'          => 'portfolio-custom-fields',
		 'type'        => 'list-item',
		 'settings'    => array(
		   array(
			 'label'       => 'Name',
			 'id'          => 'name',
			 'type'        => 'text',
			 'desc'        => '',
			 'std'         => 'Custom Name',
			 'rows'        => '',
			 'post_type'   => '',
			 'taxonomy'    => '',
			 'class'       => ''
		   ),
		   array(
			 'label'       => 'Icon',
			 'id'          => 'icon',
			 'type'        => 'text',
			 'desc'        => '',
			 'std'         => 'fa-dollar',
			 'rows'        => '',
			 'post_type'   => '',
			 'taxonomy'    => '',
			 'class'       => ''
		   ),
		   array(
			 'label'       => 'Value',
			 'id'          => 'value',
			 'type'        => 'text',
			 'desc'        => '',
			 'std'         => 'Custom Value',
			 'rows'        => '',
			 'post_type'   => '',
			 'taxonomy'    => '',
			 'class'       => ''
		   )
		 ),
	),
	  array(
        'label'       => 'Related Post Show Style',
        'id'          => 'related-style',
        'type'        => 'select',
		'std'         => '0',
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Use Global', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Style 1', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Style 2', 'atom' )
          ),
          array(
            'value'       => $arrayextend.'3',
            'label'       => $arrayextend.__( 'Style 3', 'atom' )
          ),
          array(
            'value'       => $arrayextend.'4',
            'label'       => $arrayextend.__( 'Style 4', 'atom' )
          ),
          array(
            'value'       => $arrayextend.'5',
            'label'       => $arrayextend.__( 'Style 5', 'atom' )
          ),
          array(
            'value'       => $arrayextend.'6',
            'label'       => $arrayextend.__( 'Style 6', 'atom' )
          ),
          array(
            'value'       => $arrayextend.'7',
            'label'       => $arrayextend.__( 'Style 7', 'atom' )
          ),
          array(
            'value'       => $arrayextend.'8',
            'label'       => $arrayextend.__( 'Style 8', 'atom' )
          ),
        ),        
      ),
	  
      array(
        'label'       => __( 'Post View', 'theme-text-domain' ),
        'id'          => 'post_views_count',
        'type'        => 'text'
      ),	  
      array(
        'label'       => __( 'Post Likes', 'theme-text-domain' ),
        'id'          => 'votes_count',
        'type'        => 'text'
      ),
	  
      array(
        'label'       => __( 'Background', 'theme-text-domain' ),
        'id'          => 'custom-post-background',
        'type'        => 'tab'
      ),	  	  
      array(
        'label'       => __( 'Page Body Background Type', 'theme-text-domain' ),
        'id'          => 'page-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),	  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-bg-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-bg-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-bg-type:is(3)',	
		  ),
	  
      array(
        'label'       => __( 'Page Header Background Type', 'theme-text-domain' ),
        'id'          => 'page-header-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),		  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-header-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-header-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-header-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-header-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-header-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-header-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-header-bg-type:is(3)',	
		  ),
		  
      array(
        'label'       => __( 'Page Title Background Type', 'theme-text-domain' ),
        'id'          => 'page-title-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),	  		  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-title-bg-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-title-bg-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-title-bg-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-title-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-title-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-title-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-title-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-title-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-title-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-title-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-title-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-title-bg-type:is(3)',	
		  ),
		  
      array(
        'label'       => __( 'Page Content Background Type', 'theme-text-domain' ),
        'id'          => 'page-content-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),	  		  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-content-bg-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-content-bg-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-content-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-content-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-content-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-content-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-content-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-content-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-content-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-content-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-content-bg-type:is(3)',	
		  ),
		  
      array(
        'label'       => __( 'Page Footer Background Type', 'theme-text-domain' ),
        'id'          => 'page-footer-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),	  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-footer-bg-type:is(3)',	
		  ),	  	  
		  array(
			'label'       => __( 'Border Top Color', 'theme-text-domain' ),
			'id'          => 'page-footer-border-top-color',
			'type'        => 'colorpicker',
			'std'    	  => '#e3e3e3',
			'condition'     => 'page-footer-bg-type:not(0)',	
		  ),	  	  
		  array(
			'label'       => __( 'Border Bottom Color', 'theme-text-domain' ),
			'id'          => 'page-footer-border-bottom-color',
			'type'        => 'colorpicker',
			'std'    	  => '#e3e3e3',
			'condition'     => 'page-footer-bg-type:not(0)',	
		  ),	  	  
		  array(
			'label'       => __( 'Copyright Background Color', 'theme-text-domain' ),
			'id'          => 'page-footer-copyright-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#f7f7f7',
			'condition'     => 'page-footer-bg-type:not(0)',	
		  ),	  	  
		  array(
			'label'       => __( 'Copyright Border Top Color', 'theme-text-domain' ),
			'id'          => 'page-footer-copyright-border-top-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-footer-bg-type:not(0)',	
		  ),
		  
	  	  
      array(
        'label'       => __( 'Custom CSS/JS', 'theme-text-domain' ),
        'id'          => 'custom-post-css-style',
        'type'        => 'tab'
      ),	  	  	  
      array(
        'label'       => __( 'Custom Page CSS', 'theme-text-domain' ),
        'id'          => 'post-css-style',
        'type'        => 'css',
      ),	  	  	  
      array(
        'label'       => __( 'Custom Page Retina CSS', 'theme-text-domain' ),
        'id'          => 'post-css-retina-style',
        'type'        => 'css',
      ),	  	  	  
      array(
        'label'       => __( 'Custom Page Scripts', 'theme-text-domain' ),
        'id'          => 'post-custom-scripts',
        'type'        => 'textarea',
      ),
	  
    )
  );
  
  $product_meta_box = array(
    'id'          => 'page_option_settings',
    'title'       => __( 'Page Option Setting', 'theme-text-domain' ),
    'desc'        => '',
    'pages'       => array( 'product' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
	
	
      array(
        'label'       => __( 'General', 'theme-text-domain' ),
        'id'          => 'custom-post-general',
        'type'        => 'tab'
      ),      	  
	  
      array(
        'label'       => __( 'Layout Type', 'theme-text-domain' ),
        'id'          => 'layout-type',
        'type'        => 'radio',
		'std'    => '0',       
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Use Global', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Full Width', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Left Sidebar', 'atom' )
          ),
          array(
            'value'       => '3',
            'label'       => __( 'Right Sidebar', 'atom' )
          ),
        ),		
      ),
	  array(
        'label'       => 'Sidebar',
        'id'          => 'sidebar-type',
        'type'        => 'select',
        'desc'        => 'Select the exclusive sidebar for this post / page.',
        'choices'     => $sidebars,
        'std'         => 'default',
		'condition'   => 'layout-type:not(1)'
      ),
      array(
        'label'       => __( 'Show Page Header Title', 'theme-text-domain' ),
        'id'          => 'title-show',
        'type'        => 'on-off',
        'std'         => 'on',        
      ),	  
      array(
        'label'       => __( 'Title Style', 'theme-text-domain' ),
        'id'          => 'title-align',
		'condition'   => 'title-show:is(on)',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Use Global', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Left', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Center', 'atom' )
          ),
          array(
            'value'       => '3',
            'label'       => __( 'Right', 'atom' )
          ),
        ),		
      ),	  
      array(
        'label'       => __( 'Custom Title Content', 'theme-text-domain' ),
        'id'          => 'title-content',
        'type'        => 'textarea',		
        'desc'        => __( 'Support HTML Format content.&lt;h1 class="title"&gt;&lt;/h1&gt;', 'theme-text-domain' ),
		'condition'   => 'title-show:is(on)',
      ),	  
      array(
        'label'       => __( 'Custom Title Description', 'theme-text-domain' ),
        'id'          => 'title-desc',
        'type'        => 'textarea',		
        'desc'        => __( 'Support HTML Format content.', 'theme-text-domain' ),
		'condition'   => 'title-show:is(on)',
      ),	  
      array(
        'label'       => __( 'Show Title Breadcrumb', 'theme-text-domain' ),
        'id'          => 'title-breadcrumb',
        'type'        => 'on-off',
        'std'         => 'on',        
      ),	  	  
      array(
        'label'       => __( 'Slider Type', 'theme-text-domain' ),
        'id'          => 'slide-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'None Slider', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Layer Slider', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Revolution Slider', 'atom' )
          ),
        ),		
      ),
	  array(
        'label'       => 'Select Layer Slider',
        'id'          => 'layer-slide-id',
        'type'        => 'select',
        'choices'     => $layersliders,
        'std'         => 'default',
		'condition'   => 'slide-type:is(1)'
      ),
	  array(
        'label'       => 'Select Revolution Slider',
        'id'          => 'rev-slide-id',
        'type'        => 'select',
        'choices'     => $revolutionsliders,
        'std'         => 'default',
		'condition'   => 'slide-type:is(2)'
      ),
	  
	  
	  
      array(
        'label'       => __( 'Background', 'theme-text-domain' ),
        'id'          => 'custom-post-background',
        'type'        => 'tab'
      ),	  	  
      array(
        'label'       => __( 'Page Body Background Type', 'theme-text-domain' ),
        'id'          => 'page-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),	  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-bg-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-bg-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-bg-type:is(3)',	
		  ),
	  
      array(
        'label'       => __( 'Page Header Background Type', 'theme-text-domain' ),
        'id'          => 'page-header-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),		  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-header-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-header-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-header-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-header-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-header-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-header-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-header-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-header-bg-type:is(3)',	
		  ),
		  
      array(
        'label'       => __( 'Page Title Background Type', 'theme-text-domain' ),
        'id'          => 'page-title-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),	  		  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-title-bg-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-title-bg-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-title-bg-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-title-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-title-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-title-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-title-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-title-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-title-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-title-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-title-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-title-bg-type:is(3)',	
		  ),
		  
      array(
        'label'       => __( 'Page Content Background Type', 'theme-text-domain' ),
        'id'          => 'page-content-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),	  		  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-content-bg-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-content-bg-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-content-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-content-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-content-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-content-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-content-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-content-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-content-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-content-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-content-bg-type:is(3)',	
		  ),
		  
      array(
        'label'       => __( 'Page Footer Background Type', 'theme-text-domain' ),
        'id'          => 'page-footer-bg-type',
        'type'        => 'radio',
		'std'    	  => '0',       
        'choices'     => $backgrounds,	
      ),	  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-pattern-width',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-pattern-height',
			'type'        => 'text',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-pattern-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-pattern-retina',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(1)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-image',
			'type'        => 'upload',
			'std'    	  => '',
			'condition'     => 'page-footer-bg-type:is(2)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'page-footer-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-footer-bg-type:is(3)',	
		  ),	  	  
		  array(
			'label'       => __( 'Border Top Color', 'theme-text-domain' ),
			'id'          => 'page-footer-border-top-color',
			'type'        => 'colorpicker',
			'std'    	  => '#e3e3e3',
			'condition'     => 'page-footer-bg-type:not(0)',	
		  ),	  	  
		  array(
			'label'       => __( 'Border Bottom Color', 'theme-text-domain' ),
			'id'          => 'page-footer-border-bottom-color',
			'type'        => 'colorpicker',
			'std'    	  => '#e3e3e3',
			'condition'     => 'page-footer-bg-type:not(0)',	
		  ),	  	  
		  array(
			'label'       => __( 'Copyright Background Color', 'theme-text-domain' ),
			'id'          => 'page-footer-copyright-bg-color',
			'type'        => 'colorpicker',
			'std'    	  => '#f7f7f7',
			'condition'     => 'page-footer-bg-type:not(0)',	
		  ),	  	  
		  array(
			'label'       => __( 'Copyright Border Top Color', 'theme-text-domain' ),
			'id'          => 'page-footer-copyright-border-top-color',
			'type'        => 'colorpicker',
			'std'    	  => '#ffffff',
			'condition'     => 'page-footer-bg-type:not(0)',	
		  ),
		  
	  	  
      array(
        'label'       => __( 'Custom CSS/JS', 'theme-text-domain' ),
        'id'          => 'custom-post-css-style',
        'type'        => 'tab'
      ),	  	  	  
      array(
        'label'       => __( 'Custom Page CSS', 'theme-text-domain' ),
        'id'          => 'post-css-style',
        'type'        => 'css',
      ),	  	  	  
      array(
        'label'       => __( 'Custom Page Retina CSS', 'theme-text-domain' ),
        'id'          => 'post-css-retina-style',
        'type'        => 'css',
      ),	  	  	  
      array(
        'label'       => __( 'Custom Page Scripts', 'theme-text-domain' ),
        'id'          => 'post-custom-scripts',
        'type'        => 'textarea',
      ),
	  
    )
  );
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $post_meta_box );
    ot_register_meta_box( $page_meta_box );
    //ot_register_meta_box( $portfolio_meta_box );
    ot_register_meta_box( $product_meta_box );

}