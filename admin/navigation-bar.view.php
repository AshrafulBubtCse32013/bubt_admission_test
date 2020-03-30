<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true"
    data-img="assets/images/backgrounds/02.jpg">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo"
                        alt="Chameleon admin logo" src="assets/images/logo/logo.png" />
                    <h3 class="brand-text">Chameleon</h3>
                </a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="main-menu-content" id="accordion">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="main.php"><i class="ft-home"></i><span class="menu-title"
                        data-i18n="">Dashboard</span></a>
            </li>

            <li class="nav-item" id="headingOne">
                <a href="#" class="text-capitalize" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="la la-users"></i><span class="menu-title" data-i18n="">Manage students</span>
                </a>

                <ul class="collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
                    <li><a href="all_reg.php"><i class="la la-users" aria-hidden="true"></i>
                            <?php echo ucwords("  All students"); ?></a>
                    </li>
                    <li>
                        <a href="add_std.php"><i class="la la-user-plus" aria-hidden="true"></i>
                            <?php echo ucwords("  Add Student"); ?></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item" id="headingTwo">
                <a href="#" class="text-capitalize" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="la la-print"></i><span class="menu-title"
                        data-i18n=""><?php echo ucwords("print result"); ?></span>
                </a>

                <ul class="collapse show" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordion">
                    <li> <a href="allresultprint.php"><?php echo ucwords("All Results"); ?></a></li>
                    <li> <a href="group_result.php"><?php echo ucwords("Group Wise"); ?> </a></li>
                    <li> <a href="individual.php"><?php echo ucwords("Individual"); ?> </a></li>
                </ul>
            </li>


            <li class="nav-item" id="headingFive">
                <a href="#" class="text-capitalize" data-toggle="collapse" data-target="#collapseFive"
                    aria-expanded="true" aria-controls="collapseFive">
                    <i class="la la-question"></i><span class="menu-title"
                        data-i18n=""><?php echo ucwords("manage questions"); ?></span>
                </a>

                <ul class="collapse show" id="collapseFive" aria-labelledby="headingFive" data-parent="#accordion">
                    <li> <a href="all_question.php"><i class="la la-globe" aria-hidden="true"></i>
                            <?php echo ucwords("All questions"); ?></a></li>
                    <li> <a href="add_qus.php"><i class="la la-fighter-jet" aria-hidden="true"></i>
                            <?php echo ucwords("add question"); ?> </a></li>
                    <li> <a href="print_question.php"><i class="la la-fighter-jet" aria-hidden="true"></i>
                            <?php echo ucwords("Generate random Questions"); ?> </a></li>
                </ul>
            </li>

            <li class="nav-item" id="headingThree">
                <a href="#" class="text-capitalize" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="la la-star-o"></i><span class="menu-title"
                        data-i18n=""><?php echo ucwords("programs"); ?></span>
                </a>

                <ul class="collapse show" id="collapseThree" aria-labelledby="headingThree" data-parent="#accordion">
                    <li> <a href="all_program.php"><?php echo ucwords("All programs"); ?></a></li>
                    <li> <a href="add_program.php"><?php echo ucwords("add program"); ?> </a></li>
                </ul>
            </li>

            <li class="nav-item" id="headingFour">
                <a href="#" class="text-capitalize" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseFour">
                    <i class="la la-thumbs-up"></i><span class="menu-title"
                        data-i18n=""><?php echo ucwords("subjects"); ?></span>
                </a>

                <ul class="collapse show" id="collapseFour" aria-labelledby="headingFour" data-parent="#accordion">
                    <li> <a href="all_subject.php"><?php echo ucwords("All subjects"); ?></a></li>
                    <li> <a href="add_subject.php"><?php echo ucwords("add subject"); ?> </a></li>
                </ul>
            </li>

            <li>
                <a href="program_setup.php"> <i class="la la-cog" aria-hidden="true"></i> Question limit </a>
            </li>

            <!-- <li>
                <a href="result_upload.php"><i class="la la-upload" aria-hidden="true"></i> Upload Result </a>
            </li> -->
        </ul>
    </div>
    <div class="navigation-background"></div>
</div>