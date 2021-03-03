<hr>

<section id = "section-rank-distribution">

    <h5><?php echo $hlang[$user->getLanguage()]["rankdistb"]; ?></h5>

    <form action = "" method = "POST">
        <table class = "form">
            <tr>
                <td><?php echo $hlang[$user->getLanguage()]["username"]; ?></td>
                <td>
                    <select class ="inputs" name = "select-userId">

                    </select>
                </td>
                <td></td>
            </tr>
            <tr>
                <td><?php echo $hlang[$user->getLanguage()]["newrank"]; ?></td>
                <td>
                    <select name = "select-rankId">
                        <option value = "0"><?php echo $hlang[$user->getLanguage()]["crank"]; ?></option>

                        <?php
                            //get data from table category
                            $sql = "SELECT * FROM rank";

                            $result = $db->query($sql);

                            //if no results
                            if ($result->num_rows == 0) {
                                alertFailure($lang[$user->getLanguage()]["LoadError3"]);
                            } else {
                                //list all ranks
                                while($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
                                    echo "<option value='$row[0]'>" . $row[1] . "</option>";

                                }
                            }
                        ?>

                    </select>
                </td>
                <td><input type = "submit" value = "<?php echo $hlang[$user->getLanguage()]["give"]; ?>" name = "submit-rank-change"></td>
            </tr>
        </table>
    </form>

</section>