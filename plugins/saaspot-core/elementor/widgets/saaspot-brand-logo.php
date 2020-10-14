<?php
/*
 * Elementor SaaSpot Brand Logo Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Brand_Logo extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_brand_logo';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Brand Logo', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-magic';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Brand Logo widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_brand_logo'];
	}
	*/
	
	/**
	 * Register SaaSpot Brand Logo widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_brand_logo',
			[
				'label' => __( 'Brand Logo', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'logo_style',
			[
				'label' => esc_html__( 'Logo Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'one' => esc_html__( 'Style One', 'saaspot-core' ),
					'two' => esc_html__( 'Style Two', 'saaspot-core' ),
				],
				'default' => 'one',
				'description' => esc_html__( 'Select your logo style.', 'saaspot-core' ),
			]
		);

		$this->add_control(
			'correct_format',
			[
				'label' => esc_html__( 'Correct Format?', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'Correct format, if enabled.', 'saaspot-core' ),
				'condition' => [
					'logo_style' => 'two',
				],
			]
		);

		$this->add_control(
			'brand_logo_image',
			[
				'label' => esc_html__( 'Logo', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'brand_logo_download_text',
			[
				'label' => esc_html__( 'Download Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Download Logo', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type download text here', 'saaspot-core' ),
				'label_block' => true,
				'condition' => [
					'logo_style' => 'one',
				],
			]
		);
		$this->add_control(
			'brand_logo_download_link',
			[
				'label' => esc_html__( 'More Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
				'condition' => [
					'logo_style' => 'one',
				],
			]
		);
		$this->add_control(
			'brand_logo_link_icon',
			[
				'label' => esc_html__( 'Link Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'ti-download',
				'condition' => [
					'logo_style' => 'one',
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_text',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'brand_logo_format',
			[
				'label' => esc_html__( 'Logo Format', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'format_download_link',
			[
				'label' => esc_html__( 'Format Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'listItems_groups',
			[
				'label' => esc_html__( 'Logo Formats', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'list_text' => esc_html__( 'Item #1', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_text }}}',
				'condition' => [
					'logo_style' => 'one',
				],
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
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-brand-logo' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'brand_box_border',
				'label' => esc_html__( 'Border', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .saspot-brand-logo',
			]
		);
		$this->add_control(
			'brand_box_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .saspot-brand-logo' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'brand_box_shadow',
				'label' => esc_html__( 'Image Box Shadow', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .saspot-brand-logo',
			]
		);
			
		$this->end_controls_section();// end: Section

		// Link
		$this->start_controls_section(
			'section_link_style',
			[
				'label' => esc_html__( 'Link', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'logo_style' => 'one',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'link_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .saspot-brand-logo .saspot-link',
			]
		);
		$this->add_control(
			'link_padding',
			[
				'label' => __( 'Padding', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .saspot-brand-logo .saspot-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'link_style' );
			$this->start_controls_tab(
				'link_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'link_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-brand-logo .saspot-link' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_border_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-brand-logo .saspot-link:after' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'link_hover',
				[
					'label' => esc_html__( 'Hover', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'link_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-brand-logo .saspot-link:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_border_hover_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-brand-logo .saspot-link:hover:after' => 'background-color: {{VALUE}};',
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
		$listItems_groups = !empty( $settings['listItems_groups'] ) ? $settings['listItems_groups'] : [];
		$logo_style = !empty( $settings['logo_style'] ) ? $settings['logo_style'] : '';	
		$correct_format  = ( isset( $settings['correct_format'] ) && ( 'true' == $settings['correct_format'] ) ) ? true : false;

		$brand_logo_image = !empty( $settings['brand_logo_image']['id'] ) ? $settings['brand_logo_image']['id'] : '';	
		$download_text = !empty( $settings['brand_logo_download_text'] ) ? $settings['brand_logo_download_text'] : '';	
		$download_link = !empty( $settings['brand_logo_download_link']['url'] ) ? $settings['brand_logo_download_link']['url'] : '';
		$download_link_external = !empty( $settings['brand_logo_download_link']['is_external'] ) ? 'target="_blank"' : '';
		$download_link_nofollow = !empty( $settings['brand_logo_download_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$download_link_attr = !empty( $download_link ) ?  $download_link_external.' '.$download_link_nofollow : '';
		$brand_logo_link_icon = !empty( $settings['brand_logo_link_icon'] ) ? $settings['brand_logo_link_icon'] : '';	
		$entrance_animation = !empty( $settings['entrance_animation'] ) ? $settings['entrance_animation'] : '';	
		$entrance_animation_delay = !empty( $settings['entrance_animation_delay'] ) ? $settings['entrance_animation_delay'] : '';	

		$image_url = wp_get_attachment_url( $brand_logo_image );
		$image = $brand_logo_image ? '<div class="saspot-image"><div class="saspot-table-wrap"><div class="saspot-align-wrap"><img src="'.$image_url.'" alt="Sass"></div></div></div>' : '';

		$icon = $brand_logo_link_icon ? '<i class="'.$brand_logo_link_icon.'"></i> ' : '';
		$link = $download_link ? '<div class="saspot-link-wrap link-wrap-style-two"><a href="'.$download_link.'" '.$download_link_attr.' class="saspot-link">'.$icon.$download_text.'</a></div>' : '';

		if ($correct_format) {
			$correction = '<div class="logo-correct"><i class="fa fa-check" aria-hidden="true"></i></div>';
		} else {
			$correction = '<div class="logo-correct"><i class="fa fa-times" aria-hidden="true"></i></div>';
		}

		if($logo_style === 'two') {
		  $style_correction = $correction;
		} else {
		  $style_correction = '';
		}

		$output = '<div class="saspot-brand-logo">
	              '.$style_correction.$image.$link.'
	              <ul>';
	              // Group Param Output
								if( is_array( $listItems_groups ) && !empty( $listItems_groups ) ){
								  foreach ( $listItems_groups as $each_list ) {
								  $format_download_link = !empty( $each_list['format_download_link']['url'] ) ? $each_list['format_download_link']['url'] : '';
									$format_download_link_external = !empty( $each_list['format_download_link']['is_external'] ) ? 'target="_blank"' : '';
									$format_download_link_nofollow = !empty( $each_list['format_download_link']['nofollow'] ) ? 'rel="nofollow"' : '';
									$format_download_link_attr = !empty( $format_download_link ) ?  $format_download_link_external.' '.$format_download_link_nofollow : '';

									$logo_format = $each_list['brand_logo_format']['id'] ? $each_list['brand_logo_format']['id'] : '';
									$format_url = wp_get_attachment_url( $logo_format );

									if($format_download_link) {
									  $output .= '<li><a href="'.$format_download_link.'" '.$format_download_link_attr.'><img src="'.$format_url.'" width="28" alt="Icon"></a></li>';
									} else {
									  $output .= '<li><img src="'.$format_url.'" width="28" alt="Icon"></li>';
									}
								  }
								}
    $output .= '</ul>
	            </div>';
		echo $output;
		
	}

	/**
	 * Render Brand Logo widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Brand_Logo() );