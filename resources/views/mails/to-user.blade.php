<!doctype html>

<html>
<head>
<style>
    #uplatnica {
	height: 95mm;
	width: 208mm;
	margin-right: auto;
	margin-left: auto;
	border: thin solid #CCC;
	text-align: left;
	margin-top: 30px;
}


#uplatnica #levo {
	float: left;
	width: 98mm;
	height: 60mm;
	margin-top: 9mm;
	margin-left: 5mm;
	border-right-width: thin;
	border-right-style: solid;
	border-right-color: #999;
	font-size: 12px;
}

#uplatnica #levo p {
  margin: 0;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #212529;
  text-align: left;
  background-color: #fff;
}
#uplatnica #desno {
	width: 104mm;
	float: right;
	height: 70mm;
}
#uplatnica #desno #naslov {
	text-transform: uppercase;
	font-weight: bolder;
	font-family: Verdana, Geneva, sans-serif;
	float: right;
	width: 46mm;
	margin-right: 7mm;
	margin-top: 3mm;
}
#desnakolona #kolonaiznos {
	width: 92mm;
	height: 13mm;
	margin-top: 8mm;
	margin-left: 9mm;
}
#desnakolona #kolonaiznos #kolonaiznosnaslov {
	height: 7mm;
	font-size: 12px;
}
#uplatilac {
	border: thin solid #333;
	float: left;
	height: 15mm;
	width: 91mm;
}
#svrhauplate {
	float: left;
	height: 15mm;
	width: 91mm;
	border: thin solid #333;
}
#svrhauplatenaslov {
	width: 91mm;
}
#primalac {
	float: left;
	height: 15mm;
	width: 91mm;
	border: thin solid #333;
}
#kolonaiznos #kolonaiznosnaslov #sifraplacanjanaslov {
	width: 12mm;
	height: 7mm;
	float: left;
	font-size: 12px;
	margin-top: -4px;
}
#kolonaiznos #kolonaiznosnaslov #valutanaslov {
	width: 13mm;
	height: 4mm;
	float: left;
	margin-left: 5mm;
	margin-top: 8px;
}
#kolonaiznos #kolonaiznosnaslov #iznosnaslov {
	width: 53mm;
	float: left;
	height: 4mm;
	margin-left: 6mm;
	margin-top: 8px;
}
#desnakolona #kolonaiznos #kolonaiznosunos #sifraplacanjaunos {
	float: left;
	height: 6mm;
	width: 12mm;
	border: 2px solid #333;
}
#desnakolona #kolonaiznos #kolonaiznosunos #valutaunos {
	width: 12mm;
	float: left;
	height: 6mm;
	margin-left: 4mm;
	border: 2px solid #333;
	text-transform: uppercase;
}
#desnakolona #kolonaiznos #kolonaiznosunos #iznosunos {
	height: 6mm;
	width: 55mm;
	float: left;
	border: 2px solid #333;
	position: relative;
	margin-left: 5mm;
}
#desno #racunprimaoca {
	height: 10mm;
	width: 92mm;
	margin-left: 9mm;
	margin-top: 3mm;
}
#desno #racunprimaoca #racunprimaocanaslov {
	font-size: 12px;
	width: 99%;
}
#desno #racunprimaoca #racunprimaocaunos {
	height: 6mm;
	width: 99%;
	border: 2px solid #333;
}
#desno #modelipozivnabr {
	width: 93mm;
	height: 13mm;
	margin-left: 9mm;
	margin-top: 3mm;
}
#desno #modelipozivnabr #modelipozivbrnaslov {
	font-size: 12px;
}
#desno #modelipozivnabr #modelipozivunos {
	height: auto;
	width: 100%;
}
#desno #modelipozivnabr #modelipozivunos #modelunos {
	float: left;
	height: 6mm;
	width: 12mm;
	border: 2px solid #333;
}
#desno #modelipozivnabr #modelipozivunos #pozivbrunos {
	margin-left: 17mm;
	height: 6mm;
	width: 74mm;
	border: 2px solid #333;
}
#uplatnica #footer {
	width: 100%;
	margin-top: 70mm;
	height: 25mm;
	padding-left: 5mm;
	padding-top: 7mm;
}
#stampa {
	margin-top: 30px;
	margin-left: 150px;
}
#footer #pecatpotpis {
	width: 55mm;
	border-top-width: thin;
	border-top-style: solid;
	border-top-color: #333;
	font-size: 12px;
}
#footer #mestodatum {
	width: 50mm;
	font-size: 12px;
	margin-left: 75mm;
	margin-top: 1mm;
	border-top-width: thin;
	border-top-style: solid;
	border-top-color: #333;
}
#footer #datumvalute {
	width: 35mm;
	margin-left: 140mm;
	border-top-width: thin;
	border-top-style: solid;
	border-top-color: #333;
	margin-top: -18px;
	font-size: 12px;
}
#footer #mestounos {
	width: 45mm;
	margin-left: 75mm;
	padding-left: 10px;
}

</style>
</head>

<body>
Zdravo,  {{ $name }} uspesno si se prijavio useru!

    <div id="uplatnica">
        <div id="levo">
            <div id="uplatnicanaslov">уплатилац</div>
            <div id="uplatilac"><span style="font-size: 16px; margin: 10px">
                    {{$name}} </span>{{$email}}</div>
            <div id="svrhauplatenaslov">сврха уплате</div>
            <div id="svrhauplate"> <span style="margin: 10px; font-size: 16px">
				Kotizacija za  {{$course_name}} </span></div>
            <div id="primalacnaslov">прималац</div>
            <div id="primalac"><span style="margin: 10px; font-size: 16px">
				List zivota
				Vojvode Mišića 61/7
				18000 Niš</span> </div>
        </div>
        <div id="desno">
            <!-- naslov -->
            <div id="naslov">налог за уплату</div>
            <!-- desna kolona -->
            <div id="desnakolona">
                <div id="kolonaiznos">
                    <div id="kolonaiznosnaslov">
                        <div id="sifraplacanjanaslov">шифра плаћања</div>
                        <div id="valutanaslov">валута</div>
                        <div id="iznosnaslov">износ</div>
                    </div>
                    <div id="kolonaiznosunos">
                        <!-- unos podataka -->
                        <div id="sifraplacanjaunos"> </div>
                        <div id="valutaunos"> {{$course_price}} RSD </div>
                        <div id="iznosunos">
                            
                        </div>
                    </div>
                </div>

                <!-- kraj prve kolone -->
                <!-- početak srednje kolone -->
                <div id="racunprimaoca">
                    <div id="racunprimaocanaslov">рачун примаоца</div>
                    <div id="racunprimaocaunos"> 330-3003222-74 </div>
                </div>
                <!-- kraj srednje kolone -->
                <!-- početak donje kolone -->
                <div id="modelipozivnabr">
                    <div id="modelipozivbrnaslov">модел и позив на број
                        (одобрење)</div>
                    <div id="modelipozivunos">
                        <div id="modelunos"> </div>
                        <div id="pozivbrunos">Vaša mail adresa sa koje ćete pristupati
						</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <div id="pecatpotpis">печат и потпис уплатиоца</div>
            <div id="mestounos">Beograd</div>
            <div id="mestodatum">место и датум пријема</div>
            <div id="datumvalute">датум валуте</div>
        </div>
    </div>
</body>
</html>

