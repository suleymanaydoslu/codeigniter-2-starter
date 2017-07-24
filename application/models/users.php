<?php

namespace Model;

use \Gas\Core;
use \Gas\ORM;

class Users extends ORM
{

    public $primary_key = 'id';

    function _init()
    {
        self::$fields = array(
            'id' => ORM::field('auto[10]'),
            'firstname' => ORM::field('char[255]'),
            'lastname' => ORM::field('char[255]'),
            'email' => ORM::field('char[255]'),
            'phone' => ORM::field('char[255]'),
            'password' => ORM::field('char[255]'),
            'avatar' => ORM::field('char[255]'),
            'type' => ORM::field('int[11]'),
            'updated_at' => ORM::field('datetime'),
            'created_at' => ORM::field('datetime')
        );

        $this->ts_fields = array('updated_at', '[created_at]');
    }

    /* crypting */
    public static function cryptTo($value)
    {

        $ci =& get_instance();
        $data = sha1($ci->config->item('encryption_key') . $value . 'GSSgss');
        return $data;
    }
}
