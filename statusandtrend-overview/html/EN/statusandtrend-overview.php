                    <section>
                        
                        <!-- state of logged user -->
                        <p>Total Cost: <span id = "valueCosts"></span>€</p>
                        <p>Total Advance: <span id = "valueAdvance"></span>€</p>
                        <p>Total Surplus Previous Years: <span id = "valueSurplusPreviousYears"></span>€</p>
                        <p>Total Current State: <span id = "valueCurrentState"></span>€</p>
                
                    </section>

                    <hr>
                    
                    <section id = "section-status-each-user">

                        <h5>Status of each member</h5>

                        <div class = "filter-box">
                            <p><span class = "filter-label">Filter</span></p>
                            
                            <p><span class = "underline">User:</span> <div class = "filter-username"><?php echo $lang[$user->getLanguage()]["OnlyActiveUser"]; ?></div></p>
                            
                             <!-- Refresh-button -->
                             <p><input type="button" class="button-refresh" id="button-refresh" value="Load"></p>
                        </div>

                        <div class = "table-box">
                        
                            <table class = "table-showcase">
                                <!-- header of table cost-->
                                <thead>
                                    <tr>

                                        <th>Username
                                            <input type="radio" class= "radio-icon-item" value="username DESC" name="status-each-user-order" id="s-radio1" checked>
                                            <label class="label-icon-item arrow" for="s-radio1"> &#8593; </label>

                                            <input type="radio" class= "radio-icon-item" value="username ASC" name="status-each-user-order" id="s-radio2">
                                            <label class="label-icon-item arrow" for="s-radio2"> &#8595; </label>  
                                        </th>

                                        <th>Current state</th>

                                        <th>Cost</th>

                                        <th>Advance</th>

                                        <th>Surplus previous years</th>

                                    </tr>

                                </thead>

                                <!-- body of table cost -->
                                <tbody class = "table-body-status">
                                
                                </tbody>

                            </table>

                        </div>

                        <p>
                            <input type = "button" class ="button-export-to-csv" value = "Export to CSV">
                        </p>

                    </section>
                    <!-- END STATUS SECTION -->


                    <hr>

                    <section id = "section-visualisation-each-user">

                        <h5>Trend and Cost-Portions of each member</h5>

                        <div class = "filter-box">
                            <p><span class = "filter-label">Filter</span></p>
                            
                            <p><span class = "underline">User:</span> <div  class = "filter-username"><?php echo $lang[$user->getLanguage()]["OnlyActiveUser"]; ?></div></p>
                            
                            <p><span class = "underline">Trend chart months intervall:</span> <div class = "months-back">/</div></p>
                            
                            <p><span class = "underline">Cost portion chart of year(s):</span> <div class = "filter-years">/</div></p>
                            
                            
                             <!-- Refresh-button -->
                             <p><input type="button" class="button-refresh" id="button-refresh" value="Load"></p>
                        </div>

                        <div class = "table-box">
                        
                            <table class = "table-showcase">
                                <!-- header of table cost-->
                                <thead>
                                    <tr>

                                        <th>Username
                                            <!-- sorting elements -->

                                            <!-- arrow up -->
                                            <input type="radio" class= "radio-icon-item" value="username DESC" name="visualisation-each-user-order" id="v-radio1" checked>
                                            <label class="label-icon-item arrow" for="v-radio1"> &#8593; </label>

                                            <!-- arrow down -->
                                            <input type="radio" class= "radio-icon-item" value="username ASC" name="visualisation-each-user-order" id="v-radio2">
                                            <label class="label-icon-item arrow" for="v-radio2"> &#8595; </label>  
                                        </th>

                                        <th>Trend</th>

                                        <th>Cost</th>

                                    </tr>

                                </thead>

                                <!-- body of table cost -->
                                <tbody class = "table-body-chart">
                                
                                </tbody>

                            </table>

                        </div>

                    </section>