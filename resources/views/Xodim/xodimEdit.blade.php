@extends('layouts')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('EmployeeUpdate', $employee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 text-center mb-2">
                        <h2 class="font-monospace">Edit Post</h2>
                    </div>
                    <div class="col-4 mb-2">
                        <label for="date">Date:</label>
                        <input type="date" name="date" id="date" value="{{$employee->date}}" class="form-control" required>
                    </div>
                    
                    <div class="col-4 mb-2">
                        <label for="total">Olingan Qarz:</label>
                        <input type="number" required name="total" id="total" value="{{$employee->total}}" class="form-control" placeholder="Olingan Qarz">
                    </div>
                    <div class="col-4 mb-2">
                        <label for="given">Terminal employee:</label>
                        <input type="number" required name="given" id="given" value="{{$employee->given}}" class="form-control" placeholder="Terminal employees">
                    </div>
                    <div class="col-6 mb-2 d-none">
                        <label for="employee_men_id">ID:</label>
                        <input type="number" required name="employee_men_id" id="employee_men_id" value="{{$employee->employee_men_id}}" class="form-control" placeholder="employee_men_id">
                    </div>
                    <div class="col-12 mb-2">
                        <label for="comment">Comment</label>
                        <textarea name="comment" required class="form-control" id="comment" rows="3">{{$employee->comment}}</textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="{{route('xodim')}}" class="btn btn-warning">Close</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection