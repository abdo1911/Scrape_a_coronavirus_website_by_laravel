@extends('layouts.app')

@section('content')

    {{$i=0}}
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
                Day {{$i+=1}}
            </div>
        </div>
        <br>
        <br>
        <br>
        @empty
            <h2>There are no Information</h2>
    @endforelse

@endsection
