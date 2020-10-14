<?php
/*
 * Elementor SaaSpot Market Role Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_MarketRole extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_market_role';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Market Role', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-cogs';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Market Role widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_market_role'];
	}
	*/
	
	/**
	 * Register SaaSpot Market Role widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_market_role',
			[
				'label' => __( 'Market Role', 'saaspot-core' ),
			]
		);		
		$this->add_control(
			'market_role_style',
			[
				'label' => __( 'Market Role Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'one' => esc_html__( 'Style One', 'saaspot-core' ),
					'two' => esc_html__( 'Style Two', 'saaspot-core' ),
				],
				'default' => 'one',
			]
		);
		$this->add_control(
			'market_role_icon',
			[
				'label' => esc_html__( 'Title Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'icon-basic-webpage-img-txt',
			]
		);
		$this->add_control(
			'market_role_title',
			[
				'label' => esc_html__( 'Title Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'market_role_link',
			[
				'label' => esc_html__( 'Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);

		$this->end_controls_section();// end: Section

		// Style
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Box', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		
		$this->add_control(
			'box_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .market-role-item, {{WRAPPER}} .common-feature-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'bg_style' );
			$this->start_controls_tab(
				'bg_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'box_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .market-role-item, {{WRAPPER}} .common-feature-inner' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'box_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .market-role-item, {{WRAPPER}} .common-feature-inner',
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'bg_hover',
				[
					'label' => esc_html__( 'Hover', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'box_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} a.market-role-item:hover, {{WRAPPER}} a.common-feature-inner:hover, {{WRAPPER}} a.common-feature-inner.saspot-hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'box_border_hover',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} a.market-role-item:hover, {{WRAPPER}} a.common-feature-inner:hover',
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	

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
				'label' => esc_html__( 'Typography', 'saaspot-core' ),
				'name' => 'sasmar_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .market-role-item, {{WRAPPER}} .common-feature-inner',
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
						'{{WRAPPER}} .market-role-item, {{WRAPPER}} .common-feature-inner' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} a.market-role-item:hover, {{WRAPPER}} a.common-feature-inner:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section

		// Icon
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .market-role-item i, {{WRAPPER}} .common-feature-inner i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'icon_style' );
			$this->start_controls_tab(
					'icon_normal',
					[
						'label' => esc_html__( 'Normal', 'saaspot-core' ),
					]
				);
			$this->add_control(
				'icon_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .market-role-item i, {{WRAPPER}} .common-feature-inner i' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
					'icon_hover',
					[
						'label' => esc_html__( 'Hover', 'saaspot-core' ),
					]
				);
			$this->add_control(
				'icon_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} a.market-role-item:hover i, {{WRAPPER}} a.common-feature-inner:hover i' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render App Works widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$market_role_style = !empty( $settings['market_role_style'] ) ? $settings['market_role_style'] : '';	
		$market_role_icon = !empty( $settings['market_role_icon'] ) ? $settings['market_role_icon'] : '';	
		$market_role_title = !empty( $settings['market_role_title'] ) ? $settings['market_role_title'] : '';	
		$market_role_link = !empty( $settings['market_role_link']['url'] ) ? $settings['market_role_link']['url'] : '';
		$market_role_link_external = !empty( $settings['market_role_link']['is_external'] ) ? 'target="_blank"' : '';
		$market_role_link_nofollow = !empty( $settings['market_role_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$market_role_link_attr = !empty( $market_role_link ) ?  $market_role_link_external.' '.$market_role_link_nofollow : '';

		$icon = $market_role_icon ? '<span class="saspot-icon"><i class="'.$market_role_icon.'"></i></span>' : '';
		if ($market_role_style === 'two') {
			$title = $market_role_title ? '<span class="common-feature-title">'.$market_role_title.'</span>' : '';
		} else {
			$title = $market_role_title ? '<span class="market-role-title">'.$market_role_title.'</span>' : '';
		}

		if ($market_role_link) {
			$tag = 'a';
			$link = ' href="'.$market_role_link.'" '.$market_role_link_attr;
		} else {
			$tag = 'div';
			$link = '';
		}
		if ($market_role_style === 'two') {
			$output = '<'.$tag.$link.' class="common-feature-inner saspot-item">'.$icon.$title.'</'.$tag.'>';
		} else {
			$output = '<'.$tag.$link.' class="market-role-item">'.$icon.$title.'</'.$tag.'>';
		}

		echo $output;
		
	}

	/**
	 * Render Market Role widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_MarketRole() );