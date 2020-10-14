<?php
/*
 * Elementor SaaSpot Offices Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Offices extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_office';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Offices', 'saaspot-core' );
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
	 * Retrieve the list of scripts the SaaSpot Offices widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_office'];
	}
	*/
	
	/**
	 * Register SaaSpot Offices widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_office',
			[
				'label' => __( 'Offices Item', 'saaspot-core' ),
			]
		);

		$this->add_control(
			'office_image',
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
			'office_title',
			[
				'label' => esc_html__( 'Title Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'office_title_link',
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
			'office_content',
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
					'selector' => '{{WRAPPER}} .office-item',
				]
			);
			$this->add_control(
				'box_border_radius',
				[
					'label' => __( 'Border Radius', 'saaspot-core' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .office-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'box_padding',
				[
					'label' => __( 'Padding', 'saaspot-core' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .office-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .office-item' => 'background: {{VALUE}};',
					],
				]
			);
			$this->add_responsive_control(
				'icon_btm',
				[
					'label' => esc_html__( 'Icon Bottom Space', 'saaspot-core' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'size_units' => [ 'px' ],
					'selectors' => [
						'{{WRAPPER}} .office-item .saspot-icon' => 'padding-bottom: {{SIZE}}{{UNIT}};',
					],
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
					'label' => esc_html__( 'Typography', 'saaspot-core' ),
					'name' => 'sasoff_title_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .office-item h3',
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
							'{{WRAPPER}} .office-item h3, {{WRAPPER}} .office-item h3 a' => 'color: {{VALUE}};',
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
							'{{WRAPPER}} .office-item h3 a:hover' => 'color: {{VALUE}};',
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
					'selector' => '{{WRAPPER}} .office-item p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .office-item p' => 'color: {{VALUE}};',
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
		$office_image = !empty( $settings['office_image']['id'] ) ? $settings['office_image']['id'] : '';	
		$office_title = !empty( $settings['office_title'] ) ? $settings['office_title'] : '';	
		$office_title_link = !empty( $settings['office_title_link']['url'] ) ? $settings['office_title_link']['url'] : '';
		$office_title_link_external = !empty( $settings['office_title_link']['is_external'] ) ? 'target="_blank"' : '';
		$office_title_link_nofollow = !empty( $settings['office_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$office_title_link_attr = !empty( $office_title_link ) ?  $office_title_link_external.' '.$office_title_link_nofollow : '';
		$office_content = !empty( $settings['office_content'] ) ? $settings['office_content'] : '';			

		$image_url = wp_get_attachment_url( $office_image );

		$image = $office_image ? '<div class="saspot-icon"><img src="'.$image_url.'" width="48" alt="Sass"></div>' : '';
		$title_link = $office_title_link ? '<a href="'.$office_title_link.'" '.$office_title_link_attr.'>'.$office_title.'</a>' : $office_title;
		$title = $office_title ? '<h3 class="office-title">'.$title_link.'</h3>' : '';
		$content = $office_content ? '<p>'.$office_content.'</p>' : '';

		$output = '<div class="office-item">'.$image.$title.$content.'</div>';
		echo $output;
		
	}

	/**
	 * Render Offices widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Offices() );