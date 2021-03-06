
<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/png" href="/img/favicon.png" />

    <!-- Site Properties -->
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="Monetize your Snapchat account">

    <link rel="stylesheet" href="/css/semantic.min.css">

    <style type="text/css">

    .masthead.segment {
        min-height: 700px;
        padding: 1em 0em;
    }
    .masthead .logo.item img {
        margin-right: 1em;
    }
    .masthead .ui.menu .ui.button {
        margin-left: 0.5em;
    }
    .masthead h1.ui.header {
        margin-top: 2em;
        margin-bottom: 0em;
        font-size: 4em;
        font-weight: normal;
    }
    .masthead h2 {
        font-size: 1.7em;
        font-weight: normal;
    }

    .ui.vertical.stripe {
        padding: 8em 0em;
    }
    .ui.vertical.stripe h3 {
        font-size: 2em;
    }
    .ui.vertical.stripe .button + h3,
    .ui.vertical.stripe p + h3 {
        margin-top: 3em;
    }
    .ui.vertical.stripe .floated.image {
        clear: both;
    }
    .ui.vertical.stripe p {
        font-size: 1.33em;
    }
    .ui.vertical.stripe .horizontal.divider {
        margin: 3em 0em;
    }

    .quote.stripe.segment {
        padding: 0em;
    }
    .quote.stripe.segment .grid .column {
        padding-top: 5em;
        padding-bottom: 5em;
    }

    .footer.segment {
        padding: 5em 0em;
    }

    .secondary.pointing.menu .toc.item {
        display: none;
    }

    @media only screen and (max-width: 700px) {
        .ui.fixed.menu {
            display: none !important;
        }
        .secondary.pointing.menu .item,
        .secondary.pointing.menu .menu {
            display: none;
        }
        .secondary.pointing.menu .toc.item {
            display: block;
        }
        .masthead.segment {
            min-height: 350px;
        }
        .masthead h1.ui.header {
            font-size: 2em;
            margin-top: 1.5em;
        }
        .masthead h2 {
            margin-top: 0.5em;
            font-size: 1.5em;
        }
    }
    .item.logo {
        font-family: 'Billabong';
        font-size: 2em;
        color: white !important;
    }
    @font-face {
        font-family: 'Billabong'; /*a name to be used later*/
        src: url('/fonts/Billabong.ttf'); /*URL to font*/
    }

    </style>

</head>
<body>


    <!-- Page Contents -->
    <div class="">
        <div class="ui vertical masthead center aligned segment" style="background:linear-gradient(60deg,#CDDC39 15%,#FFEB3B 70%,#FFC107 94%)">

            @include('master.menu')

            <div style="">
                <div class="ui text container">

                    @include('master.alerts')

                    <h1 class="ui header">
                        Monetize your Snapchat account
                    </h1>
                    <h2>Get paid for private snaps.</h2>
                    <a href="/register" class="ui black huge button">Get Started <i class="right arrow icon"></i></a>
                </div>
            </div>
        </div>


        <div class="ui inverted vertical footer segment">
            <div class="ui container">
                <div class="ui stackable inverted divided equal height stackable grid">
                    <div class="three wide column">
                        <h4 class="ui inverted header">About</h4>
                        <div class="ui inverted link list">
                            <a href="/terms" class="item">Terms and Conditions</a>
                            <a href="mailto:info@premy.co" class="item">Contact Us</a>
                        </div>
                    </div>
                    <div class="seven wide column">
                        <h4 class="ui inverted header"></h4>
                        <p>Copyright {{ config('app.name') }} 2017</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
