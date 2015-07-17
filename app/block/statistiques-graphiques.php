<?php
echo '
    $(function() {
        \'use strict\';
        
    var chart_options = {responsive: true};
   
    var radarData = {
        labels : ["Union Européen","Etat","Région","Département","Public", "Privé","Entreprise"],
        datasets: [
            {
            label: "Dépenses",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",            
            data: [' 
                        . $DATA2[1] . ',' 
                        . $DATA2[2] . ',' 
                        . $DATA2[3] . ',' 
                        . $DATA2[4] . ',' 
                        . $DATA2[5] . ',' 
                        . $DATA2[6] . ','
                        . $DATA2[7] 
                . ']	
            }
                  ]
            };
var polarData = [
    {
        //[0"Projets",1"Union Européen",2"Etat", 3"Région", 4"Département", 5"Public", 6"Privé", 7"Entreprise"]
        value: ' . $DATA2[1] . ',
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Part de Union Européen"
    },
    {
        value: ' . $DATA2[2] . ',
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Par de l\'Etat"
    },
    {
        value: ' . $DATA2[3] . ',
        color: "#FFA500",
        highlight: "#ffc966",
        label: "Part de la Région"
    },
    {
        value: ' . $DATA2[4] . ',
        color: "#001B66",
        highlight: "#6676a3",
        label: "Part du département"
    },
   {
        value: ' . $DATA2[5] . ',
        color: "#990033",
        highlight: "#b74c70",
        label: "Part Autre Public"
    },
    {
        value: ' . $DATA2[7] . ',
        color: "#4D5360",
        highlight: "#616774",
        label: "Part Bénéficiaire"
    }

];
    var barData = {
	labels : ["Montant du Projet","Part Union Européen","Par Etat","Part Région","Part Département","Part Autre Public", "Part Autre Privé", "Part Bénéficiaire"],
	datasets : [
		{
			fillColor : "#305D7B",
			strokeColor : "#264a62",
                data: [' 
                        . $DATA1[0] . ',' 
                        . $DATA1[1] . ',' 
                        . $DATA1[2] . ',' 
                        . $DATA1[3] . ',' 
                        . $DATA1[4] . ',' 
                        . $DATA1[5] . ','   
                        . $DATA1[6] . ',' 
                        . $DATA1[7] 
                        . ']	
                },
		{
                        fillColor : "#98DAD3",
			strokeColor : "#79aea8",
                data: [' 
                        . $DATA2[0] . ',' 
                        . $DATA2[1] . ',' 
                        . $DATA2[2] . ',' 
                        . $DATA2[3] . ',' 
                        . $DATA2[4] . ',' 
                        . $DATA2[5] . ',' 
                        . $DATA2[6] . ','
                        . $DATA2[7] 
                        . ']	
		}

	]
    };
 
    var ctx1 = $("#Comparaison-graph").get(0).getContext("2d");
    var myBarChart = new Chart(ctx1).Bar(barData, chart_options);

    var ctx2 = $("#Couverture-graph").get(0).getContext("2d");
    var myRadarChart;

    var ctx3 = $("#Repartition-graph").get(0).getContext("2d");
    var myPolarChart;

    $("#statHisto").on("toggled", function (e) {
        myRadarChart.destroy();
        //myPolarChart.destroy();
        myBarChart = new Chart(ctx1).Bar(barData, chart_options);
    });

    $("#statRadar").on("toggled", function (e) {
        myBarChart.destroy();
        //myPolarChart.destroy();
        myRadarChart = new Chart(ctx2).Radar(radarData, chart_options);
    });
    $("#statPolar").on("toggled", function (e) {
        myBarChart.destroy();
       // myRadarChart.destroy();
        myPolarChart = new Chart(ctx3).PolarArea(polarData, chart_options);
    });
});'
;
?>
