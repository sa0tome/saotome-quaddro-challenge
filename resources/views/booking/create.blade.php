@extends('main')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="/bookings">
                    @csrf
                    <div class="mb-3">
                        Título:
                        <input type="text" name="title" value="{{ old('title') }}" placeholder="Aula de Judô">
                    </div>
                    <div class="mb-3">
                        Data e Horário de Início:
                        <input type="text" name="start_date" id="datetimepicker" value="{{ old('start_date') }}" placeholder="2022-09-07 18:00:00"><br>
                        <small>Formato: YYYY-MM-DD hh:mm:ss</small>
                    </div>
                    <div class="mb-3">
                        Data e Horário de Fim:
                        <input type="text" name="end_date" id="datetimepicker" value="{{ old('end_date') }}" placeholder="2022-09-07 19:00:00"><br>
                        <small>Formato: YYYY-MM-DD hh:mm:ss</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection