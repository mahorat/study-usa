var priceMin;
var priceMax;
var allState = [];
var specs = [];

$(document).ready(function(){
cchange();

getSpec();

function getSpec(){
    var spec_id = $("select[name='spec_id']").val();
    var _token = $("input[name='_token']").val();

    $.ajax({
        url: "/getSpec",
        type:'POST',
        data: {spec_id:spec_id, _token:_token},
        success: function(data) {
            specs = data;
            selectt();
        }
    });
}

$('#budget').click(function(){
    if ($('#budget').is(':checked')){
        cchange();
    }else{
        cchange();
    }
})

});

function selectt(){
    var spec_id = $("select[name='spec_id']").val();
    var univer = `<option value="0" >All Levels</option>`;
    var college = `<option value="0" >All Levels</option> 
                   <option value="1" >Associate</option>
                   <option value="3" >Certificate</option>                 
    `;

    switch(spec_id){
        case '0':
        break;
        case '1':
            $('#specId').html(college);
        break;
        case '2':
            for (let spec of specs) {
                univer += `<option value="${spec.id}">${spec.degreeLevel}</option>`;
            }
            $('#specId').html(univer);
        break;
    }
    cchange();
}

function cchange(){
var pri = '';
if($('#budget').is(':checked')){
    pri = '0, 0';
}else{
    $("#price").val() == null ? pri = '0, 1000000000000000' : pri = $("#price").val();
}

        var _token = $("input[name='_token']").val();
        var level = $("select[name='level']").val();
        var spec = $("select[name='spec']").val();
        var spec_id = $("select[name='spec_id']").val();
        var school_location = $("select[name='school_location']").val();

        $.ajax({
            url: "/searchProgram",
            type:'POST',
            data: {
                _token: _token, 
                level: level, 
                spec: spec, 
                school_location: school_location,
                spec_id:spec_id,
                pri:pri,
                
            },
            beforeSend: function(){
                $('#listPrograms').html(`
                    <div id="spinner" class=" text-center">
                        <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                        <span class="sr-only">Loading...</span>
                    </div>
                `);
            },
            success: function(data) {
                allState = data.state;
                data.programs.length == 0 ? showEmptyProgram() : printProgram(data.programs);

                console.log(data.programs);
            }
        });


    function printProgram (programs) {
        var prog = '';

        for (let program of programs){
            prog += `
                <div class="search-programs">
                    <a href="program_detail/${program.id}" ><h3>${program.specialities}</h3></a>
                    
                    <p class="univer-name"><a href=""></a>${program.university_name}</a> | ${program.city}, ${state(program.id_state)}</p>
                    <span class="pricess"><span class="fa fa-money"></span> ${price(program.price)}</span>
                    <span class="pricess"><span class="fa fa-clock-o"></span> ${year(program.duration)}</span>
                    <span class="pricess"><span class="fa fa-university"></span> On campus</span>
                    <span class="pricess"><span class="fa fa-comments-o"></span> English</span><br>

                    <div class="row description-univer">
                        <div class=" col-md-2">
                            <img src="${logo(program.logo, program.user_id)}" alt="" class="img-thumbnail">
                        </div>
                        <div class="col-md-10">
                               ${program.short_description}
                        </div>
                    </div>
                    <div class="text-right" style="margin-top:10px;">
                        <button id="program${program.id}" class="btn btn-primary" onclick="addFavorite(${program.id})"><span class="fa fa-plus"></span> Select</button>
                    </div>
                </div>
            `
        }
        $('#listPrograms').html(prog);
    }
    
    function showEmptyProgram(){
        $('#listPrograms').html(`
            <div id="spinner" class=" text-center">
                <img width="50%" src="../../../img/No-results-found.jpg"/>
            </div>
        `);
    }

    function state(state){
        for(var i = 0; i<=allState.length; i++){
            if(allState[i].id == state){
                return allState[i].state;
            }
        }
    }

    function price(price){
        if( price == 0 ){
            return 'Budget';
        }else{
            return price + ' EUR / year';
        }
    }

    function logo(logo, id){
        let path = '../../../storage/app/UniverDocs/'+id+'/';
        return logo == null ? '../../../img/no-logo.jpg' : path+logo;
    }

    function year(months) {
        var dur1 = Math.floor(months/12)
        var dur2 = (months/12)-dur1
        var dur3 = Math.floor(dur2*12);
        if(dur1 !== 0){
            if(dur3 == 0){
                return dur1 == 1 ? dur1+" year" : dur1+" years";
            }else{
                return dur3 == 1 ? dur1+" years and "+dur3+ " month" : dur1+" years and "+dur3+ " months";
            }
        }else{
            return dur3+ " months";
        }
    } 
}

function submitForm(){
    $('#submit').trigger('click');
}


// add favorite
function addFavorite(id_program){
    var _token = $("input[name='_token']").val();
    var txt = '';

    $.ajax({
        url: "/addFavorite",
        type:'POST',
        data: {
            _token: _token,
            id_program: id_program,
        },
        beforeSend: function(){
//			
        },
        success: function(data) {
            printFav(data);
        }
    });
}

function printFav(data){
    console.log(data);
    var txt = '';

    for(let fav of data){
        txt+=`
            <li class="list-group-item">
                <div class="row">
                <a href="program_detail/${fav.prog_id}">
                    <div class="col-md-10">
                        ${fav.specialities}<br>
                        ${fav.university_name}
                    </div>
                </a>
                    <div class="col-md-2 text-right">
                        <button type="button" class="btn btn-danger btn-xs" onclick='delProgram(${fav.id})'>
                            <span class="fa fa-remove"></span>
                        </button>
                    </div>                
                </div>
            </li>
        `
    }
        if(data.length > 0){
            $('#cartt').html(txt);
            $('.badge').text(data.length);
        }else{
            $('#cartt').html('');
            $('.badge').text(0);
        }
}

function delProgram(id){
var _token = $("input[name='_token']").val();

    $.ajax({
        url: "/delFavorite",
        type:'POST',
        data: {
            _token:_token,
            id: id,
        },
        success: function(data) {
            printFav(data);
        }
    });
}