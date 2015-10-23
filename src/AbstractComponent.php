<?php

namespace Snappy;

/**
 * Base class for generator components.
 *
 * @method void generate(array|string $input, string $output, array $options, bool $overwrite)
 * @method void generateFromHtml(array|string $html, string $output, array $options, bool $overwrite)
 * @method string getOutput(array|string $input, array $options)
 * @method string getOutputFromHtml(array|string $html, array $options)
 */
abstract class AbstractComponent extends \CApplicationComponent
{
    /**
     * @var string Path to wkhtmltox binary
     */
    public $binary;
    /**
     * @var array Command line options
     */
    public $options = array();

    /**
     * Creates and returns generator instance.
     *
     * @return \Knp\Snappy\AbstractGenerator
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
