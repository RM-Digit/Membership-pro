<?php
/*
Plugin Name: L6elite Disable Usernames
*/

function l6elite_disable_usernames_remove_username_empty_error($wp_error, $sanitized_user_login, $user_email){

    if(isset($wp_error->errors['empty_username'])){
        $wp_error->remove('empty_username');
    }    

    if(isset($wp_error->errors['username_exists'])){
        $wp_error->remove('username_exists');
    }

    return $wp_error;

}

add_filter('registration_errors', 'l6elite_disable_usernames_remove_username_empty_error', 10, 3);

function l6elite_disable_usernames_alter_pmpro_validation($required_fields){

	unset($required_fields['username']);

	return $required_fields;

}

add_filter('pmpro_required_user_fields', 'l6elite_disable_usernames_alter_pmpro_validation', 10, 2);

function l6elite_disable_usernames_remove_username_field_on_pmpro_checkout(){ ?>
<script>
document.getElementById('username').parentNode.style.display = 'none';
jQuery(document).ready(function($){
    var $username = $('#username');
    var $email = $('#bemail');
    $username.val($email.val());
    $(document).on('input change paste', '#bemail', function(){
        $username.val($email.val());
    });
});
</script>
<?php }

add_action('pmpro_checkout_after_username', 'l6elite_disable_usernames_remove_username_field_on_pmpro_checkout');

function l6elite_disable_usernames_alter_pmpro_new_user_data($user_data){
	$user_data['user_login'] = $user_data['user_email'];
	return $user_data;
}

add_filter('pmpro_checkout_new_user_array', 'l6elite_disable_usernames_alter_pmpro_new_user_data');