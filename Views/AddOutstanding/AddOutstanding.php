<div id="formBox">
    <ul id="errorBox" style="display: none">
    </ul>
    <form id="outstandingForm" method="POST" action="<?php echo BASE_DIR ?>/Outstanding/Submit">
        <p>
            <label for="supplierName">Nom fournisseur : </label><input type="text" id="supplierName" name="supplierName" required/>
        <p>
            <label for="purchaseDate">Date d'achat : </label><input type="date" id="purchaseDate" name="purchaseDate" required/>
        </p>
        <p>
            <label for="limitDate">Date limite de paiement : </label><input type="date" id="limitDate" name="limitDate" required/>
        </p>
        <p>
            <label for="amount">Montant : </label><input type="number" min="0" id="amount" name="amount" step="0.01" required/>
        </p>
        <input type="submit" value="Valider" />
    </form>
</div>