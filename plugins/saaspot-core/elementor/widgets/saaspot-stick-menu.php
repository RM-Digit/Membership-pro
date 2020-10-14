<?php
/*
 * Elementor SaaSpot Stick Menu Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_StickMenu extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_stick_menu';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Stick Menu', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-sticky-note';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot SaaSpot Stick Menu widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_stick_menu'];
	}
	*/
	
	/**
	 * Register SaaSpot SaaSpot StickMenu widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_stick_menu',
			[
				'label' => esc_html__( 'Stick Menu Options', 'saaspot-core' ),
			]
		);
		
		$repeater = new Repeater();

		$repeater->add_control(
			'menu_title',
			[
				'label' => esc_html__( 'Stick Menu Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type item title here', 'saaspot-core' ),
			]
		);
		$repeater->add_control(
			'menu_title_link',
			[
				'label' => esc_html__( 'Stick Menu Title Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'saaspot-core' ),
				'label_block' => true,
				'show_external' => true,
				'default' => [
					'url' => '',
				],
			]
		);
		
		$this->add_control(
			'stick_menu',
			[
				'label' => esc_html__( 'Stick Menu Items', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'menu_title' => esc_html__( 'Solutions', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ menu_title }}}',
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
			'menu_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-menu' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Menu Style
		$this->start_controls_section(
			'section_menu_style',
			[
				'label' => esc_html__( 'Menu', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'menu_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .saspot-menu ul li a, {{WRAPPER}} .saspot-menu ul li',
			]
		);
		$this->start_controls_tabs( 'menu_style' );
			$this->start_controls_tab(
					'menu_normal',
					[
						'label' => esc_html__( 'Normal', 'saaspot-core' ),
					]
				);
			$this->add_control(
				'menu_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-menu ul li a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
					'menu_hover',
					[
						'label' => esc_html__( 'Hover', 'saaspot-core' ),
					]
				);
			$this->add_control(
				'menu_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-menu ul li a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render StickMenu widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$stick_menu = !empty( $settings['stick_menu'] ) ? $settings['stick_menu'] : [];

		$output = '<div class="saspot-menu saspot-sticky"><ul>';

		// Group Param Output
		if( is_array( $stick_menu ) && !empty( $stick_menu ) )
		foreach ( $stick_menu as $each_logo ) {

		  $title = !empty( $each_logo['menu_title'] ) ? $each_logo['menu_title'] : '';
		  $title_link = !empty( $each_logo['menu_title_link']['url'] ) ? $each_logo['menu_title_link']['url'] : '';
			$title_external = !empty( $each_logo['menu_title_link']['is_external'] ) ? 'target="_blank"' : '';
			$title_nofollow = !empty( $each_logo['menu_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
			$title_link_attr = $title_external.' '.$title_nofollow;

			$menu_title = $title_link ? '<a href="'.esc_url($title_link).'" '.$title_link_attr.'>'.$title.'</a>' : $title;

		  $output .= '<li>'.$menu_title.'</li>';

		}

		$output .= '</ul></div>';

		echo $output;
		
	}

	/**
	 * Render Stick Menu widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_StickMenu() );