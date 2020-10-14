<?php
/*
 * Elementor SaaSpot Contact Form 7 Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Contact_Form extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_contact_form';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Contact Form', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-wpforms';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Contact Form widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_contact_form'];
	}
	 */
	
	/**
	 * Register SaaSpot Contact Form widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_contact_form',
			[
				'label' => esc_html__( 'Form Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'form_id',
			[
				'label' => esc_html__( 'Select contact form', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => Controls_Helper_Output::get_posts('wpcf7_contact_form'),
			]
		);
		$this->add_control(
			'form_title',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Default title', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'form_content',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Default content', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
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
				'name' => 'sascont_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .saspot-contact-form .section-title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-contact-form .section-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_pad',
			[
				'label' => __( 'Padding', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .saspot-contact-form .section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_form_style',
			[
				'label' => esc_html__( 'Form', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'form_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .saspot-contact-form input[type="text"], 
				{{WRAPPER}} .saspot-contact-form input[type="email"], 
				{{WRAPPER}} .saspot-contact-form input[type="date"], 
				{{WRAPPER}} .saspot-contact-form input[type="time"], 
				{{WRAPPER}} .saspot-contact-form input[type="number"], 
				{{WRAPPER}} .saspot-contact-form textarea, 
				{{WRAPPER}} .saspot-contact-form select, 
				{{WRAPPER}} .saspot-contact-form .form-control, 
				{{WRAPPER}} .saspot-contact-form .nice-select',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'form_border',
				'label' => esc_html__( 'Border', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .saspot-contact-form input[type="text"], 
				{{WRAPPER}} .saspot-contact-form input[type="email"], 
				{{WRAPPER}} .saspot-contact-form input[type="date"], 
				{{WRAPPER}} .saspot-contact-form input[type="time"], 
				{{WRAPPER}} .saspot-contact-form input[type="number"], 
				{{WRAPPER}} .saspot-contact-form textarea, 
				{{WRAPPER}} .saspot-contact-form select, 
				{{WRAPPER}} .saspot-contact-form .form-control, 
				{{WRAPPER}} .saspot-contact-form .nice-select',
			]
		);
		$this->add_control(
			'placeholder_text_color',
			[
				'label' => __( 'Placeholder Text Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-contact-form input:not([type="submit"])::-webkit-input-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .saspot-contact-form input:not([type="submit"])::-moz-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .saspot-contact-form input:not([type="submit"])::-ms-input-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .saspot-contact-form input:not([type="submit"])::-o-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .saspot-contact-form textarea::-webkit-input-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .saspot-contact-form textarea::-moz-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .saspot-contact-form textarea::-ms-input-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .saspot-contact-form textarea::-o-placeholder' => 'color: {{VALUE}} !important;',
				],
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => __( 'Text Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-contact-form input[type="text"], 
					{{WRAPPER}} .saspot-contact-form input[type="email"], 
					{{WRAPPER}} .saspot-contact-form input[type="date"], 
					{{WRAPPER}} .saspot-contact-form input[type="time"], 
					{{WRAPPER}} .saspot-contact-form input[type="number"], 
					{{WRAPPER}} .saspot-contact-form textarea, 
					{{WRAPPER}} .saspot-contact-form select, 
					{{WRAPPER}} .saspot-contact-form .form-control, 
					{{WRAPPER}} .saspot-contact-form .nice-select' => 'color: {{VALUE}} !important;',
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
				'selector' => '{{WRAPPER}} .saspot-contact-form .wpcf7 input[type="submit"]',
			]
		);
		$this->add_responsive_control(
			'btn_width',
			[
				'label' => esc_html__( 'Width', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .saspot-contact-form .wpcf7 input[type="submit"]' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'btn_margin',
			[
				'label' => __( 'Margin', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .saspot-contact-form .wpcf7 input[type="submit"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .saspot-contact-form .wpcf7 input[type="submit"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .saspot-contact-form .wpcf7 input[type="submit"]' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-contact-form .wpcf7 input[type="submit"]' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .saspot-contact-form .wpcf7 input[type="submit"]',
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
						'{{WRAPPER}} .saspot-contact-form .wpcf7 input[type="submit"]:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-contact-form .wpcf7 input[type="submit"]:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_hover_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .saspot-contact-form .wpcf7 input[type="submit"]:hover',
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Contact Form widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$form_id = !empty( $settings['form_id'] ) ? $settings['form_id'] : '';
		$form_title = !empty( $settings['form_title'] ) ? $settings['form_title'] : '';
		$form_content = !empty( $settings['form_content'] ) ? $settings['form_content'] : '';
		
		// Atts If
		$form_title = ( $form_title ) ? '<h2 class="section-title">'. $form_title .'</h2>' : '';
		$form_content = ( $form_content ) ? '<p>'. $form_content .'</p>' : '';

		if ($form_title || $form_content) {
			$title = '<div class="section-title-wrap section-title-style-two">'.$form_title.$form_content.'</div>';
		} else {
			$title = '';
		}

		// Starts
		$output  = '<div class="saspot-contact-form saspot-form">';
		$output .= $title;
		$output .= do_shortcode( '[contact-form-7 id="'. $form_id .'"]' );
		$output .= '</div>';

		echo $output;
		
	}

	/**
	 * Render Contact Form widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Contact_Form() );