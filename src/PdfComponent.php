<?php

namespace Snappy;

use Knp\Snappy\Pdf;

/**
 * PDF generator component.
 */
class PdfComponent extends AbstractComponent
{
    /**
     * @return Pdf
     */
    protected function getGenerator()
    {
        return new Pdf($this->binary, $this->options);
    }
}
