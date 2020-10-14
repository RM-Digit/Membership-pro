<?php
/*
 * Elementor SaaSpot Work Process Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_WorkProcess extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_work_process';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Work Process', 'saaspot-core' );
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
	 * Retrieve the list of scripts the SaaSpot SaaSpot Work Process widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_work_process'];
	}
	*/
	
	/**
	 * Register SaaSpot SaaSpot WorkProcess widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_work_process',
			[
				'label' => esc_html__( 'Process Options', 'saaspot-core' ),
			]
		);
		
		$repeater = new Repeater();
		
		$repeater->add_control(
			'work_process_logo',
			[
				'label' => esc_html__( 'Upload Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				
			]
		);
		$repeater->add_control(
			'process_title',
			[
				'label' => esc_html__( 'Process title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type item title here', 'saaspot-core' ),
			]
		);
		$repeater->add_control(
			'process_title_link',
			[
				'label' => esc_html__( 'Process Title Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'saaspot-core' ),
				'label_block' => true,
				'show_external' => true,
				'default' => [
					'url' => '',
				],
			]
		);
		$repeater->add_control(
			'steps_content',
			[
				'label' => esc_html__( 'Process Content', 'saaspot-core' ),
				'default' => esc_html__( 'your content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'work_process',
			[
				'label' => esc_html__( 'Process Items', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'process_title' => esc_html__( 'Prospect', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ process_title }}}',
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
			Group_Control_Typography::get_type(),
			[
				'name' => 'count_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .process-counter',
			]
		);
		$this->add_control(
			'count_color',
			[
				'label' => esc_html__( 'Count Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .process-counter' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'count_bg_color',
			[
				'label' => esc_html__( 'Count Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .process-counter' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( ' Step Border Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .process-item:before, {{WRAPPER}} .process-item:after' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Title Style
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
				'name' => 'sasproc_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .process-info h3',
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
						'{{WRAPPER}} .process-info h3, {{WRAPPER}} .process-info h3 a' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} .process-info h3 a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		
		$this->end_controls_section();// end: Section

		// Content Style
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
				'selector' => '{{WRAPPER}} .process-info p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .process-info p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render WorkProcess widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$work_process = !empty( $settings['work_process'] ) ? $settings['work_process'] : [];

		$output = '<div class="process-wrap">';

		// Group Param Output
		if( is_array( $work_process ) && !empty( $work_process ) )
		foreach ( $work_process as $each_logo ) {

		  $image_url = wp_get_attachment_url( $each_logo['work_process_logo']['id'] );
		  $title = !empty( $each_logo['process_title'] ) ? $each_logo['process_title'] : '';
		  $title_link = !empty( $each_logo['process_title_link']['url'] ) ? $each_logo['process_title_link']['url'] : '';
			$title_external = !empty( $each_logo['process_title_link']['is_external'] ) ? 'target="_blank"' : '';
			$title_nofollow = !empty( $each_logo['process_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
			$title_link_attr = $title_external.' '.$title_nofollow;
		  $content = !empty( $each_logo['steps_content'] ) ? $each_logo['steps_content'] : '';

			$process_title = $title_link ? '<h3 class="process-title"><a href="'.esc_url($title_link).'" '.$title_link_attr.'>'.$title.'</a></h3>' : '<h3 class="process-title">'.$title.'</h3>';
			$process_content = $content ? '<p>'.$content.'</p>' : '';
			$process_image = $image_url ? '<div class="saspot-icon"><img src="'.$image_url.'" alt="Process" width="79"></div>' : '';

		  $output .= '<div class="process-item">
				            <div class="process-item-inner">
				              <div class="process-counter"></div>
				              '.$process_image.'
				              <div class="process-info">
				                '.$process_title.$process_content.'
				              </div>
				            </div>
				          </div>';

		}

		$output .= '</div>';

		echo $output;
		
	}

	/**
	 * Render Work Process widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_WorkProcess() );