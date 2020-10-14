<?php
/*
 * Elementor SaaSpot Tools Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Tools extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_tools';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Tools', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-wrench';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Tools widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_tools'];
	}
	*/
	
	/**
	 * Register SaaSpot Tools widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_tools',
			[
				'label' => __( 'Tools Item', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'tools_style',
			[
				'label' => __( 'Tools Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One (Image)', 'saaspot-core' ),
					'style-two' => esc_html__( 'Style Two (Icon)', 'saaspot-core' ),
				],
				'default' => 'style-one',
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
					'icon' => esc_html__( 'Icon', 'saaspot-core' ),
				],
				'default' => 'image',
			]
		);
		$repeater->add_control(
			'tools_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'icon-arrows-check',
				'condition' => [
					'icon_type' => 'icon',
				],
			]
		);
		$repeater->add_control(
			'tools_image',
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
			'tools_title',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'tools_title_link',
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
		$repeater->add_control(
			'tools_content',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'default' => esc_html__( 'your content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'tools_groups',
			[
				'label' => esc_html__( 'Tools Items', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tools_title' => esc_html__( 'Knowledge Base', 'saaspot-core' ),
						'tools_content' => esc_html__( 'The ship set ground on the shore of this sert gilligan millionaire and his wife  with three boys of his own come and knock on our door.', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ tools_title }}}',
			]
		);
		
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_box_style',
			[
				'label' => esc_html__( 'Section', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'box_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .tool-item, {{WRAPPER}} .chat-support-item',
				]
			);
			
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'icon_style',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .chat-support-item .saspot-icon i' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_font_size',
			[
				'label' => esc_html__( 'Icon Font Size', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .chat-support-item .saspot-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'label' => esc_html__( 'Typography', 'saaspot-core' ),
					'name' => 'sastool_title_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .tool-info h3, {{WRAPPER}} .chat-support-info h5',
				]
			);
			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tool-info h3, {{WRAPPER}} .chat-support-info h5' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section
		
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
					'selector' => '{{WRAPPER}} .tool-info p, {{WRAPPER}} .chat-support-info p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tool-info p, {{WRAPPER}} .chat-support-info p' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Tools widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		// Tools query
		$settings = $this->get_settings_for_display();
		$tools = $this->get_settings_for_display( 'tools_groups' );
		$tools_style = !empty( $settings['tools_style'] ) ? $settings['tools_style'] : [];

		if($tools_style === 'style-two') {
		  $style_cls = 'chat-support-wrap';
		} else {
		  $style_cls = 'tools-wrap';
		}
			$output = '';

			if( !empty( $tools ) && is_array( $tools ) ){
			$output .= '<div class="'.$style_cls.'">';	

				// Group Param Output
				foreach ( $tools as $each_logo ) {
					$image_url = wp_get_attachment_url( $each_logo['tools_image']['id'], 'thumbnail' );
					$saaspot_alt = get_post_meta($each_logo['tools_image']['id'], '_wp_attachment_image_alt', true);
					$tools_title_link = !empty( $each_logo['tools_title_link'] ) ? $each_logo['tools_title_link'] : '';
					$link_url = !empty( $tools_title_link['url'] ) ? esc_url($tools_title_link['url']) : '';
					$link_external = !empty( $tools_title_link['is_external'] ) ? 'target="_blank"' : '';
					$link_nofollow = !empty( $tools_title_link['nofollow'] ) ? 'rel="nofollow"' : '';
					$link_attr = !empty( $tools_title_link['url'] ) ?  $link_external.' '.$link_nofollow : '';

					$icon_type = !empty( $each_logo['icon_type'] ) ? $each_logo['icon_type'] : '';
		  		$icon = !empty( $each_logo['tools_icon'] ) ? $each_logo['tools_icon'] : '';

				  $title_link = !empty( $link_url ) ? '<a href="'.$link_url.'" '.$link_attr.'>'.$each_logo['tools_title'].'</a>' : $each_logo['tools_title'];
				  $content = !empty( $each_logo['tools_content'] ) ? '<p>'.$each_logo['tools_content'].'</p>' : '';

				  $image = $image_url ? '<div class="saspot-icon"><img src="'. $image_url .'" width="70" alt="'.$saaspot_alt.'"></div>' : '';
					$icon = $icon ? '<div class="saspot-icon"><i class="'.$icon.'" aria-hidden="true"></i></div>' : '';

				  if($icon_type === 'icon') {
					  $icon_image = $icon;
					} else {
					  $icon_image = $image;
					}

				  if($tools_style === 'style-two') {
				  	$title = !empty( $each_logo['tools_title'] ) ? '<h5 class="chat-support-title">'.$title_link.'</h5>' : '';
					  $output .= '<div class="chat-support-item">
											    '.$icon_image.'
											    <div class="chat-support-info">'.$title.$content.'</div>
											  </div>';
					} else {
				  	$title = !empty( $each_logo['tools_title'] ) ? '<h3 class="tool-title">'.$title_link.'</h3>' : '';
						$output .= '<div class="tool-item">'.$icon_image.'<div class="tool-info">'.$title.$content.'</div></div>';
					}
				}

			$output .= '</div>';
			}
			echo $output;
		
	}

	/**
	 * Render Tools widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Tools() );