@extends('layouts.app')

@section('content')

    @forelse($results as $result)

        <div class="card text-center">
            <div class="card-header">
                Status
            </div>
            <div class="card-body">
                <h5 class="card-title">Coronavirus Cases : {{$result->Coronavirus_Cases}}</h5>
                <h5 class="card-text">Deaths : {{$result->Deaths}}</h5>
                <h5 class="card-text">Recovered : {{$result->Recovered}}</h5>
            </div>
            <div class="card-footer text-muted">
                 {{$result->created_at}}
            </div>
        </div>
        <br>
        <br>
        <br>
        @empty
            <h2>There are no Information</h2>
    @endforelse
    <div>{{$results->links()}}</div>
    <style>
        .w-5{
            display: none;
            alignment: center;
        }
    </style>
@endsection
