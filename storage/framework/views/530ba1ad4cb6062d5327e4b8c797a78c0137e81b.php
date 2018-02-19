<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Верификация аккаунта</title>
    <style>
        
        body{
            color:rgba(49,57,69);
        }
        .main{
            border-top-right-radius:4px;
            border-top-left-radius:4px;
            border:1px solid rgba(49,57,69);
        }
        .header{
            background:rgb(49, 57, 69);
            padding: 20px;
            text-align: center;
            border-top-right-radius:4px;
            border-top-left-radius:4px;
        }
        .footer{
            padding: 40px;
        }
        .btn-primary {
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
}
.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}
        .logo{
            color:white;
        }
    </style>
</head>
<body>
   <div class="main">
   <div class="header">
       <h3 class="logo">Tajfreelance.com</h3>
   </div>
   <div class="footer">
    <h1 class="alert alert-info">Спасибо за регистрацию <?php echo e($user->name); ?></h1>

    <p class="alert alert-">
        Активируйте аккаунт перейдя по этой  <a href='<?php echo e(url("register/confirm/{$user->email_token}")); ?>'>
            <button class="btn btn-primary">ссылке</button>
        </a> 
    </p>
    </div>   
   </div>
    
</body>
</html>