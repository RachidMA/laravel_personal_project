@extends('layouts.app')

@section('title', 'Contact Form')

@section('content')

<div class="email-error-message">
    <!-- Access Denied Alert -->
    @if(session('error'))
    <div class="container alert alert-danger alert-dismissible fade show w-50">
        <strong>Error!</strong> {{session('error')}}.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
</div>
<div class="message">
    @php
        use Illuminate\Support\Facades\Session;
    @endphp
    @if(session('message'))
        <!-- Success Alert: Email was sent successfully -->
        <div class="container alert alert-success alert-dismissible fade show w-50">
            <strong>Success!</strong> {{session('message')}}.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <!-- Email was not sent Denied Alert -->
    @elseif(session('error'))
        <div class="container alert alert-danger alert-dismissible fade show w-50">
            <strong>Error!</strong> {{session('error')}}.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

</div>
<div class="container">
    <form method="POST" action="{{ route('contact.send') }}">
        @csrf
        <!-- user_id is referent to handyman(user that is posting job in website) -->
        <input type="hidden" name="handyman_id" value="{{ $user_id }}">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone number</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary my-4">Send</button>
    </form>
    <!-- Go back to previous page with job details -->
    @if(session('id'))
        <div class="row ">
        <a href="{{ route('job-details', session('id')) }}" class="btn btn-primary col-md-1 mx-auto">BACK</a>
        </div>
    @endif
</div>

@endsection