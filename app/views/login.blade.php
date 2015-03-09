
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDS - Home</title>
    <!-- Core CSS - Include with every page -->
    {{HTML::style('assets/plugins/bootstrap/bootstrap.css')}}
    {{HTML::style('assets/font-awesome/css/font-awesome.css')}}
    {{HTML::style('assets/plugins/pace/pace-theme-big-counter.css')}}
    {{HTML::style('assets/css/style.css')}}
    {{HTML::style('assets/css/main-style.css')}}
</head>

<body class="body-Login-back">

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
             <img src="{{asset('assets/img/logo.jpg')}}" alt=""/>  
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                       {{Form::open(array('url'=>'login'))}}   
                      <hi> 
                        <fieldset>
                          <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="email" type="email" required>
                             </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    {{HTML::script('assets/plugins/jquery-1.10.2.js')}}
    {{HTML::script('assets/plugins/bootstrap/bootstrap.min.js')}}
    {{HTML::script('assets/plugins/metisMenu/jquery.metisMenu.js')}}

</body>

</html>
