@extends('layouts')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('TradeUpdate', $trade->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 text-center mb-2">
                        <h2 class="font-monospace">Edit Post</h2>
                    </div>
                    <div class="col-6 mb-2">
                        <label for="date">Date:</label>
                        <input type="date" name="date" id="date" value="{{$trade->date}}" class="form-control" required>
                    </div>
                    <div class="col-6 mb-2">
                        <label for="name">Name:</label>
                        <input type="text" name="name" required id="name" value="{{$trade->name}}" class="form-control" placeholder="Name">
                    </div>
                    <div class="col-6 mb-2">
                        <label for="price">Cash sale:</label>
                        <input type="number" required name="cash" id="price" value="{{$trade->cash}}" class="form-control" placeholder="Cash sales">
                    </div>
                    <div class="col-6 mb-2">
                        <label for="terminal">Terminal trade:</label>
                        <input type="number" required name="terminal" id="terminal" value="{{$trade->terminal}}" class="form-control" placeholder="Terminal trades">
                    </div>
                    <div class="col-6 mb-2">
                        <label for="product">Total sales:</label>
                        <input type="number" required name="product" id="product" value="{{$trade->product}}" class="form-control" placeholder="Total sales">
                    </div>
                    <div class="col-6 mb-2">
                        <label for="buy">Daily Cost:</label>
                        <input type="number" required name="cost" id="buy" value="{{$trade->cost}}" class="form-control" placeholder="Enter Daily Cost">
                    </div>
                    <div class="col-12 mb-2">
                        <label for="exampleFormControlTextarea1">Comment</label>
                        <textarea name="comment" required class="form-control" id="exampleFormControlTextarea1" rows="3">{{$trade->name}}</textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="/" class="btn btn-warning">Close</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection