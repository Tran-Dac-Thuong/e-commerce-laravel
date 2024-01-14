<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion Website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
         .btn-send-pass{
            background-color: #f7444e;
            color: white;
            border: none;
            outline: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Forgot password</h1>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{session()->get('message')}}
                            </div>       
                        @endif
                    <form action="/forgot-password" method="post">
                        @csrf 
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="text" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email..." autofocus/>
                           @error('email')
                               <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send password link" class="btn-send-pass mt-3 col-12"/>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>