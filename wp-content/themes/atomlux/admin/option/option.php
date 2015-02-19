<?php

return array(
	'title' => __('ATOMLABS Option Panel', 'atom'),
	'logo' => '',	
	'menus' => array(
		array(
			'title' => __('General', 'atom'),
			'name' => 'menu_general',
			'icon' => 'font-awesome:fa-home',
			'controls' => array(			
						array(
							'type' => 'section',
							'title' => __('Home Slider', 'atom'),
							'name' => 'section_1',
							'description' => __('Home Slider', 'atom'),
							'fields' => array(		
												array(
												'type' => 'select',
												'name' => 'home_slider',
												'label' => __('Home Page Slider', 'atom'),
												'description' => __('This theme supports <a href="http://atomlabs.me/revslider" target="_blank">Revolution Slider</a>. Buy it here to create more professional responsive sliders.', 'atom'),
												'items' => array(
													'data' => array(
															array(
																'source' => 'function',
																'value'  => 'atomlabs_get_metaslider',
															),
														),											
												),
												'default' => array(
													'demo',
												),
											),
											array(
												'type' => 'toggle',
												'name' => 'home_slider_stretch',
												'label' => __('Stretch Home Slider', 'atom'),
												'description' => __('Stretch the home page slider to the width of the screen if using the full width layout.', 'atom'),
												'default' => '1',
											),
							),
						),
						array(
							'type' => 'section',
							'title' => __('General Settings', 'atom'),
							'name' => 'section_2',
							'description' => __('General', 'atom'),
							'fields' => array(
												array(
													'type' => 'textbox',
													'name' => 'contactmobile',
													'label' => __('Phone Number', 'atom'),
													'description' => __('Your contact number, show on header.', 'atom'),
													'default' => '(021) 222 5555',
											),
												array(
													'type' => 'textbox',
													'name' => 'contactemail',
													'label' => __('Contact Email', 'atom'),
													'description' => __('Your contact email, show on header.', 'atom'),
													'default' => get_bloginfo('admin_email'),
											),
												array(
												'type' => 'textarea',
												'name' => 'general_site_info_text',
												'label' => __('Site Information Text', 'atom'),
												'description' => __('Text displayed in your footer. Useful for copyright information.', 'atom'),
												'default' => 'Theme by <a href="http://atomlabs.me/" target="_blank" title="Easy to Setup Wordpress Themes">AtomLabs.me</a>',
											),
												array(
												'type' => 'toggle',
												'name' => 'general_hover_edit',
												'label' => __('Display Hover Edit Icon', 'atom'),
												'description' => __('Display a small icon that makes quickly editing fields easy. This is only shown to admin users.', 'atom'),
												'default' => '1',
											),
												array(
												'type' => 'toggle',
												'name' => 'social_ajax_comments',
												'label' => __('Ajax Comments', 'atom'),
												'description' => __('Keep your conversations flowing with ajax comments.', 'atom'),
												'default' => '1',
											),
							),
						),						
						array(
							'type' => 'section',
							'title' => __('Content Lightbox Modals', 'atom'),
							'name' => 'section_single_field_deps',
							'fields' => array(
								array(
									'type' => 'toggle',
									'name' => 'lightboxmon',
									'label' => __('Use Content Lightbox Modals?', 'atom'),
								),
								array(
									'type' => 'textbox',
									'name' => 'lightboxt',
									'label' => __('Modals window title', 'atom'),
									'default' => 'Join Our Fanbase',
									'dependency' => array(
										'field' => 'lightboxmon',
										'function' => 'vp_dep_boolean',
									),
								),
								array(
									'type' => 'textarea',
									'name' => 'lightboxc',
									'label' => __('Content Code (html allowed)', 'atom'),
									'description' => __('you can fill with your fans page code, or option code', 'atom'),
									'dependency' => array(
										'field' => 'lightboxmon',
										'function' => 'vp_dep_boolean',
									),
								),
								array(
									'type' => 'toggle',
									'name' => 'lightboxcookieon',
									'label' => __('Use Cookie?', 'atom'),
									'description' => __('if COOKIE OFF will show everypage, No limitation', 'atom'),
									'dependency' => array(
										'field' => 'lightboxmon',
										'function' => 'vp_dep_boolean',
									),
								),
								array(
									'type' => 'textbox',
									'name' => 'lightboxcookie',
									'default' => '3600',
									'label' => __('Each visitor show every', 'atom'),
									'description' => __('3600 = 1 hour', 'atom'),
									'dependency' => array(
										'field' => 'lightboxcookieon',
										'function' => 'vp_dep_boolean',
									),
								),
							),
						),
						
						
						
					
					
				
				
			),
			
		),
		array(
			'title' => __('Logo Upload', 'atom'),
			'name' => 'menu_logo',
			'icon' => 'font-awesome:fa-magic',
			'controls' => array(			
						
						array(
							'type' => 'section',
							'title' => __('Branding', 'atom'),
							'name' => 'section_1',
							'description' => __('Branding Showcase', 'atom'),
							'fields' => array(
												array(
													'type' => 'upload',
													'name' => 'logo_image',
													'label' => __('Logo Uploader', 'atom'),
													'description' => __('Logo uploader, <strong>size 300x130</strong> pixels', 'atom'),
													'default' => 'http://i1.wp.com/images.fachrul.com/dm/KNXB/atomlabs-white.png',
												),
												array(
													'type' => 'upload',
													'name' => 'logo_image_retina',
													'label' => __('Retina Logo Uploader', 'atom'),
													'description' => __('A double sized version of your logo for retina displays. Must be used in addition to standard logo.', 'atom'),
													'default' => 'http://i1.wp.com/images.fachrul.com/dm/KNXB/atomlabs-white.png',
												),
												array(
													'type' => 'upload',
													'name' => 'favupload',
													'label' => __('Favicon Uploader', 'atom'),
													'description' => __('Favicon uploader, using the powerful WP Media Upload. 48x48 pixels', 'atom'),
													'default' => 'http://i1.wp.com/images.fachrul.com/di/JHG4/ATOMLabs.png',
												),
							),
						),
						
						
					
					
				
				
			),
			
		),
		array(
			'title' => __('Layout', 'atom'),
			'name' => 'menu_layout',
			'icon' => 'font-awesome:fa-shield',
			'controls' => array(			
						
						array(
							'type' => 'section',
							'title' => __('Layout', 'atom'),
							'name' => 'section_1',
							'description' => __('Layout Settings', 'atom'),
							'fields' => array(
												array(
												'type' => 'toggle',
												'name' => 'layout_responsive',
												'label' => __('Responsive Layout', 'atom'),
												'description' => __('Scale your layout for small screen devices.', 'atom'),
												'default' => '1',
											),
												array(
												'type' => 'radiobutton',
												'name' => 'layout_bound',
												'label' => __('Layout Type', 'atom'),
												'items' => array(
													array(
														'value' => 'boxed',
														'label' => __('Boxed', 'atom'),
													),
													array(
														'value' => 'full',
														'label' => __('Full Width', 'atom'),
													),
												),
												'default' => array(
													'full',
												),
											),
												array(
												'type' => 'radiobutton',
												'name' => 'layout_masthead',
												'label' => __('Masthead Layout', 'atom'),
												'items' => array(
													array(
														'value' => 'default',
														'label' => __('Default', 'atom'),
													),
													array(
														'value' => 'logo-in-menu',
														'label' => __('Logo in Menu', 'atom'),
													),
												),
												'default' => array(
													'default',
												),
											),
												array(
												'type' => 'radiobutton',
												'name' => 'layout_menu',
												'label' => __('Masthead Menu', 'atom'),
												'items' => array(
													array(
														'value' => 'default',
														'label' => __('Default Menu', 'atom'),
													),
												),
												'default' => array(
													'default',
												),
											),
												array(
												'type' => 'radiobutton',
												'name' => 'layout_footer',
												'label' => __('Footer Layout', 'atom'),
												'items' => array(
													array(
														'value' => 'default',
														'label' => __('Default', 'atom'),
													),
												),
												'default' => array(
													'default',
												),
											),
							),
						),
						
						
						
					
					
				
				
			),
			
		),
		array(
			'title' => __('Navigation', 'atom'),
			'name' => 'menu_nav',
			'icon' => 'font-awesome:fa-bolt',
			'controls' => array(			
						
						array(
							'type' => 'section',
							'title' => __('Navigation', 'atom'),
							'name' => 'section_1',
							'description' => __('Navigation Settings', 'atom'),
							'fields' => array(
												array(
												'type' => 'toggle',
												'name' => 'navigation_responsive_menu',
												'label' => __('Responsive Menu', 'atom'),
												'description' => __('Use a special responsive menu for small screen devices.', 'atom'),
												'default' => '1',
											),
												array(
												'type' => 'textbox',
												'name' => 'navigation_responsive_menu_text',
												'label' => __('Responsive Menu Text', 'atom'),
												'description' => __('The button used for the responsive menu.', 'atom'),
												'default' => get_bloginfo('name'),
											),
												array(
												'type' => 'toggle',
												'name' => 'navigation_use_sticky_menu',
												'label' => __('Sticky  Menu', 'atom'),
												'description' => __('Sticks the menu to the top of the screen when a user scrolls down.', 'atom'),
												'default' => '1',
											),
												array(
												'type' => 'toggle',
												'name' => 'navigation_menu_search',
												'label' => __('Search in Menu', 'atom'),
												'description' => __('Display a search in the main menu.', 'atom'),
												'default' => '1',
											),
												array(
												'type' => 'toggle',
												'name' => 'navigation_display_scroll_to_top',
												'label' => __('Display Scroll To Top', 'atom'),
												'description' => __('Display a scroll-to-top button when a user scrolls down.', 'atom'),
												'default' => '1',
											),
												array(
												'type' => 'toggle',
												'name' => 'navigation_post_nav',
												'label' => __('Post Navigation', 'atom'),
												'description' => __('Display next/previous post navigation.', 'atom'),
												'default' => '1',
											),
												array(
												'type' => 'toggle',
												'name' => 'navigation_home_icon',
												'label' => __('Home Page Icon', 'atom'),
												'description' => __('Display home icon for home page menu links.', 'atom'),
												'default' => '1',
											),
												array(
												'type' => 'slider',
												'name' => 'navigation_responsive_menu_collapse',
												'label' => __('Mobile Menu Collapse', 'atom'),
												'description' => __('The resolution when the menu collapses into a mobile navigation menu.', 'atom'),
												'min' => '380',
												'max' => '580',
												'step' => '20',
												'default' => '480',
											),
							),
						),
						
						
						
					
					
				
				
			),
			
		),
		array(
			'title' => __('Blog', 'atom'),
			'name' => 'menu_blog',
			'icon' => 'font-awesome:fa-inbox',
			'controls' => array(			
						
						array(
							'type' => 'section',
							'title' => __('Navigation', 'atom'),
							'name' => 'section_1',
							'description' => __('Navigation Settings', 'atom'),
							'fields' => array(
												array(
												'type' => 'radiobutton',
												'name' => 'blog_archive_layout',
												'label' => __('Blog Archive Layout', 'atom'),
												'description' => __('Show the blog post type in blog archive pages.', 'atom'),
												'items' => array(
													array(
														'value' => 'blog',
														'label' => __('Blog', 'atom'),
													),
													array(
														'value' => 'grid',
														'label' => __('Grid', 'atom'),
													),
												),
												'default' => array(
													'blog',
												),
											),
												array(
												'type' => 'radiobutton',
												'name' => 'blog_archive_content',
												'label' => __('Post Content', 'atom'),
												'description' => __('Choose how to display posts on post archive when using default blog layout.', 'atom'),
												'items' => array(
													array(
														'value' => 'full',
														'label' => __('Full Post', 'atom'),
													),
													array(
														'value' => 'excerpt',
														'label' => __('Post Excerpt', 'atom'),
													),
												),
												'default' => array(
													'full',
												),
											),												
												array(
												'type' => 'toggle',
												'name' => 'blog_post_author',
												'label' => __('Post Author', 'atom'),
												'description' => __('Show the post author in blog archive pages.', 'atom'),
												'default' => '1',
											),												
												array(
												'type' => 'toggle',
												'name' => 'blog_post_date',
												'label' => __('Post Date', 'atom'),
												'description' => __('Show the post date in blog archive pages.', 'atom'),
												'default' => '1',
											),											
												array(
												'type' => 'toggle',
												'name' => 'blog_featured_image',
												'label' => __('Featured Image', 'atom'),
												'description' => __('Show the featured image on a post single page.', 'atom'),
												'default' => '1',
											),
												array(
												'type' => 'radiobutton',
												'name' => 'blog_featured_image_type',
												'label' => __('Featured Image Type', 'atom'),
												'description' => __('Size of the featured image in the blog post archives.', 'atom'),
												'items' => array(
													array(
														'value' => 'large',
														'label' => __('Large', 'atom'),
													),
													array(
														'value' => 'icon',
														'label' => __('Small Icon', 'atom'),
													),
												),
												'default' => array(
													'large',
												),
											),	
												
							),
						),
						
						
						
					
					
				
				
			),
			
		),	
		
		array(
			'title' => __('Social Links', 'atom'),
			'name' => 'menu_4',
			'icon' => 'font-awesome:fa-google-plus',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Social Media url', 'atom'),
					'fields' => array(
									array(
										'type' => 'textbox',
										'name' => 'rss',
										'label' => __('RSS Feed URL', 'atom'),
										'description' => __('Only valid URL allowed here.', 'atom'),
										'default' => get_bloginfo('url').'/feed',
									),
									array(
										'type' => 'textbox',
										'name' => 'facebook',
										'label' => __('Facebook URL', 'atom'),
										'description' => __('Only valid URL allowed here.', 'atom'),
										'default' => '',
									),
									array(
										'type' => 'textbox',
										'name' => 'twitter',
										'label' => __('Twitter URL', 'atom'),
										'description' => __('Only valid URL allowed here.', 'atom'),
										'default' => '',
									),
									array(
										'type' => 'textbox',
										'name' => 'pinterest',
										'label' => __('Pinterest URL', 'atom'),
										'description' => __('Only valid URL allowed here.', 'atom'),
										'default' => '',
									),
									array(
										'type' => 'textbox',
										'name' => 'youtube',
										'label' => __('Youtube URL', 'atom'),
										'description' => __('Only valid URL allowed here.', 'atom'),
										'default' => '',
									),
									array(
										'type' => 'textbox',
										'name' => 'google',
										'label' => __('Google+ URL', 'atom'),
										'description' => __('Only valid URL allowed here.', 'atom'),
										'default' => '',
									),									
								),
				),
			),
		),
		array(
			'title' => __('Analytics & CSS', 'atom'),
			'name' => 'menu_5',
			'icon' => 'font-awesome:fa-cogs',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Your Code', 'atom'),
					'fields' => array(
									array(
										'type' => 'codeeditor',
										'name' => 'csscode',
										'label' => __('Custom CSS Code', 'atom'),
										'description' => __('Write your custom css here.', 'atom'),
										'theme' => 'github',
										'mode' => 'css',
									),
									array(
										'type' => 'codeeditor',
										'name' => 'footcode',
										'label' => __('Analytics or Other Script', 'atom'),
										'description' => __('All script will show before &lt;/body&gt;.', 'atom'),
										'theme' => 'twilight',
										'mode' => 'javascript',
									),
								),
								
				),
			),
		),
		
		array(
			'title' => __('Page Settings', 'atom'),
			'name' => 'menu_6',
			'icon' => 'font-awesome:fa-th-list',
			'menus' => array(
				array(
					'title' => __('Single Post', 'atom'),
					'name' => 'single_post',
					'icon' => 'font-awesome:fa-file-text',
					'controls' => array(
						array(
							'type' => 'section',
							'title' => __('Settings', 'atom'),
							'fields' => array(
									
									array(
										'type' => 'select',
										'name' => 'typecommentsingle',
										'label' => __('Comment System', 'atom'),
										'items' => array(
											array(
												'value' => 'off',
												'label' => __('OFF', 'atom'),
											),
											array(
												'value' => 'wp',
												'label' => __('Wordpress Default', 'atom'),
											),
											array(
												'value' => 'disqus',
												'label' => __('Disqus Comment', 'atom'),
											),
											array(
												'value' => 'facebook',
												'label' => __('Facebook Comment', 'atom'),
											),
											array(
												'value' => 'googlep',
												'label' => __('Google+ Comment', 'atom'),
											),											
										),
										'default' => array(
											'googlep',
										),
									),
									array(
										'type' => 'textbox',
										'name' => 'disqusname',
										'label' => __('Disqus Shortname', 'atom'),
										'description' => __('Fill this with your Disqus Comment Shortname generated on Disqus Dashboard', 'atom'),
										'default' => '',
										'validation' => 'alphanumeric',
									),
							),
						
						),
					),					
				),
				array(
					'title' => __('Page Post', 'atom'),
					'name' => 'page_post',
					'icon' => 'font-awesome:fa-file-text-o',
					'controls' => array(
						array(
							'type' => 'section',
							'title' => __('Settings', 'atom'),
							'fields' => array(									
									
									array(
										'type' => 'select',
										'name' => 'typecommentpage',
										'label' => __('Comment System', 'atom'),
										'items' => array(
											array(
												'value' => 'off',
												'label' => __('OFF', 'atom'),
											),
											array(
												'value' => 'wp',
												'label' => __('Wordpress Default', 'atom'),
											),
											array(
												'value' => 'disqus',
												'label' => __('Disqus Comment', 'atom'),
											),
											array(
												'value' => 'facebook',
												'label' => __('Facebook Comment', 'atom'),
											),
											array(
												'value' => 'googlep',
												'label' => __('Google+ Comment', 'atom'),
											),											
										),
										'default' => array(
											'googlep',
										),
									),
									array(
										'type' => 'textbox',
										'name' => 'disqusnamepage',
										'label' => __('Disqus Shortname', 'atom'),
										'description' => __('Fill this with your Disqus Comment Shortname generated on Disqus Dashboard', 'atom'),
										'default' => '',
										'validation' => 'alphanumeric',
									),
							),
						
						),
					),
				),
			),
		),
		
		
				
		
		
		
		
		
		
	)
);

/**
 *EOF
 */