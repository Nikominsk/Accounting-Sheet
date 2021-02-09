<div id = "modal-window-filter-all-advance" class = "modal">
    <div class="modal-window">

            <h3>Filter</h3>

            <table>

                <tr>
                    <td>von</td>
                    <td><input type = "date" class="inputs" name = "input-date-from" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"> </td>
                </tr>

                <tr>
                    <td>bis</td>
                    <td><input type = "date" class="inputs" name = "input-date-to" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"> </td>
                </tr>

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