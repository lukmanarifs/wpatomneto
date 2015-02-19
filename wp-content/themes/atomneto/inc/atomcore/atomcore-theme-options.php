<?php
/**
 * Initialize the custom Theme Options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.0
 */
function custom_theme_options() {
	/**
	 * Google Web Font now 624
	 * http://www.google.com/webfonts
	 * <link href='http://fonts.googleapis.com/css?family=...'rel='stylesheet' type='text/css'>
	 */
	$google_fonts_list = 'ABeeZee|Abel|Abril+Fatface|Aclonica|Acme|Actor|Adamina|Advent+Pro|Aguafina+Script|Akronim|Aladin|Aldrich|Alegreya|Alegreya+SC|Alex+Brush|Alfa+Slab+One|Alice|Alike|Alike+Angular|Allan|Allerta|Allerta+Stencil|Allura|Almendra|Almendra+Display|Almendra+SC|Amarante|Amaranth|Amatic+SC|Amethysta|Anaheim|Andada|Andika|Annie+Use+Your+Telescope|Anonymous+Pro|Antic|Antic+Didone|Antic+Slab|Anton|Arapey|Arbutus|Arbutus+Slab|Architects+Daughter|Archivo+Black|Archivo+Narrow|Arimo|Arizonia|Armata|Artifika|Arvo|Asap|Asset|Astloch|Asul|Atomic+Age|Aubrey|Audiowide|Autour+One|Average|Average+Sans|Averia+Gruesa+Libre|Averia+Libre|Averia+Sans+Libre|Averia+Serif+Libre|Bad+Script|Balthazar|Bangers|Basic|Baumans|Belgrano|Belleza|BenchNine|Bentham|Berkshire+Swash|Bevan|Bigelow+Rules|Bigshot+One|Bilbo|Bilbo+Swash+Caps|Bitter|Black+Ops+One|Bonbon|Boogaloo|Bowlby+One|Bowlby+One+SC|Brawler|Bree+Serif|Bubblegum+Sans|Bubbler+One|Buda:300|Buenard|Butcherman|Butterfly+Kids|Cabin|Cabin+Condensed|Cabin+Sketch|Caesar+Dressing|Cagliostro|Calligraffitti|Cambo|Candal|Cantarell|Cantata+One|Cantora+One|Capriola|Cardo|Carme|Carrois+Gothic|Carrois+Gothic+SC|Carter+One|Caudex|Cedarville+Cursive|Ceviche+One|Changa+One|Chango|Chau+Philomene+One|Chela+One|Chelsea+Market|Cherry+Cream+Soda|Cherry+Swash|Chewy|Chicle|Chivo|Cinzel|Cinzel+Decorative|Clicker+Script|Coda|Coda+Caption:800|Codystar|Combo|Comfortaa|Coming+Soon|Concert+One|Condiment|Contrail+One|Convergence|Cookie|Copse|Corben|Courgette|Cousine|Coustard|Covered+By+Your+Grace|Crafty+Girls|Creepster|Crete+Round|Crimson+Text|Croissant+One|Crushed|Cuprum|Cutive|Cutive+Mono|Damion|Dancing+Script|Dawning+of+a+New+Day|Days+One|Delius|Delius+Swash+Caps|Delius+Unicase|Della+Respira|Denk+One|Devonshire|Didact+Gothic|Diplomata|Diplomata+SC|Domine|Donegal+One|Doppio+One|Dorsa|Dosis|Dr+Sugiyama|Droid+Sans|Droid+Sans+Mono|Droid+Serif|Duru+Sans|Dynalight|EB+Garamond|Eagle+Lake|Eater|Economica|Electrolize|Elsie|Elsie+Swash+Caps|Emblema+One|Emilys+Candy|Engagement|Englebert|Enriqueta|Erica+One|Esteban|Euphoria+Script|Ewert|Exo|Expletus+Sans|Fanwood+Text|Fascinate|Fascinate+Inline|Faster+One|Federant|Federo|Felipa|Fenix|Finger+Paint|Fjalla+One|Fjord+One|Flamenco|Flavors|Fondamento|Fontdiner+Swanky|Forum|Francois+One|Freckle+Face|Fredericka+the+Great|Fredoka+One|Fresca|Frijole|Fruktur|Fugaz+One|Gabriela|Gafata|Galdeano|Galindo|Gentium+Basic|Gentium+Book+Basic|Geo|Geostar|Geostar+Fill|Germania+One|Gilda+Display|Give+You+Glory|Glass+Antiqua|Glegoo|Gloria+Hallelujah|Goblin+One|Gochi+Hand|Gorditas|Goudy+Bookletter+1911|Graduate|Grand+Hotel|Gravitas+One|Great+Vibes|Griffy|Gruppo|Gudea|Habibi|Hammersmith+One|Hanalei|Hanalei+Fill|Handlee|Happy+Monkey|Headland+One|Henny+Penny|Herr+Von+Muellerhoff|Holtwood+One+SC|Homemade+Apple|Homenaje|IM+Fell+DW+Pica|IM+Fell+DW+Pica+SC|IM+Fell+Double+Pica|IM+Fell+Double+Pica+SC|IM+Fell+English|IM+Fell+English+SC|IM+Fell+French+Canon|IM+Fell+French+Canon+SC|IM+Fell+Great+Primer|IM+Fell+Great+Primer+SC|Iceberg|Iceland|Imprima|Inconsolata|Inder|Indie+Flower|Inika|Irish+Grover|Istok+Web|Italiana|Italianno|Jacques+Francois|Jacques+Francois+Shadow|Jim+Nightshade|Jockey+One|Jolly+Lodger|Josefin+Sans|Josefin+Slab|Joti+One|Judson|Julee|Julius+Sans+One|Junge|Jura|Just+Another+Hand|Just+Me+Again+Down+Here|Kameron|Karla|Kaushan+Script|Kavoon|Keania+One|Kelly+Slab|Kenia|Kite+One|Knewave|Kotta+One|Kranky|Kreon|Kristi|Krona+One|La+Belle+Aurore|Lancelot|Lato|League+Script|Leckerli+One|Ledger|Lekton|Lemon|Libre+Baskerville|Life+Savers|Lilita+One|Limelight|Linden+Hill|Lobster|Lobster+Two|Londrina+Outline|Londrina+Shadow|Londrina+Sketch|Londrina+Solid|Lora|Love+Ya+Like+A+Sister|Loved+by+the+King|Lovers+Quarrel|Luckiest+Guy|Lusitana|Lustria|Macondo|Macondo+Swash+Caps|Magra|Maiden+Orange|Mako|Marcellus|Marcellus+SC|Marck+Script|Margarine|Marko+One|Marmelad|Marvel|Mate|Mate+SC|Maven+Pro|McLaren|Meddon|MedievalSharp|Medula+One|Megrim|Meie+Script|Merienda|Merienda+One|Merriweather|Merriweather+Sans|Metal+Mania|Metamorphous|Metrophobic|Michroma|Milonga|Miltonian|Miltonian+Tattoo|Miniver|Miss+Fajardose|Modern+Antiqua|Molengo|Molle:400italic|Monda|Monofett|Monoton|Monsieur+La+Doulaise|Montaga|Montez|Montserrat|Montserrat+Alternates|Montserrat+Subrayada|Mountains+of+Christmas|Mouse+Memoirs|Mr+Bedfort|Mr+Dafoe|Mr+De+Haviland|Mrs+Saint+Delafield|Mrs+Sheppards|Muli|Mystery+Quest|Neucha|Neuton|New+Rocker|News+Cycle|Niconne|Nixie+One|Nobile|Norican|Nosifer|Nothing+You+Could+Do|Noticia+Text|Noto+Sans|Noto+Serif|Nova+Cut|Nova+Flat|Nova+Mono|Nova+Oval|Nova+Round|Nova+Script|Nova+Slim|Nova+Square|Numans|Nunito|Offside|Old+Standard+TT|Oldenburg|Oleo+Script|Oleo+Script+Swash+Caps|Open+Sans|Open+Sans+Condensed:300|Oranienbaum|Orbitron|Oregano|Orienta|Original+Surfer|Oswald|Over+the+Rainbow|Overlock|Overlock+SC|Ovo|Oxygen|Oxygen+Mono|PT+Mono|PT+Sans|PT+Sans+Caption|PT+Sans+Narrow|PT+Serif|PT+Serif+Caption|Pacifico|Paprika|Parisienne|Passero+One|Passion+One|Patrick+Hand|Patrick+Hand+SC|Patua+One|Paytone+One|Peralta|Permanent+Marker|Petit+Formal+Script|Petrona|Philosopher|Piedra|Pinyon+Script|Pirata+One|Plaster|Play|Playball|Playfair+Display|Playfair+Display+SC|Podkova|Poiret+One|Poller+One|Poly|Pompiere|Pontano+Sans|Port+Lligat+Sans|Port+Lligat+Slab|Prata|Press+Start+2P|Princess+Sofia|Prociono|Prosto+One|Puritan|Purple+Purse|Quando|Quantico|Quattrocento|Quattrocento+Sans|Questrial|Quicksand|Quintessential|Qwigley|Racing+Sans+One|Radley|Raleway|Raleway+Dots|Rambla|Rammetto+One|Ranchers|Rancho|Rationale|Redressed|Reenie+Beanie|Revalia|Ribeye|Ribeye+Marrow|Righteous|Risque|Roboto|Roboto+Condensed|Rochester|Rock+Salt|Rokkitt|Romanesco|Ropa+Sans|Rosario|Rosarivo|Rouge+Script|Ruda|Rufina|Ruge+Boogie|Ruluko|Rum+Raisin|Ruslan+Display|Russo+One|Ruthie|Rye|Sacramento|Sail|Salsa|Sanchez|Sancreek|Sansita+One|Sarina|Satisfy|Scada|Schoolbell|Seaweed+Script|Sevillana|Seymour+One|Shadows+Into+Light|Shadows+Into+Light+Two|Shanti|Share|Share+Tech|Share+Tech+Mono|Shojumaru|Short+Stack|Sigmar+One|Signika|Signika+Negative|Simonetta|Sintony|Sirin+Stencil|Six+Caps|Skranji|Slackey|Smokum|Smythe|Sniglet:800|Snippet|Snowburst+One|Sofadi+One|Sofia|Sonsie+One|Sorts+Mill+Goudy|Source+Code+Pro|Source+Sans+Pro|Special+Elite|Spicy+Rice|Spinnaker|Spirax|Squada+One|Stalemate|Stalinist+One|Stardos+Stencil|Stint+Ultra+Condensed|Stint+Ultra+Expanded|Stoke|Strait|Sue+Ellen+Francisco|Sunshiney|Supermercado+One|Swanky+and+Moo+Moo|Syncopate|Tangerine|Tauri|Telex|Tenor+Sans|Text+Me+One|The+Girl+Next+Door|Tienne|Tinos|Titan+One|Titillium+Web|Trade+Winds|Trocchi|Trochut|Trykker|Tulpen+One|Ubuntu|Ubuntu+Condensed|Ubuntu+Mono|Ultra|Uncial+Antiqua|Underdog|Unica+One|UnifrakturCook:700|UnifrakturMaguntia|Unkempt|Unlock|Unna|VT323|Vampiro+One|Varela|Varela+Round|Vast+Shadow|Vibur|Vidaloka|Viga|Voces|Volkhov|Vollkorn|Voltaire|Waiting+for+the+Sunrise|Wallpoet|Walter+Turncoat|Warnes|Wellfleet|Wendy+One|Wire+One|Yanone+Kaffeesatz|Yellowtail|Yeseva+One|Yesteryear|Zeyada';
	
	if( !is_plugin_active( 'atomstore-extend/atomstore-extend.php' ) ){
		$alertextend = '<br><strong>Require ATOMSTORE Extension.</strong> <a href="http://atomlabs.me/atomstore-extension" target="_blank">Buy here</a>';
		$arrayextend = ' ( require Extension ) ';
	}
	
	$data = explode('|',$google_fonts_list);
	$google_fonts = array();
	foreach($data AS $row){ // Loop the exploded data
	$google_fonts[] = array(
			'label' => $row,
			'value' => $row
		);
	}
  /*
	* Background array
	*/
	$backgrounds = array( 
          array(
            'value'       => '0',
            'label'       => __( 'Pattern', 'atom' )
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Image', 'atom' )
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Color', 'atom' )
          ),
        );
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'content'       => array( 
        array(
          'id'        => 'option_types_help',
          'title'     => __( 'Option Types', 'theme-text-domain' ),
          'content'   => '<p>' . __( 'Help content goes here!', 'theme-text-domain' ) . '</p>'
        )
      ),
      'sidebar'       => '<p>' . __( 'Sidebar content goes here!', 'theme-text-domain' ) . '</p>'
    ),
	
	/*
	* ATOMCORE Tab Admin
	*/
    'sections'        => array( 
      array(
        'id'          => 'general_tab',
        'title'       => __( 'General', 'theme-text-domain' )
      ),
      array(
        'id'          => 'header_tab',
        'title'       => __( 'Header', 'theme-text-domain' )
      ),
      array(
        'id'          => 'footer_tab',
        'title'       => __( 'Footer', 'theme-text-domain' )
      ),
      array(
        'id'          => 'minibar_tab',
        'title'       => __( 'Mini Bar', 'theme-text-domain' )
      ),
      array(
        'id'          => 'background_tab',
        'title'       => __( 'Background', 'theme-text-domain' )
      ),
	  array(
        'id'          => 'sidebars_tab',
        'title'       => __( 'Sidebars', 'theme-text-domain' ),
      ),
      array(
        'id'          => 'woocommerce_tab',
        'title'       => __( 'Woocommerce', 'theme-text-domain' )
      ),
      array(
        'id'          => 'font_tab',
        'title'       => __( 'Font', 'theme-text-domain' )
      ),
      array(
        'id'          => 'color_tab',
        'title'       => __( 'Color', 'theme-text-domain' )
      ),
      array(
        'id'          => 'css_tab',
        'title'       => __( 'CSS & Scripts', 'theme-text-domain' )
      ),
      array(
        'id'          => 'blog_tab',
        'title'       => __( 'Blog', 'theme-text-domain' )
      ),/*
      array(
        'id'          => 'portfolio_tab',
        'title'       => __( 'Portfolio', 'theme-text-domain' )
      ),*/
      array(
        'id'          => 'social_tab',
        'title'       => __( 'Socials', 'theme-text-domain' )
      ),
    ),
	
	
    'settings'        => array( 
	
   array(
     'label'       => 'Sidebars',
     'id'          => 'atom_sidebars',
     'type'        => 'list-item',
     'desc'        => 'Add Unlimited Sidebars to your website.',
     'settings'    => array(
       array(
         'label'       => 'Slug',
         'id'          => 'slug',
         'type'        => 'text',
         'desc'        => 'Sidebar Slug "All lowercase and must be unique".',
         'std'         => '',
         'rows'        => '',
         'post_type'   => '',
         'taxonomy'    => '',
         'class'       => ''
       ),
       array(
         'label'       => 'Description',
         'id'          => 'description',
         'type'        => 'textarea-simple',
         'desc'        => 'Sidebar Description.',
         'std'         => '',
         'rows'        => '5',
         'post_type'   => '',
         'taxonomy'    => '',
         'class'       => ''
       )
     ),
     'std'         => '',
     'rows'        => '',
     'post_type'   => '',
     'taxonomy'    => '',
     'class'       => '',
     'section'     => 'sidebars_tab'
   ),
   
   
   	/*
   * Script & CSS Tab
   */
	  array(
			'label'       => __( 'Enable Custom CSS', 'theme-text-domain' ),
			'desc'        => __( 'Check here enable custom css for theme', 'theme-text-domain' ),
			'id'          => 'custom-enable-css',			
			'type'        => 'on-off',
			'section'     => 'css_tab',
			'std'    	  => 'off',	
	  ),
	  array(
			'label'       => __( 'Custom CSS', 'theme-text-domain' ),
			'id'          => 'custom-css-content',			
			'type'        => 'textarea-simple',
			'section'     => 'css_tab',
			'std'    	  => '/*input your custom css code */',	
			'condition'   => 'custom-enable-css:is(on)',
	  ),
	  array(
			'label'       => __( 'Custom Retina CSS', 'theme-text-domain' ),
			'id'          => 'custom-css-retina-content',			
			'type'        => 'textarea-simple',
			'section'     => 'css_tab',
			'std'    	  => '/*input your custom retina css code */',
			'condition'   => 'custom-enable-css:is(on)',	
	  ),
	  array(
			'label'       => __( 'Enable Custom Scripts', 'theme-text-domain' ),
			'desc'        => __( 'Check here enable custom scripts for theme', 'theme-text-domain' ),
			'id'          => 'custom-enable-scripts',			
			'type'        => 'on-off',
			'section'     => 'css_tab',
			'std'    	  => 'off',	
	  ),
	  array(
			'label'       => __( 'Custom Scripts', 'theme-text-domain' ),
			'id'          => 'custom-scripts-content',			
			'type'        => 'textarea-simple',
			'section'     => 'css_tab',
			'std'    	  => '//input your custom javascript code',	
			'condition'   => 'custom-enable-scripts:is(on)',	
	  ),		
      array(
        'label'       => __( 'Analytics Script Position', 'theme-text-domain' ),
        'id'          => 'google_analytics-position',
        'type'        => 'radio',
		'section'     => 'css_tab',
		'std'    	  => '1',       
        'choices'     => array( 
				  array(
					'value'       => '0',
					'label'       => __( 'Header', 'atom' )
				  ),
				  array(
					'value'       => '1',
					'label'       => __( 'Footer', 'atom' )
				  ),
			),
      ),	
	  array(
			'label'       => __( 'Analytics script', 'theme-text-domain' ),
			'desc'        => __( 'Paste your Google Analytics or other tracking code here.', 'theme-text-domain' ),
			'id'          => 'google_analytics-content',			
			'type'        => 'textarea-simple',
			'section'     => 'css_tab',
			'std'    	  => '',	
	  ),
	  
   /*
   * Header Tab
   */
	  	 
	  array(
		'label'       => __( 'Enable Top Banner', 'theme-text-domain' ),
		'desc'        => __( 'Check to enable top banner', 'theme-text-domain' ),
		'id'          => 'header-banner-enable',			
		'type'        => 'on-off',
		'section'     => 'header_tab',
		'std'    	  => 'on',	
	  ),	  
      array(
        'id'          => 'header-banner-titled',
        'label'       => __( 'Header Banner Setting', 'theme-text-domain' ),
        'type'        => 'textblock-titled',
        'section'     => 'header_tab',
        'condition'   => 'header-banner-enable:is(on)',
      ),	
	  array(
		'label'       => __( 'ID', 'theme-text-domain' ),
		'desc'        => __( 'Use it different before banner id', 'theme-text-domain' ),
		'id'          => 'header-banner-id',			
		'type'        => 'text',
		'section'     => 'header_tab',
		'std'    	  => '',
		'condition'   => 'header-banner-enable:is(on)',
	  ),	
	  array(
		'label'       => __( 'Content', 'theme-text-domain' ),
		'desc'        => __( 'Support HTML format', 'theme-text-domain' ),
		'id'          => 'header-banner-content',			
		'type'        => 'textarea',
		'section'     => 'header_tab',
		'std'    	  => '<h2 style="font-weight:bold;margin:0;color:#111;">You Think <span style="color:azure">ATOMSTORE</span> is  COOL?</h2><a href="http://atomlabs.me/atomstore" target="_blank"><strong>BUY IT NOW here on DimeSale!</strong></a>',	
		'condition'   => 'header-banner-enable:is(on)',
	  ),
	  array(
		'label'       => __( 'Enable Topbar', 'theme-text-domain' ),
		'desc'        => __( 'Check to enable show topbar elements', 'theme-text-domain' ),
		'id'          => 'header-topbar-enable',			
		'type'        => 'on-off',
		'section'     => 'header_tab',
		'std'    	  => 'off',	
	  ),
	  array(
		'desc'        => 'Topbar custom content. on left side',			
		'id'          => 'topbar-content',			
		'type'        => 'textarea-simple',
		'section'     => 'header_tab',
		'std'    	  => 'The Powerful WordPress Theme of 2014!',	
		'condition'   => 'header-topbar-enable:is(on)',	
	  ),
      array(
        'label'       => __( 'Header Style', 'theme-text-domain' ),
        'id'          => 'header-style',
        'type'        => 'select',
		'section'     => 'header_tab',
		'std'    	  => '1',       
        'choices'     => array( 
				  array(
					'value'       => '0',
					'label'       => __( ' Header Style #1 (Menu Bottom)', 'atom' )
				  ),
				  array(
					'value'       => '1',
					'label'       => __( ' Header Style #2 (Menu Right)', 'atom' )
				  ),
				  array(
					'value'       => $arrayextend.'2',
					'label'       => $arrayextend. __( ' Header Style #3 (Menu Center)', 'atom' )
				  ),
				  array(
					'value'       => $arrayextend.'3',
					'label'       => $arrayextend.__( ' Header Style #4 (Menu Right)', 'atom' )
				  ),
				  array(
					'value'       => $arrayextend.'4',
					'label'       => $arrayextend.__( ' Header Style #5 (Menu Bottom)', 'atom' )
				  ),
			),
      ),
	  array(
		'label'       => __( 'Enable Search Form', 'theme-text-domain' ),
		'desc'        => __( 'Check to enable show search form', 'theme-text-domain' ),
		'id'          => 'header-search-enable',			
		'type'        => 'on-off',
		'section'     => 'header_tab',
		'std'    	  => 'on',	
	  ),
	  array(
		'label'       => __( 'Enable Login on Menu Area', 'theme-text-domain' ),
		'id'          => 'global-login-enable',			
		'type'        => 'on-off',
		'section'     => 'header_tab',
		'std'    	  => 'off',	
	  ),
	  array(
		'label'       => __( 'Enable Social Button', 'theme-text-domain' ),
		'desc'        => __( 'Check to enable show social accounts', 'theme-text-domain' ),
		'id'          => 'header-social-enable',			
		'type'        => 'on-off',
		'section'     => 'header_tab',
		'std'    	  => 'off',	
	  ),
	  array(
		'label'       => __( 'Enable Fixed Menu', 'theme-text-domain' ),
		'desc'        => __( 'Check to enable fixed menu when scroll page', 'theme-text-domain' ),
		'id'          => 'header-fixed-menu-enable',			
		'type'        => 'on-off',
		'section'     => 'header_tab',
		'std'    	  => 'on',	
	  ),
	  array(
		'label'       => __( 'Header Area Custom Content Setting', 'theme-text-domain' ),
		'desc'        => __( 'Check to enable custom content', 'theme-text-domain' ),
		'id'          => 'header-custom-enable',			
		'type'        => 'on-off',
		'section'     => 'header_tab',
		'std'    	  => 'off',	
	  ),
	  array(
		'label'       => __( 'Custom Content', 'theme-text-domain' ),
		'desc'        => __( 'Support html code for topbar custom content.', 'theme-text-domain' ),
		'id'          => 'header-custom-content',			
		'type'        => 'textarea',
		'section'     => 'header_tab',
		'condition'	  => 'header-custom-enable:is(on)',	
	  ),
	  array(
		'label'       => __( 'Header Area Element Setting', 'theme-text-domain' ),
		'id'          => 'header-area-element-setting',			
		'type'        => 'textblock-titled',
		'section'     => 'header_tab',	
	  ),
	  array(
		'label'       => __( 'Login Page Link', 'theme-text-domain' ),
		'desc'        => __( 'You need first create page use login template as login page.', 'theme-text-domain' ),
		'id'          => 'global-login-page',			
		'type'        => 'text',
		'section'     => 'header_tab',
	  ),
	  array(
		'label'       => __( 'Logo Padding Top', 'theme-text-domain' ),
		'id'          => 'logo-image-padding-top',			
		'type'        => 'numeric-slider',
		'min_max_step'=> '-100,100,10',
		'section'     => 'header_tab',
		'std'    	  => '0',
	  ),
	  array(
		'label'       => __( 'Social Padding Top', 'theme-text-domain' ),
		'id'          => 'header-social-padding-top',			
		'type'        => 'numeric-slider',
		'min_max_step'=> '-100,100,5',
		'section'     => 'header_tab',
		'std'    	  => '15',
	  ),
	  array(
		'label'       => __( 'Custom Content Padding Top', 'theme-text-domain' ),
		'id'          => 'header-custom-content-padding-top',			
		'type'        => 'numeric-slider',
		'min_max_step'=> '-100,100,5',
		'section'     => 'header_tab',
		'std'    	  => '10',
	  ),
	  array(
		'label'       => __( 'Right Cart Content Padding Top', 'theme-text-domain' ),
		'id'          => 'header-custom-cart-padding-top',			
		'type'        => 'numeric-slider',
		'min_max_step'=> '-100,100,5',
		'section'     => 'header_tab',
		'std'    	  => '15',
	  ),
	  array(
		'label'       => __( 'Enable Custom Logo', 'theme-text-domain' ),
		'id'          => 'logo-enable',			
		'type'        => 'on-off',
		'section'     => 'header_tab',
		'std'    	  => 'on',
	  ),
	  array(
		'label'       => __( 'Logo Image URL', 'theme-text-domain' ),
		'id'          => 'logo-image',			
		'type'        => 'upload',
		'section'     => 'header_tab',
		'std'    	  => 'http://i1.wp.com/atomlabs.me/jv/desain/limuso/images/labs2.png',
		'condition'   => 'logo-enable:is(on)',
	  ),
	  array(
		'label'       => __( 'Logo Retina Image @2x', 'theme-text-domain' ),
		'id'          => 'logo-retina-image',			
		'type'        => 'upload',
		'section'     => 'header_tab',
		'std'    	  => 'http://i1.wp.com/atomlabs.me/jv/desain/limuso/images/labs2.png',
		'condition'   => 'logo-enable:is(on)',
	  ),
	  array(
		'label'       => __( 'Logo Image Width', 'theme-text-domain' ),
		'id'          => 'logo-image-width',			
		'type'        => 'text',
		'section'     => 'header_tab',
		'std'    	  => '193',
		'condition'   => 'logo-enable:is(on)',
	  ),
	  array(
		'label'       => __( 'Logo Image Height', 'theme-text-domain' ),
		'id'          => 'logo-image-height',			
		'type'        => 'text',
		'section'     => 'header_tab',
		'std'    	  => '55',
		'condition'   => 'logo-enable:is(on)',
	  ),
	  
   /*
   * Footer Tab
   */
	  array(
		'label'       => __( 'Footer Widget Basic Columns', 'theme-text-domain' ),
		'desc'        => __( 'It\'s also depends your footer widgets had added content.', 'theme-text-domain' ),
		'id'          => 'footer-widget-style',			
		'type'        => 'radio-image',
		'section'     => 'footer_tab',
		'std'    	  => '2',     
		'choices'     => array( 
				  array(
					'src'       => THEME_IMG_URL.'atomcore/footer_widget_1.png',
					'value'       => '0',
				  ),
				  array(
					'src'       => THEME_IMG_URL.'atomcore/footer_widget_2.png',
					'value'       => '1',
				  ),
				  array(
					'src'       => THEME_IMG_URL.'atomcore/footer_widget_3.png',
					'value'       => '2',
				  ),
				  array(
					'src'       => THEME_IMG_URL.'atomcore/footer_widget_4.png',
					'value'       => '3',
				  ),
				  array(
					'src'       => THEME_IMG_URL.'atomcore/footer_widget_5.png',
					'value'       => '4',
				  ),
				  array(
					'src'       => THEME_IMG_URL.'atomcore/footer_widget_6.png',
					'value'       => '5',
				  ),
				  array(
					'src'       => THEME_IMG_URL.'atomcore/footer_widget_7.png',
					'value'       => '6',
				  ),
				  array(
					'src'       => THEME_IMG_URL.'atomcore/footer_widget_8.png',
					'value'       => '7',
				  ),
				  array(
					'src'       => THEME_IMG_URL.'atomcore/footer_widget_9.png',
					'value'       => '8',
				  ),
				  array(
					'src'       => THEME_IMG_URL.'atomcore/footer_widget_10.png',
					'value'       => '9',
				  ),
				  array(
					'src'       => THEME_IMG_URL.'atomcore/footer_widget_11.png',
					'value'       => '10',
				  ),
			),	
	  ),
	  array(
		'label'       => __( 'Footer Bottom Content Style', 'theme-text-domain' ),
		'id'          => 'footer-bottom-style',			
		'type'        => 'radio-image',
		'section'     => 'footer_tab',
		'std'    	  => '1',     
		'choices'     => array( 
				  array(
					'src'       => THEME_IMG_URL.'atomcore/footer_style_1.png',
					'value'       => '0',
				  ),
				  array(
					'src'       => THEME_IMG_URL.'atomcore/footer_style_2.png',
					'value'       => '1',
				  ),
			),	
	  ),
	  array(
			'label'       => __( 'Footer Menu', 'theme-text-domain' ),
			'desc'        => __( 'Check to enable show footer menu', 'theme-text-domain' ),
			'id'          => 'footer-menu-enable',			
			'type'        => 'on-off',
			'section'     => 'footer_tab',
			'std'    	  => 'on',	
	  ),
	  array(
			'label'       => __( 'Custom Left Area Content', 'theme-text-domain' ),
			'desc'        => __( 'Support html code for footer bottom custom content left area.', 'theme-text-domain' ),
			'id'          => 'footer-custom-content-left',			
			'type'        => 'textarea-simple',
			'section'     => 'footer_tab',
			'std'    	  => 'Copyright ® 2014 <a href="http://atomlabs.me">ATOMLABS</a>. All rights reserved.',	
	  ),
	  array(
			'label'       => __( 'Custom Right Area Content', 'theme-text-domain' ),
			'desc'        => __( 'Support html code for footer bottom custom content left area.', 'theme-text-domain' ),
			'id'          => 'footer-custom-content-right',			
			'type'        => 'textarea-simple',
			'section'     => 'footer_tab',
			'std'    	  => '',	
	  ),

	  
   /*
   * Mini Bar Tab
   */
	  array(
			'label'       => $arrayextend.__( 'Enable Mini Bar', 'theme-text-domain' ),
			'id'          => 'minibar-enable',			
			'type'        => 'on-off',
			'section'     => 'minibar_tab',
			'std'    	  => $arrayextend.'off',	
	  ),
	  array(
			'label'       => __( 'Enable Mini Bar Open', 'theme-text-domain' ),
			'desc'        => __( 'Enable will default show mini bar or will need click open.', 'theme-text-domain' ),
			'id'          => 'minibar-open',			
			'type'        => 'on-off',
			'section'     => 'minibar_tab',
			'std'    	  => 'on',	
			'condition'   => 'minibar-enable:is(on)',	
	  ),
	  array(
			'label'       => __( 'Mini Bar Element Code', 'theme-text-domain' ),
			'desc'        => __( 'Don\'t change this value', 'theme-text-domain' ),
			'id'          => 'minibar-custom-style',			
			'class'          => 'disabled',			
			'type'        => 'text',
			'section'     => 'minibar_tab',
			'std'    	  => '3-0|1-0|2-0|0-2|4-2',	
			'condition'   => 'minibar-enable:is(on)',	
	  ),
	  array(
			'label'       => __( 'Mini Bar Custom Element Icon', 'theme-text-domain' ),
			'desc'        => __( 'Used FontAwesome icon name.', 'theme-text-domain' ),
			'id'          => 'minibar-icon',			
			'type'        => 'text',
			'section'     => 'minibar_tab',
			'std'    	  => 'fa-bell',	
			'condition'   => 'minibar-enable:is(on)',	
	  ),
	  array(
			'label'       => __( 'Mini Bar Custom Content', 'theme-text-domain' ),
			'desc'        => __( 'Support html code for Mini Bar custom content.', 'theme-text-domain' ),
			'id'          => 'minibar-content',			
			'type'        => 'textarea',
			'section'     => 'minibar_tab',
			'std'    	  => '',	
			'condition'   => 'minibar-enable:is(on)',	
	  ),
   /*
   * Background Tab
   */
	  array(
			'label'       => __( 'Enable Custom Background', 'theme-text-domain' ),
			'id'          => 'custom-background-enable',			
			'type'        => 'on-off',
			'section'     => 'background_tab',
			'std'    	  => 'off',	
	  ), 
	  array(
        'label'       => __( 'Body Background Type', 'theme-text-domain' ),
        'id'          => 'global-bg-type',
        'type'        => 'radio',
		'section'     => 'background_tab',
		'std'    	  => '0',       
        'choices'     => $backgrounds,
		'condition'   => 'custom-background-enable:is(on)',	
      ),	  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'global-bg-pattern-width',
			'type'        => 'text',
			'section'     => 'background_tab',
			'std'    	  => '105',
			'condition'     => 'global-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'global-bg-pattern-height',
			'type'        => 'text',
			'section'     => 'background_tab',
			'std'    	  => '105',
			'condition'     => 'global-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'global-bg-pattern-image',
			'type'        => 'upload',
			'section'     => 'background_tab',
			'std'    	  => THEME_IMG_URL.'project_papper.png',
			'condition'     => 'global-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'global-bg-pattern-retina',
			'type'        => 'upload',
			'section'     => 'background_tab',
			'std'    	  => THEME_IMG_URL.'project_papper@2x.png',
			'condition'     => 'global-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'global-bg-image',
			'type'        => 'upload',
			'section'     => 'background_tab',
			'std'    	  => '',
			'condition'     => 'global-bg-type:is(1),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'global-bg-color',
			'type'        => 'colorpicker',
			'section'     => 'background_tab',
			'std'    	  => '#ffffff',
			'condition'     => 'global-bg-type:is(2),custom-background-enable:is(on)',	
		  ),
	  array(
        'label'       => __( 'Header Background Type', 'theme-text-domain' ),
        'id'          => 'global-header-bg-type',
        'type'        => 'radio',
		'section'     => 'background_tab',
		'std'    	  => '0',       
        'choices'     => $backgrounds,
		'condition'   => 'custom-background-enable:is(on),custom-background-enable:is(on)',	
      ),	  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'global-header-bg-pattern-width',
			'type'        => 'text',
			'section'     => 'background_tab',
			'std'    	  => '100',
			'condition'     => 'global-header-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'global-header-bg-pattern-height',
			'type'        => 'text',
			'section'     => 'background_tab',
			'std'    	  => '100',
			'condition'     => 'global-header-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'global-header-bg-pattern-image',
			'type'        => 'upload',
			'section'     => 'background_tab',
			'std'    	  => '',
			'condition'     => 'global-header-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'global-header-bg-pattern-retina',
			'type'        => 'upload',
			'section'     => 'background_tab',
			'std'    	  => '',
			'condition'     => 'global-header-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'global-header-bg-image',
			'type'        => 'upload',
			'section'     => 'background_tab',
			'std'    	  => '',
			'condition'     => 'global-header-bg-type:is(1),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'global-header-bg-color',
			'type'        => 'colorpicker',
			'section'     => 'background_tab',
			'std'    	  => '#ffffff',
			'condition'     => 'global-header-bg-type:is(2),custom-background-enable:is(on)',	
		  ),
	  array(
        'label'       => __( 'Title Background Type', 'theme-text-domain' ),
        'id'          => 'global-title-bg-type',
        'type'        => 'radio',
		'section'     => 'background_tab',
		'std'    	  => '0',       
        'choices'     => $backgrounds,
		'condition'   => 'custom-background-enable:is(on),custom-background-enable:is(on)',	
      ),	  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'global-title-bg-pattern-width',
			'type'        => 'text',
			'section'     => 'background_tab',
			'std'    	  => '200',
			'condition'     => 'global-title-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'global-title-bg-pattern-height',
			'type'        => 'text',
			'section'     => 'background_tab',
			'std'    	  => '200',
			'condition'     => 'global-title-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'global-title-bg-pattern-image',
			'type'        => 'upload',
			'section'     => 'background_tab',
			'std'    	  => '',
			'condition'     => 'global-title-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'global-title-bg-pattern-retina',
			'type'        => 'upload',
			'section'     => 'background_tab',
			'std'    	  => '',
			'condition'     => 'global-title-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'global-title-bg-image',
			'type'        => 'upload',
			'section'     => 'background_tab',
			'std'    	  => '',
			'condition'     => 'global-title-bg-type:is(1),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'global-title-bg-color',
			'type'        => 'colorpicker',
			'section'     => 'background_tab',
			'std'    	  => '#ffffff',
			'condition'     => 'global-title-bg-type:is(2),custom-background-enable:is(on)',	
		  ),
	  array(
        'label'       => __( 'Content Background Type', 'theme-text-domain' ),
        'id'          => 'global-content-bg-type',
        'type'        => 'radio',
		'section'     => 'background_tab',
		'std'    	  => '0',       
        'choices'     => $backgrounds,
		'condition'   => 'custom-background-enable:is(on),custom-background-enable:is(on)',	
      ),	  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'global-content-bg-pattern-width',
			'type'        => 'text',
			'section'     => 'background_tab',
			'std'    	  => '100',
			'condition'     => 'global-content-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'global-content-bg-pattern-height',
			'type'        => 'text',
			'section'     => 'background_tab',
			'std'    	  => '100',
			'condition'     => 'global-content-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'global-content-bg-pattern-image',
			'type'        => 'upload',
			'section'     => 'background_tab',
			'std'    	  => '',
			'condition'     => 'global-content-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'global-content-bg-pattern-retina',
			'type'        => 'upload',
			'section'     => 'background_tab',
			'std'    	  => '',
			'condition'     => 'global-content-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'global-content-bg-image',
			'type'        => 'upload',
			'section'     => 'background_tab',
			'std'    	  => '',
			'condition'     => 'global-content-bg-type:is(1),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'global-content-bg-color',
			'type'        => 'colorpicker',
			'section'     => 'background_tab',
			'std'    	  => '#ffffff',
			'condition'     => 'global-content-bg-type:is(2),custom-background-enable:is(on)',	
		  ),	
      array(
        'label'       => __( 'Footer Background Type', 'theme-text-domain' ),
        'id'          => 'global-footer-bg-type',
        'type'        => 'radio',
		'section'     => 'background_tab',
		'std'    	  => '2',       
        'choices'     => $backgrounds,	
		'condition'   => 'custom-background-enable:is(on),custom-background-enable:is(on)',	
      ),	  	  
		  array(
			'label'       => __( 'Pattern Image Width', 'theme-text-domain' ),
			'id'          => 'global-footer-bg-pattern-width',
			'type'        => 'text',
			'section'     => 'background_tab',
			'std'    	  => '',
			'condition'     => 'global-footer-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image Height', 'theme-text-domain' ),
			'id'          => 'global-footer-bg-pattern-height',
			'type'        => 'text',
			'section'     => 'background_tab',
			'std'    	  => '',
			'condition'     => 'global-footer-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Image', 'theme-text-domain' ),
			'id'          => 'global-footer-bg-pattern-image',
			'type'        => 'upload',
			'section'     => 'background_tab',
			'std'    	  => '',
			'condition'     => 'global-footer-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Pattern Retina Image @2x', 'theme-text-domain' ),
			'id'          => 'global-footer-bg-pattern-retina',
			'type'        => 'upload',
			'section'     => 'background_tab',
			'std'    	  => '',
			'condition'     => 'global-footer-bg-type:is(0),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Image', 'theme-text-domain' ),
			'id'          => 'global-footer-bg-image',
			'type'        => 'upload',
			'section'     => 'background_tab',
			'std'    	  => '',
			'condition'   => 'global-footer-bg-type:is(1),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Background Color', 'theme-text-domain' ),
			'id'          => 'global-footer-bg-color',
			'type'        => 'colorpicker',
			'section'     => 'background_tab',
			'std'    	  => '#ffffff',
			'condition'   => 'global-footer-bg-type:is(2),custom-background-enable:is(on)',	
		  ),	  	  
		  array(
			'label'       => __( 'Border Top Color', 'theme-text-domain' ),
			'id'          => 'global-footer-border-top-color',
			'type'        => 'colorpicker',
			'section'     => 'background_tab',
			'std'    	  => '#e3e3e3',
			'condition'   => 'custom-background-enable:is(on),custom-background-enable:is(on)',		
		  ),	  	  
		  array(
			'label'       => __( 'Border Bottom Color', 'theme-text-domain' ),
			'id'          => 'global-footer-border-bottom-color',
			'type'        => 'colorpicker',
			'section'     => 'background_tab',
			'std'    	  => '#e3e3e3',
			'condition'   => 'custom-background-enable:is(on),custom-background-enable:is(on)',		
		  ),	  	  
		  array(
			'label'       => __( 'Copyright Background Color', 'theme-text-domain' ),
			'id'          => 'global-footer-copyright-bg-color',
			'type'        => 'colorpicker',
			'section'     => 'background_tab',
			'std'    	  => '#f7f7f7',
			'condition'   => 'custom-background-enable:is(on),custom-background-enable:is(on)',		
		  ),	  	  
		  array(
			'label'       => __( 'Copyright Border Top Color', 'theme-text-domain' ),
			'id'          => 'global-footer-copyright-border-top-color',
			'type'        => 'colorpicker',
			'section'     => 'background_tab',
			'std'    	  => '#ffffff',
			'condition'   => 'custom-background-enable:is(on),custom-background-enable:is(on)',		
		  ),
   /*
   * Woocommerce Tab
   */
	  array(
			'label'       => __( 'Shop Page Items Number', 'theme-text-domain' ),
			'id'          => 'woocommerce-page-num',			
			'type'        => 'numeric-slider',
			'section'     => 'woocommerce_tab',
			'std'    	  => '20',	
			'min_max_step'=> '1,50,1',	
	  ),
	  array(
			'label'       => __( 'Enabled Header Product Search', 'theme-text-domain' ),
			'desc'        => __( 'Turn on enabled product search form.', 'theme-text-domain' ),
			'id'          => 'woocommerce-search-enable',			
			'type'        => 'on-off',
			'section'     => 'woocommerce_tab',
			'std'    	  => 'on',	
	  ),
	  array(
			'label'       => __( 'Enable Cart on Menu Area', 'theme-text-domain' ),
			'id'          => 'woocommerce-cart-enable',			
			'type'        => 'on-off',
			'section'     => 'woocommerce_tab',
			'std'    	  => 'on',	
	  ),
	  array(
			'label'       => __( 'Enable Wishlist on Menu Area', 'theme-text-domain' ),
			'desc'        => __( 'Before you need install "YITH WooCommerce Wishlist" plugin.', 'theme-text-domain' ),
			'id'          => 'woocommerce-wish-enable',			
			'type'        => 'on-off',
			'section'     => 'woocommerce_tab',
			'std'    	  => 'on',	
	  ),
	  array(
			'label'       => __( 'Share Show', 'theme-text-domain' ),
			'desc'        => __( 'Turn on enable post page show share.', 'theme-text-domain' ),
			'id'          => 'woocommerce-share-enable',			
			'type'        => 'on-off',
			'section'     => 'woocommerce_tab',
			'std'    	  => 'on',	
	  ),
	  array(
			'label'       => __( 'Share Type', 'theme-text-domain' ),
			'id'          => 'woocommerce-share-type',			
			'type'        => 'radio',
			'section'     => 'woocommerce_tab',
			'std'    	  => '0',     
			'condition'   => 'woocommerce-share-enable:is(on)',     
			'choices'     => array( 
					  array(
						'value'       => '0',
						'label'       => __( 'Default', 'atom' )
					  ),
					  array(
						'value'       => '1',
						'label'       => __( 'Custom Share', 'atom' )
					  ),
				),	
	  ),
	  array(
			'label'       => __( 'Custom Share Content', 'theme-text-domain' ),
			'id'          => 'woocommerce-share-content',			
			'type'        => 'textarea-simple',
			'section'     => 'woocommerce_tab',
			'std'    	  => '',	
			'condition'   => 'woocommerce-share-type:is(1)',	
	  ),
   /*
   * Font Tab
   */
	  array(
			'label'       => __( 'Enable Custom Font', 'theme-text-domain' ),
			'desc'        => __( 'Just when enable custom font,then all choose font will run.', 'theme-text-domain' ),
			'id'          => 'custom-enable-font',			
			'type'        => 'on-off',
			'section'     => 'font_tab',
			'std'    	  => 'off',	
	  ),
	  array(
			'label'       => __( 'General Font', 'theme-text-domain' ),
			'desc'        => __( 'Now have 620+ Google web fonts for u choose!', 'theme-text-domain' ),
			'id'          => 'custom-general-font',			
			'type'        => 'select',
			'section'     => 'font_tab',
			'choices'     => $google_fonts,	
			'condition'   => 'custom-enable-font:is(on)',	
	  ),
	  array(
			'label'       => __( 'General Font Weight', 'theme-text-domain' ),
			'desc'        => __( 'You can check font support style http://google.com/fonts/', 'theme-text-domain' ),
			'id'          => 'custom-general-font-weight',			
			'type'        => 'text',
			'section'     => 'font_tab',
			'std'    	  => '400,300,700,300italic,400italic,700italic',
			'condition'   => 'custom-enable-font:is(on)',	
	  ),
	  array(
			'label'       => __( 'General Font Size', 'theme-text-domain' ),
			'desc'        => __( 'in pixels', 'theme-text-domain' ),
			'id'          => 'custom-general-font-size',			
			'type'        => 'numeric-slider',
			'section'     => 'font_tab',
			'std'    	  => '14',
			'min_max_step'=> '8,90,1',
			'condition'   => 'custom-enable-font:is(on)',	
	  ),	
	  array(
			'label'       => __( 'Header Menu Font', 'theme-text-domain' ),
			'desc'        => __( 'Now have 620+ Google web fonts for u choose!', 'theme-text-domain' ),
			'id'          => 'custom-menu-font',			
			'type'        => 'select',
			'section'     => 'font_tab',
			'choices'     => $google_fonts,	
			'condition'   => 'custom-enable-font:is(on)',	
	  ),
	  array(
			'label'       => __( 'Header Menu Font Weight', 'theme-text-domain' ),
			'desc'        => __( 'You can check font support style http://google.com/fonts/', 'theme-text-domain' ),
			'id'          => 'custom-menu-font-weight',			
			'type'        => 'text',
			'section'     => 'font_tab',
			'std'    	  => '400,300,700,300italic,400italic,700italic',
			'condition'   => 'custom-enable-font:is(on)',	
	  ),
	  array(
			'label'       => __( 'Header Menu Font Size', 'theme-text-domain' ),
			'desc'        => __( 'in pixels', 'theme-text-domain' ),
			'id'          => 'custom-menu-font-size',			
			'type'        => 'numeric-slider',
			'section'     => 'font_tab',
			'std'    	  => '13',
			'min_max_step'=> '8,90,1',
			'condition'   => 'custom-enable-font:is(on)',	
	  ),	
	  array(
			'label'       => __( 'Header Sub Menu Font Size', 'theme-text-domain' ),
			'desc'        => __( 'in pixels', 'theme-text-domain' ),
			'id'          => 'custom-menu-sub-font-size',			
			'type'        => 'numeric-slider',
			'section'     => 'font_tab',
			'std'    	  => '13',
			'min_max_step'=> '8,90,1',
			'condition'   => 'custom-enable-font:is(on)',	
	  ),		
	  array(
			'label'       => __( 'Header Menu Sub Title Font Size', 'theme-text-domain' ),
			'desc'        => __( 'in pixels', 'theme-text-domain' ),
			'id'          => 'custom-menu-sub-title-font-size',			
			'type'        => 'numeric-slider',
			'section'     => 'font_tab',
			'std'    	  => '13',
			'min_max_step'=> '8,90,1',
			'condition'   => 'custom-enable-font:is(on)',	
	  ),	
	  array(
			'label'       => __( 'H1-H6 Font', 'theme-text-domain' ),
			'desc'        => __( 'Now have 620+ Google web fonts for u choose!', 'theme-text-domain' ),
			'id'          => 'custom-title-font',			
			'type'        => 'select',
			'section'     => 'font_tab',
			'choices'     => $google_fonts,	
			'condition'   => 'custom-enable-font:is(on)',	
	  ),	
	  array(
			'label'       => __( 'H1-H6 Font Weight', 'theme-text-domain' ),
			'desc'        => __( 'You can check font support style http://google.com/fonts/', 'theme-text-domain' ),
			'id'          => 'custom-title-font-weight',			
			'type'        => 'text',
			'section'     => 'font_tab',
			'std'    	  => '400,300,700,300italic,400italic,700italic',
			'condition'   => 'custom-enable-font:is(on)',	
	  ),
	  array(
			'label'       => __( 'Google Fonts Subsets', 'theme-text-domain' ),
			'desc'        => __( 'Some of the fonts in the Google Font Directory support multiple scripts (like Latin and Cyrillic for example). Example: "latin,cyrillic" please use "," for more subsets', 'theme-text-domain' ),
			'id'          => 'google-font-subset',			
			'type'        => 'text',
			'section'     => 'font_tab',
			'choices'     => $google_fonts,	
			'condition'   => 'custom-enable-font:is(on)',	
	  ),	
   /*
   * Color Tab
   */
	  array(
			'label'       => __( 'Enable Custom Color', 'theme-text-domain' ),
			'desc'        => __( 'Just when enable custom color,then all choose color will run.', 'theme-text-domain' ),
			'id'          => 'custom-enable-color',			
			'type'        => 'on-off',
			'section'     => 'color_tab',
			'std'    	  => 'off',	
	  ),	
	  array(
			'label'       => __( 'Theme Color', 'theme-text-domain' ),
			'id'          => 'theme-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#cc3333',	
			'condition'   => 'custom-enable-color:is(on)',	
	  ),	
	  array(
			'label'       => __( 'General Text Color', 'theme-text-domain' ),
			'desc'        => __( 'General default text color for div,p,span,a color', 'theme-text-domain' ),
			'id'          => 'custom-general-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#666666',	
			'condition'   => 'custom-enable-color:is(on)',	
	  ),		
	  array(
			'label'       => __( 'Link Default Color', 'theme-text-domain' ),
			'id'          => 'custom-a-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#666666',	
			'condition'   => 'custom-enable-color:is(on)',	
	  ),			
	  array(
			'label'       => __( 'Hover Link Default Color', 'theme-text-domain' ),
			'id'          => 'custom-a-hover-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#cc3333',	
			'condition'   => 'custom-enable-color:is(on)',	
	  ),				
	  array(
			'label'       => __( 'Title default color', 'theme-text-domain' ),
			'desc'        => __( 'h1,h2,h3,h4,h5,h6 default color', 'theme-text-domain' ),
			'id'          => 'custom-h-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#666666',	
			'condition'   => 'custom-enable-color:is(on)',	
	  ),				
	  array(
			'label'       => __( 'Theme Button Hover Color', 'theme-text-domain' ),
			'id'          => 'custom-theme-btn-hover-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#242424',	
			'condition'   => 'custom-enable-color:is(on)',	
	  ),				
	  array(
			'label'       => __( 'Page Title Color', 'theme-text-domain' ),
			'id'          => 'custom-page-title-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#444444',	
			'condition'   => 'custom-enable-color:is(on)',	
	  ),				
	  array(
			'label'       => __( 'Footer Widget Link default Color', 'theme-text-domain' ),
			'id'          => 'custom-footer-widget-a-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#555555',	
			'condition'   => 'custom-enable-color:is(on)',	
	  ),				
	  array(
			'label'       => __( 'Footer Widget Link Hover default Color', 'theme-text-domain' ),
			'id'          => 'custom-footer-widget-a-hover-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#cc3333',	
			'condition'   => 'custom-enable-color:is(on)',	
	  ),					
	  array(
			'label'       => __( 'Footer Copyright Link default Color', 'theme-text-domain' ),
			'id'          => 'custom-footer-a-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#555555',	
			'condition'   => 'custom-enable-color:is(on)',	
	  ),				
	  array(
			'label'       => __( 'Footer Copyright Link hover default Color', 'theme-text-domain' ),
			'id'          => 'custom-footer-a-hover-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#cc3333',
			'condition'   => 'custom-enable-color:is(on)',		
	  ),				
	  array(
			'label'       => __( 'Top Banner Background Color', 'theme-text-domain' ),
			'desc'        => __( 'Header top banner area background color', 'theme-text-domain' ),
			'id'          => 'custom-topbanner-bg-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#2ED5AE',
			'condition'   => 'custom-enable-color:is(on)',		
	  ),				
	  array(
			'label'       => __( 'Topbar Background Color', 'theme-text-domain' ),
			'desc'        => __( 'Header topbar area background color', 'theme-text-domain' ),
			'id'          => 'custom-topbar-bg-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#343434',
			'condition'   => 'custom-enable-color:is(on)',		
	  ),					
	  array(
			'label'       => __( 'Topbar Background Hover Color', 'theme-text-domain' ),
			'desc'        => __( 'Header topbar area background hover color', 'theme-text-domain' ),
			'id'          => 'custom-topbar-bg-hover-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#000000',
			'condition'   => 'custom-enable-color:is(on)',		
	  ),					
	  array(
			'label'       => __( 'Topbar Sub Menu Background Hover Color', 'theme-text-domain' ),
			'desc'        => __( 'Header topbar area sub menu background hover color', 'theme-text-domain' ),
			'id'          => 'custom-topbar-sub-bg-hover-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#232323',
			'condition'   => 'custom-enable-color:is(on)',		
	  ),					
	  array(
			'label'       => __( 'Topbar Font Color', 'theme-text-domain' ),
			'desc'        => __( 'Header topbar area font color', 'theme-text-domain' ),
			'id'          => 'custom-topbar-font-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#ffffff',
			'condition'   => 'custom-enable-color:is(on)',		
	  ),					
	  array(
			'label'       => __( 'Topbar Hover Font Color', 'theme-text-domain' ),
			'desc'        => __( 'Header topbar area hover font color', 'theme-text-domain' ),
			'id'          => 'custom-topbar-hover-font-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#cc3333',
			'condition'   => 'custom-enable-color:is(on)',		
	  ),					
	  array(
			'label'       => __( 'Enable Menu Custom Color', 'theme-text-domain' ),
			'id'          => 'custom-menu-color-enable',			
			'type'        => 'on-off',
			'section'     => 'color_tab',
			'std'    	  => 'off',
			'condition'   => 'custom-enable-color:is(on)',		
	  ),					
	  array(
			'label'       => __( 'Menu Area Background Color', 'theme-text-domain' ),
			'id'          => 'custom-menu-bg-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#ffffff',
			'condition'   => 'custom-menu-color-enable:is(on)',		
	  ),						
	  array(
			'label'       => __( 'Menu Area Border Top Color', 'theme-text-domain' ),
			'id'          => 'custom-menu-border-top-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#eeeeee',
			'condition'   => 'custom-menu-color-enable:is(on)',		
	  ),						
	  array(
			'label'       => __( 'Menu Area Border Bottom Color', 'theme-text-domain' ),
			'id'          => 'custom-menu-border-bottom-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#cc3333',
			'condition'   => 'custom-menu-color-enable:is(on)',		
	  ),						
	  array(
			'label'       => __( 'Menu Item Font Color', 'theme-text-domain' ),
			'id'          => 'custom-menu-item-font-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#333333',
			'condition'   => 'custom-menu-color-enable:is(on)',		
	  ),						
	  array(
			'label'       => __( 'Menu Item Hover Font Color', 'theme-text-domain' ),
			'id'          => 'custom-menu-item-hover-font-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#cc3333',
			'condition'   => 'custom-menu-color-enable:is(on)',		
	  ),						
	  array(
			'label'       => __( 'Menu Item Hover Background Color', 'theme-text-domain' ),
			'id'          => 'custom-menu-item-hover-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#cc3333',
			'condition'   => 'custom-menu-color-enable:is(on)',		
	  ),						
	  array(
			'label'       => __( 'Menu Sub Item Font Color', 'theme-text-domain' ),
			'id'          => 'custom-submenu-item-font-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#333333',
			'condition'   => 'custom-menu-color-enable:is(on)',		
	  ),						
	  array(
			'label'       => __( 'Menu Sub Item Hover Font Color', 'theme-text-domain' ),
			'id'          => 'custom-submenu-item-hover-font-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#000000',
			'condition'   => 'custom-menu-color-enable:is(on)',		
	  ),						
	  array(
			'label'       => __( 'Menu Sub Item Background Color', 'theme-text-domain' ),
			'id'          => 'custom-submenu-item-bg-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#ffffff',
			'condition'   => 'custom-menu-color-enable:is(on)',		
	  ),						
	  array(
			'label'       => __( 'Menu Sub Item Hover Background Color', 'theme-text-domain' ),
			'id'          => 'custom-submenu-item-bg-hover-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#eeeeee',
			'condition'   => 'custom-menu-color-enable:is(on)',		
	  ),						
	  array(
			'label'       => __( 'Menu Sub Item Border Color', 'theme-text-domain' ),
			'id'          => 'custom-submenu-item-border-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#e8e8e8',
			'condition'   => 'custom-menu-color-enable:is(on)',		
	  ),						
	  array(
			'label'       => __( 'Mega Menu Item Font Color', 'theme-text-domain' ),
			'id'          => 'custom-mega-menu-item-font-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#444444',
			'condition'   => 'custom-menu-color-enable:is(on)',		
	  ),						
	  array(
			'label'       => __( 'Mega Menu Item Hover Font Color', 'theme-text-domain' ),
			'id'          => 'custom-mega-menu-item-hover-font-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#444444',
			'condition'   => 'custom-menu-color-enable:is(on)',		
	  ),						
	  array(
			'label'       => __( 'Mega Sub Menu Item Font Color', 'theme-text-domain' ),
			'id'          => 'custom-mega-submenu-item-font-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#777777',
			'condition'   => 'custom-menu-color-enable:is(on)',		
	  ),						
	  array(
			'label'       => __( 'Mega Sub Menu Item Hover Font Color', 'theme-text-domain' ),
			'id'          => 'custom-mega-submenu-item-hover-font-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#444444',
			'condition'   => 'custom-menu-color-enable:is(on)',		
	  ),						
	  array(
			'label'       => __( 'Mega Background Color', 'theme-text-domain' ),
			'id'          => 'custom-mega-menu-background-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#ffffff',
			'condition'   => 'custom-menu-color-enable:is(on)',		
	  ),						
	  array(
			'label'       => __( 'Mega Border Color', 'theme-text-domain' ),
			'id'          => 'custom-mega-menu-border-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#e8e8e8',
			'condition'   => 'custom-menu-color-enable:is(on)',		
	  ),						
	  array(
			'label'       => __( 'Mega Item Border Bottom Color', 'theme-text-domain' ),
			'id'          => 'custom-mega-menu-item-border-bottom-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#eeeeee',
			'condition'   => 'custom-menu-color-enable:is(on)',		
	  ),						
	  array(
			'label'       => __( 'Mega Vertical Menu Border Color', 'theme-text-domain' ),
			'id'          => 'custom-mega-menu-ver-border-color',			
			'type'        => 'colorpicker',
			'section'     => 'color_tab',
			'std'    	  => '#cc3333',
			'condition'   => 'custom-menu-color-enable:is(on)',		
	  ),	
 
   /*
   * Blog Tab
   */
	  array(
		'label'       => __( 'Blog Style', 'theme-text-domain' ),
		'id'          => 'blog-post-show-style',			
		'type'        => 'select',
		'section'     => 'blog_tab',
		'std'    	  => '',	      
		'choices'     => array( 
				  array(
					'value'       => '0',
					'label'       => __( 'Blog Right Sidebar', 'atom' )
				  ),
				  array(
					'value'       => '1',
					'label'       => __( 'Blog Left Sidebar', 'atom' )
				  ),
				  array(
					'value'       => '2',
					'label'       => __( 'Blog No Sidebar', 'atom' )
				  ),
				  array(
					'value'       => '3',
					'label'       => __( 'Blog Masonry', 'atom' )
				  ),
				   array(
					'value'       => '4',
					'label'       => __( 'Blog Masonry Sidebar', 'atom' )
				  ),
				  array(
					'value'       => '5',
					'label'       => __( 'Blog Timeline', 'atom' )
				  ),
			),
	  ),
	  array(
		'label'       => __( 'Blog Category, Tags Style', 'theme-text-domain' ),
		'id'          => 'blog-cats-show-style',			
		'type'        => 'select',
		'section'     => 'blog_tab',
		'std'    	  => '1',	      
		'choices'     => array( 
				  array(
					'value'       => '0',
					'label'       => __( 'Normal', 'atom' )
				  ),
				  array(
					'value'       => $arrayextend.'1',
					'label'       => $arrayextend.__( 'Masonry', 'atom' )
				  ),
			),
	  ),
	  array(
		'label'       => $arrayextend.__( 'Default Masonry Page', 'theme-text-domain' ),
		'desc'        => __( 'Default blog page for category, tag show style just when you choose "Masonry" style.', 'theme-text-domain' ),
		'id'          => 'blog-masonry-page',			
		'type'        => 'page-select',
		'section'     => 'blog_tab',
		'std'    	  => '',
	  ),	
	  array(
		'label'       => __( 'Category for Single Post Breadchrumb', 'theme-text-domain' ),
		'desc'        => __( 'Check to enable show single post breadchrumb with category', 'theme-text-domain' ),
		'id'          => 'blog-enable-breadchrumb',			
		'type'        => 'on-off',
		'section'     => 'blog_tab',
		'std'    	  => 'on',
	  ),	
	  array(
		'label'       => __( 'Post View & Like Count', 'theme-text-domain' ),
		'desc'        => __( 'Turn on enable post page show view, like count information.', 'theme-text-domain' ),
		'id'          => 'blog-viewlike-enable',			
		'type'        => 'on-off',
		'section'     => 'blog_tab',
		'std'    	  => 'on',
	  ),	
	  array(
		'label'       => __( 'Related Post Show', 'theme-text-domain' ),
		'desc'        => __( 'Turn on enable post page show related posts.', 'theme-text-domain' ),
		'id'          => 'blog-related-enable',			
		'type'        => 'on-off',
		'section'     => 'blog_tab',
		'std'    	  => 'off',
	  ),	
	  array(
		'label'       => __( 'Related Post Show Style', 'theme-text-domain' ),
		'id'          => 'blog-related-style',			
		'type'        => 'select',
		'section'     => 'blog_tab',
		'std'    	  => '2',	      
		'condition'   => 'blog-related-enable:is(on)',	      
		'choices'     => array( 
				  array(
					'value'       => '0',
					'label'       => __( 'Style 1', 'atom' )
				  ),
				  array(
					'value'       => '1',
					'label'       => __( 'Style 2', 'atom' )
				  ),
				  array(
					'value'       => $arrayextend.'2',
					'label'       => $arrayextend.__( 'Style 3', 'atom' )
				  ),
				  array(
					'value'       => $arrayextend.'3',
					'label'       => $arrayextend.__( 'Style 4', 'atom' )
				  ),
				  array(
					'value'       => $arrayextend.'4',
					'label'       => $arrayextend.__( 'Style 5', 'atom' )
				  ),
			),
	  ),
	  array(
		'label'       => __( 'Share Show', 'theme-text-domain' ),
		'desc'        => __( 'Turn on enable post page show share.', 'theme-text-domain' ),
		'id'          => 'blog-share-enable',			
		'type'        => 'on-off',
		'section'     => 'blog_tab',
		'std'    	  => 'off',
	  ),	
	  array(
		'label'       => __( 'Share Type', 'theme-text-domain' ),
		'id'          => 'blog-share-type',			
		'type'        => 'radio',
		'section'     => 'blog_tab',
		'std'    	  => '1',	      
		'condition'   => 'blog-share-enable:is(on)',	      
		'choices'     => array( 
				  array(
					'value'       => '0',
					'label'       => __( 'Default', 'atom' )
				  ),
				  array(
					'value'       => '1',
					'label'       => __( 'Custom Share', 'atom' )
				  ),
			),
	  ),
	  array(
		'label'       => __( 'Custom Share Content', 'theme-text-domain' ),
		'id'          => 'blog-share-content',			
		'type'        => 'textarea-simple',
		'section'     => 'blog_tab',
		'std'    	  => '',	      
		'condition'   => 'blog-share-enable:is(on)',
	  ),
   /*
   * Portfolio Tab
   */
	  array(
		'label'       => __( 'Default Portfolio Page', 'theme-text-domain' ),
		'desc'        => __( 'Default portfolio page for category default show style.', 'theme-text-domain' ),
		'id'          => 'portfolio-default-page',			
		'type'        => 'page-select',
		'section'     => 'portfolio_tab',
		'std'    	  => '',
	  ),	
	  array(
		'label'       => __( 'Category for Single Post Breadchrumb', 'theme-text-domain' ),
		'desc'        => __( 'Check to enable show single post breadchrumb with category', 'theme-text-domain' ),
		'id'          => 'portfolio-enable-breadchrumb',			
		'type'        => 'on-off',
		'section'     => 'portfolio_tab',
		'std'    	  => 'off',
	  ),	
	  array(
		'label'       => __( 'Post View & Like Count', 'theme-text-domain' ),
		'desc'        => __( 'Turn on enable post page show view, like count information.', 'theme-text-domain' ),
		'id'          => 'portfolio-viewlike-enable',			
		'type'        => 'on-off',
		'section'     => 'portfolio_tab',
		'std'    	  => 'off',
	  ),	
	  array(
		'label'       => __( 'Related Post Show', 'theme-text-domain' ),
		'desc'        => __( 'Turn on enable post page show related posts.', 'theme-text-domain' ),
		'id'          => 'portfolio-related-enable',			
		'type'        => 'on-off',
		'section'     => 'portfolio_tab',
		'std'    	  => 'off',
	  ),	
	  array(
		'label'       => __( 'Related Post Show Style', 'theme-text-domain' ),
		'id'          => 'portfolio-related-style',			
		'type'        => 'select',
		'section'     => 'portfolio_tab',
		'std'    	  => '4',	      
		'condition'   => 'portfolio-related-enable:is(on)',	      
		'choices'     => array( 
				  array(
					'value'       => '0',
					'label'       => __( 'Style 1', 'atom' )
				  ),
				  array(
					'value'       => '1',
					'label'       => __( 'Style 2', 'atom' )
				  ),
				  array(
					'value'       => $arrayextend.'2',
					'label'       => $arrayextend.__( 'Style 3', 'atom' )
				  ),
				  array(
					'value'       => $arrayextend.'3',
					'label'       => $arrayextend.__( 'Style 4', 'atom' )
				  ),
				  array(
					'value'       => $arrayextend.'4',
					'label'       => $arrayextend.__( 'Style 5', 'atom' )
				  ),
				  array(
					'value'       => $arrayextend.'5',
					'label'       => $arrayextend.__( 'Style 6', 'atom' )
				  ),
				  array(
					'value'       => $arrayextend.'6',
					'label'       => $arrayextend.__( 'Style 7', 'atom' )
				  ),
				  array(
					'value'       => $arrayextend.'8',
					'label'       => $arrayextend.__( 'Style 8', 'atom' )
				  ),
			),
	  ),
	  array(
		'label'       => __( 'Share Show', 'theme-text-domain' ),
		'desc'        => __( 'Turn on enable post page show share.', 'theme-text-domain' ),
		'id'          => 'portfolio-share-enable',			
		'type'        => 'on-off',
		'section'     => 'portfolio_tab',
		'std'    	  => 'off',
	  ),	
	  array(
		'label'       => __( 'Share Type', 'theme-text-domain' ),
		'id'          => 'portfolio-share-type',			
		'type'        => 'radio',
		'section'     => 'portfolio_tab',
		'std'    	  => '1',	      
		'condition'   => 'portfolio-share-enable:is(on)',	      
		'choices'     => array( 
				  array(
					'value'       => '0',
					'label'       => __( 'Default', 'atom' )
				  ),
				  array(
					'value'       => '1',
					'label'       => __( 'Custom Share', 'atom' )
				  ),
			),
	  ),
	  array(
		'label'       => __( 'Custom Share Content', 'theme-text-domain' ),
		'id'          => 'portfolio-share-content',			
		'type'        => 'textarea-simple',
		'section'     => 'portfolio_tab',
		'std'    	  => '',	      
		'condition'   => 'portfolio-share-enable:is(on)',
	  ),	
	  array(
		'label'       => __( 'Single Page Style', 'theme-text-domain' ),
		'id'          => 'portfolio-single-style',			
		'type'        => 'radio',
		'section'     => 'portfolio_tab',
		'std'    	  => '1',	            
		'choices'     => array( 
				  array(
					'value'       => '0',
					'label'       => __( 'Style 1', 'atom' )
				  ),
				  array(
					'value'       => '1',
					'label'       => __( 'Style 2', 'atom' )
				  ),
				  array(
					'value'       => $arrayextend.'2',
					'label'       => $arrayextend.__( 'Style 3', 'atom' )
				  ),
			),
	  ),
   /*
   * Social Tab
   */
	  array(
			'label'       => __( 'Email', 'theme-text-domain' ),
			'id'          => 'social-email',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
	  array(
			'label'       => __( 'Twitter', 'theme-text-domain' ),
			'id'          => 'social-twitter',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
	  array(
			'label'       => __( 'Facebook', 'theme-text-domain' ),
			'id'          => 'social-facebook',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
	  array(
			'label'       => __( 'Google+', 'theme-text-domain' ),
			'id'          => 'social-google-plus',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
	  array(
			'label'       => __( 'Dribble', 'theme-text-domain' ),
			'id'          => 'social-dribble',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
	  array(
			'label'       => __( 'Pinterest', 'theme-text-domain' ),
			'id'          => 'social-pinterest',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
	  array(
			'label'       => __( 'Flickr', 'theme-text-domain' ),
			'id'          => 'social-flickr',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
	  array(
			'label'       => __( 'Skype', 'theme-text-domain' ),
			'id'          => 'social-skype',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
	  array(
			'label'       => __( 'Youtube', 'theme-text-domain' ),
			'id'          => 'social-youtube',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
	  array(
			'label'       => __( 'Vimeo', 'theme-text-domain' ),
			'id'          => 'social-vimeo',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
	  array(
			'label'       => __( 'Linkedin', 'theme-text-domain' ),
			'id'          => 'social-linkedin',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
	  array(
			'label'       => __( 'Digg', 'theme-text-domain' ),
			'id'          => 'social-digg',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
	  array(
			'label'       => __( 'Deviantart', 'theme-text-domain' ),
			'id'          => 'social-deviantart',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
	  array(
			'label'       => __( 'Behance', 'theme-text-domain' ),
			'id'          => 'social-behance',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
	  array(
			'label'       => __( 'Forrst', 'theme-text-domain' ),
			'id'          => 'social-forrst',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
	  array(
			'label'       => __( 'Lastfm', 'theme-text-domain' ),
			'id'          => 'social-lastfm',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
	  array(
			'label'       => __( 'XING', 'theme-text-domain' ),
			'id'          => 'social-xing',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
	  array(
			'label'       => __( 'Instagram', 'theme-text-domain' ),
			'id'          => 'social-instagram',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
	  array(
			'label'       => __( 'StumbleUpon', 'theme-text-domain' ),
			'id'          => 'social-stumbleupon',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
	  array(
			'label'       => __( 'Picasa', 'theme-text-domain' ),
			'id'          => 'social-picasa',			
			'type'        => 'text',
			'section'     => 'social_tab',
			'std'    	  => '',	
	  ),
   /*
   * General Tab
   */
	  array(
			'label'       => __( 'Favicon', 'theme-text-domain' ),
			'id'          => 'favicon',			
			'type'        => 'upload',
			'section'     => 'general_tab',
			'std'    	  => '',	
	  ),	
	  array(
			'label'       => __( 'Feed url', 'theme-text-domain' ),
			'id'          => 'rss-feed',			
			'type'        => 'text',
			'section'     => 'general_tab',
			'std'    	  => '',	
	  ),	
      array(
        'label'       => __( 'Theme Skin', 'theme-text-domain' ),
        'id'          => 'global-skin',
        'type'        => 'radio',
		'section'     => 'general_tab',
		'std'    	  => '1',       
        'choices'     => array( 
				  array(
					'value'       => '0',
					'label'       => __( 'Light Skin', 'atom' )
				  ),
				  array(
					'value'       => '1',
					'label'       => __( 'Dark Skin', 'atom' )
				  ),
			),
      ),
      array(
        'label'       => __( 'Global Layout', 'theme-text-domain' ),
        'id'          => 'global-layout',
        'type'        => 'radio',
		'section'     => 'general_tab',
		'std'    	  => '1',       
        'choices'     => array( 
				  array(
					'value'       => '0',
					'label'       => __( 'Boxed', 'atom' )
				  ),
				  array(
					'value'       => '1',
					'label'       => __( 'Wide', 'atom' )
				  ),
			),
      ),
      array(
        'label'       => __( 'Boxed Layout Padding', 'theme-text-domain' ),
        'desc'        => __( 'Setting Global Boxed Layout Top, Bottom Padding', 'theme-text-domain' ),
        'id'          => 'global-layout-boxed-padding',
		'section'     => 'general_tab',
		'std'         => '0',
        'type'        => 'numeric-slider',
        'min_max_step'=> '0,250,5',
        'condition'	  => 'global-layout:is(0)',
      ),
      array(
        'label'       => __( 'Mobile Responsive', 'theme-text-domain' ),
        'desc'        => __( 'Turn on mobile responsive support.', 'theme-text-domain' ),
        'id'          => 'global-mobile-enable',
		'section'     => 'general_tab',
		'std'         => '0',
        'type'        => 'on-off',
      ),
      array(
        'label'       => __( 'Global Sidebar Layout', 'theme-text-domain' ),
        'id'          => 'global-sidebar-layout',
        'type'        => 'radio',
		'section'     => 'general_tab',
		'std'    	  => '1',       
        'choices'     => array( 
				  array(
					'value'       => '0',
					'label'       => __( 'Full Width', 'atom' )
				  ),
				  array(
					'value'       => '1',
					'label'       => __( 'Left Sidebar', 'atom' )
				  ),
				  array(
					'value'       => '2',
					'label'       => __( 'Right Sidebar', 'atom' )
				  ),
			),
      ),
      array(
        'label'       => __( 'Global Page Title Align', 'theme-text-domain' ),
        'id'          => 'global-title-align',
        'type'        => 'radio',
		'section'     => 'general_tab',
		'std'    	  => '1',       
        'choices'     => array( 
				  array(
					'value'       => '0',
					'label'       => __( 'Left', 'atom' )
				  ),
				  array(
					'value'       => '1',
					'label'       => __( 'Center', 'atom' )
				  ),
				  array(
					'value'       => '2',
					'label'       => __( 'Right', 'atom' )
				  ),
			),
      ),
      array(
        'label'       => __( 'Mega Menu Enable', 'theme-text-domain' ),
        'desc'        => __( 'Turn on enable Mega Menu. '.$alertextend , 'theme-text-domain' ),
        'id'          => 'mega-menu-enable',
		'section'     => 'general_tab',
        'type'        => 'on-off',
        'std'         => 'off',
      ),
      array(
        'label'       => __( 'FontAwesome CDN Enable', 'theme-text-domain' ),
        'desc'        => __( 'Turn on enable FontAwesome CDN.', 'theme-text-domain' ),
        'id'          => 'fontawesome-cdn',
		'section'     => 'general_tab',
        'type'        => 'on-off',
        'std'         => 'on',
      ),
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
}