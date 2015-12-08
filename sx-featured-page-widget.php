<?php
/*
Plugin Name: SX Featured Page Widget
Plugin URI: http://github.com/eduardozulian/sx-featured-page-widget
Description: Feature a page and display its contents.
Version: 1.0
Author: Sabri El Gueder
Author URI: http://www.sabri-elgueder.tn
License: GPL2

Copyright 2015 Sabri El Gueder
*/

/**
 * Register the widget
 */
function sxwp_register_widget() {
	register_widget( 'SX_Featured_Page_Widget' );
}

add_action( 'widgets_init', 'sxwp_register_widget' );

/**
 * A Featured Page Widget
 * Feature a page, showing its excerpt and thumbnail.
 *
 */
class SX_Featured_Page_Widget extends WP_Widget {

	/**
	 * Sets up a new widget instance.
	 *
	 * @access public
	 */
	public function __construct() {
		parent::__construct(
	 		'SX_Featured_page_widget',
			__( 'SX Featured Page Widget', 'sx-featured-page-widget' ),
			array( 'description' => __( 'Feature a page and display its contents.', 'sx-featured-page-widget' ) )
		);
	}

	/**
	 * Outputs the content for a new widget instance.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args 		Widget arguments.
	 * @param array $instance 	Saved values from database.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		if ( isset( $instance['page'] ) && $instance['page'] != -1 ) {

			$page_id = (int) $instance['page'];

			$p = new WP_Query( array( 'page_id' => $page_id ) );

			if ( $p->have_posts() ) {
				$p->the_post();

				$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? get_the_title() : $instance['title'], $instance, $this->id_base );

				echo $before_widget;
				echo $before_title;
				echo $title;
				echo $after_title;
				?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php the_content(); ?>
				</div>

				<?php
				echo $after_widget;

				wp_reset_postdata();
			}
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['page'] = (int)( $new_instance['page'] );
		return $instance;
	}

	function form( $instance ) {
		$title = isset( $instance['title'] ) ? strip_tags( $instance['title'] ) : '';
		$page = isset( $instance['page'] ) ? (int) $instance['page'] : 0;
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'sx-featured-page-widget' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'page' ); ?>"><?php _e( 'Page:', 'sx-featured-page-widget' ); ?></label>

			<?php
			/**
			 *  Mimics wp_dropdown_pages() funcionality to add a 'widefat' class to the <select> tag
			 */
			$args = array(
	            'depth' 				=> 0,
	            'child_of' 				=> 0,
	            'selected' 				=> $page,
	            'name' 					=> $this->get_field_name( 'page' ),
	            'id' 					=> $this->get_field_id( 'page' ),
	            'show_option_none' 		=> '',
	            'show_option_no_change' => '',
	            'option_none_value' 	=> ''
	        );

	        extract( $args, EXTR_SKIP );
	        $pages = get_pages( $args );

	        if ( ! empty( $pages ) ) : ?>
	            <select class="widefat" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $id ); ?>">
	            	<option value="-1"><?php _e( 'Select a page', 'sx-featured-page-widget' ); ?></option>
	            	<?php echo walk_page_dropdown_tree( $pages, $depth, $args ) ?>;
	            </select>
	        <?php
	        endif;
	        ?>
        </p>
	<?php
	}
}
?>