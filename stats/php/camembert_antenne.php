<?php
require_once 'codes.php';

$query = 'SELECT Indicateur_Zus, COUNT(Indicateur_Zus) AS Nbre_Zus, Logement_Individuel, COUNT(Logement_Individuel) AS Nbre_Log_Ind, Copropriete, COUNT(Copropriete) AS Nbre_Copropriete
FROM gevu_stats
GROUP BY Indicateur_Zus, Logement_Individuel, Copropriete';

$result = mysql_query($query);
if (!$result) 
{
  die('Invalid query: ' . mysql_error());
}
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <title>Antenne</title>
	<link rel="stylesheet" href="../css/colorbrewer.css" />
    <script type="text/javascript" src="../js/libtype.js"></script>
    <script type="text/javascript" src="../js/d3.v2.js"></script>
    <script type="text/javascript" src="../js/colorbrewer.js"></script>
    <link type="text/css" rel="stylesheet" href="../css/button.css"/>
    <style type="text/css">

body {
  text-align: center;
}

svg {
  font: 10px sans-serif;
}

    </style>
  </head>
  <body>
    <div>
	<button id='BL' class='first'>ANTENNE BLÉVILLE</button><button id='CA' class='first'>ANTENNE CAUCRIAUVILLE</button><button id='CV' class='first'>ANTENNE CENTRE VILLE</button><button id='MR' class='first'>ANTENNE MARE ROUGE</button><button id='QS' class='first'>ANTENNE QS</button>
    </div>  
  <u><big><b>Données pour chaque antenne</b></big></u><br><br>
  
    <script type="text/javascript">

// Load data asynchronously.
				d3.select("#BL").on("click", function() {
		   			getAntenne("BL");
				d3.select("#BL").classed("active", true);
					d3.select("#CA").classed("active", false);
					d3.select("#CV").classed("active", false);
					d3.select("#MR").classed("active", false);
					d3.select("#QS").classed("active", false);
					 });
		    	
				d3.select("#CA").on("click", function() {
		   			getAntenne("CA");
				d3.select("#CA").classed("active", true);
					d3.select("#BL").classed("active", false);
					d3.select("#CV").classed("active", false);
					d3.select("#MR").classed("active", false);
					d3.select("#QS").classed("active", false);
					 });
		    	
				d3.select("#CV").on("click", function() {
		   			getAntenne("CV");
				d3.select("#CV").classed("active", true);
					d3.select("#CA").classed("active", false);
					d3.select("#BL").classed("active", false);
					d3.select("#MR").classed("active", false);
					d3.select("#QS").classed("active", false);
					 });

				d3.select("#MR").on("click", function() {
		   			getAntenne("MR");
				d3.select("#MR").classed("active", true);
					d3.select("#CA").classed("active", false);
					d3.select("#CV").classed("active", false);
					d3.select("#BL").classed("active", false);
					d3.select("#QS").classed("active", false);
					 });

				d3.select("#QS").on("click", function() {
		   			getAntenne("QS");
				d3.select("#QS").classed("active", true);
					d3.select("#CA").classed("active", false);
					d3.select("#CV").classed("active", false);
					d3.select("#MR").classed("active", false);
					d3.select("#BL").classed("active", false);
					 });
function getAntenne(Antenne){	
d3.json("http://www.gevu.org/public/stat/antenne?type=col_log", function(data) {

	var logementsindividuels = d3.nest()
      .key(function(d) { return d.Logement_Individuel; })
      .entries(data);

  // Define the margin, radius, and color scale. Colors are assigned lazily, so
  // if you want deterministic behavior, define a domain for the color scale.
  var m = 10,
      r = 100,
      //z = d3.scale.category20b();
	  z = d3.scale.ordinal()
		.domain(logementsindividuels)
	  	.range(colorbrewer.Greens[9]);
	  
  // Define a pie layout: the pie angle encodes the count of flights. Since our
  // data is stored in CSV, the counts are strings which we coerce to numbers.
  var pie = d3.layout.pie()
      .value(function(d) { 
    	  return +d.nb; 
    	  })
      .sort(function(a, b) { return b.nb - a.nb; });

  // Define an arc generator. Note the radius is specified here, not the layout.
  var arc = d3.svg.arc()
      .innerRadius(r / 2)
      .outerRadius(r);

  // Nest the flight data by originating airport. Our data has the counts per
  // airport and carrier, but we want to group counts by aiport.
  var antennes = d3.nest()
      .key(function(d) { return d.lib; })
      .entries(data);

  // Insert an svg element (with margin) for each airport in our dataset. A
  // child g element translates the origin to the pie center.
  var svg = d3.select("body").selectAll("div")
      .data(antennes)
    .enter().append("div") // http://code.google.com/p/chromium/issues/detail?id=98951
      .style("display", "inline-block")
      .style("width", (r + m) * 2 + "px")
      .style("height", (r + m) * 2 + "px")
    .append("svg:svg")
      .attr("width", (r + m) * 2)
      .attr("height", (r + m) * 2)
    .append("svg:g")
      .attr("transform", "translate(" + (r + m) + "," + (r + m) + ")");

  // Add a label for the airport. The `key` comes from the nest operator.
  svg.append("svg:text")
      .attr("dy", ".35em")
      .attr("text-anchor", "middle")
      .text(function(d) { return d.key; });

  // Pass the nested per-airport values to the pie layout. The layout computes
  // the angles for each arc. Another g element will hold the arc and its label.
  var g = svg.selectAll("g")
      .data(function(d) { 
    	  return pie(d.values); 
    	  })
    .enter().append("svg:g");

  // Add a colored arc path, with a mouseover title showing the count.
  g.append("svg:path")
      .attr("d", arc)
      .style("fill", function(d) { return z(d.data.Logement_Individuel); })
    .append("svg:title")
      .text(function(d) { 
    	  return [d.data.Logement_Individuel] + " : " + d.data.nb; 
    	  });

  // Add a label to the larger arcs, translated to the arc centroid and rotated.
  g.filter(function(d) { return d.endAngle - d.startAngle > .2; }).append("svg:text")
      .attr("dy", ".35em")
      .attr("text-anchor", "middle")
      .attr("transform", function(d) { return "translate(" + arc.centroid(d) + ")rotate(" + angle(d) + ")"; })
      .text(function(d) { return d.data.Logement_Individuel; });

  // Computes the label angle of an arc, converting from radians to degrees.
  function angle(d) {
    var a = (d.startAngle + d.endAngle) * 90 / Math.PI - 90;
    return a > 90 ? a - 180 : a;
  }
});

}


    </script>
  </body>
</html>
