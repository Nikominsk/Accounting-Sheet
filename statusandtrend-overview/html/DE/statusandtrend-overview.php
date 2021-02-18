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

                                        <th>Kosten (dieses Jahr)</th>

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
                                    <option value="trenddia">Trend-Diagramm Monat Intervall</option>
                                    <option value="costdia">Kosten-Aufteilung-Diagramm von Jahr(en)</option>
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