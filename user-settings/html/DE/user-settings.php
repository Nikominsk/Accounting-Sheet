                <section id = "section-username-add">

                    <h5>Benutzername hinzufügen</h5>

                        <form action = "" method = "POST">
                            <table class = "form">
                                <tr>
                                    <td>E-Mail</td>
                                    <td><input type = "text" class = "inputs" name = "input-email"></td>
                                    <td><input type = "submit" value = "Hinzufügen" name = "submit-email-add"></td>
                                </tr>
                            </table>
                        </form>

                </section>


                <section id = "section-user-password-change">

                    <h5>Benutzer-Passwort ändern</h5>

                        <form action = "" method = "POST">
                            <table class = "form">
                                <tr>
                                    <td>Benutzername</td>
                                    <td>
                                        <select class ="inputs" name = "select-userId">

                                        </select>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Neues Passwort</td>
                                    <td><input type = "password" class = "inputs" name = "input-password" autocomplete="new-password"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Neues Passwort</td>
                                    <td> <input type = "password" class = "inputs" name = "input-password2" autocomplete="new-password"></td>
                                    <td><input type = "submit" value = "Ändern" name = "submit-user-password-change"></td>
                                </tr>
                            </table>
                        </form>

                </section>


                <section id = "section-user-allow">

                    <h5>Benutzer erlauben</h5>

                        <form action = "" method = "POST">
                            <table class = "form">

                                <tr>
                                    <td>Benutzer erlauben</td>
                                    <td>

                                        <select class ="inputs" name = "select-userId">

                                        </select>
                                    </td>
                                    <td><input type = "submit" value = "Erlauben" name = "submit-user-allow"></td>
                                </tr>

                            </table>
                        </form>

                </section>


                <section id = "section-user-deny">

                    <h5>Benutzer blockieren</h5>

                    <form action = "" method = "POST">
                        <table class = "form">
                            <tr>
                                <td>Benutzername</td>
                                <td>
                                    <select class ="inputs" name = "select-userId">

                                    </select>
                                </td>
                                <td><input type = "submit" value = "Blockieren" name = "submit-user-deny"></td>
                            </tr>
                        </table>
                    </form>

                </section>


                <section id = "section-user-remove">

                    <h5>Benutzer löschen</h5>

                    <form action = "" method = "POST">
                        <table class = "form">
                            <tr>
                                <td>Benutername</td>
                                <td>
                                    <select class ="inputs" name = "select-userId">

                                    </select>
                                </td>
                                <td><input type = "submit" value = "Löschen" name = "submit-user-remove"></td>
                            </tr>
                        </table>
                    </form>

                </section>

                <?php
                    if($user->getRankId() == 3) {
                        include('../user-settings/scripts/html/DE/section-rank-distribution.php');
                    }
                ?>