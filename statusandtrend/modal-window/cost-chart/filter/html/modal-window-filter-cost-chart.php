<div id = "modal-window-filter-cost-chart" class = "modal">
    <div class="modal-window">

            <h3>Filter</h3>

            <table>
                <tr>
                    <td><?php echo $hlang[$user->getLanguage()]["year"]; ?></td>
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