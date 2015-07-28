<?php

class Admission_Footer_Snippets_Widget extends WP_Widget {

	/**
	 * Register the widget officially through the parent class.
	 */
	public function __construct() {
		parent::__construct( 'admission_footer_snippets_widget', 'Footer Snippets', array( 'description' => '' ) );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$default_instance = array(
			'action_id' => 'visit',
			'action_text' => 'visit',
			'snippet_id' => '1',
		);
		$instance = shortcode_atts( $default_instance, $instance );
		?><dl id="<?php echo esc_attr( $instance['action_id'] ); ?>" class="action-item">
			<dt><button><?php echo esc_html( $instance['action_text'] ); ?></button></dt>
			<dd><?php echo do_shortcode('[html_snippet snippet_id="' . $instance['snippet_id'] . '"]') ?></dd>
		</dl>
		<?php
	}

	/**
	 * Display the form used to update the widget.
	 *
	 * @param array $instance The instance of the current widget form being displayed.
	 *
	 * @return void
	 */
	public function form( $instance ) {
		$action_id = ! empty( $instance['action_id'] ) ? $instance['action_id'] : '';
		$action_text = ! empty( $instance['action_text'] ) ? $instance['action_text'] : '';
		$snippet_id = ! empty( $instance['snippet_id'] ) ? $instance['snippet_id'] : '';

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'action_id' ); ?>">Action ID</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'action_id' ); ?>" name="<?php echo $this->get_field_name( 'action_id' ); ?>" type="text" value="<?php echo esc_attr( $action_id ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'action_text' ); ?>">Action Text</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'action_text' ); ?>" name="<?php echo $this->get_field_name( 'action_text' ); ?>" type="text" value="<?php echo esc_attr( $action_text ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'snippet_id' ); ?>">HTML Snippet ID</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'snippet_id' ); ?>" name="<?php echo $this->get_field_name( 'snippet_id' ); ?>" type="text" value="<?php echo esc_attr( $snippet_id ); ?>" />
		</p>
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new instance of the widget being saved.
	 * @param array $old_instance Previous instance of the current widget.
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['action_id'] = ( ! empty( $new_instance['action_id'] ) ) ? sanitize_key( $new_instance['action_id'] ) : '';
		$instance['action_text'] = ( ! empty( $new_instance['action_text'] ) ) ? sanitize_text_field( $new_instance['action_text'] ) : '';
		$instance['snippet_id'] = ( ! empty( $new_instance['snippet_id'] ) ) ? sanitize_key( $new_instance['snippet_id'] ) : '';

		return $instance;
	}
}