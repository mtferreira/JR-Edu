<?php
/**
 * User: Matheus Ferreira
 * Date: 14/07/14
 * Time: 21:06
 */

namespace App;

use SON\Init\Bootstrap;

class init extends Bootstrap{

    /*
     * método onde são configuradas todas as rotas
     */
    protected function initRoutes()
    {
        $ar['home'] = array('route'=>'/',"controller" => "index","action" => "index");
        $ar['empresa'] = array("route" => "/empresa", "controller" => "index", "action" => "empresa");
        $this->setRoutes($ar);
    }

    public static function getDb()
    {
        $db = new \PDO("mysql:host=localhost;dbname=MVC","root","root");
        return $db;
    }



}