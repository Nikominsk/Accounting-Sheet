


<div id = "sidemenu" class="expand">

    <div id = "nav-elements-wrapper">

        <ul id = "nav-elements-top">
            <li><a href = "../intern/entry">Eintrag</a></li>       <!-- Link to entry page -->
            <li><a href = "../intern/costs-and-advances">Kosten und Vorschüsse</a></li>      <!-- Link to overview page -->
            <li><a href = "../intern/statusandtrend">Stand und Trent</a></li>  <!-- Link to statusandtrend page -->

            <?php

                //if user is not a normal member
                if($user->getRankId() != 1) {
                    echo '
                        <li><a>Übersicht</a>
                        <ul id = "sub-ul">
                            <li><a href = "../intern/costs-and-advances-overview">Kosten und Vorschüsse</a></li>
                            <li><a href = "../intern/statusandtrend-overview">Stand und Trent</a></li>
                        </ul>
                        </li>
                    ';
                }

            ?>



        </ul>

        <ul id = "nav-elements-bottom">
            <li><a href = "../intern/software-info">Software Info</a></li>
        </ul>

    </div>

    <div id = "icon-nav-bar">
        ||
    </div>

</div>