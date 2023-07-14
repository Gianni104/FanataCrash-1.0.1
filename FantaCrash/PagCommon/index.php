<?php
include "../DataBase/DB_Rank.php";
include "../DataBase/DB_Monte.php";
include "../DataBase/DB_Voto.php";
include "../DataBase/DB_Address.php";

$accessi = 0;
$incidenti = 0;
$montepremi = 0;

$orario = date('Y-m-d H:i:s');
$indirizzo = $_SERVER['REMOTE_ADDR'];
$_SESSION['error']=insertdataLOG($_SESSION["nome"], $_SESSION["pass"], $orario, $indirizzo);

$records = getdataR();

if(isset($records )){
    foreach( $records as $row ) {
        $incidenti += $row->incidenti;
    }
}

unset($records);

$records = getdataMon();

if(isset($records)){
    foreach($records as $row){
        $montepremi += $row->importo;
    }
}

unset($records);

$records = getdataA();

if(isset($records)){
    foreach($records as $row){  
        if($accessi<$row->id){
            $accessi = $row->id;
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">    

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="icon" href="img/Loghi/Nanoso_Limited.png">
    <title>PagRegole</title>
</head>

<body class="overflow">
    <div class="d-flex" id="wrapper" >
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <i class="fas fa-car-crash me-2"></i>FANTACRASH</div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fa-sharp fa-solid fa-pen-ruler me-2"></i>Regole</a>
                <a href="card_new.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-sharp fa-solid fa-newspaper me-2"></i>Card</a>
                <a href="classifica.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-sharp fa-solid fa-ranking-star me-2"></i></i>Classifica</a>
                <a href="pagamenti.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-sharp fa-solid fa-money-bill-wave me-2"></i>Pagamenti</a>
                <a href="../" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Regole</h2>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="../">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                    <?php
                                        $players = 0;
                                        $records = getdataVoto();
                                        foreach($records as $row){
                                            if(isset($row->id)){
                                                $players++;
                                            }
                                        }
                                        echo($players);
                                    ?>
                                </h3>
                                <p class="fs-5">Partecipanti</p>
                            </div>
                            <i class="fas fa-users-rectangle fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">€ <?php echo("$montepremi"); ?></h3>
                                <p class="fs-5">Montepremi</p>
                            </div>
                            <i
                                class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo("$incidenti"); ?></h3>
                                <p class="fs-5">Incidenti</p>
                            </div>
                            <i class="fas fa-burst fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>  

                <div class="container d-flex justify-content-center align-items-start min-vh-100">
                    <div class="row border rounded-5 p-3 bg-white shadow box-area mx-4" style="margin-top:70px">
                    
                        <div class="col-md-6 right-box border-end" >
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <h3 class="text-uppercase ">Regola N^1</h3>
                                </li>
                                <li class="mb-5">
                                    <p class="fs-4 fw-light" data-bs-toggle="tooltip" data-bs-title="-LA PARTECIPAZIONE ALLA GARA RICHIEDE UN VERSAMENTO DI 2€ PER OGNI GIOCATORE SI PREGA DI FARE RIFERIMENTO AI CASI SOTTOSTANTI PER EVENTUALI MODIFICHE ALL'IMPIMPORTO DEL VERSAMENTO.
                                    &nbsp; -Se il versamento viene effettuato con un ritardo superiore a tre giorni dall'inizio della gara, il partecipante dovrà versare una sommma di 10 centesimi aggiuntivi per ogni giorno di ritardo. Questi importi verrano aggiunti al montepremi della gara.
                                    &nbsp; -Se un partecipante propone un cambiamento dell'importo di partecipazione durante la prima settimana (+ di 2€), si terrà una votazione con tutti gli altri partecipanti. Nel caso in cui la votazione finisca all'unanimità con un 'si', tutti i giocatori saranno tenuti ad aggiungere la somma mancante
                                    &nbsp; -Se un giocatore desidera partecipare quando la gara è già in corso, dovrà versare un importo aggiuntivo di 50 centesimi insieme ai 2€ richiesti a tutti i giocatori. Questi 50 centesimi verranno aggiunti al montepremi della gara per consentire la registrazione al sito e quindi la partecipazione effettiva.
                                    &nbsp; -Se un giocatore decide di ritirarsi prima dell'inizio della gara e ha già versato i 2€, l'intera somma verrà rimborsata. Tuttavia, se la gara è già iniziata da almeno 3 giorni, il giocatore che intende ritirarsi riceverà un rimborso di -50 centesimi, che verranno trattenuti dall'amministratore del gioco per eliminare l'accesso del giocatore al sistema."  
                                    data-bs-placement="right">PARTECIPAZIONE DEL FANTACRASH</p>
                                </li>
                                <li class="mt-5">
                                    <h3 class="text-uppercase mt-4">Regola N^3</h3>
                                </li>
                                <li class="mb-5">
                                    <p class="fs-4 fw-light" data-bs-toggle="tooltip" data-bs-title="-OGNI INCIDENTE DEVE ESSERE RIPORTATO, SE POSSIBILE, CON UNA FOTO E UNA DESCRIZIONE OBBLIGATORIA.
                                    &nbsp; -BARO | Nel caso in cui la prima regola venga infranta e non venga segnalato un incidente, se uno dei giocatori lo rileva, verrà effettuata un'indagine sull'accaduto. Se l'accertamento conferma l'omissione, il 'Baro' sarà obbligato a versare 1€ al giorno, fino a un massimo di 15€, come aggiunta al montepremi della gara e sarà soggetto alla squalificazione.
                                    &nbsp; a) Se il 'Baro' non fornisce una data e i partecipanti non sono in grado di determinare il giorno dell'incidente, il versamento sarà pari alla metà dell'importo massimo, cioè 7,50€
                                    &nbsp; -Se un giocatore squalificato decide di rientrare nella gara, ha tempo una settimana dalla squalificazione per versare una penale di 5€. Al momento del pagamento, il giocatore avrà nuovamente accesso alla gara e al sito.
                                    &nbsp; -Gli incidenti validi per il gioco sono quelli che causano danni materiali o personali significativi.
                                    &nbsp; b) Incidente stradale: Qualisiasi incidente che si verifichi per strada, coinvolgendo uno o più veicoli e causando danni significativi.
                                    &nbsp; c) Incidente domestico: Se un partecipante subisce un incidente in casa, ad esempio una caduta che provoca lesioni gravi come: frattura ossea, lesione della pelle, abrasione o scottatura.
                                    &nbsp; d) Incidente su suolo scolastico: Se un partecipante subisce un incidente durante l'orario scolastico, causando danni materiali o lesioni" 
                                    data-bs-placement="right">VALIDAZIONE INCIDENTI</p>
                                </li>
                                <li class="mt-5">
                                    <h3 class="text-uppercase mt-4">Regola N^5</h3>
                                </li>
                                <li>
                                    <p class="fs-4 fw-light" data-bs-toggle="tooltip" data-bs-title="-IL VINCITORE È DECRETATO DAL PUNTEGGIO RAGGIUNTO DURANTE LA FASE DELLA GARA
                                    &nbsp; a) Il vincitore riceverà il 45% del montepremi. La divisione del montepremi avverrà in incrementi di 0,5 centesimi.
                                    &nbsp; b) Il restatnte 50% del montepremi verrà ripartito come segue: Il 10% andrà agli sviluppatori del sistema come compenso per la creazione e la gestione del gioco. Il 40% sarà assegnato alla persona che ha scommesso sul partecipante che ha subito o causato il maggior numero di incidenti.
                                    &nbsp; -Alla fine della gara, il giocatore che ha effettuato il maggior numero di incidenti riceverà un risarcimento pari al 15% del montepremi." data-bs-placement="right">SELEZIONE DEL VINCITORE</p>
                                </li>
                            </ul>
                        </div>




                        <div class="col-md-6 right-box">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <h3 class="text-uppercase">Regola N^2</h3>
                                </li>
                                <li class="mb-5">
                                    <p class="fs-4 fw-light" data-bs-toggle="tooltip" data-bs-title="-LA GARA DEL FANTACRASH TERMINERÀ IL PRIMO GIORNO DEL SECONDO QUADRIMESTRE.
                                    &nbsp; -Nel caso in cui ci sia un ritiro di giocatori che riduce il numero di partecipanti a 4, la gara verrà annullata e il montepremi verrà ripartito equamente tra i 4 giocatori rimanenti
                                    &nbsp; -Qualora si verifichi un incidente con gravi conseguenze per l'incidentato, la gara verrà annullata e l'intero montepremi verrà donato all'incidentato"
                                    data-bs-placement="left">DURATA DEL FANTACRASH</p>
                                </li>
                                <li class="mt-5">
                                    <h3 class="text-uppercase mt-4">Regola N^4</h3>
                                </li>
                                <li class="mb-5">
                                    <p class="fs-4 fw-light" data-bs-toggle="tooltip" data-bs-title="-IL FANTACRASH È REGOLATO DA UN SISTEMA DI PUNTEGGI CHE TIENE CONTO DELLA GRAVITÀ DEGLI INCIDENTI. DI SEGUITO SONO ELENCATE LE TRE SOTTOCATEGORIE DI INCIDENTI E I RELATIVI PUNTEGGI
                                    &nbsp; a) Incidente lieve: Un incidente senza conseguenze gravi o danni significativi. Punteggio: 1 punto.
                                    &nbsp; b) Incidente moderato: Un incidente che causa danni materiali leggeri o lesioni minori. Punteggio: 3 punti.
                                    &nbsp; c) Incidente grave: Un incidente che provoca danni materiali relevati o lesioni più serie. Punteggio: 5 punti.
                                    &nbsp; -Si fa eccezione nel caso in cui il veicolo o i veicoli coinvolti non abbiano riportato danni significativi, ad esempio quando si verifica un solo tocco che sposta la carrozzeria ma non provoca danni visibili. In questo caso, l'incidente non viene considerato valido e non viene assegnato alcun punteggio.
                                    &nbsp; -Nel caso in cui la gravità di un incidnete sia incerta, cioè sia difficile stabilire se rientri nelle categorie valide, si può effettuare una votazione per determinare la gravità e assegnare i punti corrispondenti.
                                    &nbsp; -Inoltre, nel caso in cui un partecipante, chiamato 'Baro', sia in testa alla classifica, subirà una penalità di 40 punti. Se il 'Baro' non è in testa alla classifica, la penalità sarà di 25 punti. Questa penalità potrebbe anche comportare il pagamento da parte del 'Baro' (Consultare l'Art.3 Par.2 per ulteriori informazioni)." data-bs-placement="left">CRITERI DI VALUTAZIONE E PUNTEGGI</p>
                                </li>
                                <li class="mt-5">
                                    <h3 class="text-uppercase mt-4">Regola N^6</h3>
                                </li>
                                <li>
                                    <p class="fs-4 fw-light" data-bs-toggle="tooltip" data-bs-title="-OGNI PARTECIPANTE È RESPONSABILE DELLE PROPRIE AZIONI E DEVE RISPETTARE LE LEGGI E LE NORME DI SICUREZZA IN VIGORE
                                    &nbsp; -È strettamente vietato sabotare i mezzi altrui con l'intento di causare incidenti o danni. Il sabotaggio include qualsiasi azione deliberata voolta a danneggiare o mettere in pericolo i veicoli o gli oggetti di altri partecipanti.
                                    &nbsp; a) Manomissione dei freni: Alterare intenzionalemente il sistema dei freni di un veicolo per renderlo meno efficace o inutilizzabile
                                    &nbsp; b) Sabotaggio del motore: Danneggiare volontariamente il motore di un veicolo per impedire il suo corretto funzionamento.
                                    &nbsp; c) Tagliare i cavi dell'impianto elettrico: Interferire con il sistema elettrico di un veicolo, danneggiando o disabilitando i cavi elettrici
                                    &nbsp; d) Sgonfiaggio pneumatici: Risurre deliberatamente la pressione degli pneumatici o forare i pneumatici altrui per compromettere la sicurezza e la manovrabilita.
                                    &nbsp; e) Manipolazione dei sistemi di sicurezza: Disattivare o compromettere intenzionalemente i sistemi di sicurezza di un veicolo, come gli airbag o i sistemi di controllo della stabilità." data-bs-placement="left">RESPONSABILITÀ PERSONALE E DIVIETO DI SABOTAGGIO</p>
                                </li>
                            </ul>
                        </div> 
                    </div>
                </div> 
            </div>  
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>