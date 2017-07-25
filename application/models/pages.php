<?php

namespace Model;

use \Gas\Core;
use \Gas\ORM;

class Pages extends ORM
{

    public $primary_key = 'id';

    function _init()
    {
        self::$fields = array(
            'id' => ORM::field('auto[10]'),
            'title' => ORM::field('char[255]'),
            'slug' => ORM::field('char[255]'),
            'keywords' => ORM::field('char[255]'),
            'description' => ORM::field('char[255]'),
            'view' => ORM::field('char[255]'),
            'content' => ORM::field('string')
        );

        $this->ts_fields = array('updated_at', '[created_at]');
    }
}
