@extends('layouts.app')

@section('content')
<div>
    <div class="justify-content-center">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-header">Estátisticas</div>
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
</div>
@endsection
