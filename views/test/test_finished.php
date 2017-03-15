<h1 id="score">Sa said teoreetilise testi eest
    <mark class="orange"><?= $points; ?></mark>
    punkti.<br>
    <hr>
    <mark class="finish-p">Kokku saadakse punkte teoreetilise ja praktilise testi ning vestlusvooru eest! Praktilise
        testi tulemused saadakse teada hiljem. Automaatne suunamine avalehele toimub <span id="counter">15</span>
        sekundi pärast.
    </mark>
</h1>

<script>

    (function count(cc) {
        $('#counter').html(cc);
        if (cc > 0)
            setTimeout(function() { count(--cc); }, 1000);
    })(15);

</script>
