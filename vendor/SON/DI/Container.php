<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 16/07/14
 * Time: 00:18
 */

namespace SON\DI;


class Container
{
    public static function getClassModels($name)
    {
        $str_class = "\App\\Models\\".ucfirst($name);
        $class = new $str_class(\App\Init::getDb());
        return $class;
    }
} 