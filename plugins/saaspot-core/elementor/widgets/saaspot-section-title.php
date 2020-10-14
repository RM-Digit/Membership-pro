<?php
/*
 * Elementor SaaSpot Section Title Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Section_Title extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_section_title';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Section Title', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-header';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Section Title widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_section_title'];
	}
	*/
	
	/**
	 * Register SaaSpot Section Title widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_sect_setting',
			[
				'label' => esc_html__( 'Settings', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'title_style',
			[
				'label' => esc_html__( 'Title Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One (Normal)', 'saaspot-core' ),
					'style-two' => esc_html__( 'Style Two (Counter)', 'saaspot-core' ),
				],
				'default' => 'style-one',
				'description' => esc_html__( 'Select your title style.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'counter_before',
			[
				'label' => esc_html__( 'Counter Before Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Title', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your counter before text here', 'saaspot-core' ),
				'condition' => [
					'title_style' => array('style-two'),
				],
			]
		);
		$this->add_control(
			'counter_val',
			[
				'label' => esc_html__( 'Counter Value', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '80,000', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your counter value here', 'saaspot-core' ),
				'condition' => [
					'title_style' => array('style-two'),
				],
			]
		);
		$this->add_control(
			'counter_text',
			[
				'label' => esc_html__( 'Counter Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Title', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your counter text here', 'saaspot-core' ),
				'condition' => [
					'title_style' => array('style-two'),
				],
			]
		);
		$this->add_control(
			'counter_after',
			[
				'label' => esc_html__( 'Counter After Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Title', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your counter after text here', 'saaspot-core' ),
				'condition' => [
					'title_style' => array('style-two'),
				],
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Section Title', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'saaspot-core' ),
				'condition' => [
					'title_style' => array('style-one'),
				],
			]
		);
		$this->add_control(
			'section_subtitle',
			[
				'label' => esc_html__( 'Sub Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type your sub title here', 'saaspot-core' ),
				'condition' => [
					'title_style' => array('style-one'),
				],
			]
		);
		$this->add_control(
			'subtitle_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'condition' => [
					'title_style' => array('style-one'),
				],
			]
		);
		$this->add_control(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'This is Content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content text here', 'saaspot-core' ),
			]
		);
		$this->add_responsive_control(
			'section_align',
			[
				'label' => esc_html__( 'Alignment', 'saaspot-core' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'saaspot-core' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'saaspot-core' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'saaspot-core' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'section_max_width',
			[
				'label' => esc_html__( 'Width', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 2,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'section_margin',
			[
				'label' => __( 'Margin', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassect_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .section-title-wrap .section-title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap .section-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_bottom_space',
			[
				'label' => esc_html__( 'Bottom space', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 2,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap .section-title' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_subtitle_style',
			[
				'label' => esc_html__( 'Sub Title', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassect_subtitle_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .section-title-wrap .section-subtitle',
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap .section-subtitle' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .section-title-wrap p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'content_bottom_space',
			[
				'label' => esc_html__( 'Bottom space', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 2,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Section Title widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$title_style = !empty( $settings['title_style'] ) ? $settings['title_style'] : '';

		$counter_before = !empty( $settings['counter_before'] ) ? $settings['counter_before'] : '';
		$counter_val = !empty( $settings['counter_val'] ) ? $settings['counter_val'] : '';
		$counter_text = !empty( $settings['counter_text'] ) ? $settings['counter_text'] : '';
		$counter_after = !empty( $settings['counter_after'] ) ? $settings['counter_after'] : '';

		$section_title = !empty( $settings['section_title'] ) ? $settings['section_title'] : '';
		$section_subtitle = !empty( $settings['section_subtitle'] ) ? $settings['section_subtitle'] : '';
		$subtitle_icon = !empty( $settings['subtitle_icon'] ) ? $settings['subtitle_icon'] : '';
		$section_content = !empty( $settings['section_content'] ) ? $settings['section_content'] : '';
		$section_align = !empty( $settings['section_align'] ) ? $settings['section_align'] : '';

		if ($title_style === 'style-two') {
			$sec_title = $counter_val ? '<h2 class="section-title">'.$counter_before.'<span><span class="saspot-counter">'.$counter_val.'</span>'.$counter_text.'</span>'.$counter_after.'</h2>' : '';
		} else {
			$sec_title = $section_title ? '<h2 class="section-title">'.$section_title.'</h2>' : '';
		}

		$icon = $subtitle_icon ? '<i class="'.$subtitle_icon.'" aria-hidden="true"></i>' : '';
		$sec_subtitle = $section_subtitle ? '<h6 class="section-subtitle">'.$icon.$section_subtitle.'</h6>' : '';
		$sec_content = $section_content ? '<p>'.$section_content.'</p>' : '';

		$output = '';
		$output .= '<div class="section-title-wrap">'.$sec_subtitle.$sec_title.$sec_content.'</div>';

		echo $output;
		
	}

	/**
	 * Render Section Title widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Section_Title() );