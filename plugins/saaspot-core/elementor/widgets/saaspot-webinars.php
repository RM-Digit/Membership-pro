<?php
/*
 * Elementor SaaSpot Webinars Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$noneed_webinars_post = (saaspot_framework_active()) ? cs_get_option('noneed_webinars_post') : '';

if (!$noneed_webinars_post) {
class SaaSpot_Webinars extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_webinars';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Webinars', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-film';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Webinars widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['vt-saaspot_webinars'];
	}
	
	/**
	 * Register SaaSpot Webinars widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){

		$this->start_controls_section(
			'section_webinars_listing',
			[
				'label' => esc_html__( 'Listing', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'webinars_style',
			[
				'label' => __( 'Webinars Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'one' => esc_html__( 'Style One', 'saaspot-core' ),
					'two' => esc_html__( 'Style Two', 'saaspot-core' ),
				],
				'default' => 'one',
				'description' => esc_html__( 'Select your webinars style.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'webinars_limit',
			[
				'label' => esc_html__( 'Limit', 'saaspot-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => -1,
				'step' => 1,
				'description' => esc_html__( 'Enter the number of items to show.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'webinars_order',
			[
				'label' => __( 'Order', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'ASC' => esc_html__( 'Asending', 'saaspot-core' ),
					'DESC' => esc_html__( 'Desending', 'saaspot-core' ),
				],
				'default' => '',
				'description' => esc_html__( 'Select your order.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'webinars_orderby',
			[
				'label' => __( 'Order By', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => '',
				'options' => [
					'none' => __('None', 'saaspot-core'),
					'ID' => __('ID', 'saaspot-core'),
					'author' => __('Author', 'saaspot-core'),
					'title' => __('Name', 'saaspot-core'),
					'date' => __('Date', 'saaspot-core'),
					'rand' => __('Rand', 'saaspot-core'),
					'menu_order' => __('Menu Order', 'saaspot-core'),
				],
			]
		);
		$this->add_control(
			'webinars_show_category',
			[
				'label' => __( 'Show only certain categories?', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => Controls_Helper_Output::get_terms_names( 'webinars_category'),
				'multiple' => true,
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_webinars_ena_dis',
			[
				'label' => esc_html__( 'Enable & Disable', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'webinars_aqr',
			[
				'label' => esc_html__( 'Disable Image Resize?', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$this->add_control(
			'webinars_filter',
			[
				'label' => esc_html__( 'Filter', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'webinars_pagination',
			[
				'label' => esc_html__( 'Pagination', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->end_controls_section();// end: Section
		
		// Filter
		$this->start_controls_section(
			'section_filter_style',
			[
				'label' => esc_html__( 'Filter', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'webinars_filter' => 'true',
				],
				'frontend_available' => true,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'filter_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .masonry-filters ul li a',
			]
		);		
		$this->start_controls_tabs( 'filter_style' );
			$this->start_controls_tab(
				'filter_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'filter_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .masonry-filters ul li a' => 'color: {{VALUE}};',
					],
				]
			);			
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'filter_active',
				[
					'label' => esc_html__( 'Active', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'filter_active_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .masonry-filters ul li a.active' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'filter_active_border_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .masonry-filters.filters-style-two ul li a:before' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Active tab
		$this->end_controls_tabs(); // end tabs		
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
				'name' => 'saswebi_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .webinar-info h3',
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
						'{{WRAPPER}} .webinar-info h3 a' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} .webinar-info h3 a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs		
		$this->end_controls_section();// end: Section
		
		// Categories
		$this->start_controls_section(
			'section_cat_style',
			[
				'label' => esc_html__( 'Categories', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .saspot-label',
			]
		);
		$this->add_control(
			'cat_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-label' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'cat_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-label' => 'background-color: {{VALUE}};',
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
				'name' => 'content_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .webinar-info p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webinar-info p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'content_border_color',
			[
				'label' => esc_html__( 'Border Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webinars-wrap .webinars-inner-wrap, {{WRAPPER}} .webinar-item' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Button		
		$this->start_controls_section(
			'section_btn_style',
			[
				'label' => esc_html__( 'Button Options', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'webinars_style' => 'two',
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
				'icon_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .video-btn i' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'icon_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .video-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'icon_border_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .video-btn:before, {{WRAPPER}} .video-btn:after' => 'border-color: {{VALUE}};',
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
				'icon_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .video-btn:hover i' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'icon_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .video-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'icon_border_hover_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .video-btn:hover:before, {{WRAPPER}} .video-btn:hover:after' => 'border-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section

		// Link
		$this->start_controls_section(
			'section_link_style',
			[
				'label' => esc_html__( 'Link', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'webinars_style' => 'one',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'link_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .webinar-info .saspot-link',
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
						'{{WRAPPER}} .webinar-info .saspot-link' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_border_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .webinar-info .saspot-link:after' => 'background-color: {{VALUE}};',
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
						'{{WRAPPER}} .webinar-info .saspot-link:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_border_hover_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .webinar-info .saspot-link:hover:after' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section
		
		// Pagination
		$this->start_controls_section(
			'section_pagi_style',
			[
				'label' => esc_html__( 'Pagination', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'webinars_pagination' => 'true',
				],
			]
		);
		$this->add_responsive_control(
			'pagi_min_width',
			[
				'label' => esc_html__( 'Size', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 38,
						'max' => 500,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .saspot-pagination ul li a, {{WRAPPER}} .saspot-pagination ul li span' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pagi_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .saspot-pagination ul li a, {{WRAPPER}} .saspot-pagination ul li span',
			]
		);
		$this->start_controls_tabs( 'pagi_style' );
			$this->start_controls_tab(
				'pagi_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'pagi_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-pagination ul li a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'pagi_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-pagination ul li a' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'pagi_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .saspot-pagination ul li a',
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'pagi_hover',
				[
					'label' => esc_html__( 'Hover', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'pagi_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-pagination ul li a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'pagi_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-pagination ul li a:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'pagi_hover_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .saspot-pagination ul li a:hover',
				]
			);
			$this->end_controls_tab();  // end:Hover tab
			$this->start_controls_tab(
				'pagi_active',
				[
					'label' => esc_html__( 'Active', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'pagi_active_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-pagination ul li span.current' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'pagi_bg_active_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-pagination ul li span.current' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'pagi_active_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .saspot-pagination ul li span.current',
				]
			);
			$this->end_controls_tab();  // end:Active tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section
	}

	/**
	 * Render Webinars widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$webinars_style = !empty( $settings['webinars_style'] ) ? $settings['webinars_style'] : '';
		$webinars_limit = !empty( $settings['webinars_limit'] ) ? $settings['webinars_limit'] : '';
		$webinars_order = !empty( $settings['webinars_order'] ) ? $settings['webinars_order'] : '';
		$webinars_orderby = !empty( $settings['webinars_orderby'] ) ? $settings['webinars_orderby'] : '';
		$webinars_show_category = !empty( $settings['webinars_show_category'] ) ? $settings['webinars_show_category'] : [];
		$webinars_aqr  = ( isset( $settings['webinars_aqr'] ) && ( 'true' == $settings['webinars_aqr'] ) ) ? true : false;
		$webinars_filter  = ( isset( $settings['webinars_filter'] ) && ( 'true' == $settings['webinars_filter'] ) ) ? true : false;
		$webinars_pagination  = ( isset( $settings['webinars_pagination'] ) && ( 'true' == $settings['webinars_pagination'] ) ) ? true : false;

		$webinars_limit = $webinars_limit ? $webinars_limit : '-1';
		$webi_all_text = cs_get_option('webi_all_text');
		$webi_all_text_actual = $webi_all_text ? $webi_all_text : esc_html__('ALL WEBINARS', 'saaspot');

		if ($webinars_style === 'two') {
		  $style_class = ' examples-style-two';
		  $row_class = 'row';
		} else {
		  $style_class = '';
		  $row_class = 'webinars-wrap';
		}

		// Turn output buffer on
		ob_start();

		// Pagination
		global $paged;
		if( get_query_var( 'paged' ) )
		  $my_page = get_query_var( 'paged' );
		else {
		  if( get_query_var( 'page' ) )
			$my_page = get_query_var( 'page' );
		  else
			$my_page = 1;
		  set_query_var( 'paged', $my_page );
		  $paged = $my_page;
		}

		$args = array(
		  // other query params here,
			'paged' => $my_page,
			'post_type' => 'webinars',
			'posts_per_page' => (int)$webinars_limit,
  		'webinars_category' => $webinars_show_category,
			'orderby' => $webinars_orderby,
			'order' => $webinars_order
		);
		
		$saspot_port = new \WP_Query( $args ); ?>
		<div class="saspot-webinars-section<?php echo esc_attr($style_class); ?>">
	    <div class="<?php echo esc_attr($row_class); ?>">
				<?php if ($webinars_filter && $webinars_style !== 'two') { ?>
				<div class="masonry-filters filters-style-two">
	        <ul>
	          <li><a href="javascript:void(0);" data-filter="*" class="active"><?php echo esc_html($webi_all_text_actual); ?></a></li>
	          <?php
	            if ($webinars_show_category) {
	              $terms = $webinars_show_category;
	              $count = count($terms);
	              if ($count > 0) {
	                foreach ($terms as $term) {
	                  echo '<li class="webi-'. preg_replace('/\s+/', "", strtolower($term)) .'"><a href="javascript:void(0);" data-filter=".webi-'. preg_replace('/\s+/', "", strtolower($term)) .'" title="' . str_replace('-', " ", ucfirst($term)) . '">' . str_replace('-', " ", ucfirst($term)) . '</a></li>';
	                 }
	              }
	            } else {
	              if ( function_exists( 'saaspot_webinars_category_list' ) ) {
	                echo saaspot_webinars_category_list();
	              }
	            }
	          ?>
	        </ul>
	      </div>
				<?php } ?>
				<!-- Webinars Start -->
				<?php if ($webinars_style !== 'two') { ?>
	      <div class="webinars-inner-wrap">
	        <div class="saspot-masonry" data-items="1">
        <?php }
  	      if ($saspot_port->have_posts()) : while ($saspot_port->have_posts()) : $saspot_port->the_post();
  	      

					// Category
					global $post;
					$saaspot_terms = wp_get_post_terms($post->ID,'webinars_category');
					foreach ($saaspot_terms as $term) {
					  $saaspot_cat_class = 'webi-' . $term->slug;
					}
					$saaspot_count = count($saaspot_terms);
					$i=0;
					$saaspot_cat_class = '';
					if ($saaspot_count > 0) {
					  foreach ($saaspot_terms as $term) {
					    $i++;
					    $saaspot_cat_class .= 'webi-'. $term->slug .' ';
					    if ($saaspot_count != $i) {
					      $saaspot_cat_class .= '';
					    } else {
					      $saaspot_cat_class .= '';
					    }
					  }
					}
					$video_text = cs_get_option('video_text');
					$video_text = $video_text ? $video_text : esc_html__('WATCH NOW', 'saaspot');

					// Metabox
					$saaspot_id    = ( isset( $post ) ) ? $post->ID : 0;
					$saaspot_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $saaspot_id;
					$saaspot_meta  = get_post_meta( $saaspot_id, 'page_type_metabox', true );
					$portfolio_meta  = get_post_meta( $saaspot_id, 'webinars_metabox', true );
					if ($portfolio_meta) {
					  $webinars_video = $portfolio_meta['webinars_video'];
					} else {
					  $webinars_video = '';
					}

					// Featured Image
					$saaspot_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
					$saaspot_large_image = $saaspot_large_image[0];
					if ($webinars_aqr) {
						$saaspot_featured_img = $saaspot_large_image;
					} else {
						if ($webinars_style === 'two') {
						  if(class_exists('Aq_Resize')) {
						    $saaspot_webinars_img = aq_resize( $saaspot_large_image, '560', '360', true );
						  } else {$saaspot_webinars_img = $saaspot_large_image;}
						  $saaspot_featured_img = ( $saaspot_webinars_img ) ? $saaspot_webinars_img : SAASPOT_PLUGIN_ASTS . '/images/holders/560x360.png';
						} else {
						  if(class_exists('Aq_Resize')) {
						    $saaspot_webinars_img = aq_resize( $saaspot_large_image, '199', '184', true );
						  } else {$saaspot_webinars_img = $saaspot_large_image;}
						  $saaspot_featured_img = ( $saaspot_webinars_img ) ? $saaspot_webinars_img : SAASPOT_PLUGIN_ASTS . '/images/holders/200x185.png';
						}
					}

					if ($webinars_style === 'two') {
					?>
					<div class="col-md-6">
					  <div class="market-example-item">
					    <div class="video-wrap-inner">
					      <div class="saspot-image">
					        <?php if ($webinars_video) { ?>
					        <a href="#0" id="myUrl" data-toggle="modal" data-src="<?php echo esc_url($webinars_video); ?>" data-target="#SaaSpotVideoModal" class="saspot-video-btn">
					          <span class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></span>
					        </a>
					        <?php } ?>
					        <img src="<?php echo esc_url($saaspot_featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
					      </div>
					    </div>
					    <div class="market-example-info">
					      <div class="saspot-label">
					        <?php
					          $category_list = wp_get_post_terms(get_the_ID(), 'webinars_category');
					          foreach ($category_list as $term) {
					            $webinars_term_link = get_term_link( $term );
            					echo '<span><a href="'. esc_url($webinars_term_link) .'">'. esc_html($term->name) .'</a></span> ';
					          }
					        ?>
					      </div>
					      <h4 class="market-example-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(the_title()); ?></a></h4>
					      <p><?php the_excerpt(); ?></p>
					    </div>
					  </div>
					</div>
					<?php } else { ?>
					<div class="masonry-item <?php echo esc_attr($saaspot_cat_class); ?>" data-category="<?php echo esc_attr($saaspot_cat_class); ?>">
					  <div class="webinar-item">
					    <div class="saspot-image"><img src="<?php echo esc_url($saaspot_featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></div>
					    <div class="webinar-info">
					      <div class="saspot-label">
					        <?php
					          $category_list = wp_get_post_terms(get_the_ID(), 'webinars_category');
					          foreach ($category_list as $term) {
					            $webinars_term_link = get_term_link( $term );
            					echo '<span><a href="'. esc_url($webinars_term_link) .'">'. esc_html($term->name) .'</a></span> ';
					          }
					        ?>
					      </div>
					      <h3 class="webinar-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(the_title()); ?></a></h3>
					      <p><?php the_excerpt(); ?></p>
					      <?php if ($webinars_video) { ?>
					      <div class="saspot-link-wrap link-wrap-style-two"><a href="#0" data-toggle="modal" data-src="<?php echo esc_url($webinars_video); ?>" data-target="#SaaSpotVideoModal" class="saspot-link"><i class="fa fa-play-circle-o" aria-hidden="true"></i> <?php echo esc_html($video_text); ?></a></div>
					      <?php } ?>
					    </div>
					  </div>
					</div>
					<?php }
	        endwhile;
  	      endif; 
  	      wp_reset_postdata(); ?>
				<?php if ($webinars_style !== 'two') { ?>
	        </div>
		    </div>
				<?php } if ($webinars_pagination) { ?>
	      <div class="pagination-wrap">
		    	<?php saaspot_paging_nav($saspot_port->max_num_pages,"",$paged); ?>
		  	</div>
	      <?php } ?>
      </div>
		</div>
		<!-- Webinars End -->

		<?php
		// Return outbut buffer
		echo ob_get_clean();
		
	}

	/**
	 * Render Webinars widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Webinars() );
}