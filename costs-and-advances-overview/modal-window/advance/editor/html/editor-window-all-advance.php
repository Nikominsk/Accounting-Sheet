<div id = "editor-window-all-advance" class = "modal">
    <div class="modal-window">

            <h3><?php echo $hlang[$user->getLanguage()]["changeadvanceid"]; ?> <span name = "advanceId"></span></h3>

            <table>
                <tr>
                    <td><?php echo $hlang[$user->getLanguage()]["username"]; ?></td>
                    <td>
                        <select name = "select-username">
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
                    <td><?php echo $hlang[$user->getLanguage()]["date"]; ?></td>
                    <td><input type = "date" name = "input-date" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"></td>
                </tr>
                <tr>
                    <td><?php echo $hlang[$user->getLanguage()]["advance"]; ?></td>
                    <td><input type = "text" class = "inputs" autocomplete= "off" name = "input-advance"></td>
                </tr>
            </table>

            <p class = "modal-inline-button">
                <input type = "button" value = "<?php echo $hlang[$user->getLanguage()]["save"]; ?>" class = "button-save">
                <input type = "button" value = "<?php echo $hlang[$user->getLanguage()]["del"]; ?>" class = "button-remove">
                <input type = "button" value = "<?php echo $hlang[$user->getLanguage()]["cancel"]; ?>" onclick = "closeEditorWindowAllAdvances()">
            </p>

    </div>
</div>