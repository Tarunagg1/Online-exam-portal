<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
    <style>
    .signup-container {
        width: 50%;
        height: 500px;
        border: 1px solid black;
        border-radius: 35px;
        padding: 21px;
        margin-left: 20%;
        margin-top: 120px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="signup-container">
            <div class="signup-title">
                <h2 class="text-center">Portal sign Up</h2>
            </div>
            <div class="signupform">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="post" action="{{url('portal/userportalsignup')}}" id="portalsignup">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name">Enter name</label>
                                <input type="text" class="form-control" placeholder="Enter name" name="name" id="name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" placeholder="Enter email" name="email"
                                    id="email" aria-describedby="emailHelp" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="number">Enter Number</label>
                                <input type="number" class="form-control" placeholder="Enter number" name="number"
                                    id="number" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Enter password</label>
                                <input type="password" class="form-control" placeholder="Enter password" name="password"
                                    id="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-1">Register</button>
                        </form>
                    </div>
                    <a href="login">login</a>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
    crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{url('public/assets/js/portal.js')}}"></script>
</html>