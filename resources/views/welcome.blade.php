<!DOCTYPE html>
<html>
    <head>
        <title>BPMCS</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        {!! Html::style('css/styles.css') !!}
        {!! Html::script('js/app.js') !!}

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }

            .subtitle{
                font-size: 55px;
            }

            .content>p{
                font-size: 25px;
                font-weight: bold;
            }

            .content>p>a{
                text-decoration: none;
                color: rgb(150,150,150);
            }

            .content>p>a:hover{
                text-decoration: none;
                color: rgb(0,0,0);
            }
        </style>
    </head>
    <body>
        <div class="container">
        @include('flash::message')
            <div class="content">
                <div class="title">Bantug Primary Multi-Purpose Cooperative</div>
                <div class="subtitle">Purok Centro, Bantug, Science City of Munoz, N.E.</div>
                <p>{!! Html::link('/apply','Apply Now!') !!}</p>
            </div>
        </div>
        <script>
            $('#flash-overlay-modal').modal();
        </script>
    </body>
</html>
