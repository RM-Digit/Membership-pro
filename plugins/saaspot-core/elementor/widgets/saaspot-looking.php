<?php
/*
 * Elementor SaaSpot Looking For Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Looking extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_looking';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Looking For', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-eye';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Looking For widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_looking'];
	}
	*/
	
	/**
	 * Register SaaSpot Looking For widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_looking',
			[
				'label' => __( 'Looking For Item', 'saaspot-core' ),
			]
		);

		$this->add_control(
			'looking_image',
			[
				'label' => esc_html__( 'Icon Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'looking_title',
			[
				'label' => esc_html__( 'Title Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'looking_title_link',
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
			'looking_content',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'default' => esc_html__( 'your content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);

		$this->add_control(
			'button_alignment',
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
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_looking_btn',
			[
				'label' => esc_html__( 'Button Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'looking_btn',
			[
				'label' => esc_html__( 'Button Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Button Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type btn text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'looking_btn_link',
			[
				'label' => esc_html__( 'Button Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'looking_btn_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-angle-right',
			]
		);
		$this->end_controls_section();// end: Section
		
		// Style
		$this->start_controls_section(
			'section_box_style',
			[
				'label' => esc_html__( 'Box', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'box_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .looking-item, {{WRAPPER}} .looking-item.saspot-hover .saspot-btn',
				]
			);
			$this->add_control(
				'box_border_radius',
				[
					'label' => __( 'Border Radius', 'saaspot-core' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .looking-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'sasloo_section_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .looking-item',
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
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Typography', 'saaspot-core' ),
					'name' => 'sasloo_title_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .looking-item h3',
				]
			);
			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .looking-item h3' => 'color: {{VALUE}};',
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
					'label' => esc_html__( 'Typography', 'saaspot-core' ),
					'name' => 'content_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .looking-item p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .looking-item p' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Button', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .looking-item .saspot-btn',
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
					'{{WRAPPER}} .looking-item .saspot-btn' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' => __( 'Padding', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .looking-item .saspot-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .looking-item .saspot-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .looking-item .saspot-btn' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .looking-item .saspot-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .looking-item .saspot-btn',
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
						'{{WRAPPER}} .looking-item .saspot-btn:hover, {{WRAPPER}} .looking-item.saspot-hover .saspot-btn' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .looking-item .saspot-btn:hover, {{WRAPPER}} .looking-item.saspot-hover .saspot-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_hover_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .looking-item .saspot-btn:hover, {{WRAPPER}} .looking-item.saspot-hover .saspot-btn',
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
		$looking_image = !empty( $settings['looking_image']['id'] ) ? $settings['looking_image']['id'] : '';	
		$looking_title = !empty( $settings['looking_title'] ) ? $settings['looking_title'] : '';	
		$looking_title_link = !empty( $settings['looking_title_link']['url'] ) ? $settings['looking_title_link']['url'] : '';
		$looking_title_link_external = !empty( $settings['looking_title_link']['is_external'] ) ? 'target="_blank"' : '';
		$looking_title_link_nofollow = !empty( $settings['looking_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$looking_title_link_attr = !empty( $looking_title_link ) ?  $looking_title_link_external.' '.$looking_title_link_nofollow : '';

		$looking_content = !empty( $settings['looking_content'] ) ? $settings['looking_content'] : '';	
		$looking_btn = !empty( $settings['looking_btn'] ) ? $settings['looking_btn'] : '';	
		$looking_btn_link = !empty( $settings['looking_btn_link']['url'] ) ? $settings['looking_btn_link']['url'] : '';
		$looking_btn_link_external = !empty( $settings['looking_btn_link']['is_external'] ) ? 'target="_blank"' : '';
		$looking_btn_link_nofollow = !empty( $settings['looking_btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$looking_btn_link_attr = !empty( $looking_btn_link ) ?  $looking_btn_link_external.' '.$looking_btn_link_nofollow : '';
		

		$looking_btn_icon = !empty( $settings['looking_btn_icon'] ) ? $settings['looking_btn_icon'] : '';	

		$image_url = wp_get_attachment_url( $looking_image );

		$image = $looking_image ? '<div class="saspot-icon"><img src="'.$image_url.'" width="96" alt="Sass"></div>' : '';
		$title_link = $looking_title_link ? '<a href="'.$looking_title_link.'">'.$looking_title.'</a>' : $looking_title;
		$title = $looking_title ? '<h3 class="looking-title">'.$title_link.'</h3>' : '';
		$content = $looking_content ? '<p>'.$looking_content.'</p>' : '';
		$icon = $looking_btn_icon ? ' <i class="'.$looking_btn_icon.'" aria-hidden="true"></i>' : '';
		$button = $looking_btn_link ? '<div class="saspot-btn-wrap"><a href="'.esc_url($looking_btn_link).'" '.$looking_btn_link_attr .' class="saspot-btn saspot-light-blue-bdr-btn">'.$looking_btn.$icon.'</a></div>' : '';

		$output = '<div class="looking-item">'.$image.$title.$content.$button.'</div>';
		echo $output;
		
	}

	/**
	 * Render Looking For widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Looking() );
