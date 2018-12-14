<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 14/12/2018
 * Time: 10:57
 */

namespace Rabbit\MVC;

use Rabbit\DependencyInjector\DependencyContainer;

class View implements ViewInterface
{

    public $templatePath = '';
    private $parameters = [];

    public function __construct()
    {
        DependencyContainer::getInstance()->addAlias(get_class($this), str_replace('View', '', get_class($this)));
        $this->templatePath = dirname(DependencyContainer::getInstance()->get(get_class($this))->getInformation()->fileName).DIRECTORY_SEPARATOR.'template';
    }

    public function setParameter(string $parameterName, $value) {
        $this->parameters[$parameterName] = $value;
        return $this;
    }

    public function setParameters($parameters) {
        $this->parameters = $parameters;
        return $this;
    }

    public function render(string ...$templates) {
        ob_start();
        extract($this->parameters);
        ob_end_clean();
        foreach (array_reverse($templates) as $template) {
            if(file_exists($this->templatePath.DIRECTORY_SEPARATOR.$template)) {
                ob_start();
                require $this->templatePath.DIRECTORY_SEPARATOR.$template;
                $name = str_replace('.php', '', $template);
                $$name = ob_get_clean();
            }
        }
        ob_start();
        $name = str_replace('.php', '', $templates[0]);
        echo $$name;
        return ob_get_clean();
    }

}