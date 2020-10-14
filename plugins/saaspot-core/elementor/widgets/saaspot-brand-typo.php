<?php
/*
 * Elementor SaaSpot Brand Typography Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Brand_Typo extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_brand_typo';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Brand Typography', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-font';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Brand Typography widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_brand_typo'];
	}
	*/
	
	/**
	 * Register SaaSpot Brand Typography widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_brand_typo',
			[
				'label' => __( 'Brand Typography', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'brand_typo_link',
			[
				'label' => esc_html__( 'Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'brand_typo_title',
			[
				'label' => esc_html__( 'Font Name', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Muli', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type font name here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'brand_typo_use',
			[
				'label' => esc_html__( 'Font Use', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '#Font Primary', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type font usage here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'font_options',
			[
				'label' => __( 'Font Style', 'saaspot-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'font_style1',
			[
				'label' => esc_html__( 'Style', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'font_style2',
			[
				'label' => esc_html__( 'Style', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'preview_options',
			[
				'label' => __( 'Font Preview', 'saaspot-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'preview_title',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'preview_color',
			[
				'label' => esc_html__( 'Color Code', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();// end: Section

		// Style
		$this->start_controls_section(
			'typo_box_style',
			[
				'label' => esc_html__( 'Section', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'typo_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-brand-typo' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'typo_box_border',
				'label' => esc_html__( 'Border', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .saspot-brand-typo',
			]
		);
		$this->add_control(
			'typo_box_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .saspot-brand-typo' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'font_typo_options',
			[
				'label' => __( 'Typography', 'saaspot-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'saaspot-core' ),
				'name' => 'typo_content_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .saspot-brand-typo *',
			]
		);
		$this->start_controls_tabs( 'typo_style' );
			$this->start_controls_tab(
				'typo_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'text_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-brand-typo' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'typo_hover',
				[
					'label' => esc_html__( 'Hover', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'typo_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} a:hover .saspot-brand-typo' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_tab();  // end:Normal tab

		$this->end_controls_section();// end: Section		

	}

	/**
	 * Render App Works widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$brand_typo_title = !empty( $settings['brand_typo_title'] ) ? $settings['brand_typo_title'] : [];
		$brand_typo_use = !empty( $settings['brand_typo_use'] ) ? $settings['brand_typo_use'] : [];
		$font_style1 = !empty( $settings['font_style1'] ) ? $settings['font_style1'] : [];
		$font_style2 = !empty( $settings['font_style2'] ) ? $settings['font_style2'] : [];
		$preview_title = !empty( $settings['preview_title'] ) ? $settings['preview_title'] : [];
		$preview_color = !empty( $settings['preview_color'] ) ? $settings['preview_color'] : [];

		$brand_typo_link = !empty( $settings['brand_typo_link'] ) ? $settings['brand_typo_link'] : [];

		$typo_link = !empty( $settings['brand_typo_link']['url'] ) ? $settings['brand_typo_link']['url'] : '';
		$typo_link_external = !empty( $settings['brand_typo_link']['is_external'] ) ? 'target="_blank"' : '';
		$typo_link_nofollow = !empty( $settings['brand_typo_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$typo_link_attr = !empty( $typo_link ) ?  $typo_link_external.' '.$typo_link_nofollow : '';

		$typo_use = $brand_typo_use ? ' <span>'.$brand_typo_use.'</span>' : '';
		$title = $brand_typo_title ? '<h3>'.$brand_typo_title.$typo_use.'</h3>' : '';
		
		$font_style1 = $font_style1 ? '<span>'.$font_style1.'</span>' : '';
		$font_style2 = $font_style2 ? '<span>'.$font_style2.'</span>' : '';
		
		$preview_color = $preview_color ? ' <span>'.$preview_color.'</span>' : '';
		$preview_title = $preview_title ? '<h1>'.$preview_title.$preview_color.'</h1>' : '';

		if ($typo_link) {
			$typo_link_o = $typo_link ? '<a href="'.$typo_link.'" '.$typo_link_attr.'>' : '';
			$typo_link_c = $typo_link ? '</a>' : '';
		} else {
			$typo_link_o = '';
			$typo_link_c = '';
		}

		$output = $typo_link_o.'<div class="saspot-brand-typo">
                '.$title.'
                <span class="font-weight">'.$font_style1.$font_style2.'</span>
                '.$preview_title.'
              </div>'.$typo_link_c;
		echo $output;
		
	}

	/**
	 * Render Brand Typography widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Brand_Typo() );