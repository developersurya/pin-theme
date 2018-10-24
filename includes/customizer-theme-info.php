<?php
/**
 * Theme Info
 *
 * @package sampresion-lite
 * @since version 2.1
 */

if ( ! function_exists( 'sampression_add_info_customizer' ) ) {
	/**
	 * Add Info about theme in customizer.
	 * @param $wp_customize
	 */
	function sampression_add_info_customizer( $wp_customize ) {

		/**
		 * Theme important links class.
		 */
		class Sampression_Important_Links extends WP_Customize_Control {
			/**
			 *  Add Theme instruction, Support Forum, Demo Link, Rating Link.
			 */
			public function render_content() {

				$important_links = array(
					'theme-info'    => array(
						'link' => esc_url( 'https://www.sampression.com/themes/sampression-lite/' ),
						'text' => esc_html__( 'Theme Info', 'sampression' ),
					),
					'support'       => array(
						'link' => esc_url( 'https://www.sampression.com/support/' ),
						'text' => esc_html__( 'Support', 'sampression' ),
					),
					'documentation' => array(
						'link' => esc_url( 'https://www.sampression.com/documentation-sampression-lite/' ),
						'text' => esc_html__( 'Documentation', 'sampression' ),
					),
					'demo'          => array(
						'link' => esc_url( 'https://www.demo.sampression.com/sampression-lite/' ),
						'text' => esc_html__( 'Live Theme Demo', 'sampression' ),
					),
					'demo'          => array(
						'link' => esc_url( 'https://www.sampression.com/forums/' ),
						'text' => esc_html__( 'Community Forum', 'sampression' ),
					),
				);

				foreach ( $important_links as $important_link ) {
					echo '<p class="btn-wrap"><a target="_blank" href="' . esc_url( $important_link['link'] ) . '" >' . esc_attr( $important_link['text'] ) . ' </a></p>';
				}
			}
		}

		$wp_customize->add_section( 'sampression_important_links', array(
			'priority' => 1,
			'title'    => __( 'Sampression Important Links', 'sampression' ),
		) );

		$wp_customize->add_setting( 'sampression_theme_settings[sampression_important_links]', array(
			'capability'        => 'manage_options',
			'type'              => 'option',
			'sanitize_callback' => 'sampression_links_sanitize',
		) );

		$wp_customize->add_control( new sampression_Important_Links( $wp_customize, 'sampression_theme_settings[sampression_important_links]', array(
			'label'    => __( 'Important Links', 'sampression' ),
			'section'  => 'sampression_important_links',
			'settings' => 'sampression_theme_settings[sampression_important_links]',
		) ) );

	}
}

add_action( 'customize_register', 'sampression_add_info_customizer' );

