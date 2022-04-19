> **ATTENTION:** This repository is archived and therefore readonly.

ARTACK/mx-api-bundle
====================

The ARTACK mailXpert API Bundle adds support of using the API for mailXpert newsletter software.

Documentation
-------------

The documentation is currently unavailable because of the recent changes to the api.

Installation
------------

### Step 1: Download ARTACK/mx-api-bundle using composer

Add ArtackMxApi in your composer.json:

```js
{
    "require": {
        "artack/mx-api-bundle": "*"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update artack/mx-api-bundle
```

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Artack\MxApiBundle\ArtackMxApiBundle(),
        // ...
    );
}
```

### Step 3: Start using the mailXpert API Service

Start using the public service as described below. You can make use of the fluent interface.

``` php
/* @var $mxapi \Artack\MxApi\ArtackMxApi */
$mxapi = $this->get('artack.mxapi');

$response = $mxapi->setPath('Contact')->get();
```

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE
