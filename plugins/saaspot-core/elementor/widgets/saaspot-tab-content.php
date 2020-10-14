<?php
/*
 * Elementor SaaSpot Tab Content Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_TabContent extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_tab_content';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Tab Content', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-bars';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Tab Content widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_tab_content'];
	}
	*/

	/**
	 * Register SaaSpot Tab Content widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){

		$this->start_controls_section(
			'section_active',
			[
				'label' => __( 'Tab Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'left_info',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-warning"><b>Active number for Tab Title and Tab Content must be same.</b></div>',
			]
		);
		$this->add_control(
			'active',
			[
				'label' => __( 'Active Tab Number', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => 1,
			]
		);
		$this->add_control(
			'content_style',
			[
				'label' => esc_html__( 'Tab Content Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'one' => esc_html__( 'Style One', 'saaspot-core' ),
					'two' => esc_html__( 'Style Two', 'saaspot-core' ),
				],
				'default' => 'one',
				'description' => esc_html__( 'Select your style.', 'saaspot-core' ),
			]
		);

		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_tab_content',
			[
				'label' => __( 'Tab Content Group', 'saaspot-core' ),
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'group_style',
			[
				'label' => esc_html__( 'Content Group Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'one' => esc_html__( 'Style One', 'saaspot-core' ),
					'two' => esc_html__( 'Style Two', 'saaspot-core' ),
					'three' => esc_html__( 'Style Three (Multiple Item)', 'saaspot-core' ),
				],
				'default' => 'one',
				'description' => esc_html__( 'Select your style.', 'saaspot-core' ),
			]
		);
		$repeater->add_control(
			'left_info',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-warning"><b>Tab will Work depends on this Content ID field(Use ID from Tab Title).</b></div>',
			]
		);
		$repeater->add_control(
			'tab_content_id',
			[
				'label' => esc_html__( 'Content ID', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter ID here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'main_content_title',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter title here', 'saaspot-core' ),
				'default' => esc_html__( 'SaaSpot vs Action-no', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'tab_content_price',
			[
				'label' => esc_html__( 'Price', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter price here', 'saaspot-core' ),
				'label_block' => true,
				'condition' => [
					'group_style' => 'one',
				],
			]
		);
		$repeater->add_control(
			'tab_content_validity',
			[
				'label' => esc_html__( 'Validity', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter validity here', 'saaspot-core' ),
				'label_block' => true,
				'condition' => [
					'group_style' => 'one',
				],
			]
		);
		$repeater->add_control(
		'left_info2',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-success">Use the following Shortcode for rating. <br><b>[saaspot_ratings rating_style="tick" rating="3"]<br><br>Rating Styles<br>1. star<br>2. tick</b></div>',
				'condition' => [
					'group_style!' => 'three',
				],
			]
		);
		$repeater->add_control(
			'group_content_title',
			[
				'label' => esc_html__( 'Tab Content Title List', 'saaspot-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type title here', 'saaspot-core' ),
				'label_block' => true,
				'condition' => [
					'group_style' => 'two',
				],
			]
		);
		$repeater->add_control(
			'group_content_text',
			[
				'label' => esc_html__( 'Tab Content Text List', 'saaspot-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'content_btn',
			[
				'label' => esc_html__( 'Button Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Button Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type btn text here', 'saaspot-core' ),
				'label_block' => true,
				'condition' => [
					'group_style!' => 'three',
				],
			]
		);
		$repeater->add_control(
			'content_btn_link',
			[
				'label' => esc_html__( 'Button Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
				'condition' => [
					'group_style!' => 'three',
				],
			]
		);
		$repeater->add_control(
			'content_btn_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-angle-right',
				'condition' => [
					'group_style!' => 'three',
				],
			]
		);
		$this->add_control(
			'content_groups',
			[
				'label' => esc_html__( 'Content Group', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'main_content_title' => esc_html__( 'SaaSpot vs Action-no', 'saaspot-core' ),
					],

				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ main_content_title }}}',
			]
		);

		$this->end_controls_section();// end: Section

		// Style
		$this->start_controls_section(
			'section_box_style',
			[
				'label' => esc_html__( 'Box', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'box_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .pricing-style-two.price-item, {{WRAPPER}} .guide-info-wrap',
				]
			);
			$this->add_control(
				'box_border_radius',
				[
					'label' => __( 'Border Radius', 'saaspot-core' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .pricing-style-two.price-item, {{WRAPPER}} .guide-info-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'sastcon_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .pricing-style-two.price-item, {{WRAPPER}} .guide-info-wrap',
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
				'name' => 'sastabc_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .price-top-wrap h5, {{WRAPPER}} .guide-info-wrap h3',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-top-wrap h5, {{WRAPPER}} .guide-info-wrap h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-top-wrap, {{WRAPPER}} .guide-main-title' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_border_color',
			[
				'label' => esc_html__( 'Border Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-top-wrap, {{WRAPPER}} .guide-main-title, {{WRAPPER}} .guide-info-wrap [class*="col-"]' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Price
		$this->start_controls_section(
			'section_price_style',
			[
				'label' => esc_html__( 'Price', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'content_style' => 'one',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'saaspot-core' ),
				'name' => 'price_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .price-top-wrap h2',
			]
		);
		$this->add_control(
			'price_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-top-wrap h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Validity
		$this->start_controls_section(
			'section_validity_style',
			[
				'label' => esc_html__( 'Validity', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'content_style' => 'one',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'saaspot-core' ),
				'name' => 'validity_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .price-top-wrap p',
			]
		);
		$this->add_control(
			'validity_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-top-wrap p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Title List
		$this->start_controls_section(
			'section_title_list_style',
			[
				'label' => esc_html__( 'Title Tab', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'content_style' => 'two',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'saaspot-core' ),
				'name' => 'title_list_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .guide-info-item ul li',
			]
		);
		$this->add_control(
			'title_list_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .guide-info-item ul li' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'tit_pad',
			[
				'label' => __( 'Title Section Padding', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .guide-info-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Text List
		$this->start_controls_section(
			'section_text_list_style',
			[
				'label' => esc_html__( 'Text Tab', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'saaspot-core' ),
				'name' => 'text_list_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .guide-details ul li, {{WRAPPER}} .pricing-style-two.price-item ul li',
			]
		);
		$this->add_control(
			'text_list_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .guide-details ul li, {{WRAPPER}} .guide-details ul li a, {{WRAPPER}} .pricing-style-two.price-item ul li, {{WRAPPER}} .pricing-style-two.price-item ul li a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'cont_pad',
			[
				'label' => __( 'Content Section Padding', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .guide-details' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Button
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
				'selector' => '{{WRAPPER}} .tab-pane .saspot-btn',
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .tab-pane .saspot-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
						'{{WRAPPER}} .tab-pane .saspot-btn' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tab-pane .saspot-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .tab-pane .saspot-btn',
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
						'{{WRAPPER}} .tab-pane .saspot-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tab-pane .saspot-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_hover_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .tab-pane .saspot-btn:hover',
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Tab Content widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		// Tab Content query
		$settings = $this->get_settings_for_display();
		$active = !empty( $settings['active'] ) ? $settings['active'] : '';
		$content_style = !empty( $settings['content_style'] ) ? $settings['content_style'] : '';
		$content_groups = !empty( $settings['content_groups'] ) ? $settings['content_groups'] : '';

		if ($content_style === 'two') {
			$anim_class = ' tab-animation';
		} else {
			$anim_class = '';
		}

			$output = '<div class="tab-content'.$anim_class.'" id="nav-tabContent">';
			if( !empty( $content_groups ) && is_array( $content_groups ) ){
      	$key = 1;
      	foreach ( $content_groups as $each_logo ) {
      		$tab_content_id = !empty( $each_logo['tab_content_id'] ) ? $each_logo['tab_content_id'] : '';
      		$main_content_title = !empty( $each_logo['main_content_title'] ) ? $each_logo['main_content_title'] : '';
					$tab_content_price = !empty( $each_logo['tab_content_price'] ) ? $each_logo['tab_content_price'] : '';
					$tab_content_validity = !empty( $each_logo['tab_content_validity'] ) ? $each_logo['tab_content_validity'] : '';
					$title = !empty( $each_logo['group_content_title'] ) ? $each_logo['group_content_title'] : '';
				  $content = !empty( $each_logo['group_content_text'] ) ? $each_logo['group_content_text'] : '';

					$content_btn = !empty( $each_logo['content_btn'] ) ? $each_logo['content_btn'] : '';
					$content_btn_link = !empty( $each_logo['content_btn_link']['url'] ) ? $each_logo['content_btn_link']['url'] : '';
					$content_btn_link_external = !empty( $each_logo['content_btn_link']['is_external'] ) ? 'target="_blank"' : '';
					$content_btn_link_nofollow = !empty( $each_logo['content_btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
					$content_btn_link_attr = !empty( $content_btn_link ) ?  $content_btn_link_external.' '.$content_btn_link_nofollow : '';
					$content_btn_icon = !empty( $each_logo['content_btn_icon'] ) ? $each_logo['content_btn_icon'] : '';
					$icon = $content_btn_icon ? ' <i class="'.$content_btn_icon.'" aria-hidden="true"></i>' : '';
					$button = $content_btn_link ? '<a href="'.$content_btn_link.'" class="saspot-btn">'.$content_btn.$icon.'</a>' : '';

					$id = sanitize_title($tab_content_id);
					$active_cls = ( $key == $active ) ? ' show active' : '';

					$group_style = !empty( $each_logo['group_style'] ) ? $each_logo['group_style'] : '';
					
					$output .= '<div class="tab-pane fade'.$active_cls.'" id="nav-'.$key.$id.'" role="tabpanel" aria-labelledby="nav-'.$key.$id.'-tab">';
					if ($group_style === 'three') {
						$output .= '<div class="row">'.do_shortcode($content).'</div>';
					} else {
						if ($content_style === 'two') {
							$output .= '<div class="guide-info-wrap">
										        <h3 class="guide-main-title">'.$main_content_title.'</h3>
										        <div class="row">
										          <div class="col-sm-6">
										            <div class="guide-info-item">'.do_shortcode($title).'</div>
										          </div>
										          <div class="col-sm-6">
										            <div class="guide-details">'.do_shortcode($content).'</div>
										          </div>
										        </div>
										        '.$button.'
										      </div>';
							} else {
								$output .= '<div class="price-item pricing-style-two">
												      <div class="price-top-wrap">
												        <h5 class="price-top-title">'.$main_content_title.'</h5>
												        <h2 class="price-top-subtitle">'.$tab_content_price.'</h2>
												        <p>'.$tab_content_validity.'</p>
												      </div>
												      <div class="price-info">'.do_shortcode($content).'</div>
												      '.$button.'
												    </div>';
						}
					}
		    $output .= '</div>';
				$key++;
			  }
			}
			$output .= '</div>';
			echo $output;

	}

	/**
	 * Render Tab Content widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_TabContent() );