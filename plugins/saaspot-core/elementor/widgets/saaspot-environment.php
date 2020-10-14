<?php
/*
 * Elementor SaaSpot Environment Gallery Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Environment extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_environment';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Environment Gallery', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-object-group';
	}

	/**
	 * Retrieve the environment of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the environment of scripts the SaaSpot Environment widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_environment'];
	}
	*/
	
	/**
	 * Register SaaSpot Environment widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_environment',
			[
				'label' => esc_html__( 'Gallery Options', 'saaspot-core' ),
			]
		);
		
		$repeater = new Repeater();

		$repeater->add_control(
			'environment_title',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Gallery', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'environment_image',
			[
				'label' => esc_html__( 'Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],				
			]
		);
		$repeater->add_control(
			'col_style',
			[
				'label' => esc_html__( 'Custom Width', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'custom-width-1' => esc_html__( 'Custom Width 1', 'saaspot-core' ),
					'custom-width-2' => esc_html__( 'Custom Width 2', 'saaspot-core' ),
					'custom-width-3' => esc_html__( 'Custom Width 3', 'saaspot-core' ),
					'custom-width-4' => esc_html__( 'Custom Width 4', 'saaspot-core' ),
					'custom-width-5' => esc_html__( 'Custom Width 5', 'saaspot-core' ),
				],
				'default' => 'custom-width-1',
				'description' => esc_html__( 'Select your column style.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'environmentItems_groups',
			[
				'label' => esc_html__( 'Gallery Item', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'environment_title' => esc_html__( 'Gallery', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ environment_title }}}',
			]
		);
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Environment widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$environmentItems_groups = !empty( $settings['environmentItems_groups'] ) ? $settings['environmentItems_groups'] : [];
		
	  $output = '<div class="environment-wrap"><div class="saspot-masonry" data-space="10">';

		// Group Param Output
		if( is_array( $environmentItems_groups ) && !empty( $environmentItems_groups ) ){
		  foreach ( $environmentItems_groups as $each_environment ) {
				$environment_title = $each_environment['environment_title'] ? $each_environment['environment_title'] : '';
				$image_url = wp_get_attachment_url( $each_environment['environment_image']['id'] );
				$image = $image_url ? '<a href="'. $image_url .'"><img src="'. $image_url .'" alt="'.esc_attr($environment_title).'"></a>' : '';

			  $output .= '<div class="masonry-item '.$each_environment['col_style'].'">
					            <div class="environment-item">
					              <div class="saspot-image saspot-popup">'.$image.'</div>
					            </div>
					          </div>';
		  }
		}

		$output .= '</div></div>';

		echo $output;
		
	}

	/**
	 * Render Environment widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Environment() );