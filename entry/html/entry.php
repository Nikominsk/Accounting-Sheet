                    <section id = "accounting-input-section">

                        <h5><?php echo $hlang[$user->getLanguage()]["costs"]; ?></h5>

                        <div>
                            <table class = "form">
                                <tr>
                                    <td><?php echo $hlang[$user->getLanguage()]["travelid"]; ?></td>
                                    <td><input type = "text" class="inputs" autocomplete= "off" name = "input-travelId"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><?php echo $hlang[$user->getLanguage()]["category"]; ?></td>
                                    <td>
                                        <select name = "select-category">
                                            <option value='0'><?php echo $hlang[$user->getLanguage()]["ccategory"]; ?></option>
                                            <?php
                                                include('../utils/php/Category.php');
                                            ?>
                                        </select>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><?php echo $hlang[$user->getLanguage()]["date"]; ?></td>
                                    <td><input type = "date" class="inputs" name = "input-date" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><?php echo $hlang[$user->getLanguage()]["description"]; ?></td>
                                    <td><input type = "text" class="inputs" autocomplete= "off" name = "input-description"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><?php echo $hlang[$user->getLanguage()]["amount"]; ?></td>
                                    <td><input type = "text" class="inputs" autocomplete= "off" name = "input-amount"></td>
                                    <td><input type = "button" value = "<?php echo $hlang[$user->getLanguage()]["save"]; ?>" name = "button-save"></td>
                                </tr>
                            </table>
                        </div>

                    </section>

                    <hr>

                    <section id = "advance-input-section">

                        <h5><?php echo $hlang[$user->getLanguage()]["advance"] ?></h5>

                        <div>
                            <table class = "form">
                                <tr>
                                    <td><?php echo $hlang[$user->getLanguage()]["date"] ?></td>
                                    <td><input type = "date" class="inputs" autocomplete= "off" name = "input-date" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><?php echo $hlang[$user->getLanguage()]["advance"] ?></td>
                                    <td><input type = "text" class="inputs" autocomplete= "off"  name = "input-advance"></td>
                                    <td><input type = "button" value = "<?php echo $hlang[$user->getLanguage()]["save"] ?>" id = "button-advance" name = "button-save"></td>
                                </tr>
                            </table>
                        </div>

                    </section>