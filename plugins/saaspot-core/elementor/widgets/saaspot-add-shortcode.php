<?php
/*
 * Elementor SaaSpot Add Shortcode Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_AddShortcode extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_add_shortcode';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Add Shortcode', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-plus-circle';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Add Shortcode widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_add_shortcode'];
	}
	*/
	
	/**
	 * Register SaaSpot Add Shortcode widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_scode_setting',
			[
				'label' => esc_html__( 'Shortcode Settings', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'add_shortcode',
			[
				'label' => esc_html__( 'Add Shortcode', 'saaspot-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'placeholder' => esc_html__( 'Add your shortcode here', 'saaspot-core' ),
			]
		);
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Add Shortcode widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$add_shortcode = !empty( $settings['add_shortcode'] ) ? $settings['add_shortcode'] : '';

		$output = '<div class="saaspot-shortcode">'.do_shortcode($add_shortcode).'</div>';

		echo $output;
		
	}

	/**
	 * Render Add Shortcode widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_AddShortcode() );