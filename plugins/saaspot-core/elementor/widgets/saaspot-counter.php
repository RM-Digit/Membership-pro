<?php
/*
 * Elementor SaaSpot Counter Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Counter extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_counter';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Counter', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-sort-numeric-asc';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Counter widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['vt-saaspot_counter'];
	}
	
	/**
	 * Register SaaSpot Counter widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_counter',
			[
				'label' => esc_html__( 'Counter Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'counter_title',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Default title', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your counter title here', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'counter_value',
			[
				'label' => esc_html__( 'Value', 'saaspot-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'step' => 1,
				'default' => 100,
				'description' => esc_html__( 'Type your counter value here', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'counter_value_in',
			[
				'label' => esc_html__( 'Value In', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '+', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your counter value here', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'need_border',
			[
				'label' => esc_html__( 'Need Border', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Border Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'need_border' => 'true',
				],
				'frontend_available' => true,
				'selectors' => [
					'{{WRAPPER}} .stats-item:after' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'counter_title!' => '',
				],
				'frontend_available' => true,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sascou_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} p',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} p' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_value_style',
			[
				'label' => esc_html__( 'Value', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'counter_value!' => '',
				],
				'frontend_available' => true,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'value_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} h3.stats-title span.saspot-counter',
			]
		);
		$this->add_control(
			'value_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h3.stats-title span.saspot-counter' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_value_in_style',
			[
				'label' => esc_html__( 'Value In', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'counter_value_in!' => '',
				],
				'frontend_available' => true,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'value_in_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} h3.stats-title',
			]
		);
		$this->add_control(
			'value_in_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h3.stats-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
				
	}

	/**
	 * Render Counter widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$counter_title = !empty( $settings['counter_title'] ) ? $settings['counter_title'] : '';
		$counter_value = !empty( $settings['counter_value'] ) ? $settings['counter_value'] : '';
		$counter_value_in = !empty( $settings['counter_value_in'] ) ? $settings['counter_value_in'] : '';
		$need_border  = ( isset( $settings['need_border'] ) && ( 'true' == $settings['need_border'] ) ) ? true : false;
		
		// Counter Title
		$counter_title = $counter_title ? '<p>'. $counter_title .'</p>' : '';

		if($need_border) {
		  $border_cls = ' need-border';
		} else {
		  $border_cls = '';
		}

		// Value
		$counter_value = $counter_value ? '<h3 class="stats-title"><span class="saspot-counter">'.$counter_value.'</span>'.$counter_value_in.'</h3>' : '';

		// Counters
		$output = '<div class="stats-item'.$border_cls.'">'.$counter_value.''. $counter_title .'</div>';

		// Output
		echo $output;
		
	}

	/**
	 * Render Counter widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	 
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Counter() );