<html>
    <head>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Economica" rel="stylesheet">
        <link rel="shortcut icon" href="/img/favicon.ico" /> 

        <title>Church Fellowship Softball League - 404</title>

        <style>
            .hero {
            min-height: 300px;
            width: 100%;
            overflow: hidden;
            background: url(http://softball.setback.me/img/softball.png);
            background-position: center;
            background-size: 277px 250px;
            background-repeat: no-repeat;
            background-color: #172a47;
            }
            body {
                margin: 0px;
                color: #172a47;
                font-family: 'Economica', sans-serif;
                font-weight: 200;
                height: 100vh;
            }
            h1 {
            padding: 10px;
            margin: 20px 30px 5px 30px;
            font-size: 70px;
            text-align: center;
            }
            h2 {
            padding: 10px;
            margin: 0px 30px;
            font-size: 45px;
            }
            p {
            padding: 10px;
            margin: 0px 30px;
            font-size: 30px;
            }
            a {
            color : #eb9f00;
            text-decoration: none;
            }
            .text-div {
                max-width: 800px;
                width: 100%;
                margin: 0px auto;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div id="glitch">
        <div class="hero">
            </div>
            <div class="text-div">
                <h1>404</h1>
                <h2>We all strike out sometimes &hellip;</h2>
                <p>
                    We're not sure how you got here, but you should probably head <a href="/">home</a>. 
                </p>
                <br />
                <br />
                <br />
                <br />
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            // Glitch Line Vars
            var glitchLines = 10,
                glitchLineDurationMin = 100,
                glitchLineDurationMax = 300,
                glitchLineTimerMin = 100,
                glitchLineTimerMax = 3000,
                glitchLineWaitMin = 100,
                glitchLineWaitMax = 3000,
                glitchLineHeightMin = 5,
                glitchLineHeightMax = 50;

            // Glitch Move Vars
            var glitchMoveColor1 = '#eb9f00',
                glitchMoveColor2 = '#efea0c',
                glitchMoveOriginalColor = '#172a47',
                glitchMoveOpacity = .4,
                glitchMoveDurationMin = 100,
                glitchMoveDurationMax = 300,
                glitchMoveTimerMin = 500,
                glitchMoveTimerMax = 1500,
                glitchMoveWaitMin = 1000,
                glitchMoveWaitMax = 2000,
                glitchMoveAmountMin = -10,
                glitchMoveAmountMax = 10;

            // Do you want to autostart on page load?
            var glitch_autostart = 1;

            // Start Glitch on page load.
            window.onload = function() {
                if (glitch_autostart) {
                    glitch = new glitch();
                    glitch.init();
                }
            }

            // Random integer function (Will correctly work w/ negative numbers)
            function randomInt(min, max){
                return Math.floor(Math.random()*(max-min+1)+min);
            }

            // Glitch functionality
            function glitch() {

                // Initialize the glitches
                // - Create divs
                // - Load divs from <glitch> element
                // - Set body to not scroll on x-axis
                // - Starts glitch animations

                this.init = function() {
                    var pageContent = $('#glitch').html();
                    $('body').css('overflow-x', 'hidden');

                    // Glitch Lines
                    linecount = 0;
                    this.glitchlines = [];
                    while (linecount < glitchLines) {
                        $('body').append('<div class="glitch-line-'+linecount+'">'+pageContent+'</div>');
                        $('.glitch-line-'+linecount).css({
                            'height': '100%',
                            'width': '100%',
                            'position': 'absolute',
                            'top': '0',
                            'left': '0'
                        }).hide();
                        this.glitchline('.glitch-line-'+linecount, linecount);
                        linecount++;
                    }

                    // Glitch Move
                    $('body').append('<div class="glitch-div-1">'+pageContent+'</div>');
                    $('body').append('<div class="glitch-div-2">'+pageContent+'</div>');
                    $('.glitch-div-1, .glitch-div-2').css({
                        'height': '100%',
                        'width': '100%',
                        'position': 'absolute',
                        'top': '0',
                        'left': '0'
                    });
                    this.glitchmove();
                }

                this.glitchline = function(div, id) {
                    // Store an array of glitchlines
                    this.glitchlines[id] = new glitchline;
                    this.glitchlines[id].start(div);
                }

                this.glitchmove = function() {
                    glitchmove = new glitchmove;
                    glitchmove.start();
                }

            }

            // Glitch Move Animation

            function glitchmove() {

                // Start glitch
                this.start = function() {
                    selfmove = this;

                    // Create a move on a regular duration
                    setInterval(function() {
                        // Wait a random number of ms to execute
                        setTimeout(function() {
                            // Create animation
                            selfmove.move();
                        }, randomInt(glitchMoveWaitMin, glitchMoveWaitMax));
                    }, randomInt(glitchMoveTimerMin, glitchMoveTimerMax));

                }

                this.move = function() {
                    // Move the divs a random number of pixels top & left, change the color & opacity.
                    $('.glitch-div-1').css({
                        'left': randomInt(glitchMoveAmountMin, glitchMoveAmountMax) + 'px',
                        'top': randomInt(glitchMoveAmountMin, glitchMoveAmountMax) + 'px',
                        'opacity': glitchMoveOpacity,
                        'color': glitchMoveColor1
                    });
                    $('.glitch-div-2').css({
                        'left': randomInt(glitchMoveAmountMin, glitchMoveAmountMax) + 'px',
                        'top': randomInt(glitchMoveAmountMin, glitchMoveAmountMax) + 'px',
                        'opacity': glitchMoveOpacity,
                        'color': glitchMoveColor2
                    });

                    // Prepare to move divs back
                    this.moveback();
                }

                this.moveback = function() {
                    // Move the divs back after a random time duration
                    this.timeout = setTimeout(function() {
                        // Make sure we set the text back to the original color!
                        $('.glitch-div-1, .glitch-div-2').css({
                            'left': '0px',
                            'top': '0px',
                            'color': glitchMoveOriginalColor,
                            'opacity': '1',
                        });
                    }, randomInt(glitchMoveDurationMin, glitchMoveDurationMax));
                }
            }

            function glitchline() {

                this.start = function(div) {
                    selfline = this;
                    // Hold our timeouts.
                    this.timeouts = [];

                    // Create a move on a regular duration
                    setInterval(function() {
                        // Wait a random number of ms to execute
                        setTimeout(function() {
                            selfline.add(div);
                        }, randomInt(glitchLineWaitMin, glitchLineWaitMax));
                    }, randomInt(glitchLineTimerMin, glitchLineTimerMax));
                }

                this.add = function(div) {
                    // change the height, width, top, and left using a random number
                    $(div).css({
                        'height': randomInt(glitchLineHeightMin, glitchLineHeightMax) + 'px',
                        'width': randomInt($(window).width()/2, $(window).width()) + 'px',
                        'top': randomInt(0, $(window).height()) + 'px',
                        'left': randomInt(0, $(window).width()/2) + 'px',
                        'position': 'fixed',
                        'overflow': 'hidden',
                        'display': 'block',
                        'background': '#FFF'
                    });
                    // Set random scroll top & scroll left.
                    $(div).scrollTop(randomInt(0, $(window).height()));
                    $(div).scrollLeft(randomInt(0, 100));

                    // Prepare to hide the div
                    this.remove(div);
                }

                this.remove = function(div) {
                    // Hide the div at a random time interval.
                    this.timeouts[div] = setTimeout(function() {
                        $(div).hide();
                    }, randomInt(glitchLineDurationMin, glitchLineDurationMax));
                }

            }
        </script>
    </body>
</html>