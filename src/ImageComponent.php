<?php

namespace Snappy;

class ImageComponent extends AbstractComponent
{
    /**
     * {@inheritdoc}
     */
    protected function getGenerator()
    {
        return new \Knp\Snappy\Image($this->binary, $this->options);
    }
}
