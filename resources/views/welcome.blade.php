@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
        <!-- MAIN CONTENT -->

        <!-- IMPORT SESSION -->
        @php
        use Illuminate\Support\Facades\Session;
        @endphp
        @if(session('message'))
            <!-- Success Alert -->
            <div class="container alert alert-success alert-dismissible fade show w-50">
                <strong>Success!</strong> {{session('message')}}.
                @if(Auth::user())
                    <a href="{{route('jobs.userDashboard', ['name'=>Auth::user()->name])}}" class="btn btn-primary  h-100 rounded-lg w-25  mx-4 text-light">Go To Dashboard</a>
                @endif
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <!-- Access Denied Alert -->
        @elseif(session('error'))
            <div class="container alert alert-danger alert-dismissible fade show w-50">
                <strong>Error!</strong> {{session('error')}}.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <!-- <div class="container alert alert-success alert-dismissible w-50%">
                <strong>Success!</strong> {{session('message')}}
                <a href="#" class="close h4" data-dismiss="alert" aria-label="close">&times;</a>
            </div> -->

        <div class="main-content-container tracking-widest ">
            <div class="container" id="overview">
                <div class="container d-md-flex align-items-center justify-content-between ">
                        <div class="main-text text-center text-md-start w-100 p-5">
                            <h6 class="text-danger">Lorem ipsum dolor sit.</h6>
                            <h3 class="text-primary">Learn what you need to know</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing 
                                elit. Ratione similique illo consectetur 
                                quod dolorem dignissimos?
                                Lorem, ipsum dolor sit amet consectetur adipisicing 
                                elit. Ratione similique illo consectetur 
                                quod dolorem dignissimos?
                            </p>

                        </div>
                        <div class="img d-flex align-items-center justify-content-center p-5 me-ms-5">
                            <img src="../images/question-removebg-preview.png" alt="" class="rounded-pill">
                        </div>
                </div>
            </div>
            <!--   Second Section  -->
            <div class="container" id="overview">
                <div class="container d-md-flex align-items-center justify-content-between ">
                    <div class="container bg-secondary w-100 mt-5 d-flex align-items-center justify-content-center">                                 
                        <table class="table table-bordered bg-light w-100 m-3 ">
                            <tbody>
                                <tr>
                                    <td><i class="bi bi-check bg-light fs-1 px-3 "></i></td>
                                    <td class="pt-4">Lorem ipsum dolor sit amet .</td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-check bg-light fs-1 px-3 "></i></td>
                                    <td class="pt-4">Lorem ipsum dolor sit amet.</td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-check bg-light fs-1 px-3 "></i></td>
                                    <td class=" pt-4 ">Lorem ipsum dolor sit amet.</td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-check bg-light fs-1 px-3 "></i></td>
                                    <td class=" pt-4 ">Lorem ipsum dolor sit amet.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                        <div class="main-text text-center text-md-start w-100 p-5">
                            <h6 class="text-danger">Lorem ipsum dolor sit.</h6>
                            <h3 class="text-primary">Learn what you need to know</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing 
                                elit. Ratione similique illo consectetur 
                                quod dolorem dignissimos?
                                Lorem, ipsum dolor sit amet consectetur adipisicing 
                                elit. Ratione similique illo consectetur 
                                quod dolorem dignissimos?
                            </p>
                        </div>
                        
                </div>
            </div>
            <!--   3rd Section  -->
            <div class="container" id="overview">
                <div class="container d-md-flex align-items-center justify-content-between w-sm-100 ">
                        <div class=" main-text text-center text-md-start w-100 p-5">
                            
                            <h6 class="text-danger">Lorem ipsum dolor sit.</h6>
                            <h3 class="text-primary">Learn what you need to know</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing 
                                elit. Ratione similique illo consectetur 
                                quod dolorem dignissimos?
                                Lorem, ipsum dolor sit amet consectetur adipisicing 
                                elit. Ratione similique illo consectetur 
                                quod dolorem dignissimos?
                            </p>

                        </div>
                        <div class="img d-flex align-items-center justify-content-center w-100 p-5 me-ms-5">
                            <img src="../images/guaranty3-removebg-preview.png" alt="" class="rounded-pill">
                        </div>
                </div>
                <!-- button to create job -->
                <!-- <div class="container w-50 bg-danger">
                    <a href="{{route('create-job')}}" class="btn btn-primary w-30 h-100 rounded-lg w-50 text-dark">Create Job</a>
                </div> -->
                
                <div class="container my-3 bg-light">
                    <div class="col-md-12 text-center">
                        <!-- //Add link and turn button to alink -->
                        <a href="{{route('create-job')}}" type="button" class="btn btn-primary w-25">Create Job</a>
                    </div>
                </div>
               
            </div>

            <!------  One-On-One  ------>
            <div class="container" id="one-on-one">
                <h3 class="text-secondary text-center mb-5">One-On-One</h3>  
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12 col-sm-8 text-center text-sm-start p-3">
                                <h6 class="text-danger">Conversational Format</h6>
                                <h5 class="text-primary">Dialogue with a tutor</h5>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Natus asperiores fugit facere repellendus similique quam!
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Natus asperiores fugit facere repellendus similique quam!
                                    
                                </p>
                            </div>
                            <div class="col-12 col-sm-4 pb-3 d-flex align-items-center justify-content-center">
                                <img src="../images/dialogue-removebg-preview.png" alt="" class="rounded-pill">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12 col-sm-8 text-center text-sm-start p-3">
                                <h6 class="text-danger">One-to-one tutor sessions</h6>
                                <h5 class="text-primary">Personalized support</h5>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Natus asperiores fugit facere repellendus similique quam!
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Natus asperiores fugit facere repellendus similique quam!
                                    
                                </p>
                            </div>
                            <div class="col-12 col-sm-4 pb-3 d-flex align-items-center justify-content-center">
                                <img src="../images/monitor-removebg-preview.png" alt="" class="rounded-pill">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12 col-sm-8 text-center text-sm-start p-3">
                                <h6 class="text-danger">Dashoboard</h6>
                                <h5 class="text-primary">Keep track of your progress</h5>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Natus asperiores fugit facere repellendus similique quam!
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Natus asperiores fugit facere repellendus similique quam!
                                    
                                </p>
                            </div>
                            <div class="col-12 col-sm-4 pb-3 d-flex align-items-center justify-content-center">
                                <img src="../images/statistics-removebg-preview.png" alt="" class="rounded-pill">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12 col-sm-8 text-center text-sm-start p-3">
                                <h6 class="text-danger">Ask a tutor</h6>
                                <h5 class="text-primary">Get answers form the experts</h5>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Natus asperiores fugit facere repellendus similique quam!
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Natus asperiores fugit facere repellendus similique quam!
                                    
                                </p>
                            </div>
                            <div class="col-12 col-sm-4 pb-3 d-flex align-items-center justify-content-center">
                                <img src="../images/q_a-removebg-preview.png" alt="" class="rounded-pill">
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- button to search for handy man -->
            <!-- <div class="container w-50 bg-danger ">
                <button class="btn btn-primary w-30 h-100 rounded-lg w-50 text-dark">Find Worker</button>
            </div> -->
            <div class="container my-3 bg-light">
                <div class="col-md-12 text-center">
                    <!-- //Add link and turn button to alink -->
                    <button type="button" class="btn btn-primary w-25" id="find-worker">Find Worker</button>
                </div>
            </div>
            <!------------ MORE ------------>
            <div class="container">
                <!--   First Section  -->
                <div class="row">
                    <div class="col-12 col-md-6 ">
                        <div class="main-text text-center text-md-start w-100 p-5">
                            <h6 class="text-danger">Lorem ipsum dolor sit.</h6>
                            <h3 class="text-primary">Learn what you need to know</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing 
                                elit. Ratione similique illo consectetur 
                                quod dolorem dignissimos?
                                Lorem, ipsum dolor sit amet consectetur adipisicing 
                                elit. Ratione similique illo consectetur 
                                quod dolorem dignissimos?
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="img py-5 text-center ">
                            <img src="../images/learn_anywhere-removebg-preview.png" alt="">
                        </div>
                    </div>
                <!--   second Section  -->
                <div class="col-12 col-md-6 ">
                    <div class="img py-5 text-center ">
                        <img src="../images/timer-removebg-preview.png" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 ">
                    <div class="main-text text-center text-md-start w-100 p-5">
                        <h6 class="text-danger">Lorem ipsum dolor sit.</h6>
                        <h3 class="text-primary">Learn what you need to know</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing 
                            elit. Ratione similique illo consectetur 
                            quod dolorem dignissimos?
                            Lorem, ipsum dolor sit amet consectetur adipisicing 
                            elit. Ratione similique illo consectetur 
                            quod dolorem dignissimos?
                        </p>

                    </div>
                </div>
                <!--   3rd Section  -->
                <div class="col-12 col-md-6 ">
                    <div class="main-text text-center text-md-start w-100 p-5">
                        <h6 class="text-danger">Lorem ipsum dolor sit.</h6>
                        <h3 class="text-primary">Learn what you need to know</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing 
                            elit. Ratione similique illo consectetur 
                            quod dolorem dignissimos?
                            Lorem, ipsum dolor sit amet consectetur adipisicing 
                            elit. Ratione similique illo consectetur 
                            quod dolorem dignissimos?
                        </p>
                    </div>
                </div>
        </div>
    <!-- END MAIN CONTENT -->
    
  @endsection