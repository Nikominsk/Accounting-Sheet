<div id = "editor-window-all-cost" class = "modal">
    <div class="modal-window">

            <h3>Ändere Eintrag von <span name = "costId"></span></h3>

            <table>

                <tr>
                    <td>Name</td>
                    <td>
                        <select name = "select-username">
                            <option value = "0"><?php echo $lang[$user->getLanguage()]["ChooseUsername"]; ?></option>
                            
                            <?php
                                //get data from table category
                                $sql = "SELECT userId, username FROM user";

                                $result = $db->query($sql);

                                //if no results
                                if ($result->num_rows == 0) {
                                    alertFailure($lang[$user->getLanguage()]["LoadError2"]);
                                } else {
                                    //list all users
                                    while($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
                                        echo "<option value='$row[0]'>" . $row[1] . "</option>";

                                    }
                                }
                            ?>
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>ReiseId</td>
                    <td><input type = "text" class = "inputs" autocomplete= "off" name = "input-travelId"></td>
                </tr>  
                <tr>
                    <td>Kategorie</td>
                    <td>
                        <select name = "select-category">
                            <option value = "0"><?php echo $lang[$user->getLanguage()]["ChooseCategory"]; ?></option>
                            
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
                </tr>
                <tr>
                    <td>Datum</td>
                    <td><input type = "date" name = "input-date" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"></td>
                </tr>
                <tr>
                    <td>Beschreibung</td>
                    <td><input type = "text" class = "inputs" autocomplete= "off" name = "input-description"></td>
                </tr>
                <tr>
                    <td>Betrag</td>
                    <td><input type = "text" class = "inputs" autocomplete= "off" name = "input-amount"></td>
                </tr>
               
            </table>
    
            <p class = "modal-inline-button">
                <input type = "button" value = "Speichern" class = "button-save">
                <input type = "button" value = "Löschen" class = "button-remove">
                <input type = "button" value = "Abbrechen" onclick = "closeEditorWindowAllCosts()">  
            </p>

    </div>
</div>