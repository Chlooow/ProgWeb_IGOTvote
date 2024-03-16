<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> AghaVote </title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="login.js"></script> <!-- Lien vers votre fichier JavaScript -->

    <style>
        body {
            background-color: lightgreen; /* Change la couleur de fond en vert */
        }
    </style>
    <style type= "text/css">
        #alert, #register-box
        { display: none; }
    </style>
</head>

<!-- BACKGROUND -->
<body class="bg-lightgreen">

    <!-- ALERTE -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4 offset-lg-4" id="alert">
                <div class="alert alert-success">
                    <strong id="result">hello world</strong>
                </div>
            </div>
        </div>

        <!--LOGIN FORM -->

        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="login-box">
                <h2 class="text-center mt-2">L O G I N</h2>
                <!--<form action="" method="post" role="form" class="p-2" id="login-frm">-->
                    <div class="form-group">
                        <input type="text" name="username" class="form-control mb-2" placeholder="Username" required autocomplete="on">
                    </div>
                    <div class="form-group">
                        <input type="password" name="pswrd" class="form-control mb-2" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="rem" class="custom-control-input" id="customCheck">
                            <label for="customCheck" class="customCheck custom-control-label">Remember Me</label>
                            <a href="#" class="float-end" id="forgot-btn">Forgot Password ?</a>
                        </div>
                    </div>
                    <div class="for-group">
                        <div class="form-group text-center">
                            <!--<input type="submit" class="btn btn-darkgreen btn-block btn-success mt-3 mb-3" name="login" value="Login">-->
                            <button class="btn btn-darkgreen btn-block btn-success mt-3 mb-3" onclick="console.log('fff');login()"  name="login" value="Login"> login </button>
                        </div>
                        <div class="form-group">
                            <p class=" text-center" > New IGOT7 ? 
                                <a href="#" class="mt-3" id="register-btn"> Sign up now ! </a>
                            </p>
                        </div>
                    </div>
                <!--</form>-->
            </div>
        </div>

<!-- SIGN UP FORM -->

                <div class="row">
                    <div class="col-lg-4 offset-lg-4 bg-light rounded" id="register-box">
                        <h2 class="text-center mt-2">S I G N U P</h2>
                        <!--<form action="add_user.php" method="post" role="form" class="p-2" id="register-frm">-->
                            <div class="form-group">
                                <input type="text" name="name" class="form-control mb-2" placeholder="full name" required autocomplete="on">
                            </div>

                            <div class="form-group">
                                <input type="text" name="usrname" class="form-control mb-2" placeholder="Username" required autocomplete="on">
                            </div>

                            <div class="form-group">
                                <input type="text" name="email" class="form-control mb-2" placeholder="E-mail" required autocomplete="on">
                            </div>

                            <div class="form-group">
                                <input type="password" name="pswrd" id="pswrd" class="form-control mb-2" placeholder="Password" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <input type="password" name="cpswrd" id="cpswrd" class="form-control mb-2" placeholder="Confirm Password" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="rem" class="custom-control-input" id="customCheck2">
                                    <label for="customCheck2" class="customCheck custom-control-label text-center">I agree to the <a href="#" title=""> Terms & conditions. </a> </label>
                                </div>
                            </div>
                            <div class="for-group">
                                <div class="form-group text-center">
                                    <button class="btn btn-success"onclick="console.log('fff');signup()">sign Up</button>
                                </div>
                                <div class="form-group">
                                    <p class=" text-center" > Already IGOT7 ? 
                                        <a href="#" class="mt-3" id="login-btn"> Login ! </a>
                                    </p>
                                </div>
                            </div>
                       <!-- </form>-->
                    </div>
                </div>
            </div>

            <!-- code pour changer entre LOGIN & SIGN UP-->

            <script type= "text/javascript">
                $(document).ready(function(){
                $("#register-btn").click(function(){
                $("#register-box").show();
                $("#login-box").hide(); 
            });
            
            $("#login-btn").click(function(){
            $("#register-box").hide();
            $("#login-box").show();
        });

        $("#login-frm").validate();
        $("#register-frm").validate({
            rules:{
                cpswrd:{
                    equalTo : "#pswrd"
                }
            }
        });
    });

            </script>

            </body>
        </html>
