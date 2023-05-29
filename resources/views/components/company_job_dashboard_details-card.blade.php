@props(['job'])


<div class="container mb-4">
    <div class="card bg-white p-4 border border-primary rounded shadow-lg">
        <div class="card-header text-center">
            <h2 class="h5 font-weight-bold mb-0">company Information</h2>
        </div>
        <div class="card-body row align-items-center">
            <div class="col-lg-4 text-center mb-3 mb-lg-0 bg-danger " style="height: 11rem;">
                <div class="h-100 w-100 overflow-hidden bg-warning shadow-lg" style="height: 10rem;">
                <img src="/images/{{$job->picture}}" alt="Profile Picture" style="width: 100%;">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-sm-4">
                        <p class="text-gray-700 font-weight-bold mb-1">Name:</p>
                        <p class="text-gray-700">{{$job->full_name}}</p>
                    </div>
                    <div class="col-sm-4">
                        <p class="text-gray-700 font-weight-bold mb-1">Job Title:</p>
                        <p class="text-gray-700">{{$job->profession}}</p>
                    </div>
                    <div class="col-sm-4">
                        <p class="text-gray-700 font-weight-bold mb-1">E-mail:</p>
                        <p class="text-gray-700">{{$job->user->email}}</p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <p class="text-gray-700 font-weight-bold mb-1">Address:</p>
                        <p class="text-gray-700">{{$job->address}}</p>
                    </div>
                    <div class="col-sm-4">
                        <p class="text-gray-700 font-weight-bold mb-1">Phone:</p>
                        <p class="text-gray-700">{{$job->phone}}</p>
                    </div>
                    <div class="col-sm-4">
                        <p class="text-gray-700 font-weight-bold mb-1">Type of Business:</p>
                        <p class="text-gray-700">{{$job->business_type}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-4">
            @if($job->description)
            <p class="">{{$job->description}}</p>
            @else
            <p>The is no description is available</p>
            @endif
        </div>
        <div class="row ">
            <a href="{{route('user_dashboard_job_delete',$job->id )}}" class="btn btn-danger col-md-1 mx-auto">Delete</a>
            <a href="{{route('edit_job',$job->id)}}" class="btn btn-primary col-md-1 mx-auto">Edit</a>
        </div>
    </div>
</div>