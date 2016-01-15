<?php
$title = "Fahrplan & Tickets";
$breadcrumbs = '<a href="#fahrplan" class="fahrplan">Fahrt</a> > <a href="#sitzplatz" class="sitzplatz disabled">Sitzplatz</a> > <a href="#verpflegung" class="verpflegung disabled">Verpflegung</a> > <a href="#total" class="total disabled">Total</a>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet"href="style.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include('header.inc.php');
?>
<main>
    <div class="container">
        <h1><?= $title; ?></h1>
        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Hinweis zum Bestellvorgang</strong><br/>
            Wählen Sie zuerst das gewünschte Reisedatum und wählen Sie dann <strong><span class="glyphicon glyphicon-shopping-cart"></span> Ticket ab hier</strong> beim gewünschten Abgangsort (klappen Sie dazu den Fahrplan in der entsprechenden Fahrtrichtung auf).
            Dann reservieren Sie den Sitzplatz im Zug und schliesslich haben Sie die Möglichkeit, Verpflegung zu reservieren.
        </div>
        <div id="fahrplan" class="fahrplan">
            <h2>Fahrplan</h2>
            <form action="#">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="input-group">
                            <input id="datefield" type="text" class="form-control" required="required" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{2}" placeholder="DD.MM.JJ">
              <span class="input-group-btn">
                <input type="submit" onclick="chooseDate();" class="btn btn-default" type="button" value="Datum auswählen" />
              </span>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="btn-group" role="group">
                            <button type="button" id="summerbutton" class="btn btn-default">Sommer</button>
                            <button type="button" id="winterbutton" class="btn btn-default">Winter</button>
                        </div>
                    </div>
            </form>
        </div>
        <?php include('fahrplan.inc.php'); ?>
    </div>
    <div id="sitzplatz" class="sitzplatz disabled">
        <h2>Sitzplatzreservation</h2>
        <form action="#verpflegung" id="sitzplatzform">
            <div class="row">
                <div class="col-xs-6">
                    <div class="strecke">
                        <strong>Strecke: </strong><span id="strecke">---</span>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="preisstrecke">
                        <strong>Preis: </strong><span id="preisstrecke">---</span>
                    </div>
                </div>
                <div class="dropdown col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <div class="form-group">
                        <label for="sel1">Klasse:</label>
                        <select class="form-control" id="sel1" required="required">
                            <option value="1">1. Klasse</option>
                            <option value="2">2. Klasse</option>
                        </select>
                    </div>
                </div>
                <div class="dropdown col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <div class="form-group">
                        <label for="sel2">Tarif:</label>
                        <select class="form-control" id="sel2" required="required">
                            <option value="1">Erwachsener</option>
                            <option value="2">Halbtax / Kind</option>
                            <option value="3">Generalabonement</option>
                            <option value="4">Juniorkarte</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <span>Reservierungsgebür</span>
                    <strong>CHF 33.00</strong>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <button type="submit" form="sitzplatzform" data-toggle="tooltip" onclick="chooseTarif();" data-placement="left" class="btn btn-default" title="Zur Reservation hinzufügen">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        <span>Hinzufügen</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="verpflegung disabled">
        <h2>Verpflegung</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th></th>
                <th>CHF</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Tagesteller</td>
                <td>30.00</td>
                <td>
                    <a href="#" data-toggle="tooltip" data-placement="left" class="btn btn-default" title="Zur Reservation hinzufügen">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        <span>Hinzufügen</span>
                    </a>
                </td>
            </tr>
            <tr>
                <td>3-Gang-Menü</td>
                <td>30.00</td>
                <td>
                    <a href="#" data-toggle="tooltip" onclick="addPosition('3-Gang-Menü',30.00);" data-placement="left" class="btn btn-default" title="Zur Reservation hinzufügen">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        <span>Hinzufügen</span>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="total disabled">
        <h2>Total</h2>
        <div class="row">
            <div class="col-xs-6 col-sm-6">
                <div id="positions">
                </div>
                <strong>TOTAL </strong>
                <span class="currency">CHF </span><span id="totalamount">0.00</span>
            </div>
            <div class="col-xs-6 col-sm-6">
                <a href="#" data-toggle="tooltip" data-placement="left" class="btn btn-default" title="Reservation abschliessen">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span>Reservation abschliessen</span>
                </a>
            </div>
        </div>
    </div>
</main>
<?php
include('footer.inc.php');
?>
<script>
    var totalamount = 0;
    function chooseDate(){
        event.preventDefault();
        var datestring = $('#datefield').val();
        var datearray = datestring.split(".");
        var month = datearray[1];
        if(month < 4 || month > 9) {
            $('#summerbutton').removeClass('active');
            $('#winterbutton').addClass('active');
            console.log("Es ist Winter!");
        }else {
            $('#winterbutton').removeClass('active');
            $('#summerbutton').addClass('active');
            console.log("Es ist Sommer!");
        }
    }
    function chooseTicket(){
        if($('#datefield').val() == "") {
            event.preventDefault();
            window.alert("Bitte Datum eingeben");
        }
        $('#strecke').html("Celerina - Zermatt");
        $('.sitzplatz').removeClass('disabled');
    }
    function chooseTarif() {
        $('.verpflegung').removeClass('disabled');
        $('.total').removeClass('disabled');
        var class = $('#sel1').val();
        var klasse = (class == 1) ? 1.5 : 1;
        var tarif = $('#sel2').val();
        var betrag = 33;
        if (tarif == 1) {
            betrag += (klasse * 148);
        }else if (tarif == 2){
            betrag += (klasse * 98);
        }else if (tarif == 3) {
            if(klasse == 1) betrag += 50;
        }else {
            if(klasse == 1) betrag += 30;
        }
        addPosition('Ticket Celerina-Zermatt, '+class+'. Klasse',betrag);
    }
    function addPosition(label, amount){
        event.preventDefault();
        totalamount += amount;
        $('#positions').append('<p><span>'+label+'</span> <span class="preis">CHF '+amount.toFixed(2)+'</span></p>');
        $('#totalamount').html(totalamount.toFixed(2));
    }
</script>
</body>
</html>
