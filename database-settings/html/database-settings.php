                <section id = "section-category-add">

                    <h5><?php echo $hlang[$user->getLanguage()]["addcategory"]; ?></h5>

                    <form action = "" method = "POST">
                        <table class = "form">
                            <tr>
                                <td><?php echo $hlang[$user->getLanguage()]["category"]; ?></td>
                                <td><input type = "text" class = "inputs" name = "input-category"></td>
                                <td><input type = "button" value = "<?php echo $hlang[$user->getLanguage()]["add"]; ?>" name = "submit-category-add"></td>
                            </tr>
                        </table>
                    </form>

                </section>

                <section id = "section-category-remove">

                    <h5><?php echo $hlang[$user->getLanguage()]["remvcategory"]; ?></h5>

                        <form action = "" method = "POST" id = "form-category-remove">
                            <table class = "form">
                                <tr>
                                    <td><?php echo $hlang[$user->getLanguage()]["category"]; ?></td>
                                    <td>
                                        <select name = "select-categoryId">

                                        </select>
                                    </td>
                                    <td><input type = "submit" value = "<?php echo $hlang[$user->getLanguage()]["del"]; ?>" name = "submit-category-remove"></td>
                                </tr>
                            </table>
                        </form>

                    </section>