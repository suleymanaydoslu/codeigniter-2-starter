<?php

namespace Model;

use \Gas\Core;
use \Gas\ORM;

class Contact extends ORM
{

    public $primary_key = 'id';

    function _init()
    {
        self::$fields = array(
            'id' => ORM::field('auto[10]'),
            'firstname' => ORM::field('char[255]'),
            'lastname' => ORM::field('char[255]'),
            'topic' => ORM::field('char[255]'),
            'message' => ORM::field('string'),
            'email' => ORM::field('char[255]')
        );
    }
}
