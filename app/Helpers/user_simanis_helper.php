<?php

function get_session_name() {
	return 'Kipas';	
}

function get_sess_role_name() {
	$role_id = session()->get('role_id');

	if(!$role_id) return null;

	$roles = config('Simanis')->roles;
	foreach($roles as $role) {
		echo $role_id;
		if($role['id'] == $role_id) return $role;
	}

	return null;
}
