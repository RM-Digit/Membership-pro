<?php
/*
 * Elementor SaaSpot Sitemap Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Sitemap extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_sitemap';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Sitemap', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-sitemap';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Sitemap widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_sitemap'];
	}
	 */
	
	/**
	 * Register SaaSpot Sitemap widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){

		$custom_menus = array();
    $menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
    if ( is_array( $menus ) && ! empty( $menus ) ) {
      foreach ( $menus as $single_menu ) {
        if ( is_object( $single_menu ) && isset( $single_menu->name, $single_menu->term_id ) ) {
          $custom_menus[ $single_menu->name ] = $single_menu->name;
        }
      }
    }
		
		$this->start_controls_section(
			'section_sitemap',
			[
				'label' => esc_html__( 'Form Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'menu_title',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Default title', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'select_menu',
			[
				'label' => esc_html__( 'Select Menu', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => $custom_menus,
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
				'name' => 'sassite_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .sitemap-item h6',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sitemap-item h6' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		// Menu
		$this->start_controls_section(
			'section_menu_style',
			[
				'label' => esc_html__( 'Menu', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'menu_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '.bullet-list li a',
			]
		);
		$this->add_control(
			'bullet_color',
			[
				'label' => esc_html__( 'Bullet Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bullet-list li:before' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->start_controls_tabs( 'menu_style' );
			$this->start_controls_tab(
				'menu_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'menu_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .bullet-list li a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'menu_hover',
				[
					'label' => esc_html__( 'Hover', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'menu_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .bullet-list li a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Sitemap widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$select_menu = !empty( $settings['select_menu'] ) ? $settings['select_menu'] : '';
		$box_style = !empty( $settings['box_style'] ) ? $settings['box_style'] : '';
		$menu_title = !empty( $settings['menu_title'] ) ? $settings['menu_title'] : '';
		
		// Atts If
		$box_style = ( $box_style ) ? $box_style : '';
		$menu_title = ( $menu_title ) ? '<h6 class="sitemap-item-title">'. $menu_title .'</h6>' : '';
		// Turn output buffer on
		ob_start();
		?>
		<div class="sitemap-item">
		<?php echo $menu_title; ?>
	  <?php wp_nav_menu(
	        array(
	          'menu'              => 'primary',
	          'theme_location'    => 'primary',
	          'container'         => false,
	          'container_class'   => '',
	          'container_id'      => '',
	          'menu'              => $select_menu,
	          'menu_class'        => '',
	          'items_wrap' 				=> '<ul class="bullet-list">%3$s</ul>',
	        )
	      ); ?>
		</div>
		<?php
		// Return outbut buffer
		echo ob_get_clean();
	}

	/**
	 * Render Sitemap widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Sitemap() );