<?php
/*
 * Elementor SaaSpot Commission Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Commission extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_commission';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Commission', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-table';
	}

	/**
	 * Retrieve the commission of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the commission of scripts the SaaSpot Commission widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_commission'];
	}
	*/
	
	/**
	 * Register SaaSpot Commission widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_action',
			[
				'label' => esc_html__( 'Commission Action', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'action_title',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		
		$repeater = new Repeater();

		$repeater->add_control(
			'action_text',
			[
				'label' => esc_html__( 'Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'action_items',
			[
				'label' => esc_html__( 'Commissions', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'action_text' => esc_html__( 'Free registration', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ action_text }}}',
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_commission',
			[
				'label' => esc_html__( 'Your Commission', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'commission_title',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		
		$repeaterOne = new Repeater();

		$repeaterOne->add_control(
			'commission_text',
			[
				'label' => esc_html__( 'Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'commission_items',
			[
				'label' => esc_html__( 'Commissions', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'commission_text' => esc_html__( '$1.50', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeaterOne->get_controls(),
				'title_field' => '{{{ commission_text }}}',
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
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .commission-wrap' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Border Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .commission-item, {{WRAPPER}} .commission-title' => 'border-color: {{VALUE}};',
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
						'min' => 0,
						'max' => 1000,
						'step' => 2,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .commission-wrap' => 'max-width: {{SIZE}}{{UNIT}};',
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
				'name' => 'sascom_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .commission-item h4',
			]
		);
		$this->add_control(
			'commission_title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .commission-item h4' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		// Text
		$this->start_controls_section(
			'section_text_style',
			[
				'label' => esc_html__( 'Commission Text', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'commission_text_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .commission-info ul li',
			]
		);
		$this->add_control(
			'commission_text_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .commission-info ul li' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Commission widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$action_items = !empty( $settings['action_items'] ) ? $settings['action_items'] : [];
		$commission_items = !empty( $settings['commission_items'] ) ? $settings['commission_items'] : [];
		$action_title = !empty( $settings['action_title'] ) ? $settings['action_title'] : [];
		$commission_title = !empty( $settings['commission_title'] ) ? $settings['commission_title'] : [];

		$action_title = $action_title ? '<h4 class="commission-title">'.$action_title.'</h4>' : '';
		$commission_title = $commission_title ? '<h4 class="commission-title">'.$commission_title.'</h4>' : '';
		
	  $output = '<div class="commission-wrap">
			          <div class="row">
			            <div class="col-sm-6">
			              <div class="commission-item">
			                '.$action_title.'
			                <div class="commission-info">
			                  <ul>';

		// Group Param Output
		if( is_array( $action_items ) && !empty( $action_items ) ){
		  foreach ( $action_items as $each_action ) {
			$action_text = $each_action['action_text'] ? $each_action['action_text'] : '';
			  $output .= '<li>'. $action_text .'</li>';
		  }
		}
		$output .= '</ul>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="commission-item">
                '.$commission_title.'
                <div class="commission-info">
                  <ul>';
    // Group Param Output
		if( is_array( $commission_items ) && !empty( $commission_items ) ){
		  foreach ( $commission_items as $each_commission ) {
			$commission_text = $each_commission['commission_text'] ? $each_commission['commission_text'] : '';
			  $output .= '<li>'. $commission_text .'</li>';
		  }
		}
    $output .= '</ul>
                </div>
              </div>
            </div>
          </div>
        </div>';

		echo $output;
		
	}

	/**
	 * Render Commission widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Commission() );