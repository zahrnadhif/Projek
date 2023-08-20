@extends('main')
@section('content')

<div class="main-content">
    <div class="container-fluid">
        <div class="row mt-3">
            {{-- <div class="col"> --}}
                <div class="card">
                    <div class="card-header">
                        REJECT PAINTING
                    </div>
                    <div class="card-body">
                        <div id="chartdiv" style="width: 500px; height: 400px;">
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
        <div class="row mt-2">
          <div class="card ">
            <div class="card-header">Data Riwayat Konsultasi</div>
            <div class="card-body">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">NO</th>
                      <th scope="col">NRP</th>
                      <th scope="col">NAMA</th>
                      <th scope="col">KERUSAKAN</th>
                      <th scope="col">DETAIL</th>
                    </tr>
                  </thead>
                            
                  <tr>
                    <td>1</td>
                    <td>20032</td>
                    <td>Zahra Nadhifah</td>
                    <td>Kulit Jeruk</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-primary mx-1">Detail</a>
                        <a href="#" class="btn btn-danger" id="delete">Hapus</a>
                    </td>
                  </tr>
                </tbody>
              </table>  
            </div>
          </div>
        </div>
    </div>
</div>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<script>
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
  pinchZoomX: true
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

xRenderer.grid.template.setAll({
  location: 1
})

var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
  maxDeviation: 0.3,
  categoryField: "country",
  renderer: xRenderer,
  tooltip: am5.Tooltip.new(root, {})
}));

var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
  maxDeviation: 0.3,
  renderer: am5xy.AxisRendererY.new(root, {
    strokeOpacity: 0.1
  })
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
    labelText: "{valueY}"
  })
}));

series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0 });
series.columns.template.adapters.add("fill", function(fill, target) {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});

series.columns.template.adapters.add("stroke", function(stroke, target) {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});


// Set data
var data = [{
  country: "Kulit Jeruk",
  value: 30
}, {
  country: "Berkawah",
  value: 26
}, {
  country: "Beruntus",
  value: 21
}, {
  country: "Lecet",
  value: 17
}, {
  country: "Peel Off",
  value: 11
}, {
  country: "Belang",
  value: 8
}, {
  country: "Meler",
  value: 5
}, {
  country: "Dust Spray",
  value: 3
}, {
  country: "Sanding Mark",
  value: 2
}, {
  country: "Poor Gloss",
  value: 0
}, {
  country: "Dirty",
  value: 0
},{
  country: "Cipratan Cat",
  value: 0
},{
  country: "Tipis",
  value: 0
}];

xAxis.data.setAll(data);
series.data.setAll(data);


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series.appear(1000);
chart.appear(1000, 100);
</script>

@endsection