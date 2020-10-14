<?php
/*
 * Elementor SaaSpot Extension For Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Extension extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_extension';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Extension', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-external-link-square';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Extension For widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_extension'];
	}
	*/
	
	/**
	 * Register SaaSpot Extension For widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_extension',
			[
				'label' => __( 'Extension Option', 'saaspot-core' ),
			]
		);

		$this->add_control(
			'extension_image',
			[
				'label' => esc_html__( 'Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'extension_title',
			[
				'label' => esc_html__( 'Title Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'B-Commerce', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'extension_title_link',
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
		$this->add_control(
			'extension_version',
			[
				'label' => esc_html__( 'Version', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Version 2.04', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'extension_price_title',
			[
				'label' => esc_html__( 'Price Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Price', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type price text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'extension_price',
			[
				'label' => esc_html__( 'Price', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Free', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type price here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'extension_content',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'default' => esc_html__( 'your content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'extension_btn',
			[
				'label' => esc_html__( 'Button Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Button Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type btn text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'extension_btn_link',
			[
				'label' => esc_html__( 'Button Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'extension_btn_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-angle-right',
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
		
		// Style
		// Section
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Section', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'section_border',
				'label' => esc_html__( 'Border', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .extension-item',
			]
		);
		$this->end_controls_section();// end: Section
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
				'name' => 'sasext_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .extension-wrap h4',
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
						'{{WRAPPER}} .extension-wrap h4, {{WRAPPER}} .extension-wrap h4 a' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} .extension-wrap h4 a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->add_group_control(

		Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Version Typography', 'saaspot-core' ),
				'name' => 'sasext_vtitle_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .extension-wrap h4 .saspot-label',
			]
		);
		$this->add_control(
			'version_color',
			[
				'label' => esc_html__( 'Version Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .extension-wrap h4 .saspot-label' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'version_bg_color',
			[
				'label' => esc_html__( 'Version Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .extension-wrap h4 .saspot-label' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Price
		$this->start_controls_section(
			'section_date_style',
			[
				'label' => esc_html__( 'Price', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Title Typography', 'saaspot-core' ),
				'name' => 'price_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .extension-wrap h5',
			]
		);
		$this->add_control(
			'price_title_color',
			[
				'label' => esc_html__( 'Title Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .extension-wrap h5' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'price_color',
			[
				'label' => esc_html__( 'Price Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .extension-wrap h5 span' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .extension-wrap p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .extension-wrap p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Button', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'btn_section_bg_color',
			[
				'label' => esc_html__( 'Section Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .extension-item .saspot-btn-wrap' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_section_border_color',
			[
				'label' => esc_html__( 'Section Border Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .extension-item .saspot-btn-wrap' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .extension-item .saspot-btn-wrap .saspot-btn',
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
						'{{WRAPPER}} .extension-item .saspot-btn-wrap .saspot-btn' => 'color: {{VALUE}};',
					],
				]
			);					
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Button Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .extension-item .saspot-btn-wrap .saspot-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .extension-item .saspot-btn-wrap .saspot-btn',
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
						'{{WRAPPER}} .extension-item .saspot-btn-wrap .saspot-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Button Background Hover Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .extension-item .saspot-btn-wrap .saspot-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_hover_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .extension-item .saspot-btn-wrap .saspot-btn:hover',
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
		$extension_image = !empty( $settings['extension_image']['id'] ) ? $settings['extension_image']['id'] : '';	
		$extension_title = !empty( $settings['extension_title'] ) ? $settings['extension_title'] : '';	
		$extension_title_link = !empty( $settings['extension_title_link']['url'] ) ? $settings['extension_title_link']['url'] : '';
		$extension_title_link_external = !empty( $settings['extension_title_link']['is_external'] ) ? 'target="_blank"' : '';
		$extension_title_link_nofollow = !empty( $settings['extension_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$extension_title_link_attr = !empty( $extension_title_link ) ?  $extension_title_link_external.' '.$extension_title_link_nofollow : '';
		$extension_version = !empty( $settings['extension_version'] ) ? $settings['extension_version'] : '';	
		$extension_price_title = !empty( $settings['extension_price_title'] ) ? $settings['extension_price_title'] : '';	
		$extension_price = !empty( $settings['extension_price'] ) ? $settings['extension_price'] : '';	
		$extension_content = !empty( $settings['extension_content'] ) ? $settings['extension_content'] : '';	

		$extension_btn = !empty( $settings['extension_btn'] ) ? $settings['extension_btn'] : '';	
		$extension_btn_icon = !empty( $settings['extension_btn_icon'] ) ? $settings['extension_btn_icon'] : '';	
		$extension_btn_link = !empty( $settings['extension_btn_link']['url'] ) ? $settings['extension_btn_link']['url'] : '';
		$extension_btn_link_external = !empty( $settings['extension_btn_link']['is_external'] ) ? 'target="_blank"' : '';
		$extension_btn_link_nofollow = !empty( $settings['extension_btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$extension_btn_link_attr = !empty( $extension_btn_link ) ?  $extension_btn_link_external.' '.$extension_btn_link_nofollow : '';

		$image_url = wp_get_attachment_url( $extension_image );
		$image = $extension_image ? '<div class="saspot-image"><img src="'.$image_url.'" alt="Extension"></div>' : '';

		$title_link = $extension_title_link ? '<span><a href="'.$extension_title_link.'" '.$extension_title_link_attr.'>'.$extension_title.'</a></span>' : '<span>'.$extension_title.'</span>';
		$version = $extension_version ? '<span class="saspot-label">'.$extension_version.'</span>' : '';
		$title = $extension_title ? '<h4 class="extension-title">'.$title_link.$version.'</h4>' : '';
		$content = $extension_content ? '<p>'.$extension_content.'</p>' : '';

		$extension_price = $extension_price ? '<span>'.$extension_price.'</span>' : '';
		$extension_price_title = $extension_price_title ? '<h5 class="extension-price">'.$extension_price_title.' '.$extension_price.'</h5>' : '';

		$icon = $extension_btn_icon ? ' <i class="'.$extension_btn_icon.'" aria-hidden="true"></i>' : '';
		$button = $extension_btn_link ? '<div class="saspot-btn-wrap"><a href="'.esc_url($extension_btn_link).'" '.$extension_btn_link_attr .' class="saspot-btn saspot-light-blue-btn">'.$extension_btn.$icon.'</a></div>' : '';

  	$output = '<div class="extension-item">
	              <div class="extension-wrap">'.$image.$title.$content.$extension_price_title.'</div>
	              '.$button.'
	            </div>';

		echo $output;
		
	}

	/**
	 * Render Extension For widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Extension() );