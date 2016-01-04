<?php

namespace Form;
use Minima\Form\Base;
use Model;

class RegisterEstimote extends Base {
    protected $fields = array('beacon_ref' ,'name' , 'type', 'content');
    protected $validations = array(
        'mandatory' => array('beacon_ref','type')
    );
}
