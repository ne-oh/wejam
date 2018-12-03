<?php
session_start();

?>

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129795236-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-129795236-1');
    </script>
    <link rel="stylesheet" href="http://webdev.iyaserver.com/~annieoh/wejam/externalstylesheet.css">
    <style>
        body {
            font-family: "Glacial Indifference", normal;
        }
        /* THIS IS ALL THE MENU HAMBURGER NAV STUFF */
        /* THIS IS ALL THE MENU HAMBURGER NAV STUFF */
        /* THIS IS ALL THE MENU HAMBURGER NAV STUFF */
        /* THIS IS ALL THE MENU HAMBURGER NAV STUFF */
        /* THIS IS ALL THE MENU HAMBURGER NAV STUFF */

        a
        {
            text-decoration: none;
            color: #232323;

            transition: color 0.3s ease;
        }

        a:hover
        {
            color: tomato;
        }
        #header{
            background-color: white;
            margin: -1.5%;
            height: 10vh;
            width: 102%;
            z-index: 2;
            overflow: visible;
            margin-bottom: 3%;

        }
        #name {
            width: 125px;
            stroke: rgba(0,0,0,.5);
            margin: auto;
            margin-top: .75%;
        }
        #menuToggle
        {
            display: block;
            position: relative;
            top: 50px;
            left: 50px;

            z-index: 6;

            -webkit-user-select: none;
            user-select: none;
        }

        #menuToggle input
        {
            display: block;
            width: 40px;
            height: 32px;
            position: absolute;
            top: -7px;
            left: -5px;

            cursor: pointer;

            opacity: 0; /* hide this */
            z-index: 10; /* and place it over the hamburger */

            -webkit-touch-callout: none;
        }

        /*
         * Just a quick hamburger
         */
        #menuToggle span
        {
            display: block;
            width: 33px;
            height: 4px;
            margin-bottom: 5px;
            position: relative;

            background: black;
            border-radius: 3px;

            z-index: 6;

            transform-origin: 4px 0px;

            transition: transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0),
            background 0.5s cubic-bezier(0.77,0.2,0.05,1.0),
            opacity 0.55s ease;
        }

        #menuToggle span:first-child
        {
            transform-origin: 0% 0%;
        }

        #menuToggle span:nth-last-child(2)
        {
            transform-origin: 0% 100%;
        }

        /*
         * Transform all the slices of hamburger
         * into a crossmark.
         */
        #menuToggle input:checked ~ span
        {
            opacity: 1;
            transform: rotate(45deg) translate(-2px, -1px);
            background: #232323;
        }

        /*
         * But let's hide the middle one.
         */
        #menuToggle input:checked ~ span:nth-last-child(3)
        {
            opacity: 0;
            transform: rotate(0deg) scale(0.2, 0.2);
        }

        /*
         * Ohyeah and the last one should go the other direction
         */
        #menuToggle input:checked ~ span:nth-last-child(2)
        {
            transform: rotate(-45deg) translate(0, -1px);
        }

        /*
         * Make this absolute positioned
         * at the top left of the screen
         */
        #menu
        {
            position: absolute;
            width: 20%;
            margin: -100px 0 0 -50px;
            padding: 50px;
            padding-top: 125px;

            background: #ededed;
            list-style-type: none;
            -webkit-font-smoothing: antialiased;
            /* to stop flickering of text in safari */

            transform-origin: 0% 0%;
            transform: translate(-100%, 0);

            transition: transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0);
        }

        #menu li
        {
            padding: 10px 0;
            font-size: 22px;
        }

        /*
         * And let's slide it in from the left
         */
        #menuToggle input:checked ~ ul
        {
            transform: none;
        }


        /* THIS IS THE END OF ALL THE MENU HAMBURGER NAV STUFF */
        /* THIS IS THE END OF ALL THE MENU HAMBURGER NAV STUFF */
        /* THIS IS THE END OF ALL THE MENU HAMBURGER NAV STUFF */
        /* THIS IS THE END OF ALL THE MENU HAMBURGER NAV STUFF */
    </style>
</head>

<!--THIS IS THE ANIMATED LOGO  -->
<div id="header">

    <!--    Made by Erik Terwan    -->
    <!--   24th of November 2015   -->
    <!--        MIT License        -->
    <nav role="navigation">
        <div id="menuToggle">
            <!--
            A fake / hidden checkbox is used as click reciever,
            so you can use the :checked selector on it.
            -->
            <input type="checkbox" />

            <!--
            Some spans to act as a hamburger.

            They are acting like a real hamburger,
            not that McDonalds stuff.
            -->
            <span></span>
            <span></span>
            <span></span>

            <!--
            Too bad the menu has to be inside of the button
            but hey, it's pure CSS magic.
            -->
            <ul id="menu">
                <?php
                if($_SESSION["loggedin"] != "true"){
                    ?>
                    <a href="accountcreation.php"><li>Sign Up</li></a>
                    <a href="login.php"><li>Login</li></a>
                    <hr>
                    <a href="top-songs.php"><li>Top Songs</li></a>
                    <a href="about.php"><li>About</li></a>
                    <a href="team.php"><li>Our Team</li></a>
                    <a href="contact.php"><li>Contact</li></a>

                    <?php
                    //print_r($_SESSION);
                    //echo "</div>";
                }else{
                    ?>

                    <h2>Welcome back,
                        <br><strong><?php echo $_SESSION["username"]?></strong></h2><br>


                    <a href="addingplaylist.php"><li>Create Playlist</li></a>
                    <a href="search.php"><li>Search Playlists</li></a>
                    <hr>
                    <a href="top-songs.php"><li>Top Songs</li></a>
                    <a href="about.php"><li>About</li></a>
                    <a href="team.php"><li>Our Team</li></a>
                    <a href="contact.php"><li>Contact</li></a>
                    <hr>
                    <a href="accountsettings.php"><li>Account</li></a>
                    <a href="logout.php"><li>Log Out</li></a>

                    <?php
                    if($_SESSION["power"]==1){
                        echo "<hr><a href=\"admin/admin-home.php\"><li>Admin Panel</li></a>";
                    }
                    ?>


                    <?php
                    //print_r($_SESSION);
                    //echo "<br></div>";
                }
                ?>
            </ul>

        </div>
    </nav>


    <a href="http://webdev.iyaserver.com/~annieoh/wejam/home.php">
        <div id="name">

            <!-- Generator: Adobe Illustrator 21.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 521.5 185.2" style="enable-background:new 0 0 521.5 185.2;" xml:space="preserve">
    <g>

        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384.44 97.55"><defs><style>.cls-1{fill:none;}</style></defs><title>wejam</title><path stroke-linejoin="round" class="path1" fill="none" stroke="#3c404d" stroke-width="12" stroke-miterlimit="0" stroke-linecap="round" d="M22.4,37.58c0,6.76,2.12,16.11,14.91,19.05,17.86,4.1,28.82-22.2,28.82-22.2s-16.72,61.72-15.69,83c.3,6.13,3.47,14,12.63,14,14.83,0,16.37-10.88,16.37-10.88L98.85,34.57,80.26,121s3.27,10.38,13.57,10.38A18.23,18.23,0,0,0,110,120.52c8.81-20.25,21.33-86.16,21.33-86.16" transform="translate(-22.4 -34.36)"/><path stroke-linejoin="round" stroke-linecap="round" class="path" fill="none" stroke="#3c404d" stroke-width="12" stroke-miterlimit="0" d="M141.26,123.18l34.52-27s-15.8-17.73-29.6-8c-13.36,9.42-11.17,26-6.76,33.77,3.37,5.93,15.26,13.05,29.86,7.33,11.11-4.35,13.27-18.43,13.27-18.43" transform="translate(-22.4 -34.36)"/><path stroke-linecap="round" class="path" fill="none" stroke="#3c404d" stroke-width="12" stroke-miterlimit="0" d="M213.82,79.32s-5.71,19.22-4.55,32.49c1,11.29,9.42,20.1,20.19,20.1,15.4,0,24.61-15.45,28-28.16,4.52-17,15.11-68.69,15.11-68.69s9.32,23.29,24.53,22.46c21.24-1.16,20.13-22.72,20.13-22.72" transform="translate(-22.4 -34.36)"/><path stroke-linejoin="round" stroke-linecap="round" class="path" fill="none" stroke="#3c404d" stroke-width="12" stroke-miterlimit="0" d="M344.19,131.32s6.36-29.69,9.77-39.2c1.35-3.77,3.53-7.43,14.21-7.43,11.23,0,12.71,8.79,12.71,8.79l-8.08,37.9,8.38-37.9s2.15-8.79,14.09-8.79c11.45,0,11.31,7,11.55,10.94.36,5.91-7,35.75-7,35.75" transform="translate(-22.4 -34.36)"/><circle class="path" fill="none" stroke="#3c404d" stroke-width="12" stroke-miterlimit="0" cx="277.6" cy="75.06" r="21.67"/><line stroke-linecap="round" class="path2" fill="none" stroke="#3c404d" stroke-width="12" stroke-miterlimit="0" x1="307.32" y1="54.26" x2="296.27" y2="97.09"/></svg>
    </g></svg></div>
    </a></div>

<!--ANIMATED LOGO END -->



