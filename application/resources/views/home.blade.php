@extends('layouts.app')

@section('content')
<div class="container">
    <board></board>
    <board-create></board-create>
    {{--<div class="row justify-content-center mt-5">--}}
        {{--<div class="col-md-12">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">Dodaj tablice</div>--}}
                {{--<div class="card-body">--}}
                    {{--<form action="{{route('addBoard')}}" method="post">--}}
                        {{--<input name="_token" type="hidden" value="{{ csrf_token() }}"/>--}}
                    {{--<label>Nazwa tablicy</label>--}}
                    {{--<input name="board_name" type="text">--}}
                    {{--<input type="submit" value="Dodaj tablice">--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
@endsection
