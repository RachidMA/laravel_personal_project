@props(['job', 'comments'])

<div class="container mb-4">
    <div class="card bg-white p-4 border border-primary rounded shadow-lg">
        <div class="card-header text-center">
            <h2 class="h5 font-weight-bold mb-0">Person Information</h2>
        </div>
        <div class="card-body row align-items-center">
            <div class="col-lg-4 text-center mb-3 mb-lg-0">
                <div class="rounded-circle overflow-hidden bg-warning shadow-lg" style="width: 10rem; height: 10rem;">
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
        <div class="job-comments">
            
            @if(!$comments->isEmpty())
                @foreach($comments as $comment)
                    <div class="comments">
                        <p>{{$comment->comment}} <span>Rating: {{$comment->rating}}</span></p>
                        <div class="button">
                            @if(Auth::check())
                                @if(Auth::user()->role==1)
                                    <a href="{{route('comment-delete', ['name' => Auth::user()->name, 'job_id'=>$job->id, 'comment_id'=>$comment->id])}}" class="btn btn-danger">Delete Comment</a>
                                @endif
                            @endif
                        </div>
                        <br>
                        <hr>
                        <br>
                    </div>
                @endforeach
            @else
                <div class="comments">
                    <p>This job does not have any comments</p>
                </div>
            @endif
                
        </div>
        <div class="row ">
            @if(Auth::check())
                @if(Auth::user()->role==1)
                <a href="{{route('admin-dashboard-job-delete', ['name'=>Auth::user()->name, 'job_id'=>$job->id])}}" class="btn btn-primary col-md-1 mx-auto ">Delete</a>
                @endif
            @endif
        </div>
    </div>
</div>