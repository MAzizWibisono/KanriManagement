@extends('layout.main')

@section('title', 'project_criteria')

@section('container')

<div class="container" id="project_criteria">
  <div class="row">
    <div class="col-10">
    <h1 class="mt-3">Hello,</h1>
    <form @submit="validasi_sisa" method="POST" action="{{ url('project_criteria', $project_criteria->id) }}">
      {{ csrf_field() }}
      @method('PUT')

      <div class="input-group mb-3">
        <label for="exampleInputtext">Revenue</label>
        <div class="input-group mb-3">
            <input type="number" name="revenue" v-model="revenue" value ="{{ $project_criteria->revenue }}" class="form-control" min="0" max="100">
            <span class="input-group-text" id="basic-addon2">%</span>
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Benefit Cost Ratio</label>
        <div class="input-group mb-3">
            <input type="number" name="benefit_cost_ratio" v-model="benefit_cost_ratio" value ="{{ $project_criteria->benefit_cost_ratio }}" class="form-control" min="0" max="100">
            <span class="input-group-text" id="basic-addon2">%</span>
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Budget</label>
        <div class="input-group mb-3">
            <input type="number" name="budget" v-model="budget" value ="{{ $project_criteria->budget }}" class="form-control" min="0" max="100">
            <span class="input-group-text" id="basic-addon2">%</span>
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Resources</label>
        <div class="input-group mb-3">
            <input type="number" name="resources" v-model="resources" value ="{{ $project_criteria->resources }}" class="form-control" min="0" max="100">
            <span class="input-group-text" id="basic-addon2">%</span>
          </div>
      </div>



      <div class="form-group">
        <label for="exampleInputtext">Project Risk</label>
        <div class="input-group mb-3">
            <input type="number" name="project_risk" v-model="project_risk" value ="{{ $project_criteria->project_risk }}" class="form-control" min="0" max="100">
            <span class="input-group-text" id="basic-addon2">%</span>
          </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
  </div>
</div>

@endsection
@push('js')

new Vue({
    el: '#project_criteria',

    data: {

        sisa:100,
        revenue:0,
        benefit_cost_ratio:0,
        budget:0,
        resources:0,
        project_risk:0,

    },
    created: function(){
        this.revenue={{$project_criteria->revenue}}
        this.benefit_cost_ratio={{$project_criteria->benefit_cost_ratio}}
        this.budget={{$project_criteria->budget}}
        this.resources={{$project_criteria->resources}}
        this.project_risk={{$project_criteria->project_risk}}
        this.sisa=100
        this.sisa -= (this.revenue+this.benefit_cost_ratio+this.budget+this.resources+this.project_risk)
    },
    methods:{
        validasi_sisa(e){
            if(this.sisa < 0){
                alert("Bobot Persentase Melebihi 100%")
                e.preventDefault()
            }
            if(this.sisa > 0){
                alert("Bobot Persentase Kurang dari 100%")
                e.preventDefault()
            }

        }
    },
    watch:{
        revenue:function(newvalue){
            this.sisa=100
            this.sisa -= (parseInt(newvalue)+parseInt(this.benefit_cost_ratio)+parseInt(this.budget)+parseInt(this.resources)+parseInt(this.project_risk))
        },
        benefit_cost_ratio:function(newvalue){
            this.sisa=100
            this.sisa -= (parseInt(this.revenue)+parseInt(newvalue)+parseInt(this.budget)+parseInt(this.resources)+parseInt(this.project_risk))
        },
        budget:function(newvalue){
            this.sisa=100
            this.sisa -= (parseInt(this.revenue)+parseInt(this.benefit_cost_ratio)+parseInt(newvalue)+parseInt(this.resources)+parseInt(this.project_risk))
        },
        resources:function(newvalue){
            this.sisa=100
            this.sisa -= (parseInt(this.revenue)+parseInt(this.benefit_cost_ratio)+parseInt(this.budget)+parseInt(newvalue)+parseInt(this.project_risk))
        },
        project_risk:function(newvalue){
            this.sisa=100
            this.sisa -= (parseInt(this.revenue)+parseInt(this.benefit_cost_ratio)+parseInt(this.budget)+parseInt(this.resources)+parseInt(newvalue))
        }
    }


  })
@endpush
