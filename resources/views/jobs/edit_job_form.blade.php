@extends('layouts.app')

@section('title', 'Create Job Form')

@section('content')
<div class="container mt-5">
    <form method="POST" action="{{route('edit_job', $job->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullName" name="full-name" placeholder="Enter your full name" value="{{$job->full_name}}">
            @error('full-name')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your e-mail address" value="{{$job->user->email}}">
            @error('email')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="picture" class="form-label">Picture</label>
            <input type="file" class="form-control" id="picture" name="picture">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" value="{{$job->address}}">
            @error('address')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city" value="{{$job->city}}">
            @error('city')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" value="{{$job->phone}}">
            @error('phone')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
        
            <label for="businessType" class="form-label">Type of Business</label>
            <select class="form-control" id="businessType" name="businessType">
                <option value="company" {{ $job->business_type == "company" ? 'selected' : '' }}  >Company</option>
                <option value="soleProprietorship" {{ $job->business_type == "Sole Proprietorship" ? 'selected' : '' }} >Sole Proprietorship</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="profession" class="form-label">Job Tile</label>
            <input type="text" class="form-control" id="profession" name="profession" placeholder="Enter job title" value="{{$job->profession}}">
            @error('profession')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Briefly describe your business">{{$job->description}}</textarea>
            @error('description')
                <div class="text-danger">{{$message}}</div>
            @enderror
            </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection