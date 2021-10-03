@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts.message_success')
     
    <div class="row justify-content-lg-center">
        <div class="col-lg12-4">
            <div class="card">
                @if (@getimagesize($recipe->imageURL))
                    <img src="{{$recipe->imageURL}}" class="card-img-top" alt="...">
                @else
                    <img src="{{url('images/empty.png')}}" class="card-img-top" alt="...">
                @endif
                
                <div class="card-body">
                <h5 class="card-title">{{$recipe->name}}</h5>
                <p class="card-text">Ingredients : </p>
                    <ol class="list-group list-group-numbered">
                        @foreach ($recipe->ingredients as $ingredient)
                            <li class="list-group-item">{{ $ingredient->pivot->quantity.' '.$ingredient->name}}</li>
                        @endforeach
                    </ol>
                <p class="card-text">Steps : </p>
                    <ol class="list-group list-group-numbered">
                        @foreach ($recipe->steps as $step)
                            <li class="list-group-item">{{ $step->description.' '.$step->time.' min'}}</li>
                        @endforeach
                    </ol>
                    <a href="{{$recipe->originalURL}}" class="btn btn-link">Source..</a>
                <h6>{{'Total cooking time: '.$recipe->totalCookTime()}}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection