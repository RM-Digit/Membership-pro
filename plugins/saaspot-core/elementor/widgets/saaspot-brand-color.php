<?php
/*
 * Elementor SaaSpot Brand Color Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Brand_Color extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_brand_color';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Brand Color', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-paint-brush';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Brand Color widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_brand_color'];
	}
	*/
	
	/**
	 * Register SaaSpot Brand Color widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_brand_color',
			[
				'label' => __( 'Brand Color', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-color' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'brand_color_title',
			[
				'label' => esc_html__( 'Color Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Royal Blue', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);		
		$this->add_control(
			'copy_text',
			[
				'label' => esc_html__( 'Copy Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();// end: Section

		// Style
		// Title
		$this->start_controls_section(
			'brand_section_title_style',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Typography', 'saaspot-core' ),
					'name' => 'brand_title_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .saspot-brand-color h3',
				]
			);
			$this->add_control(
				'brand_title_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-brand-color h3' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section

		// Content		
		$this->start_controls_section(
			'brand_section_content_style',
			[
				'label' => esc_html__( 'Code', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Typography', 'saaspot-core' ),
					'name' => 'brand_content_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .saspot-brand-color span',
				]
			);
			$this->add_control(
				'brand_content_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-brand-color span' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render App Works widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$brand_color_title = !empty( $settings['brand_color_title'] ) ? $settings['brand_color_title'] : [];
		$bg_color = !empty( $settings['bg_color'] ) ? $settings['bg_color'] : [];
		$copy_text = !empty( $settings['copy_text'] ) ? $settings['copy_text'] : [];

		$copy_text = $copy_text ? $copy_text : 'Click to copy.';
		$title = $brand_color_title ? '<h3>'.$brand_color_title.'</h3>' : '';
		$color = $bg_color ? '<span>'.$bg_color.'</span>' : '';

		$output = '<div class="saspot-brand-color">
	              <div class="saspot-color"><div class="copy-text">'.$copy_text.'</div></div>
	              '.$title.$color.'
	            </div>';
		echo $output;
		
	}

	/**
	 * Render Brand Color widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Brand_Color() );