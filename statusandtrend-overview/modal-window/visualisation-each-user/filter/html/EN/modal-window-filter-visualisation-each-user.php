<div id = "modal-window-filter-visualisation-each-user" class = "modal">
    <div class="modal-window">

            <h3>Filter</h3>

            <table>
                <tr>
                    <td>User</td>
                    <td>

                        <select name ="select-user" size="3" multiple>
                            <option value = "ALL" ><?php echo $lang[$user->getLanguage()]["All"]; ?></option>
                            <option value = "ONLYACTIVES" selected><?php echo $lang[$user->getLanguage()]["OnlyActiveUser"]; ?></option>
                            <option value = "ONLYINACTIVES"><?php echo $lang[$user->getLanguage()]["OnlyInactiveUser"]; ?></option>
                            
                            <?php
                                //get data from table category
                                $sql = "SELECT userId, username FROM user";

                                $result = $db->query($sql);

                                //if no results
                                if ($result->num_rows == 0) {
                                    alertFailure($lang[$user->getLanguage()]["LoadError2"]);
                                } else {
                                    //list all categories
                                    while($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
                                        echo "<option value='$row[0]'>" . $row[1] . "</option>";

                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Trend chart months back</td>
                    <td>
                        <select name ="select-months-back" size="3">
                            <!-- output last 15 months -->
                            <?php
                                for($i = 1; $i < 15; $i++) {
                                    if($i == 6) {
                                        echo "<option selected>$i</option>";
                                    } else {
                                        echo "<option>$i</option>";
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Cost portion chart of year(s)</td>
                    <td>
                        <select name ="select-years" size="3" multiple>
                            <!-- output last 5 yrars -->
                            <?php
                                $curYear = date("Y");
                                echo "<option selected>$curYear</option>";

                                for($i = 0; $i < 4; $i++) {
                                    $curYear--;
                                    echo "<option>$curYear</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>

            </table>
    
            <p>
                <input type = "button" value = "Ok" class = "button-ok">     
            </p>

    </div>
</div>