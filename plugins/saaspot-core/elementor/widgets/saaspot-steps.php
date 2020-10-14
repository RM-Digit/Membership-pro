<?php
/*
 * Elementor SaaSpot Steps Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Steps extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_steps';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Steps', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-steam';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Steps widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_steps'];
	}
	*/
	
	/**
	 * Register SaaSpot Steps widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_steps',
			[
				'label' => __( 'Steps Content', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'steps_subtitle',
			[
				'label' => esc_html__( 'Sub Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Sub Title', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type subtitle text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'upload_type',
			[
				'label' => __( 'Upload Type', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'image' => esc_html__( 'Image', 'saaspot-core' ),
					'icon' => esc_html__( 'Icon', 'saaspot-core' ),
				],
				'default' => 'icon',
			]
		);
		$this->add_control(
			'steps_subtitle_image',
			[
				'label' => esc_html__( 'Upload Icon', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'upload_type' => 'image',
				],
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your icon image.', 'saaspot-core'),
			]
		);
		$this->add_control(
			'steps_subtitle_icon',
			[
				'label' => esc_html__( 'Sub Title Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'icon-basic-sheet-txt',
				'condition' => [
					'upload_type' => 'icon',
				],
			]
		);
		$this->add_control(
			'steps_title',
			[
				'label' => esc_html__( 'Title Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'steps_content',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'default' => esc_html__( 'your content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);

		$this->add_responsive_control(
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
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'section_padding',
			[
				'label' => __( 'Section Padding', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .step-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'min' => 200,
						'max' => 1500,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .step-info' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_steps_btn',
			[
				'label' => esc_html__( 'Button/Link Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'btn_style',
			[
				'label' => esc_html__( 'Button/Link Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One', 'saaspot-core' ),
					'style-two' => esc_html__( 'Style Two', 'saaspot-core' ),
					'style-three' => esc_html__( 'Style Three (Button)', 'saaspot-core' ),
				],
				'default' => 'style-one',
				'description' => esc_html__( 'Select your link style.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'steps_btn',
			[
				'label' => esc_html__( 'Button Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Button Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type btn text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'steps_btn_link',
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
			'steps_btn_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-angle-right',
			]
		);
		$this->add_control(
			'icon_alignment',
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
				'name' => 'sasstp_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .step-info h2',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .step-info h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_padding',
			[
				'label' => __( 'Title Padding', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .step-info h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'label' => esc_html__( 'Typography', 'saaspot-core' ),
					'name' => 'sasstp_subtitle_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .step-subtitle',
				]
			);
			$this->add_control(
				'subtitle_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .step-subtitle' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'icon_color',
				[
					'label' => esc_html__( 'Icon Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .step-subtitle i' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'icon_size',
				[
					'label' => esc_html__( 'Icon Size', 'saaspot-core' ),
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
						'{{WRAPPER}} .step-subtitle i' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'selector' => '{{WRAPPER}} .step-info p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .step-info p' => 'color: {{VALUE}};',
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
				'condition' => [
					'btn_style' => array('style-one','style-two'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'link_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .step-info .saspot-link',
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
						'{{WRAPPER}} .step-info .saspot-link' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_border_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .step-info .saspot-link:after' => 'background-color: {{VALUE}};',
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
						'{{WRAPPER}} .step-info .saspot-link:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_border_hover_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .step-info .saspot-link:hover:after' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section

		// Button
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Button', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'btn_style' => array('style-three'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .step-info .saspot-btn',
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
					'{{WRAPPER}} .step-info .saspot-btn' => 'min-width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .step-info .saspot-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .step-info .saspot-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .step-info .saspot-btn' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .step-info .saspot-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .step-info .saspot-btn',
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
						'{{WRAPPER}} .step-info .saspot-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .step-info .saspot-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_hover_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .step-info .saspot-btn:hover',
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
		$steps_subtitle = !empty( $settings['steps_subtitle'] ) ? $settings['steps_subtitle'] : '';	
		$upload_type = !empty( $settings['upload_type'] ) ? $settings['upload_type'] : '';
		$steps_subtitle_image = !empty( $settings['steps_subtitle_image']['id'] ) ? $settings['steps_subtitle_image']['id'] : '';	
		$steps_subtitle_icon = !empty( $settings['steps_subtitle_icon'] ) ? $settings['steps_subtitle_icon'] : '';	
		$steps_title = !empty( $settings['steps_title'] ) ? $settings['steps_title'] : '';	
		$steps_content = !empty( $settings['steps_content'] ) ? $settings['steps_content'] : '';	

		$btn_style = !empty( $settings['btn_style'] ) ? $settings['btn_style'] : '';	
		$steps_btn = !empty( $settings['steps_btn'] ) ? $settings['steps_btn'] : '';	
		$steps_btn_link = !empty( $settings['steps_btn_link']['url'] ) ? $settings['steps_btn_link']['url'] : '';
		$steps_btn_link_external = !empty( $settings['steps_btn_link']['is_external'] ) ? 'target="_blank"' : '';
		$steps_btn_link_nofollow = !empty( $settings['steps_btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$steps_btn_link_attr = !empty( $steps_btn_link ) ?  $steps_btn_link_external.' '.$steps_btn_link_nofollow : '';

		$steps_btn_icon = !empty( $settings['steps_btn_icon'] ) ? $settings['steps_btn_icon'] : '';	
		$icon_alignment = !empty( $settings['icon_alignment'] ) ? $settings['icon_alignment'] : '';	

		// Image
		$image_url = wp_get_attachment_url( $steps_subtitle_image );
		$saaspot_alt = get_post_meta($steps_subtitle_image, '_wp_attachment_image_alt', true);

		$subtitle_image = $image_url ? '<img src="'.$image_url.'" alt="'.$saaspot_alt.'">' : '';
		$subtitle_icon = $steps_subtitle_icon ? '<i class="'.$steps_subtitle_icon.'"></i> ' : '';

		if($upload_type === 'icon'){
		  $icon_main = $subtitle_icon;
		} else {
		  $icon_main = $subtitle_image;
		}

		$subtitle = ($steps_subtitle || $icon_main) ? '<div class="step-subtitle">'.$icon_main.$steps_subtitle.'</div>' : '';
		$title = $steps_title ? '<h2 class="step-title">'.$steps_title.'</h2>' : '';
		$content = $steps_content ? '<p>'.$steps_content.'</p>' : '';

		$icon = $steps_btn_icon ? '<i class="'.$steps_btn_icon.'" aria-hidden="true"></i>' : '';
		if($icon_alignment === 'left') {
		  $icon_left = $icon.' ';
		  $icon_right = '';
		} else {
		  $icon_left = '';
		  $icon_right = ' '.$icon;
		}
		if($btn_style === 'style-two') {
		  $style_class = 'saspot-link-wrap link-wrap-style-two';
		  $btn_class = 'saspot-link';
		} elseif ($btn_style === 'style-three') {
		  $style_class = 'saspot-btn-wrap';
		  $btn_class = 'saspot-btn saspot-light-blue-btn';
		} else {
		  $style_class = 'saspot-link-wrap';
		  $btn_class = 'saspot-link';
		}
		$link = $steps_btn_link ? '<div class="'.$style_class.'"><a href="'.$steps_btn_link.'" '.$steps_btn_link_attr.' class="'.$btn_class.'">'.$icon_left.$steps_btn.$icon_right.'</a></div>' : '';

		$output = '<div class="step-info">'.$subtitle.$title.$content.$link.'</div>';
		echo $output;
		
	}

	/**
	 * Render Steps widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Steps() );