
<?php 
function headertext() {
    $month = date("m") - 1;//created so it fits to array

    $monthNames = [
        "Januar",
        "Februar",
        "Marts",
        "April",
        "Maj",
        "Juni",
        "Juli",
        "August",
        "September",
        "Oktober",
        "Novermber",
        "December"
    ];

    $seasons = [
        "vinter",
        "forår",
        "sommer",
        "efterår"
    ];

    $seasonText = [
        ". Er din skøjter helt up-to-date til sæsonens sidste konkurrencer?",
        ". Skal du have nye skøjter klar til næste sæsons programmer?",
        ". Off-ice træning er i fuld gang. Vidste du, at vi også sælger in-line rulleskøjtehjul til at sætte under dine Edea støvler",
        ". Er du kommet godt i gang med sæsonen? Er dine skøjter klar til de første konkurrencer?"
    ];

    switch(true) {
        //winter
        case ($month == 11):
        case ($month <= 1):
            return "Det er {$monthNames[$month]} og dermed {$seasons[0]}{$seasonText[0]}";
            break;
        //spring
        case ($month <= 4):
            return "Det er {$monthNames[$month]} og dermed {$seasons[1]}{$seasonText[1]}";
            break;
        //summer
        case ($month <= 7):
            return "Det er {$monthNames[$month]} og dermed {$seasons[2]}{$seasonText[2]}";
            break;
        //faal
        case ($month <= 10):
            return "Det er {$monthNames[$month]} og dermed {$seasons[3]}{$seasonText[3]}";
            break;
        // default throws fail message
        default:
            return "ERROR: something went wrong";
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Edea skates</title>
</head>
<body class="<?php if(date("i") % 2 == 0) { ?>light<?php } else {?>dark<?php } ?>">
    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>
    
    <div class="content">

        <header>
            <p style="text-align: center; background-image: linear-gradient( hsl(0, 60%, 34%), #dd7878); color:hsl(39, 58%, 95%);">
                <?= 
                    
                   headertext(); 
                    
                ?>
            </p>
            <img src="<?php if (date("m") <= 6) {?>./img/edea-ice-skate-collection-2018.jpg<?php } else { ?>./img/edea-home-of-champions.jpg<?php } ?>" alt="Edea skates">
        </header>
        <main>
            <h1>Edea støvler - høj kvalitet til top præstationer!</h1>
            <section>
                <article>
                    <p>Kunstskøjteløbere har altid flyttet grænser, og de ønsker den nyeste teknologi til at hjælpe dem med dette. 
                    Edea's højt kvalificerede teknikere har fået feedback på, hvilke ønsker og krav skøjteløbere har til støvler. 
                    Dette, kombineret med den nyeste forskning, gør Edeas støvler både revolutionerende og af højeste kvalitet.</p>
                </article>
            </section>
            <section>
                <h2>Udvalgte produkter:</h2>
                <div class="products">
                    <article>
                        <img src="img/imagecomingsoon.png" alt="Edea skate">
                        <h3>Edea Flamenco Ice</h3>
                        <p>Antal stjerner: 6</p>
                        <p>Beskrivelse:</p>
                        <p>Flamenco Ice er fremstillet med henblik på den ynde og elegance, der kendetagner dansesporten.<br>Ved hjælp af Edeas mangeårige erfaring har vi lavet en støvle, som giver dansere fuld kontrol over deres skær og ekstra fleksibilitet med den lave støvle.<br>Den unikke indersål giver bedre føling med isen og stabilitet.</p>
                        <p>Stivhed: 70</p>
                        <p>Understøtter: Alle-danseniveauer</p>
                        <p>Pris: 2500,-</p>
                        <a href="showproduct.php"><button>Læs mere!</button></a>
                    </article>
                    <article>
                        <img src="img/piano-edea-skates.jpg" alt="Edea skate">
                        <h3>Edea Piano</h3>
                        <p>Antal stjerner: 6</p>
                        <p>Beskrivelse:</p>
                        <p>Kunstskøjteløbere forsøger altid at flytte grænserne, og med den nyeste teknologi er det nu blevet endnu lettere<br>Vores dygtige teknikere har med feedback fra verdens bedste skøjteløbere og med brug af den allernyeste teknologi skabt en helt unik ny støvle, Piano.<br>Edea Piano er 100% håndlavet italiensk design. Vores første støvle, der giver ekstra stabilitet, kraft og bevægelse med det dobbelte antichok system og revolutionære design.</p>
                        <p>Stivhed: 95</p>
                        <p>Understøtter: Triplespring Quadspring</p>
                        <p>Pris: 4500,-</p>
                        <a href="showproduct.php"><button>Læs mere!</button></a>
                    </article>
                    <article>
                        <img src="img/overture-edea-skates.jpg" alt="Edea skate">
                        <h3>Edea Overture</h3>
                        <p>Antal stjerner: 3</p>
                        <p>Beskrivelse:</p>
                        <p>Overture er en kombination af let design og Edea teknologi. Det er den mest solgte Edea støvle. Støvlen har stor støtte og fleksibilitet for kunstskøjteløbere, der arbejder på deres grundløb, enkeltspring og axel.<br>Overture er baseret på vores teknologisk viden om kunstskøjteløb på højt niveau og er baseret på vores passion for kunstskøjteløb.<br>Edea Overture er 100% håndlavet italiensk design. Støvlen er letvægtsdesign, som sikrer god responsivitet. Den giver en god fornemmelse for isen, som gør det lettere at udvikle det grundlæggende skøjteløb.</p>
                        <p>Stivhed: 48</p>
                        <p>Understøtter: Enkeltspring Axel</p>
                        <p>Pris: 1175,-</p>
                        <a href="showproduct.php"><button>Læs mere!</button></a>
                    </article>
                </div>
            </section>
        </main>

        <?php include "includes/footer.php"; ?>

    </div class="content">



</body>
</html>