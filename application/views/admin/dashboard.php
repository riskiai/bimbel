<!-- <style>
#chartdiv {
  width: 100%;
  height: 400px;
}
</style>
 -->

 
   <section class="content">
    	<div class="container-fluid">
    		<div class="block-header">
    			<h2>DASHBOARD</h2>
    		</div>
    		<!-- Widgets -->
    		<div class="row clearfix">
    			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    				<div class="info-box bg-orange hover-expand-effect">
    					<div class="icon">
    						<i class="material-icons">equalizer</i>
    					</div>
    					<div class="content">
    						<div class="text">TOTAL KELAS</div>
    						<div class="number count-to" data-from="0" data-to="<?= $total_kelas ?>" data-speed="15" data-fresh-interval="20"></div>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    				<div class="info-box bg-red hover-expand-effect">
    					<div class="icon">
    						<i class="material-icons">equalizer</i>
    					</div>
    					<div class="content">
    						<div class="text">TOTAL SISWA</div>
    						<div class="number count-to" data-from="0" data-to="<?= $total_user ?>" data-speed="1000" data-fresh-interval="20"></div>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    				<div class="info-box bg-orange hover-expand-effect">
    					<div class="icon">
    						<i class="material-icons">equalizer</i>
    					</div>
    					<div class="content">
    						<div class="text">TOTAL PENDAFTAR</div>
    						<div class="number count-to" data-from="0" data-to="<?= $total_pendaftar ?>" data-speed="1000" data-fresh-interval="20"></div>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    				<div class="info-box bg-red hover-expand-effect">
    					<div class="icon">
    						<i class="material-icons">equalizer</i>
    					</div>
    					<div class="content">
    						<div class="text">TOTAL ADMIN</div>
    						<div class="number count-to" data-from="0" data-to="<?= $total_admin ?>" data-speed="1000" data-fresh-interval="20"></div>
    					</div>
    				</div>
    			</div>
    		</div>
		
			<!-- kelas diagram
		<div class= "row">
			<div class="col-md-12">
				<div id="chartdiv"></div>
			</div>
		</div> -->

    	</div>
    </section>

	<!-- data diagram -->
	<!-- <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/locales/de_DE.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/geodata/germanyLow.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/fonts/notosans-sc.js"></script> -->

	<!-- Chart code
<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = root.container.children.push(am5xy.XYChart.new(root, {
  panX: true,
  panY: true,
  wheelX: "panX",
  wheelY: "zoomX",
  pinchZoomX:true
}));

// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
cursor.lineY.set("visible", false);


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
xRenderer.labels.template.setAll({
  rotation: -90,
  centerY: am5.p50,
  centerX: am5.p100,
  paddingRight: 15
});

var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
  maxDeviation: 0.3,
  categoryField: "country",
  renderer: xRenderer,
  tooltip: am5.Tooltip.new(root, {})
}));

var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
  maxDeviation: 0.3,
  renderer: am5xy.AxisRendererY.new(root, {})
}));


// Create series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
var series = chart.series.push(am5xy.ColumnSeries.new(root, {
  name: "Series 1",
  xAxis: xAxis,
  yAxis: yAxis,
  valueYField: "value",
  sequencedInterpolation: true,
  categoryXField: "country",
  tooltip: am5.Tooltip.new(root, {
    labelText:"{valueY}"
  })
}));

series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5 });
series.columns.template.adapters.add("fill", function(fill, target) {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});

series.columns.template.adapters.add("stroke", function(stroke, target) {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});


// Set data
var data = [{
  country: "USA",
  value: 2025
}, {
  country: "China",
  value: 1882
}, {
  country: "Japan",
  value: 1809
}, {
  country: "Germany",
  value: 1322
}, {
  country: "UK",
  value: 1122
}, {
  country: "France",
  value: 1114
}, {
  country: "India",
  value: 984
}, {
  country: "Spain",
  value: 711
}, {
  country: "Netherlands",
  value: 665
}, {
  country: "Russia",
  value: 580
}, {
  country: "South Korea",
  value: 443
}, {
  country: "Canada",
  value: 441
}];

xAxis.data.setAll(data);
series.data.setAll(data);


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series.appear(1000);
chart.appear(1000, 100);

}); // end am5.ready()
</script> -->