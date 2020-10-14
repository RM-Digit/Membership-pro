<?php
/*
 * Elementor SaaSpot Login Signup Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_LoginSignup extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_login_signup';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Login Signup', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-user';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Login Signup widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_login_signup'];
	}
	*/
	
	/**
	 * Register SaaSpot Login Signup widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){

		$redirection_link = cs_get_option('redirection_link');
  	$redirection = $redirection_link ? $redirection_link : home_url( '/' );	
		
		$this->start_controls_section(
			'section_login_signup',
			[
				'label' => esc_html__( 'Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'form_style',
			[
				'label' => esc_html__( 'Select Form Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'one' => esc_html__( 'Style One', 'saaspot-core' ),
					'two' => esc_html__( 'Style Two', 'saaspot-core' ),
					'three' => esc_html__( 'Style Three', 'saaspot-core' ),
				],
				'default' => 'one',
				'description' => esc_html__( 'Select your list column.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'agree_text',
			[
				'label' => esc_html__( 'Agree Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'frontend_available' => true,
				'label_block' => true,
				'default' => esc_html__( 'I agree to our', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your agree text.', 'saaspot-core' ),
				'condition' => [
					'form_style' => 'three',
				],
			]
		);
		$this->add_control(
			'agree_link_text',
			[
				'label' => esc_html__( 'Agree Link Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'frontend_available' => true,
				'label_block' => true,
				'default' => esc_html__( 'Terms of Service & Policies', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your agree link text.', 'saaspot-core' ),
				'condition' => [
					'form_style' => 'three',
				],
			]
		);
		$this->add_control(
			'agree_link',
			[
				'label' => esc_html__( 'Agree Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
				'condition' => [
					'form_style' => 'three',
				],
			]
		);
		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Button Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'frontend_available' => true,
				'label_block' => true,
				'default' => esc_html__( 'Register', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your button text.', 'saaspot-core' ),
				'condition' => [
					'form_style' => 'three',
				],
			]
		);
		$this->add_control(
		're_info',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-success">For re-direction link option goto : <br><b>SaaSpot Options --> General --> Redirection Link</b><br>Current redirection link : <br><b>'.esc_url($redirection).'<b></div>',
				'condition' => [
					'form_style' => 'three',
				],
			]
		);
		$this->add_control(
			'form_type',
			[
				'label' => esc_html__( 'Select Form', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'login' => esc_html__( 'Login Form', 'saaspot-core' ),
					'signup' => esc_html__( 'Signup Form', 'saaspot-core' ),
				],
				'default' => 'login',
				'description' => esc_html__( 'Select your list column.', 'saaspot-core' ),
				'condition' => [
					'form_style' => 'one',
				],
			]
		);
		$this->add_control(
			'form_image',
			[
				'label' => esc_html__( 'Form Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'label_block' => true,
				'condition' => [
					'form_style' => 'one',
				],
			]
		);
		$this->add_control(
			'form_title',
			[
				'label' => esc_html__( 'Form Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'frontend_available' => true,
				'label_block' => true,
				'default' => esc_html__( 'Default title', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'saaspot-core' ),
				'condition' => [
					'form_style' => 'one',
				],
			]
		);
		$this->add_control(
			'form_sub_title',
			[
				'label' => esc_html__( 'Form Sub-Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'frontend_available' => true,
				'label_block' => true,
				'rows' => 5,
				'default' => __( 'Subtitle Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Enter your Subtitle text here.', 'saaspot-core' ),
				'condition' => [
					'form_style' => 'one',
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
				'name' => 'saslog_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .saspot-login-signup .section-title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-login-signup .section-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_sub_title_style',
			[
				'label' => esc_html__( 'Sub-Title', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'saslog_sub_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .saspot-login-signup .section-subtitle',
			]
		);
		$this->add_control(
			'sub_title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-login-signup .section-subtitle' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_label_style',
			[
				'label' => esc_html__( 'Label', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'label_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .saspot-login-signup label',
			]
		);
		$this->add_control(
			'label_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-login-signup label' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_form_style',
			[
				'label' => esc_html__( 'Form', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'form_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .saspot-login-signup input[type="text"], 
					{{WRAPPER}} .saspot-login-signup input[type="email"], 
					{{WRAPPER}} .saspot-login-signup input[type="password"],
					{{WRAPPER}} .saspot-login-signup input[type="date"],
					{{WRAPPER}} .saspot-login-signup input[type="time"], 
					{{WRAPPER}} .saspot-login-signup input[type="number"], 
					{{WRAPPER}} .saspot-login-signup textarea, 
					{{WRAPPER}} .saspot-login-signup select, 
					{{WRAPPER}} .saspot-login-signup .form-control, 
					{{WRAPPER}} .saspot-login-signup .nice-select,
					.trial-form form input',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'form_border',
				'label' => esc_html__( 'Border', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .saspot-login-signup input[type="text"], 
					{{WRAPPER}} .saspot-login-signup input[type="email"], 
					{{WRAPPER}} .saspot-login-signup input[type="password"],
					{{WRAPPER}} .saspot-login-signup input[type="date"],
					{{WRAPPER}} .saspot-login-signup input[type="time"], 
					{{WRAPPER}} .saspot-login-signup input[type="number"], 
					{{WRAPPER}} .saspot-login-signup textarea, 
					{{WRAPPER}} .saspot-login-signup select, 
					{{WRAPPER}} .saspot-login-signup .form-control, 
					{{WRAPPER}} .saspot-login-signup .nice-select,
					.trial-form form input',
			]
		);
		$this->add_control(
			'placeholder_text_color',
			[
				'label' => __( 'Placeholder Text Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-login-signup input:not([type="submit"])::-webkit-input-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .saspot-login-signup input:not([type="submit"])::-moz-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .saspot-login-signup input:not([type="submit"])::-ms-input-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .saspot-login-signup input:not([type="submit"])::-o-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .trial-form form input:not([type="submit"])::-o-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .saspot-login-signup textarea::-webkit-input-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .saspot-login-signup textarea::-moz-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .saspot-login-signup textarea::-ms-input-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .saspot-login-signup textarea::-o-placeholder' => 'color: {{VALUE}} !important;',
				],
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => __( 'Text Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-login-signup input[type="text"], 
					{{WRAPPER}} .saspot-login-signup input[type="email"], 
					{{WRAPPER}} .saspot-login-signup input[type="password"], 
					{{WRAPPER}} .saspot-login-signup input[type="date"], 
					{{WRAPPER}} .saspot-login-signup input[type="time"], 
					{{WRAPPER}} .saspot-login-signup input[type="number"], 
					{{WRAPPER}} .saspot-login-signup textarea, 
					{{WRAPPER}} .saspot-login-signup select, 
					{{WRAPPER}} .saspot-login-signup .form-control, 
					{{WRAPPER}} .saspot-login-signup .nice-select,
					.trial-form form input' => 'color: {{VALUE}} !important;',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_aftr_text_style',
			[
				'label' => esc_html__( 'Form After Text', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sub_aftr_text_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .saspot-login-signup .getstart-rules,
				{{WRAPPER}} .saspot-login-signup .create-account-link',
			]
		);
		$this->add_control(
			'sub_aftr_text_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-login-signup .getstart-rules,
					{{WRAPPER}} .saspot-login-signup .create-account-link' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_aftr_link_style',
			[
				'label' => esc_html__( 'Form After Link', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sub_aftr_link_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .saspot-login-signup .getstart-rules a',
			]
		);
		$this->start_controls_tabs( 'aftr_link_style' );
			$this->start_controls_tab(
				'aftr_link_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'aftr_link_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-login-signup .getstart-rules a,
						{{WRAPPER}} .saspot-login-signup .create-account-link a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'aftr_link_hover_normal',
				[
					'label' => esc_html__( 'Hover', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'aftr_link_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-login-signup .getstart-rules a:hover,
						{{WRAPPER}} .saspot-login-signup .create-account-link a:hover' => 'color: {{VALUE}};',
						'{{WRAPPER}} .saspot-login-signup .getstart-rules a:after,
						{{WRAPPER}} .saspot-login-signup .create-account-link a:after' => 'background: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section
		
		
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
				'selector' => '{{WRAPPER}} .saspot-login-signup input[type="submit"], {{WRAPPER}} .trial-form form input[type="submit"]',
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .saspot-login-signup input[type="submit"], {{WRAPPER}} .trial-form form input[type="submit"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .saspot-login-signup input[type="submit"], {{WRAPPER}} .trial-form form input[type="submit"]' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-login-signup input[type="submit"], {{WRAPPER}} .trial-form form input[type="submit"]' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .saspot-login-signup input[type="submit"], {{WRAPPER}} .trial-form form input[type="submit"]',
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
						'{{WRAPPER}} .saspot-login-signup input[type="submit"]:hover, {{WRAPPER}} .trial-form form input[type="submit"]:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-login-signup input[type="submit"]:hover, {{WRAPPER}} .trial-form form input[type="submit"]:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_hover_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .saspot-login-signup input[type="submit"]:hover, {{WRAPPER}} .trial-form form input[type="submit"]:hover',
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section
		
		
		$this->start_controls_section(
			'section_custom_css_style',
			[
				'label' => esc_html__( 'Custom Css', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'custom_css',
			[
				'label' => esc_html__( 'Custom Css', 'saaspot-core' ),
				'type' => Controls_Manager::CODE,
				'language' => 'css',
				'rows' => 10,
			]
		);
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Login Signup widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$form_style = !empty( $settings['form_style'] ) ? $settings['form_style'] : '';
		$form_type = !empty( $settings['form_type'] ) ? $settings['form_type'] : '';
		$form_image = !empty( $settings['form_image']['id'] ) ? $settings['form_image']['id'] : '';	
		$form_title = !empty( $settings['form_title'] ) ? $settings['form_title'] : '';
		$form_sub_title = !empty( $settings['form_sub_title'] ) ? $settings['form_sub_title'] : '';
		$custom_css = !empty( $settings['custom_css'] ) ? $settings['custom_css'] : '';

		$agree_text = !empty( $settings['agree_text'] ) ? $settings['agree_text'] : '';
		$agree_link_text = !empty( $settings['agree_link_text'] ) ? $settings['agree_link_text'] : '';

		$agree_link = !empty( $settings['agree_link']['url'] ) ? $settings['agree_link']['url'] : '';
		$agree_external = !empty( $settings['agree_link']['is_external'] ) ? 'target="_blank"' : '';
		$agree_nofollow = !empty( $settings['agree_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$agree_link_attr = !empty( $agree_link ) ?  $agree_external.' '.$agree_nofollow : '';
		$btn_text = !empty( $settings['btn_text'] ) ? $settings['btn_text'] : '';
		
		$image_url = wp_get_attachment_url( $form_image );
		$form_type = $form_type ?  $form_type  : 'login';
		$title = $form_title ? '<h2 class="section-title">'.$form_title.'</h2>' : '';
		$sub_title = $form_sub_title ? '<p>'.$form_sub_title.'</p>' : '';

		$btn_text = $btn_text ?  $btn_text  : 'Register';
		$agree_link = $agree_link ?  $agree_link  : '#0';
		$agree_text = $agree_text ?  $agree_text  : 'I agree to our';
		$agree_link_text = $agree_link ?  ' <a href="'.$agree_link.'" '.$agree_link_attr.'>'.$agree_link_text.'</a>'  : '';


		// Turn output buffer on
		ob_start(); 
		if($form_style == "three") {
		?>
		<div class="trial-form saspot-form">
			<?php
				if ( ! is_user_logged_in() ) {
					echo '<form action="'.site_url('wp-login.php?action=register', 'login_post') .'" method="post">
									<div class="row">
		                <div class="col-md-8">
		                  <p>
										  	<input type="hidden" name="user_login" value="" id="user_login" class="input" />
										  	<input type="email" placeholder="Email Address" name="user_email" value="" id="user_email" class="input"  />
		                  </p>
		                </div>
		                <div class="col-md-4">
										  '.do_action('register_form').'
										  <input name="register" type="submit" value="'.$btn_text.'" id="register" disabled />
		                </div>
		              </div>
		              <div class="checkbox-wrap has-checker">
		                <label for="checkme"> <span class="checkbox-icon-wrap">
		                  <input name="checkme" type="checkbox" id="checkme" value="forever" class="input-checkbox" />
		                  <span class="checkbox-icon"></span> </span> <span class="wpcf7-list-item-label">'.$agree_text.$agree_link_text.'</span>
		                </label>
		              </div>
								</form>';
				} else { // If logged in:
					echo '<div class="saspot-logout-admin">';
						wp_loginout( home_url() ); // Display "Log Out" link.
						echo " | ";
						wp_register('', ''); // Display "Site Admin" link.
					echo '</div>';
				}
			?>
		</div>
		<?php } elseif($form_style == "two") {
		?>
		<div class="trial-wrap saspot-form">
			<?php
				if ( ! is_user_logged_in() ) {
					echo do_shortcode('[saaspot_registration]');
				} else { // If logged in:
					echo '<div class="saspot-logout-admin">';
						wp_loginout( home_url() ); // Display "Log Out" link.
						echo " | ";
						wp_register('', ''); // Display "Site Admin" link.
					echo '</div>';
				}
			?>
		</div>
		<?php } else { ?>
		<div class="saspot-login-signup saspot-form">
			<div class="saspot-losi-wrap">
				<div class="row align-items-center">
					<div class="col-md-6">
						<div class="saspot-image">
							<img src="<?php echo esc_url($image_url); ?>" alt="Login">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-wrap">
							<div class="section-title-wrap">
							  <?php echo $title.$sub_title; ?>
							</div>
							<?php
								if ( ! is_user_logged_in() ) {
									if($form_type == "login") {
										$args = array(

											'remember'       => true,
											'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
											'form_id'        => 'loginform',
											'id_username'    => 'user_login',
											'id_password'    => 'user_pass',
											'id_remember'    => 'rememberme',
											'id_submit'      => 'wp-submit',
											'label_username' => '',
											'label_password' => '',
											'label_remember' => __( 'Keep me sign in', 'saaspot-core' ),
											'label_log_in'   => __( 'Login', 'saaspot-core' ),
											'value_username' => '',
											'value_remember' => false
										);
										wp_login_form($args);
									} else {
										echo do_shortcode('[saaspot_registration]');
									}
								} else { // If logged in:
									echo '<div class="saspot-logout-admin">';
										wp_loginout( home_url() ); // Display "Log Out" link.
										echo " | ";
										wp_register('', ''); // Display "Site Admin" link.
									echo '</div>';
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } echo '<style>'.$custom_css.'</style>';
		// Return outbut buffer
		echo ob_get_clean();
		
	}

	/**
	 * Render Login Signup widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_LoginSignup() );