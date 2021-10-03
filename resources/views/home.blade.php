@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.message_success')
    
    <div class="row">
        @include('layouts.filter', ['types' => $types, 'ingredients' => $ingredients, 'maxTime' => $maxTime])
    </div>
    
    <div class="row mt-4 card-group" id="recipeItems">
        @include('layouts.card', ['recipes' => $recipes])
    </div>
</div>
@endsection
