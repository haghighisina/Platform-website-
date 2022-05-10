<?php
class Template{

    protected $vars = array();

    public function __construct(protected $template){}

    //set our key, value
    public function __set($key, $value){
        $this->vars[$key] = $value;
    }

    //get the key
    public function __get($key){
        return $this->vars[$key];
    }

    public function __toString(){
       // extract the value use single variable instead of having key value in a template
       extract($this->vars);
       //define the path and pass it here
       chdir(dirname($this->template));
       //output the template
       ob_start();
       //include template path
       require basename($this->template);
       return ob_get_clean();
    }
}