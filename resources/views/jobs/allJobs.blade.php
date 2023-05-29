@extends('layouts.app')

@section('title', 'Jobs')

@section('content')

<div class="container">
    <div class="title">
        <h3>All jobs</h3>
    </div>
    @foreach($jobs as $job)
        @if($job->business_type ==='soleProprietorship')
            <div class="jobs-list">
                <x:solo-card :job='$job'/>
            </div>
        @else
            <div class="jobs-list">
                <x:company-card :job='$job'/>
            </div>
        @endif
    @endforeach
</div>

@endsection