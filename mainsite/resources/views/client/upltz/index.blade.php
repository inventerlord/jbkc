@extends('layouts.frontend.upltz.layout')

@section('title', $title)
@section('pg-styles')
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('public/css/main.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/upltz/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/upltz/owl-carousel/owl.theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/upltz/owl-carousel/owl.transitions.css') }}">

    <style>
        .banner {
            width: 100%;
            height: 600px;
            float: left;
            background: url("{{ asset('public/theme/upltaz/images/banner.jpg') }}") no-repeat center top;
            background-size: cover;
            padding-top: 10%;
            position: relative;
            text-align: left;
        }

        .banner-text {
            margin-top: 8%;
            width: 100%;
            max-width: 600px;
        }

        .blue-btn1 {
            border-radius: 30px;
            background: #3568b2;
            color: #fff;
            padding: 12px 28px;
            font-size: 14px;
            display: inline-block;
        }

        .owl-carousel .owl-item img {
            border-radius: 50%
        }

        .owl-item {
            /*margin-right: 10px;*/
        }

        .owl-buttons {

            display: flex;
            justify-content: space-between;
            position: absolute;
            width: 100%;
            top: 50%;
            z-index: 10;

        }

        .owl-theme .owl-controls .owl-buttons div {
            background-color: black;
        }

        #msgBoxn1:hover {
            background-color: black !important;
            cursor: pointer;
        }

        .serv-carosoul-des {
            width: 250px;
            /*margin: 0;*/
            margin-block-start: 0;
            margin-block-end: 0;
            margin: 0 auto;
            text-align: center;
            font-size: 14px;
        }

        #info-carosoul {
            width: 100%;
        }

        #info-carosoul .owl-wrapper-outer .owl-wrapper .owl-item {
            width: 399px !important;
        }

        .service-box span {
            padding: 8px 27px;
            margin: auto auto 14px auto !important;
            /*width: 250px;*/
            text-align: center;
        }

        .service-box h4 {
            padding: 18px 0;
        }

        .owl-carousel .owl-wrapper,
        .owl-carousel .owl-item {}
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/upltz/css/main.css') }}">


@endsection
@section('pg-scripts')

    <script type="text/javascript" src="{{ asset('assets/frontend/upltz/owl-carousel/owl.carousel.js') }}"></script>
    <script>
        $('#serv-carosoul').owlCarousel({
            // singleItem: true,
            dot: false,
            items: 4,
            // loop:true,
            autoPlay: 4000,
            navigation: true,
            pagination: false,
            // jsonPath:true

        });
        $("#info-carosoul").owlCarousel({
            singleItem: true,
            dot: false,
            items: 2,
            // loop:true,
            autoPlay: 3500,
            navigation: true,
            pagination: false,
            // jsonPath:true
        });
        $("#c1").hover(function() {
            $('#infoicon').html("<i style=\"font-size: 50px\" class=\"fa fa-briefcase\"></i>");
            $('#infoheading').html("<h4>Industry Experience</h4>");
            $('#infodescription').html(
                "<p>Our professional team of experts has vast experience in a range of industries, so we can quickly analyze a business situation and apply our knowledge to finding a business solution</p>"
            );
        });
        $("#c2").hover(function() {
            $('#infoicon').html("<i style=\"font-size: 50px\" class=\"fa fa-user-alt\"></i>");
            $('#infoheading').html("<h4>Brilliant Team</h4>");
            $('#infodescription').html(
                "<p>We are a brilliant team because we respect, trust and care for each other</p>");
        });
        $("#c3").hover(function() {
            $('#infoicon').html("<i style=\"font-size: 50px\" class=\"fa fa-cogs\"></i>");
            $('#infoheading').html("<h4>Creative & Professional</h4>");
            $('#infodescription').html(
                "<p>We train forward-thinking, creative and professional, business leaders who are able to add value to any business.</p>"
            );
        });
        $("#c4").hover(function() {
            $('#infoicon').html("<i style=\"font-size: 50px\" class=\"fa fa-comment\"></i>");
            $('#infoheading').html("<h4>Complex Solutions</h4>");
            $('#infodescription').html(
                "<p>For every complex problem there is an answer that is clear, simple and wrong.</p>");
        });
        $("#c5").hover(function() {
            $('#infoicon').html("<i style=\"font-size: 50px\" class=\"fa fa-flag\"></i>");
            $('#infoheading').html("<h4>100% Result Guarantee</h4>");
            $('#infodescription').html("<p>We care our clients and we trying to achieve 100% result.</p>");
        });
    </script>
@endsection
@section('pg-content')
    <div class="header-banner">

        <section class="page-service" style="margin-top: 10%;">
            <div class="container" style="">
                <ul style="display: flex;flex-direction: row;flex-wrap: wrap;justify-content: center">

                    <li>
                        <div class="service-box" style=" ">
                            <a>
                                <div class="service-img"><img src="{{ asset('assets/frontend/upltz/images/consult.jpg') }}"
                                        alt="Uplatz Training"></div>
                                <h4>Consultancy </h4>
                                <p>We provide integrated service from the creation of well-balanced strategies in terms of
                                    “maximizing corporate value”, “competitive superiority” and “feasibility and viability”
                                    to the realizat .... <a href="#" data-toggle="modal" data-target="#jbcosuly">Read
                                        More</a></p>
                                <a href="#" data-toggle="modal" data-target="#jbcosulyvisit"><span>View
                                        Details</span></a>

                                <div data-backdrop="static" class="modal" tabindex="-1" id="jbcosulyvisit"
                                    aria-labelledby="jbcosulyvisitLable" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="jbcosulyvisitLable">Consultancy</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true"
                                                        style="padding: 3px 28px;margin: 0;width: 38px;">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p style="text-align: justify">
                                                    <a href="#"><span>Business
                                                            Consultancy</span></a>
                                                    <a href="#"><span>IT Consultancy</span></a>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                                {{--                                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-backdrop="static" class="modal" tabindex="-1" id="jbcosuly"
                                    aria-labelledby="jbcosulyLable" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="jbcosulyLable">Consultancy</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true"
                                                        style="padding: 3px 28px;margin: 0;">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p style="text-align: justify">
                                                    Collaborating with all type of organizations across the Globe, we design
                                                    customer-centric E-Solutions, ERP, E-commerce, Networking, web design
                                                    and mobile products that allow our clients to better connect with
                                                    communities and deliver services more efficiently.
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                                {{--                                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </a>
                        </div>
                    </li>

                    <li>
                        <div class="service-box">
                            <a>
                                <div class="service-img"><img src="{{ asset('assets/frontend/upltz/images/awe1.jpg') }}"
                                        alt="Uplatz Resourcing"></div>
                                <h4>Corporate Training</h4>
                                <p>In today’s challenging, ever-changing business environment the demand for highly-trained
                                    professionals have never been greater. we train forward-thinking, innovative, business
                                    leaders who are .... <a href="#" data-toggle="modal"
                                        data-target="#jbcorpotrain">Read More</a></p>

                                <a href="#" data-toggle="modal" data-target="#jbcorpotrainvisit"><span>View
                                        Details</span></a>
                                <div data-backdrop="static" class="modal" tabindex="-1" id="jbcorpotrainvisit"
                                    aria-labelledby="jbcorpotrainvisitLable" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="jbcosulyvisitLable">Corporate Training</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true"
                                                        style="padding: 3px 28px;margin: 0;width: 38px;">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p style="text-align: justify">
                                                    <a href="#"><span>Buisness Corporate
                                                            Training</span></a>
                                                    <a href="#"><span>IT Corporate
                                                            Training</span></a>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                                {{--                                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-backdrop="static" class="modal" tabindex="-1" id="jbcorpotrain"
                                    aria-labelledby="jbcorpotrainLable" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="jbcorpotrainLable">Corporate Training</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true"
                                                        style="padding: 3px 28px;margin: 0;">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p style="text-align: justify">
                                                    In today’s challenging, ever-changing business environment the demand
                                                    for highly-trained professionals have never been greater. we train
                                                    forward-thinking, innovative, business leaders who are able to add value
                                                    to any business. Our curriculum and real-life approach to assessment
                                                    ensures that Trainings develop and demonstrate the skills and knowledge
                                                    needed to help businesses profit and grow.
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                                {{--                                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </a>
                        </div>
                    </li>

                    <li>
                        <div class="service-box">
                            <a>
                                <div class="service-img"><img src="{{ asset('assets/frontend/upltz/images/CIMA.jpg') }}"
                                        alt="Uplatz Consulting"></div>
                                <h4>Professional Training</h4>
                                <p>The Professional Trainings program has been designed to meet the evolving needs of
                                    business – today and tomorrow. We look forward to helping you achieve excellence as a
                                    professional.... <a href="#" data-toggle="modal" data-target="#jbprotrain">Read
                                        More</a></p>
                                <a href="#" data-toggle="modal" data-target="#jbprotrainvisit"><span>View
                                        Details</span></a>

                                <div data-backdrop="static" class="modal" tabindex="-1" id="jbprotrainvisit"
                                    aria-labelledby="jbprotrainvisitLable" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="jbprotrainvisitLable">Professional Training
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true"
                                                        style="padding: 3px 28px;margin: 0;width: 38px;">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p style="text-align: justify">
                                                    <a href="#"><span>Business Professional
                                                            Training</span></a>
                                                    <a href="#"><span>IT Professional
                                                            Training</span></a>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                                {{--                                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div data-backdrop="static" class="modal" tabindex="-1" id="jbprotrain"
                                    aria-labelledby="jbprotrainLable" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="jbcorpotrainLable">Professional Training</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true"
                                                        style="padding: 3px 28px;margin: 0;">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p style="text-align: justify">
                                                    The Professional Trainings program has been designed to meet the
                                                    evolving needs of business – today and tomorrow. We look forward to
                                                    helping you achieve excellence as a professional. Certification will
                                                    confirm your proficiency in your chosen field and your dedication to
                                                    personal and professional growth.
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                                {{--                                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </a>
                        </div>
                    </li>

                    <li>
                        <div class="service-box">
                            <a>
                                <div class="service-img"><img
                                        src="{{ asset('assets/frontend/upltz/images/biz-consultacy.jpg') }}"
                                        alt="Uplatz Cloud"></div>
                                <h4>Academic</h4>
                                <p>As you study and train for the Academic Qualification, there are lots of qualifications
                                    you can achieve along the way as you progress towards your career. This is a great way
                                    to demonstrate .... <a href="#" data-toggle="modal"
                                        data-target="#jbacadtrain">Read More</a> </p>
                                <a href="#" data-toggle="modal" data-target="#jbacadtrainvisit"><span>View
                                        Details</span></a>

                                <div data-backdrop="static" class="modal" tabindex="-1" id="jbacadtrainvisit"
                                    aria-labelledby="jbprotrainvisitLable" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="jbacadtrainvisitLable">Academic</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true"
                                                        style="padding: 3px 28px;margin: 0;width: 38px;">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p style="text-align: justify">
                                                    <a href="#"><span>Business
                                                            School</span></a>
                                                    <a href="#"><span>IT School</span></a>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                                {{--                                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div data-backdrop="static" class="modal" tabindex="-1" id="jbacadtrain"
                                    aria-labelledby="jbacadtrainLable" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="jbcorpotrainLable">Acadamic</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true"
                                                        style="padding: 3px 28px;margin: 0;">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p style="text-align: justify">
                                                    As you study and train for the Academic Qualification, there are lots of
                                                    qualifications you can achieve along the way as you progress towards
                                                    your career. This is a great way to demonstrate to employers the
                                                    knowledge and skills you have acquired and helps keep you on track and
                                                    motivated.
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                                {{--                                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="service-box">
                            <a>
                                <div class="service-img"><img
                                        src="{{ asset('assets/frontend/upltz/images/esolution1.jpg') }}"
                                        alt="Uplatz Cloud"></div>
                                <h4>E-Solutions</h4>
                                <p>Collaborating with all type of organizations across the Globe, we design customer-centric
                                    E-Solutions, ERP, E-commerce, Networking, web design and mobile products that allow our
                                    clients to .... <a href="#" data-toggle="modal"
                                        data-target="#jbesolutrain">Read More</a></p>
                                <a href="#" data-toggle="modal" data-target="#jbesolutrainvisit"><span>View
                                        Details</span></a>

                                <div data-backdrop="static" class="modal" tabindex="-1" id="jbesolutrainvisit"
                                    aria-labelledby="jbprotrainvisitLable" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="jbprotrainvisitLable">E-Solutions</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true"
                                                        style="padding: 3px 28px;margin: 0;width: 38px;">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p style="text-align: justify"><a href="#"><span>Business
                                                            Solutions</span></a>
                                                    <a href="#"><span>IT Solutions</span></a>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                {{--                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                                {{--                                            <button type="button" class="btn btn-primary">Save changes</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div data-backdrop="static" class="modal" tabindex="-1" id="jbesolutrain"
                                    aria-labelledby="jbesolutrainLable" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="jbesolutrainLable">E-Solutions</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true"
                                                        style="padding: 3px 28px;margin: 0;">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p style="text-align: justify">
                                                    Collaborating with all type of organizations across the Globe, we design
                                                    customer-centric E-Solutions, ERP, E-commerce, Networking, web design
                                                    and mobile products that allow our clients to better connect with
                                                    communities and deliver services more efficiently.
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                                {{--                                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </a>
                        </div>
                    </li>

                </ul>
            </div>
        </section>
    </div>
    <div data-backdrop="static" class="modal" tabindex="-1" id="infobk" aria-labelledby="infobkLable"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infobkLable">JAVED MUSHTAQ CEO at J Biz Solutions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="padding: 3px 28px;margin: 0;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul
                        style="list-style: disc;font-size:15px;margin-block-start: 1rem;margin-block-end: 1rem;margin-inline-start:20px; ">
                        <li>Former Financial & Cost advisor at F. R. Merchant & Co. Chartered Accountants.</li>
                        <li>Financial Analyst & Management Accountant at SBS (Pvt.) Ltd.</li>
                        <li>3. Director of Operations and Finance at CBP (college of business professionals).</li>
                        <li>4. Renowned for his engaging, thought provoking and practical approach towards coaching and
                            mentoring professionals.</li>
                        <li>5. Over 15 years of diverse professional experience in the fields of financial analysis,
                            management accounting & taxation.</li>
                    </ul>
                    <p style="text-align: justify">
                        Javed Mushtaq’s professional experience stems from over 15 years of diverse forays in the fields of
                        financial analysis, management accounting, and taxation. Javed has a strong managerial, financial,
                        economic and IT background. With a solid strategic foundation and vision, he can build and implement
                        sophisticated plans with a proven track record that explicitly supports business needs.
                    </p>
                </div>
                <div class="modal-footer">
                    {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    {{--                                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="block-header">
            <h2>Welcome to J Biz Solutions</h2>
            <div class="three-col" id="welbiz" style="column-gap: 35px">
                <div class="col-container col-md-4 col-sm-12" style="padding:0;max-width: 32%">
                    <img src="{{ asset('assets/frontend/upltz/images/aboutus.jpg') }}">
                    <h4 style="font-weight: 700;font-size: 20px">About Our Company</h4>
                    <p>
                        JBiz Solutions is united with expertise of knowledge, skills, practical experience system
                        integration solutions business training, professional education, consultancy, enterprise resource
                        planning, project management,.... <a href="#" data-target="#welcompnybk"
                            data-toggle="modal">Read More</a>
                    </p>


                </div>
                <div class="col-container col-md-4 col-sm-12" style="padding: 0;max-width: 32%">
                    <ul>
                        <li>
                            <h4 style="font-size: 17px;font-weight: 700;"><i class="fa fa-spinner"></i>Vision</h4>
                            <p style="font-weight: 100 !important;">The Best Consultants and Trainers in the Globe.</p>
                        </li>
                        <li>
                            <h4 style="font-size: 17px;font-weight: 700;"><i class="fa fa-spinner"></i>Mission</h4>
                            <p>Professional Business Services and shaping careers.</p>
                        </li>
                        <li>
                            <h4 style="font-size: 17px;font-weight: 700;"><i class="fa fa-spinner"></i>Integrity</h4>
                            <p>We do the right thing regardless of the consequences.</p>
                        </li>
                    </ul>
                    <a class="text-center" style="display: block;" href="#" data-target="#welcenterbk"
                        data-toggle="modal">Read More</a>

                </div>
                <div class="col-container col-md-4 col-sm-12" style="padding: 0;max-width: 32%">
                    <div id="info-carosoul" style="background-color: white;padding: 10px"
                        class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{}'>
                        <div class="img-hover" style="padding: 25px;">

                            <h4 class="text-center margin-top-20"><a style="font-weight: 700;" href="">JAVED
                                    MUSHTAQ</a></h4>
                            <small style="display: block;font-weight: 700;" class="text-center">CEO</small>
                            <ul
                                style="list-style: disc;font-size:15px;margin-block-start: 1rem;margin-block-end: 1rem;margin-inline-start:20px; ">
                                <li>Former Financial & Cost advisor at F. R. Merchant & Co. Chartered Accountants.</li>
                                <li>Financial Analyst & Management Accountant at SBS (Pvt.) Ltd.</li>
                                <li>3. Director of Operations and Finance at CBP (college of business professionals).</li>
                            </ul>
                            <a href="#" data-target="#infobk" data-toggle="modal"> Read More</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <div data-backdrop="static" class="modal" tabindex="-1" id="welcenterbk" aria-labelledby="welcenterbkLable"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="welcenterbkLable">Business Consulting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="padding: 3px 28px;margin: 0;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <ul
                        style="list-style: none;margin-block-end: 0;margin-block-start: 0;margin-inline-start: 0;margin-inline-end: 0;padding-inline-start: 0">
                        <li style="">
                            <h4 style="font-size: 20px;font-weight: 700;"><i
                                    style="margin-right: 7px;color: white;background-color: #b5363a;padding: 10px;border-radius: 50%;"
                                    class="fa fa-spinner"></i>Vision</h4>
                            <p style="margin-inline-start: 3rem;">The Best Consultants and Trainers in the Globe.</p>
                        </li>
                        <li style="">
                            <h4 style="font-size: 20px;font-weight: 700;"><i
                                    style="margin-right: 7px;color: white;background-color: #b5363a;padding: 10px;border-radius: 50%;"
                                    class="fa fa-spinner"></i>Mission</h4>
                            <p style="margin-inline-start: 3rem;">Professional Business Services and shaping careers.</p>
                        </li>
                        <li style="">
                            <h4 style="font-size: 20px;font-weight: 700;"><i
                                    style="margin-right: 7px;color: white;background-color: #b5363a;padding: 10px;border-radius: 50%;"
                                    class="fa fa-spinner"></i>Integrity</h4>
                            <p style="margin-inline-start: 3rem;">We do the right thing regardless of the consequences.</p>
                        </li>
                        <li style="">
                            <h4 style="font-size: 20px;font-weight: 700;"><i
                                    style="margin-right: 7px;color: white;background-color: #b5363a;padding: 10px;border-radius: 50%;"
                                    class="fa fa-spinner"></i>Respect</h4>
                            <p style="margin-inline-start: 3rem;">We take time to understand what needs to be done and then
                                execute with speed And efficiency. We build performance through people by earning their
                                trust and respect.</p>
                        </li>
                        <li style="">
                            <h4 style="font-size: 20px;font-weight: 700;"><i
                                    style="margin-right: 7px;color: white;background-color: #b5363a;padding: 10px;border-radius: 50%;"
                                    class="fa fa-spinner"></i>Transparency</h4>
                            <p style="margin-inline-start: 3rem;">Transparency is for picture frames, not pricing
                                professional services</p>
                        </li>
                        <li style="">
                            <h4 style="font-size: 20px;font-weight: 700;"><i
                                    style="margin-right: 7px;color: white;background-color: #b5363a;padding: 10px;border-radius: 50%;"
                                    class="fa fa-spinner"></i>Diversity</h4>
                            <p style="margin-inline-start: 3rem;">Diversity and inclusion are about giving value to every
                                human being, no matter our differences.</p>
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    {{--                                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
    <div data-backdrop="static" class="modal" tabindex="-1" id="welcompnybk" aria-labelledby="welcompnybkLable"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="welcompnybkLable">About Our Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="padding: 3px 28px;margin: 0;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <p style="text-align: justify">
                        JBiz Solutions is united with expertise of knowledge, skills, practical experience system
                        integration solutions business training, professional education, consultancy, enterprise resource
                        planning, project management, and employees training. J Biz Solutions is a systems integration
                        company with capability that assists public sector and commercial corporations in maximizing
                        efficiency and effectiveness by utilizing the productive technologies, skills, experience, methods
                        and systems. With passing time technology environment has become very vast and along with the
                        changing environment J Biz Solutions has always bought improvements in businesses. J Biz Solutions
                        is one of the very few companies, which is assembling the most recent technologies to bring
                        betterment for their clients. We have been able to serve our clients with various solutions to
                        fulfill the needs of their businesses. J Biz Solutions dreams of bringing solutions to maintain and
                        develop targeted goals of a company and also improve their businesses in taking better decisions by
                        using most recent technologies.
                    </p>
                </div>
                <div class="modal-footer">
                    {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    {{--                                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
    <div data-backdrop="static" class="modal" tabindex="-1" id="bicon" aria-labelledby="biconLable"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="biconLable">Business Consulting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="padding: 3px 28px;margin: 0;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <p style="text-align: justify">
                        We provide integrated service from the creation of well-balanced strategies in terms of “maximizing
                        corporate value”, “competitive superiority” and “feasibility and viability” to the realization of
                        those strategies.
                    </p>
                </div>
                <div class="modal-footer">
                    {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    {{--                                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <section style="margin-top: 20px">
        <div id="serv-carosoul" class="owl-carousel owl-padding-10 buttons-autohide controlls-over"
            data-plugin-options='{}'>
            <div class="img-hover">
                <a href="#">
                    <img class="img-responsive" src="{{ asset('assets/frontend/upltz/images/corocel/buzconsult.jpg') }}"
                        alt="">
                </a>

                <h4 class="text-center margin-top-20"><a href="">Business Consulting</a></h4>
                <p class="text-center serv-carosoul-des">We provide integrated service from the creation of well-balanced
                    strategies in terms of “maximizing corporate value ....</p>
                <a class="text-center" style="display: block;" href="#" data-target="#bicon"
                    data-toggle="modal">Read More</a>
            </div>
            <div class="img-hover">
                <a href="#">
                    <img class="img-responsive" src="{{ asset('assets/frontend/upltz/images/corocel/buzcorpo.jpg') }}"
                        alt="">
                </a>

                <h4 class="text-center margin-top-20"><a href="">Corporate Training</a></h4>
                <p class="text-center serv-carosoul-des">In today’s challenging, ever-changing business environment the
                    demand for highly-trained professionals ... </p>
                <a class="text-center" style="display: block;" href="#" data-target="#bicortr"
                    data-toggle="modal">Read More</a>

            </div>
            <div class="img-hover">
                <a href="#">
                    <img class="img-responsive" src="{{ asset('assets/frontend/upltz/images/corocel/itpro.jpg') }}"
                        alt="">
                </a>
                <h4 class="text-center margin-top-20"><a href="">Professional Trainings</a></h4>
                <p class="text-center serv-carosoul-des">The Professional Trainings program has been designed to meet the
                    evolving needs of business – today and tomorrow ....</p>
                <a class="text-center" style="display: block;" href="#" data-target="#biprotr"
                    data-toggle="modal">Read More</a>
            </div>
            <div class="img-hover">
                <a href="#">
                    <img class="img-responsive" src="{{ asset('assets/frontend/upltz/images/corocel/accadamic.jpg') }}"
                        alt="">
                </a>
                <h4 class="text-center margin-top-20"><a href="">Academic</a></h4>
                <p class="text-center serv-carosoul-des">As you study and train for the Academic Qualification, there are
                    lots of qualifications you can achieve ...</p>
                <a class="text-center" style="display: block;" href="#" data-target="#biacadtr"
                    data-toggle="modal">Read More</a>
            </div>
            <div class="img-hover">
                <a href="#">
                    <img class="img-responsive" src="{{ asset('assets/frontend/upltz/images/corocel/esolution.jpg') }}"
                        alt="">
                </a>
                <h4 class="text-center margin-top-20"><a href="">E-Solutions</a></h4>
                <p class="text-center serv-carosoul-des">Collaborating with all type of organizations across the Globe, we
                    design customer-centric E-Solutions ...</p>
                <a class="text-center" style="display: block;" href="#" data-target="#biesolutr"
                    data-toggle="modal">Read More</a>
            </div>
        </div>
    </section>
    <div data-backdrop="static" class="modal" tabindex="-1" id="bicon" aria-labelledby="biconLable"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="biconLable">Business Consulting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="padding: 3px 28px;margin: 0;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <p style="text-align: justify">
                        We provide integrated service from the creation of well-balanced strategies in terms of “maximizing
                        corporate value”, “competitive superiority” and “feasibility and viability” to the realization of
                        those strategies.
                    </p>
                </div>
                <div class="modal-footer">
                    {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    {{--                                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
    <div data-backdrop="static" class="modal" tabindex="-1" id="bicortr" aria-labelledby="bicortrLable"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bicortrLable">Corporate Training</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="padding: 3px 28px;margin: 0;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <p style="text-align: justify">
                        In today’s challenging, ever-changing business environment the demand for highly-trained
                        professionals have never been greater. we train forward-thinking, innovative, business leaders who
                        are able to add value to any business. Our curriculum and real-life approach to assessment ensures
                        that Trainings develop and demonstrate the skills and knowledge needed to help businesses profit and
                        grow.
                    </p>
                </div>
                <div class="modal-footer">
                    {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    {{--                                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
    <div data-backdrop="static" class="modal" tabindex="-1" id="biprotr" aria-labelledby="biprotrLable"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="biprotrLable">Professional Trainings</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="padding: 3px 28px;margin: 0;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <p style="text-align: justify">
                        The Professional Trainings program has been designed to meet the evolving needs of business – today
                        and tomorrow. We look forward to helping you achieve excellence as a professional. Certification
                        will confirm your proficiency in your chosen field and your dedication to personal and professional
                        growth.
                    </p>
                </div>
                <div class="modal-footer">
                    {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    {{--                                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
    <div data-backdrop="static" class="modal" tabindex="-1" id="biacadtr" aria-labelledby="biacadtrLable"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="biacadtrLable">Academic</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="padding: 3px 28px;margin: 0;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <p style="text-align: justify">
                        As you study and train for the Academic Qualification, there are lots of qualifications you can
                        achieve along the way as you progress towards your career. This is a great way to demonstrate to
                        employers the knowledge and skills you have acquired and helps keep you on track and motivated.
                    </p>
                </div>
                <div class="modal-footer">
                    {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    {{--                                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
    <div data-backdrop="static" class="modal" tabindex="-1" id="biesolutr" aria-labelledby="biesolutrLable"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="biesolutrLable">E-Solitions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="padding: 3px 28px;margin: 0;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <p style="text-align: justify">
                        Collaborating with all type of organizations across the Globe, we design customer-centric
                        E-Solutions, ERP, E-commerce, Networking, web design and mobile products that allow our clients to
                        better connect with communities and deliver services more efficiently.
                    </p>
                </div>
                <div class="modal-footer">
                    {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    {{--                                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <section>

    </section>
    <section>
        <div class="block-header">
            <h2 style="margin-top: 10px;font-weight: 900;">Why work with us</h2>
            <div class="block" style="padding-bottom: 50px">
                <div class="bkcolumn col-md-6 col-xs-12">
                    <div class="circle-box">
                        <div class="circle-list">
                            <div class="circle-list-icon" id="c1" style="">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <div class="circle-list-icon" id="c2" style="">
                                <i class="fa fa-user-alt"></i>
                            </div>
                            <div class="circle-list-icon" id="c3" style="">
                                <i class="fa fa-cogs"></i>
                            </div>
                            <div class="circle-list-icon" id="c4" style="">
                                <i class="fa fa-comment"></i>
                            </div>
                            <div class="circle-list-icon" id="c5" style="">
                                <i class="fa fa-flag"></i>
                            </div>
                        </div>
                        <div class="circle-info-box">
                            <div class="infobox">
                                <div id="infoicon">
                                    <i class="fa fa-briefcase" style="font-size: 50px"></i>
                                </div>
                                <div id="infoheading">
                                    <h4>Industry Experience</h4>
                                </div>
                                <div id="infodescription">
                                    <p>Our professional team of experts has vast experience in a range of industries, so we
                                        can quickly analyze a business situation and apply our knowledge to finding a
                                        business solution</p>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="bkcolumn col-md-6 col-xs-12">

                    <h3 style="font-size: 26px;line-height: 32px;text-transform: capitalize;font-weight: 700;">5 main
                        Reasons to choose us</h3>
                    <ul>
                        <li><i class="fa fa-stack">1</i><span style="font-weight: 700">integrity</span>
                            <p style="text-align: justify">We do the right thing regardless of the consequences.</p>
                        </li>
                        <li><i class="fa fa-stack">2</i><span style="font-weight: 700">PURSUIT OF EXCELLENCE</span>
                            <p style="text-align: justify">We continually strive to exceed the expectations of us people
                                and our clients.</p>
                        </li>
                        <li><i class="fa fa-stack">3</i><span style="font-weight: 700">COLLABORATION</span>
                            <p style="text-align: justify">We work together to achieve collective and individual goals</p>
                        </li>
                        <li><i class="fa fa-stack">4</i><span style="font-weight: 700">PASSION</span>
                            <p style="text-align: justify">Our energy and enthusiasm are contagious. We are inspired to
                                make a lasting impact.</p>
                        </li>
                        <li><i class="fa fa-stack">5</i><span style="font-weight: 700">ATTITUDE</span>
                            <p style="text-align: justify">The professional attitude can make a huge difference.</p>
                        </li>
                    </ul>

                </div>
            </div>

        </div>

    </section>

@endsection

@section('footer')
    @include('layouts.frontend.upltz.footer')
@endsection
