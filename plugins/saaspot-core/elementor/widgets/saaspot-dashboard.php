<?php
/*
 * Elementor SaaSpot Dashboard Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Dashboard extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_dashboard';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Dashboard Tab', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-tachometer';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Dashboard widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_dashboard'];
	}
	*/
	
	/**
	 * Register SaaSpot Dashboard widget controls.
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
			'tab_style',
			[
				'label' => esc_html__( 'Tab Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One', 'saaspot-core' ),
					'style-two' => esc_html__( 'Style Two', 'saaspot-core' ),
				],
				'default' => 'style-one',
				'description' => esc_html__( 'Select your tab style.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'col_style',
			[
				'label' => esc_html__( 'Column Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'col-5' => esc_html__( 'Column 5 & 7', 'saaspot-core' ),
					'col-6' => esc_html__( 'Column 6 & 6', 'saaspot-core' ),
				],
				'default' => 'col-5',
				'description' => esc_html__( 'Select your column style.', 'saaspot-core' ),
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
			'tab_section_title',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter title count here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'tab_section_content',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter content here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_dashboard',
			[
				'label' => __( 'Dashboard Item', 'saaspot-core' ),
			]
		);		

		$repeater = new Repeater();		
		$repeater->add_control(
			'tab_title',
			[
				'label' => esc_html__( 'Tab Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Tab Title', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type tag text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);		
		$repeater->add_control(
			'aw_image',
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
			'dashTab_groups',
			[
				'label' => esc_html__( 'Dashboard Items', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title' => esc_html__( 'Order Value', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ tab_title }}}',
			]
		);
		
		$this->end_controls_section();// end: Section		

		// Section Title
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Section Title', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sasdas_section_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .saspot-dashboard .section-title-wrap h2',
			]
		);
		$this->add_control(
			'section_title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-dashboard .section-title-wrap h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		// Section Content
		$this->start_controls_section(
			'section_text_style',
			[
				'label' => esc_html__( 'Section Content', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_content_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .saspot-dashboard .section-title-wrap p',
			]
		);
		$this->add_control(
			'section_content_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-dashboard .section-title-wrap p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'section_content_align',
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
					'{{WRAPPER}} .tab-content .saspot-image' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Tab Title Style
		$this->start_controls_section(
			'section_tab_style',
			[
				'label' => esc_html__( 'Tab Title', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sasdas_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .nav-tabs .nav-link',
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
						'{{WRAPPER}} .nav-tabs .nav-link' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'title_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nav-tabs .nav-link' => 'background-color: {{VALUE}};',
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
						'{{WRAPPER}} .nav-tabs .nav-link:hover, .nav-tabs .nav-link.active' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'title_bg_hover_color',
				[
					'label' => esc_html__( 'Background Hover Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nav-tabs .nav-link:hover, {{WRAPPER}} .nav-tabs .nav-link.active' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Dashboard widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		// Dashboard query
		$dashboard = $this->get_settings_for_display( 'dashTab_groups' );
		//$one_active  = ( isset( $settings['one_active'] ) && ( 'true' == $settings['one_active'] ) ) ? true : false;
		$settings = $this->get_settings_for_display();
		$col_style = !empty( $settings['col_style'] ) ? $settings['col_style'] : '';
		$tab_style = !empty( $settings['tab_style'] ) ? $settings['tab_style'] : '';
		$active = !empty( $settings['active'] ) ? $settings['active'] : '';
		$tab_section_title = !empty( $settings['tab_section_title'] ) ? $settings['tab_section_title'] : '';
		$tab_section_content = !empty( $settings['tab_section_content'] ) ? $settings['tab_section_content'] : '';

		$title = $tab_section_title ? '<h2 class="section-title">'.$tab_section_title.'</h2>' : '';
		$content = $tab_section_content ? '<p>'.$tab_section_content.'</p>' : '';
    $uniqtab     = uniqid(2);

    if ($col_style === 'col-6') {
			$col1_cls = 'col-lg-6';
			$col2_cls = 'col-lg-6';
		} else {
			$col1_cls = 'col-lg-5';
			$col2_cls = 'col-lg-7';
		}

		if ($tab_style === 'style-two') {
			$style_cls = ' tabs-style-two';
		} else {
			$style_cls = '';
		}
	
			$output = '';
			if( !empty( $dashboard ) && is_array( $dashboard ) ){
			$output .= '<div class="saspot-dashboard">
							      <div class="row align-items-center">
							        <div class="'.$col1_cls.'">
							          <div class="dashboard-info">
							            <div class="section-title-wrap section-title-style-two">'.$title.$content.'</div>
							            <nav>
							              <div class="nav flex-column nav-tabs'.$style_cls.'" id="nav-tab" role="tablist">';
							              	$key = 1;
															foreach ( $dashboard as $each_logo ) {
															$active_cls = ( $key == $active ) ? ' active' : '';
																$output .= '<a class="nav-item nav-link'.$active_cls.'" id="nav-'.$uniqtab.$key.'-tab" data-toggle="tab" href="#nav-'.$uniqtab.$key.'" role="tab" aria-controls="nav-'.$uniqtab.$key.'" aria-selected="true">'.$each_logo['tab_title'].'</a>';
															$key++;
															}						                
	              $output .= '</div>
							            </nav>
							          </div>
							        </div>
							        <div class="'.$col2_cls.'">
							          <div class="tab-content tab-animation" id="nav-tabContent">';
													$key = 1;
													foreach ( $dashboard as $each_logo ) {
														$active_clss = ( $key == $active ) ? ' active show' : '';
														$image_url = wp_get_attachment_url( $each_logo['aw_image']['id'], 'thumbnail' );
														$output .= '<div class="tab-pane fade'.$active_clss.'" id="nav-'.$uniqtab.$key.'" role="tabpanel" aria-labelledby="nav-'.$uniqtab.$key.'-tab"><div class="saspot-image"><img src="'. $image_url .'" alt="Template"></div></div>';
													$key++;
													}
	          $output .= '</div>
							        </div>
							      </div>
								  </div>';
			}
			echo $output;
		
	}

	/**
	 * Render Dashboard widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Dashboard() );