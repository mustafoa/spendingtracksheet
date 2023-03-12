@extends('Xodim.xodimLayouts')
@section('xodim')

<div class="col-9">
    <div class="col-12">
        <table class="table mytable table-bordered text-center border-3">
            <thead>
                <tr>
                    <th scope="col">Summasi</th>
                    <th scope="col">Berildi</th>
                    <th scope="col">Qoldi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$DaySumTotal}}</td>
                    <td>{{$DaySumGiven}}</td>
                    <td>{{$DaySumTotal - $DaySumGiven}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-12">
        <table class="table mytable table-bordered text-center border-3">
            <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Sanasi</th>
                    <th scope="col">Summa</th>
                    <th scope="col">Berildi</th>
                    <th scope="col">Qoldi</th>
                    <th scope="col">Izoh</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees->employees as $employee)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$employee->date}}</td>
                    <td>{{$employee->total}}</td>
                    <td>{{$employee->given}}</td>
                    <td>{{$employee->total - $employee->given}}</td>
                    <td>{{$employee->comment}}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-list"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('DayEmployeeShow', $employee->id) }}"><button class="dropdown-item" type="button"><i class="bi col-12 btn btn-success bi-eye-fill">
                                                show</i></button></a></li>
                                <li><a href="{{ route('DayEmployeeEdit', $employee->id) }}"><button class="dropdown-item" type="button"><i class="bi col-12 btn btn-warning bi-pencil-square"> edit
                                            </i></button></a></li>
                                <li>
                                    <form action="{{ route('destroy', $employee->id) }}" method="Post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item"><i class="bi col-12 btn btn-danger bi-trash"> delete
                                            </i></button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection