@extends('layouts.app');

@section('title', 'Add a educational program')

@section('content')
<div class="menu-bg"></div>
<br><br>

    <div class="container">
            <h1>Add a educational program</h1>
    <div class="col-md-5 ">
        <form action="{{Route('addProgram')}}" method="Post" id="myForm">
            {{CSRF_Field()}}
            <div class="form-group" id="levelAfter">
                <label for="">Degree Level</label>
                <select name="level" id="levels" onchange="levell()" class="form-control">
                @foreach ($DegreeLevel as $Degree)
                    <option value="{{ $Degree->id }}">{{ $Degree->degreeLevel }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group" id="filedOfStudy">
                <label for="">Field of Study</label>
                <select name="specialities" id="" class="form-control">
                @foreach ($speciality as $spec)
                    <option value="{{ $spec->id }}">{{ $spec->specialities }}</option>
                @endforeach
                </select>
            </div>
          <!--  <div class="form-group">
                <label for=""></label>
                <select name="" id="" class="form-control">
                    <option value=""></option>
                </select>
            </div>-->
            <div class="form-group">
                <label for="budget">Budget </label>
                <div class="rdio rdio-default">
                    <input type="radio" name="budget" onclick="disab()" id="radioDefault" value="1">
                    <label for="radioDefault">Yes</label>
                    <input type="radio" name="budget" onclick="enab()" id="radioDefault2" value="0" checked="checked">
                    <label for="radioDefault2">No</label>
                </div>
            </div>
            <div class="form-group" >
                <label for="education_price">Cost of education</label>
                <div class="col-md-12 input-group">
                <input type="number" min="0" name="education_price" id="inputPrice" class="form-control" required>
                <div class="input-group-addon"> USD for a year</div>
                </div>
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <div class="col-md-12 input-group">
                <input type="number" min="0" name="duration" class="form-control" value="" required >
                <div class="input-group-addon"> months</div>
                </div>
            </div>
            <div class="form-group">
                <label for="place">Number of seats</label>
                <input type="number" min="0" name="place" class="form-control" value="" required >
            </div>

            <div class="form-group">
                <label for="place">Year</label>
                <input type="number" min="2016" name="year" class="form-control" value="" required >
            </div>
            <button type="submit" class="btn btn-success"><span class="fa fa-plus"></span> Add program</button>
            <button type="button" class="btn btn-danger" onclick="document.getElementById('myForm').reset();"><span class="fa fa-eraser"></span> Clear</button>

        </form>
        
    </div>
 
       <div class="col-md-12" style="margin-top:50px">
            <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'Associate')" id="defaultOpen">Associate / Community College</button>
            <button class="tablinks" onclick="openCity(event, 'Bachelors')">Bachelors / Undergraduate</button>
            <button class="tablinks" onclick="openCity(event, 'Certificate')">Certificate</button>
            <button class="tablinks" onclick="openCity(event, 'Doctorate')">Doctorate</button>
            <button class="tablinks" onclick="openCity(event, 'Masters')">Masters / Graduate</button>
            <button class="tablinks" onclick="openCity(event, 'Languages')">Languages</button>
            <button class="tablinks" onclick="openCity(event, 'Double')">Double degrees</button>
            <button class="tablinks" onclick="openCity(event, 'Official')">Official Degrees</button>
            <button class="tablinks" onclick="openCity(event, 'Degree')">Degree</button>
            <button class="tablinks" onclick="openCity(event, 'PhD')">PhD</button>
            <button class="tablinks" onclick="openCity(event, 'Continuing')">Continuing education</button>
            <button class="tablinks" onclick="openCity(event, 'Executive')">Executive education</button>
            <button class="tablinks" onclick="openCity(event, 'Study')">Study abroad</button>
            </div>
            
            <div id="Associate" class="tabcontent">
                <table class="table">
                    <tr>
                        <th>Specialities</th>
                        <th>Cost of education</th>
                        <th>Duration</th>
                        <th>Number of seats</th>
                        <th>Action</th>
                    </tr>
                    @foreach($data as $data) 
                        @if($data->id_degree_level == 1)              
                            <tr>
                                <td>{{$data->specialities}}</td>
                                @if(empty($data->price))
                                    <td>Budget</td>
                                @else
                                    <td>{{$data->price}}</td>
                                @endif
                            
                                <td>{{$data->duration}}</td>
                                <td>{{$data->seats}}</td>
                                <td>
                                    <form action="{{Route('editProgram')}}" method="Post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$data->id}}">
                                        <input type="hidden" name="token" value="{{bcrypt($data->id)}}">
                                        <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                        <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                    </form>
                                </td>
                            </tr>
                        @else
                        @endif
                    @endforeach
                </table>
            </div>
            
            <div id="Bachelors" class="tabcontent">
                    <table class="table">
                    <tr>
                        <th>Specialities</th>
                        <th>Cost of education</th>
                        <th>Duration</th>
                        <th>Number of seats</th>
                        <th>Action</th>
                    </tr>
                    @foreach($data2 as $data2) 
                        @if($data2->id_degree_level == 2)              
                            <tr>
                                <td>{{$data2->specialities}}</td>
                                @if(empty($data2->price))
                                    <td>Budget</td>
                                @else
                                    <td>{{$data2->price}}</td>
                                @endif
                            
                                <td>{{$data2->duration}}</td>
                                <td>{{$data2->seats}}</td>
                                <td>
                                    <form action="{{Route('editProgram')}}" method="Post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$data2->id}}">
                                        <input type="hidden" name="token" value="{{bcrypt($data->id)}}">
                                        <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                        <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                    </form>
                                </td>
                            </tr>
                        @else
                        @endif
                    @endforeach
                </table>
            </div>
            
            <div id="Certificate" class="tabcontent">
                    <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            @foreach($data3 as $data3) 
                                @if($data3->id_degree_level == 3)              
                                    <tr>
                                        <td>{{$data3->specialities}}</td>
                                        @if(empty($data3->price))
                                            <td>Budget</td>
                                        @else
                                            <td>{{$data3->price}}</td>
                                        @endif
                                    
                                        <td>{{$data3->duration}}</td>
                                        <td>{{$data3->seats}}</td>
                                        <td>
                                            <form action="{{Route('editProgram')}}" method="Post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$data3->id}}">
                                                <input type="hidden" name="token" value="{{bcrypt($data->id)}}">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                </div>

            <div id="Doctorate" class="tabcontent">
                    <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            @foreach($data4 as $data4) 
                                @if($data4->id_degree_level == 4)              
                                    <tr>
                                        <td>{{$data3->specialities}}</td>
                                        @if(empty($data4->price))
                                            <td>Budget</td>
                                        @else
                                            <td>{{$data4->price}}</td>
                                        @endif
                                    
                                        <td>{{$data4->duration}}</td>
                                        <td>{{$data4->seats}}</td>
                                        <td>
                                            <form action="{{Route('editProgram')}}" method="Post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$data4->id}}">
                                                <input type="hidden" name="token" value="{{bcrypt($data->id)}}">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                </div>
                
                <div id="Masters" class="tabcontent">
                        <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Duration</th>
                                    <th>Number of seats</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($data5 as $data5) 
                                    @if($data4->id_degree_level == 5)              
                                        <tr>
                                            <td>{{$data5->specialities}}</td>
                                            @if(empty($data5->price))
                                                <td>Budget</td>
                                            @else
                                                <td>{{$data5->price}}</td>
                                            @endif
                                        
                                            <td>{{$data5->duration}}</td>
                                            <td>{{$data5->seats}}</td>
                                            <td>
                                                <form action="{{Route('editProgram')}}" method="Post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="id" value="{{$data5->id}}">
                                                    <input type="hidden" name="token" value="{{bcrypt($data->id)}}">
                                                    <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                    <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                    </div>
        
                    <div id="Languages" class="tabcontent">
                        <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            @foreach($data6 as $data6) 
                                @if($data6->id_degree_level == 6)              
                                    <tr>
                                        <td>{{$data6->specialities}}</td>
                                        @if(empty($data6->price))
                                            <td>Budget</td>
                                        @else
                                            <td>{{$data6->price}}</td>
                                        @endif
                                    
                                        <td>{{$data6->duration}}</td>
                                        <td>{{$data6->seats}}</td>
                                        <td>
                                            <form action="{{Route('editProgram')}}" method="Post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$data6->id}}">
                                                <input type="hidden" name="token" value="{{bcrypt($data->id)}}">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
        
                    <div id="Double" class="tabcontent">
                        <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            @foreach($data7 as $data7) 
                                @if($data7->id_degree_level == 7)              
                                    <tr>
                                        <td>{{$data7->specialities}}</td>
                                        @if(empty($data6->price))
                                            <td>Budget</td>
                                        @else
                                            <td>{{$data6->price}}</td>
                                        @endif
                                    
                                        <td>{{$data7->duration}}</td>
                                        <td>{{$data7->seats}}</td>
                                        <td>
                                            <form action="{{Route('editProgram')}}" method="Post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$data7->id}}">
                                                <input type="hidden" name="token" value="{{bcrypt($data->id)}}">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
        
                    <div id="Official" class="tabcontent">
                        <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            @foreach($data8 as $data8) 
                                @if($data8->id_degree_level == 8)              
                                    <tr>
                                        <td>{{$data8->specialities}}</td>
                                        @if(empty($data8->price))
                                            <td>Budget</td>
                                        @else
                                            <td>{{$data8->price}}</td>
                                        @endif
                                    
                                        <td>{{$data8->duration}}</td>
                                        <td>{{$data8->seats}}</td>
                                        <td>
                                            <form action="{{Route('editProgram')}}" method="Post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$data8->id}}">
                                                <input type="hidden" name="token" value="{{bcrypt($data->id)}}">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
        
                    <div id="Degree" class="tabcontent">
                        <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            @foreach($data9 as $data9) 
                                @if($data->id_degree_level == 9)              
                                    <tr>
                                        <td>{{$data9->specialities}}</td>
                                        @if(empty($data9->price))
                                            <td>Budget</td>
                                        @else
                                            <td>{{$data9->price}}</td>
                                        @endif
                                    
                                        <td>{{$data9->duration}}</td>
                                        <td>{{$data9->seats}}</td>
                                        <td>
                                            <form action="{{Route('editProgram')}}" method="Post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$data9->id}}">
                                                <input type="hidden" name="token" value="{{bcrypt($data->id)}}">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
        
                    <div id="PhD" class="tabcontent">
                        <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            @foreach($data10 as $data10) 
                                @if($data10->id_degree_level == 10)              
                                    <tr>
                                        <td>{{$data10->specialities}}</td>
                                        @if(empty($data10->price))
                                            <td>Budget</td>
                                        @else
                                            <td>{{$data10->price}}</td>
                                        @endif
                                    
                                        <td>{{$data10->duration}}</td>
                                        <td>{{$data10->seats}}</td>
                                        <td>
                                            <form action="{{Route('editProgram')}}" method="Post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$data10->id}}">
                                                <input type="hidden" name="token" value="{{bcrypt($data->id)}}">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
        
                    <div id="Continuing" class="tabcontent">
                        <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            @foreach($data11 as $data11) 
                                @if($data11->id_degree_level == 11)              
                                    <tr>
                                        <td>{{$data11->specialities}}</td>
                                        @if(empty($data11->price))
                                            <td>Budget</td>
                                        @else
                                            <td>{{$data11->price}}</td>
                                        @endif
                                    
                                        <td>{{$data11->duration}}</td>
                                        <td>{{$data11->seats}}</td>
                                        <td>
                                            <form action="{{Route('editProgram')}}" method="Post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$data11->id}}">
                                                <input type="hidden" name="token" value="{{bcrypt($data->id)}}">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
        
                    <div id="Executive" class="tabcontent">
                        <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            @foreach($data12 as $data12) 
                                @if($data12->id_degree_level == 12)              
                                    <tr>
                                        <td>{{$data12->specialities}}</td>
                                        @if(empty($data12->price))
                                            <td>Budget</td>
                                        @else
                                            <td>{{$data12->price}}</td>
                                        @endif
                                    
                                        <td>{{$data12->duration}}</td>
                                        <td>{{$data12->seats}}</td>
                                        <td>
                                            <form action="{{Route('editProgram')}}" method="Post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$data12->id}}">
                                                <input type="hidden" name="token" value="{{bcrypt($data->id)}}">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
        
                    <div id="Study" class="tabcontent">
                        <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            @foreach($data13 as $data13) 
                                @if($data13->id_degree_level == 13)              
                                    <tr>
                                        <td>{{$data13->specialities}}</td>
                                        @if(empty($data13->price))
                                            <td>Budget</td>
                                        @else
                                            <td>{{$data13->price}}</td>
                                        @endif
                                    
                                        <td>{{$data13->duration}}</td>
                                        <td>{{$data13->seats}}</td>
                                        <td>
                                            <form action="{{Route('editProgram')}}" method="Post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$data13->id}}">
                                                <input type="hidden" name="token" value="{{bcrypt($data->id)}}">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
               </div>  
    </div>
</div>
<script>
//language

function levell(){
    
    if ($('#levels').val() == '6'){
        $('#filedOfStudy').addClass('form-group hidden');
        $('#levelAfter').after(`
            <div class="form-group" id="delLang">
                <label for="">Language</label>
                <input type="text" name="language" class="form-control">
            </div>
        `);
    }else{
        $('#delLang').remove();
        $('#filedOfStudy').removeClass('hidden'); 
    }
   
}

// price textBox
function disab(){
    $('#inputPrice').attr('disabled', 'disabled');
    $('#inputPrice').removeAttr('required');
}

function enab() {
    $('#inputPrice').removeAttr('disabled');
    $('#inputPrice').attr('required', 'required');
}


// tabs
    document.getElementById("defaultOpen").click();

    function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
@endsection