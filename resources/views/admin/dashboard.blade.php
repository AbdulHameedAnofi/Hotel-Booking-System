@extends('admin.layouts.master')

@section('title') {{ trans('sentence.dashboard')}} @endsection

@section('content')

  @includeIf('admin.user.summery')

  <div class="card">
    <div class="card-body">
      <div class="container-fluid p-5">
        <div id="barchart_material" style="width: 100%; height: 500px;"></div>
      </div>
    </div>
  </div>

@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Month', 'Revenue'],

        @php
          foreach($payment as $item) {
            echo "['".$item->month."', ".$item->total."],";
          }
        @endphp
    ]);

    var options = {
      chart: {
        title: 'Bar Graph | Monthly revenue'
      },
      bars: 'vertical'
    };
    var chart = new google.charts.Bar(document.getElementById('barchart_material'));
    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>
@endpush