<!--login Modal window -->
    <!-- <div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog"> -->

        <!-- Modal content-->
        <!--
        <div class="modal-content">
            <div class="col-md-12">
                <button type="button" class="close" data-dismiss="modal" style="color:#f9059a;font-size:13px; margin:15px 0 20px 0">CLOSE</button>
            </div><br><br><br>
            <div class="modal-container">
              
                <form action="{{url('/login')}}" method="POST" id="loginForm" novalidate>
                    <div class="form-group"     id="email-div">
                        {{ csrf_field() }}
                        <label class="control-label" for="email">Email</label>
                        <div class="input-group">
                                <div class="input-group-addon">@</div>
                        <input id="email" type="email" placeholder="example@gmail.com" title="Please enter you email" required name="email" class="form-control" required>   
                        </div>
                        {{-- <div id="form-errors-email" class="has-error"></div> --}}
                        <span class="help-block">
                            <strong id="form-errors-email"></strong>
                        </span>
                    </div>

                    <div class="form-group" id="password-div">
                        <label class="control-label" for="password">Password</label>
                        <div class="input-group">
                        <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
                            <input type="password" title="Please enter your password" placeholder="******"  name="password" id="password" class="form-control" required> 
                        </div>
                        <span class="help-block">
                            <strong id="form-errors-password"></strong>
                        </span>
                    </div>
                    <div class="form-group" id="login-errors">
                        <span class="help-block">
                            <strong id="form-login-errors"></strong>
                        </span>
                    </div>
                

                <div class="text-right"><a href="{{ url('/password/reset') }}" style="color:#606060; margin-top:20px">Forgot Password?</a></div><br>
                <div class="col-md-6 text-right"><span class=""><a href="" data-dismiss="modal" data-toggle="modal" data-target="#registerModal" class="btn btn-link" style="color:#f9059a; border:none">Create new account</a> </span></div>
                <div class="col-md-6 text-right">
                    <button class="btn btn-success btn-xs" style="height:35px; width:200px;">LOGIN</button>
                </div><br><br><br>
                <hr>
                </form>
                <div class="col-md-12 col-xs-12 text-center" style="margin-top:-30px;"><span style="color:#808080;margin-top:-50px;background-color:white;width:50px">OR</span></div><br>
                <div class="row">
                        <div class="col-md-6">
                            <a href="{{ url('/auth/facebook') }}" class="btn btn-block btn-social btn-facebook">
                                <span class="fa fa-facebook text-center"></span> LOGIN WITH FACEBOOK
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/auth/google') }}" class="btn btn-block btn-social btn-google">
                                <span class="fa fa-google"></span> LOGIN WITH GOOGLE
                            </a><br><br>
                        </div>
                    </div>  
            </div>

        </div>

    </div>
    </div>
-->
    <!-- End login modal window -->

     <!--register Modal window -->

     <!-- <div id="registerModal" class="modal fade" role="dialog">
    <div class="modal-dialog"> -->

        <!-- Modal content-->
        <!--
        <div class="modal-content">
            <div class="col-md-12">
                <button type="button" class="close" data-dismiss="modal" style="color:#f9059a;font-size:13px; margin:15px 0 20px 0">CLOSE</button>
            </div><br><br><br>
            <div class="modal-container">

            <form action="{{url('/register')}}" method="POST" id="registerForm">
                        <div class="alert alert-success" id="reg_success" style="display:none;"></div>
                        <div class="form-group" id="register-email">
                            {{ csrf_field() }}
                            <label class="control-label" for="email">Email</label>
                            <div class="input-group">
                                <div class="input-group-addon"> @</div>
                                    <input id="email" type="email" placeholder="example@gmail.com" title="Please enter you email" required name="email" class="form-control">
                            </div>
                            <span class="help-block">
                                <strong id="register-errors-email"></strong>
                            </span>
                        </div>
                        <div class="form-group" id="register-password">
                            <label class="control-label" for="password">Password</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
                                <input type="password" title="Please enter your password" placeholder="******" required name="password" id="password" class="form-control">
                            </div>
                            <span class="help-block">
                                <strong id="register-errors-password"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="control-label">Confirm Password</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
                                 <input id="password-confirm" type="password" class="form-control" placeholder="******" name="password_confirmation">
                            </div>
                            <span class="help-block">
                                <strong id="form-errors-password-confirm"></strong>
                            </span>
                        </div>

                        <div class="form-group" id="login-errors">
                            <span class="help-block">
                                <strong id="form-login-errors"></strong>
                            </span>
                        </div>
                        <br>
                <div class="col-md-6 text-right"><span class=""><a href="" data-dismiss="modal" data-toggle="modal" data-target="#loginModal" class="btn btn-link" style="color:#f9059a">Already have an account?</a> </span></div>
                <div class="col-md-6 text-right">
                    <button class="btn btn-success btn-xs" style="height:35px; width:200px;">SIGN UP</button>
                </div><br><br><br>
                <hr>
                    </form>

                <div class="col-md-12 col-xs-12 text-center" style="margin-top:-30px;"><span style="color:#808080;margin-top:-50px;background-color:white;width:50px">OR</span></div><br>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ url('/auth/facebook') }}" class="btn btn-block btn-social btn-facebook">
                                <span class="fa fa-facebook text-center"></span> LOGIN WITH FACEBOOK
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/auth/google') }}" class="btn btn-block btn-social btn-google">
                                <span class="fa fa-google"></span> LOGIN WITH GOOGLE
                            </a><br><br>
                        </div>
                    </div>     
                    
            </div>

        </div>

    </div>
    </div>

-->
    <!-- End register modal window -->


<link rel="stylesheet" href="{{URL::to('css/modalStyle.css')}}">



    <div id="m_form">
   <div class="modal fade login" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="modal-menu">
                <li class="log-in"><a href="#" onclick="showsignin()" class="btn btn-default">Log in</a></li>
                    <li class="sign-up"><a href="#" class="btn btn-default" onclick="javascript:showsignup()"> Sign up</a></li>
                    
                </ul>
            </div>
            <div class="modal-body" id="signin">
            <div class="box">
            <form action="{{url('/login')}}" method="POST" id="loginForm" novalidate>
                {{ csrf_field() }}
                <div class="content">
                     <div class="center">
                     <div class="modal-mail" id="email-div">
                         <span class="help-email">Email *</span>
                         <input id="email" type="email" placeholder="example@gmail.com" title="Please enter you email" required name="email" class="form-control" required>   
                         </div>
                     {{-- <div id="form-errors-email" class="has-error"></div> --}}
                    <span class="help-block">
                        <strong class="text-danger" id="form-errors-email"></strong>
                    </span>

                        <div class="modal-password" id="password-div">
                         <span class="help-password">Password *</span>

                         <input type="password" title="Please enter your password" placeholder="******"  name="password" id="password" class="form-control" required> 
                         <span class="help-block">
                            <strong id="form-errors-password"></strong>
                        </span>
                        </div>
                        <div class="form-group" id="login-errors">
                        <span class="help-block">
                            <strong id="form-login-errors"></strong>
                        </span>
                    </div>
                         <button class="btn btn-primary">Log in</button>
                     </div>
            </form>
                </div>
            </div>
            <p class="cd-form-bottom-message"><a href="#0" onclick="showpass()">Forgot your password?</a></p>
            </div>



            <div class="modal-body" id="signup">
            <div class="box">
               <div class="content">
                    <div class="sociall">
                        <a class="btn btn-default facebook" href="#"><i class="fa fa-facebook" style="background-color: inherit;padding: 0;margin: 0;"></i> Connect with Facebook</a>
                        <a class="btn btn-default google" href="#"> <i class="fa fa-google"></i>Connect with Google</a>
                    </div>
                    <form action="{{url('/register')}}" method="POST" id="registerForm">
                        {{ csrf_field() }}
                     <div class="division">
                        <div class="line l"></div>
                        <span>or</span>
                        <div class="line r"></div>
                     </div>
                      <div class="center">
                     <div class="modal-mail" id="register-email">
                         <span class="help-email">Email *</span>
                         <input id="email" type="email" placeholder="example@gmail.com" title="Please enter you email" required name="email" class="form-control">
                     </div>
                     <span class="help-block">
                        <strong class="text-danger" id="register-errors-email"></strong>
                    </span>
                    <div class="modal-password" id="register-password">
                        <span class="help-password">Password *</span>
                        <input type="password" title="Please enter your password" placeholder="******" required name="password" id="password" class="form-control">                        </div>
                        <span class="help-block">
                            <strong class="text-danger" id="register-errors-password"></strong>
                        </span>
                        <div class="modal-password">
                        <span class="help-password">Confirm Password *</span>
                            <input id="password-confirm" type="password" class="form-control" placeholder="******" name="password_confirmation">
                        </div>
                        <span class="help-block">
                            <strong class="text-danger" id="form-errors-password-confirm"></strong>
                        </span>
                         <button type="submit" class="btn btn-primary">Sign up</button>
                     </div>
                    </div>
                    </form>
                </div> 
            </div>
            
            <div class="modal-body" id="forgot_password">
             <div class="box">
                <div class="content">

                     <div class="center">
                     <p style="text-align:  center; 
                     margin: 5px;">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>
                     <div class="modal-mail">
                         <span class="help-email">Email *</span>
                         <input class="form-control email">
                     </div>
                        
                         <button class="btn btn-primary">Reset password</button>
                     </div>
                   
                </div>
               
            </div>
              
            <p class="cd-form-bottom-message"><a href="#0" onclick="showsignin()">Back to Log in</a></p>
            </div>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div> 



<script type="text/javascript">
    function showsignup(){
        var sup=document.getElementById('signup');
            sup.style.display='block';

        var sin=document.getElementById('signin');
            sin.style.display='none';
            var pass=document.getElementById('forgot_password');
            pass.style.display='none';
       

    }
    function showpass(){
        var sup=document.getElementById('signup');
            sup.style.display='none';

        var sin=document.getElementById('signin');
            sin.style.display='none';
       var pass=document.getElementById('forgot_password');
            pass.style.display='block';

    }
    function showsignin(){
        var sup=document.getElementById('signup');
            sup.style.display='none';
        var sin=document.getElementById('signin');
            sin.style.display='block';
            var pass=document.getElementById('forgot_password');
            pass.style.display='none';
    }
</script>



<!-- register -->
<script type="text/javascript">
    $(document).ready(function(){

//Login
var loginForm = $("#loginForm");

        loginForm.submit(function(e){
            e.preventDefault();
            var formData = loginForm.serialize();
            $( '#form-errors-email' ).html( "" );
            $( '#form-errors-password' ).html( "" );
            $( '#form-login-errors' ).html( "" );
            $("#email-div").removeClass("has-error");
            $("#password-div").removeClass("has-error");
            $("#login-errors").removeClass("has-error");

            $.ajax({
                url:'/login',
                type:'POST',
                data:formData,
                success:function(data){
                    $('#loginModal').modal( 'hide' );
                    location.reload(true);
                },
                error: function (data) {
                    console.log(data.responseText);
                    var obj = jQuery.parseJSON( data.responseText );
                    if(obj.email){
                        $("#email-div").addClass("has-error");
                        $( '#form-errors-email' ).html( obj.email );
                    }
                    if(obj.password){
                        $("#password-div").addClass("has-error");
                        $( '#form-errors-password' ).html( obj.password );
                    }
                    if(obj.error){
                        $("#login-errors").addClass("has-error");
                        $( '#form-login-errors' ).html( obj.error );
                    }
                }
            });
        });

//Register
        var registerForm = $("#registerForm");

        registerForm.submit(function(e){
            e.preventDefault();
            var formData = registerForm.serialize();
            $( '#register-errors-email' ).html( "" );
            $( '#register-errors-password' ).html( "" );
            $("#register-email").removeClass("has-error");
            $("#register-password").removeClass("has-error");

            $.ajax({
                url:'/register',
                type:'POST',
                data:formData,
                success:function(data){
					//location.reload(true);
					$('#registerModal').modal( 'show' );
					$('#reg_success').show();
                    $('#reg_success').html(' <strong>Thank you for registering!</strong> An e-mail has been sent to this e-mail. To complete the registration, please click on the link from this email.');
                  location.reload();
                },
                error: function (data) {
                    console.log(data.responseText);
                    $("#error").html(data.responseText);
                    var obj = jQuery.parseJSON( data.responseText );
                    if(obj.email){
                        $("#register-email").addClass("has-error");
                        $( '#register-errors-email' ).html( obj.email );
                    }
                    if(obj.password){
                        $("#register-password").addClass("has-error");
                        $( '#register-errors-password' ).html( obj.password );
                    }
                    if(obj.error){
                        // $("#login-errors").addClass("has-error");
                        // $( '#form-login-errors' ).html( obj.error );
                    }
                }
            });
        });
    });
</script>
