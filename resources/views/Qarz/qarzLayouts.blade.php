@extends('layouts')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <table class="table mytable table-bordered text-center border-3">
                    <thead>
                        <tr>
                            <th scope="col">Umumiy qarz</th>
                            <th scope="col">Umumiy berildi</th>
                            <th scope="col">Umumiy qoldi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $SumReceive }}</td>
                            <td>{{ $SumGiven }}</td>
                            <td>{{ $SumReceive - $SumGiven }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-6 text-center">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="bi bi-plus-circle"></i> Menyu qo'shish
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Menyu nomini kiriting</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form action="{{ route('DebtMenuAdd') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <input type="text" name="name" required required class="form-control">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Save</button>
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
            <div class="col-6 text-center">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#qarz">
                    <i class="bi bi-plus-circle"></i> Qarz qo'shish
                </button>

                <!-- Modal -->
                <div class="modal fade" id="qarz" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Qarz qo'shish</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form action="{{ route('DayDebtAdd') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <label for="date">Sana:</label>
                                            <input type="date" name="date" id="date" class="form-control" required>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label for="name">Kimga yozamiz:</label>
                                            <select class="form-select" name="debt_men_id" id="name" required>
                                                @foreach ($debtMens as $debtMen)
                                                    <option value="{{ $debtMen->id }}">{{ $debtMen->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label for="receive">Olingan qarz:</label>
                                            <input type="number" id="receive" required name="receive" class="form-control"
                                                placeholder="Naqd savdo">
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label for="given">Berilgan qarz:</label>
                                            <input type="number" name="given" required id="given" class="form-control"
                                                placeholder="Berilgan qarz">
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="comment">Izoh</label>
                                            <textarea class="form-control" required name="comment" id="comment" rows="3"></textarea>
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
            <div class="col-3">
                <ul class="list-group">
                    @foreach ($debtMens as $debtmen)
                        <li class="list-group-item menuLi d-flex justify-content-between">
                            <a href="{{ route('dbShow', $debtmen->id) }}">{{ $debtmen->name }}</a>
                            <form action="{{ route('DebtMenuDestroy', $debtmen->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger menulink d-none" type="submit"><i
                                        class="bi bi-trash"></i></button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>

            @yield('qarz')

        </div>
    </div>
    <script>
        // menu delete
        let menuLi = document.querySelectorAll('.menuLi');
        let menulinks = document.querySelectorAll('.menulink');


        menuLi.forEach(link => {
            link.addEventListener('click', () => {
                let text = link.children[1].children[2];
                text.classList.toggle('d-none');
            });
        });
    </script>
@endsection
