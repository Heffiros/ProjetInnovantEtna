<?php
namespace Form;
use Minima\Form\Base;

class Register extends Base
{
	protected $fields = array('mail', 'password');
	protected $validations = array(
		'mandatory' => array(
			'mail', 'password',
		),
		'pattern' => array(
			'password' => '/^.{6,16}$/',
		),
        'filter' => array(
            'mail' => FILTER_VALIDATE_EMAIL,
        ),
		'unique' => array(
			'mail' => 'esti_user',
		),
	);
} 