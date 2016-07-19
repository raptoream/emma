<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
   <head profile="http://gmpg.org/xfn/11">
    
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="icon" href="img/udg.ico" type="image/x-icon" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <link rel="stylesheet" type="text/css" href="leaflet/leaflet.css" />
        <script type='text/javascript' src='leaflet/leaflet_orig.js'></script>
                    
        <link rel="stylesheet" href="minimap/control.layers.minimap.css" />
        <script src="minimap/L.Control.Layers.Minimap.js"></script>
        
        <script type='text/javascript' src='leaflet/OSMBuildings-Leaflet.js'></script>
        <script type='text/javascript' src='leaflet/Control.MiniMap.js'></script>
        
        <link rel="stylesheet" type="text/css" href="leaflet/styledLayerControl.css" />
        <script type='text/javascript' src='leaflet/styledLayerControl.js'></script>

		<link rel="stylesheet" href="css/proye.css" />
		<!--*d3js-->
    <link href="d3js/nv.d3.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.2/d3.min.js" charset="utf-8"></script>
    <script src="d3js/nv.d3.js"></script>
    <!--<script src="d3js/dayGraph.js"></script>-->
   	</head>
 
   		<body  ng-controller="MainCtrl">

        	<div id="map" class="map" style=" border: 1px solid #AAA;"></div>

            <div class="control zoom">
              <button class="dec">-</button>
              <button class="inc">+</button>
            </div>

			
            <script type='text/javascript' src='js/control.js'></script>
			
<script>
	  
	  
//Updates
$(document).ready(function() {
    function getRandValue(){
     
        //var dataString = 'value='+value;

        $.ajax({
            type: "GET",
            url: "mapv10_ajax.php",
			dataType: "html",	//expect html to be returned
		success: function(msg){

			if(parseInt(msg)!=0)	//if no errors
			{
				$('#value').html(msg);	//load the returned html into pageContet
			}
		}
        });
    }

    setInterval(getRandValue, 5000);
});	  
//nd Updates	  
	  

	  	  
var map = new L.map( 'map', {
     center: [20.74250, -103.37961],
	 zoomControl: false,
    zoom: 17,
});



var options1 = {
  offset:   L.Point(1, 20),
  closeButton:false
};


//CLOSE JS
	
var marker=new Array();
var dif=0;
var planes=[];
var orig=true;

<?php
require("mongo/connect.php");
require("mongo/getData_v2.php");
$j=0;
?>
	
	

		
// mouseover open popup
for (var i = 0; i < planes.length; i++) {


        marker[i].on('mouseover', function (e) {
            this.openPopup();
			
        });
        marker[i].on('mouseout', function (e) {
            this.closePopup();
        });
	


}

	
		
		
</script>
<!-- script Ajax  -->
<span id="value"></span>
	

<script>
<!-- Layers -->
var build=new OSMBuildings(map).load();
map.removeLayer(build);

 var overlays = {
    	'OSMBuildings': build
  };


  
var baselayers = {
			'Esri_WorldImagery': 
					new L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
					attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community',
					maxZoom: 17,
					Zoom: 17
					})
					
	,
	'OpenStreetMap': new L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
		maxZoom: 21
	})
	
};


if (L.Browser.mobile) {
	var layersControl = L.control.layers.minimap(baselayers, null, {
	collapsed: true
	}).addTo(map);
} else{
	var layersControl = L.control.layers.minimap(baselayers, null, {
	collapsed: false
	}).addTo(map);
}



var layersControl1 = L.control.layers(null, overlays, {
	collapsed: false
}).addTo(map);



baselayers.Esri_WorldImagery.addTo(map);



</script>
<div id="chart1" >
    <svg> </svg>
</div>
<?php
//MONGODB


 


$field_georef = array('coll_location'=>1,'metadata'=>1,'sensor_id'=>1,'macAddress'=>1,'_id'=>0,'protocol'=>1);
$cursor_georef = $collec_georef->find(array(),$field_georef);

foreach ($cursor_georef as $doc_georef) {

	$macAddress= $doc_georef['macAddress']; 
	$metadata= $doc_georef['metadata'];
	$sensor_id= $doc_georef['sensor_id']; 
	$protocol= $doc_georef['protocol'];
	$date_err=true;
	if($protocol=="MQTT" && $macAddress=="98:4f:ee:00:e1:a6"){
	
/////data
	$collection = $m->selectCollection('ciiot', 'sendat');

	 $fechaActual = strtotime( date('d-m-Y') );
	 $fechaFinal=$fechaActual+100000;
?>
<script>
        var testdata = [
<?php 

	foreach( $metadata as $varKey => $elemento){
	

		?>
		{"key":"<?php echo $varKey; ?>","keyMeta":"<?php echo $elemento; ?>","type":"area","yAxis":1,"values":[
		<?php
		$Query = array('macAddress' => $macAddress, $varKey => array( '$exists' => true ),'unix_time' => array('$gt' => $fechaActual,'$lt' => $fechaFinal));
		$field = array('unix_time'=>1,'macAddress'=>1,'_id'=>0,$varKey=>1 );
	
		$sort = array('_id' => 1);
		$cursor = $collection->find($Query, $field)->sort($sort);


/////////data 

 		foreach($cursor as $doc_esp){ 
		

		$valTime=$doc_esp['unix_time'];
		?>
				{"x":<?php echo $valTime; ?>,"y":<?php echo $doc_esp[$varKey]; ?>,"z":<?php echo $doc_esp[$varKey]; ?>},
		<?php

		}
		 
?>
		]},
    
		
<?php		 
		
	}
?>		  
	];
	</script>
<?php
	$location= $doc_georef['coll_location']['location'];
	$lon= $doc_georef['coll_location']['coordinates']['longitude']; 
	$lat= $doc_georef['coll_location']['coordinates']['latitude']; 

}

}
?>
<script>/*
 testdata[0].type = "area";
    testdata[0].yAxis = 1;
	
	
	/*
    nv.addGraph(function() {
        var chart = nv.models.multiChart()
            .margin({top: 30, right: 60, bottom: 20, left: 70})
            .color(d3.scale.category10().range());

        chart.xAxis.tickFormat(function(d){return d3.time.format('%H:%M')(new Date(d));});
        chart.yAxis1.tickFormat(d3.format(',.1f'));
        chart.yAxis2.tickFormat(d3.format(',.1f'));
		


        d3.select('#chart1 svg')
            .datum(testdata)
            .transition().duration(500).call(chart);

        return chart;
    });
	*/
	
	
	
	 testdata[0].type = "area";
    testdata[0].yAxis = 1;
	
	
	
    nv.addGraph(function() {
        var chart = nv.models.linePlusBarChart()
            .margin({top: 50, right: 60, bottom: 30, left: 70})
            .legendRightAxisHint('')
            .color(d3.scale.category10().range())

        chart.xAxis.tickFormat(function(d){return d3.time.format('%H:%M')(new Date(d*1000));});

		 chart.y1Axis.tickFormat(function(d) { return d3.format(',.2f')(d) });
chart.bars.forceY([0]).padData(false);

        d3.select('#chart1 svg')
            .datum(testdata)
            .transition().duration(500).call(chart);

        return chart;
    });
	
	
	
	/*
	 var chart;
    nv.addGraph(function() {
        chart = nv.models.linePlusBarChart()
            .margin({top: 50, right: 60, bottom: 30, left: 70})
            .legendRightAxisHint(' [Using Right Axis]')
            .color(d3.scale.category10().range())


        chart.xAxis.tickFormat(function(d) {
                return d3.time.format('%d-%b-%y')(new Date(d*1000))
            })
            .showMaxMin(false);

        chart.y1Axis.tickFormat(function(d) { return '$' + d3.format(',f')(d) });
        chart.bars.forceY([0]).padData(false);

        chart.x2Axis.tickFormat(function(d) {
            return d3.time.format('%d-%b-%y')(new Date(d*1000))
        }).showMaxMin(false); 

        d3.select('#chart1').append("svg")
            .datum(testdata)   
            .call(chart)     
            .attr("width", '100%')
            .attr("height", '100%')
            .attr('viewBox','0 0 '+Math.min(width,height)+' '+Math.min(width,height))
            .attr('preserveAspectRatio','xMinYMin')
            .append("g")
            .transition()
            .duration(500);
;

        nv.utils.windowResize(chart.update);

        chart.dispatch.on('stateChange', function(e) { nv.log('New State:', JSON.stringify(e)); });

        return chart;
    });
	*/
	
	
</script>
   </body>
</html>