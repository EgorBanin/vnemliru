<?php

class UserMapper extends DataMapper {
	
	public function map($row) {
		if ( ! $row) {
			return null;
		}

		$user = arr_omit($row, ['loginHash', 'passwordHash']);
		$user['roles'] = array_filter(explode(',', $roles));

		return (object) $user;
	}

}