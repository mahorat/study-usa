@extends('layouts.app');

@section('title', 'Add a educational program')

@section('content')
<div class="menu-bg"></div>
<br><br>

    <div class="container">
        <h1>Add a educational program</h1>
    <div class="col-md-5 ">
        <form action="{{Route('editProgramm')}}" method="Post" id="myForm">
            {{CSRF_Field()}}
            <input type="hidden" name="id" value="{{$data->id}}">
            <input type="hidden" name="token" value="{{bcrypt($data->id)}}">
            <div class="form-group" id="levelAfter">
                <label for="">Degree Level</label>
                <select name="level" id="levels" class="form-control" onchange="levell()">
                @foreach ($DegreeLevel as $Degree)
                    @if($data->id_degree_level == $Degree->id)
                        <option value="{{ $Degree->id }}" selected>{{ $Degree->degreeLevel }}</option>
                    @else
                        <option value="{{ $Degree->id }}">{{ $Degree->degreeLevel }}</option>
                    @endif
                @endforeach
                </select>
            </div>
            @if(empty($data->spec))
            <div class="form-group" id="filedOfStudy">
                <label for="">Field of Study</label>
                <select name="specialities" id="" class="form-control">
                @foreach ($speciality as $speciality)
                    @if ($data->id_specialities == $speciality->id)
                        <option value="{{ $speciality->id }}" selected>{{ $speciality->specialities }}</option>
                    @else
                        <option value="{{ $speciality->id }}">{{ $speciality->specialities }}</option>
                    @endif
                @endforeach
                </select>
            </div>
            @else

            @endif
            <div class="form-group">
                <label for="budget">Budget </label>
                <div class="rdio rdio-default">
                    @if($data->budget == 1)
                        <input type="radio" name="budget" onclick="disab()" id="radioDefault" value="1" checked="checked">
                        <label for="radioDefault" >Yes</label>
                        <input type="radio" name="budget" onclick="enab()" id="radioDefault" value="0">
                        <label for="radioDefault">No</label>
                    @else
                        <input type="radio" name="budget" onclick="disab()" id="radioDefault" value="1" >
                        <label for="radioDefault">Yes</label>
                        <input type="radio" name="budget" onclick="enab()" id="radioDefault" value="0" checked="checked">
                        <label for="radioDefault">No</label>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="education_price">Cost of education</label>
                <div class="col-md-12 input-group">
                @if($data->budget == 1)
                    <input type="number" min="0" id="inputPrice" name="education_price" class="form-control"  disabled>
                @else
                    <input type="number" min="0" id="inputPrice" name="education_price" value="{{ $data->price }}" class="form-control">
                @endif
                <div class="input-group-addon"> USD for a year</div>
                </div>
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <div class="col-md-12 input-group">
                <input type="number" min="0" name="duration" class="form-control" value="{{ $data->duration }}" required >
                <div class="input-group-addon"> months</div>
                </div>
            </div>
            <div class="form-group">
                <label for="place">Number of seats</label>
                <input type="number" min="0" name="place" class="form-control" value="{{ $data->seats }}" required >
            </div>

            <div class="form-group">
                <label for="place">Year</label>
                <input type="number" min="2016" name="year" class="form-control" value="{{ $data->year }}" required >
            </div>

            <button type="submit" class="btn btn-success"><span class="fa fa-pencil"></span> Edit program</button>
            <button type="button" class="btn btn-danger" onclick="document.getElementById('myForm').reset();"><span class="fa fa-eraser"></span> Clear</button>

        </form>

        
    </div>

    </div>
<script>
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


</script>
@endsection