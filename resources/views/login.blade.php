<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Login page</title>
</head>

<body>

    <!-- login start -->
    <div class="login">
        <div class="col-5">
            <form action="{{ route('enterlogin') }}" method="post" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="login" class="form-control" id="email" required placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="password"  class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required id="password" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn col-12 btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <!-- login end -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>