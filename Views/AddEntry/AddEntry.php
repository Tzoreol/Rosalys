<div id="formBox">
    <ul id="errorBox" style="display: none">
    </ul>
    <form id="addEntryForm" method="POST" action="<?php echo BASE_DIR ?>/AddEntry/Submit">
        <p>
            <label for="label">Description : </label><input type="text" id="label" name="label"/>
        </p>
        <p>
            <label for="entryType">Type : </label>
            <select id="entryType" name="entryType">
                <?php
                foreach($this->entryTypes as $entryType) { ?>
                    <option value="<?php echo $entryType->getIdEntryType() ?>"><?php echo $entryType->getLabel() ?></option><?php
                }
                ?>
            </select>
        </p>
        <p class="info">
            <label class="info">Encaissement</label>
        </p>
        <p>
            <label for="amount">Montant : </label><input type="number" min="0" id="amount" name="amount" step="0.01"/>
        </p>
        <input type="submit" value="Valider" />
    </form>
</div>