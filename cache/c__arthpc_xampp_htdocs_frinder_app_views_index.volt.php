<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Frinder</title>
        <?= $this->assets->outputCss() ?>
    </head>
    <body>        
        <?= $this->partial('layouts/nav') ?>
        <?= $this->partial('layouts/header') ?>
        <div class="container" id="content">
            <?= $this->getContent() ?>
        </div>
        <?= $this->assets->outputJs() ?>
    </body>
</html>
