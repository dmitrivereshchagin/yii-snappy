<?php

namespace Snappy;

/**
 * Image generator component.
 */
class ImageComponent extends AbstractComponent
{
    /**
     * @return \Knp\Snappy\Image
     */
    protected function getGenerator()
    {
        return new \Knp\Snappy\Image($this->binary, $this->options);
    }
}
