<?php
/*
 * Elementor SaaSpot Analytics For Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Analytics extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_analytics';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Analytics', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-line-chart';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Analytics For widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_analytics'];
	}
	*/
	
	/**
	 * Register SaaSpot Analytics For widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_analytics',
			[
				'label' => __( 'Analytics Item', 'saaspot-core' ),
			]
		);

		$this->add_control(
			'analytics_image',
			[
				'label' => esc_html__( 'Background Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'analytics_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'icon-ecommerce-graph-increase',
			]
		);
		$this->add_control(
			'analytics_title',
			[
				'label' => esc_html__( 'Title Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
				'dynamic' => [
   				'active' => true,
   			],
			]
		);
		$this->add_control(
			'analytics_content',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'default' => esc_html__( 'your content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
				'type' => Controls_Manager::WYSIWYG,
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
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_analytics_btn',
			[
				'label' => esc_html__( 'Link Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'analytics_btn',
			[
				'label' => esc_html__( 'Link Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Link Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type btn text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'analytics_btn_link',
			[
				'label' => esc_html__( 'Link Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'analytics_btn_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-angle-right',
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
			'section_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .analytics-info' => 'background-color: {{VALUE}};',
				],
			]
		);	
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'section_border',
				'label' => esc_html__( 'Border', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .analytics-info',
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
				'label' => esc_html__( 'Typography', 'saaspot-core' ),
				'name' => 'sasana_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .analytics-inner h2',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .analytics-inner h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
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
				'selector' => '{{WRAPPER}} .analytics-inner p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .analytics-inner p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Link', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .analytics-inner .saspot-link',
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
						'{{WRAPPER}} .analytics-inner .saspot-link' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_border_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .analytics-inner .saspot-link:after' => 'background-color: {{VALUE}};',
					],
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
						'{{WRAPPER}} analytics-inner .saspot-link:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_border_hover_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} analytics-inner .saspot-link:hover:after' => 'background-color: {{VALUE}};',
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
		$analytics_image = !empty( $settings['analytics_image']['id'] ) ? $settings['analytics_image']['id'] : '';	
		$analytics_title = !empty( $settings['analytics_title'] ) ? $settings['analytics_title'] : '';	
		$analytics_content = !empty( $settings['analytics_content'] ) ? $settings['analytics_content'] : '';	
		$analytics_icon = !empty( $settings['analytics_icon'] ) ? $settings['analytics_icon'] : '';	

		$analytics_btn = !empty( $settings['analytics_btn'] ) ? $settings['analytics_btn'] : '';	
		$analytics_btn_link = !empty( $settings['analytics_btn_link']['url'] ) ? $settings['analytics_btn_link']['url'] : '';
		$analytics_btn_link_external = !empty( $settings['analytics_btn_link']['is_external'] ) ? 'target="_blank"' : '';
		$analytics_btn_link_nofollow = !empty( $settings['analytics_btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$analytics_btn_link_attr = !empty( $analytics_btn_link ) ?  $analytics_btn_link_external.' '.$analytics_btn_link_nofollow : '';
		$analytics_btn_icon = !empty( $settings['analytics_btn_icon'] ) ? $settings['analytics_btn_icon'] : '';	

		$image_url = wp_get_attachment_url( $analytics_image );

		$icon = $analytics_icon ? '<div class="saspot-icon"><i class="icon-linea '.$analytics_icon.'" aria-hidden="true"></i></div>' : '';
		$title = $analytics_title ? '<h2 class="analytics-title">'.$analytics_title.'</h2>' : '';
		$content = $analytics_content ? $analytics_content : '';
		$btn_icon = $analytics_btn_icon ? ' <i class="'.$analytics_btn_icon.'" aria-hidden="true"></i>' : '';
		$button = $analytics_btn_link ? '<div class="saspot-link-wrap"><a href="'.esc_url($analytics_btn_link).'" '.$analytics_btn_link_attr .' class="saspot-link">'.$analytics_btn.$btn_icon.'</a></div>' : '';

		$output = '<div class="saspot-analytics">
					      <div class="row">
					        <div class="col-lg-6">
					          <div class="saspot-background saspot-parallax saspot-item" style="background: url('.$image_url.');"></div>
					        </div>
					        <div class="col-lg-6">
					          <div class="analytics-info saspot-overlay saspot-item">
					            <div class="saspot-table-wrap">
					              <div class="saspot-align-wrap">
					                <div class="analytics-inner">'.$icon.	$title.$content.$button.'</div>
					              </div>
					            </div>
					          </div>
					        </div>
					      </div>
					    </div>';
		echo $output;
		
	}

	/**
	 * Render Analytics For widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Analytics() );