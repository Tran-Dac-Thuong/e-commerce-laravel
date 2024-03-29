<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Fail</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e6af8d83d3.js" crossorigin="anonymous"></script>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: red;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: red;
        font-size: 200px;
        line-height: 200px;
        margin-left:-8px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
       .back_home{
            background-color: red;
            color: white;
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
            padding-right: 3rem !important;
            padding-left: 3rem !important;
            border-radius: 50rem !important;
            text-decoration: none;
            user-select: none;
            cursor: pointer;
        }
        a{
           font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:18px;
        }
    </style>
</head>
<body>
<div class="card">
    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="far fa-times-circle"></i>
    </div>
    <h1>Fail!</h1>
    <p>Transaction is declined. Please try again.</p>
    <br/><br/>
    <a class="back_home" href="{{route('index')}}">Go Back To Home</a>
</div>
</body>
</html>