<?php error_reporting(E_ALL) ?>
<?php
    function __autoload($class) {
        $webClass = 'engine/class/class.'.$class.'.php';
        $appClass = 'engine/webservice/classes/'.$class.'.php';
        if(file_exists($webClass)) {
            require_once($webClass);
        }else if(file_exists($appClass)) {
            require_once($appClass);
        }
    }
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Online Subscription Portal - Divine Mercy</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="img/dmlogo.png" title="Favicon" />
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/main.css">

    <script src="js/vendor/modernizr-2.6.2.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/font-awesome.min.css" rel="stylesheet" media="screen">
    <link href="css/bootflat.css" rel="stylesheet" media="screen">
    <link href="css/bootflat-extensions.css" rel="stylesheet" media="screen">
    <link href="css/bootflat-square.css" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->


    <style type="text/css">

        ::-moz-selection {
            background: #b3d4fc;
            text-shadow: none;
        }

        ::selection {
            background: #b3d4fc;
            text-shadow: none;
        }

        html {
            font-size: 20px;
            line-height: 1.4;
            color: #737373;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            background: #f0f0f0;
        }

        body {
            background: #f0f0f0;
        }

        section {
            display:block;
            width: 380px;
            margin: 20px auto;
            padding: 20px 20px 30px;
            border: 1px solid #b3b3b3;
            border-radius: 4px;
            box-shadow: 0 1px 10px #a7a7a7, inset 0 1px 0 #fff;
            background: #fcfcfc;
        }

        .ontop{
            padding:5px;
            text-align:center;
            display:block;
            font-size:24px;
            border-bottom:1px solid #5c6666;
            color:#5c6666;
            margin-bottom:30px;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .footnote{
            display:block;
            color:#777;
            text-align:center;
            margin-top:25px;
        }

    </style>


</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<div class="wrapper">
    <section>

        <span class="ontop"> Activate Account</span>

        <?php
        if($_GET['user']){
            // get all users info here
            $account = new accounts();
            $apiKey = $_GET['user'];
            $user = $account->getAccount(['name','email','phone'],$apiKey);
            if($user['status'] == true){
        ?>

        <!-- <div class="alert alert-success alert-dismissable alert-square">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        this is an alert
        </div> -->
        <alert></alert>
        <form class="form-square" id="loginform" action="index.php" role="form">

            <div class="input-group input-group-lg input-group-btn-square">
                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                <input type="text" id="name" value="<?php echo $user['result']['name'] ?>" data-alert="name field is empty" class="form-control req" placeholder="Name" />
            </div>

            <br>

            <div class="input-group input-group-lg input-group-btn-square">
                <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                <input type="email"  id="email" value="<?php echo $user['result']['email'] ?>" data-alert="email field is empty" class="form-control req" placeholder="Email">
            </div>

            <br>

            <div class="input-group input-group-lg input-group-btn-square">
                <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                <input type="tel"  id="phone" value="<?php echo $user['result']['phone'] ?>" data-alert="phone number field is empty" class="form-control req" placeholder="Email">
            </div>

            <br>

            <div class="input-group input-group-lg input-group-btn-square">
                <span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
                <select class="form-control">
                    <option>Subscription type</option>
                    <option>3 months</option>
                    <option>2 months</option>
                    <option>1 month</option>
                </select>
            </div>


            <br>

            <button id="button" type="submit" class="btn btn-square btn-block btn-lg" ><i class="fa fa-sign-in fa-fw"></i> Subscribe</button>

        </form>

        <form class="loginform" method='post' action="<?php echo $ref; ?>">
        </form>

        <?php } else { ?>

                <p>The account you want to activate does not exist or has been removed
                    <a href="https://play.google.com/store/apps/details?id=com.dmasnig.udcreate">Download App here</a>
                </p>

        <?php } ?>


        <?php } else { ?>
            <p>This service can only be used if you were referred from the app
                <a href="https://play.google.com/store/apps/details?id=com.dmasnig.udcreate">Download App here</a>
            </p>

        <?php }?>

        <p class="footnote">&copy; DMAS NIGERIA <?php echo date('Y'); ?></p>
        <p class="footnote">Developed by
            <a href="http://www.udonline.net" style="color:#000;">UDCreate</a></p>
    </section>



</div><!-- End of Container -->

<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<script type="text/javascript">

    $(document).ready(function(){

        $('#loginform').on('submit', function(e){
            exit();

            $('.req').each(function(){
                var v = $.trim($(this).val()) ;
                if( v.length == 0  ){
                    $('alert').addClass('fa').addClass('notice').html( $(this).attr('data-alert') ).show();
                    exit();
                }
            });

            var username = $.trim( $('#username').val() ) ;
            var password = $.trim( $('#password').val() ) ;
            var loginData = { username : username , password : password , action : 'userLogin' } ;

            $('#button i').removeClass('fa-sign-in').addClass('fa-spinner').addClass('fa-spin');
            $('#button').attr('disabled','disabled');
            $.ajax({
                url: 'engine/ajax/user.php',
                data: loginData ,
                success: function(returnedData){
                    $('#button i').addClass('fa-sign-in').removeClass('fa-spinner').removeClass('fa-spin');
                    $('#button').removeAttr('disabled');
                    eval(returnedData);
                },
                error: function ( jqXHR, exception ) {
                    $('#button i').addClass('fa-sign-in').removeClass('fa-spinner').removeClass('fa-spin');
                    $('#button').removeAttr('disabled');
                    $('alert').removeAttr('class').addClass('error').html( Ajax_Error(jqXHR) ).show();
                }
            });


        });


    });

    function LoginSucces(){
        var message = "Login successfull" ;
        $('#loginform').removeAttr('id') ;
        $('alert').removeAttr('class').addClass('success').html(message).fadeIn('fast', function(){
            $('.loginform').submit();
        });
    }

    function LoginFailed(){
        var reason = 'Wrong username or password';
        $('alert').removeAttr('class').addClass('error').html( reason ).show();
    }

</script>
</body>
</html>
