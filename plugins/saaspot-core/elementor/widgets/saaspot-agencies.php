<?php
/*
 * Elementor SaaSpot Agencies Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Agencies extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_agency';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Agencies', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-users';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Agencies widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_agency'];
	}
	*/
	
	/**
	 * Register SaaSpot Agencies widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_agency',
			[
				'label' => __( 'Agencies Item', 'saaspot-core' ),
			]
		);

		$this->add_control(
			'agency_image',
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
			'agency_tag',
			[
				'label' => esc_html__( 'New Tag', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Tag Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type tag text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'agency_title',
			[
				'label' => esc_html__( 'Title Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'agency_title_link',
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
			'agency_content',
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
					'selector' => '{{WRAPPER}} .agency-item',
				]
			);
			$this->add_control(
				'box_border_radius',
				[
					'label' => __( 'Border Radius', 'saaspot-core' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .agency-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .agency-item' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .agency-item .saspot-icon' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Tag
		$this->start_controls_section(
			'section_tag_style',
			[
				'label' => esc_html__( 'Tag', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Typography', 'saaspot-core' ),
					'name' => 'tag_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .agency-item .saspot-label',
				]
			);
			$this->add_control(
				'tag_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .agency-item .saspot-label' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'tag_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .agency-item .saspot-label' => 'background: {{VALUE}};',
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
					'name' => 'sasage_title_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .agency-item h3',
				]
			);
			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .agency-item h3' => 'color: {{VALUE}};',
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
					'label' => esc_html__( 'Typography', 'saaspot-core' ),
					'name' => 'content_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .agency-item p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .agency-item p' => 'color: {{VALUE}};',
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
		$agency_image = !empty( $settings['agency_image']['id'] ) ? $settings['agency_image']['id'] : '';	
		$agency_tag = !empty( $settings['agency_tag'] ) ? $settings['agency_tag'] : '';	
		$agency_title = !empty( $settings['agency_title'] ) ? $settings['agency_title'] : '';	
		$agency_title_link = !empty( $settings['agency_title_link']['url'] ) ? $settings['agency_title_link']['url'] : '';
		$agency_title_link_external = !empty( $settings['agency_title_link']['is_external'] ) ? 'target="_blank"' : '';
		$agency_title_link_nofollow = !empty( $settings['agency_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$agency_title_link_attr = !empty( $agency_title_link ) ?  $agency_title_link_external.' '.$agency_title_link_nofollow : '';
		$agency_content = !empty( $settings['agency_content'] ) ? $settings['agency_content'] : '';			

		$image_url = wp_get_attachment_url( $agency_image );

		$tag = $agency_tag ? '<div class="saspot-label">'.$agency_tag.'</div>' : '';
		$image = $agency_image ? '<div class="saspot-icon"><img src="'.$image_url.'" width="71" alt="Sass"></div>' : '';
		$title_link = $agency_title_link ? '<a href="'.$agency_title_link.'">'.$agency_title.'</a>' : $agency_title;
		$title = $agency_title ? '<h3 class="agency-title">'.$title_link.'</h3>' : '';
		$content = $agency_content ? '<p>'.$agency_content.'</p>' : '';

		$output = '<div class="agency-item">'.$tag.$image.$title.$content.'</div>';
		echo $output;
		
	}

	/**
	 * Render Agencies widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Agencies() );