<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        *{
            margin: 0;
            padding:0;
            text-decoration: none;
        }
        .mau-css{
            background-color: #008B8B;
        }
        .form-gap{
            display: block;
            margin-top: 140px;
            font-family: sans-serif;
        }
        .to-khung{
            padding:10px
        }

        p{
          font-size: 17px;  
        }
        span{
            font-size: 20px;  
        }
        input{
            font-size: 20px;  
        }     
        .input-group span{
            padding-top:10px;
            padding-right:25px;
        }
        .input-group input{
            font-size: 18px;  
        }
        .cao-1{
            padding-top:30px;
        }
        .form-group input{
            font-size: 20px;  
            border-radius:7px;
        }
    </style>
</head>
<body class="mau-css">
<div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default  to-khung">
              <div class="panel-body">
                <div class="text-center">
                  <h2><i class="fa fa-lock fa-5x"></i></h2>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>

                  <div class="panel-body cao-1">   
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>

                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
</body>
</html>