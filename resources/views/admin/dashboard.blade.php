@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Admin Dashboard</h1>
@stop
@section('content')

@section('css')
<style>
  .card {
    border-radius: 12px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }
  #charts {
    min-height: 400px;
  }
</style>
@stop
<div class="container my-5">
    <h4 class="mb-4">Dashboard statistics and more</h4>

    <!-- Summary Cards -->
    <div class="row g-4 mb-5">
      <div class="col-md-3">
        <div class="card text-center p-3">
          <h5>Total Courses</h5>
          <h2 id="total-courses">120</h2>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center p-3">
          <h5>Total Users</h5>
          <h2 id="total-users">450</h2>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center p-3">
          <h5>Total Purchases</h5>
          <h2 id="total-purchases">300</h2>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center p-3">
          <h5>Total Purchase Amount</h5>
          <h2 id="total-amount">₹5,00,000</h2>
        </div>
      </div>
    </div>

    <!-- Google Chart Section -->
    <div class="card p-4">
      <h5 class="mb-3">Sales Overview</h5>
      <div id="charts"></div>
    </div>
    <br>
  </div>


@section('js')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Month', 'Sales'],
      ['Jan',  10000],
      ['Feb',  12000],
      ['Mar',  18000],
      ['Apr',  15000],
      ['May',  20000],
      ['Jun',  25000]
    ]);

    var options = {
      title: 'Monthly Sales',
      curveType: 'function',
      legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('charts'));
    chart.draw(data, options);
  }
</script>
@stop

<!-- /.card -->
@stop