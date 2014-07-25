<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 15/07/14
 * Time: 10:40
 */

namespace SON\Controller;


class Action {

    protected $view;
    protected $action;
    protected $directory;
    protected $file;

    public function __construct()
    {
        $this->view = new \stdClass;
    }

    public function render($action, $layout=true)
    {
        $this->action = $action;

        if($layout ==true && file_exists("../App/views/layout/layout.phtml"))
        {
            include_once '../App/views/layout/layout.phtml';
        }
        else
        {
            $this->content();
        }
    }

    public function content()
    {
        $atual = get_class($this);
        $singleClassName = strtolower(str_replace("App\\Controllers\\","",$atual));
        include_once '../App/views/'.$singleClassName.'/'.$this->action.'.phtml';
    }

    public function initialize($type, $file){
        $this->directory = strtolower($type);
        $this->file = strtolower($file);
        if(file_exists($this->directory."/".$this->file)):
           return $this->directory."/".$this->file;
        endif;
    }
} 