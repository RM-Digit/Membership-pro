<?php
/*
 * Elementor SaaSpot Corporate For Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Corporate extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_corporate';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Corporate', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-building';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Corporate For widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_corporate'];
	}
	*/
	
	/**
	 * Register SaaSpot Corporate For widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_corporate',
			[
				'label' => __( 'Corporate Option', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'corporate_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'icon-basic-clubs',
			]
		);
		$this->add_control(
			'corporate_title',
			[
				'label' => esc_html__( 'Title Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Environmentally Friendly', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'corporate_title_link',
			[
				'label' => esc_html__( 'Title Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'corporate_content',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'default' => esc_html__( 'your content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->end_controls_section();// end: Section
		
		// Style
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
				'label' => esc_html__( 'Typography', 'saaspot-core' ),
				'name' => 'sascorp_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .corporate-info h3',
			]
		);
		$this->start_controls_tabs( 'title_style' );
			$this->start_controls_tab(
					'title_normal',
					[
						'label' => esc_html__( 'Normal', 'saaspot-core' ),
					]
				);
			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .corporate-info h3, {{WRAPPER}} .corporate-info h3 a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
					'title_hover',
					[
						'label' => esc_html__( 'Hover', 'saaspot-core' ),
					]
				);
			$this->add_control(
				'title_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .corporate-info h3 a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
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
				'label' => esc_html__( 'Typography', 'saaspot-core' ),
				'name' => 'content_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .corporate-info p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .corporate-info p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .corporate-item .saspot-icon' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .corporate-item .saspot-icon' => 'background-color: {{VALUE}};',
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
		$corporate_icon = !empty( $settings['corporate_icon'] ) ? $settings['corporate_icon'] : '';	
		$corporate_title = !empty( $settings['corporate_title'] ) ? $settings['corporate_title'] : '';	
		$corporate_title_link = !empty( $settings['corporate_title_link']['url'] ) ? $settings['corporate_title_link']['url'] : '';
		$corporate_title_link_external = !empty( $settings['corporate_title_link']['is_external'] ) ? 'target="_blank"' : '';
		$corporate_title_link_nofollow = !empty( $settings['corporate_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$corporate_title_link_attr = !empty( $corporate_title_link ) ?  $corporate_title_link_external.' '.$corporate_title_link_nofollow : '';
		$corporate_content = !empty( $settings['corporate_content'] ) ? $settings['corporate_content'] : '';	

		$icon = $corporate_icon ? '<div class="saspot-icon"><i class="'.$corporate_icon.'" aria-hidden="true"></i></div>' : '';
		$title_link = $corporate_title_link ? '<a href="'.$corporate_title_link.'" '.$corporate_title_link_attr.'>'.$corporate_title.'</a>' : $corporate_title;
		$title = $corporate_title ? '<h3 class="corporate-title">'.$title_link.'</h3>' : '';
		$content = $corporate_content ? '<p>'.$corporate_content.'</p>' : '';


  	$output = '<div class="corporate-item">'.$icon.'<div class="corporate-info">'.$title.$content.'</div></div>';
		echo $output;
		
	}

	/**
	 * Render Corporate For widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Corporate() );