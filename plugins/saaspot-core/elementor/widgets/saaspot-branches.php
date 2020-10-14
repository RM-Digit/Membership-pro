<?php
/*
 * Elementor SaaSpot Branches Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Branches extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_branches';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Branches', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-globe';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Branches widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_branches'];
	}
	*/
	
	/**
	 * Register SaaSpot Branches widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_branches',
			[
				'label' => __( 'Branches', 'saaspot-core' ),
			]
		);		
		$this->add_control(
			'map_image',
			[
				'label' => esc_html__( 'Upload Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your map image.', 'saaspot-core'),
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'list_text',
			[
				'label' => esc_html__( 'Branch', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$repeater->add_responsive_control(
			'icon_top',
			[
				'label' => esc_html__( 'Top', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],				
			]
		);
		$repeater->add_responsive_control(
			'icon_left',
			[
				'label' => esc_html__( 'Left', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],				
			]
		);		
		$this->add_control(
			'listItems_groups',
			[
				'label' => esc_html__( 'Branches', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'list_text' => esc_html__( 'Sydney, Australia', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_text }}}',
			]
		);

		$this->end_controls_section();// end: Section

		// Style
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Location', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);			
		
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render App Works widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$listItems_groups = !empty( $settings['listItems_groups'] ) ? $settings['listItems_groups'] : [];
		$map_image = !empty( $settings['map_image']['id'] ) ? $settings['map_image']['id'] : '';	
		$image_url = wp_get_attachment_url( $map_image );


		$output = '<div class="map-wrap">
							  <div class="saspot-icon"><img src="'.$image_url.'" alt="Global Branches"></div>
							  <div class="map-locations">';
							  	// Group Param Output
										if( is_array( $listItems_groups ) && !empty( $listItems_groups ) ){
										  foreach ( $listItems_groups as $each_list ) {
											$list_text = $each_list['list_text'] ? $each_list['list_text'] : '';

											$icon_top = $each_list['icon_top']['size'] ? $each_list['icon_top']['size'] : '';
											$icon_top_unit = $each_list['icon_top']['unit'] ? $each_list['icon_top']['unit'] : '';
											$icon_left = $each_list['icon_left']['size'] ? $each_list['icon_left']['size'] : '';
											$icon_left_unit = $each_list['icon_left']['unit'] ? $each_list['icon_left']['unit'] : '';

											$top = $icon_top ? 'top: '.$icon_top.$icon_top_unit.';' : '';
											$left = $icon_left ? 'left: '.$icon_left.$icon_left_unit.';' : '';
											if ($icon_top || $icon_left) {
												$style = ' style="'.$top.$left.'"';
											} else {
												$style = '';
											}

										  $output .= '<div class="location-item"'.$style.'>
															      <a href="#0" data-toggle="tooltip" data-placement="top" data-html="true" title="'.$list_text.'" class="location-tooltip"></a>
															    </div>';
										  }
										}
							    
	  $output .= '</div>
							</div>';

		echo $output;
		
	}

	/**
	 * Render Branches widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Branches() );