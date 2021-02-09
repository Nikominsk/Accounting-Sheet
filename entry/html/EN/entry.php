                    <section id = "accounting-input-section">
                        
                        <h5>Accounting</h5>

                        <div>
                            <table class = "form">
                                <tr>
                                    <td>TravelId</td>
                                    <td><input type = "text" class="inputs" autocomplete= "off" name = "input-travelId"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>
                                        <select name = "select-category">
                                            <option value='0'>choose category</option>

                                            <?php
                                                //get data from table category
                                                $sql = "SELECT * FROM category";

                                                $result = $db->query($sql);

                                                //if no results
                                                if ($result->num_rows == 0) {
                                                    alertFailure($lang[$user->getLanguage()]["LoadError1"]);
                                                } else {

                                                    $firstRow = mysqli_fetch_array($result,MYSQLI_NUM);

                                                    //list all categories
                                                    while($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
                                                        echo "<option value='$row[0]'>" . $row[1] . "</option>";

                                                    }

                                                    echo "<option value='$firstRow[0]'>" . $lang[$user->getLanguage()][$firstRow[1]] . "</option>";

                                                }
                                            ?>
           
                                        </select>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td><input type = "date" class="inputs" name = "input-date" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td><input type = "text" class="inputs" autocomplete= "off" name = "input-description"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Amount</td>
                                    <td><input type = "text" class="inputs" autocomplete= "off" name = "input-amount"></td>
                                    <td><input type = "button" value = "Save" name = "button-save"></td>
                                </tr>
                            </table> 
                        </div>

                    </section>

                    <hr>

                    <section id = "advance-input-section">

                        <h5>Advance</h5>

                        <div>
                            <table class = "form">
                                <tr>
                                    <td>Date</td>
                                    <td><input type = "date" class="inputs" autocomplete= "off" name = "input-date" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Advance</td>
                                    <td><input type = "text" class="inputs" autocomplete= "off"  name = "input-advance"></td>
                                    <td><input type = "button" value = "Save" id = "button-advance" name = "button-save"></td>
                                </tr>
                            </table> 
                        </div>

                    </section>