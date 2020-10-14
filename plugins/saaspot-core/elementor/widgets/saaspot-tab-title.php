<?php
/*
 * Elementor SaaSpot Tab Title Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_TabTitle extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_tab_title';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Tab Title', 'saaspot-core' );
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
	 * Retrieve the list of scripts the SaaSpot Tab Title widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_tab_title'];
	}
	*/
	
	/**
	 * Register SaaSpot Tab Title widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){

		$this->start_controls_section(
			'section_active',
			[
				'label' => __( 'Tab Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'active',
			[
				'label' => __( 'Active Tab Number', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => 1,
			]
		);
		$this->add_control(
			'tab_style',
			[
				'label' => esc_html__( 'Tab Title Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'one' => esc_html__( 'Style One', 'saaspot-core' ),
					'two' => esc_html__( 'Style Two', 'saaspot-core' ),
				],
				'default' => 'one',
				'description' => esc_html__( 'Select your tab title style.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'tab_title_before',
			[
				'label' => esc_html__( 'Before Price Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter title count here', 'saaspot-core' ),
				'label_block' => true,
				'condition' => [
					'tab_style' => 'one',
				],
			]
		);
		$this->add_control(
			'tab_title_after',
			[
				'label' => esc_html__( 'After Price Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter title count here', 'saaspot-core' ),
				'label_block' => true,
				'condition' => [
					'tab_style' => 'one',
				],
			]
		);
		$this->add_control(
			'title_alignment',
			[
				'label' => esc_html__( 'Alignment', 'saaspot-core' ),
				'type' => Controls_Manager::CHOOSE,
				'condition' => [
					'tab_style' => array('two'),
				],
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
				'default' => 'left',
			]
		);
		
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_tab_title',
			[
				'label' => __( 'Tab Title Group', 'saaspot-core' ),
			]
		);		

		$repeater = new Repeater();		
		$repeater->add_control(
			'tab_title',
			[
				'label' => esc_html__( 'Tab Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '500', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type tab title here', 'saaspot-core' ),
				'label_block' => true,
			]
		);	
		$repeater->add_control(
			'tab_id',
			[
				'label' => esc_html__( 'Tab ID', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type tab id here', 'saaspot-core' ),
				'label_block' => true,
			]
		);		
		$this->add_control(
			'title_groups',
			[
				'label' => esc_html__( 'Title Items', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title' => esc_html__( '500', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ tab_title }}}',
			]
		);
		
		$this->end_controls_section();// end: Section	

		// Tab Title Style
		$this->start_controls_section(
			'section_tab_style',
			[
				'label' => esc_html__( 'Tab Title', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'tab_style' => 'two',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sastabt_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .nav-tabs .nav-link',
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
						'{{WRAPPER}} .nav-tabs .nav-link' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'title_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nav-tabs .nav-link' => 'background-color: {{VALUE}};',
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
						'{{WRAPPER}} .nav-tabs .nav-link:hover, {{WRAPPER}} .nav-tabs .nav-link.active' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'title_bg_hover_color',
				[
					'label' => esc_html__( 'Background Hover Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nav-tabs .nav-link:hover, {{WRAPPER}} .nav-tabs .nav-link.active' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		
		$this->end_controls_section();// end: Section

		// Tab Title Style
		$this->start_controls_section(
			'section_tab_style_one',
			[
				'label' => esc_html__( 'Tab Title', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'tab_style' => 'one',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sastabt_title_typography_one',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .nav-tabs .nav-link',
			]
		);
		$this->start_controls_tabs( 'title_style_one' );
			$this->start_controls_tab(
					'title_normal_one',
					[
						'label' => esc_html__( 'Normal', 'saaspot-core' ),
					]
				);
			$this->add_control(
				'title_color_one',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nav-tabs .nav-link' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'title_border_color_one',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .pricing-plan .nav' => 'border-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
					'title_hover_one',
					[
						'label' => esc_html__( 'Active', 'saaspot-core' ),
					]
				);
			$this->add_control(
				'title_hover_color_one',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nav-tabs .nav-link:hover, {{WRAPPER}} .nav-tabs .nav-link.active' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'title_border_hover_color_one',
				[
					'label' => esc_html__( 'Border Hover Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tabs-style-three .nav-link.active:after' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Tab Title widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		// Tab Title query
		$settings = $this->get_settings_for_display();
		$tab_style = !empty( $settings['tab_style'] ) ? $settings['tab_style'] : '';
		$active = !empty( $settings['active'] ) ? $settings['active'] : '';
		$tab_title_before = !empty( $settings['tab_title_before'] ) ? $settings['tab_title_before'] : '';
		$tab_title_after = !empty( $settings['tab_title_after'] ) ? $settings['tab_title_after'] : '';
		$title_groups = !empty( $settings['title_groups'] ) ? $settings['title_groups'] : '';
		$title_alignment = !empty( $settings['title_alignment'] ) ? $settings['title_alignment'] : '';

		if($title_alignment === 'right') {
		  $align_class = ' toggle-align';
		} else {
		  $align_class = '';
		}

			$output = '<div class="tab-group-wrap">';
			if( !empty( $title_groups ) && is_array( $title_groups ) ){
				if ($tab_style === 'two') {
					$output .= '<div class="guide-info'.$align_class.'">
					              <nav>
					                <div class="nav flex-column nav-tabs" id="nav-tab" role="tablist">';
						              	$key = 1;
					                	foreach ( $title_groups as $each_logo ) {
														$tab_id = !empty( $each_logo['tab_id'] ) ? $each_logo['tab_id'] : '';
														$active_cls = ( $key == $active ) ? ' active' : '';
														$id = $tab_id ? sanitize_title($tab_id) : sanitize_title($each_logo['tab_title']);
															$output .= '<a class="nav-item nav-link'.$active_cls.'" id="nav-'.$key.$id.'-tab" data-toggle="tab" href="#nav-'.$key.$id.'" role="tab" aria-controls="nav-'.$key.$id.'" aria-selected="true">'.$each_logo['tab_title'].'</a>';
														$key++;
														}
              $output .= '</div>
					              </nav>
					            </div>';
				} else {				
					$output .= '<div class="pricing-plan">
				                <h5 class="pricing-plan-title">'.$tab_title_before.'<span></span>'.$tab_title_after.'</h5>
				                <nav>
				                  <div class="nav nav-tabs tabs-style-three nav-justified" id="nav-tab" role="tablist">';
						              	$key = 1;
				                  	foreach ( $title_groups as $each_logo ) {
														$tab_id = !empty( $each_logo['tab_id'] ) ? $each_logo['tab_id'] : '';
														$active_cls = ( $key == $active ) ? ' active' : '';
														$id = $tab_id ? sanitize_title($tab_id) : sanitize_title($each_logo['tab_title']);
															$output .= '<a class="nav-item nav-link'.$active_cls.'" id="nav-'.$key.$id.'-tab" data-toggle="tab" href="#nav-'.$key.$id.'" role="tab" aria-controls="nav-'.$key.$id.'" aria-selected="true">'.$each_logo['tab_title'].'</a>';
														$key++;
														}
		          $output .= '</div>
				                </nav>
				              </div>';
			  }
			}
			$output .= '</div>';
			echo $output;
		
	}

	/**
	 * Render Tab Title widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_TabTitle() );