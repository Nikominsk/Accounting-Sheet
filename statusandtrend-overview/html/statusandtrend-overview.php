                    <section>

                        <table class = "status-table">
                            <tr>
                                <th><?php echo $hlang[$user->getLanguage()]["totalcosts"]; ?></th>
                                <th><?php echo $hlang[$user->getLanguage()]["totaladv"]; ?></th>
                                <th><?php echo $hlang[$user->getLanguage()]["totalsurplusprevyears"]; ?></th>
                                <th><?php echo $hlang[$user->getLanguage()]["totalcurstate"]; ?></th>
                            </tr>
                            <tr>
                                <td><span id = "valueCosts"></span>€</td>
                                <td><span id = "valueAdvance"></span>€</td>
                                <td><span id = "valueSurplusPreviousYears"></span>€</td>
                                <td><span id = "valueCurrentState"></span>€</td>
                            </tr>
                        </table>

                    </section>

                    <hr>

                    <section id = "section-status-each-user">

                        <h5><?php echo $hlang[$user->getLanguage()]["statusmembers"]; ?></h5>

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
                                    <option value="username"><?php echo $hlang[$user->getLanguage()]["username"]; ?></option>
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
                                            <div id = "username-div" name = "username">
                                                <span class = "content"><?php echo $hlang[$user->getLanguage()]["username"]; ?></span>
                                                <span class = "sorting-img sorting_asc"></span>
                                            </div>
                                        </th>

                                        <th><?php echo $hlang[$user->getLanguage()]["curstate"]; ?></th>

                                        <th><?php echo $hlang[$user->getLanguage()]["coststhisyear"]; ?></th>

                                        <th><?php echo $hlang[$user->getLanguage()]["advance"]; ?></th>

                                        <th><?php echo $hlang[$user->getLanguage()]["surplusprevyears"]; ?></th>

                                    </tr>

                                </thead>

                                <!-- body of table cost -->
                                <tbody class = "table-body-status">

                                </tbody>

                            </table>

                        </div>

                        <p>
                            <input type = "button" class ="button-export-to-csv" value = "<?php echo $hlang[$user->getLanguage()]["exporttcsv"]; ?>">
                        </p>

                    </section>
                    <!-- END STATUS SECTION -->


                    <hr>

                    <section id = "section-visualisation-each-user">

                        <h5><?php echo $hlang[$user->getLanguage()]["trendandcostportmembers"]; ?></h5>


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
                                    <option value="username"><?php echo $hlang[$user->getLanguage()]["username"]; ?></option>
                                    <option value="trenddia"><?php echo $hlang[$user->getLanguage()]["monthintvdia"]; ?></option>
                                    <option value="costdia"><?php echo $hlang[$user->getLanguage()]["costportofyears"]; ?></option>
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
                                            <div id = "username-div" name = "username">
                                                <span class = "content"><?php echo $hlang[$user->getLanguage()]["username"]; ?></span>
                                                <span class = "sorting-img sorting_asc"></span>
                                            </div>
                                        </th>

                                        <th>Trend</th>

                                        <th><?php echo $hlang[$user->getLanguage()]["costs"]; ?></th>

                                    </tr>

                                </thead>

                                <!-- body of table cost -->
                                <tbody class = "table-body-chart">

                                </tbody>

                            </table>

                        </div>

                    </section>