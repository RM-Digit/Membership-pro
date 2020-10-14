<?php
/*
 * Elementor SaaSpot Additional Features Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_AdditionalFeatures extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_additional_features';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Additional Features', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-check-square-o';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Additional Features widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_additional_features'];
	}
	*/
	
	/**
	 * Register SaaSpot Additional Features widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_list',
			[
				'label' => esc_html__( 'Additional Features Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'features_title',
			[
				'label' => esc_html__( 'Features Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Additional Features', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type features title here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Button Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Add Features', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type btn text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' => esc_html__( 'Button Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => esc_url(home_url( '/' )).'cart/?',
				],
				'label_block' => true,
			]
		);
		
		$repeater = new Repeater();
		
		$repeater->add_control(
			'list_text',
			[
				'label' => esc_html__( 'Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'tooltip_text',
			[
				'label' => esc_html__( 'Tooltip Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'link_id',
			[
				'label' => esc_html__( 'Link ID', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'listItems_groups',
			[
				'label' => esc_html__( 'Additional Featuress', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'list_text' => esc_html__( 'Item #1', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_text }}}',
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'additional_style',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'additional_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .plan-feature-item .wpcf7-list-item-label.additional-features',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .plan-feature-item .wpcf7-list-item-label.additional-features' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Tooltip', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .plan-feature-item .wpcf7-list-item-label a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 2,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .plan-feature-item .wpcf7-list-item-label a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_text_title_style',
			[
				'label' => esc_html__( 'Additional Features Text', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'list_text_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .plan-feature-item .wpcf7-list-item-label',
			]
		);
		$this->add_control(
			'list_text_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .plan-feature-item .wpcf7-list-item-label' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .plan-feature-item .saspot-btn-wrap .saspot-btn',
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
						'{{WRAPPER}} .plan-feature-item .saspot-btn-wrap .saspot-btn' => 'color: {{VALUE}};',
					],
				]
			);					
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Button Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .plan-feature-item .saspot-btn-wrap .saspot-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .plan-feature-item .saspot-btn-wrap .saspot-btn',
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
						'{{WRAPPER}} .plan-feature-item .saspot-btn-wrap .saspot-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Button Background Hover Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .plan-feature-item .saspot-btn-wrap .saspot-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_hover_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .plan-feature-item .saspot-btn-wrap .saspot-btn:hover',
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Additional Features widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$features_title = !empty( $settings['features_title'] ) ? $settings['features_title'] : '';
		$btn_text = !empty( $settings['btn_text'] ) ? $settings['btn_text'] : '';
		$btn_link = !empty( $settings['btn_link']['url'] ) ? $settings['btn_link']['url'] : esc_url(home_url( '/' )).'cart/?';
		$btn_external = !empty( $settings['btn_link']['is_external'] ) ? 'target="_blank"' : '';
		$btn_nofollow = !empty( $settings['btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$btn_link_attr = !empty( $btn_link ) ?  $btn_external.' '.$btn_nofollow : '';

		$listItems_groups = !empty( $settings['listItems_groups'] ) ? $settings['listItems_groups'] : [];

	  $button = $btn_link ? '<a href="'.$btn_link.'" data-link="'.$btn_link.'" '.$btn_link_attr.' class="saspot-btn saspot-light-blue-btn">'.$btn_text.' <i class="fa fa-angle-right" aria-hidden="true"></i></a>' : '';
		
	  $output = '<div class="plan-feature-item">
							  <label for="additional-features">
							    <span class="wpcf7-list-item-label additional-features">'.$features_title.'</span>
							    <span class="checkbox-icon-wrap">
							      <input name="additional-features" type="checkbox" id="additional-features" value="forever" class="Minput-checkbox" />
							      <span class="checkbox-icon"></span>
							    </span>
							  </label>';

								// Group Param Output
								if( is_array( $listItems_groups ) && !empty( $listItems_groups ) ){
								  foreach ( $listItems_groups as $each_list ) {
									$tooltip_text = $each_list['tooltip_text'] ? '<a href="#0" data-toggle="tooltip" data-placement="top" data-html="true" data-custom-class="tooltip-md" title="'.$each_list['tooltip_text'].'" class="info-link"><i class="fa fa-info-circle" aria-hidden="true"></i></a>' : '';
									$list_text = $each_list['list_text'] ? $each_list['list_text'] : '';
									$checks = sanitize_title($list_text);
									$link_id = $each_list['link_id'] ? $each_list['link_id'] : $checks;
									
									  $output .= '<div class="checkbox-wrap">
															    <label for="'.$checks.'">
															      <span class="checkbox-icon-wrap">
															        <input name="feature" type="checkbox" id="'.$checks.'" value="'.$link_id.'" class="input-checkbox" />
															        <span class="checkbox-icon"></span>
															      </span>
															      <span class="wpcf7-list-item-label">'.$list_text.$tooltip_text.'</span>
															    </label>
															  </div>';
								  }
								}

		$output .= '<div class="saspot-btn-wrap">'.$button.'</div></div>';

		echo $output;
		
	}

	/**
	 * Render Additional Features widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_AdditionalFeatures() );