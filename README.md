# yii-snappy

This is a basic wrapper around [Snappy] [s] implemented as [Yii] [y]
application component.  Snappy is a PHP library that uses
[wkhtmltopdf and wkhtmltoimage] [w] to render HTML into PDF and various
image formats.

## Installation

Installation using [Composer] [c] should be straightforward

```
composer require dmitrivereshchagin/yii-snappy
```

To register components in your application add something like the
following in configuration `components` section:

```php
'pdf' => array(
    'class' => '\Snappy\PdfComponent',
    'binary' => '/usr/local/bin/wkhtmltopdf',
    'options' => array('orientation' => 'landscape'),
),
'image' => array(
    'class' => '\Snappy\ImageComponent',
    'binary' => '/usr/local/bin/wkhtmltoimage',
),
```

Specifying paths to binaries is mandatory.  Optionally you can configure
default command line arguments that can be overridden or adjusted later.

## Usage

Use `Yii::app()->pdf` and `Yii::app()->image` to generate PDF documents
and images respectively.  These components provide access to methods
declared by `\Knp\Snappy\GeneratorInterface`.

Here are some examples.

### Generate image from an URL

```php
Yii::app()->image->generate('http://example.com', '/path/to/image.jpg');
```

### Generate PDF document from an URL

```php
Yii::app()->pdf->generate('http://example.com', '/path/to/document.pdf');
```

### Generate PDF document from multiple URLs

```php
Yii::app()->pdf->generate(
    array('http://example.com', 'http://example.org'),
    '/path/to/document.pdf'
);
```

### Generate PDF document from a view

```php
Yii::app()->pdf->generateFromHtml(
    $this->render('view', array('name' => $value), $return = true),
    '/path/to/document.pdf'
);
```

### Generate PDF document as response from controller

```php
$html = $this->render('view', array('name' => $value), $return = true);

Yii::app()->request->sendFile(
    'document.pdf',
    Yii::app()->pdf->getOutputFromHtml($html)
);
```

### Generate PDF document with relative URLs inside

```php
$url = Yii::app()->createAbsoluteUrl('controller/action');

Yii::app()->request->sendFile(
    'document.pdf',
    Yii::app()->pdf->getOutput($url)
);
```

## Credits

This code is based on Snappy library.  Snappy has been originally
developed by [KnpLabs] [k] team.

[c]: https://getcomposer.org
[k]: http://knplabs.com
[s]: https://github.com/KnpLabs/snappy
[w]: http://wkhtmltopdf.org
[y]: https://github.com/yiisoft/yii
