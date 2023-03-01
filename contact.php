<?php
    include 'config.php';

    if(!empty($_SESSION["id"])){
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT * FROM zakaznik WHERE idZakaznika = $id");
        $row = mysqli_fetch_assoc($result);
        $email = $row["email"];
    } else {
        $email = "Zadaj email";
    }    

    if(isset($_POST["submit"])){
        require 'generateEmail.php';
        $email = $_POST["email"];
        $num = "Číslo objednávky: " . $_POST["num"];
        $reason = $_POST["reason"];
        sendRef($email, $num, $reason);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/header/headerS.css">
    <link rel="stylesheet" href="styles/footer/footer.css">
    <link rel="stylesheet" href="styles/contact/contact.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@400;700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Kontakt</title>
    <link rel="icon" type="image/png" href="media/logo/gprotect-01.svg"/>
</head>
<body>
    <?php include 'parts/header.php'; ?>
    
    <main>
        <h1>Kontakt</h1>
        <div class="border"></div>
        <div class="contactText">
            <p>Ak ste narazili na nejaký problém alebo tovar nespĺňa Vaše požiadavky neváhajte nás kontaktovať pomocou formuláru nižšie. Nižšie sú uvedené všetky potrebné údaje pre kontakt firmy GProtect a taktiež adresa spoločnosti kam je potrebné po schválení reklamácie poslať poškodený tovar.</p>
            <br>
            <p>Snažíme sa robiť všetko pre to aby každý kto si z našej firmy niečo objedná bol spokojný. Ak máte otázky priamo na spoločníka firmy zodpovedajúceho danému odboru nižšie sú uvedené všetky potrebné informácie.</p>
        </div>
        <div class="refund">
            <h2>Reklamácie</h2>
            <form action="" method="post">
                <div class="inputs">
                    <div class="top">
                        <label for="">Email:</label><br>
                        <input type="text" value="<?php echo $email;?>" name="email" required pattern="<?php echo $patternEmail; ?>" title="Formát emailu.">
                        <br>
                        <label for="">Číslo objednávky:</label><br>
                        <input type="num" name="num" required>
                    </div>
                    
                    <div class="bot">
                        <label for="">Dôvod reklamácie:</label><br>
                        <textarea name="reason" id="" cols="30" rows="10" required></textarea>
                    </div>
                </div>

                <button type="submit" name="submit">Reklamovať</button>

            </form>
        </div>

        <div class="company" id="contact">
            <h2>GProtect</h2>
        </div>

        <div class="data">
            <div class="singleData">
                <h3>Adresa spoločnosti</h3>
                <br>
                <a href="" class="fa fa-map-marker">Tehelná 7, Gelnica 056 01 <br> Slovenská republika <br> GPS:</a>
            </div>
            <div class="singleData">
                <h3>Kontaktné údaje</h3>
                <br>
                <a href="" class="fa fa-map-marker">Tehelná 7, Gelnica 056 01 <br> Slovenská republika <br> GPS:</a>
            </div>
            <div class="singleData">
                <h3>Fakturačné údaje</h3>
                <br>
                <a href="" class="fa fa-map-marker">Tehelná 7, Gelnica 056 01 <br> Slovenská republika <br> GPS:</a>
            </div>
        </div>

        <div class="partners">
            <div class="partner">Adam Timko - Správca</div>
            <div class="about">
                <p>"Som zodpovedný za správu inventára súčiastok a nástrojov, ktoré sú potrebné pre aplikovanie ochranných skiel mobilov. Udržiavam presný záznam o počte a stave jednotlivých súčiastok a nástrojov a zabezpečujem, aby boli vždy k dispozícii pre opravy a údržbu. Mám na starosti aj inventúru produktov a kontrolu jednotlivých objednávok. Zaznamenávam prichádzajúce a odchádzajúce položky, aby som mohol sledovať zásoby a v prípade potreby objednať nový tovar. Zabezpečujem, aby všetky položky boli správne uskladnené a aby bol sklad vždy dobre zásobený. Zabezpečujem údržbu a čistenie skladu. Starám sa o to, aby bol sklad vždy čistý a bezpečný."</p>
                <a href="">Tel.číslo: +421 918275521</a>
                <a href="">Email: adamtimko@gprotect.sk </a>
            </div>

            <div class="partner">Štefan Gejza - Mobilný technik</div>
            <div class="about">
                <p>"Opravujem mobilné telefóny a diagnostikujem rôzne problémy s hardvérom a softvérom. Nahrádzam poškodené súčiastky, ako sú displeje, batérie, reproduktory, mikrofóny a ďalšie, a tiež riešim problémy s operačným systémom, napríklad inštaláciou aktualizácií alebo odstraňovaním vírusov.Som schopný vykonávať testovanie mobilov po oprave, aby som sa uistil, že všetky problémy boli vyriešené a že mobil funguje správne. Tiež mám schopnosť vykonávať testy batérií a ďalších súčiastok, aby som predišiel budúcim problémom.Vykonávam údržbu a čistenie mobilov, aby som predišiel poškodeniu a problémom. Som oboznámený s rôznymi druhmi mobilov a mám znalosti o rôznych druhoch materiálov, aby som mohol poskytnúť najlepšiu starostlivosť pre mobilné telefóny."</p>
                <a href="">Tel.číslo: +421 912442684</a>
                <a href="">Email: stefangejza@gprotect.sk </a>
            </div>

            <div class="partner">Daniel Šoltis - Mobilný operátor</div>
            <div class="about">
                <p>"Dobrovoľne komunikujem s klientmi, aby som im mohol poskytnúť informácie o stave objednávky/opravy a zodpovedať ich otázky. Komunikujem s dodávateľmi a zákazníkmi ohľadom zásob a prípadných problémov. Som schopný riešiť reklamácie a sťažnosti, aby som zabezpečil spokojnosť zákazníkov. Som schopný vysvetliť zložité technické problémy v jednoduchom jazyku a pomôcť zákazníkom s výberom najlepšieho riešenia pre ich mobilný telefón. Mám na starosti propagovanie a starostlivosť o nových zákazníkov. Navrhujem rôzne tarify a balíky, ktoré umožňujú používať rôzne služby. Venujem sa aj možným spoluprácam s ľuďmi."</p>
                <a href="">Tel.číslo: +421 924998889</a>
                <a href="">Email: danielsoltis@gprotect.sk </a>
            </div>
        </div>

    </main>

    <?php include 'parts/footer.php'; ?>
</body>
<script src="javascript/main.js"></script>
</html>