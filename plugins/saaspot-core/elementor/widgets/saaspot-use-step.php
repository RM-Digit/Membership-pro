<?php
/*
 * Elementor SaaSpot Use Step Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_UseStep extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_use_step';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Use Step', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-road';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot SaaSpot Use Step widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_use_step'];
	}
	*/
	
	/**
	 * Register SaaSpot SaaSpot Use Step widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_use_step',
			[
				'label' => esc_html__( 'Use Step Options', 'saaspot-core' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'use_step_title',
			[
				'label' => esc_html__( 'Use Step Title', 'saaspot-core' ),
				'default' => esc_html__( 'Image', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'use_step_image',
			[
				'label' => esc_html__( 'Upload Icon', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your icon image.', 'saaspot-core'),
			]
		);	
		$repeater->add_control(
			'need_arrow',
			[
				'label' => esc_html__( 'Need Arrow', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$this->add_control(
			'use_step',
			[
				'label' => esc_html__( 'Use Step Items', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'use_step_title' => esc_html__( 'Image', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ use_step_title }}}',
			]
		);
		
		$this->end_controls_section();// end: Section

		// Style
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Step', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'count_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-use-step .saspot-icon' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( ' Border Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-use-step .saspot-icon' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->start_controls_tabs( 'arrow_style' );
			$this->start_controls_tab(
					'arrow_normal',
					[
						'label' => esc_html__( 'Normal', 'saaspot-core' ),
					]
				);
			$this->add_control(
				'arrow_color',
				[
					'label' => esc_html__( 'Arrow Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .use-step-arrow' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
					'arrow_hover',
					[
						'label' => esc_html__( 'Moving', 'saaspot-core' ),
					]
				);
			$this->add_control(
				'arrow_hover_color',
				[
					'label' => esc_html__( 'Arrow Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .use-step-arrow:before' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Use Step widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$use_step = !empty( $settings['use_step'] ) ? $settings['use_step'] : [];

		$output = '<div class="saspot-use-step">';

		// Group Param Output
		if( is_array( $use_step ) && !empty( $use_step ) )
		foreach ( $use_step as $each_logo ) {

		  $title = !empty( $each_logo['use_step_title'] ) ? $each_logo['use_step_title'] : '';
		  $image_url = wp_get_attachment_url( $each_logo['use_step_image']['id'] );
		  $need_arrow = !empty( $each_logo['need_arrow'] ) ? $each_logo['need_arrow'] : '';

		  $image = $image_url ? '<img src="'.$image_url.'" width="63" alt="Use Step">' : '';

			if($need_arrow === 'true') {
			  $arrow = '<div class="use-step-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div>';
			} else {
			  $arrow = '';
			}

		  $output .= '<div class="saspot-icon">
                    <div class="saspot-table-wrap">
                      <div class="saspot-align-wrap">'.$image.'</div>
                    </div>
                    '.$arrow.'
                  </div>';

		}

		$output .= '</div>';

		echo $output;
		
	}

	/**
	 * Render Use Step widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_UseStep() );