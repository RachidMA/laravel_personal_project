@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <div class="title">
        <h3>All jobs</h3>
    </div>
   
        @if($job->business_type ==='soleProprietorship')
            <div class="jobs-list">
                <x:admin_dashboard_solo_details-card :job='$job' :comments=$comments/>
            </div>
        @else
            <div class="jobs-list">
                <x:admin_dashboard_company_details-card :job='$job' :comments=$comments/>
            </div>
        @endif
  
</div>

@endsection