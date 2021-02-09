                    <section>

                        <table class = "status-table">
                            <tr>
                                <th>Kosten</th>
                                <th>Vorschuss</th>
                                <th>Überschuss Vorjahren</th>
                                <th>Aktueller Stand</th>
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

                    <div id = "chart-wrapper">

                        <section id = "section-trend-chart">

                            <h5>Trend</h5>


                            <div class = "filter-box">
                                <p><span class = "filter-label">Filter</span></p>

                                <p><span class = "underline">Monat Intervall:</span> <div class = "months-back">/</div></p>

                                <!-- Refresh-button -->
                                <p><input type="button" class="button-refresh" value="Laden"></p>

                            </div>

                            <div class ="canvas-div">
                                <canvas class = "chart-trend" width="400" height="400"></canvas>
                            </div>

                        </section>


                        <section id = "section-cost-chart">

                            <h5>Kosten</h5>

                            <div class = "filter-box">
                                <p><span class = "filter-label">Filter</span></p>

                                <p><span class = "underline">Jahr:</span> <div class = "filter-years">/</div></p>

                                <!-- Refresh-button -->
                                <p><input type="button" class="button-refresh" value="Laden"></p>

                            </div>

                            <!--<div id = "color-portions"></div>-->

                            <div class ="canvas-div">
                                <canvas class = "chart-pie" width="400" height="400"></canvas>
                            </div>

                        </section>

                    </div>