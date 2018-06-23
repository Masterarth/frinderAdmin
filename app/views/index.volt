<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Frinder</title>
        {{ assets.outputCss() }}
    </head>
    <body>        
        {{partial('layouts/nav')}}
        {{partial('layouts/header')}}
        <div class="container" id="content">
            {{ content() }}
        </div>
        {{ assets.outputJs() }}
    </body>
</html>
