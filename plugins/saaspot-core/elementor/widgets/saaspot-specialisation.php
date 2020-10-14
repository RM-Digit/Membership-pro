<?php
/*
 * Elementor SaaSpot Specialisation Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Specialisation extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_specialisation';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Specialisation', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-user-secret';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Specialisation widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_specialisation'];
	}
	*/
	
	/**
	 * Register SaaSpot Specialisation widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_specialisation',
			[
				'label' => esc_html__( 'Specialisation Options', 'saaspot-core' ),
			]
		);

		$this->add_control(
			'specialisation_image',
			[
				'label' => esc_html__( 'Upload Specialisation', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'image_link',
			[
				'label' => esc_html__( 'Specialisation Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'specialisation_title',
			[
				'label' => esc_html__( 'Title Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'title_link',
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
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sastion_box_shadow',
				'label' => esc_html__( 'Specialisation Box Shadow', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .saspot-specialisation img',
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
		Group_Control_Box_Shadow::get_type(),
		[
			'name' => 'sastion_section_box_shadow',
			'label' => esc_html__( 'Box Shadow', 'saaspot-core' ),
			'selector' => '{{WRAPPER}} .specialist-item',
		]
	);
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
			'name' => 'sasspeci_title_typography',
			'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			'selector' => '{{WRAPPER}} .specialist-info h5',
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
					'{{WRAPPER}} .specialist-info h5, {{WRAPPER}} .specialist-info h5 a' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .specialist-info h5 a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Hover tab
	$this->end_controls_tabs(); // end tabs	
	
	$this->end_controls_section();// end: Section

	}

	/**
	 * Render Specialisation widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$specialisation_image = !empty( $settings['specialisation_image']['id'] ) ? $settings['specialisation_image']['id'] : '';
		$image_link = !empty( $settings['image_link']['url'] ) ? $settings['image_link']['url'] : '';
		$image_link_external = !empty( $settings['image_link']['is_external'] ) ? 'target="_blank"' : '';
		$image_link_nofollow = !empty( $settings['image_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$image_link_attr = !empty( $image_link ) ?  $image_link_external.' '.$image_link_nofollow : '';

		$specialisation_title = !empty( $settings['specialisation_title'] ) ? $settings['specialisation_title'] : '';	
		$title_link = !empty( $settings['title_link']['url'] ) ? $settings['title_link']['url'] : '';
		$title_link_external = !empty( $settings['title_link']['is_external'] ) ? 'target="_blank"' : '';
		$title_link_nofollow = !empty( $settings['title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$title_link_attr = !empty( $title_link ) ?  $title_link_external.' '.$title_link_nofollow : '';

		// Specialisation
		$image_url = wp_get_attachment_url( $specialisation_image );
		$saaspot_alt = get_post_meta($specialisation_image, '_wp_attachment_image_alt', true);

		$image = $image_link ? '<div class="saspot-image"><a href="'.$image_link.'" '.$image_link_attr.'><img src="'.esc_url($image_url).'" alt="'.$saaspot_alt.'"></a></div>' : '<div class="saspot-image"><img src="'.esc_url($image_url).'" alt="'.$saaspot_alt.'"></div>';

		$title = $title_link ? '<h5 class="specialist-title"><a href="'.$title_link.'" '.$title_link_attr.'>'.$specialisation_title.'</a></h5>' : '<h5 class="specialist-title">'.$specialisation_title.'</h5>';

	  $output = '<div class="specialist-item">
	              '.$image.'
	              <div class="specialist-info">'.$title.'</div>
	            </div>';

	  echo $output;
		
	}

	/**
	 * Render Specialisation widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Specialisation() );