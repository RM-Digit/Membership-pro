<?php

function l6elite_user_sync_hook_callback_pmpro_after_change_membership_level($level_id, $user_id, $cancel_level){
	
	$membership = pmpro_getMembershipLevelForUser($user_id);
	$user = get_user_by('id', intval($user_id));

	$args = [
		 'user' => [
		 	'id' => intval($user_id),
		 	'email' => $user ? $user->data->user_email : null,
		 	'password' => $user ? $user->data->user_pass : null,
		 	'billing' => [
			 	'first_name' => $user->first_name,
			 	'last_name' => $user->last_name,		 	
			 	'phone' => $user->pmpro_bphone,
			 	'address' => $user->pmpro_baddress1,
			 	'zip' => $user->pmpro_bzipcode,
			 	'state' => $user->pmpro_bstate,
			 	'country' => $user->pmpro_bcountry,
			 	'city' => $user->pmpro_bcity,
		 	],
		 	'membership' => $membership ? [
		 		'id' => intval($membership->id),
		 		'name' => $membership->name,
		 		'slug' => str_slug($membership->name),
		 		'starts_at' => intval($membership->startdate),
		 		'ends_at' => intval($membership->startdate) + (60*60*24*365) // 1 year
		 	] : null,
		 ]
	];

	l6elite_user_sync_send_webhook('updatedMembershipLevel', $args);

}