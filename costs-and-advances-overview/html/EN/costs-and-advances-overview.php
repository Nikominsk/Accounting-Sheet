<!-- START COST SECTION -->
<section id = "section-all-costs">

<h5>Costs</h5>

<div class = "filter-box">
    <p><span class = "filter-label">Filter</span></p>

    <p><span class = "underline">Date:</span> <div class = "filter-date">/</div></p>
    <p><span class = "underline">Category:</span> <div class = "filter-category"><?php echo $lang[$user->getLanguage()]["All"]; ?></div></p>
    <p><span class = "underline">User:</span> <div class = "filter-username"><?php echo $lang[$user->getLanguage()]["OnlyActiveUser"]; ?></div></p>

     <!-- Refresh-button -->
     <p><input type="button" class="button-refresh" value="Load"></p>
</div>

    <div class = "table-box">

        <table class = "table-showcase">
            <!-- header of table cost-->
            <thead>
                <tr>
                    <th>CostId
                        <input type="radio" class= "radio-icon-item" value="costId DESC" name="costOrder" id="c-radio1" checked>
                        <label class="label-icon-item arrow" for="c-radio1"> &#8593; </label>

                        <input type="radio" class= "radio-icon-item" value="costId ASC" name="costOrder" id="c-radio2">
                        <label class="label-icon-item arrow" for="c-radio2"> &#8595; </label>
                    </th>

                    <th>Username
                        <input type="radio" class= "radio-icon-item" value="username DESC" name="costOrder" id="c-radio3">
                        <label class="label-icon-item arrow" for="c-radio3"> &#8593; </label>

                        <input type="radio" class= "radio-icon-item" value="username ASC" name="costOrder" id="c-radio4">
                        <label class="label-icon-item arrow" for="c-radio4"> &#8595; </label>
                    </th>

                    <th>TravelId
                        <input type="radio" class= "radio-icon-item" value="travelId DESC" name="costOrder" id="c-radio5">
                        <label class="label-icon-item arrow" for="c-radio5"> &#8593; </label>

                        <input type="radio" class= "radio-icon-item" value="travelId ASC" name="costOrder" id="c-radio6">
                        <label class="label-icon-item arrow" for="c-radio6"> &#8595; </label>
                    </th>

                    <th>Category
                        <input type="radio" class= "radio-icon-item" value="label DESC" name="costOrder" id="c-radio7">
                        <label class="label-icon-item arrow" for="c-radio7"> &#8593; </label>

                        <input type="radio" class= "radio-icon-item" value="label ASC" name="costOrder" id="c-radio8">
                        <label class="label-icon-item arrow" for="c-radio8"> &#8595; </label>
                    </th>

                    <th>Date
                        <input type="radio" class= "radio-icon-item" value="DATE(date) DESC" name="costOrder" id="c-radio9">
                        <label class="label-icon-item arrow" for="c-radio9"> &#8593; </label>

                        <input type="radio" class= "radio-icon-item" value="DATE(date) ASC" name="costOrder" id="c-radio10">
                        <label class="label-icon-item arrow" for="c-radio10"> &#8595; </label>
                    </th>

                    <th>Amount
                        <input type="radio" class= "radio-icon-item" value="amount DESC" name="costOrder" id="c-radio11">
                        <label class="label-icon-item arrow" for="c-radio11"> &#8593; </label>

                        <input type="radio" class= "radio-icon-item" value="amount ASC" name="costOrder" id="c-radio12">
                        <label class="label-icon-item arrow" for="c-radio12"> &#8595; </label>
                    </th>

                    <th>Description
                        <input type="radio" class= "radio-icon-item" value="description DESC" name="costOrder" id="c-radio13">
                        <label class="label-icon-item arrow" for="c-radio13"> &#8593; </label>

                        <input type="radio" class= "radio-icon-item" value="description ASC" name="costOrder" id="c-radio14">
                        <label class="label-icon-item arrow" for="c-radio14"> &#8595; </label>
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
        <span class = "sum">Total: <span class = "total-costs">0</span>€</span>
        <input type = "button" class ="button-export-to-csv" value = "Export to CSV">
    </p>

</section>
<!-- END COST SECTION -->

<hr>


<!-- START ADVANCE SECTION -->
<section id = "section-all-advances">

<h5>Advance</h5>

<div class = "filter-box">
    <p><span class = "filter-label">Filter</span></p>

    <p><span class = "underline">Date:</span> <div class = "filter-date">/</div></p>
    <p><span class = "underline">User:</span> <div class = "filter-username"><?php echo $lang[$user->getLanguage()]["OnlyActiveUser"]; ?></div></p>

    <!-- Refresh-button -->
    <p><input type="button" class="button-refresh" value="Load"></p>
</div>

<div class = "table-box">

    <table class = "table-showcase">

        <!-- header of table advance -->
        <thead>
            <tr>
                <th>AdvanceId
                <input type="radio" class= "radio-icon-item" value="advanceId DESC" name="advanceOrder" id="a-radio1" checked>
                <label class="label-icon-item arrow" for="a-radio1"> &#8593; </label>

                <input type="radio" class= "radio-icon-item" value="advanceId ASC" name="advanceOrder" id="a-radio2">
                <label class="label-icon-item arrow" for="a-radio2"> &#8595; </label>
                </th>

                <th>Username
                <input type="radio" class= "radio-icon-item" value="username DESC" name="advanceOrder" id="a-radio3">
                <label class="label-icon-item arrow" for="a-radio3"> &#8593; </label>

                <input type="radio" class= "radio-icon-item" value="username ASC" name="advanceOrder" id="a-radio4">
                <label class="label-icon-item arrow" for="a-radio4"> &#8595; </label>
                </th>

                <th>Date
                <input type="radio" class= "radio-icon-item" value="DATE(date) DESC" name="advanceOrder" id="a-radio5">
                <label class="label-icon-item arrow" for="a-radio5"> &#8593; </label>

                <input type="radio" class= "radio-icon-item" value="DATE(date) ASC" name="advanceOrder" id="a-radio6">
                <label class="label-icon-item arrow" for="a-radio6"> &#8595; </label>
                </th>


                <th>Advance
                <input type="radio" class= "radio-icon-item" value="advance DESC" name="advanceOrder" id="a-radio7">
                <label class="label-icon-item arrow" for="a-radio7"> &#8593; </label>

                <input type="radio" class= "radio-icon-item" value="advance ASC" name="advanceOrder" id="a-radio8">
                <label class="label-icon-item arrow" for="a-radio8"> &#8595; </label>
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
    <span class = "sum">Total: <span class = "total-advance">0</span>€</span>
    <input type = "button" class ="button-export-to-csv" value = "Export to CSV">
</p>

</section>
<!-- END ADVANCE SECTION -->