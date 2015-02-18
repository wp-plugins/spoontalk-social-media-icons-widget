<?php

// Creating the widget
	class wpb_widget extends WP_Widget {
	 
	function __construct() {
		parent::__construct(
			'spoontalk-sociamedia-icons-widget', //  Base ID through this widget is identify 
			'Spoontalk Social Icons', // Widget Name
			array(
				'classname' => 'spoontalk-sociamedia-icons-widget',
				'description' => 'Displays a list of social media website icons and a link to your profile.',
			),
			array(
				'width' => 600,
			)
		);
		
	 }
	
	
	public function widget( $args, $instance ) {
	$title = apply_filters( 'widget_title', $instance['title'] );
	
	//get media url
	
	$Facebook =get_option('Facebook');
	$Linkedin = get_option('Linkedin');
	$Twitter = get_option('Twitter');
	$GooglePlus = get_option('GooglePlus');
	$spoontalk_social_style_settings = get_option ('spoontalk_social_style_settings');
	
	$size = $spoontalk_social_style_settings['size'];
	$alignment = $spoontalk_social_style_settings['align'];
	$spacing=$spoontalk_social_style_settings['spacing'];
	
	echo $args['before_widget']; ?>

	<?php 
	if ( ! empty( $title ) )
	echo $args['before_title'] . $title . $args['after_title'];
	?>
<div class="alignment">
	<?php if(!empty($Facebook)) { ?>
    <a  href="<?php echo $Facebook ?>" target="_blank"  style="margin-left:<?php echo $spacing?>px"><i   class="fa fa-facebook fb-spoontalk-social spoontalk-social"></i></a>
    <?php  
	}
	
	if(!empty($Linkedin)) { ?>
	<a   href="<?php echo $Linkedin ?>" target="_blank" style="margin-left:<?php echo $spacing?>px"><i   class="fa fa-linkedin linkedin-spoontalk-social spoontalk-social "></i></a>
	<?php  
	}
    
	if(!empty($Twitter)) { ?>
	
	<a href="<?php echo $Twitter ?>" target="_blank" style="margin-left:<?php echo $spacing?>px"><i  class="fa fa-twitter tw-spoontalk-social spoontalk-social "></i></a>
	<?php  
	}
	
	if(!empty($GooglePlus)) { ?>
	
	<a href="<?php echo $GooglePlus ?>" target="_blank" style="margin-left:<?php echo $spacing?>px"><i class="fa fa-google-plus g-plus-spoontalk-social spoontalk-social "></i></a>
	<?php  } ?>
</div>
	<?php 
	echo $args['after_widget'];
	}
	         
	// Widget Backend
	public function form( $instance ) {
	if ( isset( $instance[ 'title' ])){
	
	$title = $instance[ 'title' ];

	}
	else {
	$title = __( 'New title', '' );
	}

	// Widget admin form
	?>
	
	
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php if($title) echo esc_attr( $title ); else _e( 'title here', '' );?>" />
	</p>
	
<?php
    }
	     
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
	
	$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		
		return $instance;
	}
	} 
	 
	// Register and load the widget
	function wpb_load_widget() {
	    register_widget( 'wpb_widget' );
	} 
	add_action( 'widgets_init', 'wpb_load_widget' );
?>