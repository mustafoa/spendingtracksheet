@extends('layouts')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('DebtUpdate', $debt->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 text-center mb-2">
                        <h2 class="font-monospace">Edit Post</h2>
                    </div>
                    <div class="col-4 mb-2">
                        <label for="date">Date:</label>
                        <input type="date" name="date" id="date" value="{{$debt->date}}" class="form-control" required>
                    </div>
                    <div class="col-4 mb-2">
                        <label for="price">Cash sale:</label>
                        <input type="number" required name="receive" id="receive" value="{{$debt->receive}}" class="form-control" placeholder="Cash sales">
                    </div>
                    <div class="col-4 mb-2">
                        <label for="given">Terminal debt:</label>
                        <input type="number" required name="given" id="given" value="{{$debt->given}}" class="form-control" placeholder="Terminal debts">
                    </div>
                    <div class="col-6 mb-2 d-none">
                        <label for="debt_men_id">ID:</label>
                        <input type="number" required name="debt_men_id" id="debt_men_id" value="{{$debt->debt_men_id}}" class="form-control" placeholder="Debt ID">
                    </div>
                    <div class="col-12 mb-2">
                        <label for="comment">Comment</label>
                        <textarea name="comment" required class="form-control" id="comment" rows="3">{{$debt->comment}}</textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="{{ route('qarz') }}" class="btn btn-warning">Close</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection