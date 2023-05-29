@extends('layouts.app')

@section('title', 'Jobs')

@section('content')
<div class="container">
    <div class="title">
        <h3>All jobs</h3>
    </div>
   
        @if($job_data->business_type ==='soleProprietorship')
            <div class="jobs-list">
                <x:solo_Details-card :job='$job_data'/>
            </div>
        @else
            <div class="jobs-list">
                <x:company_Details-card :job='$job_data'/>
            </div>
        @endif
  
</div>

@endsection