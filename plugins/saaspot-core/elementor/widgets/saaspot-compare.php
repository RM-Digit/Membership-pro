<?php
/*
 * Elementor SaaSpot Compare Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Compare extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_compare';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Compare Table', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-th';
	}

	/**
	 * Retrieve the compare of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the compare of scripts the SaaSpot Compare widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_compare'];
	}
	*/
	
	/**
	 * Register SaaSpot Compare widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_compare',
			[
				'label' => esc_html__( 'Table Head', 'saaspot-core' ),
			]
		);
		
		$repeater = new Repeater();

		$repeater->add_control(
			'upload_type',
			[
				'label' => __( 'Upload Type', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'image' => esc_html__( 'Image', 'saaspot-core' ),
					'icon' => esc_html__( 'Icon', 'saaspot-core' ),
				],
				'default' => 'icon',
			]
		);
		$repeater->add_control(
			'compare_image',
			[
				'label' => esc_html__( 'Upload Icon', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'upload_type' => 'image',
				],
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your icon image.', 'saaspot-core'),
			]
		);
		$repeater->add_control(
			'compare_icon',
			[
				'label' => esc_html__( 'Title Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'icon-basic-bolt',
				'condition' => [
					'upload_type' => 'icon',
				],
			]
		);

		$repeater->add_control(
			'compare_title',
			[
				'label' => esc_html__( 'Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'compareItems_title',
			[
				'label' => esc_html__( 'Table Head', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'compare_title' => esc_html__( 'Item #1', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ compare_title }}}',
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_compare_bdy',
			[
				'label' => esc_html__( 'Table Body', 'saaspot-core' ),
			]
		);
		
		$repeaterOne = new Repeater();

		$repeaterOne->start_controls_tabs( 'table_rows' );
			$repeaterOne->start_controls_tab(
				'table_row1',
				[
					'label' => esc_html__( 'Row', 'saaspot-core' ),
				]
			);
			$repeaterOne->add_control(
				'row_text1',
				[
					'label' => esc_html__( 'Text', 'saaspot-core' ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
				]
			);
			$repeaterOne->end_controls_tab();  // end:Normal tab
			$repeaterOne->start_controls_tab(
				'table_row2',
				[
					'label' => esc_html__( 'Row', 'saaspot-core' ),
				]
			);
			$repeaterOne->add_control(
				'bold_text1',
				[
					'label' => esc_html__( 'Bold?', 'saaspot-core' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'saaspot-core' ),
					'label_off' => esc_html__( 'Hide', 'saaspot-core' ),
					'return_value' => 'true',
					'default' => 'false',
				]
			);
			$repeaterOne->add_control(
				'nowrap1',
				[
					'label' => esc_html__( 'No Wrap?', 'saaspot-core' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'saaspot-core' ),
					'label_off' => esc_html__( 'Hide', 'saaspot-core' ),
					'return_value' => 'true',
					'default' => 'false',
				]
			);
			$repeaterOne->add_control(
			'left_info2',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-success">Use the following Shortcode for rating. <br><b>[saaspot_ratings rating_style="tick" rating="3"]<br><br>Rating Styles<br>1. star<br>2. tick</b></div>',
				]
			);
			$repeaterOne->add_control(
				'row_text2',
				[
					'label' => esc_html__( 'Text', 'saaspot-core' ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
				]
			);
			$repeaterOne->end_controls_tab();  // end:Normal tab
			$repeaterOne->start_controls_tab(
				'table_row3',
				[
					'label' => esc_html__( 'Row', 'saaspot-core' ),
				]
			);
			$repeaterOne->add_control(
				'bold_text2',
				[
					'label' => esc_html__( 'Bold?', 'saaspot-core' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'saaspot-core' ),
					'label_off' => esc_html__( 'Hide', 'saaspot-core' ),
					'return_value' => 'true',
					'default' => 'false',
				]
			);
			$repeaterOne->add_control(
				'nowrap2',
				[
					'label' => esc_html__( 'No Wrap?', 'saaspot-core' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'saaspot-core' ),
					'label_off' => esc_html__( 'Hide', 'saaspot-core' ),
					'return_value' => 'true',
					'default' => 'false',
				]
			);
			$repeaterOne->add_control(
			'left_info3',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-success">Use the following Shortcode for rating. <br><b>[saaspot_ratings rating_style="tick" rating="3"]<br><br>Rating Styles<br>1. star<br>2. tick</b></div>',
				]
			);
			$repeaterOne->add_control(
				'row_text3',
				[
					'label' => esc_html__( 'Text', 'saaspot-core' ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
				]
			);
			$repeaterOne->end_controls_tab();  // end:Normal tab
			$repeaterOne->start_controls_tab(
				'table_row4',
				[
					'label' => esc_html__( 'Row', 'saaspot-core' ),
				]
			);
			$repeaterOne->add_control(
				'bold_text3',
				[
					'label' => esc_html__( 'Bold?', 'saaspot-core' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'saaspot-core' ),
					'label_off' => esc_html__( 'Hide', 'saaspot-core' ),
					'return_value' => 'true',
					'default' => 'false',
				]
			);
			$repeaterOne->add_control(
				'nowrap3',
				[
					'label' => esc_html__( 'No Wrap?', 'saaspot-core' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'saaspot-core' ),
					'label_off' => esc_html__( 'Hide', 'saaspot-core' ),
					'return_value' => 'true',
					'default' => 'false',
				]
			);
			$repeaterOne->add_control(
			'left_info4',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-success">Use the following Shortcode for rating. <br><b>[saaspot_ratings rating_style="tick" rating="3"]<br><br>Rating Styles<br>1. star<br>2. tick</b></div>',
				]
			);
			$repeaterOne->add_control(
				'row_text4',
				[
					'label' => esc_html__( 'Text', 'saaspot-core' ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
				]
			);
			$repeaterOne->end_controls_tab();  // end:Normal tab
			$repeaterOne->start_controls_tab(
				'table_row5',
				[
					'label' => esc_html__( 'Row', 'saaspot-core' ),
				]
			);
			$repeaterOne->add_control(
				'bold_text4',
				[
					'label' => esc_html__( 'Bold?', 'saaspot-core' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'saaspot-core' ),
					'label_off' => esc_html__( 'Hide', 'saaspot-core' ),
					'return_value' => 'true',
					'default' => 'false',
				]
			);
			$repeaterOne->add_control(
				'nowrap4',
				[
					'label' => esc_html__( 'No Wrap?', 'saaspot-core' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'saaspot-core' ),
					'label_off' => esc_html__( 'Hide', 'saaspot-core' ),
					'return_value' => 'true',
					'default' => 'false',
				]
			);
			$repeaterOne->add_control(
			'left_info5',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-success">Use the following Shortcode for rating. <br><b>[saaspot_ratings rating_style="tick" rating="3"]<br><br>Rating Styles<br>1. star<br>2. tick</b></div>',
				]
			);
			$repeaterOne->add_control(
				'row_text5',
				[
					'label' => esc_html__( 'Text', 'saaspot-core' ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
				]
			);
			$repeaterOne->end_controls_tab();  // end:Normal tab
		$repeaterOne->end_controls_tabs(); // end tabs
		$this->add_control(
			'compareItems_row',
			[
				'label' => esc_html__( 'Table Row', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'row_text1' => esc_html__( 'Item #1', 'saaspot-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ row_text1 }}}',
			]
		);
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Compare widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$compare_style = !empty( $settings['compare_style'] ) ? $settings['compare_style'] : '';
		$compareItems_title = !empty( $settings['compareItems_title'] ) ? $settings['compareItems_title'] : [];
		$compareItems_row = !empty( $settings['compareItems_row'] ) ? $settings['compareItems_row'] : [];
		
	  $output = '<div class="guide-wrap">
							  <div class="saspot-responsive-table">
							    <table class="table">
							      <thead>
							        <tr>';
							        // Group Param Output
							        $j = 1;
											if( is_array( $compareItems_title ) && !empty( $compareItems_title ) ){
											  foreach ( $compareItems_title as $each_title ) {
												$compare_title = $each_title['compare_title'] ? $each_title['compare_title'] : '';
												$upload_type = $each_title['upload_type'] ? $each_title['upload_type'] : '';
												$compare_image = $each_title['compare_image']['id'] ? $each_title['compare_image']['id'] : '';
												$compare_icon = $each_title['compare_icon'] ? $each_title['compare_icon'] : '';

												$icon = $compare_icon ? '<i class="'.$compare_icon.'" aria-hidden="true"></i> ' : '';

												$image_url = wp_get_attachment_url( $compare_image );
												$image = $image_url ? '<img src="'.$image_url.'" alt="Icon"> ' : '';
												$title = $compare_title ? '<span>'.$compare_title.'</span>' : '';

												if ($j === 1) {
													$cls = ' class="guide-main-label"';
												} else {
													$cls = '';
												}

												if($upload_type === 'icon') {
												  $image_icon = $icon;
												} else {
												  $image_icon = $image;
												}

												  $output .= '<th'.$cls.'>'.$image_icon.$title.'</th>';
												  $j++;
											  }
											}
         	$output .= '</tr>
							      </thead>
							      <tbody>';
							      	// Group Param Output
											if( is_array( $compareItems_row ) && !empty( $compareItems_row ) ){
											  foreach ( $compareItems_row as $each_row ) {
												$row_text1 = $each_row['row_text1'] ? $each_row['row_text1'] : '';
												$row_text2 = $each_row['row_text2'] ? $each_row['row_text2'] : '';
												$row_text3 = $each_row['row_text3'] ? $each_row['row_text3'] : '';
												$row_text4 = $each_row['row_text4'] ? $each_row['row_text4'] : '';
												$row_text5 = $each_row['row_text5'] ? $each_row['row_text5'] : '';

												$bold_text1 = $each_row['bold_text1'] ? $each_row['bold_text1'] : '';
												$bold_text2 = $each_row['bold_text2'] ? $each_row['bold_text2'] : '';
												$bold_text3 = $each_row['bold_text3'] ? $each_row['bold_text3'] : '';
												$bold_text4 = $each_row['bold_text4'] ? $each_row['bold_text4'] : '';

												if ($bold_text1 == 'true') {
													$bclass1 = ' text-bold';
												} else {
													$bclass1 = '';
												}
												if ($bold_text2 == 'true') {
													$bclass2 = ' text-bold';
												} else {
													$bclass2 = '';
												}
												if ($bold_text3 == 'true') {
													$bclass3 = ' text-bold';
												} else {
													$bclass3 = '';
												}
												if ($bold_text4 == 'true') {
													$bclass4 = ' text-bold';
												} else {
													$bclass4 = '';
												}

												$nowrap1 = $each_row['nowrap1'] ? $each_row['nowrap1'] : '';
												$nowrap2 = $each_row['nowrap2'] ? $each_row['nowrap2'] : '';
												$nowrap3 = $each_row['nowrap3'] ? $each_row['nowrap3'] : '';
												$nowrap4 = $each_row['nowrap4'] ? $each_row['nowrap4'] : '';

												if ($nowrap1 == 'true') {
													$noclass1 = '';
												} else {
													$noclass1 = 'guide-inner-title';
												}
												if ($nowrap2 == 'true') {
													$noclass2 = '';
												} else {
													$noclass2 = 'guide-inner-title';
												}
												if ($nowrap3 == 'true') {
													$noclass3 = '';
												} else {
													$noclass3 = 'guide-inner-title';
												}
												if ($nowrap4 == 'true') {
													$noclass4 = '';
												} else {
													$noclass4 = 'guide-inner-title';
												}

												$text1 = $row_text1 ? '<td class="guide-wrap-title">'.$row_text1.'</td>' : '';
												$text2 = $row_text2 ? '<td class="'.$noclass1.''.$bclass1.'">'.do_shortcode($row_text2).'</td>' : '';
												$text3 = $row_text3 ? '<td class="'.$noclass2.''.$bclass2.'">'.do_shortcode($row_text3).'</td>' : '';
												$text4 = $row_text4 ? '<td class="'.$noclass3.''.$bclass3.'">'.do_shortcode($row_text4).'</td>' : '';
												$text5 = $row_text5 ? '<td class="'.$noclass4.''.$bclass4.'">'.do_shortcode($row_text5).'</td>' : '';

												  $output .= '<tr>'.$text1.$text2.$text3.$text4.$text5.'</tr>';
											  }
											}
      	$output .= '</tbody>
							    </table>
							  </div>
							</div>';

		echo $output;
		
	}

	/**
	 * Render Compare widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Compare() );