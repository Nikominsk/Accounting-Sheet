                    <section>

                        <table class = "status-table">
                            <tr>
                                <th><?php echo $hlang[$user->getLanguage()]["costs"]; ?></th>
                                <th><?php echo $hlang[$user->getLanguage()]["advance"]; ?></th>
                                <th><?php echo $hlang[$user->getLanguage()]["surpprevyears"]; ?></th>
                                <th><?php echo $hlang[$user->getLanguage()]["curstate"]; ?></th>
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

                                <p><span class = "underline"><?php echo $hlang[$user->getLanguage()]["monthintv"]; ?>:</span> <div class = "months-back">/</div></p>

                                <!-- Refresh-button -->
                                <p><input type="button" class="button-refresh" value="<?php echo $hlang[$user->getLanguage()]["load"]; ?>"></p>

                            </div>

                            <div class ="canvas-div">
                                <canvas class = "chart-trend" width="400" height="400"></canvas>
                            </div>

                        </section>


                        <section id = "section-cost-chart">

                            <h5><?php echo $hlang[$user->getLanguage()]["costs"]; ?></h5>

                            <div class = "filter-box">
                                <p><span class = "filter-label">Filter</span></p>

                                <p><span class = "underline"><?php echo $hlang[$user->getLanguage()]["year"]; ?>:</span> <div class = "filter-years">/</div></p>

                                <!-- Refresh-button -->
                                <p><input type="button" class="button-refresh" value="<?php echo $hlang[$user->getLanguage()]["load"]; ?>"></p>

                            </div>

                            <!--<div id = "color-portions"></div>-->

                            <div class ="canvas-div">
                                <canvas class = "chart-pie" width="400" height="400"></canvas>
                            </div>

                        </section>

                    </div>