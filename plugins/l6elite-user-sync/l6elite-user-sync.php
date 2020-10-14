<?php
/**
 * Plugin Name: L6elite User Sync
 */

define('L6ELITE_USER_SYNC_ROOT', plugin_dir_path(__FILE__));

require 'vendor/autoload.php';
require 'webhook.class.php';

$hooks = [
	'pmpro_updated_order' => 1,
	'pmpro_after_change_membership_level' => 3,
	'profile_update' => 2,
	'after_password_reset' => 2
];

foreach($hooks as $hook => $args){
	// $fp = fopen(L6ELITE_USER_SYNC_ROOT . 'hooks/' . $hook . '.php', 'w');
	// fwrite($fp, '<?php' . PHP_EOL . PHP_EOL . 'function l6elite_user_sync_hook_callback_' . $hook . '(){' . PHP_EOL . "\t" . PHP_EOL . '}');
	// fclose($fp);
	require_once L6ELITE_USER_SYNC_ROOT . 'hooks/' . $hook . '.php';
	add_action($hook, 'l6elite_user_sync_hook_callback_' . $hook, 99999, $args);
}

function l6elite_user_sync_send_webhook($event, $data){
	try{
		new L6EliteUserSyncWebhook($event, $data);
	} catch (Exception $e){
		// do not break script on fail
	}
}

function l6elite_user_sync_test(){
	return;
	$wp_user = get_user_by('id', 1);
	var_dump($wp_user->data->user_pass);
	$wp_user_membership = pmpro_getMembershipLevelForUser(1);
	var_dump($wp_user_membership);
	var_dump(date('Y-m-d H:i:s', 1508676026));
	$order = new MemberOrder(1);
	var_dump($order);
	unset($order);
	$orderId = intval((new MemberOrder())->getLastMemberOrder(45));
	var_dump($orderId);
	$order = new MemberOrder($orderId);
	var_dump($order);
	die();
}
add_action('init', 'l6elite_user_sync_test');