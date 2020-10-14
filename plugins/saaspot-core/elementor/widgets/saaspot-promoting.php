<?php
/*
 * Elementor SaaSpot Promoting Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Promoting extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_promoting';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Promoting', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-code-fork';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot SaaSpot Promoting widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_promoting'];
	}
	*/
	
	/**
	 * Register SaaSpot SaaSpot Promoting widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_promoting',
			[
				'label' => esc_html__( 'Promoting Options', 'saaspot-core' ),
			]
		);

		$this->add_control(
			'promoting_style',
			[
				'label' => __( 'Promoting Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One', 'saaspot-core' ),
					'style-two' => esc_html__( 'Style Two', 'saaspot-core' ),
				],
				'default' => 'style-one',
			]
		);
		$this->add_control(
			'col_type',
			[
				'label' => __( 'Column Option', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'col-3' => esc_html__( '3 Column', 'saaspot-core' ),
					'col-4' => esc_html__( '4 Column', 'saaspot-core' ),
					'col-2' => esc_html__( '2 Column', 'saaspot-core' ),
				],
				'default' => 'col-3',
			]
		);
		
		$repeater = new Repeater();

		$repeater->add_control(
			'icon_type',
			[
				'label' => __( 'Icon Type', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'image' => esc_html__( 'Image', 'saaspot-core' ),
					'number' => esc_html__( 'Number', 'saaspot-core' ),
				],
				'default' => 'image',
			]
		);
		$repeater->add_control(
			'promoting_image',
			[
				'label' => esc_html__( 'Upload Icon', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'icon_type' => 'image',
				],
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your icon image.', 'saaspot-core'),
			]
		);
		$repeater->add_control(
			'promoting_title',
			[
				'label' => esc_html__( 'Promoting Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type item title here', 'saaspot-core' ),
			]
		);
		$repeater->add_control(
			'promoting_title_link',
			[
				'label' => esc_html__( 'Promoting Title Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'saaspot-core' ),
				'label_block' => true,
				'show_external' => true,
				'default' => [
					'url' => '',
				],
			]
		);
		$repeater->add_control(
			'promoting_content',
			[
				'label' => esc_html__( 'Promoting Content', 'saaspot-core' ),
				'default' => esc_html__( 'your content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'promoting',
			[
				'label' => esc_html__( 'Promoting Items', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'promoting_title' => esc_html__( 'Solutions', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ promoting_title }}}',
			]
		);
		
		$this->end_controls_section();// end: Section

		// Style
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Counter', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'count_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .promote-counter',
			]
		);
		$this->add_control(
			'count_color',
			[
				'label' => esc_html__( 'Count Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .promote-counter' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'count_bg_color',
			[
				'label' => esc_html__( 'Count Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .promote-counter' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( ' Count Border Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .promoting-style-two .promote-item.saspot-hover .promote-counter:before' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->start_controls_tabs( 'arrow_style' );
			$this->start_controls_tab(
					'arrow_normal',
					[
						'label' => esc_html__( 'Normal', 'saaspot-core' ),
					]
				);
			$this->add_control(
				'arrow_color',
				[
					'label' => esc_html__( 'Arrow Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .animated-arrow' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
					'arrow_hover',
					[
						'label' => esc_html__( 'Moving', 'saaspot-core' ),
					]
				);
			$this->add_control(
				'arrow_hover_color',
				[
					'label' => esc_html__( 'Arrow Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .arrow-wrap:before' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		$this->end_controls_section();// end: Section

		// Title Style
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
				'name' => 'sasprom_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .promote-item h3',
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
						'{{WRAPPER}} .promote-item h3, {{WRAPPER}} .promote-item h3 a' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} .promote-item h3 a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		
		$this->end_controls_section();// end: Section

		// Content Style
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
				'selector' => '{{WRAPPER}} .promote-item p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .promote-item p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Promoting widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$promoting = !empty( $settings['promoting'] ) ? $settings['promoting'] : [];
		$promoting_style = !empty( $settings['promoting_style'] ) ? $settings['promoting_style'] : [];
		$column = !empty( $settings['col_type'] ) ? $settings['col_type'] : [];

		if($promoting_style === 'style-two') {
		  $style_cls = ' promoting-style-two';
		} else {
		  $style_cls = '';
		}

		if($column === 'col-2') {
		  $col_cls = 'col-lg-6 col-md-4';
		} elseif ($column === 'col-4') {
		  $col_cls = 'col-lg-3 col-md-4';
		} else {
		  $col_cls = 'col-md-4';
		}

		$output = '<div class="saspot-promoting'.$style_cls.'"><div class="row">';

		// Group Param Output
		if( is_array( $promoting ) && !empty( $promoting ) )
		foreach ( $promoting as $each_logo ) {

		  $title = !empty( $each_logo['promoting_title'] ) ? $each_logo['promoting_title'] : '';
		  $title_link = !empty( $each_logo['promoting_title_link']['url'] ) ? $each_logo['promoting_title_link']['url'] : '';
			$title_external = !empty( $each_logo['promoting_title_link']['is_external'] ) ? 'target="_blank"' : '';
			$title_nofollow = !empty( $each_logo['promoting_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
			$title_link_attr = $title_external.' '.$title_nofollow;

		  $image_url = wp_get_attachment_url( $each_logo['promoting_image']['id'] );
		  $content = !empty( $each_logo['promoting_content'] ) ? $each_logo['promoting_content'] : '';
		  $icon_type = !empty( $each_logo['icon_type'] ) ? $each_logo['icon_type'] : '';

		  $image = $image_url ? '<img src="'.$image_url.'" width="70" alt="Promoting">' : '';
		  $promoting_content = $content ? '<p>'.$content.'</p>' : '';

			$promoting_title_link = $title_link ? '<a href="'.esc_url($title_link).'" '.$title_link_attr.'>'.$title.'</a>' : $title;
			$promoting_title = $title ? '<h3 class="promote-title">'.$promoting_title_link.'</h3>' : '';

			if($icon_type === 'number') {
			  $promoting_image = '<div class="promote-counter"></div>';
			} else {
			  $promoting_image = $image;
			}

		  $output .= '<div class="'.$col_cls.'">
				            <div class="promote-item">
				              <div class="saspot-icon">
				                '.$promoting_image.'
				                <div class="arrow-wrap">
				                  <span class="animated-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
				                </div>
				              </div>
				              '.$promoting_title.$promoting_content.'
				            </div>
				          </div>';

		}

		$output .= '</div></div>';

		echo $output;
		
	}

	/**
	 * Render Promoting widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Promoting() );