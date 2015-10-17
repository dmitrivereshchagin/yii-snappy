<?php

namespace Snappy;

abstract class AbstractComponent extends \CApplicationComponent
{
    /**
     * @var string
     */
    public $binary;
    /**
     * @var array
     */
    public $options = array();

    /**
     * @return \Knp\Snappy\GeneratorInterface
     */
    abstract protected function getGenerator();

    /**
     * {@inheritdoc}
     */
    public function __call($name, $parameters)
    {
        if (method_exists('\Knp\Snappy\GeneratorInterface', $name)) {
            return call_user_func_array(
                array($this->getGenerator(), $name),
                $parameters
            );
        }

        return parent::__call($name, $parameters);
    }
}
