<?php
/**
 * Created by PhpStorm.
 * User: Matheus Ferreira
 * Date: 14/07/14
 * Time: 23:21
 */

namespace App\Controllers;

use SON\Controller\Action;
use \SON\DI\Container;

class Index extends Action
{
    public function index()
    {
        //$artigo = Container::getClassModels("Artigo");
        //$artigos = $artigo->fetchAll();

       // $this->view->artigos = $artigos;

        $this->render('index');
    }
    public function empresa()
    {
        $this->render('empresa');
    }
}