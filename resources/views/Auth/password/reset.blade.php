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
         .btn-reset-pass{
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
                        <h1 class="text-center">Reset password</h1>
                    </div>
                    <div class="card-body">
                    <form action="/reset-password" method="post">
                        @csrf
                        @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{session()->get('error')}}
                        </div>       
                        @endif
                        <input type="hidden" name="token" value="{{$token}}"/>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="text" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email..." autofocus/>
                           @error('email')
                               <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" name="password" class="form-control" placeholder="Enter password..."/>
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirm">Confirm Password</label>
                            <input id="confirm" type="password" name="confirm" class="form-control" placeholder="Confirm your password..."/>
                            @error('confirm')
                               <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Reset password" class="btn-reset-pass mt-3 col-12"/>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>