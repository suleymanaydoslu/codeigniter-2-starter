<?php

namespace Model;

use \Gas\Core;
use \Gas\ORM;

class Settings extends ORM
{

    public $primary_key = 'id';

    function _init()
    {
        self::$fields = array(
            'id' => ORM::field('auto[10]'),
            'title' => ORM::field('string'),
            'key' => ORM::field('string'),
            'value' => ORM::field('string')
        );
    }
}
