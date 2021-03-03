                <section id = "section-username-add">

                    <h5><?php echo $hlang[$user->getLanguage()]["nameadd"]; ?></h5>

                        <form action = "" method = "POST">
                            <table class = "form">
                                <tr>
                                    <td>E-Mail</td>
                                    <td><input type = "text" class = "inputs" name = "input-email"></td>
                                    <td><input type = "submit" value = "<?php echo $hlang[$user->getLanguage()]["add"]; ?>" name = "submit-email-add"></td>
                                </tr>
                            </table>
                        </form>

                </section>


                <section id = "section-user-password-change">

                    <h5><?php echo $hlang[$user->getLanguage()]["userpswdchange"]; ?></h5>

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
                                    <td><?php echo $hlang[$user->getLanguage()]["newpswd"]; ?></td>
                                    <td><input type = "password" class = "inputs" name = "input-password" autocomplete="new-password"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><?php echo $hlang[$user->getLanguage()]["newpswd"]; ?></td>
                                    <td> <input type = "password" class = "inputs" name = "input-password2" autocomplete="new-password"></td>
                                    <td><input type = "submit" value = "<?php echo $hlang[$user->getLanguage()]["change"]; ?>" name = "submit-user-password-change"></td>
                                </tr>
                            </table>
                        </form>

                </section>


                <section id = "section-user-allow">

                    <h5><?php echo $hlang[$user->getLanguage()]["userallow"]; ?></h5>

                        <form action = "" method = "POST">
                            <table class = "form">

                                <tr>
                                    <td><?php echo $hlang[$user->getLanguage()]["userallow"]; ?></td>
                                    <td>

                                        <select class ="inputs" name = "select-userId">

                                        </select>
                                    </td>
                                    <td><input type = "submit" value = "<?php echo $hlang[$user->getLanguage()]["allow"]; ?>" name = "submit-user-allow"></td>
                                </tr>

                            </table>
                        </form>

                </section>


                <section id = "section-user-deny">

                    <h5><?php echo $hlang[$user->getLanguage()]["userdeny"]; ?></h5>

                    <form action = "" method = "POST">
                        <table class = "form">
                            <tr>
                                <td><?php echo $hlang[$user->getLanguage()]["username"]; ?></td>
                                <td>
                                    <select class ="inputs" name = "select-userId">

                                    </select>
                                </td>
                                <td><input type = "submit" value = "<?php echo $hlang[$user->getLanguage()]["deny"]; ?>" name = "submit-user-deny"></td>
                            </tr>
                        </table>
                    </form>

                </section>


                <section id = "section-user-remove">

                    <h5><?php echo $hlang[$user->getLanguage()]["userremv"]; ?></h5>

                    <form action = "" method = "POST">
                        <table class = "form">
                            <tr>
                                <td><?php echo $hlang[$user->getLanguage()]["username"]; ?></td>
                                <td>
                                    <select class ="inputs" name = "select-userId">

                                    </select>
                                </td>
                                <td><input type = "submit" value = "<?php echo $hlang[$user->getLanguage()]["remv"]; ?>" name = "submit-user-remove"></td>
                            </tr>
                        </table>
                    </form>

                </section>

                <?php
                    if($user->getRankId() == 3) {
                        include('../user-settings/scripts/html/section-rank-distribution.php');
                    }
                ?>