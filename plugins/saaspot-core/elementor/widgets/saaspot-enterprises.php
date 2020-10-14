<?php
/*
 * Elementor SaaSpot Enterprises Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Enterprises extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_enterprises';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Enterprises', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa  fa-bar-chart';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Enterprises widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_enterprises'];
	}
	*/
	
	/**
	 * Register SaaSpot Enterprises widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_enterprises',
			[
				'label' => __( 'Enterprises Item', 'saaspot-core' ),
			]
		);

		$this->add_control(
			'enterprises_title',
			[
				'label' => esc_html__( 'Title Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'enterprises_content',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'default' => esc_html__( 'your content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'enterprises_more_text',
			[
				'label' => esc_html__( 'More Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'More Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type more text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'enterprises_more_link',
			[
				'label' => esc_html__( 'More Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'enterprises_link_icon',
			[
				'label' => esc_html__( 'Link Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-angle-right',
			]
		);
		$this->add_control(
			'enterprises_image',
			[
				'label' => esc_html__( 'Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
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
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();// end: Section

		// Style
		$this->start_controls_section(
			'section_box_style',
			[
				'label' => esc_html__( 'Section', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
				'bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .enterprises-wrap' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'entrance_animation',
				[
					'label' => esc_html__( 'Image Entrance Animation', 'saaspot-core' ),
					'type' => Controls_Manager::ANIMATION,
				]
			);
			$this->add_control(
				'entrance_animation_delay',
				[
					'label' => esc_html__( 'Animation Delay', 'saaspot-core' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( '1', 'saaspot-core' ),
					'label_block' => true,
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
					'name' => 'sasent_title_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .enterprises-info h2',
				]
			);
			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .enterprises-info h2' => 'color: {{VALUE}};',
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
					'selector' => '{{WRAPPER}} .enterprises-info p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .enterprises-info p' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section

		// Link
		$this->start_controls_section(
			'section_link_style',
			[
				'label' => esc_html__( 'Link', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'link_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .enterprises-wrap .saspot-link',
			]
		);
		$this->add_control(
			'link_padding',
			[
				'label' => __( 'Padding', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .enterprises-wrap .saspot-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'link_style' );
			$this->start_controls_tab(
				'link_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'link_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .enterprises-wrap .saspot-link' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_border_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .enterprises-wrap .saspot-link:after' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'link_hover',
				[
					'label' => esc_html__( 'Hover', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'link_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .enterprises-wrap .saspot-link:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_border_hover_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .enterprises-wrap .saspot-link:hover:after' => 'background-color: {{VALUE}};',
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
		$enterprises_image = !empty( $settings['enterprises_image']['id'] ) ? $settings['enterprises_image']['id'] : '';	
		$enterprises_title = !empty( $settings['enterprises_title'] ) ? $settings['enterprises_title'] : '';	
		$enterprises_content = !empty( $settings['enterprises_content'] ) ? $settings['enterprises_content'] : '';	
		$enterprises_more_text = !empty( $settings['enterprises_more_text'] ) ? $settings['enterprises_more_text'] : '';	
		$enterprises_more_link = !empty( $settings['enterprises_more_link']['url'] ) ? $settings['enterprises_more_link']['url'] : '';
		$enterprises_more_link_external = !empty( $settings['enterprises_more_link']['is_external'] ) ? 'target="_blank"' : '';
		$enterprises_more_link_nofollow = !empty( $settings['enterprises_more_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$enterprises_more_link_attr = !empty( $enterprises_more_link ) ?  $enterprises_more_link_external.' '.$enterprises_more_link_nofollow : '';
		$enterprises_link_icon = !empty( $settings['enterprises_link_icon'] ) ? $settings['enterprises_link_icon'] : '';	
		$entrance_animation = !empty( $settings['entrance_animation'] ) ? $settings['entrance_animation'] : '';	
		$entrance_animation_delay = !empty( $settings['entrance_animation_delay'] ) ? $settings['entrance_animation_delay'] : '';	

		$image_url = wp_get_attachment_url( $enterprises_image );

		$title = $enterprises_title ? '<h2 class="enterprises-title">'.$enterprises_title.'</h2>' : '';
		$content = $enterprises_content ? '<p>'.$enterprises_content.'</p>' : '';
		$icon = $enterprises_link_icon ? ' <i class="'.$enterprises_link_icon.'" aria-hidden="true"></i>' : '';
		$link = $enterprises_more_link ? '<div class="saspot-link-wrap"><a href="'.$enterprises_more_link.'" '.$enterprises_more_link_attr.' class="saspot-link">'.$enterprises_more_text.$icon.'</a></div>' : '';

		$entrance_animation = $entrance_animation ? $entrance_animation : 'fadeInUp';
		$entrance_animation_delay = $entrance_animation_delay ? $entrance_animation_delay : '1';
		$image = $enterprises_image ? '<div class="saspot-image wow '.$entrance_animation.'" data-wow-duration="1s" data-wow-delay="'.$entrance_animation_delay.'s"><img src="'.$image_url.'" alt="Sass"></div>' : '';


		$output = '<div class="enterprises-wrap saspot-overlay enterprises">
		            <div class="enterprises-info">'.$title.$content.$link.'</div>'.$image.'
		          </div>';
		echo $output;
		
	}

	/**
	 * Render Enterprises widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Enterprises() );