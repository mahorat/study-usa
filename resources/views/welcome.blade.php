@extends('layouts.app')

@section('content')
<link href="{{URL::to('css/welcome.css')}}" rel="stylesheet">
<section id="slider">
        <div id="mycarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                <li data-target="#mycarousel" data-slide-to="1"></li>
                <li data-target="#mycarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item">
                    <img src="{{URL::to('img/slider-home1.jpg')}}" data-color="lightblue" alt="First Image">
                    <div class="carousel-caption">
                        <h3>First Image</h3>
                    </div>
                </div>
                <div class="item">
                    <img src="{{URL::to('img/slider-home2.jpg')}}" data-color="firebrick" alt="Second Image">
                    <div class="carousel-caption">
                        <h3>Second Image</h3>
                    </div>
                </div>
                <div class="item">
                    <img src="{{URL::to('img/slider-home3.jpg')}}" data-color="violet" alt="Third Image">
                    <div class="carousel-caption">
                        <h3>Third Image</h3>
                    </div>
                </div>

            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev">
    <span class="fa fa-chevron-circle-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
            <a class="right carousel-control" href="#mycarousel" role="button" data-slide="next">
    <span class="fa fa-chevron-circle-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
        </div>

    </section>

    <!--Search panel-->


    <div class="container search_container">
        <div class="search_panel">
        <div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4 style="margin-bottom:15px; color:#000000">Search for educational programs of Universities</h4>
            </div>
            

            <form action="{{Route('search')}}" method="post">
                {{csrf_field()}}
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <select name="school" id="search_input" class="form-control">
                        <?php $school = DB::table('schools')->where('status', 1)->get() ?>
                            <option value="0">Select school</option>
                        @foreach($school as $school)
                            <option value="{{$school->id}}">{{$school->school}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <select name="level" id="search_input" class="form-control">
                        <option value="0">Select level</option>
                            <?php $level = DB::table('degree_levels')->get() ?>
                        @foreach($level as $level)
                            <option value="{{$level->id}}">{{$level->degreeLevel}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <select name="spec" id="search_input" class="form-control">
                        <option value="0">Select speciality</option>
                            <?php $spec = DB::table('specialities')->get() ?>
                        @foreach($spec as $spec)
                            <option value="{{$spec->id}}">{{$spec->specialities}}</option>
                        @endforeach
                    </select>
                </div>
            
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <button type="submit" class="btn-search">Search <span class="fa fa-search"></span></button>
            </div>
        </form>
        </div><br><br><br>
            <div class="moreInput" style="display:none">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <input type="text" class="form-control" id="search_input" placeholder="Level of education">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <input type="text" class="form-control" id="search_input" placeholder="Scientific sphere">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" id="search_input" placeholder="Scientific sphere">
                </div>
            </div>
        </div>
    </div>

<section id="cards">
    <div class="container-fluid">
        <h1>
            Education for foreigners</h1>
        <div class="cards">
            <a href="#">
                <span class="img">
            <img src="{{URL::to('img/1_1.jpg')}}" alt="">

        </span>
                <h2>Register on the website</h2>
                <p>And send your application to the university directly - for free no agents.</p>
            </a>

        </div>

        <div class="cards">
            <a href="#">
                <span class="img">
            <img src="{{URL::to('img/2_2.jpg')}}" alt="">

        </span>
                <h2>Leading universities of USA</h2>
                <p>Detailed information about each one.</p>
            </a>

        </div>
        <div class="cards">
            <a href="#">
                <span class="img">
            <img src="{{URL::to('img/3_3.jpg')}}" alt="">

        </span>
                <h2>Work for students</h2>
                <p>How an international student can find employment legally.</p>
            </a>

        </div>
        <div class="cards">
            <a href="#">
                 <span class="img">
            <img src="{{URL::to('img/4_1.jpg')}}" alt="">

        </span>
                <h2>Work for students</h2>
                <p>How to get a job legally.</p>
            </a>

        </div>
    </div>
</section>
<section id="wrapfivesteps">
<div class="bodyglass fivesteps step-one">
<h2>5 Steps for Admission to the University</h2>
             <div id="fivesteps">
                <a ><i class="fa fa-list-alt hidden-xs " aria-hidden="true"></i><span class="aff" ><b>1</b></span> <u class="step-decoration">Choose Programme &amp; University</u></a>
                <a><i class="fa fa-file hidden-xs " aria-hidden="true"></i><span class="affbef"><b>2</b></span> <u class="step-decoration">Learn about Financing &amp;<br> Scholarships</u></a>
                <a><i class="fa fa-pencil-square-o hidden-xs " aria-hidden="true"></i><span class="affbef"><b>3</b></span><u class="step-decoration">Prepare your Document Package</u></a>
                <a><i class="fa fa-trophy hidden-xs " aria-hidden="true"></i><span class="affbef"><b>4</b></span> <u class="step-decoration">Undergo Competitive Selection</u></a>
                <a><i class="fa fa-plane hidden-xs " aria-hidden="true"></i><span class="bef"><b>5</b></span> <u class="step-decoration">Get an Invitation and Apply for a Student Visa</u></a>
            </div>
            <div class="text-center col-md-12">
                <a href="#" class="btn btn-large btn-r" data-toggle="modal" data-target="#registerModal">Sign up</a>

            </div>
      </div>    
      </section>
<!--<div class="servicefot">

    <div class="servifot col-lg-12">
        <h1 align="center" style="padding: 0 0 20px 0;">5 шагов для поступления в российский вуз</h1>
        <div class="block col-lg-2 col-md-3 col-sm-4"><span><i class="fa fa-list-alt" aria-hidden="true"></i></span><p>Зарегистрируйся на сайте и заполни форму заявки онлайн</p></div>
        <div class="block col-lg-2 col-md-3 col-sm-4"><span><i class="fa fa-file" aria-hidden="true"></i></span><p>Приложи копии документов</p></div>
        <div class="block col-lg-2 col-md-3 col-sm-6"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span><p>Выбери вузы и дождись одобрения заявки</p></div>
        <div class="block col-lg-2 col-md-3 col-sm-4"><span><i class="fa fa-trophy" aria-hidden="true"></i></span><p>Пройди конкурсный отбор вуза у себя в стране или онлайн </p></div>
        <div class="block col-lg-2 col-md-12 col-sm-6"><span><i class="fa fa-plane" aria-hidden="true"></i></span><p>Получи приглашение от вуза и приезжай в Россию</p></div>

        <div class="text-center col-md-12">
            <a href="#" class="btn btn-large btn-r" data-toggle="modal" data-target="#registerModal">Регистрация</a>

        </div>

    </div>
</div>-->
   <!-- <div class="container content-container main-container " style="margin-top:125px; padding-top:40px">
        <div class="row text-center">
            <h3 >OUR PROGRAM</h3>
            <br>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <img src="{{URL::to('img/abt-back.png')}}" class="img-thumbnail" alt=""><br><br>
            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur rerum saepe voluptatum sint.</p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <img src="{{URL::to('img/abt-back.png')}}" class="img-thumbnail" alt=""><br><br>
            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur rerum saepe voluptatum sint.</p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <img src="{{URL::to('img/abt-back.png')}}" class="img-thumbnail" alt=""><br><br>
            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur rerum saepe voluptatum sint.</p>
        </div>

    <br>
    </div>
    -->
    <section class="images_s">
<div class="index1">
<img src="img/block-3-1.jpg"  alt="">
  <span class="galarely-tittle">
    <p class="some-desk">
        Life condition
    </p>
    <strong>
        Accomodation for student
    </strong>
</span>
<span class="overlayed"></span>    
</div>
<div class="index2"> 
<img src="img/index2.jpg"  alt="">
  <span class="galarely-tittle">
    <p class="some-desk">
       Why USA
    </p>
    <strong>
        Advantages of Education in USA
    </strong>
</span>
<span class="overlayed"></span>       
</div>
<div class="index3"> 
<img src="img/index3.jpg"  alt="">
  <span class="galarely-tittle">
    <p class="some-desk">
        Life condition
    </p>
    <strong>
        Prices in USA
    </strong>
</span>
<span class="overlayed"></span>       
</div> 
<div class="index4"> 
<img src="img/index4.jpg"  alt=""> 
  <span class="galarely-tittle">
    <p class="some-desk">
        Study in Usa
    </p>
    <strong>
        Tuition fees in USA
    </strong>
</span>
<span class="overlayed"></span>      
</div> 
</section>
<div class="container-fluid"></div>
<section class="testimonials">
        <div class="container-fluid">
            <div class="demo">
                <div class="container">
                    <h1>Testimonials</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="testimonial-slider" class="owl-carousel">
								<div class="testimonial">
                                
                                    <div class="person ">
            
                <span class="img">
            <img src="{{URL::to('img/us0.png')}}" alt="">

        </span>
                                        <h3>Firdavs</h3>
                                        <h4>Great Britain <img src="img/england.jpg" class="flag"></h4>
                                        <p><i>"Professors here have deep knowledge about nuclear science."</i></p>
                                        <a href="#">Read More <i class="glyphicon glyphicon-triangle-right"></i></a>


                                    </div>

                                </div>
                                <div class="testimonial">

                                    <div class="person">
           
                <span class="img">
            <img src="{{URL::to('img/us1.png')}}" alt="">

        </span>
                                        <h3>Fairooz</h3>
                                        <h4>Russia <img src="img/rus.png" class="flag"></h4>
                                        <p><i>"In the dormitory we have free internet and laundry"</i></p>
                                        <a href="#">Read More <i class="glyphicon glyphicon-triangle-right"></i></a>


                                    </div>
                                </div>
                                <div class="testimonial">
                                    <div class="person ">
            
                <span class="img">
            <img src="{{URL::to('img/us2.png')}}" alt="">

        </span>
                                        <h3>Marina</h3>
                                        <h4>Espain<img src="img/esp.png" class="flag"></h4>
                                        <p><i>"Professors here have deep knowledge about nuclear science"</i></p>
                                        <a href="#">Read More <i class="glyphicon glyphicon-triangle-right"></i></a>


                                    </div>

                                </div>
                                <div class="testimonial">
                                    <div class="person ">
            
                <span class="img">
            <img src="{{URL::to('img/us3.png')}}" alt="">

        </span>
                                        <h3>Naiman</h3>
                                        <h4>Espain <img src="img/esp.png" class="flag"></h4>
                                        <p><i>"Yes, it is cold in Siberia, but the nature is absolutely beautiful!"</i></p>
                                        <a href="#">Read More <i class="glyphicon glyphicon-triangle-right"></i></a>


                                    </div>

                                </div>
                                <div class="testimonial">
                                
                                    <div class="person ">
            
                <span class="img">
            <img src="{{URL::to('img/us4.png')}}" alt="">

        </span>
                                        <h3>Muzaffar</h3>
                                        <h4>Great Britain <img src="img/england.jpg" class="flag"></h4>
                                        <p><i>"Professors here have deep knowledge about nuclear science."</i></p>
                                        <a href="#">Read More <i class="glyphicon glyphicon-triangle-right"></i></a>


                                    </div>

                                </div>
                                <div class="testimonial">
                                    <div class="person ">
            
                <span class="img">
            <img src="{{URL::to('img/us5.png')}}" alt="">

        </span>
                                        <h3>Umedjon</h3>
                                        <h4>Great Britain <img src="img/england.jpg" class="flag"></h4>
                                        <p><i>"Yes, it is cold in Siberia, but the nature is absolutely beautiful!"</i></p>
                                        <a href="#">Read More <i class="glyphicon glyphicon-triangle-right"></i></a>


                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center col-md-12">
                    <a href="#" class="btn btn-large btn-r" data-toggle="modal" data-target="#registerModal">All testimonials <i class="glyphicon glyphicon-menu-right"></i></a>

                </div>
            </div>

        </div>

    </section>
<div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div>
<!--section with man-->
<!--<div class="container">
<div id="section-man" style="margin-top:10%">
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div id="flex-container">
                            <div>
                        <h1>Lorem ipsum dolor.</h1><br>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas deleniti facere cum temporibus enim quasi?</p>
                        <br>
                        <div class="col-md-4 col-xs-12 text-center" style="padding-top:10px;"><img src="{{URL::to('img/marker-1.png')}}" alt=""></div>
                        <div class="col-md-4 col-xs-12 text-center" style="padding-top:10px;"><img src="{{URL::to('img/marker-2.png')}}" alt=""></div>
                        <div class="col-md-4 col-xs-12 text-center" style="padding-top:10px;"><img src="{{URL::to('img/marker-3.png')}}" alt=""></div>
                        </div>
                        </div>
                        </div>
                    <div class="col-md-6 col-xs-12"><img src="{{URL::to('img/young-man.png')}}" alt="" style="clear:both;" class="img img-responsive"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
</div>
-->
<!--section with man-->



@endsection
