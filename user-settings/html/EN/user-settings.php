                <section id = "section-username-add">

                    <h5>Username add</h5>

                        <form action = "" method = "POST">
                            <table class = "form">
                                <tr>
                                    <td>E-Mail</td>
                                    <td><input type = "text" class = "inputs" name = "input-email"></td>
                                    <td><input type = "submit" value = "Add" name = "submit-email-add"></td>
                                </tr>
                            </table>
                        </form>

                </section>


                <section id = "section-user-password-change">

                    <h5>User-Password change</h5>

                        <form action = "" method = "POST">
                            <table class = "form">
                                <tr>
                                    <td>Username</td>
                                    <td>
                                        <select class ="inputs" name = "select-userId">

                                        </select>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>New Password</td>
                                    <td><input type = "password" class = "inputs" name = "input-password" autocomplete="new-password"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>New Password</td>
                                    <td> <input type = "password" class = "inputs" name = "input-password2" autocomplete="new-password"></td>
                                    <td><input type = "submit" value = "Change" name = "submit-user-password-change"></td>
                                </tr>
                            </table>
                        </form>

                </section>


                <section id = "section-user-allow">

                    <h5>User allow</h5>

                        <form action = "" method = "POST">
                            <table class = "form">

                                <tr>
                                    <td>User allow</td>
                                    <td>

                                        <select class ="inputs" name = "select-userId">

                                        </select>
                                    </td>
                                    <td><input type = "submit" value = "Allow" name = "submit-user-allow"></td>
                                </tr>

                            </table>
                        </form>

                </section>


                <section id = "section-user-deny">

                    <h5>User deny</h5>

                    <form action = "" method = "POST">
                        <table class = "form">
                            <tr>
                                <td>Username</td>
                                <td>
                                    <select class ="inputs" name = "select-userId">

                                    </select>
                                </td>
                                <td><input type = "submit" value = "Deny" name = "submit-user-deny"></td>
                            </tr>
                        </table>
                    </form>

                </section>


                <section id = "section-user-remove">

                    <h5>User remove</h5>

                    <form action = "" method = "POST">
                        <table class = "form">
                            <tr>
                                <td>Username</td>
                                <td>
                                    <select class ="inputs" name = "select-userId">

                                    </select>
                                </td>
                                <td><input type = "submit" value = "Remove" name = "submit-user-remove"></td>
                            </tr>
                        </table>
                    </form>

                </section>

                <?php
                    if($user->getRankId() == 3) {
                        include('../user-settings/scripts/html/EN/section-rank-distribution.php');
                    }
                ?>