<?php
/*
 * Elementor SaaSpot Resource For Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Resource extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_resource';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Resource', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-eye';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Resource For widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_resource'];
	}
	*/
	
	/**
	 * Register SaaSpot Resource For widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_resource',
			[
				'label' => __( 'Resource Option', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'resource_style',
			[
				'label' => __( 'Resource Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One', 'saaspot-core' ),
					'style-two' => esc_html__( 'Style Two', 'saaspot-core' ),
					'style-three' => esc_html__( 'Style Three', 'saaspot-core' ),
					'style-four' => esc_html__( 'Style Four', 'saaspot-core' ),
				],
				'default' => 'style-one',
			]
		);
		$this->add_control(
			'col_type',
			[
				'label' => __( 'Column Option', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'col-3' => esc_html__( '3 Column', 'saaspot-core' ),
					'col-4' => esc_html__( '4 Column', 'saaspot-core' ),
					'col-2' => esc_html__( '2 Column', 'saaspot-core' ),
				],
				'default' => 'col-3',
				'condition' => [
					'resource_style!' => array('style-three'),
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'resource_image',
			[
				'label' => esc_html__( 'Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'resource_title',
			[
				'label' => esc_html__( 'Title Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Our dreams come trued', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'resource_title_link',
			[
				'label' => esc_html__( 'Title Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'resource_content',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'default' => esc_html__( 'your content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'resource_btn',
			[
				'label' => esc_html__( 'Link Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Link Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type btn text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'resource_btn_link',
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
		$repeater->add_control(
			'resource_btn_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-angle-right',
			]
		);
		$repeater->add_control(
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'resource_style' => array('style-one','style-four'),
				],
			]
		);

		$this->add_control(
			'ResourceItems',
			[
				'label' => esc_html__( 'Resource Items', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'resource_title' => esc_html__( 'Our dreams come trued', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ resource_title }}}',
			]
		);

		$this->end_controls_section();// end: Section
		
		// Style
		$this->start_controls_section(
			'section_image_style',
			[
				'label' => esc_html__( 'Image', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'image_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .resource-item .saspot-image img, {{WRAPPER}} .resource-list .saspot-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'section_image_shadow',
				'label' => esc_html__( 'Box Shadow', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .resource-item .saspot-image img, {{WRAPPER}} .resource-list .saspot-image img',
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
				'name' => 'sasreso_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .resource-item h3, {{WRAPPER}} .resource-list .resource-title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .resource-item h3, {{WRAPPER}} .resource-list .resource-title' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .resource-item p, {{WRAPPER}} .resource-list p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .resource-item p, {{WRAPPER}} .resource-list p' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .resource-item .saspot-link, {{WRAPPER}} .resource-info .saspot-link, {{WRAPPER}} .resource-item .saspot-btn',
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
						'{{WRAPPER}} .resource-item .saspot-link, {{WRAPPER}} .resource-info .saspot-link, {{WRAPPER}} .resource-item .saspot-btn' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_border_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .resource-item .saspot-link:after, {{WRAPPER}} .resource-info .saspot-link:after, {{WRAPPER}} .resource-item .saspot-btn' => 'background-color: {{VALUE}};',
					],
				]
			);			
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Button Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} {{WRAPPER}} .resource-item .saspot-btn' => 'background-color: {{VALUE}};',
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
						'{{WRAPPER}} .resource-item .saspot-link:hover, {{WRAPPER}} .resource-info .saspot-link:hover, {{WRAPPER}} .resource-item .saspot-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_border_hover_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .resource-item .saspot-link:hover:after, {{WRAPPER}} .resource-info .saspot-link:hover:after, {{WRAPPER}} .resource-item .saspot-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Button Hover Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .resource-item .saspot-btn:hover' => 'background-color: {{VALUE}};',
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
		$resource_style = !empty( $settings['resource_style'] ) ? $settings['resource_style'] : '';	
		$column = !empty( $settings['col_type'] ) ? $settings['col_type'] : '';
		$ResourceItems = !empty( $settings['ResourceItems'] ) ? $settings['ResourceItems'] : '';

		if($resource_style === 'style-two') {
		  $style_cls = ' resources-style-two';
		} elseif ($resource_style === 'style-three') {
		  $style_cls = ' resources-style-three';
		} elseif ($resource_style === 'style-four') {
		  $style_cls = ' resources-style-four';
		} else {
		  $style_cls = '';
		}

		if($column === 'col-2') {
		  $col_cls = 'col-md-6';
		} elseif ($column === 'col-4') {
		  $col_cls = 'col-lg-3 col-md-6';
		} else {
		  $col_cls = 'col-lg-4 col-md-6';
		}
	  $output = '<div class="saspot-resources'.$style_cls.'">';
	  if ($resource_style === 'style-three') {
		  $output .= '<div class="resources-wrap">';
		} else {
		  $output .= '<div class="row">';
		}

		if( is_array( $ResourceItems ) && !empty( $ResourceItems ) ){
		  foreach ( $ResourceItems as $each_list ) {	

				$resource_image = !empty( $each_list['resource_image']['id'] ) ? $each_list['resource_image']['id'] : '';	
				$resource_title = !empty( $each_list['resource_title'] ) ? $each_list['resource_title'] : '';	
				$resource_title_link = !empty( $each_list['resource_title_link']['url'] ) ? $each_list['resource_title_link']['url'] : '';
				$resource_title_link_external = !empty( $each_list['resource_title_link']['is_external'] ) ? 'target="_blank"' : '';
				$resource_title_link_nofollow = !empty( $each_list['resource_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
				$resource_title_link_attr = !empty( $resource_title_link ) ?  $resource_title_link_external.' '.$resource_title_link_nofollow : '';
				$resource_content = !empty( $each_list['resource_content'] ) ? $each_list['resource_content'] : '';	

				$resource_btn = !empty( $each_list['resource_btn'] ) ? $each_list['resource_btn'] : '';	
				$resource_btn_icon = !empty( $each_list['resource_btn_icon'] ) ? $each_list['resource_btn_icon'] : '';	
				$resource_btn_link = !empty( $each_list['resource_btn_link']['url'] ) ? $each_list['resource_btn_link']['url'] : '';
				$resource_btn_link_external = !empty( $each_list['resource_btn_link']['is_external'] ) ? 'target="_blank"' : '';
				$resource_btn_link_nofollow = !empty( $each_list['resource_btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
				$resource_btn_link_attr = !empty( $resource_btn_link ) ?  $resource_btn_link_external.' '.$resource_btn_link_nofollow : '';


				$image_url = wp_get_attachment_url( $resource_image );

				$image = $resource_image ? '<div class="saspot-image"><img src="'.$image_url.'" alt="Resource"></div>' : '';
				$title_link = $resource_title_link ? '<a href="'.$resource_title_link.'" '.$resource_title_link_attr.'>'.$resource_title.'</a>' : $resource_title;
				$title = $resource_title ? '<h3 class="resource-title">'.$title_link.'</h3>' : '';
				$content = $resource_content ? '<p>'.$resource_content.'</p>' : '';
				$icon = $resource_btn_icon ? ' <i class="'.$resource_btn_icon.'" aria-hidden="true"></i>' : '';

				if ($resource_style === 'style-four') {
					$button = $resource_btn_link ? '<div class="saspot-btn-wrap"><a href="'.esc_url($resource_btn_link).'" '.$resource_btn_link_attr .' class="saspot-btn saspot-light-blue-bdr-btn">'.$resource_btn.$icon.'</a></div>' : '';
				} else {
					$button = $resource_btn_link ? '<div class="saspot-link-wrap link-wrap-style-two"><a href="'.esc_url($resource_btn_link).'" '.$resource_btn_link_attr .' class="saspot-link">'.$resource_btn.$icon.'</a></div>' : '';
				}

				if ($resource_style === 'style-two') {
			  	$output .= '<div class="'.$col_cls.'"><div class="resource-item">'.$image.'<div class="resource-info">'.$title.$content.$button.'</div></div></div>';
				} elseif ($resource_style === 'style-three') {
			  	$output .= '<div class="resource-list">
				  							<div class="row">
				  								<div class="col-md-4 order-md-2">'.$image.'</div>
				  								<div class="col-md-8 order-md-1"><div class="resource-info">'.$title.$content.$button.'</div></div>
										  	</div>
									  	</div>';
				} else {
			  	$output .= '<div class="'.$col_cls.'"><div class="resource-item">'.$image.$title.$content.$button.'</div></div>';
				}
		
		  }
		}

		$output .= '</div></div>';
		echo $output;
		
	}

	/**
	 * Render Resource For widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Resource() );