@extends('layouts.app')

@section('content')
<div>
    <div class="justify-content-center">
        <div class="card p-2">
            <div class="card-header border d-flex justify-content-center">Estátisticas</div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <script>
                window.onload = function() {

                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        theme: "light2",
                        title:{
                            text: "Tarefas"
                        },
                        axisY: {
                            title: "Tarefas Concluidas"
                        },
                        data: [{
                            type: "column",
                            yValueFormatString: "#",
                            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                        }]
                    });
                    chart.render();

                    }
            </script>
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="{{asset('js/canvasjs.min.js')}}"></script>
            <script src="{{asset('js/jquery.canvasjs.min.js')}}"></script>
        </div>
    </div>
    @endsection
