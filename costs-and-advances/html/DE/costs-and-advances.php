<!-- START COST SECTION -->
<section id = "section-costs">

    <h5>Kosten</h5>

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

        <div class = "spacer"></div>

        <div class = "right-div">
            <label for="filter-options">Filter: </label>
            <select name="filter-options" id="filter-options">
                <option value="category">Kategorie</option>
                <option value="date">Datum</option>
                <option value="amount">Betrag</option>
                <option value="description">Beschreibung</option>
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
                            <span class = "content">KostenId</span>
                            <span class = "sorting-img sorting_asc"></span>
                        </div>
                    </th>

                    <th>
                        <div id = "travelId-div" name = "travelId">
                            <span class = "content">ReiseId</span>
                            <span class = "sorting-img sorting_both"></span>
                        </div>
                    </th>

                    <th>
                        <div id = "label-div" name = "label">
                            <span class = "content">Kategorie</span>
                            <span class = "sorting-img sorting_both"></span>
                        </div>
                    </th>

                    <th>
                        <div id = "date-div" name = "DATE(date)">
                            <span class = "content">Datum</span>
                            <span class = "sorting-img sorting_both"></span>
                        </div>
                    </th>

                    <th>
                        <div id = "amount-div" name = "amount">
                            <span class = "content">Betrag</span>
                            <span class = "sorting-img sorting_both"></span>
                        </div>
                    </th>

                    <th>
                        <div id = "description-div" name = "description">
                            <span class = "content">Beschreibung</span>
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

    <!-- here will be the output of the total costs of filtered categories -->
    <p>
        <span class = "sum">Summe: <span class = "total-costs">0</span>€</span>
        <input type = "button" class ="button-export-to-csv" value = "Export nach CSV">
    </p>

</section>
<!-- END COST SECTION -->

<hr>

<!-- START ADVANCE SECTION -->
<section id = "section-advance">

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

        <div class = "spacer"></div>

        <div class = "right-div">
            <label for="filter-options">Filter: </label>
            <select name="filter-options" id="filter-options">
                <option value="date">Datum</option>
                <option value="advance">Vorschuss</option>
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
                            <span class = "content">VorschussId</span>
                            <span class = "sorting-img sorting_asc"></span>
                        </div>
                    </th>

                    <th>
                        <div id = "date-div" name = "date">
                            <span class = "content">Datum</span>
                            <span class = "sorting-img sorting_both"></span>
                        </div>
                    </th>

                    <th>
                        <div id = "advance-div" name = "advance">
                            <span class = "content">Vorschuss</span>
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

    <!-- here will be the output of the total advance -->
    <p>
        <span class = "sum">Summe: <span class = "total-advance">0</span>€</span>
        <input type = "button" class ="button-export-to-csv" value = "Export nach CSV">
    </p>
</section>
<!-- END ADVANCE SECTION -->