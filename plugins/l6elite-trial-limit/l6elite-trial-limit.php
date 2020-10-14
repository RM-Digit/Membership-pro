<?php
/*
Plugin Name: L6elite Trial Limit
*/

function l6elite_trial_limit_hook_callback_pmpro_after_change_membership_level($level_id, $user_id)
{

	$level = pmpro_getLevel($level_id);

	if(!$level){
		return;
	}

	$slug = strtolower($level->name);
	$slug = str_replace(' ', '-', $slug);

	$isTrial = !(strpos($slug, '-trial') === false && strpos($slug, 'trial-') === false);

	if($isTrial){
		//add user meta to record the fact that this user has had this level before
		update_user_meta($user_id, 'l6elite_trial_level_used', '1');
	}

}
add_action('pmpro_after_change_membership_level', 'l6elite_trial_limit_hook_callback_pmpro_after_change_membership_level', 10, 2);

function l6elite_trial_limit_remove_checkout_if_used_trial($content){
	if(isset($_GET['level']) && is_user_logged_in()){
		$level_id = $_GET['level'];
		$level = pmpro_getLevel($level_id);
		$slug = strtolower($level->name);
		$slug = str_replace(' ', '-', $slug);
		$isTrial = !(strpos($slug, '-trial') === false && strpos($slug, 'trial-') === false);
		$user = wp_get_current_user();
		$isTrialUsed = $user->l6elite_trial_level_used == 1;
		// $restrict = true;
		$restrict = $isTrial && $isTrialUsed;
		if($restrict){
			return 'Trial expired. Please Subscribe.';
		}
		return $content;
	}
	return $content;
}
add_filter('pmpro_pages_shortcode_checkout', 'l6elite_trial_limit_remove_checkout_if_used_trial', 10, 1);

// function l6elite_trial_limit_hide_trial_levels_if_trial_used($levels){
// 	if(!is_user_logged_in()){
// 		return;
// 	}
// 	$user = wp_get_current_user();
// 	$isTrialUsed = $user->l6elite_trial_level_used == 1;
// 	if(!$isTrialUsed){
// 		return;
// 	}
// 	$allowed_levels = [];
// 	foreach($levels as $level){
// 		$slug = strtolower($level->name);
// 		$slug = str_replace(' ', '-', $slug);
// 		$isTrial = !(strpos($slug, '-trial') === false && strpos($slug, 'trial-') === false);
// 		if($isTrial){
// 			continue;
// 		}
// 		$allowed_levels[] = $level;
// 	}
// 	return $allowed_levels;
// }
// add_filter('pmpro_levels_array', 'l6elite_trial_limit_hide_trial_levels_if_trial_used', 10, 1);