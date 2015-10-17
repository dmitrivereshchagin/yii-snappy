<?php

namespace Snappy;

class PdfComponent extends AbstractComponent
{
    /**
     * {@inheritdoc}
     */
    protected function getGenerator()
    {
        return new \Knp\Snappy\Pdf($this->binary, $this->options);
    }
}
