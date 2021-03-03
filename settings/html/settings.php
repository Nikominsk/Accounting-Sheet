                    <section id = "section-upload-profile-picture">

                        <h5><?php echo $hlang[$user->getLanguage()]["uploadprofileimg"]; ?></h5>

                        <table class = "form">
                            <tr>
                                <td><?php echo $hlang[$user->getLanguage()]["uploadpicture"]; ?></td>

                                <td>
                                    <label class="custom-file-upload">
                                        <input type="file" name="file" accept="image/*">
                                        <?php echo $hlang[$user->getLanguage()]["cimg"]; ?>
                                    </label>
                                </td>
                                <td><input type="submit" class="inputs" name="button-upload" value="<?php echo $hlang[$user->getLanguage()]["save"]; ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><input type="submit" class="inputs" name="button-remove" value="<?php echo $hlang[$user->getLanguage()]["deletecur"]; ?>"></td>
                            </tr>
                        </table>

                    </section>


                    <hr>

                    <section id = "language-section">

                        <h5><?php echo $hlang[$user->getLanguage()]["lang"]; ?></h5>

                        <table class = "form">
                            <tr>
                                <td><?php echo $hlang[$user->getLanguage()]["lang"]; ?></td>
                                <td class = "DE">
                                    <img id = "" src="https://img.icons8.com/offices/30/000000/checkmark.png">
                                    <input type = "submit" class="inputs" name = "button-change-language" value = "DE">
                                </td>
                                <td class = "EN">
                                    <img src="https://img.icons8.com/offices/30/000000/checkmark.png">
                                    <input type = "submit" class="inputs" name = "button-change-language" value = "EN">
                                </td>
                            </tr>
                        </table>

                    </section>

                    <hr>

                    <section id = "format-section">

                        <h5>Format</h5>

                        <table class = "form">
                            <tr>
                                <td>Format</td>
                                <td class = "de_DE">
                                    <img class = "checked-button" src="https://img.icons8.com/offices/30/000000/checkmark.png">
                                    <input type = "submit" class="inputs" name = "button-change-format" value = "DE">
                                </td>
                                <td class = "en_US">
                                    <img src="https://img.icons8.com/offices/30/000000/checkmark.png">
                                    <input type = "submit" class="inputs" name = "button-change-format" value = "EN">
                                </td>
                            </tr>
                        </table>

                    </section>

                    <hr>

                    <section id = "section-password-change">

                        <h5><?php echo $hlang[$user->getLanguage()]["changepswd"]; ?></h5>

                        <div>
                            <table class = "form">
                                <tr>
                                    <td><?php echo $hlang[$user->getLanguage()]["pswd"]; ?></td>
                                    <td><input type = "password" class="inputs" name = "input-password" autocomplete="new-password"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><?php echo $hlang[$user->getLanguage()]["newpswd"]; ?></td>
                                    <td><input type = "password" class="inputs" name = "input-password-new" autocomplete="new-password"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><?php echo $hlang[$user->getLanguage()]["newpswd"]; ?></td>
                                    <td><input type = "password" class="inputs" name = "input-password-new2" autocomplete="new-password"></td>
                                    <td><input type = "button" value = "<?php echo $hlang[$user->getLanguage()]["change"]; ?>" name = "button-password-change"></td>
                                </tr>
                            </table>
                        </div>

                    </section>


                    <section id = "section-account-delete">

                        <h5><?php echo $hlang[$user->getLanguage()]["delacc"]; ?></h5>

                            <table class = "form">
                                <tr>
                                    <td>Passwort</td>
                                    <td><input type = "password" class = "inputs" autocomplete= "off"  name = "input-password"></td>
                                    <td><input type = "button" value = "<?php echo $hlang[$user->getLanguage()]["del"]; ?>" name = "button-account-delete"></td>
                                </tr>
                            </table>

                    </section>