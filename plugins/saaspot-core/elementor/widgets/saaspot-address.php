<?php
/*
 * Elementor SaaSpot Address Info Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_AddressInfo extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_address_info';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Address Info', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-book';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Address Info widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_list'];
	}
	*/
	
	/**
	 * Register SaaSpot Address Info widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_address_info',
			[
				'label' => esc_html__( 'Address Info Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__( 'Background Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your image.', 'saaspot-core'),
			]
		);
		$this->add_control(
			'address_title',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter item title here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'address_text',
			[
				'label' => esc_html__( 'Address', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter address text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		
		$repeater = new Repeater();		
		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__( 'Link Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter item title here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_title_link',
			[
				'label' => esc_html__( 'Text Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'saaspot-core' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		$this->add_control(
			'listItems_groups',
			[
				'label' => esc_html__( 'Mail Info', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'list_title' => esc_html__( 'Item #1', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_title }}}',
			]
		);

		$repeaterOne = new Repeater();
		$repeaterOne->add_control(
			'mobile_title',
			[
				'label' => esc_html__( 'Link Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter item title here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$repeaterOne->add_control(
			'mobile_title_link',
			[
				'label' => esc_html__( 'Text Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'saaspot-core' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		$this->add_control(
			'mobileItems_groups',
			[
				'label' => esc_html__( 'Number Info', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'mobile_title' => esc_html__( 'Item #1', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeaterOne->get_controls(),
				'title_field' => '{{{ mobile_title }}}',
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Section', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'section_over_color',
			[
				'label' => esc_html__( 'Overlay Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .address-item:before' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .address-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'section_border',
				'label' => esc_html__( 'Border', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .address-item',
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_address_info_title_style',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sasadd_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .address-info h3',
			]
		);
		$this->add_control(
			'list_title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .address-info h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_address_info_cont_style',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'list_content_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .address-info p',
			]
		);
		$this->add_control(
			'list_content_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .address-info p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_text_link_style',
			[
				'label' => esc_html__( 'Links', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'link_text_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .address-info .saspot-link-wrap a',
			]
		);
		$this->add_control(
			'link_text_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .address-info .saspot-link-wrap a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'link_text_color_hov',
			[
				'label' => esc_html__( 'Hover Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .address-info .saspot-link-wrap a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .address-info .saspot-link-wrap a:after' => 'background: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Address Info widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$address_title = !empty( $settings['address_title'] ) ? $settings['address_title'] : [];
		$address_text = !empty( $settings['address_text'] ) ? $settings['address_text'] : [];
		$listItems_groups = !empty( $settings['listItems_groups'] ) ? $settings['listItems_groups'] : [];
		$mobileItems_groups = !empty( $settings['mobileItems_groups'] ) ? $settings['mobileItems_groups'] : [];
		$bg_image = !empty( $settings['bg_image']['id'] ) ? $settings['bg_image']['id'] : '';	

		$image_url = wp_get_attachment_url( $bg_image );

		$address_title = $address_title ? '<h3>'.$address_title.'</h3>' : '';
		$address_text = $address_text ? '<p>'.$address_text.'</p>' : '';
		
	  $output = '<div class="address-item" style="background-image: url('.$image_url.');">
	              <div class="saspot-table-wrap">
	                <div class="saspot-align-wrap">
	                  <div class="address-info">
	                    '.$address_title.$address_text.'
	                    <div class="saspot-link-wrap link-wrap-style-two">';
	                      // Group Param Output
												if( is_array( $listItems_groups ) && !empty( $listItems_groups ) ){
												  foreach ( $listItems_groups as $each_list ) {

												  $list_title = !empty( $each_list['list_title'] ) ? $each_list['list_title'] : '';
												  $list_title_link = !empty( $each_list['list_title_link']['url'] ) ? $each_list['list_title_link']['url'] : '';
													$list_title_link_external = !empty( $each_list['list_title_link']['is_external'] ) ? 'target="_blank"' : '';
													$list_title_link_nofollow = !empty( $each_list['list_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
													$list_title_link_attr = !empty( $list_title_link ) ?  $list_title_link_external.' '.$list_title_link_nofollow : '';

												  $output .= '<a href="'.$list_title_link.'" class="saspot-link" '.$list_title_link_attr.'>'. $list_title .'</a>';
												  }
												}
          $output .= '</div>
	                    <div class="saspot-link-wrap link-wrap-style-two">';
	                      // Group Param Output
												if( is_array( $mobileItems_groups ) && !empty( $mobileItems_groups ) ){
												  foreach ( $mobileItems_groups as $each_mobiles ) {

												  $mobile_title = !empty( $each_mobiles['mobile_title'] ) ? $each_mobiles['mobile_title'] : '';
												  $mobile_title_link = !empty( $each_mobiles['mobile_title_link']['url'] ) ? $each_mobiles['mobile_title_link']['url'] : '';
													$mobile_title_link_external = !empty( $each_mobiles['mobile_title_link']['is_external'] ) ? 'target="_blank"' : '';
													$mobile_title_link_nofollow = !empty( $each_mobiles['mobile_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
													$mobile_title_link_attr = !empty( $mobile_title_link ) ?  $mobile_title_link_external.' '.$mobile_title_link_nofollow : '';

												  $output .= '<a href="'.$mobile_title_link.'" class="saspot-link" '.$mobile_title_link_attr.'>'. $mobile_title .'</a>';
												  }
												}
          $output .= '</div>
	                  </div>
	                </div>
	              </div>
	            </div>';

		echo $output;
		
	}

	/**
	 * Render Address Info widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_AddressInfo() );