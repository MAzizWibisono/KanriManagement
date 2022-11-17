@extends('layout.main')

@section('title', 'Kanri | dashboard')

@section('container')
@section('container')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">

      </h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        {{-- <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button> --}}
      </div>
    </div>
    <div class="card-body p-0">
        <div id="chart" >
            <apexchart type="bubble" height="350" :options="chartOptions" :series="series"></apexchart>
        </div>

    </div>
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->

@endsection

@push('js')
const bubble_chart = JSON.parse('{!!$bubble_chart!!}');
new Vue({
    el: '#chart',
    components: {
      apexchart: VueApexCharts,
    },
    data: {

      series: bubble_chart,
      chartOptions: {
        chart: {
          height: 350,
          type: 'bubble',
        },
        dataLabels: {
          enabled: false
        },
        fill: {
          type: 'gradient',
        },
        title: {
          text: 'Bubble Chart'
        },
        xaxis: {
          min: 0,
          max: {{$xmax}},
          type: 'numeric',
          labels: {
              rotate: 0,
          },
          title: {
            text: 'Mandays',
            offsetX: 0,
            offsetY: 0,
            style: {
                {{-- color: undefined, --}}
                fontSize: '12px',
                fontFamily: 'Helvetica, Arial, sans-serif',
                fontWeight: 600,
                cssClass: 'apexcharts-xaxis-title',
            },
        },
        },
        yaxis: {
          {{-- max: 70, --}}
          min: 0,
          max: {{$ymax}},
          title: {
            text: 'Duration (Month)',

            rotate: -90,
            offsetX: 0,
            offsetY: 0,
            style: {
                {{-- color: undefined, --}}
                fontSize: '12px',
                fontFamily: 'Helvetica, Arial, sans-serif',
                fontWeight: 600,
                cssClass: 'apexcharts-yaxis-title',
            },
        },
        },

        theme: {
          palette: 'palette2'
        },
        tooltip: {
            x: {
                show: true,
                formatter: (seriesName) => 'Mandays:'+seriesName,
            },
            y: {
                title: {
                    formatter: function(value, { series, seriesIndex, dataPointIndex, w }) {
                        return "Duration (Months):"
                      }
                },
            },
            z: {
                title: 'Estimated Budget: '
            },

        }
      },


    },

  })
@endpush
