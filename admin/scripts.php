<?php

$scripts = [
    'dodajVijest.php' => ['jquery-ui.min.js','dodajVijest.js'],
    'dodajPost.php' => ['jquery-ui.min.js','dodajVijest.js'],
    'dodajAlbum.php' => ['jquery-ui.min.js','dodajAlbum.js'],
    'dodajDonatora.php' => ['jquery-ui.min.js','dodajDonatora.js'],
    'izmijeniVijest.php' => ['jquery-ui.min.js','izmijeniVijest.js'],
    'izmijeniPost.php' => ['jquery-ui.min.js','izmijeniVijest.js'],
    'izmijeniAlbum.php' => ['jquery-ui.min.js','izmijeniAlbum.js'],
    'izmijeniDonatora.php' => ['izmijeniDonatora.js'],
    'izmijeniDonaciju.php' => ['jquery-ui.min.js','izmijeniDonaciju.js'],
    'izmijeniProfil.php' => ['izmijeniProfil.js'],
    'pregledAlbuma.php' => ['pregledFotografija.js'],
    'vijesti.php' => ['tabeleVijesti.js'],
    'postovi.php' => ['tabeleVijesti.js'],
    'proizvod.php' => ['tabelePodkategorija.js'],
    'albumi.php' => ['tabeleAlbum.js'],
    'kategorije.php' => ['tabeleKategorije.js'],
    'dodajKategoriju.php' => ['dodajKategoriju.js'],
    'izmijeniKategoriju.php' => ['izmijeniKategoriju.js'],
    'dodajPodkategoriju.php' => ['dodajPodkategoriju.js'],
    'izmijeniPodkategoriju.php' => ['izmijeniPodkategoriju.js'],
    'proizvodi.php' => ['tabeleProizvod.js'],
    'dodajProizvod.php' => ['dodajProizvod.js'],
    'izmijeniProizvod.php' => ['izmijeniProizvod.js'],
    'donatori.php' => ['tabeleDonatori.js'],
    'izmijeniDonatora.php' => ['jquery-ui.min.js','izmijeniDonatora.js'],
    'prijatelji.php' => ['tabelePrijatelji.js'],
    'dodajPrijatelja.php' => ['dodajPrijatelja.js'],
    'izmijeniPrijatelja.php' => ['izmijeniPrijatelja.js'],
    'izmijeniOnama.php' => ['izmijeniOnama.js'],
    'mailovi.php' => ['tabeleMailovi.js'],
    'volonteri.php' => ['tabeleVolonteri.js'],
    'izmijeniProfil.php' => ['izmijeniProfil.js'],
    'dashboard.php' => ['tabeleDashboard.js'],
    'donator.php' => ['tabeleDonator.js'],
    'evidencija.php' => ['tabeleEvidencija.js'],
];

foreach($scripts as $key => $value) {
	if($key != $pageName) continue;
    foreach($value as $href) {
?>

<script type="text/javascript"  src="<?php echo 'dist/js/'.$href; ?>" ></script>

<?php
		}
	}
?>