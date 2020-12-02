<?php

namespace App\Models;

use CodeIgniter\Model;

class User_M extends Model
{
	protected $table = 'tbluser';
	protected $allowedFields = ['user', 'email', 'password', 'level', 'aktif'];
	protected $primaryKey = 'iduser';

	protected $validationRules = [
		'user' => 'alpha_numeric_space|min_length[3]|is_unique[tbluser.user]',
		'email' => 'valid_email'
		// you can use 'required' but it has been used by html. Can be hacked? Not! it has 'min_length[3]'
	];

	protected $validationMessages = [
		'user'	=> [
			'alpha_numeric_space' => "Tidak boleh menggunakan simbol",
			'min_length' => "Minimal 3 huruf",
			'is_unique' => "Ada user yang sama"
		],
		'email'	=> [
			'valid_email' => "Email Salah"
		]
	];
}
