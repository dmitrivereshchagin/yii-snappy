<?php

namespace dmitrivereshchagin\yii\snappy;

use Knp\Snappy\Image;

/**
 * Image generator component.
 */
class ImageComponent extends AbstractComponent
{
    /**
     * @return Image
     */
    protected function getGenerator()
    {
        return new Image($this->binary, $this->options);
    }
}
