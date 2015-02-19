<?php


/**
 * Custom Theme Widgets
 *
 * @since ATOM 1.0
 */
 
/**
 * Register All Widget
 */
function atom_register_widgets() {
	//register_widget( 'atomPortfolioCategoryWidget' );
	//register_widget( 'atomPortfolioRecentWidget' );
	//register_widget( 'atomPortfolioCustomItemsWidget' );
	//register_widget( 'atomPortfolioTabsWidget' );
	
	register_widget( 'atomBlogRecentWidget' );
	register_widget( 'atomBlogCustomItemsWidget' );
	register_widget( 'atomBlogPopularWidget' );
	register_widget( 'atomBlogTabsWidget' );
	register_widget( 'atomBackgiWidget' );
}

add_action( 'widgets_init', 'atom_register_widgets' );

/**
 * Blog Tabs Items Widget
 */
class atomBlogTabsWidget extends WP_Widget {

	function atomBlogTabsWidget() {
		// Instantiate the parent object
		parent::__construct( false, __('ATOM Blog Tabs Items','atom'), array( 'description' => __( 'ATOM blog tabs items for popular, features, recent items! ', 'atom' )));
	}

	function widget( $args, $instance ) {
		// Widget output
		extract( $args );
		
		//$title = apply_filters('widget_title', $instance['title'] );
		$show_style = apply_filters('widget_title', $instance['show_style'] );
		$show_featured = apply_filters('widget_title', $instance['show_featured'] );
		$show_ids = apply_filters('widget_title', $instance['show_ids'] );
		$show_recent = apply_filters('widget_title', $instance['show_recent'] );
		$show_num = apply_filters('widget_title', $instance['show_num'] );
		$featured_title = apply_filters('widget_title', $instance['featured_title'] );
		$recent_title = apply_filters('widget_title', $instance['recent_title'] );
		$show_popular = apply_filters('widget_title', $instance['show_popular'] );
		$popular_title = apply_filters('widget_title', $instance['popular_title'] );
		$popular_num = apply_filters('widget_title', $instance['popular_num'] );
		
		echo $before_widget;
		
		$html = '[tabs]';
		if($show_popular) {
			if($popular_title == ""){
				$popular_title = __('Popular','atom');
			}
			$html .='[tabs_item title="'.$popular_title.'"]'.atom_get_blog_recent_post('popular',$popular_num,(intval($show_style) + 1)).'[/tabs_item] ';
		}
		if($show_featured) {
			if($featured_title == ""){
				$featured_title = __('Featured','atom');
			}
			$html .='[tabs_item title="'.$featured_title.'"]'.atom_get_blog_recent_post('featured',count(explode(",",$show_ids)),(intval($show_style) + 1),$show_ids).'[/tabs_item] ';
		}
		if($show_recent) {
			if($recent_title == ""){
				$recent_title = __('Recent','atom');
			}
			$html .='[tabs_item title="'.$recent_title.'"]'.atom_get_blog_recent_post('recent',$show_num, (intval($show_style) + 1)).'[/tabs_item] ';
		}
		$html .='[/tabs]';
		
		echo do_shortcode($html);
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
		$instance = $old_instance;
		//$instance['title'] = strip_tags($new_instance['title']);
		$instance['show_style'] = strip_tags($new_instance['show_style']);
		// popular
		$instance['show_popular'] = strip_tags($new_instance['show_popular']);
		$instance['popular_title'] = strip_tags($new_instance['popular_title']);
		$instance['popular_num'] = strip_tags($new_instance['popular_num']);
		// featured show
		$instance['show_featured'] = strip_tags($new_instance['show_featured']);
		$instance['featured_title'] = strip_tags($new_instance['featured_title']);
		$instance['show_ids'] = strip_tags($new_instance['show_ids']);
		// recent show
		$instance['show_recent'] = strip_tags($new_instance['show_recent']);
		$instance['recent_title'] = strip_tags($new_instance['recent_title']);
		$instance['show_num'] = strip_tags($new_instance['show_num']);
		return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form
		if( isset($instance['show_style']) ){
			$show_style = $instance['show_style'];
		}else{
			$show_style = 0;
		}

		if( isset($instance['show_popular']) ){
			$show_popular = $instance['show_popular'];
		}else{
			$show_popular = 'yes';
		}
		if( isset($instance['popular_title']) ){
			$popular_title = $instance['popular_title'];
		}else{
			$popular_title = __('Popular','atom');
		}
		if( isset($instance['popular_num']) ){
			$popular_num = $instance['popular_num'];
		}else{
			$popular_num = 5;
		}
		
		if( isset($instance['show_featured']) ){
			$show_featured = $instance['show_featured'];
		}else{
			$show_featured = 'yes';
		}
		if( isset($instance['featured_title']) ){
			$featured_title = $instance['featured_title'];
		}else{
			$featured_title = __('Featured','atom');
		}
		if( isset($instance['show_ids']) ){
			$show_ids = $instance['show_ids'];
		}else{
			$show_ids = '';
		}
		
		if( isset($instance['show_recent']) ){
			$show_recent = $instance['show_recent'];
		}else{
			$show_recent = 'yes';
		}
		if( isset($instance['recent_title']) ){
			$recent_title = $instance['recent_title'];
		}else{
			$recent_title = __('Recent','atom');
		}
		if( isset($instance['show_num']) ){
			$show_num = $instance['show_num'];
		}else{
			$show_num = 5;
		}
		?>
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_style' )); ?>"><?php _e( 'Show Style:' , 'atom'); ?></label> 
        <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_style' )); ?>" type="text">
            <option value="0" <?php echo $show_style == 0 ? 'selected="selected"' : ''; ?>><?php _e( 'Icon Style' , 'atom'); ?></option>
            <option value="1" <?php echo $show_style == 1 ? 'selected="selected"' : ''; ?>><?php _e( 'Thumbs Style' , 'atom'); ?></option>
            <option value="2" <?php echo $show_style == 2 ? 'selected="selected"' : ''; ?>><?php _e( 'Big Thumbs Style' , 'atom'); ?></option>
            <option value="3" <?php echo $show_style == 3 ? 'selected="selected"' : ''; ?>><?php _e( 'Icon Style with Like Count' , 'atom'); ?></option>
            <option value="4" <?php echo $show_style == 4 ? 'selected="selected"' : ''; ?>><?php _e( 'Thumbs Style with Like Count' , 'atom'); ?></option>
        </select>
        </p>
        <hr />
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_popular' )); ?>"><input id="<?php echo esc_attr($this->get_field_id( 'show_popular' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_popular' )); ?>" type="checkbox" <?php checked('yes' , $show_popular); ?>  value="yes" /><?php _e( 'Click show popular items' , 'atom'); ?></label> 
		</p>
         <p>
		<label for="<?php echo esc_attr($this->get_field_id( 'popular_title' )); ?>"><?php _e( 'Popular Title:' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'popular_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'popular_title' )); ?>" type="text" value="<?php echo esc_attr( $popular_title ); ?>" />
		</p>
		<p>
        <label for="<?php echo esc_attr($this->get_field_id( 'popular_num' )); ?>"><?php _e( 'Popular Items number' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'popular_num' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'popular_num' )); ?>" value="<?php echo esc_attr( $popular_num ); ?>" type="number">
		</p>
        <hr />
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_featured' )); ?>"><input id="<?php echo esc_attr($this->get_field_id( 'show_featured' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_featured' )); ?>" type="checkbox" <?php checked('yes' , $show_featured); ?>  value="yes" /><?php _e( 'Click show featured items' , 'atom'); ?></label> 
		</p>
        <p>
		<label for="<?php echo esc_attr($this->get_field_id( 'featured_title' )); ?>"><?php _e( 'Featured Title:' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'featured_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'featured_title' )); ?>" type="text" value="<?php echo esc_attr( $featured_title ); ?>" />
		</p>
        <p>
		<label for="<?php echo esc_attr($this->get_field_id( 'show_ids' )); ?>"><?php _e( 'IDs:' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_ids' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_ids' )); ?>" type="text" value="<?php echo esc_attr( $show_ids ); ?>" placeholder="1,2,3" />
		</p>
        <hr />
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_recent' )); ?>"><input id="<?php echo esc_attr($this->get_field_id( 'show_recent' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_recent' )); ?>" type="checkbox" <?php checked('yes' , $show_recent); ?>  value="yes" /><?php _e( 'Click show recent items' , 'atom'); ?></label> 
		</p>
         <p>
		<label for="<?php echo esc_attr($this->get_field_id( 'recent_title' )); ?>"><?php _e( 'Recent Title:' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'recent_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'recent_title' )); ?>" type="text" value="<?php echo esc_attr( $recent_title ); ?>" />
		</p>
		<p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_num' )); ?>"><?php _e( 'Recent Items number' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_num' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_num' )); ?>" value="<?php echo esc_attr( $show_num ); ?>" type="number">
		</p>
        <?php
	}
}

/**
 * Blog Popular Widget
 */
class atomBlogPopularWidget extends WP_Widget {

	function atomBlogPopularWidget() {
		// Instantiate the parent object
		parent::__construct( false, __('ATOM Blog Popular Items','atom'), array( 'description' => __( 'ATOM blog popular items! ', 'atom' )));
	}

	function widget( $args, $instance ) {
		// Widget output
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );
		$show_style = apply_filters('widget_title', $instance['show_style'] );
		$show_num = apply_filters('widget_title', $instance['show_num'] );
		
		echo $before_widget;
		
		if ( $title ) {
		    echo $before_title . $title . $after_title;
		}
		echo '<div class="widget-atom-recent-blog">'.atom_get_blog_recent_post('popular',$show_num, (intval($show_style) + 1)).'</div>';
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['show_style'] = strip_tags($new_instance['show_style']);
		$instance['show_num'] = strip_tags($new_instance['show_num']);
		return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form
		if( isset($instance['title']) ){
			$title = $instance['title'];
		}else{
			$title = __('Popular Items','atom');
		}
		if( isset($instance['show_style']) ){
			$show_style = $instance['show_style'];
		}else{
			$show_style = 0;
		}
		if( isset($instance['show_num']) ){
			$show_num = $instance['show_num'];
		}else{
			$show_num = 5;
		}
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_style' )); ?>"><?php _e( 'Show Style:' , 'atom'); ?></label> 
        <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_style' )); ?>" type="text">
            <option value="0" <?php echo $show_style == 0 ? 'selected="selected"' : ''; ?>><?php _e( 'Icon Style' , 'atom'); ?></option>
            <option value="1" <?php echo $show_style == 1 ? 'selected="selected"' : ''; ?>><?php _e( 'Thumbs Style' , 'atom'); ?></option>
            <option value="2" <?php echo $show_style == 2 ? 'selected="selected"' : ''; ?>><?php _e( 'Big Thumbs Style' , 'atom'); ?></option>
            <option value="3" <?php echo $show_style == 3 ? 'selected="selected"' : ''; ?>><?php _e( 'Icon Style with Like Count' , 'atom'); ?></option>
            <option value="4" <?php echo $show_style == 4 ? 'selected="selected"' : ''; ?>><?php _e( 'Thumbs Style with Like Count' , 'atom'); ?></option>
        </select>
        </p>
       	<p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_num' )); ?>"><?php _e( 'Recent Items number' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_num' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_num' )); ?>" value="<?php echo esc_attr( $show_num ); ?>" type="number">
		</p>
        <?php
	}
}

/**
 * Blog Custom Items Widget
 */
class atomBlogCustomItemsWidget extends WP_Widget {

	function atomBlogCustomItemsWidget() {
		// Instantiate the parent object
		parent::__construct( false, __('ATOM Blog Custom Items','atom'), array( 'description' => __( 'ATOM blog custom show items! ', 'atom' )));
	}

	function widget( $args, $instance ) {
		// Widget output
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );
		$show_style = apply_filters('widget_title', $instance['show_style'] );
		$show_ids = apply_filters('widget_title', $instance['show_ids'] );
		
		$show_num = count(explode(",",$show_ids));
		
		echo $before_widget;
		
		if ( $title ) {
		    echo $before_title . $title . $after_title;
		}
		echo '<div class="widget-atom-recent-blog">'.atom_get_blog_recent_post('featured',$show_num, (intval($show_style) + 1),$show_ids).'</div>';
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['show_style'] = strip_tags($new_instance['show_style']);
		$instance['show_ids'] = strip_tags($new_instance['show_ids']);
		return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form
		if( isset($instance['title']) ){
			$title = $instance['title'];
		}else{
			$title = __('Featured Items','atom');
		}
		if( isset($instance['show_style']) ){
			$show_style = $instance['show_style'];
		}else{
			$show_style = 0;
		}
		if( isset($instance['show_ids']) ){
			$show_ids = $instance['show_ids'];
		}else{
			$show_ids = '';
		}
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        
        <p>
		<label for="<?php echo esc_attr($this->get_field_id( 'show_ids' )); ?>"><?php _e( 'IDs:' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_ids' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_ids' )); ?>" type="text" value="<?php echo esc_attr( $show_ids ); ?>" placeholder="1,2,3" />
		</p>
        
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_style' )); ?>"><?php _e( 'Show Style:' , 'atom'); ?></label> 
        <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_style' )); ?>" type="text">
            <option value="0" <?php echo $show_style == 0 ? 'selected="selected"' : ''; ?>><?php _e( 'Icon Style' , 'atom'); ?></option>
            <option value="1" <?php echo $show_style == 1 ? 'selected="selected"' : ''; ?>><?php _e( 'Thumbs Style' , 'atom'); ?></option>
            <option value="2" <?php echo $show_style == 2 ? 'selected="selected"' : ''; ?>><?php _e( 'Big Thumbs Style' , 'atom'); ?></option>
            <option value="3" <?php echo $show_style == 3 ? 'selected="selected"' : ''; ?>><?php _e( 'Icon Style with Like Count' , 'atom'); ?></option>
            <option value="4" <?php echo $show_style == 4 ? 'selected="selected"' : ''; ?>><?php _e( 'Thumbs Style with Like Count' , 'atom'); ?></option>
        </select>
        </p>
        <?php
	}
}

/**
 * Blog Recent Widget
 */
class atomBlogRecentWidget extends WP_Widget {

	function atomBlogRecentWidget() {
		// Instantiate the parent object
		parent::__construct( false, __('ATOM Blog Recent Items','atom'), array( 'description' => __( 'ATOM blog recent items! ', 'atom' )));
	}

	function widget( $args, $instance ) {
		// Widget output
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );
		$show_style = apply_filters('widget_title', $instance['show_style'] );
		$show_num = apply_filters('widget_title', $instance['show_num'] );
		$show_rand = apply_filters('widget_title', $instance['show_rand'] );
		
		echo $before_widget;
		
		if ( $title ) {
		    echo $before_title . $title . $after_title;
		}
		echo '<div class="widget-atom-recent-blog">'.atom_get_blog_recent_post('recent',$show_num, (intval($show_style) + 1),'',$show_rand).'</div>';
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['show_style'] = strip_tags($new_instance['show_style']);
		$instance['show_num'] = strip_tags($new_instance['show_num']);
		$instance['show_rand'] = strip_tags($new_instance['show_rand']);
		return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form
		if( isset($instance['title']) ){
			$title = $instance['title'];
		}else{
			$title = __('Recent Items','atom');
		}
		if( isset($instance['show_style']) ){
			$show_style = $instance['show_style'];
		}else{
			$show_style = 0;
		}
		if( isset($instance['show_num']) ){
			$show_num = $instance['show_num'];
		}else{
			$show_num = 5;
		}
		if( isset($instance['show_rand']) ){
			$show_rand = $instance['show_rand'];
		}else{
			$show_rand = '';
		}
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_style' )); ?>"><?php _e( 'Show Style:' , 'atom'); ?></label> 
        <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_style' )); ?>" type="text">
            <option value="0" <?php echo $show_style == 0 ? 'selected="selected"' : ''; ?>><?php _e( 'Icon Style' , 'atom'); ?></option>
            <option value="1" <?php echo $show_style == 1 ? 'selected="selected"' : ''; ?>><?php _e( 'Thumbs Style' , 'atom'); ?></option>
            <option value="2" <?php echo $show_style == 2 ? 'selected="selected"' : ''; ?>><?php _e( 'Big Thumbs Style' , 'atom'); ?></option>
            <option value="3" <?php echo $show_style == 3 ? 'selected="selected"' : ''; ?>><?php _e( 'Icon Style with Like Count' , 'atom'); ?></option>
            <option value="4" <?php echo $show_style == 4 ? 'selected="selected"' : ''; ?>><?php _e( 'Thumbs Style with Like Count' , 'atom'); ?></option>
        </select>
        </p>
       	<p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_num' )); ?>"><?php _e( 'Recent Items number' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_num' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_num' )); ?>" value="<?php echo esc_attr( $show_num ); ?>" type="number">
		</p>
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_rand' )); ?>"><input id="<?php echo esc_attr($this->get_field_id( 'show_rand' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_rand' )); ?>" type="checkbox" <?php checked('yes' , $show_rand); ?>  value="yes" /><?php _e( 'Click show random posts' , 'atom'); ?></label> 
		</p>
        <?php
	}
}


/**
 * Portfolio Tabs Items Widget
 */
class atomPortfolioTabsWidget extends WP_Widget {

	function atomPortfolioTabsWidget() {
		// Instantiate the parent object
		parent::__construct( false, __('ATOM Portfolio Tabs Items','atom'), array( 'description' => __( 'ATOM portfolio tabs items for custom ids, recent items! ', 'atom' )));
	}

	function widget( $args, $instance ) {
		// Widget output
		extract( $args );
		
		//$title = apply_filters('widget_title', $instance['title'] );
		$show_style = apply_filters('widget_title', $instance['show_style'] );
		$show_featured = apply_filters('widget_title', $instance['show_featured'] );
		$show_ids = apply_filters('widget_title', $instance['show_ids'] );
		$show_recent = apply_filters('widget_title', $instance['show_recent'] );
		$show_num = apply_filters('widget_title', $instance['show_num'] );
		$featured_title = apply_filters('widget_title', $instance['featured_title'] );
		$recent_title = apply_filters('widget_title', $instance['recent_title'] );
		
		echo $before_widget;
		
		$html = '[tabs]';
		if($show_featured) {
			if($featured_title == ""){
				$featured_title = __('Featured','atom');
			}
			$html .='[tabs_item title="'.$featured_title.'"]'.atom_get_portfolio_recent_post('featured',count(explode(",",$show_ids)),(intval($show_style) + 1),$show_ids).'[/tabs_item] ';
		}
		if($show_recent) {
			if($recent_title == ""){
				$recent_title = __('Recent','atom');
			}
			$html .='[tabs_item title="'.$recent_title.'"]'.atom_get_portfolio_recent_post('recent',$show_num, (intval($show_style) + 1)).'[/tabs_item] ';
		}
		$html .='[/tabs]';
		
		echo do_shortcode($html);
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
		$instance = $old_instance;
		//$instance['title'] = strip_tags($new_instance['title']);
		$instance['show_style'] = strip_tags($new_instance['show_style']);
		// featured show
		$instance['show_featured'] = strip_tags($new_instance['show_featured']);
		$instance['featured_title'] = strip_tags($new_instance['featured_title']);
		$instance['show_ids'] = strip_tags($new_instance['show_ids']);
		// recent show
		$instance['show_recent'] = strip_tags($new_instance['show_recent']);
		$instance['recent_title'] = strip_tags($new_instance['recent_title']);
		$instance['show_num'] = strip_tags($new_instance['show_num']);
		return $instance;
	}

	function form( $instance ) {
		
		if( isset($instance['show_style']) ){
			$show_style = $instance['show_style'];
		}else{
			$show_style = 0;
		}
		if( isset($instance['show_featured']) ){
			$show_featured = $instance['show_featured'];
		}else{
			$show_featured = 'yes';
		}
		if( isset($instance['featured_title']) ){
			$featured_title = $instance['featured_title'];
		}else{
			$featured_title = __('Featured','atom');
		}
		if( isset($instance['show_ids']) ){
			$show_ids = $instance['show_ids'];
		}else{
			$show_ids = '';
		}
		if( isset($instance['show_recent']) ){
			$show_recent = $instance['show_recent'];
		}else{
			$show_recent = 'yes';
		}
		if( isset($instance['recent_title']) ){
			$recent_title = $instance['recent_title'];
		}else{
			$recent_title = __('Recent','atom');
		}
		if( isset($instance['show_num']) ){
			$show_num = $instance['show_num'];
		}else{
			$show_num = 5;
		}
		?>
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_style' )); ?>"><?php _e( 'Show Style:' , 'atom'); ?></label> 
        <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_style' )); ?>" type="text">
            <option value="0" <?php echo $show_style == 0 ? 'selected="selected"' : ''; ?>><?php _e( 'Icon Style' , 'atom'); ?></option>
            <option value="1" <?php echo $show_style == 1 ? 'selected="selected"' : ''; ?>><?php _e( 'Thumbs Style' , 'atom'); ?></option>
            <option value="2" <?php echo $show_style == 2 ? 'selected="selected"' : ''; ?>><?php _e( 'Big Thumbs Style' , 'atom'); ?></option>
            <option value="3" <?php echo $show_style == 3 ? 'selected="selected"' : ''; ?>><?php _e( 'Icon Style with Like Count' , 'atom'); ?></option>
            <option value="4" <?php echo $show_style == 4 ? 'selected="selected"' : ''; ?>><?php _e( 'Thumbs Style with Like Count' , 'atom'); ?></option>
        </select>
        </p>
        <hr />
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_featured' )); ?>"><input id="<?php echo esc_attr($this->get_field_id( 'show_featured' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_featured' )); ?>" type="checkbox" <?php checked('yes' , $show_featured); ?>  value="yes" /><?php _e( 'Click show featured items' , 'atom'); ?></label> 
		</p>
        <p>
		<label for="<?php echo esc_attr($this->get_field_id( 'featured_title' )); ?>"><?php _e( 'Featured Title:' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'featured_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'featured_title' )); ?>" type="text" value="<?php echo esc_attr( $featured_title ); ?>" />
		</p>
        <p>
		<label for="<?php echo esc_attr($this->get_field_id( 'show_ids' )); ?>"><?php _e( 'IDs:' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_ids' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_ids' )); ?>" type="text" value="<?php echo esc_attr( $show_ids ); ?>" placeholder="1,2,3" />
		</p>
        <hr />
         <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_recent' )); ?>"><input id="<?php echo esc_attr($this->get_field_id( 'show_recent' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_recent' )); ?>" type="checkbox" <?php checked('yes' , $show_recent); ?>  value="yes" /><?php _e( 'Click show recent items' , 'atom'); ?></label> 
		</p>
         <p>
		<label for="<?php echo esc_attr($this->get_field_id( 'recent_title' )); ?>"><?php _e( 'Recent Title:' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'recent_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'recent_title' )); ?>" type="text" value="<?php echo esc_attr( $recent_title ); ?>" />
		</p>
		<p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_num' )); ?>"><?php _e( 'Recent Items number' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_num' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_num' )); ?>" value="<?php echo esc_attr( $show_num ); ?>" type="number">
		</p>
        <?php
	}
}


/**
 * Portfolio Custom Items Widget
 */
class atomPortfolioCustomItemsWidget extends WP_Widget {

	function atomPortfolioCustomItemsWidget() {
		// Instantiate the parent object
		parent::__construct( false, __('ATOM Portfolio Custom Items','atom'), array( 'description' => __( 'ATOM portfolio custom show items! ', 'atom' )));
	}

	function widget( $args, $instance ) {
		// Widget output
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );
		$show_style = apply_filters('widget_title', $instance['show_style'] );
		$show_ids = apply_filters('widget_title', $instance['show_ids'] );
		
		$show_num = count(explode(",",$show_ids));
		
		echo $before_widget;
		
		if ( $title ) {
		    echo $before_title . $title . $after_title;
		}
		echo '<div class="widget-atom-recent-portfolios">'.atom_get_portfolio_recent_post('featured',$show_num, (intval($show_style) + 1),$show_ids).'</div>';
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['show_style'] = strip_tags($new_instance['show_style']);
		$instance['show_ids'] = strip_tags($new_instance['show_ids']);
		return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form
		if( isset($instance['title']) ){
			$title = $instance['title'];
		}else{
			$title = __('Featured Items','atom');
		}
		if( isset($instance['show_style']) ){
			$show_style = $instance['show_style'];
		}else{
			$show_style = 0;
		}
		if( isset($instance['show_ids']) ){
			$show_ids = $instance['show_ids'];
		}else{
			$show_ids = '';
		}
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        
        <p>
		<label for="<?php echo esc_attr($this->get_field_id( 'show_ids' )); ?>"><?php _e( 'IDs:' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_ids' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_ids' )); ?>" type="text" value="<?php echo esc_attr( $show_ids ); ?>" placeholder="1,2,3" />
		</p>
        
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_style' )); ?>"><?php _e( 'Show Style:' , 'atom'); ?></label> 
        <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_style' )); ?>" type="text">
            <option value="0" <?php echo $show_style == 0 ? 'selected="selected"' : ''; ?>><?php _e( 'Icon Style' , 'atom'); ?></option>
            <option value="1" <?php echo $show_style == 1 ? 'selected="selected"' : ''; ?>><?php _e( 'Thumbs Style' , 'atom'); ?></option>
            <option value="2" <?php echo $show_style == 2 ? 'selected="selected"' : ''; ?>><?php _e( 'Big Thumbs Style' , 'atom'); ?></option>
            <option value="3" <?php echo $show_style == 3 ? 'selected="selected"' : ''; ?>><?php _e( 'Icon Style with Like Count' , 'atom'); ?></option>
            <option value="4" <?php echo $show_style == 4 ? 'selected="selected"' : ''; ?>><?php _e( 'Thumbs Style with Like Count' , 'atom'); ?></option>
        </select>
        </p>
        <?php
	}
}

/**
 * Portfolio Recent Widget
 */
class atomPortfolioRecentWidget extends WP_Widget {

	function atomPortfolioRecentWidget() {
		// Instantiate the parent object
		parent::__construct( false, __('ATOM Portfolio Recent Items','atom'), array( 'description' => __( 'ATOM portfolio recent items! ', 'atom' )));
	}

	function widget( $args, $instance ) {
		// Widget output
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );
		$show_style = apply_filters('widget_title', $instance['show_style'] );
		$show_num = apply_filters('widget_title', $instance['show_num'] );
		$show_rand = apply_filters('widget_title', $instance['show_rand'] );
		
		echo $before_widget;
		
		if ( $title ) {
		    echo $before_title . $title . $after_title;
		}
		echo '<div class="widget-atom-recent-portfolios">'.atom_get_portfolio_recent_post('recent',$show_num, (intval($show_style) + 1),'',$show_rand).'</div>';
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['show_style'] = strip_tags($new_instance['show_style']);
		$instance['show_num'] = strip_tags($new_instance['show_num']);
		$instance['show_rand'] = strip_tags($new_instance['show_rand']);
		return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form
		if( isset($instance['title']) ){
			$title = $instance['title'];
		}else{
			$title = __('Recent Items','atom');
		}
		if( isset($instance['show_style']) ){
			$show_style = $instance['show_style'];
		}else{
			$show_style = 0;
		}
		if( isset($instance['show_num']) ){
			$show_num = $instance['show_num'];
		}else{
			$show_num = 5;
		}
		if( isset($instance['show_rand']) ){
			$show_rand = $instance['show_rand'];
		}else{
			$show_rand = '';
		}
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_style' )); ?>"><?php _e( 'Show Style:' , 'atom'); ?></label> 
        <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_style' )); ?>" type="text">
            <option value="0" <?php echo $show_style == 0 ? 'selected="selected"' : ''; ?>><?php _e( 'Icon Style' , 'atom'); ?></option>
            <option value="1" <?php echo $show_style == 1 ? 'selected="selected"' : ''; ?>><?php _e( 'Thumbs Style' , 'atom'); ?></option>
            <option value="2" <?php echo $show_style == 2 ? 'selected="selected"' : ''; ?>><?php _e( 'Big Thumbs Style' , 'atom'); ?></option>
            <option value="3" <?php echo $show_style == 3 ? 'selected="selected"' : ''; ?>><?php _e( 'Icon Style with Like Count' , 'atom'); ?></option>
            <option value="4" <?php echo $show_style == 4 ? 'selected="selected"' : ''; ?>><?php _e( 'Thumbs Style with Like Count' , 'atom'); ?></option>
        </select>
        </p>
       	<p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_num' )); ?>"><?php _e( 'Recent Items number' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_num' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_num' )); ?>" value="<?php echo esc_attr( $show_num ); ?>" type="number">
		</p>
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_rand' )); ?>"><input id="<?php echo esc_attr($this->get_field_id( 'show_rand' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_rand' )); ?>" type="checkbox" <?php checked('yes' , $show_rand); ?>  value="yes" /><?php _e( 'Click show random posts' , 'atom'); ?></label> 
		</p>
        <?php
	}
}

/**
 * Portfolio Category Widget
 */
class atomPortfolioCategoryWidget extends WP_Widget {

	function atomPortfolioCategoryWidget() {
		// Instantiate the parent object
		parent::__construct( false, __('ATOM Portfolio Category','atom'), array( 'description' => __( 'ATOM portfolio categories! ', 'atom' )));
	}

	function widget( $args, $instance ) {
		// Widget output
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );
		$show_count = apply_filters('widget_title', $instance['show_count'] );
		
		echo $before_widget;
		
		if ( $title ) {
		    echo $before_title . $title . $after_title;
		}
		echo atom_get_portfolio_categories($show_count == "yes");
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['show_count'] = strip_tags($new_instance['show_count']);
		return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form
		if( isset($instance['title']) ){
			$title = $instance['title'];
		}else{
			$title = __('Categories','atom');
		}
		if( isset($instance['show_count']) ){
			$show_count = $instance['show_count'];
		}else{
			$show_count = '';
		}
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
       <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_count' )); ?>"><input id="<?php echo esc_attr($this->get_field_id( 'show_count' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_count' )); ?>" type="checkbox" <?php checked('yes' , $show_count); ?>  value="yes" /><?php _e( 'Click show category item number' , 'atom'); ?></label> 
		</p>
        <?php
	}
}

class atomBackgiWidget extends WP_Widget {

	function atomBackgiWidget() {
		// Instantiate the parent object
		parent::__construct( false, __('ATOM Backgi','atom'), array( 'description' => __( 'ATOM backgi recent items! ', 'atom' )));
	}

	function widget( $args, $instance ) {
		// Widget output
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );
		$show_style = apply_filters('widget_title', $instance['show_style'] );
		$show_num = apply_filters('widget_title', $instance['show_num'] );
		$show_rand = apply_filters('widget_title', $instance['show_rand'] );
		
		echo $before_widget;
		
		if ( $title ) {
		    echo $before_title . $title . $after_title;
		}
		echo '<div class="widget-atom-recent-portfolios">'.atom_get_portfolio_recent_post('recent',$show_num, (intval($show_style) + 1),'',$show_rand).'</div>';
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['show_style'] = strip_tags($new_instance['show_style']);
		$instance['show_num'] = strip_tags($new_instance['show_num']);
		$instance['show_rand'] = strip_tags($new_instance['show_rand']);
		return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form
		if( isset($instance['title']) ){
			$title = $instance['title'];
		}else{
			$title = __('Recent Items','atom');
		}
		if( isset($instance['show_style']) ){
			$show_style = $instance['show_style'];
		}else{
			$show_style = 0;
		}
		if( isset($instance['show_num']) ){
			$show_num = $instance['show_num'];
		}else{
			$show_num = 5;
		}
		if( isset($instance['show_rand']) ){
			$show_rand = $instance['show_rand'];
		}else{
			$show_rand = '';
		}
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_style' )); ?>"><?php _e( 'Show Style:' , 'atom'); ?></label> 
        <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_style' )); ?>" type="text">
            <option value="0" <?php echo $show_style == 0 ? 'selected="selected"' : ''; ?>><?php _e( 'Icon Style' , 'atom'); ?></option>
            <option value="1" <?php echo $show_style == 1 ? 'selected="selected"' : ''; ?>><?php _e( 'Thumbs Style' , 'atom'); ?></option>
            <option value="2" <?php echo $show_style == 2 ? 'selected="selected"' : ''; ?>><?php _e( 'Big Thumbs Style' , 'atom'); ?></option>
            <option value="3" <?php echo $show_style == 3 ? 'selected="selected"' : ''; ?>><?php _e( 'Icon Style with Like Count' , 'atom'); ?></option>
            <option value="4" <?php echo $show_style == 4 ? 'selected="selected"' : ''; ?>><?php _e( 'Thumbs Style with Like Count' , 'atom'); ?></option>
        </select>
        </p>
       	<p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_num' )); ?>"><?php _e( 'Recent Items number' , 'atom'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_num' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_num' )); ?>" value="<?php echo esc_attr( $show_num ); ?>" type="number">
		</p>
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_rand' )); ?>"><input id="<?php echo esc_attr($this->get_field_id( 'show_rand' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_rand' )); ?>" type="checkbox" <?php checked('yes' , $show_rand); ?>  value="yes" /><?php _e( 'Click show random posts' , 'atom'); ?></label> 
		</p>
        <?php
	}
}

// Creating the widget 
class wpb_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'wpb_widget', 

// Widget name will appear in UI
__('WPBeginner Widget', 'wpb_widget_domain'), 

// Widget description
array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
echo __( "<div class='banner' style='margin-top: 0px;'>
				<div class='fixed-image' style='background-image:url('images/portfolio-item-banner.jpg');'></div>
			</div>" );
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

