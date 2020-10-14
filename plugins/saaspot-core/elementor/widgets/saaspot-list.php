<?php
/*
 * Elementor SaaSpot List Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_List extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_list';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'List', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-list';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot List widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_list'];
	}
	*/
	
	/**
	 * Register SaaSpot List widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_list',
			[
				'label' => esc_html__( 'List Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'list_style',
			[
				'label' => esc_html__( 'List Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'one' => esc_html__( 'Style One', 'saaspot-core' ),
					'two' => esc_html__( 'Style Two (Check List)', 'saaspot-core' ),
					'three' => esc_html__( 'Style Three (Check List)', 'saaspot-core' ),
				],
				'default' => 'one',
				'description' => esc_html__( 'Select your list style.', 'saaspot-core' ),
			]
		);
		
		$repeater = new Repeater();

		$repeater->add_control(
			'list_style',
			[
				'label' => esc_html__( 'List Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'one' => esc_html__( 'Style One', 'saaspot-core' ),
					'two' => esc_html__( 'Style Two (Check List)', 'saaspot-core' ),
					'three' => esc_html__( 'Style Three (Check List)', 'saaspot-core' ),
				],
				'default' => 'one',
				'description' => esc_html__( 'Select your list style.', 'saaspot-core' ),
			]
		);
		$repeater->add_control(
			'tooltip_text',
			[
				'label' => esc_html__( 'Tooltip Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'condition' => [
					'list_style' => 'two',
				],
			]
		);
		$repeater->add_control(
			'list_text',
			[
				'label' => esc_html__( 'Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_sub_text',
			[
				'label' => esc_html__( 'Year', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'condition' => [
					'list_style' => 'three',
				],
			]
		);
		$this->add_control(
			'listItems_groups',
			[
				'label' => esc_html__( 'Lists', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'list_text' => esc_html__( 'Item #1', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_text }}}',
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_text_title_style',
			[
				'label' => esc_html__( 'List Text', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'list_text_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bullet-list li, {{WRAPPER}} .check-list li',
			]
		);
		$this->add_control(
			'list_text_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bullet-list li, {{WRAPPER}} .check-list li' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'list_bullet_color',
			[
				'label' => esc_html__( 'Bullet Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bullet-list li:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .check-list li:before' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render List widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$list_style = !empty( $settings['list_style'] ) ? $settings['list_style'] : '';
		$listItems_groups = !empty( $settings['listItems_groups'] ) ? $settings['listItems_groups'] : [];

		if($list_style === 'two') {
		  $style_cls = 'check-list';
		} elseif($list_style === 'three') {
		  $style_cls = 'check-list style-two';
		} else {
		  $style_cls = 'bullet-list';
		}
		
	  $output = '<ul class="'.$style_cls.'">';

		// Group Param Output
		if( is_array( $listItems_groups ) && !empty( $listItems_groups ) ){
		  foreach ( $listItems_groups as $each_list ) {
			$tooltip_text = $each_list['tooltip_text'] ? '<a href="#0" data-toggle="tooltip" data-placement="top" data-html="true" data-custom-class="tooltip-md" title="'.$each_list['tooltip_text'].'" class="info-link"><i class="fa fa-info-circle" aria-hidden="true"></i></a>' : '';
			$list_text = $each_list['list_text'] ? $each_list['list_text'] : '';
			$list_sub_text = $each_list['list_sub_text'] ? '<span>'.$each_list['list_sub_text'].'</span>' : '';
			if($each_list['list_style'] === 'two') {
			  $output .= '<li>'. $list_text . $tooltip_text .'</li>';
			} elseif($each_list['list_style'] === 'three') {
			  $output .= '<li>'. $list_text . $list_sub_text .'</li>';
			} else {
			  $output .= '<li>'. $list_text .'</li>';
			}
		  }
		}

		$output .= '</ul>';

		echo $output;
		
	}

	/**
	 * Render List widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_List() );