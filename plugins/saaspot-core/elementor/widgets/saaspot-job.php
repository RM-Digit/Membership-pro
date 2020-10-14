<?php
/*
 * Elementor SaaSpot Job Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$noneed_job_post = (saaspot_framework_active()) ? cs_get_option('noneed_job_post') : '';

if (!$noneed_job_post) {
class SaaSpot_Job extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_job';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Job', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-graduation-cap';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Job widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_job'];
	}
	 */
	
	/**
	 * Register SaaSpot Job widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_job_listing',
			[
				'label' => esc_html__( 'Job Listing Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'job_limit',
			[
				'label' => esc_html__( 'Limit', 'saaspot-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => -1,
				'max' => 100,
				'step' => 1,
				'default' => 3,
				'description' => esc_html__( 'Enter the number of items to show.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'job_order',
			[
				'label' => __( 'Order', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'ASC' => esc_html__( 'Asending', 'saaspot-core' ),
					'DESC' => esc_html__( 'Desending', 'saaspot-core' ),
				],
				'default' => 'DESC',
			]
		);
		$this->add_control(
			'job_orderby',
			[
				'label' => __( 'Order By', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__( 'None', 'saaspot-core' ),
					'ID' => esc_html__( 'ID', 'saaspot-core' ),
					'author' => esc_html__( 'Author', 'saaspot-core' ),
					'title' => esc_html__( 'Title', 'saaspot-core' ),
					'date' => esc_html__( 'Date', 'saaspot-core' ),
				],
				'default' => 'date',
			]
		);
		$this->add_control(
			'job_show_category',
			[
				'label' => __( 'Certain Categories?', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => Controls_Helper_Output::get_terms_names( 'job_role'),
				'multiple' => true,
			]
		);
		$this->add_control(
			'job_pagination',
			[
				'label' => esc_html__( 'Pagination', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'saaspot-core' ),
				'label_off' => esc_html__( 'Hide', 'saaspot-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'applay_btn',
			[
				'label' => esc_html__( 'Applay Button Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Applay', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type text here', 'saaspot-core' ),
			]
		);
		
		$this->end_controls_section();// end: Section
		
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
				'name' => 'item_border',
				'label' => esc_html__( 'Border', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .job-item',
			]
		);
		$this->add_control(
			'item_bg',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .job-item' => 'background-color: {{VALUE}};',
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
				'name' => 'sasjob_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .job-item h3',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .job-item h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_categories_style',
			[
				'label' => esc_html__( 'Categories', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'categories_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .job-item p',
			]
		);
		$this->add_control(
			'categories_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .job-item p' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .job-btn .saspot-btn',
			]
		);
		$this->add_responsive_control(
			'button_min_width',
			[
				'label' => esc_html__( 'Width', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 500,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .job-btn .saspot-btn' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' => __( 'Padding', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'condition' => [
					'btn_style' => array('style-one'),
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .job-btn .saspot-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'condition' => [
					'btn_style' => array('style-one'),
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .job-btn .saspot-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .job-btn .saspot-btn' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .job-btn .saspot-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .job-btn .saspot-btn',
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
						'{{WRAPPER}} .job-btn .saspot-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .job-btn .saspot-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_hover_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .job-btn .saspot-btn:hover',
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
					'job_pagination' => 'true',
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
	 * Render Job widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$job_limit = !empty( $settings['job_limit'] ) ? $settings['job_limit'] : '';
		$job_order = !empty( $settings['job_order'] ) ? $settings['job_order'] : '';
		$job_orderby = !empty( $settings['job_orderby'] ) ? $settings['job_orderby'] : '';
		$job_show_category = !empty( $settings['job_show_category'] ) ? $settings['job_show_category'] : [];
		$job_pagination  = ( isset( $settings['job_pagination'] ) && ( 'true' == $settings['job_pagination'] ) ) ? true : false;
		$applay_btn = !empty( $settings['applay_btn'] ) ? $settings['applay_btn'] : '';

		// Applay Text
		if (saaspot_framework_active()) {
		  $applay_job = cs_get_option('applay_job');
		  if ($applay_btn) {
			$applay_btn = $applay_btn;
		  } elseif($applay_job) {
			$applay_btn = $applay_job;
		  } else {
			$applay_btn = esc_html__( 'APPLY', 'saaspot-core' );
		  }
		} else {
		  $applay_btn = $applay_btn ? $applay_btn : esc_html__( 'Applay', 'saaspot-core' );
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
		  'post_type' => 'job',
		  'posts_per_page' => (int)$job_limit,
		  'job_role' => $job_show_category,
		  'orderby' => $job_orderby,
		  'order' => $job_order
		);

		$saspot_job = new \WP_Query( $args ); 
		if ($saspot_job->have_posts()) : 
		?>

		<div class="saspot-jobs-wrap">
			<div class="jobs-wrap">
			<?php 
			  while ($saspot_job->have_posts()) : $saspot_job->the_post();
			  
			  // Featured Image
				$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
				$large_image = $large_image[0];
				$abt_title = get_the_title(); ?>
					<div class="job-item">
			      <div class="row align-items-center">
			        <div class="col-md-9">
			          <p>
			            <?php
			              $category_list = wp_get_post_terms(get_the_ID(), 'job_role');
			              foreach ($category_list as $term) {
			                $job_term_link = get_term_link( $term );
                  		echo '<span><a href="'. esc_url($job_term_link) .'">'. esc_html($term->name) .'</a></span> ';
			              }
			            ?>
			          </p>
			          <h3 class="job-title"><?php echo esc_html($abt_title); ?></h3>
			        </div>
			        <div class="col-md-3 textright">
			          <div class="job-btn"><a href="<?php echo esc_url( get_permalink() ); ?>" class="saspot-btn saspot-light-blue-bdr-btn"><?php echo esc_html($applay_btn); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
			        </div>
			      </div>
			    </div>
			  <?php endwhile; ?>
			</div>
			<?php if ($job_pagination) { ?>
			  <div class="pagination-wrap">
	      <?php if ($job_pagination) {saaspot_paging_nav($saspot_job->max_num_pages,"",$paged); wp_reset_postdata();} ?>
	    </div>
			<?php } ?>
		</div>
		<?php
	  endif;
	  wp_reset_postdata();
		// Return outbut buffer
		echo ob_get_clean();
		
	}

	/**
	 * Render Job widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/

	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Job() );
}