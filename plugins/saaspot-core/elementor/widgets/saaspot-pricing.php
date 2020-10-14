<?php
/*
 * Elementor SaaSpot Pricing Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Pricing extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_pricing';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Pricing Table', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-money';
	}

	/**
	 * Retrieve the pricing of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the pricing of scripts the SaaSpot Pricing widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_pricing'];
	}
	*/
	
	/**
	 * Register SaaSpot Pricing widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_pricing',
			[
				'label' => esc_html__( 'Pricing Options', 'saaspot-core' ),
			]
		);

		$this->add_control(
			'table_style',
			[
				'label' => __( 'Pricing Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'one' => esc_html__( 'Style One', 'saaspot-core' ),
					'two' => esc_html__( 'Style Two', 'saaspot-core' ),
				],
				'default' => 'one',
			]
		);
		$this->add_control(
			'upload_type',
			[
				'label' => __( 'Upload Type', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'image' => esc_html__( 'Image', 'saaspot-core' ),
					'icon' => esc_html__( 'Icon', 'saaspot-core' ),
				],
				'default' => 'icon',
				'condition' => [
					'table_style' => 'one',
				],
			]
		);
		$this->add_control(
			'pricing_image',
			[
				'label' => esc_html__( 'Upload Icon', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'upload_type' => 'image',
					'table_style' => 'one',
				],
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your icon image.', 'saaspot-core'),
			]
		);
		$this->add_control(
			'pricing_icon',
			[
				'label' => esc_html__( 'Sub Title Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'icon-basic-sheet-txt',
				'condition' => [
					'upload_type' => 'icon',
					'table_style' => 'one',
				],
			]
		);
		$this->add_control(
			'pricing_title',
			[
				'label' => esc_html__( 'Title Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'pricing_price',
			[
				'label' => esc_html__( 'Price', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '$99', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type price text here', 'saaspot-core' ),
				'label_block' => true,
				'condition' => [
					'table_style' => 'two',
				],
			]
		);
		$this->add_control(
			'pricing_validity',
			[
				'label' => esc_html__( 'Validity', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'month', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type validity text here', 'saaspot-core' ),
				'label_block' => true,
				'condition' => [
					'table_style' => 'two',
				],
			]
		);
		
		$repeater = new Repeater();
		$repeater->add_control(
		'left_info2',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-success">Use the following Shortcode for rating. <br><b>[saaspot_ratings rating_style="tick" rating="3"]<br><br>Rating Styles<br>1. star<br>2. tick</b></div>',
			]
		);
		$repeater->add_control(
			'pricing_text',
			[
				'label' => esc_html__( 'Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'pricingItems_groups',
			[
				'label' => esc_html__( 'Pricings', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'pricing_text' => esc_html__( 'Item #1', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ pricing_text }}}',
			]
		);
		$this->end_controls_section();// end: Section

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
				'selector' => '{{WRAPPER}} .compare-pricings-wrap, {{WRAPPER}} .saspot-price-item',
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .compare-pricings-wrap, {{WRAPPER}} .saspot-price-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
				'name' => 'saspri_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} h3.compare-title, {{WRAPPER}} .price-item h3',
			]
		);
		$this->add_control(
			'pricing_title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h3.compare-title, {{WRAPPER}} .price-item h3' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} h3.compare-title, {{WRAPPER}} .price-item h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_price_style',
			[
				'label' => esc_html__( 'Price', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'table_style' => 'two',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pricing_price_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .price-info h2',
			]
		);
		$this->add_control(
			'pricing_price_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-info h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_validity_style',
			[
				'label' => esc_html__( 'Validity', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'table_style' => 'two',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pricing_validity_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .price-info p',
			]
		);
		$this->add_control(
			'pricing_validity_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-info p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_list_style',
			[
				'label' => esc_html__( 'List', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pricing_list_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .guide-info-item ul li, {{WRAPPER}} .price-info .check-list li',
			]
		);
		$this->add_control(
			'pricing_list_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .guide-info-item ul li, {{WRAPPER}} .price-info .check-list li' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'pricing_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .check-list li:before' => 'color: {{VALUE}};',
				],
				'condition' => [
					'table_style' => 'two',
				],
			]
		);
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Pricing widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$table_style = !empty( $settings['table_style'] ) ? $settings['table_style'] : '';
		$upload_type = !empty( $settings['upload_type'] ) ? $settings['upload_type'] : '';
		$pricing_image = !empty( $settings['pricing_image']['id'] ) ? $settings['pricing_image']['id'] : '';
		$pricing_icon = !empty( $settings['pricing_icon'] ) ? $settings['pricing_icon'] : '';
		$pricing_title = !empty( $settings['pricing_title'] ) ? $settings['pricing_title'] : '';
		$pricing_price = !empty( $settings['pricing_price'] ) ? $settings['pricing_price'] : '';
		$pricing_validity = !empty( $settings['pricing_validity'] ) ? $settings['pricing_validity'] : '';
		$pricingItems_groups = !empty( $settings['pricingItems_groups'] ) ? $settings['pricingItems_groups'] : [];
		$icon = $pricing_icon ? ' <i class="'.$pricing_icon.'" aria-hidden="true"></i>' : '';

		$image_url = wp_get_attachment_url( $pricing_image );
		$image = $pricing_image ? '<img src="'.$image_url.'" alt="Resource">' : '';

		if($upload_type === 'icon') {
		  $image_icon = $icon;
		} else {
		  $image_icon = $image;
		}

		$price = $pricing_price ? '<h2 class="price-title-wrap">'.$pricing_price.'</h2>' : '';
		$validity = $pricing_validity ? '<p>/'.$pricing_validity.'</p>' : '';

		if ($table_style === 'two') {		
			$output = '<div class="price-item saspot-price-item saspot-item">
	                <h3 class="price-title">'.$pricing_title.'</h3>
	                <div class="price-info">
	                  '.$price.$validity.'
	                  <ul class="check-list">';
	                    if( is_array( $pricingItems_groups ) && !empty( $pricingItems_groups ) ){
											  foreach ( $pricingItems_groups as $each_pricing ) {
												$pricing_text = $each_pricing['pricing_text'] ? $each_pricing['pricing_text'] : '';
												  $output .= '<li>'. do_shortcode($pricing_text) .'</li>';
											  }
											}
        $output .= '</ul>
	                </div>
	              </div>';
	  } else {
		  $output = '<div class="compare-pricings-wrap">
	                <h3 class="compare-title">'.$image_icon.$pricing_title.'</h3>
	                <div class="guide-info-item">
	                  <ul>';
											// Group Param Output
											if( is_array( $pricingItems_groups ) && !empty( $pricingItems_groups ) ){
											  foreach ( $pricingItems_groups as $each_pricing ) {
												$pricing_text = $each_pricing['pricing_text'] ? $each_pricing['pricing_text'] : '';
												  $output .= '<li>'. do_shortcode($pricing_text) .'</li>';
											  }
											}
			$output .= '</ul></div></div>';
		}

		echo $output;
		
	}

	/**
	 * Render Pricing widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Pricing() );