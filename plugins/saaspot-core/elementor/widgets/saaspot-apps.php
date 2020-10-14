<?php
/*
 * Elementor SaaSpot Apps Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$noneed_apps_post = (saaspot_framework_active()) ? cs_get_option('noneed_apps_post') : '';

if (!$noneed_apps_post) {
class SaaSpot_Apps extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_apps';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Apps', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-rocket';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Apps widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['vt-saaspot_apps'];
	}

	/**
	 * Register SaaSpot Apps widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){

		$this->start_controls_section(
			'section_apps_listing',
			[
				'label' => esc_html__( 'Listing', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'apps_limit',
			[
				'label' => esc_html__( 'Limit', 'saaspot-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => -1,
				'step' => 1,
				'description' => esc_html__( 'Enter the number of items to show.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'apps_order',
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
			'apps_orderby',
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
			'apps_show_category',
			[
				'label' => __( 'Show only certain categories?', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => Controls_Helper_Output::get_terms_names( 'apps_category'),
				'multiple' => true,
			]
		);
		$this->add_control(
			'filter_title',
			[
				'label' => esc_html__( 'Filter Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Categories', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type text here', 'saaspot-core' ),
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_apps_ena_dis',
			[
				'label' => esc_html__( 'Enable & Disable', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'apps_aqr',
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
			'apps_filter',
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
			'apps_pagination',
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
					'apps_filter' => 'true',
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
		$this->add_responsive_control(
			'filter_padding',
			[
				'label' => __( 'Padding', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .masonry-filters ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
			$this->add_control(
				'filter_border_color',
				[
					'label' => esc_html__( 'Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .masonry-filters' => 'border-color: {{VALUE}};',
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
						'{{WRAPPER}} .masonry-filters ul li a.active:before' => 'background-color: {{VALUE}};',
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
				'name' => 'sasapp_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .app-info h4',
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
						'{{WRAPPER}} .app-info h4 a' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} .app-info h4 a:hover' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .app-info p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .app-info p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'content_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .app-info' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_border',
				'label' => esc_html__( 'Border', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .app-info',
			]
		);
		$this->end_controls_section();// end: Section

		// Pagination
		$this->start_controls_section(
			'section_pagi_style',
			[
				'label' => esc_html__( 'Pagination', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'apps_pagination' => 'true',
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
	 * Render Apps widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$apps_limit = !empty( $settings['apps_limit'] ) ? $settings['apps_limit'] : '';
		$apps_order = !empty( $settings['apps_order'] ) ? $settings['apps_order'] : '';
		$apps_orderby = !empty( $settings['apps_orderby'] ) ? $settings['apps_orderby'] : '';
		$apps_show_category = !empty( $settings['apps_show_category'] ) ? $settings['apps_show_category'] : [];
		$filter_title = !empty( $settings['filter_title'] ) ? $settings['filter_title'] : [];
		$apps_aqr  = ( isset( $settings['apps_aqr'] ) && ( 'true' == $settings['apps_aqr'] ) ) ? true : false;
		$apps_filter  = ( isset( $settings['apps_filter'] ) && ( 'true' == $settings['apps_filter'] ) ) ? true : false;
		$apps_pagination  = ( isset( $settings['apps_pagination'] ) && ( 'true' == $settings['apps_pagination'] ) ) ? true : false;

		$apps_limit = $apps_limit ? $apps_limit : '-1';
		$all_apps_txt = cs_get_option('all_text');
		$all_text_actual = $all_apps_txt ? $all_apps_txt : esc_html__( 'All', 'saaspot-core' );

		if (saaspot_framework_active()) {
			$saaspot_categories_text = cs_get_option('categories_text');
		  if ($filter_title) {
			$filter_title = $filter_title;
		  } elseif($saaspot_categories_text) {
			$filter_title = $saaspot_categories_text;
		  } else {
			$filter_title = esc_html__( 'Categories', 'saaspot-core' );
		  }
		} else {
		  $filter_title = $filter_title ? $filter_title : esc_html__( 'Categories', 'saaspot-core' );
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
			'post_type' => 'apps',
			'posts_per_page' => (int)$apps_limit,
  		'apps_category' => $apps_show_category,
			'orderby' => $apps_orderby,
			'order' => $apps_order
		);

		if($apps_filter) {
			$content_class = 'col-xl-10 col-md-9';
		} else {
			$content_class = 'col-xl-12 col-md-12';
		}

		$saspot_port = new \WP_Query( $args ); ?>
		<div class="saspot-apps-section">
	    <div class="row">
				<?php if ($apps_filter) { ?>
				<div class="col-xl-2 col-md-3">
		      <div class="apps-categories">
		        <h3 class="categories-title"><?php echo esc_html($filter_title); ?></h3>
		        <div class="masonry-filters">
		          <ul>
		            <li><a href="#section-apps" data-filter="*" class="active"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo esc_html($all_text_actual); ?></a></li>
		            <?php
		              if ($apps_show_category) {
		                $terms = $apps_show_category;
		                $count = count($terms);
		                if ($count > 0) {
		                  foreach ($terms as $term) {
		                    echo '<li class="cat-'. preg_replace('/\s+/', "", strtolower($term)) .'"><a href="#section-apps" data-filter=".cat-'. preg_replace('/\s+/', "", strtolower($term)) .'" title="' . str_replace('-', " ", ucfirst($term)) . '"><i class="fa fa-angle-right" aria-hidden="true"></i> ' . str_replace('-', " ", ucfirst($term)) . '</a></li>';
		                   }
		                }
		              } else {
		                if ( function_exists( 'saaspot_apps_category_list' ) ) {
		                  echo saaspot_apps_category_list();
		                }
		              }
		            ?>
		          </ul>
		        </div>
		      </div>
		    </div>
				<?php } ?>
				<!-- Apps Start -->
				<div class="<?php echo $content_class; ?>">
	        <div class="apps-wrap">
	          <div class="saspot-masonry" id="section-apps">
	    	    	<?php
	    	      if ($saspot_port->have_posts()) : while ($saspot_port->have_posts()) : $saspot_port->the_post();
	    	      global $post;
							$saaspot_terms = wp_get_post_terms($post->ID,'apps_category');
							foreach ($saaspot_terms as $term) {
							  $saaspot_cat_class = 'cat-' . $term->slug;
							}
							$saaspot_count = count($saaspot_terms);
							$i=0;
							$saaspot_cat_class = '';
							if ($saaspot_count > 0) {
							  foreach ($saaspot_terms as $term) {
							    $i++;
							    $saaspot_cat_class .= 'cat-'. $term->slug .' ';
							    if ($saaspot_count != $i) {
							      $saaspot_cat_class .= '';
							    } else {
							      $saaspot_cat_class .= '';
							    }
							  }
							}

							// Featured Image
							$saaspot_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
							$saaspot_large_image = $saaspot_large_image[0];
							if ($apps_aqr) {
								$saaspot_featured_img = $saaspot_large_image;
							} else {
								if(class_exists('Aq_Resize')) {
								  $saaspot_apps_img = aq_resize( $saaspot_large_image, '300', '230', true );
								} else {$saaspot_apps_img = $saaspot_large_image;}
								$saaspot_featured_img = ( $saaspot_apps_img ) ? $saaspot_apps_img : SAASPOT_PLUGIN_ASTS . '/images/holders/300x230.png';
							}
							?>

							<div class="masonry-item <?php echo esc_attr($saaspot_cat_class); ?>" data-category="<?php echo esc_attr($saaspot_cat_class); ?>">
							  <div class="app-item app-<?php echo get_the_id(); ?>">
							    <div class="saspot-image">
							      <a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($saaspot_featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></a>
							      <div class="saspot-label">
							        <?php
							          $category_list = wp_get_post_terms(get_the_ID(), 'apps_category');
							          foreach ($category_list as $term) {
							            $apps_term_link = get_term_link( $term );
            							echo '<span><a href="'. esc_url($apps_term_link) .'">'. esc_html($term->name) .'</a></span> ';
							          }
							        ?>
							      </div>
							    </div>
							    <div class="app-info">
							      <h4 class="app-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(the_title()); ?></a></h4>
							      <p><?php the_excerpt(); ?></p>
							    </div>
							  </div>
							</div>
    	        <?php endwhile;
	    	      endif;
	    	      wp_reset_postdata(); ?>
	          </div>
	        </div>
		    </div>
				<?php if ($apps_pagination) { ?>
	      <div class="pagination-wrap">
		    	<?php saaspot_paging_nav($saspot_port->max_num_pages,"",$paged); ?>
		  	</div>
	      <?php } ?>
      </div>
		</div>
		<!-- Apps End -->

		<?php
		// Return outbut buffer
		echo ob_get_clean();

	}

	/**
	 * Render Apps widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Apps() );
}