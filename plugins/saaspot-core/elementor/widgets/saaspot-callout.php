<?php
/*
 * Elementor SaaSpot Callout Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Callout extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_callout';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Callout', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-bullhorn';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Callout widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_callout'];
	}
	*/

	/**
	 * Register SaaSpot Callout widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){

		$this->start_controls_section(
			'section_Callout',
			[
				'label' => esc_html__( 'Callout Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'callout_subtitle',
			[
				'label' => esc_html__( 'Sub Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Sub Title', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type subtitle text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'callout_title',
			[
				'label' => esc_html__( 'Title Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'callout_content',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'default' => esc_html__( 'your content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);

		$this->add_control(
			'section_alignment',
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
					'{{WRAPPER}} .callout-wrap, {{WRAPPER}} .section-title-wrap' => 'text-align: {{VALUE}};',
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

		// Button One
		$this->start_controls_section(
			'section_steps_btn',
			[
				'label' => esc_html__( 'Button One Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'btn_style',
			[
				'label' => esc_html__( 'Button Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One (Button)', 'saaspot-core' ),
					'style-two' => esc_html__( 'Style Two (Link)', 'saaspot-core' ),
					'style-three' => esc_html__( 'Style Three (Image)', 'saaspot-core' ),
					'style-four' => esc_html__( 'Style Four (Video)', 'saaspot-core' ),
				],
				'default' => 'style-one',
				'description' => esc_html__( 'Select your Button style.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'btn_text_before',
			[
				'label' => esc_html__( 'Link Before Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Link Before Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type text here', 'saaspot-core' ),
				'label_block' => true,
				'condition' => [
					'btn_style' => array('style-two'),
				],
			]
		);
		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Button/Link Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Button Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type btn text here', 'saaspot-core' ),
				'label_block' => true,
				'condition' => [
					'btn_style' => array('style-one','style-two','style-four'),
				],
			]
		);
		$this->add_control(
			'btn_image',
			[
				'label' => esc_html__( 'Upload Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'btn_style' => 'style-three',
				],
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your icon image.', 'saaspot-core'),
			]
		);
		$this->add_control(
			'video_link',
			[
				'label' => esc_html__( 'Video Link', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'This is video link', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Enter your link here', 'saaspot-core' ),
				'condition' => [
					'btn_style' => 'style-four',
				],
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' => esc_html__( 'Button Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
				'condition' => [
					'btn_style!' => 'style-four',
				],
			]
		);
		$this->add_control(
			'btn_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-angle-right',
				'condition' => [
					'btn_style' => array('style-one','style-four','style-four'),
				],
			]
		);
		$this->add_control(
			'icon_alignment',
			[
				'label' => esc_html__( 'Alignment', 'saaspot-core' ),
				'type' => Controls_Manager::CHOOSE,
				'condition' => [
					'btn_style' => array('style-one','style-two','style-four'),
				],
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'saaspot-core' ),
						'icon' => 'fa fa-align-left',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'saaspot-core' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'right',
			]
		);
		$this->end_controls_section();// end: Section

		// Button Two
		$this->start_controls_section(
			'section_steps_btn_two',
			[
				'label' => esc_html__( 'Button Two Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'btn_two_style',
			[
				'label' => esc_html__( 'Button Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One (Button)', 'saaspot-core' ),
					'style-two' => esc_html__( 'Style Two (Link)', 'saaspot-core' ),
					'style-three' => esc_html__( 'Style Three (Image)', 'saaspot-core' ),
					'style-four' => esc_html__( 'Style Four (Video)', 'saaspot-core' ),
				],
				'default' => 'style-one',
				'description' => esc_html__( 'Select your Button style.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'btn_two_text_before',
			[
				'label' => esc_html__( 'Link Before Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Link Before Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type text here', 'saaspot-core' ),
				'label_block' => true,
				'condition' => [
					'btn_two_style' => array('style-two'),
				],
			]
		);
		$this->add_control(
			'btn_two_text',
			[
				'label' => esc_html__( 'Button/Link Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Button Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type btn_two text here', 'saaspot-core' ),
				'label_block' => true,
				'condition' => [
					'btn_two_style' => array('style-one','style-two','style-four'),
				],
			]
		);
		$this->add_control(
			'btn_two_image',
			[
				'label' => esc_html__( 'Upload Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'btn_two_style' => 'style-three',
				],
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your icon image.', 'saaspot-core'),
			]
		);
		$this->add_control(
			'video_two_link',
			[
				'label' => esc_html__( 'Video Link', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'This is video link', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Enter your link here', 'saaspot-core' ),
				'condition' => [
					'btn_two_style' => 'style-four',
				],
			]
		);
		$this->add_control(
			'btn_two_link',
			[
				'label' => esc_html__( 'Button Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
				'condition' => [
					'btn_two_style!' => 'style-four',
				],
			]
		);
		$this->add_control(
			'btn_two_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-angle-right',
				'condition' => [
					'btn_two_style' => array('style-one','style-two','style-four'),
				],
			]
		);
		$this->add_control(
			'icon_two_alignment',
			[
				'label' => esc_html__( 'Alignment', 'saaspot-core' ),
				'type' => Controls_Manager::CHOOSE,
				'condition' => [
					'btn_two_style' => array('style-one','style-two','style-four'),
				],
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'saaspot-core' ),
						'icon' => 'fa fa-align-left',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'saaspot-core' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'right',
			]
		);
		$this->end_controls_section();// end: Section

		// Title
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sascal_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .callout-wrap .section-title-wrap h2',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .callout-wrap .section-title-wrap h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_padding',
			[
				'label' => __( 'Title Padding', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .callout-wrap .section-title-wrap h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Sub Title
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
				'name' => 'sascal_subtitle_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .callout-wrap .section-title-wrap h6',
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .callout-wrap .section-title-wrap h6' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Content
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
				'selector' => '{{WRAPPER}} .callout-wrap .section-title-wrap p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .callout-wrap .section-title-wrap p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'content_padding',
			[
				'label' => __( 'Content Padding', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .callout-wrap .section-title-wrap p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Button One Style
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Button One', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'btn_style' => array('style-one','style-two'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .callout-wrap .section-title-wrap .btn-one.saspot-btn,
				{{WRAPPER}} .callout-wrap .section-title-wrap .btn-one.create-account,
				{{WRAPPER}} .callout-wrap .section-title-wrap .btn-one.create-account .saspot-link',
			]
		);
		$this->add_responsive_control(
			'button_min_width',
			[
				'label' => esc_html__( 'Width', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 500,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .callout-wrap .section-title-wrap .btn-one.saspot-btn' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' => __( 'Padding', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'condition' => [
					'btn_style' => array('style-one'),
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .callout-wrap .section-title-wrap .btn-one.saspot-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'condition' => [
					'btn_style' => array('style-one'),
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .callout-wrap .section-title-wrap .btn-one.saspot-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'button_style' );
			$this->start_controls_tab(
				'button_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'button_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .callout-wrap .section-title-wrap .btn-one.saspot-btn,
						{{WRAPPER}} .callout-wrap .section-title-wrap .btn-one.create-account,
						{{WRAPPER}} .callout-wrap .section-title-wrap .btn-one.create-account .saspot-link' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .callout-wrap .section-title-wrap .btn-one.saspot-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_border_color',
				[
					'label' => esc_html__( 'Link Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .callout-wrap .section-title-wrap .btn-one.create-account .saspot-link:after' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .callout-wrap .section-title-wrap .btn-one.saspot-btn',
				]
			);
			$this->end_controls_tab();  // end:Normal tab

			$this->start_controls_tab(
				'button_hover',
				[
					'label' => esc_html__( 'Hover', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'button_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .callout-wrap .section-title-wrap .btn-one.saspot-btn:hover,
						{{WRAPPER}} .callout-wrap .section-title-wrap .btn-one.create-account .saspot-link:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .callout-wrap .section-title-wrap .btn-one.saspot-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_border_hover_color',
				[
					'label' => esc_html__( 'Link Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .callout-wrap .section-title-wrap .btn-one.create-account .saspot-link:hover:after' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_hover_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .callout-wrap .section-title-wrap .btn-one.saspot-btn:hover',
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section();// end: Section

		// Button Two
		$this->start_controls_section(
			'section_button_two_style',
			[
				'label' => esc_html__( 'Button Two', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'btn_two_style' => array('style-one','style-two'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_two_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .callout-wrap .section-title-wrap .btn-two.saspot-btn,
				{{WRAPPER}} .callout-wrap .section-title-wrap .btn-two.create-account,
				{{WRAPPER}} .callout-wrap .section-title-wrap .btn-two.create-account .saspot-link',
			]
		);
		$this->add_responsive_control(
			'button_two_min_width',
			[
				'label' => esc_html__( 'Width', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 500,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .callout-wrap .section-title-wrap .btn-two.saspot-btn' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_two_padding',
			[
				'label' => __( 'Padding', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'condition' => [
					'btn_two_style' => array('style-one'),
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .callout-wrap .section-title-wrap .btn-two.saspot-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_two_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'condition' => [
					'btn_two_style' => array('style-one'),
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .callout-wrap .section-title-wrap .btn-two.saspot-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'button_two_style' );
			$this->start_controls_tab(
				'button_two_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'button_two_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .callout-wrap .section-title-wrap .btn-two.saspot-btn,
						{{WRAPPER}} .callout-wrap .section-title-wrap .btn-two.create-account,
						{{WRAPPER}} .callout-wrap .section-title-wrap .btn-two.create-account .saspot-link' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_two_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .callout-wrap .section-title-wrap .btn-two.saspot-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_two_border_color',
				[
					'label' => esc_html__( 'Link Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .callout-wrap .section-title-wrap .btn-two.create-account .saspot-link:after' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_two_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .callout-wrap .section-title-wrap .btn-two.saspot-btn',
				]
			);
			$this->end_controls_tab();  // end:Normal tab

			$this->start_controls_tab(
				'button_two_hover',
				[
					'label' => esc_html__( 'Hover', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'button_two_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .callout-wrap .section-title-wrap .btn-two.saspot-btn:hover,
						{{WRAPPER}} .callout-wrap .section-title-wrap .btn-two.create-account .saspot-link:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_two_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .callout-wrap .section-title-wrap .btn-two.saspot-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_two_border_hover_color',
				[
					'label' => esc_html__( 'Link Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .callout-wrap .section-title-wrap .btn-two.create-account .saspot-link:hover:after' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_two_hover_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .callout-wrap .section-title-wrap .btn-two.saspot-btn:hover',
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Callout widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$callout_subtitle = !empty( $settings['callout_subtitle'] ) ? $settings['callout_subtitle'] : '';
		$callout_title = !empty( $settings['callout_title'] ) ? $settings['callout_title'] : '';
		$callout_content = !empty( $settings['callout_content'] ) ? $settings['callout_content'] : '';

		// Button One
		$btn_style = !empty( $settings['btn_style'] ) ? $settings['btn_style'] : '';
		$video_link = !empty( $settings['video_link'] ) ? $settings['video_link'] : '';
		$btn_text = !empty( $settings['btn_text'] ) ? $settings['btn_text'] : '';
		$btn_text_before = !empty( $settings['btn_text_before'] ) ? $settings['btn_text_before'] : '';
		$btn_image = !empty( $settings['btn_image']['id'] ) ? $settings['btn_image']['id'] : '';
		$btn_icon = !empty( $settings['btn_icon'] ) ? $settings['btn_icon'] : '';
		$icon_alignment = !empty( $settings['icon_alignment'] ) ? $settings['icon_alignment'] : '';
		$btn_link = !empty( $settings['btn_link']['url'] ) ? $settings['btn_link']['url'] : '';
		$btn_external = !empty( $settings['btn_link']['is_external'] ) ? 'target="_blank"' : '';
		$btn_nofollow = !empty( $settings['btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$btn_link_attr = !empty( $btn_link ) ?  $btn_external.' '.$btn_nofollow : '';

		$icon = $btn_icon ? '<i class="'.$btn_icon.'" aria-hidden="true"></i>' : '';
		if($icon_alignment === 'left') {
		  $icon_left = $icon.' ';
		  $icon_right = '';
		} else {
		  $icon_left = '';
		  $icon_right = ' '.$icon;
		}

		$image_url = wp_get_attachment_url( $btn_image );

		if($btn_style === 'style-four') {
			$button_one = $video_link ? '<a href="#0" id="myUrl" data-toggle="modal" data-src="'.$video_link.'" data-target="#SaaSpotVideoModal" class="btn-one saspot-btn saspot-light-blue-btn '.$icon_alignment.'">'.$icon_left.$btn_text.$icon_right.'</a>' : '';
		} elseif($btn_style === 'style-three') {
		  $button_one = $btn_link ? '<div class="saspot-image"><a href="'.$btn_link.'"><img src="'.$image_url.'" alt="Button"></a></div>' : '';
		} elseif ($btn_style === 'style-two') {
		  $button_one = $btn_link ? '<div class="btn-one create-account">'.$btn_text_before.' <a href="'.$btn_link.'" class="saspot-link '.$icon_alignment.'">'.$btn_text.'</a></div>' : '';
		} else {
		  $button_one = $btn_link ? '<a href="'.$btn_link.'" class="btn-one saspot-btn saspot-light-blue-btn '.$icon_alignment.'">'.$icon_left.$btn_text.$icon_right.'</a>' : '';
		}

		// Button Two
		$btn_two_style = !empty( $settings['btn_two_style'] ) ? $settings['btn_two_style'] : '';
		$video_two_link = !empty( $settings['video_two_link'] ) ? $settings['video_two_link'] : '';
		$btn_two_text = !empty( $settings['btn_two_text'] ) ? $settings['btn_two_text'] : '';
		$btn_two_text_before = !empty( $settings['btn_two_text_before'] ) ? $settings['btn_two_text_before'] : '';
		$btn_two_image = !empty( $settings['btn_two_image']['id'] ) ? $settings['btn_two_image']['id'] : '';
		$btn_two_icon = !empty( $settings['btn_two_icon'] ) ? $settings['btn_two_icon'] : '';
		$icon_two_alignment = !empty( $settings['icon_two_alignment'] ) ? $settings['icon_two_alignment'] : '';
		$btn_two_link = !empty( $settings['btn_two_link']['url'] ) ? $settings['btn_two_link']['url'] : '';
		$btn_two_external = !empty( $settings['btn_two_link']['is_external'] ) ? 'target="_blank"' : '';
		$btn_two_nofollow = !empty( $settings['btn_two_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$btn_two_link_attr = !empty( $btn_two_link ) ?  $btn_two_external.' '.$btn_two_nofollow : '';

		$icon_two = $btn_two_icon ? '<i class="'.$btn_two_icon.'" aria-hidden="true"></i>' : '';
		if($icon_two_alignment === 'left') {
		  $icon_two_left = $icon_two.' ';
		  $icon_two_right = '';
		} else {
		  $icon_two_left = '';
		  $icon_two_right = ' '.$icon_two;
		}

		$image_url_two = wp_get_attachment_url( $btn_two_image );

		if($btn_two_style === 'style-four') {
			$button_two = $video_two_link ? '<a href="#0" id="myUrl" data-toggle="modal" data-src="'.$video_two_link.'" data-target="#SaaSpotVideoModal" class="btn-one saspot-btn saspot-light-blue-btn '.$icon_two_alignment.'">'.$icon_two_left.$btn_two_text.$icon_two_right.'</a>' : '';
		} elseif($btn_two_style === 'style-three') {
		  $button_two = $btn_two_link ? '<div class="saspot-image"><a href="'.$btn_two_link.'"><img src="'.$image_url_two.'" alt="Button"></a></div>' : '';
		} elseif ($btn_two_style === 'style-two') {
		  $button_two = $btn_two_link ? '<div class="btn-two create-account">'.$btn_two_text_before.' <a href="'.$btn_two_link.'" class="saspot-link '.$icon_two_alignment.'">'.$btn_two_text.'</a></div>' : '';
		} else {
		  $button_two = $btn_two_link ? '<a href="'.$btn_two_link.'" class="btn-two saspot-btn saspot-light-blue-btn '.$icon_two_alignment.'">'.$icon_two_left.$btn_two_text.$icon_two_right.'</a>' : '';
		}

		$callout_subtitle = $callout_subtitle ? '<h6 class="section-subtitle">'.$callout_subtitle.'</h6>' : '';
		$callout_title = $callout_title ? '<h2 class="section-title">'.$callout_title.'</h2>' : '';
		$callout_content = $callout_content ? '<p>'.$callout_content.'</p>' : '';

	  $output = '<div class="callout-wrap">
			          <div class="section-title-wrap">
				          '.$callout_subtitle.$callout_title.$callout_content.'
				          <div class="saspot-btn-wrap">'.$button_one.$button_two.'</div>
			          </div>
			        </div>';

		echo $output;

	}

	/**
	 * Render Callout widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Callout() );