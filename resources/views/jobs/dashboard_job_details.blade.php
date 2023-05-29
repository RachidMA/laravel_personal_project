@extends('layouts.app')

@section('title', 'Dashoard Job Details')

@section('content')
<div class="container">
    <div class="title">
        <h3>Dashoard Job Details</h3>
    </div>
   
        @if($job->business_type ==='soleProprietorship')
            <div class="jobs-list">
                <x:solo_job_dashboard_details-card :job='$job'/>
            </div>
        @else
            <div class="jobs-list">
                <x:company_job_dashboard_details-card :job='$job'/>
            </div>
        @endif
  
</div>

@endsection