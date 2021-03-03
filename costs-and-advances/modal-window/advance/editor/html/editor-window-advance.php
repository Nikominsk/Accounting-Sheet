<div id = "editor-window-advance" class = "modal">
    <div class="modal-window">

            <h3><?php echo $hlang[$user->getLanguage()]["changeadvanceid"]; ?> <span name = "advanceId"></span></h3>

            <table>
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
                <input type = "button" value = "<?php echo $hlang[$user->getLanguage()]["cancel"]; ?>" class = "button-cancel">
            </p>

    </div>
</div>