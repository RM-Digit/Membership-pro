<?php
/*
 * Elementor SaaSpot Market Types Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_MarketTypes extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_market_types';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Market Types', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-keyboard-o';
	}

	/**
	 * Retrieve the market_types of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the market_types of scripts the SaaSpot Market Types widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_market_types'];
	}
	*/
	
	/**
	 * Register SaaSpot Market Types widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){

		$this->start_controls_section(
			'section_market_type',
			[
				'label' => esc_html__( 'Market Types Style', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'market_type_style',
			[
				'label' => __( 'Market Types Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'one' => esc_html__( 'Style One', 'saaspot-core' ),
					'two' => esc_html__( 'Style Two', 'saaspot-core' ),
				],
				'default' => 'one',
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_left',
			[
				'label' => esc_html__( 'Market Types Left', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'left_upload_type',
			[
				'label' => __( 'Upload Type', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'image' => esc_html__( 'Image', 'saaspot-core' ),
					'icon' => esc_html__( 'Icon', 'saaspot-core' ),
				],
				'default' => 'image',
			]
		);
		$this->add_control(
			'market_left_image',
			[
				'label' => esc_html__( 'Upload Icon', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'left_upload_type' => 'image',
				],
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your icon image.', 'saaspot-core'),
			]
		);
		$this->add_control(
			'market_left_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'condition' => [
					'left_upload_type' => 'icon',
				],
				'frontend_available' => true,
				'default' => 'fa fa-calendar',
			]
		);
		$this->add_control(
			'market_left_title',
			[
				'label' => esc_html__( 'Title Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'market_left_content',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'default' => esc_html__( 'your content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		
		$repeater = new Repeater();

		$repeater->add_control(
			'left_list',
			[
				'label' => esc_html__( 'Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,				
			]
		);
		$this->add_control(
			'left_group',
			[
				'label' => esc_html__( 'List', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'left_list' => esc_html__( 'Free registration', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ left_list }}}',
				'condition' => [
					'market_type_style' => 'one',
				],
			]
		);
		$this->add_control(
			'market_left_btn',
			[
				'label' => esc_html__( 'Link Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'LEARN MORE', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type link text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'market_left_btn_link',
			[
				'label' => esc_html__( 'Link Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'market_left_btn_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-angle-right',
			]
		);
		$this->add_control(
			'left_icon_alignment',
			[
				'label' => esc_html__( 'Alignment', 'saaspot-core' ),
				'type' => Controls_Manager::CHOOSE,
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

		$this->start_controls_section(
			'section_right',
			[
				'label' => esc_html__( 'Market Types Right', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'right_upload_type',
			[
				'label' => __( 'Upload Type', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'image' => esc_html__( 'Image', 'saaspot-core' ),
					'icon' => esc_html__( 'Icon', 'saaspot-core' ),
				],
				'default' => 'image',
			]
		);
		$this->add_control(
			'market_right_image',
			[
				'label' => esc_html__( 'Upload Icon', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'right_upload_type' => 'image',
				],
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your icon image.', 'saaspot-core'),
			]
		);
		$this->add_control(
			'market_right_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'condition' => [
					'right_upload_type' => 'icon',
				],
				'frontend_available' => true,
				'default' => 'fa fa-calendar',
			]
		);
		$this->add_control(
			'market_right_title',
			[
				'label' => esc_html__( 'Title Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'market_right_content',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'default' => esc_html__( 'your content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		
		$repeaterOne = new Repeater();

		$repeaterOne->add_control(
			'right_list',
			[
				'label' => esc_html__( 'Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'right_group',
			[
				'label' => esc_html__( 'List', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'right_list' => esc_html__( 'Free registration', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeaterOne->get_controls(),
				'title_field' => '{{{ right_list }}}',
				'condition' => [
					'market_type_style' => 'one',
				],
			]
		);
		$this->add_control(
			'market_right_btn',
			[
				'label' => esc_html__( 'Link Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'LEARN MORE', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type link text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'market_right_btn_link',
			[
				'label' => esc_html__( 'Link Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'market_right_btn_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-angle-right',
			]
		);
		$this->add_control(
			'right_icon_alignment',
			[
				'label' => esc_html__( 'Alignment', 'saaspot-core' ),
				'type' => Controls_Manager::CHOOSE,
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

		// Left
		$this->start_controls_section(
			'section_style_left',
			[
				'label' => esc_html__( 'Section Left', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		
		$this->add_control(
			'left_info',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-warning"><b>Section</b></div>',
			]
		);
		$this->add_control(
			'left_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .market-type.left' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'left_info1',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-warning"><b>Icon</b></div>',
			]
		);
		$this->add_control(
			'left_icon_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .left .market-wrap .saspot-icon i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'left_icon_size',
			[
				'label' => esc_html__( 'Size', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .left .market-wrap .saspot-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'left_info2',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-warning"><b>Title</b></div>',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sasmart_left_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .left .market-title',
			]
		);
		$this->add_control(
			'left_title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .left .market-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'left_info3',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-warning"><b>Content</b></div>',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'left_content_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .left .market-wrap p',
			]
		);
		$this->add_control(
			'left_content_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .left .market-wrap p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'left_info4',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-warning"><b>List</b></div>',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'left_list_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .left .market-wrap .bullet-list li',
			]
		);
		$this->add_control(
			'left_list_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .left .market-wrap .bullet-list li' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'left_info5',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-warning"><b>Link</b></div>',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'left_link_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .left .market-wrap .saspot-link',
			]
		);
		$this->start_controls_tabs( 'left_link_style' );
			$this->start_controls_tab(
				'left_link_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'left_link_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .left .market-wrap .saspot-link' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'left_link_border_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .left .market-wrap .saspot-link:after' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab			
			$this->start_controls_tab(
				'left_link_hover',
				[
					'label' => esc_html__( 'Hover', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'left_link_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .left .market-wrap .saspot-link:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'left_link_border_hover_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .left .market-wrap .saspot-link:hover:after' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section

		// Right
		$this->start_controls_section(
			'section_style_right',
			[
				'label' => esc_html__( 'Section Right', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		
		$this->add_control(
			'right_info',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-warning"><b>Section</b></div>',
			]
		);
		$this->add_control(
			'right_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .market-type.right' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'right_info1',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-warning"><b>Icon</b></div>',
			]
		);
		$this->add_control(
			'right_icon_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .right .market-wrap .saspot-icon i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'right_icon_size',
			[
				'label' => esc_html__( 'Size', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .right .market-wrap .saspot-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'right_info2',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-warning"><b>Title</b></div>',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sasmart_right_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .right .market-title',
			]
		);
		$this->add_control(
			'right_title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .right .market-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'right_info3',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-warning"><b>Content</b></div>',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'right_content_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .right .market-wrap p',
			]
		);
		$this->add_control(
			'right_content_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .right .market-wrap p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'right_info4',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-warning"><b>List</b></div>',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'right_list_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .right .market-wrap .bullet-list li',
			]
		);
		$this->add_control(
			'right_list_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .right .market-wrap .bullet-list li' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'right_info5',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-warning"><b>Link</b></div>',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'right_link_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .right .market-wrap .saspot-link',
			]
		);
		$this->start_controls_tabs( 'right_link_style' );
			$this->start_controls_tab(
				'right_link_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'right_link_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .right .market-wrap .saspot-link' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'right_link_border_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .right .market-wrap .saspot-link:after' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab			
			$this->start_controls_tab(
				'right_link_hover',
				[
					'label' => esc_html__( 'Hover', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'right_link_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .right .market-wrap .saspot-link:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'right_link_border_hover_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .right .market-wrap .saspot-link:hover:after' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section
		// VS
		$this->start_controls_section(
			'section_vs_style',
			[
				'label' => esc_html__( 'VS', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'vs_color',
			[
				'label' => esc_html__( 'VS Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-market-types:before' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'vs_border_color',
			[
				'label' => esc_html__( 'Border Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .market-types-style-two:after' => 'background-color: {{VALUE}};',
				],
			]
		);		
		$this->add_control(
			'vs_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-market-types:before' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sasmrt_vs_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .saspot-market-types:before',
			]
		);
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Market Types widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$market_type_style = !empty( $settings['market_type_style'] ) ? $settings['market_type_style'] : '';
		// Left
		$left_upload_type = !empty( $settings['left_upload_type'] ) ? $settings['left_upload_type'] : '';
		$market_left_image = !empty( $settings['market_left_image']['id'] ) ? $settings['market_left_image']['id'] : '';
		$market_left_icon = !empty( $settings['market_left_icon'] ) ? $settings['market_left_icon'] : '';
		$market_left_title = !empty( $settings['market_left_title'] ) ? $settings['market_left_title'] : '';
		$market_left_content = !empty( $settings['market_left_content'] ) ? $settings['market_left_content'] : '';
		$left_group = !empty( $settings['left_group'] ) ? $settings['left_group'] : '';
		$market_left_btn = !empty( $settings['market_left_btn'] ) ? $settings['market_left_btn'] : '';	
		$market_left_btn_link = !empty( $settings['market_left_btn_link']['url'] ) ? $settings['market_left_btn_link']['url'] : '';
		$market_left_btn_link_external = !empty( $settings['market_left_btn_link']['is_external'] ) ? 'target="_blank"' : '';
		$market_left_btn_link_nofollow = !empty( $settings['market_left_btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$market_left_btn_link_attr = !empty( $market_left_btn_link ) ?  $market_left_btn_link_external.' '.$market_left_btn_link_nofollow : '';
		$market_left_btn_icon = !empty( $settings['market_left_btn_icon'] ) ? $settings['market_left_btn_icon'] : '';	
		$left_icon_alignment = !empty( $settings['left_icon_alignment'] ) ? $settings['left_icon_alignment'] : '';	
		// Right
		$right_upload_type = !empty( $settings['right_upload_type'] ) ? $settings['right_upload_type'] : '';
		$market_right_image = !empty( $settings['market_right_image']['id'] ) ? $settings['market_right_image']['id'] : '';
		$market_right_icon = !empty( $settings['market_right_icon'] ) ? $settings['market_right_icon'] : '';
		$market_right_title = !empty( $settings['market_right_title'] ) ? $settings['market_right_title'] : '';
		$market_right_content = !empty( $settings['market_right_content'] ) ? $settings['market_right_content'] : '';
		$right_group = !empty( $settings['right_group'] ) ? $settings['right_group'] : '';
		$market_right_btn = !empty( $settings['market_right_btn'] ) ? $settings['market_right_btn'] : '';	
		$market_right_btn_link = !empty( $settings['market_right_btn_link']['url'] ) ? $settings['market_right_btn_link']['url'] : '';
		$market_right_btn_link_external = !empty( $settings['market_right_btn_link']['is_external'] ) ? 'target="_blank"' : '';
		$market_right_btn_link_nofollow = !empty( $settings['market_right_btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$market_right_btn_link_attr = !empty( $market_right_btn_link ) ?  $market_right_btn_link_external.' '.$market_right_btn_link_nofollow : '';
		$market_right_btn_icon = !empty( $settings['market_right_btn_icon'] ) ? $settings['market_right_btn_icon'] : '';	
		$right_icon_alignment = !empty( $settings['right_icon_alignment'] ) ? $settings['right_icon_alignment'] : '';	

		// Left Content
		$left_image_url = wp_get_attachment_url( $market_left_image );
		$left_icon = $market_left_icon ? ' <i class="'.$market_left_icon.'" aria-hidden="true"></i>' : '';
	  $left_icon_image = $left_image_url ? '<img src="'.$left_image_url.'" width="58" alt="Features">' : '';

		if($left_upload_type === 'icon') {
		  $leftf_icon = $left_icon;
		} else {
		  $leftf_icon = $left_icon_image;
		}

		$left_title = $market_left_title ? '<h2 class="market-title">'.$market_left_title.'</h2>' : '';
	  $left_content = $market_left_content ? '<p>'.$market_left_content.'</p>' : '';

	  $left_btn_icon = $market_left_btn_icon ? '<i class="'.$market_left_btn_icon.'" aria-hidden="true"></i>' : '';
		if($left_icon_alignment === 'left') {
		  $left_icon_left = $left_btn_icon.' ';
		  $left_icon_right = '';
		} else {
		  $left_icon_left = '';
		  $left_icon_right = ' '.$left_btn_icon;
		}
		$left_link = $market_left_btn_link ? '<div class="saspot-link-wrap link-wrap-style-two"><a href="'.$market_left_btn_link.'" '.$market_left_btn_link_attr.' class="saspot-link">'.$left_icon_left.$market_left_btn.$left_icon_right.'</a></div>' : '';

		// Right Content
		$right_image_url = wp_get_attachment_url( $market_right_image );
		$right_icon = $market_right_icon ? ' <i class="'.$market_right_icon.'" aria-hidden="true"></i>' : '';
	  $right_icon_image = $right_image_url ? '<img src="'.$right_image_url.'" width="58" alt="Features">' : '';

		if($right_upload_type === 'icon') {
		  $rightf_icon = $right_icon;
		} else {
		  $rightf_icon = $right_icon_image;
		}

		$right_title = $market_right_title ? '<h2 class="market-title">'.$market_right_title.'</h2>' : '';
	  $right_content = $market_right_content ? '<p>'.$market_right_content.'</p>' : '';

	  $right_btn_icon = $market_right_btn_icon ? '<i class="'.$market_right_btn_icon.'" aria-hidden="true"></i>' : '';
		if($right_icon_alignment === 'left') {
		  $right_icon_left = $right_btn_icon.' ';
		  $right_icon_right = '';
		} else {
		  $right_icon_left = '';
		  $right_icon_right = ' '.$right_btn_icon;
		}
		$right_link = $market_right_btn_link ? '<div class="saspot-link-wrap link-wrap-style-two"><a href="'.$market_right_btn_link.'" '.$market_right_btn_link_attr.' class="saspot-link">'.$right_icon_left.$market_right_btn.$right_icon_right.'</a></div>' : '';

		if($market_type_style === 'two') {
		  $style_cls = ' market-types-style-two';
		  $over_clas = '';
		} else {
		  $style_cls = '';
		  $over_clas = ' saspot-overlay';
		}
		
	  $output = '<div class="saspot-market-types'.$style_cls.'">
							  <div class="row">
							    <div class="col-lg-6">
							      <div class="market-type left'.$over_clas.'">
							        <div class="market-wrap">
							          <div class="saspot-icon">'.$leftf_icon.'</div>
							          '.$left_title.$left_content;
							          if ($market_type_style === 'one') {
	          $output .= '<ul class="bullet-list">';
							          	if( is_array( $left_group ) && !empty( $left_group ) ){
													  foreach ( $left_group as $each_left ) {
														$left_list = $each_left['left_list'] ? $each_left['left_list'] : '';
														  $output .= '<li>'. $left_list .'</li>';
													  }
													}
	          $output .= '</ul>';
							          }
	          $output .= $left_link.'
							        </div>
							      </div>
							    </div>
							    <div class="col-lg-6">
							      <div class="market-type right'.$over_clas.'">
							        <div class="market-wrap">
							          <div class="saspot-icon">'.$rightf_icon.'</div>
							          '.$right_title.$right_content;
							          if ($market_type_style === 'one') {
	          $output .= '<ul class="bullet-list">';
							          	if( is_array( $right_group ) && !empty( $right_group ) ){
													  foreach ( $right_group as $each_right ) {
														$right_list = $each_right['right_list'] ? $each_right['right_list'] : '';
														  $output .= '<li>'. $right_list .'</li>';
													  }
													}
	          $output .= '</ul>';
							          }
	          $output .= $right_link.'
							        </div>
							      </div>
							    </div>
							  </div>
							</div>';

		echo $output;
		
	}

	/**
	 * Render Market Types widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_MarketTypes() );