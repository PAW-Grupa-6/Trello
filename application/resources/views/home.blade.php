@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($boards as $entity)
                      <p>Tablica :  {{ $entity->table_name }} </p>
                    @endforeach



                </div>

                <div class="card-body">
                    <form action="{{route('addBoard')}}" method="post">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <label>Nazwa tablicy</label>
                    <input name="board_name" type="text">
                    <input type="submit" value="Dodaj tablice">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
