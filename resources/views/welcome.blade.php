@extends('layouts.master')

@section('heads')
<link href="css/swiper.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.4/lottie.min.js"></script>
@livewireStyles()
@endsection

@section('body')

    <!-- Header -->
    <header id="header" class="header">
        <img class="decoration-star" src="images/decoration-star.svg" alt="alternative">
        <img class="decoration-star-2" src="images/decoration-star.svg" alt="alternative">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-xl-5">
                    <div class="text-container">
                        <h1 class="h1-large">all in one bussiness company</h1>
                        <p class="p-large">a group of companies that seek to develop the country according to the best services </p>
                        <a class="btn-solid-lg anchor-c" href="#details">More details</a>
                        <a class="btn-outline-lg anchor-c" href="#contact">Contact us</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-5 col-xl-7">
                    <div class="image-container">
                        <img class="img-fluid" src="images/header.png" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- Statistics -->
    <div class="counter">
        <div class="container" id="details">

            <div class="row justify-content-center align-items-center">
                <div class=" col-12">
                    <h3 class="text-center text-blue">Across World Children Companies</h3>
                </div>
                @foreach ($companies as $company)
                    @include('includes.company_item')
                @endforeach

            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of counter -->
    <!-- end of statistics -->


    <!-- Introduction -->
    <div id="introduction" class="basic-1 bg-blue">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 text-center ">
                    <h2  class="text-white text-center font-weight-bold">We Present a Complete Service To Our Clients</h2>
                    <p class="text-white text-center">Because <b>Across World</b> is a mother of many companies , You'll Find Your Order Quickly</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of introduction -->



    <!-- Services -->
    <div id="services" class="cards-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="text-container">
                        <h2>Services that we offer</h2>
                        <p>a Big <b>Collection of Services</b> We Are Provide , It concerns all aspects of business life</p>

                        <ul class="list-unstyled li-space-lg">
                            <li class="d-flex">
                                <i class="fas fa-square"></i>
                                <div class="flex-grow-1">And informed shy dissuade property. Musical by</div>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-square"></i>
                                <div class="flex-grow-1">General trade and sale of merchandise</div>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-square"></i>
                                <div class="flex-grow-1">Tourism and travel around the world</div>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-square"></i>
                                <div class="flex-grow-1">Service Of Shipping Goods Via Mobile</div>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-square"></i>
                                <div class="flex-grow-1">Graphic , Animation, And Architecture Design</div>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-square"></i>
                                <div class="flex-grow-1">Develop Websites And Applications</div>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-square"></i>
                                <div class="flex-grow-1">Pharmaceutical trade via mobile</div>
                            </li>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-7">
                    <div class="card-container">

                        @foreach ($services as $service)
                            @include('includes.service_item')
                        @endforeach

                    </div> <!-- end of container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of services -->



    <!-- Contact -->
    <div id="contact" class="form-1">
        <img class="decoration-star" src="images/decoration-star.svg" alt="alternative">
        <img class="decoration-star-2" src="images/decoration-star.svg" alt="alternative">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div id="icon-container">

                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Contact us for a quote using the following form</h2>

                        <!-- Contact Form -->
                        @livewire('contact-form')
                        <!-- end of contact form -->
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-1 -->
    <!-- end of contact -->
@endsection

@section('scripts')
@livewireScripts()
<script>
    var animation = bodymovin.loadAnimation({
container: document.getElementById('icon-container'), // required
path: "https://assets3.lottiefiles.com/packages/lf20_isbiybfh.json", // required
renderer: 'svg', // required
loop: true, // optional
autoplay: true, // optional // optional
});
</script>
@endsection
