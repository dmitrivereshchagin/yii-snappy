<?php

namespace Snappy;

/**
 * PDF generator component.
 */
class PdfComponent extends AbstractComponent
{
    /**
     * @return \Knp\Snappy\Pdf
     */
    protected function getGenerator()
    {
        return new \Knp\Snappy\Pdf($this->binary, $this->options);
    }
}
