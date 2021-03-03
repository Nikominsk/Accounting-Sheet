<!-- START COST SECTION -->
<section id = "section-all-costs">

    <h5><?php echo $hlang[$user->getLanguage()]["costs"]; ?></h5>

    <div class = "filter-box">
        <p><span class = "filter-label">Filter:</span></p>
        <div class = "filter-container">

        </div></p>
    </div>

    <div class = "table-settings-bar">

        <div>
        <!-- Refresh-button -->
        <input type="button" class="button-refresh" value="<?php echo $hlang[$user->getLanguage()]["load"]; ?>">
        </div>

        <div class = "spacer">
        </div>

        <div class = "right-div">
            <label for="filter-options">Filter: </label>
            <select name="filter-options" id="filter-options">
                <option value="category"><?php echo $hlang[$user->getLanguage()]["category"]; ?></option>
                <option value="username"><?php echo $hlang[$user->getLanguage()]["username"]; ?></option>
                <option value="date"><?php echo $hlang[$user->getLanguage()]["date"]; ?></option>
                <option value="amount"><?php echo $hlang[$user->getLanguage()]["amount"]; ?></option>
                <option value="description"><?php echo $hlang[$user->getLanguage()]["description"]; ?></option>
            </select>
            <div class = "filter-content-container">

            </div>
            <input type = "button" class = "add-filter-item-button" value = "Ok">
        </div>
    </div>

    <div class = "table-box">

        <table class = "table-showcase">
            <!-- header of table cost-->
            <thead>
                <tr>
                    <th>
                        <div id = "costId-div" name = "costId">
                            <span class = "content"><?php echo $hlang[$user->getLanguage()]["costid"]; ?></span>
                            <span class = "sorting-img sorting_asc"></span>
                        </div>
                    </th>

                    <th>
                        <div id = "username-div" name = "username">
                            <span class = "content"><?php echo $hlang[$user->getLanguage()]["username"]; ?></span>
                            <span class = "sorting-img sorting_both"></span>
                        </div>
                    </th>

                    <th>
                        <div id = "travelId-div" name = "travelId">
                            <span class = "content"><?php echo $hlang[$user->getLanguage()]["travelid"]; ?></span>
                            <span class = "sorting-img sorting_both"></span>
                        </div>
                    </th>

                    <th>
                        <div id = "label-div" name = "label">
                            <span class = "content"><?php echo $hlang[$user->getLanguage()]["category"]; ?></span>
                            <span class = "sorting-img sorting_both"></span>
                        </div>
                    </th>

                    <th>
                        <div id = "date-div" name = "DATE(date)">
                            <span class = "content"><?php echo $hlang[$user->getLanguage()]["date"]; ?></span>
                            <span class = "sorting-img sorting_both"></span>
                        </div>
                    </th>

                    <th>
                        <div id = "amount-div" name = "amount">
                            <span class = "content"><?php echo $hlang[$user->getLanguage()]["amount"]; ?></span>
                            <span class = "sorting-img sorting_both"></span>
                        </div>
                    </th>

                    <th>
                        <div id = "description-div" name = "description">
                            <span class = "content"><?php echo $hlang[$user->getLanguage()]["description"]; ?></span>
                            <span class = "sorting-img sorting_both"></span>
                        </div>
                    </th>

                </tr>

            </thead>

            <!-- body of table cost -->
            <tbody class = "table-tbody-costs">


            </tbody>

        </table>

    </div>

    <p>
        <!-- here will be the output of the total costs of filtered categories -->
        <span class = "sum"><?php echo $hlang[$user->getLanguage()]["total"]; ?>: <span class = "total-costs">0</span>€</span>
        <input type = "button" class ="button-export-to-csv" value = "<?php echo $hlang[$user->getLanguage()]["exporttcsv"]; ?>">
    </p>

</section>
<!-- END COST SECTION -->

<hr>


<!-- START ADVANCE SECTION -->
<section id = "section-all-advances">

    <h5>Vorschuss</h5>

    <div class = "filter-box">
        <p><span class = "filter-label">Filter:</span></p>
        <div class = "filter-container">

        </div></p>
    </div>

    <div class = "table-settings-bar">

        <div>
        <!-- Refresh-button -->
        <input type="button" class="button-refresh" value="Laden">
        </div>

        <div class = "spacer">
        </div>

        <div class = "right-div">
            <label for="filter-options">Filter: </label>
            <select name="filter-options" id="filter-options">
                <option value="username"><?php echo $hlang[$user->getLanguage()]["username"]; ?></option>
                <option value="date"><?php echo $hlang[$user->getLanguage()]["date"]; ?></option>
                <option value="advance"><?php echo $hlang[$user->getLanguage()]["advance"]; ?></option>
            </select>
            <div class = "filter-content-container">

            </div>
            <input type = "button" class = "add-filter-item-button" value = "Ok">
        </div>
    </div>

    <div class = "table-box">

    <table class = "table-showcase">

        <!-- header of table advance -->
        <thead>
            <tr>

                <th>
                    <div id = "advanceId-div" name = "advanceId">
                        <span class = "content"><?php echo $hlang[$user->getLanguage()]["advanceid"]; ?></span>
                        <span class = "sorting-img sorting_asc"></span>
                    </div>
                </th>

                <th>
                    <div id = "username-div" name = "username">
                        <span class = "content"><?php echo $hlang[$user->getLanguage()]["username"]; ?></span>
                        <span class = "sorting-img sorting_both"></span>
                    </div>
                </th>

                <th>
                    <div id = "date-div" name = "date">
                        <span class = "content"><?php echo $hlang[$user->getLanguage()]["date"]; ?></span>
                        <span class = "sorting-img sorting_both"></span>
                    </div>
                </th>

                <th>
                    <div id = "advance-div" name = "advance">
                        <span class = "content"><?php echo $hlang[$user->getLanguage()]["advance"]; ?></span>
                        <span class = "sorting-img sorting_both"></span>
                    </div>
                </th>

            </tr>
        </thead>

        <!-- body of table advance -->
        <tbody class = "table-tbody-advance">

        </tbody>

    </table>
</div>

<p>
    <!-- here will be the output of the total advance -->
    <span class = "sum"><?php echo $hlang[$user->getLanguage()]["total"]; ?>: <span class = "total-advance">0</span>€</span>
    <input type = "button" class ="button-export-to-csv" value = "<?php echo $hlang[$user->getLanguage()]["exporttcsv"]; ?>">
</p>

</section>
<!-- END ADVANCE SECTION -->