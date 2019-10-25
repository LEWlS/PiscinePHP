#!/usr/bin/php
<?php
if(!file_exists("private"))
    mkdir("private");
if(!file_exists("private/passwd"))
{
    $root = array(array(
        'login'=>'admin',
        'passwd'=>hash("whirlpool", 'password'),
        'admin'=> TRUE,
        'suspend' => FALSE
        ));
    $init = serialize($root);
	file_put_contents("private/passwd", $init);
$article = array(
				array(
					'name'		=> "Playstation 4",
					'price'		=> "399$",
					'categorie'	=> array('Jeux Video', 'Console'),
					'img'		=> "ps4.jpeg",
					'info'		=> "Sony PlayStation 4 Pro 1TB.<br> Plateforme: 
									PlayStation 4 Pro.<br> Couleur du produit: 
									Noir.<br> Mémoire interne: 8196 Mo.<br> Supports de 
									stockage: Disque dur.<br> Capacité de stockage 
									interne: 1000 Go.<br> Lecteur optique: 
									Blu-Ray/DVD.<br> LAN Ethernet : taux de transfert 
									des données: 10,100,1000 Mbit/s.<br> Standards wifi: 
									IEEE 802.11a,IEEE 802.11ac,IEEE 802.11b,IEEE 802.11g,IEEE 802.11n<br>
									Modèle du Bluetooth: 4.0 LE.<br> Consommation électrique typique: 310 W, 
									Tension d'entrée AC: 100 - 240 V.<br> Fréquence d'entrée AC: 50 - 60 Hz.<br>
									Poids: 3,3 kg, Largeur: 295 mm, Profondeur: 327 mm",
				),
				array(
					'name'		=> "velo",
					'price'		=> "499$",
					'categorie'	=> array('Jouet', 'Sport'),
					'img'		=> "velo.jpg",
					'info'		=> "Progressez avec un vélo polyvalent! Sa géométrie confort, son cadre en aluminium,
									 ses 2X8 vitesses et sa fourche carbone vous permettront de vous frotter à tous 
									 les types de parcours"
				),
				array(
					'name'		=> "Super Sparrow Bouteille d'eau en Acier",
					'price'		=> "15$",
					'categorie'	=> array('Voyage', 'Design'),
					'img'		=> "sparrow.jpg",
					'info'		=> "CONCEPTION DE QUALITÉ SUPÉRIEURE - La bouche 
									standard est idéale pour siroter et tout en restant accommodant des 
									glaçons. De plus, la sécurité est de la plus haute importance, car 
									les bouteilles sont fabriquées en plastique non toxique sans BPA et 
									en acier inoxydable 18/8 de qualité alimentaire.",
				),
				array(
					'name'		=> "COUNT 360° HD",
					'price'		=> "139$",
					'categorie'	=> array('Sport', 'Style'),
					'img'		=> "ski.jpg",
					'info'		=> "Masque de ski All-Moutain de haute qualité avec monture 
									ultra-fine Live Fit, Doté de la technologie HD et FDL, Pour toutes les 
									conditions de luminosité (VLT : 8-42 %), Protection 100 % UVA/UVB",
                ),
				array(
					'name'		=> "Bague",
					'price'		=> "999$",
					'categorie'	=> array('Bijoux','Luxe'),
					'img'		=> "bague.jpg",
					'info'		=> "Wllh c bo.",
				),
				array(
					'name'		=> "Bougie",
					'price'		=> "5$",
					'categorie'	=> array('Luxe','Maison'),
					'img'		=> "bougie.jpg",
					'info'		=> "wllh ca sen bon.",
				),
				array(
					'name'		=> "Lot de un Boullon",
					'price'		=> "0.5$",
					'categorie'	=> array('Luxe','Maison','Bricolage'),
					'img'		=> "Boulon.jpg",
					'info'		=> "En fait y'en a 4 pas pareil.",
				),
				array(
					'name'		=> "Lot de une Brique",
					'price'		=> "49$",
					'categorie'	=> array('Bricolage','Maison','Combat'),
					'img'		=> "brique.jpg",
					'info'		=> "Sous blister",
				),
				array(
					'name'		=> "Cannette de Coca chaude",
					'price'		=> "1$",
					'categorie'	=> array('Luxe','Maison','Food','Drink'),
					'img'		=> "coca.jpg",
					'info'		=> "Encore sous blister",
				),
				array(
					'name'		=> "Ville de Dunkerque",
					'price'		=> "0.50$",
					'categorie'	=> array('Drink','Territoire'),
					'img'		=> "dunkerk.jpg",
					'info'		=> "Plus personne n'en veut...",
				),
				array(
					'name'		=> "Kebab Frite",
					'price'		=> "5.50$",
					'categorie'	=> array('Food','Luxe'),
					'img'		=> "kebab.jpg",
					'info'		=> "'Meilleur Kebab de France' D'apres kebab-frite.com. Et c'est un pita-gyros.",
				),
				array(
					'name'		=> "Lichtenstein",
					'price'		=> "999999999$",
					'categorie'	=> array('Luxe','Lifestyle','Territoire'),
					'img'		=> "lich.png",
					'info'		=> "Sous blister, habitant non inclus",
				),
				array(
					'name'		=> "Montre permeable",
					'price'		=> "99$",
					'categorie'	=> array('Luxe'),
					'img'		=> "montre.jpg",
					'info'		=> "Ne pas mettre dans l'eau.",
				),
				array(
					'name'		=> "Ouvre Boîte",
					'price'		=> "5$",
					'categorie'	=> array('Combat','Bricolage'),
					'img'		=> "pied.jpg",
                    'info'		=> "Fonctionne aussi pour les bocaux",
				),
				array(
					'name'		=> "Terre",
					'price'		=> "38$",
					'categorie'	=> array('Jardin','Territoire'),
					'img'		=> "terre.jpg",
					'info'		=> "Terre de mon jardin, ne pas mâcher",
				),
				array(
					'name'		=> "Tube",
					'price'		=> "3$",
					'categorie'	=> array('Combat','Maison'),
					'img'		=> "tube.jpg",
					'info'		=> "Ne pas manger.",
				),
				array(
					'name'		=> "Kindle Paperwhite ",
					'price'		=> "109$",
					'categorie'	=> array('technologie'),
					'img'		=> "kindle.jpg",
					'info'		=> "Notre Kindle Paperwhite le plus fin et le 
									plus léger à ce jour : écran de 300 ppp sans reflets, se lit comme 
									une véritable page papier, même en plein soleil.",
                ),
                array(
					'name'		=> "Playstation 5",
					'price'		=> "399$",
					'categorie'	=> array('Jeux Video', 'Console'),
					'img'		=> "ps4.jpeg",
					'info'		=> "Sony PlayStation 4 Pro 1TB.<br> Plateforme: 
									PlayStation 4 Pro.<br> Couleur du produit: 
									Noir.<br> Mémoire interne: 8196 Mo.<br> Supports de 
									stockage: Disque dur.<br> Capacité de stockage 
									interne: 1000 Go.<br> Lecteur optique: 
									Blu-Ray/DVD.<br> LAN Ethernet : taux de transfert 
									des données: 10,100,1000 Mbit/s.<br> Standards wifi: 
									IEEE 802.11a,IEEE 802.11ac,IEEE 802.11b,IEEE 802.11g,IEEE 802.11n<br>
									Modèle du Bluetooth: 4.0 LE.<br> Consommation électrique typique: 310 W, 
									Tension d'entrée AC: 100 - 240 V.<br> Fréquence d'entrée AC: 50 - 60 Hz.<br>
									Poids: 3,3 kg, Largeur: 295 mm, Profondeur: 327 mm",
				),
				array(
					'name'		=> "velib",
					'price'		=> "499$",
					'categorie'	=> array('Jouet', 'Sport'),
					'img'		=> "velo.jpg",
					'info'		=> "Progressez avec un vélo polyvalent! Sa géométrie confort, son cadre en aluminium,
									 ses 2X8 vitesses et sa fourche carbone vous permettront de vous frotter à tous 
									 les types de parcours"
				),
				array(
					'name'		=> "Super mega Sparrow Bouteille d'eau en Acier",
					'price'		=> "15$",
					'categorie'	=> array('Voyage', 'Design'),
					'img'		=> "sparrow.jpg",
					'info'		=> "CONCEPTION DE QUALITÉ SUPÉRIEURE - La bouche 
									standard est idéale pour siroter et tout en restant accommodant des 
									glaçons. De plus, la sécurité est de la plus haute importance, car 
									les bouteilles sont fabriquées en plastique non toxique sans BPA et 
									en acier inoxydable 18/8 de qualité alimentaire.",
				),
				array(
					'name'		=> "COUNT 720° HD",
					'price'		=> "139$",
					'categorie'	=> array('Sport', 'Style'),
					'img'		=> "ski.jpg",
					'info'		=> "Masque de ski All-Moutain de haute qualité avec monture 
									ultra-fine Live Fit, Doté de la technologie HD et FDL, Pour toutes les 
									conditions de luminosité (VLT : 8-42 %), Protection 100 % UVA/UVB",
                ),
				array(
					'name'		=> "Bang",
					'price'		=> "999$",
					'categorie'	=> array('Bijoux','Luxe'),
					'img'		=> "bague.jpg",
					'info'		=> "Wllh c bo.",
				),
				array(
					'name'		=> "baton de lumierre",
					'price'		=> "5000000$",
					'categorie'	=> array('Luxe','Maison'),
					'img'		=> "bougie.jpg",
					'info'		=> "wllh ca sen bon.",
				),
				array(
					'name'		=> "Lot de 4 un Boullon",
					'price'		=> "0.5$",
					'categorie'	=> array('Luxe','Maison','Bricolage'),
					'img'		=> "Boulon.jpg",
					'info'		=> "En fait y'en a 4 pas pareil.",
				),
				array(
					'name'		=> "Brique rouge",
					'price'		=> "49$",
					'categorie'	=> array('Bricolage','Maison','Combat'),
					'img'		=> "brique.jpg",
					'info'		=> "Sous blister",
				),
				array(
					'name'		=> "Cannette de Coca chaude lite",
					'price'		=> "1$",
					'categorie'	=> array('Luxe','Maison','Food','Drink'),
					'img'		=> "coca.jpg",
					'info'		=> "Encore sous blister",
				),
				array(
					'name'		=> "jungle de Dunkerk",
					'price'		=> "0.50$",
					'categorie'	=> array('Drink','Territoire'),
					'img'		=> "dunkerk.jpg",
					'info'		=> "Plus personne n'en veut...",
				),
				array(
					'name'		=> "Kebab Frite algerienne",
					'price'		=> "5.50$",
					'categorie'	=> array('Food','Luxe'),
					'img'		=> "kebab.jpg",
					'info'		=> "\'Meilleur Kebab de France\' D'apres kebab-frite.com. Et c'est un pita-gyros.",
				),
				array(
					'name'		=> "Lichtenstein habitant",
					'price'		=> "999999999$",
					'categorie'	=> array('Luxe','Lifestyle','Territoire'),
					'img'		=> "lich.png",
					'info'		=> "Sous blister",
				),
				array(
					'name'		=> "Montre waterproof",
					'price'		=> "99$",
					'categorie'	=> array('Luxe'),
					'img'		=> "montre.jpg",
					'info'		=> "Ne pas mettre dans l'eau.",
				),
				array(
					'name'		=> "ferme Bouche",
					'price'		=> "5$",
					'categorie'	=> array('Combat','Bricolage'),
					'img'		=> "pied.jpg",
                    'info'		=> "Fonctionne aussi pour les bocaux",
				),
				array(
					'name'		=> "sol de jardin",
					'price'		=> "38$",
					'categorie'	=> array('Jardin','Territoire'),
					'img'		=> "terre.jpg",
					'info'		=> "Terre de mon jardin, ne pas mâcher",
				),
				array(
					'name'		=> "Tube en verre",
					'price'		=> "3$",
					'categorie'	=> array('Combat','Maison'),
					'img'		=> "tube.jpg",
					'info'		=> "Ne pas manger.",
				),
				array(
					'name'		=> "Kindle Paperwhite 2 ",
					'price'		=> "109$",
					'categorie'	=> array('technologie'),
					'img'		=> "kindle.jpg",
					'info'		=> "Notre Kindle Paperwhite le plus fin et le 
									plus léger à ce jour : écran de 300 ppp sans reflets, se lit comme 
									une véritable page papier, même en plein soleil.",
				)
			);
$article = serialize($article);	
$fp = fopen("private/article", "w+");
flock($fp, LOCK_EX | LOCK_SH);
file_put_contents("private/article", $article);
flock($fp, LOCK_UN);
fclose($fp);
$fp = fopen("private/commandes", "c+");
flock($fp, LOCK_EX | LOCK_SH);
$total = array(
    'quantity' => 'Quantity',
    'price' =>'Price',
    'login' => 'User'
);
$cmd = array(array($total));
$final = serialize($cmd);
file_put_contents("private/commandes", $final);
flock($fp, LOCK_UN);
fclose($fp);
echo 'OK' . PHP_EOL;
}
?>