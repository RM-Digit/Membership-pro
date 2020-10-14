<?php

function l6elite_user_sync_hook_callback_pmpro_updated_order($order){

	if($order->status != 'success'){
		return;
	}

	$membership = pmpro_getMembershipLevelForUser($order->user_id);
	$user = get_user_by('id', intval($order->user_id));

	$args = [
		 'user' => [
		 	'id' => intval($order->user_id),
		 	'email' => $user ? $user->data->user_email : null,
		 	'password' => $user ? $user->data->user_pass : null,
		 	'billing' => [
			 	'first_name' => $order->FirstName,
			 	'last_name' => $order->LastName,			 	
			 	'phone' => $order->billing->phone,
			 	'address' => $order->billing->street,
			 	'zip' => $order->billing->zip,
			 	'state' => $order->billing->state,
			 	'country' => $order->billing->country,
			 	'city' => $order->billing->city,
		 	],
		 	'membership' => $membership ? [
		 		'id' => $order->membership_id,
		 		'name' => $membership->name,
		 		'slug' => str_slug($membership->name),
		 		'starts_at' => intval($membership->startdate),
		 		'ends_at' => intval($membership->startdate) + (60*60*24*365) // 1 year
		 	] : null,
		 ]
	];

	l6elite_user_sync_send_webhook('updatedOrder', $args);

}