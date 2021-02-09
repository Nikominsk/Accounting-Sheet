<div id = "modal-window-filter-trend-chart" class = "modal">
    <div class="modal-window">

            <h3>Filter</h3>

            <table>
                <tr>
                    <td>Month Interval</td>
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
            </table>
    
            <p>
                <input type = "button" value = "Ok" class = "button-ok">     
            </p>

    </div>
</div>