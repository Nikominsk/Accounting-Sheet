                    <section>

                        <table class = "status-table">
                            <tr>
                                <th>Gesamtkosten</th>
                                <th>Gesamtvorschuss</th>
                                <th>Gesamtvorschuss Vorjahren</th>
                                <th>Gesamter aktueller Stand</th>
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

                        <h5>Stand der Mitarbeiter</h5>

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
                                    <option value="username">Name</option>
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
                                                <span class = "content">Name</span>
                                                <span class = "sorting-img sorting_asc"></span>
                                            </div>
                                        </th>

                                        <th>Aktueller Stand</th>

                                        <th>Kosten</th>

                                        <th>Vorschuss</th>

                                        <th>Vorschuss Vorjahren</th>

                                    </tr>

                                </thead>

                                <!-- body of table cost -->
                                <tbody class = "table-body-status">

                                </tbody>

                            </table>

                        </div>

                        <p>
                            <input type = "button" class ="button-export-to-csv" value = "Export nach CSV">
                        </p>

                    </section>
                    <!-- END STATUS SECTION -->


                    <hr>

                    <section id = "section-visualisation-each-user">

                        <h5>Trend und Kosten-Aufteilung der Mitarbeiter</h5>

                        <div class = "filter-box">
                            <p><span class = "filter-label">Filter</span></p>

                            <p><span class = "underline">Benutzer:</span> <div  class = "filter-username"><?php echo $lang[$user->getLanguage()]["OnlyActiveUser"]; ?></div></p>

                            <p><span class = "underline">Trend-Diagramm Monat Intervall:</span> <div class = "months-back">/</div></p>

                            <p><span class = "underline">Kosten-Aufteilung-Diagramm von Jahr(en):</span> <div class = "filter-years">/</div></p>


                             <!-- Refresh-button -->
                             <p><input type="button" class="button-refresh" id="button-refresh" value="Laden"></p>
                        </div>

                        <div class = "table-box">

                            <table class = "table-showcase">
                                <!-- header of table cost-->
                                <thead>
                                    <tr>

                                        <th>Name
                                            <!-- sorting elements -->

                                            <!-- arrow up -->
                                            <input type="radio" class= "radio-icon-item" value="username DESC" name="visualisation-each-user-order" id="v-radio1" checked>
                                            <label class="label-icon-item arrow" for="v-radio1"> &#8593; </label>

                                            <!-- arrow down -->
                                            <input type="radio" class= "radio-icon-item" value="username ASC" name="visualisation-each-user-order" id="v-radio2">
                                            <label class="label-icon-item arrow" for="v-radio2"> &#8595; </label>
                                        </th>

                                        <th>Trend</th>

                                        <th>Kosten</th>

                                    </tr>

                                </thead>

                                <!-- body of table cost -->
                                <tbody class = "table-body-chart">

                                </tbody>

                            </table>

                        </div>

                    </section>