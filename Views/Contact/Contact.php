
<div class="card">
    <div id="error" style="display:none;"></div>
    <div id="success" style="display:none;"></div>
    <h2>Envoyer un e-mail</h2>
    <div class="card_content">
        <p>
            <label for="receiver">Destinataire : </label>
            <select id="receiver" name="receiver">
                <option value="rosalysfleurs@gmail.com">Fanny</option>
                <option value="postmaster@rosalys.fr">Administrateur du site</option>
            </select>
        </p>
        <p>
            <label for="subject">Sujet : </label>
            <input type="text" id="subject" />
        </p>
        <p>
            <label for="message">Message : </label>
            <textarea id="message" rows="10" cols="50"></textarea>
        </p>
    </div>
    <div class="card_navigation_100">
        <span id="send">Valider</span>
    </div>
</div>