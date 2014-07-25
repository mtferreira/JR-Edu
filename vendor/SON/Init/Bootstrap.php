<?php
/**
 * Created by PhpStorm.
 * User: Matheus Ferreira
 * Date: 14/07/14
 * Time: 23:38
 */

namespace SON\Init;


 abstract class Bootstrap {

    /*
     * Nome: routes
     * objetivo : armazenar todas as rotas do sistema
     */
    private $routes;

    public function __construct()
    {
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    protected  function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    /*
     * método onde são configuradas todas as rotas
     */
    abstract protected function initRoutes();

    /*
     * método responsável por receber rota
     * e procura-lá entre as opções de rotas disponíveis
     */
    protected function run($url)
    {
        array_walk($this->routes, function($route) use($url){
            if($url== $route['route'])
            {
                $class = "App\\Controllers\\".ucfirst($route['controller']);
                $controller = new $class;
                $controller->$route['action']();
            }
        });
    }
    /*
     * método responsável por
     * intercepitar a rota
     */
    protected function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    }

} 