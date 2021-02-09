                    <section>
                        
                        <!-- state of logged user -->
                        <p>Cost: <span id = "valueCosts"></span>€</p>
                        <p>Advance: <span id = "valueAdvance"></span>€</p>
                        <p>Surplus Previous Years: <span id = "valueSurplusPreviousYears"></span>€</p>
                        <p>Current State: <span id = "valueCurrentState"></span>€</p>
                
                    </section>

                    <hr>

                    <div id = "chart-wrapper">

                        <section id = "section-trend-chart">

                            <h5>Trend</h5>


                            <div class = "filter-box">
                                <p><span class = "filter-label">Filter</span></p>
                                
                                <p><span class = "underline">Month Interval:</span> <div class = "months-back">/</div></p>

                                <!-- Refresh-button -->
                                <p><input type="button" class="button-refresh" value="Load"></p>
                                    
                            </div>

                            <div class ="canvas-div">
                                <canvas class = "chart-trend" width="400" height="400"></canvas>
                            </div>

                        </section>
                        

                        <section id = "section-cost-chart">
                                
                            <h5>Costs</h5>

                            <div class = "filter-box">
                                <p><span class = "filter-label">Filter</span></p>
                                
                                <p><span class = "underline">Year:</span> <div class = "filter-years">/</div></p>

                                <!-- Refresh-button -->
                                <p><input type="button" class="button-refresh" value="Load"></p>
                                    
                            </div>

                            <!--<div id = "color-portions"></div>-->

                            <div class ="canvas-div">
                                <canvas class = "chart-pie" width="400" height="400"></canvas>
                            </div>

                        </section>
                            
                    </div>