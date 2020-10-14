<?php
/*
 * Elementor SaaSpot Advertisement Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Advertisement extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_advertisement';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Advertisement', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-picture-o';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Advertisement widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_advertisement'];
	}
	*/
	
	/**
	 * Register SaaSpot Advertisement widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_adv',
			[
				'label' => esc_html__( 'Advertisement Options', 'saaspot-core' ),
			]
		);

		$this->add_control(
			'saspot_adv_image',
			[
				'label' => esc_html__( 'Upload Advertisement Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'ad_text',
			[
				'label' => esc_html__( 'Advertisement Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Advertisement', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'image_link',
			[
				'label' => esc_html__( 'Advertisement Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_responsive_control(
			'image_align',
			[
				'label' => esc_html__( 'Alignment', 'saaspot-core' ),
				'type' => Controls_Manager::CHOOSE,
				'frontend_available' => true,
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
		$this->add_control(
			'image_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .advertisiment-info .saspot-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	$this->end_controls_section();// end: Section

	// Content		
	$this->start_controls_section(
		'section_content_style',
		[
			'label' => esc_html__( 'Image Options', 'saaspot-core' ),
			'tab' => Controls_Manager::TAB_STYLE,
		]
	);

	$this->add_control(
		'overlay_color',
		[
			'label' => esc_html__( 'Overlay Color', 'saaspot-core' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .advertisiment-info .saspot-image:before' => 'background-color: {{VALUE}};',
			],
		]
	);	
	$this->start_controls_tabs( 'icon_style' );
		$this->start_controls_tab(
			'icon_normal',
			[
				'label' => esc_html__( 'Normal', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'adv_text_color',
			[
				'label' => esc_html__( 'Text Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h4.ad-title a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Normal tab
		
		$this->start_controls_tab(
			'icon_hover',
			[
				'label' => esc_html__( 'Hover', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'adv_text_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h4.ad-title a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Hover tab
	$this->end_controls_tabs(); // end tabs
	$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Advertisement widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$image_align = !empty( $settings['image_align'] ) ? $settings['image_align'] : '';
		$saspot_adv_image = !empty( $settings['saspot_adv_image']['id'] ) ? $settings['saspot_adv_image']['id'] : '';
		$ad_text = !empty( $settings['ad_text'] ) ? $settings['ad_text'] : '';
		$image_link = !empty( $settings['image_link']['url'] ) ? $settings['image_link']['url'] : '';
		$image_link_external = !empty( $settings['image_link']['is_external'] ) ? 'target="_blank"' : '';
		$image_link_nofollow = !empty( $settings['image_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$image_link_attr = !empty( $image_link ) ?  $image_link_external.' '.$image_link_nofollow : '';

		// Advertisement
		$image_url = wp_get_attachment_url( $saspot_adv_image );
		$saaspot_alt = get_post_meta($saspot_adv_image, '_wp_attachment_image_alt', true);

		$image = $image_url ? '<img src="'.esc_url($image_url).'" alt="'.$saaspot_alt.'">' : '';

   	$text = $image_link ? '<a href="'.$image_link.'" '.$image_link_attr.'><span>'.$ad_text.'</span></a>' : '<span>'.$ad_text.'</span>';

	  $output = '<div class="advertisiment-info">
                <div class="saspot-image">
                  '.$image.'
                  <h4 class="ad-title">'.$text.'</h4>
                </div>
              </div>';

	  echo $output;
		
	}

	/**
	 * Render Advertisement widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Advertisement() );