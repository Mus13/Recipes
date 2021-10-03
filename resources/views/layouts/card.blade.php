@foreach ($recipes as $recipe)
    <div class="col-sm-4">
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
                <a href="{{$recipe->originalURL}}" class="btn btn-link">Source..</a>
            <h6>{{'Total cooking time: '.$recipe->totalCookTime()}}</h6>
            <a href="/recipes/id/{{$recipe->id}}" class="btn btn-secondary btn-sm">Read more..</a>
            </div>
        </div>
    </div>
@endforeach
<div class="row">
    {{$recipes->render();}}
</div>