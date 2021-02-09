
<header>

    <div id = "sidemenu-opener"><span class = "icon-nav">&#9776;</span></div>

    <div id = "brand"><a href = "entry.php">Accounting-Sheet</a></div>    <!-- Logo + Link to entry page (if logo get clicked) -->

    <div id = "profile">

        <div>
            <span id = "label-username"><?php echo $user->getName(); ?></span>
            <?php
                if($user->getProfilePicName() != NULL) {
                    echo    "<div id = 'profile-pic-wrapper'>
                                <img src='../utils/css/img/profile_img/".$user->getProfilePicName()."' />
                            </div>";
                } else {
                    echo    "<div class='icon-user'></div>";
                }
            ?>
        </div>

        <div id = "profile-menu">

            <div id = "label-signed-name">Signed in as <span id = "label-response-username"><?php echo $user->getName(); ?></span></div>

            <a href = "../intern/settings.php">Settings</a>

            <?php
                //if user is not a normal member
                if($user->getRankId() != 1) {
                    echo '<a href = "../intern/user-settings.php">User Settings</a>';
                }

                //if user has highest rank
                if($user->getRankId() == 3) {
                    echo '<a href = "../intern/database-settings.php">Database Settings</a>';
                }

            ?>

            <a href = "../index.php" id = "logout-label">Logout</a>
        </div>

    </div>

</header>