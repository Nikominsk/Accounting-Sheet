<div id = "modal-window-filter-status-each-user" class = "modal">
    <div class="modal-window">

            <h3>Filter</h3>

            <table>
                <tr>
                    <td>Benutzer</td>
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
            </table>
    
            <p>
                <input type = "button" value = "Ok" class = "button-ok">     
            </p>

    </div>
</div>