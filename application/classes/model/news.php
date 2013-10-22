<?php

defined('SYSPATH') OR die('No direct access allowed.');

class Model_News extends Sprig {

    protected $_table = 'news';

    protected function _init()
    {
	$this->_fields += array(
	    'id' => new Sprig_Field_Auto,
	    'title' => new Sprig_Field_Char,
	    'brief_text' => new Sprig_Field_Char,
	    'full_text' => new Sprig_Field_Char,
	    'image' => new Sprig_Field_Char,
		'time' => new Sprig_Field_Timestamp(array(
			'auto_now_create' => true,
		)),
		'status' => new Sprig_Field_Integer(array(
			'default' => 0,
		)),
	);
    }

}