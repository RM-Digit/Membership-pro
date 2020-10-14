<?php
/*
 * Elementor SaaSpot Client Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Client extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_client';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Client', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-shield';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Client widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['vt-saaspot_client'];
	}
	
	/**
	 * Register SaaSpot Client widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_client',
			[
				'label' => esc_html__( 'Client Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'client_style',
			[
				'label' => esc_html__( 'Client Logos Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One (Slider)', 'saaspot-core' ),
					'style-two' => esc_html__( 'Style Two (Static)', 'saaspot-core' ),
					'style-three' => esc_html__( 'Style Three (Slider)', 'saaspot-core' ),
				],
				'default' => 'style-one',
				'description' => esc_html__( 'Select your client style.', 'saaspot-core' ),
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'client_logo_title',
			[
				'label' => esc_html__( 'Logo title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type item title here', 'saaspot-core' ),
			]
		);
		$repeater->add_control(
			'client_logo',
			[
				'label' => esc_html__( 'Logo Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				
			]
		);
		$repeater->add_control(
			'client_link',
			[
				'label' => esc_html__( 'Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'saaspot-core' ),
				'label_block' => true,
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		$this->add_control(
			'clientLogos_groups',
			[
				'label' => esc_html__( 'Client Logos', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'client_logo_title' => esc_html__( 'Client', 'saaspot-core' ),
					],
					
				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ client_logo_title }}}',
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_carousel',
			[
				'label' => esc_html__( 'Carousel Options', 'saaspot-core' ),
				'condition' => [
					'client_style!' => 'style-two',
				],
			]
		);
		
		$this->add_responsive_control(
			'carousel_items',
			[
				'label' => esc_html__( 'How many items?', 'saaspot-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 5,
				'description' => esc_html__( 'Enter the number of items to show.', 'saaspot-core' ),
			]
		);
		$this->add_responsive_control(
			'carousel_margin',
			[
				'label' => __( 'Space Between Items', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' =>20,
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'carousel_autoplay_timeout',
			[
				'label' => __( 'Auto Play Timeout', 'saaspot-core' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
			]
		);
		$this->add_control(
			'carousel_loop',
			[
				'label' => esc_html__( 'Disable Loop?', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'Continuously moving carousel, if enabled.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'carousel_dots',
			[
				'label' => esc_html__( 'Dots', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want Carousel Dots, enable it.', 'saaspot-core' ),
				'default' => true,
			]
		);
		$this->add_control(
			'carousel_nav',
			[
				'label' => esc_html__( 'Navigation', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want Carousel Navigation, enable it.', 'saaspot-core' ),
				'default' => true,
			]
		);
		
		$this->add_control(
			'carousel_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want to start Carousel automatically, enable it.', 'saaspot-core' ),
				'default' => true,
			]
		);
		$this->add_control(
			'carousel_animate_out',
			[
				'label' => esc_html__( 'Animate Out', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'CSS3 animation out.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'carousel_mousedrag',
			[
				'label' => esc_html__( 'Disable Mouse Drag?', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want to disable Mouse Drag, check it.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'carousel_autowidth',
			[
				'label' => esc_html__( 'Auto Width', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'Adjust Auto Width automatically for each carousel items.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'carousel_autoheight',
			[
				'label' => esc_html__( 'Auto Height', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'Adjust Auto Height automatically for each carousel items.', 'saaspot-core' ),
			]
		);
		$this->end_controls_section();// end: Section

		// Navigation
		$this->start_controls_section(
			'section_navigation_style',
			[
				'label' => esc_html__( 'Navigation', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'carousel_nav' => 'true',
				],
				'frontend_available' => true,
			]
		);
		$this->add_responsive_control(
			'arrow_size',
			[
				'label' => esc_html__( 'Size', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 16,
						'max' => 1000,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .owl-carousel .owl-nav .owl-prev:before,
					{{WRAPPER}} .owl-carousel .owl-nav .owl-next:before' => 'font-size: {{SIZE}}{{UNIT}} !important;',
					'{{WRAPPER}} .owl-carousel .owl-nav button.owl-prev, {{WRAPPER}} .owl-carousel .owl-nav button.owl-next' => 'width: calc({{SIZE}}{{UNIT}} + 24px);height: calc({{SIZE}}{{UNIT}} + 24px);',
				],
			]
		);
		$this->start_controls_tabs( 'nav_arrow_style' );
			$this->start_controls_tab(
				'nav_arrow_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'nav_arrow_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-nav .owl-prev:before,
						{{WRAPPER}} .owl-carousel .owl-nav .owl-next:before' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'nav_arrow_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-nav .owl-prev,
						{{WRAPPER}} .owl-carousel .owl-nav .owl-next' => 'background: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'nav_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .owl-carousel .owl-nav .owl-prev,
						{{WRAPPER}} .owl-carousel .owl-nav .owl-next',
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'nav_arrow_hover',
				[
					'label' => esc_html__( 'Hover', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'nav_arrow_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-nav .owl-prev:hover:before,
						{{WRAPPER}} .owl-carousel .owl-nav .owl-next:hover:before' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'nav_arrow_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-nav .owl-prev:hover,
						{{WRAPPER}} .owl-carousel .owl-nav .owl-next:hover' => 'background: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'nav_active_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .owl-carousel .owl-nav .owl-prev:hover,
						{{WRAPPER}} .owl-carousel .owl-nav .owl-next:hover',
				]
			);
			$this->end_controls_tab();  // end:Hover tab
			
		$this->end_controls_tabs(); // end tabs		
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_dots_style',
			[
				'label' => esc_html__( 'Dots', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'carousel_dots' => 'true',
				],
				'frontend_available' => true,
			]
		);
		$this->add_responsive_control(
			'dots_size',
			[
				'label' => esc_html__( 'Size', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .owl-carousel .owl-dot' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'dots_margin',
			[
				'label' => __( 'Margin', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .owl-carousel .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'dots_style' );
			$this->start_controls_tab(
				'dots_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'dots_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-dot' => 'background: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'dots_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .owl-carousel .owl-dot',
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'dots_active',
				[
					'label' => esc_html__( 'Active', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'dots_active_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-dot.active' => 'background: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'dots_active_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .owl-carousel .owl-dot.active',
				]
			);
			$this->end_controls_tab();  // end:Active tab
			
		$this->end_controls_tabs(); // end tabs		
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Client widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$client_style = !empty( $settings['client_style'] ) ? $settings['client_style'] : '';
		$clientLogos_groups = !empty( $settings['clientLogos_groups'] ) ? $settings['clientLogos_groups'] : [];

		$carousel_items = !empty( $settings['carousel_items'] ) ? $settings['carousel_items'] : '';
		$carousel_items_tablet = !empty( $settings['carousel_items_tablet'] ) ? $settings['carousel_items_tablet'] : '';
		$carousel_items_mobile = !empty( $settings['carousel_items_mobile'] ) ? $settings['carousel_items_mobile'] : '';
		$carousel_margin = !empty( $settings['carousel_margin']['size'] ) ? $settings['carousel_margin']['size'] : '';
		$carousel_autoplay_timeout = !empty( $settings['carousel_autoplay_timeout'] ) ? $settings['carousel_autoplay_timeout'] : '';
		$carousel_loop  = ( isset( $settings['carousel_loop'] ) && ( 'true' == $settings['carousel_loop'] ) ) ? $settings['carousel_loop'] : 'false';
		$carousel_dots  = ( isset( $settings['carousel_dots'] ) && ( 'true' == $settings['carousel_dots'] ) ) ? true : false;
		$carousel_nav  = ( isset( $settings['carousel_nav'] ) && ( 'true' == $settings['carousel_nav'] ) ) ? true : false;
		$carousel_autoplay  = ( isset( $settings['carousel_autoplay'] ) && ( 'true' == $settings['carousel_autoplay'] ) ) ? true : false;
		$carousel_animate_out  = ( isset( $settings['carousel_animate_out'] ) && ( 'true' == $settings['carousel_animate_out'] ) ) ? true : false;
		$carousel_mousedrag  = ( isset( $settings['carousel_mousedrag'] ) && ( 'true' == $settings['carousel_mousedrag'] ) ) ? $settings['carousel_mousedrag'] : 'false';
		$carousel_autowidth  = ( isset( $settings['carousel_autowidth'] ) && ( 'true' == $settings['carousel_autowidth'] ) ) ? true : false;
		$carousel_autoheight  = ( isset( $settings['carousel_autoheight'] ) && ( 'true' == $settings['carousel_autoheight'] ) ) ? true : false;
		
		// Carousel Data's
		$carousel_loop = $carousel_loop !== 'true' ? ' data-loop="true"' : ' data-loop="false"';
		$carousel_items = $carousel_items ? ' data-items="'. $carousel_items .'"' : ' data-items="5"';
		$carousel_margin = $carousel_margin ? ' data-margin="'. $carousel_margin .'"' : ' data-margin="20"';
		$carousel_dots = $carousel_dots ? ' data-dots="true"' : ' data-dots="false"';
		$carousel_nav = $carousel_nav ? ' data-nav="true"' : ' data-nav="false"';
		$carousel_autoplay_timeout = $carousel_autoplay_timeout ? ' data-autoplay-timeout="'. $carousel_autoplay_timeout .'"' : '';
		$carousel_autoplay = $carousel_autoplay ? ' data-autoplay="true"' : '';
		$carousel_animate_out = $carousel_animate_out ? ' data-animateout="true"' : '';
		$carousel_mousedrag = $carousel_mousedrag !== 'true' ? ' data-mouse-drag="true"' : ' data-mouse-drag="false"';
		$carousel_autowidth = $carousel_autowidth ? ' data-auto-width="true"' : '';
		$carousel_autoheight = $carousel_autoheight ? ' data-auto-height="true"' : '';
		$carousel_tablet = $carousel_items_tablet ? ' data-items-tablet="'. $carousel_items_tablet .'"' : ' data-items-tablet="3"';
		$carousel_mobile = $carousel_items_mobile ? ' data-items-mobile-landscape="'. $carousel_items_mobile .'"' : ' data-items-mobile-landscape="2"';
		$carousel_small_mobile = $carousel_items_mobile ? ' data-items-mobile-portrait="'. $carousel_items_mobile .'"' : ' data-items-mobile-portrait="1"';

		if($client_style === 'style-two') {
		  $style_cls = ' clients-style-two';
		  $item_cls = 'col-md-3 col-sm-6';
		} elseif ($client_style === 'style-three') {
			$style_cls = ' history-quality';
		  $item_cls = 'item';
		} else {
		  $style_cls = '';
		  $item_cls = 'item';
		}

		$output = '<div class="saspot-clients'.$style_cls.'">';
		if($client_style === 'style-two') {
		  $output .= '<div class="row justify-content-center">';
		} else {
			$output .= '<div class="owl-carousel" '. $carousel_loop . $carousel_items . $carousel_margin . $carousel_dots . $carousel_nav . $carousel_autoplay_timeout . $carousel_autoplay . $carousel_animate_out . $carousel_mousedrag . $carousel_autowidth . $carousel_autoheight  . $carousel_tablet . $carousel_mobile . $carousel_small_mobile .'>';
		}

		// Group Param Output
		if( is_array( $clientLogos_groups ) && !empty( $clientLogos_groups ) ){
			foreach ( $clientLogos_groups as $each_logo ) {
				$client_logo_title = !empty( $each_logo['client_logo_title'] ) ? $each_logo['client_logo_title'] : '';
				$image_url = wp_get_attachment_url( $each_logo['client_logo']['id'] );
				$image_link = !empty( $each_logo['client_link']['url'] ) ? $each_logo['client_link']['url'] : '';
				$image_link_external = !empty( $each_logo['client_link']['is_external'] ) ? 'target="_blank"' : '';
				$image_link_nofollow = !empty( $each_logo['client_link']['nofollow'] ) ? 'rel="nofollow"' : '';
				$image_link_attr = !empty( $image_link ) ?  $image_link_external.' '.$image_link_nofollow : '';
			  if (!empty($each_logo['client_link']['url'])) {
				$output .= '<div class="'.$item_cls.'"><div class="client-item"><div class="saspot-image"><a href="'. $each_logo['client_link']['url'] .'" '. $image_link_attr .'><img src="'. $image_url .'" alt="'.esc_attr($client_logo_title).'"></a></div></div></div>';
			  } else {
				$output .= '<div class="'.$item_cls.'"><div class="client-item"><div class="saspot-image"><img src="'. $image_url .'" alt="'.esc_attr($client_logo_title).'"></div></div></div>';
			  }
			}
		}
		$output .= '</div></div>';

		echo $output;
		
		
	}

	/**
	 * Render Client widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Client() );