<?php
/*
 * Elementor SaaSpot Identifying Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Identifying extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_identifying';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Identifying', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-lightbulb-o';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Identifying widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_identifying'];
	}
	*/
	
	/**
	 * Register SaaSpot Identifying widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_identifying',
			[
				'label' => __( 'Identifying Content', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'identifying_image',
			[
				'label' => esc_html__( 'Upload Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your icon image.', 'saaspot-core'),
			]
		);
		$this->add_control(
			'identifying_title',
			[
				'label' => esc_html__( 'Title Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'identifying_content',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'default' => esc_html__( 'your content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'toggle_align',
			[
				'label' => esc_html__( 'Toggle Align', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'default' => 'false',
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
			'section_identifying_btn',
			[
				'label' => esc_html__( 'Link Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'identifying_btn',
			[
				'label' => esc_html__( 'Link Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'LEARN MORE', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type link text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'identifying_btn_link',
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
			'identifying_btn_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-angle-right',
			]
		);
		$this->add_control(
			'icon_alignment',
			[
				'label' => esc_html__( 'Alignment', 'saaspot-core' ),
				'type' => Controls_Manager::CHOOSE,
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
				'default' => 'right',
			]
		);
		$this->end_controls_section();// end: Section

		// Style
		// Title
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
				'name' => 'saside_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .identify-info h2',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .identify-info h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_padding',
			[
				'label' => __( 'Title Padding', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .identify-info h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Content		
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
					'selector' => '{{WRAPPER}} .identify-info p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .identify-info p' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section

		// Link
		$this->start_controls_section(
			'section_link_style',
			[
				'label' => esc_html__( 'Link', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'link_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .identify-info .saspot-link',
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
						'{{WRAPPER}} .identify-info .saspot-link' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_border_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .identify-info .saspot-link:after' => 'background-color: {{VALUE}};',
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
						'{{WRAPPER}} .identify-info .saspot-link:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_border_hover_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .identify-info .saspot-link:hover:after' => 'background-color: {{VALUE}};',
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
		$toggle_align = !empty( $settings['toggle_align'] ) ? $settings['toggle_align'] : '';	
		$identifying_image = !empty( $settings['identifying_image']['id'] ) ? $settings['identifying_image']['id'] : '';	
		$identifying_title = !empty( $settings['identifying_title'] ) ? $settings['identifying_title'] : '';	
		$identifying_content = !empty( $settings['identifying_content'] ) ? $settings['identifying_content'] : '';	

		$identifying_btn = !empty( $settings['identifying_btn'] ) ? $settings['identifying_btn'] : '';	
		$identifying_btn_link = !empty( $settings['identifying_btn_link']['url'] ) ? $settings['identifying_btn_link']['url'] : '';
		$identifying_btn_link_external = !empty( $settings['identifying_btn_link']['is_external'] ) ? 'target="_blank"' : '';
		$identifying_btn_link_nofollow = !empty( $settings['identifying_btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$identifying_btn_link_attr = !empty( $identifying_btn_link ) ?  $identifying_btn_link_external.' '.$identifying_btn_link_nofollow : '';

		$identifying_btn_icon = !empty( $settings['identifying_btn_icon'] ) ? $settings['identifying_btn_icon'] : '';	
		$icon_alignment = !empty( $settings['icon_alignment'] ) ? $settings['icon_alignment'] : '';	

		$title = $identifying_title ? '<h2 class="identify-title">'.$identifying_title.'</h2>' : '';
		$content = $identifying_content ? '<p>'.$identifying_content.'</p>' : '';
		// Image
		$image_url = wp_get_attachment_url( $identifying_image );
		$saaspot_alt = get_post_meta($identifying_image, '_wp_attachment_image_alt', true);

		$image = $image_url ? '<img src="'.$image_url.'" alt="'.$saaspot_alt.'">' : '';

		$icon = $identifying_btn_icon ? '<i class="'.$identifying_btn_icon.'" aria-hidden="true"></i>' : '';
		if($icon_alignment === 'left') {
		  $icon_left = $icon.' ';
		  $icon_right = '';
		} else {
		  $icon_left = '';
		  $icon_right = ' '.$icon;
		}
		if($toggle_align === 'true') {
		  $align_left = ' order-lg-2';
		  $align_right = ' order-lg-1';
		} else {
		  $align_left = '';
		  $align_right = '';
		}
		
		$link = $identifying_btn_link ? '<div class="saspot-link-wrap"><a href="'.$identifying_btn_link.'" '.$identifying_btn_link_attr.' class="saspot-link">'.$icon_left.$identifying_btn.$icon_right.'</a></div>' : '';

		$output = '<div class="identify-item">
			          <div class="row">
			            <div class="col-lg-6'.$align_left.'">
			              <div class="saspot-image saspot-item">'.$image.'</div>
			            </div>
			            <div class="col-lg-6'.$align_right.'">
			              <div class="identify-info saspot-item">
			                <div class="saspot-table-wrap">
			                  <div class="saspot-align-wrap">
			                    '.$title.$content.$link.'
			                  </div>
			                </div>
			              </div>
			            </div>
			          </div>
			        </div>';
		echo $output;
		
	}

	/**
	 * Render Identifying widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Identifying() );