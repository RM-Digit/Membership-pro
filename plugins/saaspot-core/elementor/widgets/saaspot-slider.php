<?php
/*
 * Elementor SaaSpot Blog Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Slider extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_slider';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Slider', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-sliders';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Slider widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_slider'];
	}
	 */

	/**
	 * Register SaaSpot Slider widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){

		$this->start_controls_section(
			'section_slider',
			[
				'label' => __( 'Slider Options', 'saaspot-core' ),
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
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
				'default' => 'left',
			]
		);
		$repeater->add_control(
			'slider_image',
			[
				'label' => esc_html__( 'Slider Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'slider_label',
			[
				'label' => esc_html__( 'Slider Label', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'slider_label_text',
			[
				'label' => esc_html__( 'Slider Label Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'slider_label_link_text',
			[
				'label' => esc_html__( 'Slider Label Link Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'slider_label_link',
			[
				'label' => esc_html__( 'Slider Label Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'saaspot-core' ),
				'show_external' => true,
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'slider_title',
			[
				'label' => esc_html__( 'Slider title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type slide title here', 'saaspot-core' ),
			]
		);
		$repeater->add_control(
			'slider_content',
			[
				'label' => esc_html__( 'Slider content', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type slide content here', 'saaspot-core' ),
			]
		);
		$repeater->start_controls_tabs( 'button_optn' );
		$repeater->start_controls_tab(
			'button_one',
			[
				'label' => esc_html__( 'Button One', 'saaspot-core' ),
			]
		);
		$repeater->add_control(
			'btn_txt',
			[
				'label' => esc_html__( 'Button One Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type your button text here', 'saaspot-core' ),
			]
		);
		$repeater->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Button One Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'saaspot-core' ),
				'show_external' => true,
				'default' => [
					'url' => '',
				],
			]
		);
		$repeater->end_controls_tab();  // end:Button One tab
		$repeater->start_controls_tab(
			'button_two',
			[
				'label' => esc_html__( 'Button Two', 'saaspot-core' ),
			]
		);
		$repeater->add_control(
			'btn_two_txt',
			[
				'label' => esc_html__( 'Button Two Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type your button text here', 'saaspot-core' ),
			]
		);
		$repeater->add_control(
			'button_two_link',
			[
				'label' => esc_html__( 'Button Two Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'saaspot-core' ),
				'show_external' => true,
				'default' => [
					'url' => '',
				],
			]
		);
		$repeater->end_controls_tab();  // end:Button Two tab
		$repeater->end_controls_tabs();

		$this->add_control(
			'swipeSliders_groups',
			[
				'label' => esc_html__( 'Slider Items', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'slider_title' => esc_html__( 'Item #1', 'saaspot-core' ),
					],

				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ slider_title }}}',
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_animation',
			[
				'label' => __( 'Slider Animation', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'label_entrance_animation',
			[
				'label' => esc_html__( 'Label Entrance Animation', 'saaspot-core' ),
				'type' => Controls_Manager::ANIMATION,
			]
		);
		$this->add_control(
			'title_entrance_animation',
			[
				'label' => esc_html__( 'Title Entrance Animation', 'saaspot-core' ),
				'type' => Controls_Manager::ANIMATION,
			]
		);
		$this->add_control(
			'content_entrance_animation',
			[
				'label' => esc_html__( 'Content Entrance Animation', 'saaspot-core' ),
				'type' => Controls_Manager::ANIMATION,
			]
		);
		$this->add_control(
			'button_entrance_animation',
			[
				'label' => esc_html__( 'Button One Entrance Animation', 'saaspot-core' ),
				'type' => Controls_Manager::ANIMATION,
			]
		);
		$this->add_control(
			'button_two_entrance_animation',
			[
				'label' => esc_html__( 'Button Two Entrance Animation', 'saaspot-core' ),
				'type' => Controls_Manager::ANIMATION,
			]
		);

		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_carousel',
			[
				'label' => esc_html__( 'Carousel Options', 'saaspot-core' ),
			]
		);

		$this->add_control(
			'carousel_autoplay_timeout',
			[
				'label' => __( 'Auto Play Timeout', 'saaspot-core' ),
				'type' => Controls_Manager::NUMBER,
			]
		);
		$this->add_control(
			'carousel_loop',
			[
				'label' => esc_html__( 'Disable Loop?', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'Continuously moving carousel, if enabled.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'carousel_dots',
			[
				'label' => esc_html__( 'Dots', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want Carousel Dots, enable it.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'carousel_nav',
			[
				'label' => esc_html__( 'Navigation', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want Carousel Navigation, enable it.', 'saaspot-core' ),
			]
		);

		$this->add_control(
			'carousel_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want to start Carousel automatically, enable it.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'carousel_autoplay_interaction',
			[
				'label' => esc_html__( 'Disable Autoplay on Interaction', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want to disable autoplay on interaction, enable it.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'clickable_pagi',
			[
				'label' => esc_html__( 'Pagination Dots Clickable?', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want pagination dots clickable, enable it.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'carousel_speed',
			[
				'label' => __( 'Auto Play Speed', 'saaspot-core' ),
				'type' => Controls_Manager::NUMBER,
			]
		);
		$this->add_control(
			'carousel_effect',
			[
				'label' => __( 'Slider Effect', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'fade' => esc_html__( 'Fade', 'saaspot-core' ),
					'slide' => esc_html__( 'Slide', 'saaspot-core' ),
					'cube' => esc_html__( 'Cube', 'saaspot-core' ),
					'coverflow' => esc_html__( 'Coverflow', 'saaspot-core' ),
				],
				'default' => 'fade',
				'description' => esc_html__( 'Select your slider navigation style.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'carousel_mousedrag',
			[
				'label' => esc_html__( 'Disable Mouse Drag?', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want to disable Mouse Drag, check it.', 'saaspot-core' ),
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
				'name' => 'title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .banner-caption h1',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner-caption h1' => 'color: {{VALUE}};',
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
				'name' => 'slider_content_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .banner-caption p',
			]
		);
		$this->add_control(
			'slider_content_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner-caption p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'content_overlay_color',
			[
				'label' => esc_html__( 'Content Overlay Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-overlay:before' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'overlay_image',
			[
				'label' => esc_html__( 'Overlay Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'selectors' => [
					'{{WRAPPER}} .saspot-overlay:before' => 'background-image: url({{url}});',
				],
			]
		);

		$this->end_controls_section();// end: Section

		// Sub Title
		$this->start_controls_section(
			'section_sub_title_style',
			[
				'label' => esc_html__( 'Label', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sub_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .banner-subtitle',
			]
		);
		$this->add_control(
			'sub_title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner-subtitle' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'sub_title_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner-subtitle' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'label_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .banner-subtitle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'label_border',
				'label' => esc_html__( 'Border', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .banner-subtitle',
			]
		);
		$this->end_controls_section();// end: Section

		// Button One Style
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Button One', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .banner-caption .btn-one.saspot-btn',
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
					'{{WRAPPER}} .banner-caption .btn-one.saspot-btn' => 'min-width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .banner-caption .btn-one.saspot-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .banner-caption .btn-one.saspot-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .banner-caption .btn-one.saspot-btn' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .banner-caption .btn-one.saspot-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .banner-caption .btn-one.saspot-btn',
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
						'{{WRAPPER}} .banner-caption .btn-one.saspot-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .banner-caption .btn-one.saspot-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_hover_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .banner-caption .btn-one.saspot-btn:hover',
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
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_two_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .banner-caption .btn-two.saspot-btn',
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
					'{{WRAPPER}} .banner-caption .btn-two.saspot-btn' => 'min-width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .banner-caption .btn-two.saspot-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .banner-caption .btn-two.saspot-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .banner-caption .btn-two.saspot-btn' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_two_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .banner-caption .btn-two.saspot-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_two_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .banner-caption .btn-two.saspot-btn',
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
						'{{WRAPPER}} .banner-caption .btn-two.saspot-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_two_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .banner-caption .btn-two.saspot-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_two_hover_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .banner-caption .btn-two.saspot-btn:hover',
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Blog widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$carousel_effect = !empty( $settings['carousel_effect'] ) ? $settings['carousel_effect'] : '';

		// Carousel Options
		$swipeSliders_groups = !empty( $settings['swipeSliders_groups'] ) ? $settings['swipeSliders_groups'] : [];
		$carousel_autoplay_timeout = !empty( $settings['carousel_autoplay_timeout'] ) ? $settings['carousel_autoplay_timeout'] : '';
		$carousel_speed = !empty( $settings['carousel_speed'] ) ? $settings['carousel_speed'] : '';

		$carousel_loop  = ( isset( $settings['carousel_loop'] ) && ( 'true' == $settings['carousel_loop'] ) ) ? $settings['carousel_loop'] : 'false';
		$carousel_dots  = ( isset( $settings['carousel_dots'] ) && ( 'true' == $settings['carousel_dots'] ) ) ? true : false;
		$carousel_nav  = ( isset( $settings['carousel_nav'] ) && ( 'true' == $settings['carousel_nav'] ) ) ? true : false;
		$carousel_autoplay  = ( isset( $settings['carousel_autoplay'] ) && ( 'true' == $settings['carousel_autoplay'] ) ) ? true : false;
		$carousel_autoplay_interaction = ( isset( $settings['carousel_autoplay_interaction'] ) && ( 'true' == $settings['carousel_autoplay_interaction'] ) ) ? true : false;
		$clickable_pagi = ( isset( $settings['clickable_pagi'] ) && ( 'true' == $settings['clickable_pagi'] ) ) ? true : false;

		$carousel_mousedrag  = ( isset( $settings['carousel_mousedrag'] ) && ( 'true' == $settings['carousel_mousedrag'] ) ) ? $settings['carousel_mousedrag'] : 'false';

		// Carousel Data's
		$carousel_loop = $carousel_loop !== 'true' ? ' data-loop="true"' : ' data-loop="false"';
		$carousel_autoplay_timeout = $carousel_autoplay_timeout ? ' data-interval="'. $carousel_autoplay_timeout .'"' : ' data-interval="5000"';
		$carousel_speed = $carousel_speed ? ' data-speed="'. $carousel_speed .'"' : ' data-speed="1000"';
		$carousel_autoplay = $carousel_autoplay ? ' data-autoplay="true"' : '';
		$carousel_autoplay_interaction = $carousel_autoplay_interaction ? ' data-interaction="true"' : '';
		$clickable_pagi = $clickable_pagi ? 'data-clickpage="true"' : '';
		$carousel_effect = (isset($settings['carousel_effect'])) ? ' data-effect="'.$carousel_effect.'"' : '';
		$carousel_mousedrag = $carousel_mousedrag !== 'true' ? ' data-mousedrag="true"' : ' data-mousedrag="false"';

		$label_entrance_animation = !empty( $settings['label_entrance_animation'] ) ? $settings['label_entrance_animation'] : '';
		$title_entrance_animation = !empty( $settings['title_entrance_animation'] ) ? $settings['title_entrance_animation'] : '';
		$content_entrance_animation = !empty( $settings['content_entrance_animation'] ) ? $settings['content_entrance_animation'] : '';
		$button_entrance_animation = !empty( $settings['button_entrance_animation'] ) ? $settings['button_entrance_animation'] : '';
		$button_two_entrance_animation = !empty( $settings['button_two_entrance_animation'] ) ? $settings['button_two_entrance_animation'] : '';

		// Animation
		$label_entrance_animation = $label_entrance_animation ? $label_entrance_animation : 'fadeInUp';
		$title_entrance_animation = $title_entrance_animation ? $title_entrance_animation : 'fadeInUp';
		$content_entrance_animation = $content_entrance_animation ? $content_entrance_animation : 'fadeInUp';
		$button_entrance_animation = $button_entrance_animation ? $button_entrance_animation : 'fadeInUp';
		$button_two_entrance_animation = $button_two_entrance_animation ? $button_two_entrance_animation : 'fadeInUp';

		// Turn output buffer on
		ob_start();

		 ?>
<div class="swiper-container swiper-slides swiper-keyboard" <?php echo $carousel_loop . $carousel_autoplay_timeout . $carousel_autoplay . $carousel_effect . $carousel_speed . $carousel_autoplay_interaction . $clickable_pagi . $carousel_mousedrag; ?> data-swiper="container">
  <div class="swiper-wrapper">

    <?php
			if( is_array( $swipeSliders_groups ) && !empty( $swipeSliders_groups ) ){
				foreach ( $swipeSliders_groups as $each_item ) {

					$image_url = wp_get_attachment_url( $each_item['slider_image']['id'] );
					$section_alignment = !empty( $each_item['section_alignment'] ) ? $each_item['section_alignment'] : '';
					$slider_title = !empty( $each_item['slider_title'] ) ? $each_item['slider_title'] : '';
					$slider_content = !empty( $each_item['slider_content'] ) ? $each_item['slider_content'] : '';
					$slider_label = !empty( $each_item['slider_label'] ) ? $each_item['slider_label'] : '';
					$slider_label_text = !empty( $each_item['slider_label_text'] ) ? $each_item['slider_label_text'] : '';
					$slider_label_link_text = !empty( $each_item['slider_label_link_text'] ) ? $each_item['slider_label_link_text'] : '';
					$slider_label_link = !empty( $each_item['slider_label_link']['url'] ) ? $each_item['slider_label_link']['url'] : '';
					$slider_label_link_external = !empty( $each_item['slider_label_link']['is_external'] ) ? 'target="_blank"' : '';
					$slider_label_link_nofollow = !empty( $each_item['slider_label_link']['nofollow'] ) ? 'rel="nofollow"' : '';
					$slider_label_link_attr = !empty( $slider_label_link ) ?  $slider_label_link_external.' '.$slider_label_link_nofollow : '';

					$button_text = !empty( $each_item['btn_txt'] ) ? $each_item['btn_txt'] : '';
					$button_link = !empty( $each_item['button_link']['url'] ) ? $each_item['button_link']['url'] : '';
					$button_link_external = !empty( $each_item['button_link']['is_external'] ) ? 'target="_blank"' : '';
					$button_link_nofollow = !empty( $each_item['button_link']['nofollow'] ) ? 'rel="nofollow"' : '';
					$button_link_attr = !empty( $button_link ) ?  $button_link_external.' '.$button_link_nofollow : '';

					$button_two_text = !empty( $each_item['btn_two_txt'] ) ? $each_item['btn_two_txt'] : '';
					$button_two_link = !empty( $each_item['button_two_link']['url'] ) ? $each_item['button_two_link']['url'] : '';
					$button_two_link_external = !empty( $each_item['button_two_link']['is_external'] ) ? 'target="_blank"' : '';
					$button_two_link_nofollow = !empty( $each_item['button_two_link']['nofollow'] ) ? 'rel="nofollow"' : '';
					$button_two_link_attr = !empty( $button_two_link ) ?  $button_two_link_external.' '.$button_two_link_nofollow : '';

					$slider_label = $slider_label ? '<span class="saspot-label">'.esc_attr($slider_label).'</span>' : '';
					$slider_label_link = $slider_label_link ? ' <a href="'.esc_url($slider_label_link).'" '.$slider_label_link_attr.'>'.esc_attr($slider_label_link_text).' <i class="fa fa-angle-right" aria-hidden="true"></i></a>' : '';
					$slider_label_text = ($slider_label_text || $slider_label_link) ? '<span>'.esc_attr($slider_label_text).$slider_label_link.'</span>' : '';
					$slider_subtitle = ($slider_label || $slider_label_text) ? '<div class="banner-subtitle animated" data-animation="'.esc_attr($label_entrance_animation).'">'.$slider_label.$slider_label_text .'</div>' : '';

					$slide_title = $slider_title ? ' <h1 class="banner-title animated" data-animation="'.esc_attr($title_entrance_animation).'">'.esc_attr($slider_title).'</h1>' : '';
					$slide_content = $slider_content ? ' <p class="animated" data-animation="'.esc_attr($content_entrance_animation).'">'.esc_attr($slider_content).'</p>' : '';

					$button_one = $button_link ? '<a href="'.esc_url($button_link).'" '.$button_link_attr.' class="btn-one saspot-btn animated" data-animation="'.esc_attr($button_entrance_animation).'">'. $button_text .' <i class="fa fa-angle-right" aria-hidden="true"></i></a>' : '';
					$button_two = $button_two_link ? '<a href="'.esc_url($button_two_link).'" '.$button_two_link_attr.' class="btn-two saspot-btn saspot-white-btn animated" data-animation="'.esc_attr($button_two_entrance_animation).'">'. $button_two_text .' <i class="fa fa-angle-right" aria-hidden="true"></i></a>' : '';

					$button_actual = ($button_one || $button_two) ? '<div class="saspot-btn-wrap">'.$button_one.$button_two.'</div>' : '';

					if($section_alignment === 'center') {
						$align_class = ' center-align';
					} elseif ($section_alignment === 'right') {
						$align_class = ' right-align';
					} else {
						$align_class = ' left-align';
					}
					?>
						<div class="swiper-slide saspot-banner saspot-overlay" style="background-image: url(<?php echo $image_url; ?>);">
				      <div class="saspot-table-wrap">
				        <div class="saspot-align-wrap">
				          <div class="container">
				            <div class="banner-caption<?php echo esc_attr($align_class); ?>"><?php echo $slider_subtitle.$slide_title.$slide_content.$button_actual; ?></div>
				          </div>
				        </div>
				      </div>
				    </div>
				<?php }
			} ?>
		</div>
		<?php if($carousel_nav){ ?>
			<div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    <?php } if($carousel_dots) { ?>
    <div class="swiper-pagination"></div>
    <?php } ?>
    </div>
		<?php
		// Return outbut buffer
		echo ob_get_clean();

	}

	/**
	 * Render Blog widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Slider() );
