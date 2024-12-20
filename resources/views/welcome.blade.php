@extends('layouts.app-public')

@section('content')

            @include('includes.header')

            @include('includes.slider')

            <!-- page-top start-->
            <!-- ================ -->
            <div class="page-top object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center title">Totalgrades</h1>
                            <div class="separator"></div>
                            <p class="text-center">Simple, Smart, Beautiful</p>
                            <div class="row grid-space-20">
                                <div class="col-sm-12 col-md-4 col-md-push-4">
                                    <img src="{{asset('idea//images/report_card_totalgrades.png')}}" alt="" class="object-non-visible" data-animation-effect="fadeInUp" data-effect-delay="0">
                                </div>
                                <div class="col-sm-6 col-md-4 col-md-pull-4">
                                    <div class="box-style-3 right object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="0">
                                        <div class="icon-container default-bg">
                                            <i class="fa fa-tablet"></i>
                                        </div>
                                        <div class="body">
                                            <h2>Easy to Use on Any Device</h2>
                                            <p>Use Totalgrades Anywhere, Anytime-on your desktop, laptop, ipad, or phone...It is designed with students and their parents in mind.</p>
                                            
                                        </div>
                                    </div>
                                    <div class="box-style-3 right object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="0">
                                        <div class="icon-container default-bg">
                                            <i class="fa fa-line-chart"></i>
                                        </div>
                                        <div class="body">
                                            <h2>Student grades and Statistics</h2>
                                            <p>Easy to understand grades and class statistics.</p>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="box-style-3 right object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="400">
                                        <div class="icon-container default-bg">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <div class="body">
                                            <h2>Free for one year</h2>
                                            <p>Use Totalgrades for a whole year for free no matter how many students you have - No commitment, No Contracts.</p>
                                            
                                        </div>
                                    </div>

                                    <div class="box-style-3 right object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="400">
                                        <div class="icon-container default-bg">
                                            <i class="fa fa-user-plus"></i>
                                        </div>
                                        <div class="body">
                                            <h2>Student Registration and Biodata</h2>
                                            <p>Register your students and safely store and access student registration anytime. </p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="box-style-3 object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="200">
                                        <div class="icon-container default-bg">
                                            <i class="fa fa-shield"></i>
                                        </div>
                                        <div class="body">
                                            <h2>Security</h2>
                                            <p>Secured using some of the latest web technologies around.Data Encryption, SSL, and Cross-site request forgeries protection.</p>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="box-style-3 object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="200">
                                        <div class="icon-container default-bg">
                                            <i class="fa fa-list"></i>
                                        </div>
                                        <div class="body">
                                            <h2>Report Card</h2>
                                            <p>Your students deserve beautifully designed report card.</p>
                                            
                                        </div>
                                    </div>
                                    <div class="box-style-3 object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="400">
                                        <div class="icon-container default-bg">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="body">
                                            <h2>Attendance Records</h2>
                                            <p>Daily attendance record and attendance history.</p>
                                            
                                        </div>
                                    </div>

                                    <div class="box-style-3 object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="400">
                                        <div class="icon-container default-bg">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <div class="body">
                                            <h2>Committed & Accountable</h2>
                                            <p>We bring passion to we do. We make a commitment to being accessible and accountable to all our clients.</p>
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page-top end -->

                        <!-- main-container start -->
            <!-- ================ -->
            <section class="main-container parallax parallax-bg-3">

                <!-- main start -->
                <!-- ================ -->
                <div class="main">
                    <div class="container">
                        <div class="call-to-action">
                            <div class="row">
                                
                                    <h1 class="title text-center bg-info">Totalgrades is free for one year no matter how many students or schools you have. No commitment or contract necessary.</h1>
                                    <a href="{{url('schoolRegistrationForm')}}" class="btn btn-default btn-lg" class="text-center">Register Now</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main end -->

            </section>
            <!-- main-container end -->

            <!-- section start -->
            <!-- ================ -->
            <div class="section clearfix object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="200">
                <div class="container text-center">
                    <h1 class="text-center">Why Choose Totalgrades</h1>
                    <div class="separator"></div>
                    <p class="lead text-center">Because Totalgrades is an innovative free grades reporting solution developed by people with passion for improving the quality of primary and secondary eduction around the world. Totalgrades is an easy to use online platform for managing and presenting students’ grades and attendance records elegantly. Totalgrades was designed with students and their parents in mind to provide a platform that encourages and empowers students to improve their grades while allowing parents to be actively enganged in helping shape their performances based on realtime statistics and feedback from teachers.</p>
                   
                    
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{asset('idea/images/section-image-4.png')}}" alt="" class="text-center">
                            <div class="space hidden-md hidden-lg"></div>
                        </div>
                        <div class="col-md-12">
                           <a href="{{url('/schoolRegistrationForm')}}" class="btn btn-lg btn-default">Register Now</a> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- section end -->

         



           

            @include('includes.footer')

            
@endsection