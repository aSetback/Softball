<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Church Fellowship Softball League - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Economica" rel="stylesheet">
        <link rel="shortcut icon" href="/img/favicon.ico" /> 

        <!-- Styles -->
        <style>
            html, body {
                background-color: #172a47;
                color: #636b6f;
                font-family: 'Economica', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            #header {
                text-align: center;
            }
            #header img {
                height: 250px;
                padding: 20px;
            }
            #menu {
                border-top: solid 1px #efea0c;
                border-bottom: solid 1px #efea0c;
                padding: 5px;
                color: #efea0c;
                text-align: center;
                font-size: 40px;
            }
            #menu a {
                color: #eb9f00;
                text-decoration: none;
                font-weight: bold;
                margin: 5px;
            }
            #menu a:hover {
                text-decoration: underline;
            }
            #main {
                width: 960px;
                margin: 20px auto;
                font-size: 30px;
                color: #172a47;
                background: #EEE;
                padding: 20px;
                min-height: 300px;
                border-radius: 5px;
            }
            #main h3 {
                font-size: 40px;
                font-weight: bold;
                margin: 0;
            }
            #main h4 {
                text-align: center;
                margin: 0;
            }
            #main a {
                color: #eb9f00;
                text-decoration: none;
            }
            #main a:hover {
                text-decoration: underline;
            }
            #main li {
                margin: 10px 0;
            }
            #main label {
                width: 100px;
                display: inline-block;
            }
            #main select {
                font-size: 30px;
                font-family: 'Economica', sans-serif;
                width: 300px;
            }
            #main table {
                width: 100%;
                border-collapse: collapse;
                margin: 10px 0 30px;
            }
            #main table th {
                background-color: #172a47;
                color: #eb9f00;
            }
            #main table th, #main table td {
                text-align: left;
                border: solid 1px #eb9f00;
                padding: 3px 6px;;
            }
           #login {
               width: 600px;
               padding: 20px;
               margin: 0 auto;
           }
           #login label {
               width: 100%;
               font-size: 20px;
           }
           #login input {
               width: 100%;
               font-size: 20px;
           }
           #login button {
               background: #172a47;
               color: #fff;
               border: none;
               padding: 15px;
               margin: 10px 0;
           }
           .invalid-feedback {
               color: #b00b00;
               font-size: 15px;
           }
            @media (max-width: 960px) {
                #main {
                    width: 90%;
                    font-size: 20px;
                    padding: 20px 5%;
                    border-radius: 0;
                    margin: 0 auto;
                }
                #main table#standings {
                    font-size: 15px;
                    width: 100%;
                }
                #main h3 {
                    font-size: 30px;
                }
                #menu {
                    font-size: 18px;
                }
                #main select {
                    font-size: 20px;
                    margin-bottom: 5px;
                    width: 100%;
                }
            }
        </style>
    </head>
    <body>
        <div id="header">
            <img src="/img/softball.png" />
            <div id="menu">
            <a href="/">Home</a> &bull;
            <a href="/schedule">Schedule</a> &bull;
            <a href="/standings">Standings</a> &bull;
            <a href="/rules">Rules</a> &bull;
            <a href="/contact">Contact</a>
            </div>
        </div>
        <div id="main">
            @yield('content')
        </div>
        <div id="footer">
            <center>
                Site created by Dave DeHaan &bull; &copy {{ date('Y') }}
            </center>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        @yield('js')        
    </body>
</html>
