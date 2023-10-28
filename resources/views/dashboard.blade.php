@extends('main')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            REJECT PAINTING
                        </div>
                        <div class="card-body">
                            <div id="chartdiv" style="width: 800px; height: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Data Riwayat Konsultasi</div>
                        <div class="card-body">
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">NRP</th>
                                        <th scope="col">NAMA</th>
                                        <th scope="col">REJECT</th>
                                        <th scope="col">DETAIL</th>
                                    </tr>
                                </thead>

                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div class="modal fade" id="modalDetailReject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="modalDetailRejectLabel">Tambah Data</h5>
                    <button type="button" class="btn-danger rounded btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="closeModal()"></button>
                </div>
                <div class="modal-body" id="tesrt">

                </div>
                <div class="modal-footer">

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
        var xRenderer = am5xy.AxisRendererX.new(root, {
            minGridDistance: 30
        });
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
            categoryField: "reject",
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
            valueYField: "jumlah",
            sequencedInterpolation: true,
            categoryXField: "reject",
            tooltip: am5.Tooltip.new(root, {
                labelText: "{valueY}"
            })
        }));

        series.columns.template.setAll({
            cornerRadiusTL: 5,
            cornerRadiusTR: 5,
            strokeOpacity: 0
        });
        series.columns.template.adapters.add("fill", function(fill, target) {
            return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        series.columns.template.adapters.add("stroke", function(stroke, target) {
            return chart.get("colors").getIndex(series.columns.indexOf(target));
        });


        // Set data
        // var data = [{
        //     country: "Kulit Jeruk",
        //     value: 30
        // }, {
        //     country: "Berkawah",
        //     value: 26
        // }, {
        //     country: "Beruntus",
        //     value: 21
        // }, {
        //     country: "Lecet",
        //     value: 17
        // }, {
        //     country: "Peel Off",
        //     value: 11
        // }, {
        //     country: "Belang",
        //     value: 8
        // }, {
        //     country: "Meler",
        //     value: 5
        // }, {
        //     country: "Dust Spray",
        //     value: 3
        // }, {
        //     country: "Sanding Mark",
        //     value: 2
        // }, {
        //     country: "Poor Gloss",
        //     value: 0
        // }, {
        //     country: "Dirty",
        //     value: 0
        // }, {
        //     country: "Cipratan Cat",
        //     value: 0
        // }, {
        //     country: "Tipis",
        //     value: 0
        // }];
        $.ajax({
            url: "/grafik",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log(data);
                xAxis.data.setAll(data);
                series.data.setAll(data);
            },
            error: function() {
                console.log('Error data sat mengambil total Reject');
            }
        });



        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear(1000);
        chart.appear(1000, 100);


        //datatable
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dataRiwayat') }}",
                columns: [{
                        data: null,
                        searchable: false,
                        orderable: false,
                        render: function(data, type, full, meta) {
                            // This function returns the row number
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'nrp',
                        name: 'nrp'
                    }, {
                        data: 'nama',
                        name: 'nama'
                    }, {
                        data: 'reject',
                        name: 'reject'
                    }, {
                        data: 'detailButton',
                        name: 'detailButton'
                    },
                ]
            });

        });

        // Define the detailReject function
        function detailReject(id) {
            $.get(
                "/modal/detail/riwayat" + "/" + id, {},
                function(data) {
                    $("#modalDetailRejectLabel").html("Detail Riwayat Konsultasi ");
                    $("#modalDetailReject").modal("show");
                    $('#modalDetailReject .modal-body').load("/modal/detail/riwayat" + "/" + id);
                }
            );
        }

        // Attach the click event handler to the button
        $('.data-table').on('click', 'button', function() {
            // Get the data associated with the row where the button was clicked
            var data = $('.data-table').DataTable().row($(this).closest('tr')).data();

            // Use 'data' as needed, e.g., show a modal or perform some action
            console.log(data);

            // Call the detailReject function
            detailReject(data.id); // Assuming 'id' is the data you want to pass
        });
    </script>
@endsection
