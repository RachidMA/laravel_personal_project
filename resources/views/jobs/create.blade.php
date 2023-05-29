@extends('layouts.app')

@section('title', 'Create Job Form')

@section('content')
<div class="container mt-5">
  <form method="POST" action="{{route('store-job')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="fullName" class="form-label">Full Name</label>
      <input type="text" class="form-control" id="fullName" name="full-name" placeholder="Enter your full name" value="{{old('full-name')}}">
      @error('full-name')
      <div class="text-danger">{{$message}}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">E-mail</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter your e-mail address" value="{{old('email')}}">
      @error('email')
      <div class="text-danger">{{$message}}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="picture" class="form-label">Picture</label>
      <input type="file" class="form-control" id="picture" name="picture">
      @error('picture')
      <div class="text-danger">{{$message}}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" value="{{old('address')}}">
      @error('address')
      <div class="text-danger">{{$message}}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="city" class="form-label">City</label>
      <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city" value="{{old('city')}}">
      @error('city')
      <div class="text-danger">{{$message}}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="phone" class="form-label">Phone Number</label>
      <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" value="{{old('phone')}}">
      @error('phone')
      <div class="text-danger">{{$message}}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="businessType" class="form-label">Type of Business</label>
      <select class="form-control" id="businessType" name="businessType">
        <option value="company">Company</option>
        <option value="soleProprietorship">Sole Proprietorship</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="profession" class="form-label">Job Tile</label>
      <input type="text" class="form-control" id="profession" name="profession" placeholder="Enter job title" value="{{old('email')}}">
      @error('profession')
      <div class="text-danger">{{$message}}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Description:</label>
      <textarea class="form-control" id="description" name="description" rows="3" placeholder="Briefly describe your business">{{old('description')}}</textarea>
      @error('description')
      <div class="text-danger">{{$message}}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection