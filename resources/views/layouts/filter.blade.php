<div class="col-lg-12" id="accordionExample">
    <div class="card" >
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-secondary btn-sm" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            Filters ..
          </button>
        </h2>
      </div>
      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <div class="row">
            <div class="col-lg-6" id="typeSelect">
                @include('layouts.selector', ['data' => $types,'name' => 'typeSelector'])
            </div>
            <div class="col-lg-6" id="IngredientsSelect">
                @include('layouts.selector', ['data' => $ingredients,'name' => 'ingredientSelector'])
            </div>
            </div>
            <div class="row">
              <div class="col-lg-6 ">
                <div class="row justify-content-lg-center">
                  <label for="timeRange" class="form-label mr-2">Time total:  </label>
                  <span id="rangeval">{{$maxTime}}</span>
                  <input type="range" class="form-range ml-5" min="0" max="{{$maxTime}}" value="{{$maxTime}}" id="timeRange" onInput="$('#rangeval').html($(this).val())">
                </div>
              </div>
              <div class="col-lg-6 ">
                
                  <button class="btn btn-success btn-sm mt-2" type="button" style="float: right;margin-right: 10%" name="apply_filter">
                    Apply
                  </button>
                
              </div>
            </div>
        </div>
      </div>
    </div>
</div>