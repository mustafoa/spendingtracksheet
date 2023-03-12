<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
    .show {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>
    <title>Calculation</title>
</head>

<body>
    <!-- show start -->
    <div class="show">
        <div class="col-2">
            <div class="card card-body">
                <p class="text-center">Sana: <strong> {{$debts->date}} </strong></p>
                <p>Name: <strong> {{$debtname->name}} </strong></p>
                <p>Olingan qarz: <strong> {{$debts->received}} </strong> so'm</p>
                <p>Berilgan qarz: <strong> {{$debts->given}} </strong> so'm</p>
                <p>Qoldi: <strong> {{$debts->received + $debts->given}} </strong> so'm</p>
                <p>Comment: <strong> {{$debts->comment}} </strong></p>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('qarz') }}" class="btn col-5 btn-warning">Back</a>
                    <a class="btn col-5 btn-primary">Print</a>
                </div>
            </div>
        </div>
    </div>
    <!-- header end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.minjs"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>
