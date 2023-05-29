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
          @if(!Auth::check())
            <!-- ADD BUTTON FOR THE CUSTOMER TO CONTACT HANDYMAN VIA EMAIL -->
            <div class="col-sm-4">
              <a href="{{route('send_email_form', ['name'=>$job->full_name, 'user_id'=>$job->user_id])}}" type="button" class="btn btn-success btn-lighter w-100">Contact Me</a>
            </div>
          @endif
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
    <!-- ===================== -->
    <!-- Comments section form -->
    <div class="comments-main-container">
        <div class="comments-container col-md-3">
            <h3>All Comments</h3>

            <div class="comments p-2 m-2" style="background-color: rgb(232, 251, 246)">
            
                @foreach ($job->comments as $comment)
                    <h5>{{ $comment->comment }} ( {{ $comment->rating }} )</h5>
                    <hr>
                @endforeach
            
            </div>
            <h3>Add Comment...</h3>

            <div class="container m-2 p-2">
                <!-- <form action="" method="POST"> -->
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{ $job->id }}">
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <input type="text" class="form-control" name="comment" id="comment" placeholder="Enter Comment">
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <input type="number" class="form-control" name="rating" id="rating" placeholder="Enter Rating">
                    </div>
                    <button type="submit" id="addCommentBtn" class="btn btn-success">comment</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        })

        // Add Comment To Product By Id

        $("#addCommentBtn").click(function(e){

            // e.preventDefault();
            let comment = $('#comment').val();
            let rating =  $('#rating').val();
            let id = $('#id').val();


            $.ajax({
                type: "POST",
                dataType: "json",
                data: {comment:comment, rating:rating, _token: '{{csrf_token()}}'},
                url: "/job/commnent/"+$id+"/store",
                success: function(data) {
                    console.log('Added Comment');
                },
                error: function(error) {
                    console.log(error.responseJSON.errors.comment);
                    console.log(error.responseJSON.errors.rating);
                }
            });
        });
    </script>
    <!-- ===================== -->
    <div class="row ">
      <a href="{{ url()->previous() }}" class="btn btn-primary col-md-1 mx-auto">BACK</a>
    </div>
  </div>
  
</div>