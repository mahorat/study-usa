@extends('layouts.app')

@section('content')

<style>
  .navbar-default .navbar-nav > li > a {
     color: black !important; 
}
</style>
   <!-- <div class="bg-nav" style="background-color:white; opacity:.7; height:65px;"></div> -->

    <div class="univer-bg-image" >
        <img src="../../../img/live-here.jpg" style="visibility: hidden; max-height:326px; min-height:100px;">
      <?php $iddd=2; ?>
@foreach($programs as $programs)
        <div class="detail-desc-blog">
            <h1 class="detail-univer-name detail-univer-bg">{{$programs->university_name}}</h1>
          <?php $state_name = DB::table('states')->select('state')->where('id', $programs->id)->first(); ?>
          <h1 class="detail-univer-bg" style="font-size: 10.3px; font-weight: 600; margin-bottom:25px; text-transform:uppercase">I JUNIOR IN {{$programs->city}} - {{$state_name->state}}, USA</h1>
          <?php $statee = DB::table('states')->select('state')->where('id', $programs->id_state)->first(); ?>

            <div class="col-md-4" style="margin-left: -15px;">
            @if (Auth::check())
                <form action="{{ Route('candidate') }}" method="post">
                    {{csrf_field()}}
                  <?php $iddd = $programs->id_univer; ?>
                    <input type="hidden" value="{{$programs->id_univer}}" name="id_univer">
                    <input type="hidden" value="{{$programs->id}}" name="id_program">
                    <button type="submit" class="detail-desc-blog-btn" {{ $status == 'false' ? 'disabled' : '' }}>{{$statusText}}</button>
                </form>
            @else
                <button class="detail-desc-blog-btn" data-toggle="modal" data-target="#loginModal" onclick="showsignin()">APPLY NOW</button>
            @endif
            </div>
            <div class=" col-md-5" style="line-height:30px; margin-left:5px;">
                <img src="{{URL::to('img/star.png')}}" width="25px" alt="">
                <img src="{{URL::to('img/star.png')}}" width="25px" alt="">
                <img src="{{URL::to('img/star.png')}}" width="25px" alt="">
                <img src="{{URL::to('img/star.png')}}" width="25px" alt="">
                <img src="{{URL::to('img/star.png')}}" width="25px" alt="">
            </div>
        </div>
    </div>
    <nav class="navbar navbar-bg">
        <div class="container">
            <div class="col-md-3"></div>
            <div class="col-md-9 row">
                <ul class="nav navbar-nav" id="navNavbar">
                <li><a onclick="tab('overview')" style="cursor:pointer">OVERVIEW</a></li>
                <li><a onclick="tab('programs')" style="cursor:pointer">PROGRAMMS</a></li>
                <li><a onclick="tab('photos')" style="cursor:pointer">PHOTOS</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="col-md-3" >
            <div class="detail-side-bar">
                <h4 class="UNIOFALABAM">UNIOFALABAM</h4>
                <div class="side-bar-logo text-center">
                    @if ($programs->logo == null)
                        <img src="{{URL::to('img/no-logo.jpg')}}" class="img-circle" width="155px">
                    @else
                    <?php 
                  		$id123 = DB::table('programs')->select('id_univer')->where('id', $programs->id)->first();
                  		$idd12 = DB::table('university_datas')->select('user_id')->where('id', $id123->id_univer)->first();
                  

                  		$logo = 'storage/app/UniverDocs/'.$idd12->user_id.'/'.$programs->logo; 
                  	?>
                        <img src="{{URL::to($logo)}}" class="img-circle" width="155px">
                        <img src="{{URL::to('img/verified.png')}}" class="img-circle img-secure" width="32px">
                    @endif
                </div>

                <h4 class="SLOGAN-UNIVERSITY">SLOGAN UNIVERSITY</h4>
                <hr>
                <span class="ABOUT-UNiVERSITY">ABOUT UNIVERSITY</span>
                <p>{{$programs->short_description}}</p>
                <hr>
                <span class="ABOUT-UNiVERSITY">CONTACT DETILES</span>
                <table class="contact-table">
                    <tr>
                        <td class="contact-table-td">PHONE:</td>
                        <td>{{$programs->emp_phone}}</td>
                    </tr>
                    <tr>
                        <td class="contact-table-td">EMAIL:</td>
                        <td>
                            <?php 
                                $user_email = DB::table('users')->select('email')->where('id',$programs->user_id)->first();
                                echo $user_email->email;
                           ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="contact-table-td">WEB:</td>
                        <td>{{$programs->university_website}}</td>
                    </tr>
                    <tr>
                        <td class="contact-table-td">ADRESS:</td>
                        <?php $state = DB::table('states')->select('state')->where('id', $programs->id_state)->first() ?>
                        <td>America, {{$state->state}},
                            {{$programs->city}} {{$programs->street}}</td>
                    </tr>
                </table>
                <br><br>
            </div>
        </div>
        <div class="row col-md-9">
            <br>
        <div id="overview" class="hidden">lorem</div>
        <div id="photos" class="hidden">lorem2</div>
        <div id="programs" class="">
            <div id="content">
                <div class="row col-md-3 sidebar sidebar-left">


                    <ul class="nav  nav-stacked">
                    <?php
                        $data1 = $data22 = $data33 = $data44 = $data55 = $data66 = $data77 = $data88 = $data99 = $data110 = $data111 = $data112 = $data113 = '0';
                        foreach ($prog1 as $v) {
  
                            switch ($v->id_degree_level) {
                                case 1:
                                    $data11 = '1';
                                    break;
                                case 2:
                                    $data22 = '1';
                                    break;
                                case 3:
                                    $data33 = '1';
                                    break;
                                case 4:
                                    $data44 = '1';
                                    break;
                                case 5:
                                    $data55 = '1';
                                    break;
                                case 6:
                                    $data66 = '1';
                                    break;
                                case 7:
                                    $data77 = '1';
                                    break;
                                case 8:
                                    $data88 = '1';
                                    break;
                                case 9:
                                    $data99 = '1';
                                    break;
                                case 10:
                                    $data110 = '1';
                                    break;
                                case 11:
                                    $data111 = '1';
                                    break;
                                case 12:
                                    $data112 = '1';
                                    break;
                                case 13:
                                    $data113 = '1';
                                    break;
                            }
                        }
                    ?>
                        @if($data11 == '1')
                        <li><a data-toggle="pill" href="#Associate">Associate</a></li>
                        @endif
                        @if($data22 == '1')
                        <li><a data-toggle="pill" href="#Bachelors">Bachelors</a></li>
                        @endif
                        @if($data33 == '1')
                        <li><a data-toggle="pill" href="#Certificate">Certificate</a></li>
                        @endif
                        @if($data44 == '1')
                        <li><a data-toggle="pill" href="#Doctorate">Doctorate</a></li>
                        @endif
                        @if($data55 == '1')
                        <li><a data-toggle="pill" href="#Masters">Masters / Graduate</a></li>
                        @endif
                        @if($data66 == '1')
                        <li><a data-toggle="pill" href="#Languages">Languages</a></li>
                        @endif
                        @if($data77 == '1')
                        <li><a data-toggle="pill" href="#Double">Double degrees</a></li>
                        @endif
                        @if($data88 == '1')
                        <li><a data-toggle="pill" href="#Official">Official Degrees</a></li>
                        @endif
                        @if($data99 == '1')
                        <li><a data-toggle="pill" href="#Degree">Degree</a></li>
                        @endif
                        @if($data110 == '1')
                        <li><a data-toggle="pill" href="#PhD">PhD</a></li>
                        @endif
                        @if($data111 == '1')
                        <li><a data-toggle="pill" href="#Continuing">Continuing education</a></li>
                        @endif
                        @if($data112 == '1')
                        <li><a data-toggle="pill" href="#Executive">Executive education</a></li>
                        @endif
                        @if($data113 == '1')
                        <li><a data-toggle="pill" href="#Study">Study abroad</a></li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                    @if($data11 == '1')
                        <div id="Associate" class="tab-pane fade in">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                @foreach($data as $data) 
                                    @if($data->id_degree_level == 1)              
                                        <tr>
                                            <td><a href="{{$data->id}}">{{$data->specialities}}</a></td>
                                            @if(empty($data->price))
                                                <td>Budget</td>
                                            @else
                                                <td>{{$data->price}}</td>
                                            @endif
                                        
                                            <td>{{$data->seats}}</td>
                                        </tr>
                                    @else
                                    @endif
                                @endforeach
                            </table>  
                        </div>
                        @endif

                        @if($data22 == '1')
                        <div id="Bachelors" class="tab-pane fade in ">
                        <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Number of seats</th>
                            </tr>
                            @foreach($data2 as $data2) 
                                @if($data2->id_degree_level == 2)              
                                    <tr>
                                        <td><a href="{{$data2->id}}">{{$data2->specialities}}</a></td>
                                        @if(empty($data2->price))
                                            <td>Budget</td>
                                        @else
                                            <td>{{$data2->price}}</td>
                                        @endif
                                    
                                        <td>{{$data2->seats}}</td>
                                    </tr>
                                @else
                                @endif
                            @endforeach
                        </table>
                        </div>
                        @endif

                        @if($data33 == '1')
                        <div id="Certificate" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                @foreach($data3 as $data3) 
                                    @if($data3->id_degree_level == 3)              
                                        <tr>
                                            <td><a href="{{$data3->id}}">{{$data3->specialities}}</a></td>
                                            @if(empty($data3->price))
                                                <td>Budget</td>
                                            @else
                                                <td>{{$data3->price}}</td>
                                            @endif
                                        
                                            <td>{{$data3->seats}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        @endif

                        @if($data44 == '1')
                        <div id="Doctorate" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                @foreach($data4 as $data4) 
                                    @if($data4->id_degree_level == 4)
                                        <tr>
                                            <td><a href="{{$data4->id}}">{{$data3->specialities}}</a></td>
                                            @if(empty($data4->price))
                                                <td>Budget</td>
                                            @else
                                                <td>{{$data4->price}}</td>
                                            @endif
                                        
                                            <td>{{$data4->seats}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        @endif

                        @if($data55 == '1')
                        <div id="Masters" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                @foreach($data5 as $data5) 
                                    @if($data5->id_degree_level == 5)              
                                        <tr>
                                            <td><a href="{{$data5->id}}">{{$data5->specialities}}</a></td>
                                            @if(empty($data5->price))
                                                <td>Budget</td>
                                            @else
                                                <td>{{$data5->price}}</td>
                                            @endif
                                        
                                            <td>{{$data5->seats}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        @endif
                        
                        @if($data66 == '1')
                        <div id="Languages" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                @foreach($data6 as $data6) 
                                    @if($data6->id_degree_level == 6)              
                                        <tr>
                                            <td><a href="{{$data6->id}}">{{$data6->specialities}}</a></td>
                                            @if(empty($data6->price))
                                                <td>Budget</td>
                                            @else
                                                <td>{{$data6->price}}</td>
                                            @endif
                                        
                                            <td>{{$data6->seats}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        @endif

                        @if($data77 == '1')
                        <div id="Double" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                @foreach($data7 as $data7) 
                                    @if($data7->id_degree_level == 7)              
                                        <tr>
                                            <td><a href="{{$data7->id}}">{{$data7->specialities}}</a></td>
                                            @if(empty($data6->price))
                                                <td>Budget</td>
                                            @else
                                                <td>{{$data6->price}}</td>
                                            @endif
                                        
                                            <td>{{$data7->seats}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        @endif

                        @if($data88 == '1')
                        <div id="Official" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                @foreach($data8 as $data8) 
                                    @if($data8->id_degree_level == 8)              
                                        <tr>
                                            <td><a href="{{$data8->id}}">{{$data8->specialities}}</a></td>
                                            @if(empty($data8->price))
                                                <td>Budget</td>
                                            @else
                                                <td>{{$data8->price}}</td>
                                            @endif
                                        
                                            <td>{{$data8->seats}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        @endif

                        @if($data99 == '1')
                        <div id="Degree" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                @foreach($data9 as $data9) 
                                    @if($data9->id_degree_level == 9)              
                                        <tr>
                                            <td><a href="{{$data9->id}}">{{$data9->specialities}}</a></td>
                                            @if(empty($data9->price))
                                                <td>Budget</td>
                                            @else
                                                <td>{{$data9->price}}</td>
                                            @endif
                                        
                                            <td>{{$data9->seats}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        @endif

                        @if($data110 == '1')
                        <div id="PhD" class="tab-pane fade active active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                @foreach($data10 as $data10) 
                                    @if($data10->id_degree_level == 10)              
                                        <tr>
                                            <td><a href="{{$data10->id}}">{{$data10->specialities}}</a></td>
                                            @if(empty($data10->price))
                                                <td>Budget</td>
                                            @else
                                                <td>{{$data10->price}}</td>
                                            @endif
                                        
                                            <td>{{$data10->seats}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        @endif

                        @if($data111 == '1')
                        <div id="Continuing" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                @foreach($data11 as $data11) 
                                    @if($data11->id_degree_level == 11)              
                                        <tr>
                                            <td><a href="{{$data11->id}}">{{$data11->specialities}}</a></td>
                                            @if(empty($data11->price))
                                                <td>Budget</td>
                                            @else
                                                <td>{{$data11->price}}</td>
                                            @endif
                                        
                                            <td>{{$data11->seats}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        @endif

                        @if($data112 == '1')
                        <div id="Executive" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                @foreach($data12 as $data12) 
                                    @if($data12->id_degree_level == 12)              
                                        <tr>
                                            <td><a href="{{$data12->id}}">{{$data12->specialities}}</a></td>
                                            @if(empty($data12->price))
                                                <td>Budget</td>
                                            @else
                                                <td>{{$data12->price}}</td>
                                            @endif
                                        
                                            <td>{{$data12->seats}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        @endif

                        @if($data113 == '1')
                        <div id="Study" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                @foreach($data13 as $data13) 
                                    @if($data13->id_degree_level == 13)              
                                        <tr>
                                            <td><a href="{{$data13->id}}">{{$data13->specialities}}</a></td>
                                            @if(empty($data13->price))
                                                <td>Budget</td>
                                            @else
                                                <td>{{$data13->price}}</td>
                                            @endif
                                        
                                            <td>{{$data13->seats}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
          <!--  <h4>Title name of programm here</h4>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum necessitatibus earum reiciendis eligendi excepturi maiores sapiente, repellat inventore, sunt ea eaque esse autem iure illum laboriosam numquam! Quisquam, velit eum.
        </div>-->
        @endforeach
    </div>

<script>
    function tab(tab){
        switch(tab){
            case 'overview':
                $('#overview').removeClass('hidden');
                $('#programs').addClass('hidden');
                $('#photos').addClass('hidden');
            break;
            case 'programs':
                $('#overview').addClass('hidden');
                $('#programs').removeClass('hidden');
                $('#photos').addClass('hidden');
            break;
            case 'photos':
                $('#overview').addClass('hidden');
                $('#programs').addClass('hidden');
                $('#photos').removeClass('hidden');
            break;
        }
    }
</script>

    @endsection