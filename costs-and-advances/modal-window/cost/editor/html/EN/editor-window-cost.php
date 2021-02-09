<div id = "editor-window-cost" class = "modal">
    <div class="modal-window">

            <h3>Change entry of CostId <span name = "costId"></span></h3>

            <table>

                <tr>
                    <td>TravelId</td>
                    <td><input type = "text" class = "inputs" autocomplete= "off" name = "input-travelId"></td>
                </tr>
                    
                <tr>
                    <td>Category</td>
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
                    <td>Date</td>
                    <td><input type = "date" name = "input-date" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><input type = "text" class = "inputs" autocomplete= "off" name = "input-description"></td>
                </tr>
                <tr>
                    <td>Amount</td>
                    <td><input type = "text" class = "inputs" autocomplete= "off" name = "input-amount"></td>
                </tr>
               
            </table>
    
            <p class = "modal-inline-button">
                <input type = "button" value = "Save" class = "button-save">
                <input type = "button" value = "Remove" class = "button-remove">
                <input type = "button" value = "Cancel" class = "button-cancel">  
            </p>

    </div>
</div>