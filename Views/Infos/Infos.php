<div class="card">
    <h2>Zones de livraison</h2>
    <div id="zoneFinder">
        <input type="text" id="zoneFinder_input" placeholder="Entrez une adresse" /><i class="material-icons validate">check</i>
        <div id="result"></div>
    </div>
    <div class="card_content">
        <div id="map"></div>
    </div>
</div>
<div class="card">
    <h2>Horaires d'ouverture</h2>
    <div class="card_content">
        <p>
            <ul id="hours">
                <li><label>Lundi : </label> Ferm&eacute;</li>
                <li><label>Mardi : </label> 9h00 - 12h30 / 14h30 - 19h00</li>
                <li><label>Mercredi : </label> 9h00 - 12h30 / 14h30 - 19h00</li>
                <li><label>Jeudi : </label> 9h00 - 12h30 / 14h30 - 19h00</li>
                <li><label>Vendredi : </label> 9h00 - 12h30 / 14h30 - 19h30</li>
                <li><label>Samedi : </label> 9h00 - 19h30</li>
                <li><label>Dimanche : </label> 9h00 - 12h30</li>
            </ul>
        </p>
    </div>
</div>
<!-- Replace the value of the key parameter with your own API key. -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDJCN-rJZxurz_K8IUpVwVQO1_SIzS9XQ&callback=initMap" async defer></script>