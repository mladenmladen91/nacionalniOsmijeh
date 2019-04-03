<?php
$cssDir = "dist/css"; //folder where all CSS files live

//Link each page to its CSS file
$styles = [
    'vijesti.php' => ['tables.css'],
    'dashboard.php' => ['tables.css'],
    'donator.php' => ['form.css','show.css','tables.css'],
    'proizvod.php' => ['show.css','tables.css'],
    'postovi.php' => ['tables.css'],
    'evidencija.php' => ['tables.css'],
    'mailovi.php' => ['tables.css'],
    'volonteri.php' => ['tables.css'],
    'onama.php' => ['tables.css'],
    'proizvodi.php' => ['tables.css'],
    'kategorije.php' => ['tables.css'],
    'prijatelji.php' => ['tables.css'],
    'albumi.php' => ['tables.css'],
    'dodajVijest.php' => ['jquery-ui.min.css','form.css'],
    'dodajPost.php' => ['jquery-ui.min.css','form.css'],
    'dodajAlbum.php' => ['jquery-ui.min.css','form.css'],
    'dodajKategoriju.php' => ['form.css'],
    'dodajPodkategoriju.php' => ['form.css'],
    'dodajProizvod.php' => ['form.css'],
    'dodajDonatora.php' => ['jquery-ui.min.css','form.css'],
    'dodajPrijatelja.php' => ['form.css'],
    'izmijeniVijest.php' => ['jquery-ui.min.css','form.css'],
    'izmijeniPost.php' => ['jquery-ui.min.css','form.css'],
    'izmijeniAlbum.php' => ['jquery-ui.min.css','form.css'],
    'izmijeniKategoriju.php' => ['form.css'],
    'izmijeniPodkategoriju.php' => ['form.css'],
    'izmijeniPrijatelja.php' => ['form.css'],
    'izmijeniDonatora.php' => ['form.css'],
    'izmijeniDonaciju.php' => ['jquery-ui.min.css','form.css'],
    'izmijeniProizvod.php' => ['form.css'],
    'izmijeniOnama.php' => ['form.css'],
    'izmijeniProfil.php' => ['form.css'],
    'pregledVijesti.php' => ['show.css'],
    'pregledPosta.php' => ['show.css'],
    'pregledAlbuma.php' => ['show.css', 'form.css'],
    'donatori.php' => ['form.css', 'show.css', 'tables.css'],
    
];

foreach($styles as $key => $value) {
    if($key != $pageName) continue;
    foreach($value as $href)  {
?>

<link rel="stylesheet" type="text/css" href="<?php echo $cssDir.'/'.$href; ?>">
<!-- $pageName je iz naziva stranice -->

<?php
		}
	}
?>