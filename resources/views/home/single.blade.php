
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel 5.6 CRUD Tutorial With Example </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <h2>Information for Users</h2><br/>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <h1 >Name:</h1>
                <h4 >{{$passport->name}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <h1 >Email:</h1>
                <h4 >{{$passport->email}}</h4>



            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <h1 >Number:</h1>
                <h4 >{{$passport->number}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <h1 >office:</h1>
                <h4 >{{$passport->office}}</h4>
            </div>
        </div>

    <div class="row">
        <div class="col-md-4"></div>
            <h1 >Your Image </h1>
            <img src="/images/{{$passport->filename}} "style="width: 580px; height: 360px "/>

        </div>
    </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-top:60px">
                <a class="btn btn-success" href="http://laravel.local/passports"> Go Back  </a>
            </div>
        </div>
    </form>
</div>
</body>
</html>



