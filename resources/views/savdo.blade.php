@extends('layouts')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <table class="table mytable table-bordered text-center border-3">
                    <thead>
                        <tr>
                            <th scope="col">Naqd</th>
                            <th scope="col">Terminal</th>
                            <th scope="col">Jami</th>
                            <th scope="col">Tovar</th>
                            <th scope="col">Rasxod</th>
                            <th scope="col">Kassa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="TotalCash">0</td>
                            <td class="TotalTerminal">0</td>
                            <td class="TotalSumma">0</td>
                            <td class="TotalProduct">0</td>
                            <td class="TotalCost">0</td>
                            <td class="Totalcashier">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 text-center">
                <!-- Button trigger modal -->
                <button type="button" class="btn mybtn btn-warning" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    <i class="bi bi-plus-circle"></i> Savdo qo'shish
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Savdo qo'shish</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form action="store" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <label for="date">Date:</label>
                                            <input type="date" name="date" id="date" class="form-control"
                                                required>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label for="name">Name:</label>
                                            <input type="text" name="name" required id="name"
                                                class="form-control" placeholder="Name">
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label for="price">Cash sale:</label>
                                            <input type="number" required name="cash" id="price"
                                                class="form-control" placeholder="Cash sales">
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label for="terminal">Terminal trade:</label>
                                            <input type="number" required name="terminal" id="terminal"
                                                class="form-control" placeholder="Terminal trades">
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label for="product">Total sales:</label>
                                            <input type="number" required name="product" id="product"
                                                class="form-control" placeholder="Total sales">
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label for="buy">Daily Cost:</label>
                                            <input type="number" required name="cost" id="buy"
                                                class="form-control" placeholder="Enter Daily Cost">
                                        </div>
                                        <div class="col-12 mb-2">
                                            <label for="exampleFormControlTextarea1">Comment</label>
                                            <textarea name="comment" required class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <table class="table mytable table-bordered text-center border-3">
                    <thead>
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">Sanasi</th>
                            <th scope="col">Naqd savdo</th>
                            <th scope="col">Terminal savdo</th>
                            <th scope="col">Kunlik savdo</th>
                            <th scope="col">Kelgan tovar</th>
                            <th scope="col">Kunlik rasxod</th>
                            <th scope="col">Kassa</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trades as $trade)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $trade->date }}</td>
                                <td class="cash">{{ $trade->cash }}</td>
                                <td class="terminal">{{ $trade->terminal }}</td>
                                <td>{{ $trade->cash + $trade->terminal }}</td>
                                <td class="product">{{ $trade->product }}</td>
                                <td class="cost">{{ $trade->cost }}</td>
                                <td class="cashier">
                                    {{ $trade->cash + $trade->terminal - ($trade->cost) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-list"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('TradeShow',$trade->id) }}"><button class="dropdown-item" type="button"><i
                                                            class="bi col-12 btn btn-success bi-eye-fill">
                                                            show</i></button></a></li>
                                            <li><a href="{{ route('TradeEdit',$trade->id) }}"><button class="dropdown-item" type="button"><i
                                                            class="bi col-12 btn btn-warning bi-pencil-square"> edit
                                                        </i></button></a>
                                            </li>
                                            <li>
                                                <form action="{{ route('TradeDestroy', $trade->id) }}" method="Post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item"><i
                                                            class="bi col-12 btn btn-danger bi-trash"> delete
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
    </div>
@endsection
