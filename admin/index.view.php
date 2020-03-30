    <?php

    /**
     * ---------------------------------------------------------------------
     *  	      INCLUDING HTML DOCTYPE, HEADER AND TOP BODY TAG
     * ---------------------------------------------------------------------
     * 
     */
    $getHeader = require_once 'helpers/getHeader.php';

    $getHeader('dashboard');

    /**
     * ---------------------------------------------------------------------
     *  	            INCLUDING THE TOP FIXED NAVBAR
     * ---------------------------------------------------------------------
     * 
     */
    include_once 'fixed-top-bar.view.php';

    /**
     * ---------------------------------------------------------------------
     *  	INCLUDING THE NAVIGATION BAR TO NAVIGATE BETWEEN PAGES
     * ---------------------------------------------------------------------
     * 
     */
    include_once 'navigation-bar.view.php';

    ?>

    <!-- TODO: LOGIN FORM -->

    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <?php
    /**
     * ---------------------------------------------------------------------
     *  	      INCLUDING HTML FOOTER AND SCRIPT TAGS
     * ---------------------------------------------------------------------
     * 
     */
    $getFooter = require_once 'helpers/getFooter.php';

    $getFooter('dashboard');

    ?>