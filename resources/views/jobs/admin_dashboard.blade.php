@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <div class="container">
        <!-- IMPORT SESSION TO Display MESSAGE 
        COMING FROM UPDATE Route. WHICH IS STORED IN SESSION -->
        @php
            use Illuminate\Support\Facades\Session;
        @endphp
        @if(session('message'))
            <!-- Success Alert -->
            <div class="container alert alert-success alert-dismissible fade show w-50">
                <strong>Success!</strong> {{session('message')}}.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>
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