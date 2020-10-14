<?php
/*
 * Elementor SaaSpot FAQ Accordion Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_BootAccordion extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_boot_accordion';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'FAQ Accordion', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-bars';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot FAQ Accordion widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_boot_accordion'];
	}
	*/
	
	/**
	 * Register SaaSpot FAQ Accordion widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){

		$this->start_controls_section(
			'section_active',
			[
				'label' => __( 'Accordion Options', 'saaspot-core' ),
			]
		);

		$this->add_control(
			'active',
			[
				'label' => __( 'Active Accordion Number', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => 1,
			]
		);
		
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_boot_accordion',
			[
				'label' => __( 'FAQ Accordion Item', 'saaspot-core' ),
			]
		);		

		$repeater = new Repeater();		
		$repeater->add_control(
			'accordion_title',
			[
				'label' => esc_html__( 'Accordion Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Accordion Title', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'accordion_content',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'default' => esc_html__( 'your content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
			]
		);
		$this->add_control(
			'bootAccordion_groups',
			[
				'label' => esc_html__( 'FAQ Accordion Items', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'accordion_title' => esc_html__( 'Item #1', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ accordion_title }}}',
			]
		);
		
		$this->end_controls_section();// end: Section		

		// Section
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Section', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'section_width',
			[
				'label' => esc_html__( 'Width', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1200,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .faq-wrap' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'section_border',
				'label' => esc_html__( 'Border', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .card',
			]
		);
		$this->add_control(
			'active_border_color',
			[
				'label' => esc_html__( 'Active Border Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .faq-wrap .show .card-body:after' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'section_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .card, {{WRAPPER}} .card-header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'name' => 'sasacc_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .card-header h4 a',
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
						'{{WRAPPER}} .card-header h4 a.collapsed, {{WRAPPER}} .card-header h4 a.collapsed:before' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
					'title_hover',
					[
						'label' => esc_html__( 'Active', 'saaspot-core' ),
					]
				);
			$this->add_control(
				'title_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .card-header h4 a:hover, {{WRAPPER}} .card-header h4 a, {{WRAPPER}} .card-header h4 a:hover:before, {{WRAPPER}} .card-header h4 a:before' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render FAQ Accordion widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		// FAQ Accordion query
		$boot_accordion = $this->get_settings_for_display( 'bootAccordion_groups' );
		//$one_active  = ( isset( $settings['one_active'] ) && ( 'true' == $settings['one_active'] ) ) ? true : false;
		$settings = $this->get_settings_for_display();
		$active_tab = !empty( $settings['active'] ) ? $settings['active'] : '';
	
			$output = '';
			if( !empty( $boot_accordion ) && is_array( $boot_accordion ) ){

				$output .= '<div class="faq-wrap"><div id="accordion" class="accordion collapse-others">';

				$key = 1;
				foreach ( $boot_accordion as $each_logo ) {

				  $opened    = ( $key == $active_tab ) ? ' show' : '';		
				  $collapsed    = ( $key == $active_tab ) ? '' : 'class="collapsed"';		
    			$uniqtab     = uniqid();

					$output .= '<div class="card'.$opened.'">
					              <div class="card-header" id="headingOne'. esc_attr($key.$uniqtab) .'">
					                <h4 class="accordion-title">
					                  <a href="javascript:void(0);" '.$collapsed.' data-toggle="collapse" data-target="#saspotAcc-'. esc_attr($key.$uniqtab) .'" aria-expanded="true" aria-controls="saspotAcc-'. esc_attr($key.$uniqtab) .'">
					                    '.$each_logo['accordion_title'] .'
					                  </a>
					                </h4>
					              </div>
					              <div id="saspotAcc-'. esc_attr($key.$uniqtab) .'" class="collapse'. $opened .'" data-parent="#accordion">
					                <div class="card-body">'.do_shortcode($each_logo['accordion_content']).'</div>
					              </div>
					            </div>';
				$key++;
				}

				$output .= '</div></div>';
			}

			echo $output;
		
	}

	/**
	 * Render FAQ Accordion widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_BootAccordion() );