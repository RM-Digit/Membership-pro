<?php
/*
 * Elementor SaaSpot Classes For Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Classes extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_classes';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Classes', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-pencil-square';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Classes For widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_classes'];
	}
	*/
	
	/**
	 * Register SaaSpot Classes For widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_classes',
			[
				'label' => __( 'Classes Option', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'classes_style',
			[
				'label' => __( 'Classes Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One', 'saaspot-core' ),
					'style-two' => esc_html__( 'Style Two', 'saaspot-core' ),
				],
				'default' => 'style-one',
			]
		);

		$this->add_control(
			'classes_image',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'classes_title',
			[
				'label' => esc_html__( 'Title Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Our dreams come trued', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'classes_title_link',
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
			'classes_date',
			[
				'label' => esc_html__( 'Classes Date', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Date', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type date text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'classes_content',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'default' => esc_html__( 'your content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'classes_btn',
			[
				'label' => esc_html__( 'Button Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Button Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type btn text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'classes_btn_link',
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
			'classes_btn_icon',
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'classes_style' => array('style-one'),
				],
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
				'name' => 'sascla_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .class-item h3',
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
						'{{WRAPPER}} .class-item h3, {{WRAPPER}} .class-item h3 a' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} .class-item h3 a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section

		// Date
		$this->start_controls_section(
			'section_date_style',
			[
				'label' => esc_html__( 'Date', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'saaspot-core' ),
				'name' => 'date_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .class-item h4',
			]
		);
		$this->add_control(
			'date_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .class-item h4' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .class-item p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .class-item p' => 'color: {{VALUE}};',
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
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .class-item .saspot-btn',
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
						'{{WRAPPER}} .class-item .saspot-btn' => 'color: {{VALUE}};',
					],
				]
			);					
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Button Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .class-item .saspot-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .class-item .saspot-btn:hover',
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
						'{{WRAPPER}} .class-item .saspot-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Button Background Hover Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .class-item .saspot-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_hover_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .class-item .saspot-btn:hover',
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
		$classes_style = !empty( $settings['classes_style'] ) ? $settings['classes_style'] : '';	

		$classes_image = !empty( $settings['classes_image']['id'] ) ? $settings['classes_image']['id'] : '';	
		$classes_title = !empty( $settings['classes_title'] ) ? $settings['classes_title'] : '';	
		$classes_date = !empty( $settings['classes_date'] ) ? $settings['classes_date'] : '';	
		$classes_title_link = !empty( $settings['classes_title_link']['url'] ) ? $settings['classes_title_link']['url'] : '';
		$classes_title_link_external = !empty( $settings['classes_title_link']['is_external'] ) ? 'target="_blank"' : '';
		$classes_title_link_nofollow = !empty( $settings['classes_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$classes_title_link_attr = !empty( $classes_title_link ) ?  $classes_title_link_external.' '.$classes_title_link_nofollow : '';
		$classes_content = !empty( $settings['classes_content'] ) ? $settings['classes_content'] : '';	

		$classes_btn = !empty( $settings['classes_btn'] ) ? $settings['classes_btn'] : '';	
		$classes_btn_icon = !empty( $settings['classes_btn_icon'] ) ? $settings['classes_btn_icon'] : '';	
		$classes_btn_link = !empty( $settings['classes_btn_link']['url'] ) ? $settings['classes_btn_link']['url'] : '';
		$classes_btn_link_external = !empty( $settings['classes_btn_link']['is_external'] ) ? 'target="_blank"' : '';
		$classes_btn_link_nofollow = !empty( $settings['classes_btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$classes_btn_link_attr = !empty( $classes_btn_link ) ?  $classes_btn_link_external.' '.$classes_btn_link_nofollow : '';

		$image_url = wp_get_attachment_url( $classes_image );
		$image = $classes_image ? '<div class="saspot-icon"><img src="'.$image_url.'" alt="Classes" width="68"></div>' : '';

		$title_link = $classes_title_link ? '<a href="'.$classes_title_link.'" '.$classes_title_link_attr.'>'.$classes_title.'</a>' : $classes_title;
		$title = $classes_title ? '<h3 class="class-title">'.$title_link.'</h3>' : '';
		$date = $classes_date ? '<h4 class="class-date">'.$classes_date.'</h4>' : '';
		$content = $classes_content ? '<p>'.$classes_content.'</p>' : '';
		$icon = $classes_btn_icon ? ' <i class="'.$classes_btn_icon.'" aria-hidden="true"></i>' : '';
		$button = $classes_btn_link ? '<div class="saspot-btn-wrap"><a href="'.esc_url($classes_btn_link).'" '.$classes_btn_link_attr .' class="saspot-btn saspot-light-blue-bdr-btn">'.$classes_btn.$icon.'</a></div>' : '';

		if($classes_style === 'style-two') {
		  $style_cls = ' classes-style-two';
		} else {
		  $style_cls = '';
		}

		if ($classes_style === 'style-two') {
	  	$output = '<div class="class-item'.$style_cls.'">'.$image.'<div class="class-info">'.$title.$date.$content.$button.'</div></div>';
		} else {
	  	$output = '<div class="class-item">'.$image.$title.$date.$content.$button.'</div>';
		}
		echo $output;
		
	}

	/**
	 * Render Classes For widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Classes() );