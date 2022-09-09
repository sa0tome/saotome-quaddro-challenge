@extends('main')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Sistema de Agendamentos</h1>
            </div>
            <div class="card-body">
                <a href="/bookings/new"><button class="btn btn-primary">Agendar</button></a>
            </div>
        </div>
    </div>
    <div class="container">
        <form method="get" action="/bookings">
            <div class="card">
                <div class="card-header">
                    <h2>Buscador</h2>
                </div>
                <div class="card-body">
                    <input class="form-control" type="text" name="search" placeholder="Título" value="{{ request()->search }}">
                    <strong>Ordenar por</strong>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="title_order" name="order_by" value="title_order">
                        <label class="form-check-label" for="title_order">Título</label><br>

                        <input class="form-check-input" type="radio" id="start_date_order" name="order_by" value="start_date_order">
                        <label class="form-check-label" for="start_date_order">Data e Horário de início</label><br>

                        <input class="form-check-input" type="radio" id="end_date_order" name="order_by" value="end_date_order">
                        <label class="form-check-label" for="end_date_order">Data e Horário de fim</label>
                    </div>
                    <button type="submit" class="btn btn-success">Buscar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Data e Horário de Início</th>
                            <th>Data e Horário de Fim</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->title }}</td>
                                <td>{{ $booking->start_date }}</td>
                                <td>{{ $booking->end_date }}</td>
                                <td>
                                    <form action="/bookings/delete/{{ $booking->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?');">
                                            Apagar
                                        </button> 
                                    </form>
                                </td>
                            </tr>
                        @empty
                            Ainda não há agendamentos.
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection