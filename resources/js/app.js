require('./bootstrap');
require('../../node_modules/bootstrap-select/dist/js/bootstrap-select.min');
 
    var ingredients=document.querySelector('select[name="ingredientSelector"][multiple]');
    var types=document.querySelector('select[name="typeSelector"][multiple]');
    var maxTime=document.querySelector('[id="timeRange"]').value;
    var apply_filter=document.querySelector('[name="apply_filter"]');
    var ingredientContainer=document.querySelector('[id="IngredientsSelect"]');
    var recipesContainer=document.querySelector('[id="recipeItems"]');
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    types.addEventListener('change', (event) => {
        const values = Array.from(types.selectedOptions).map(el => el.value);
        getData('http://localhost:8080/filters/ingredients', { data : values })
        .then(data => {
            ingredientContainer.innerHTML=data.html; 
            $('.selectpicker').selectpicker();
        });
    });

    apply_filter.addEventListener('click', (event) => {
        filter();
    });


async function getData(url = '', data = {}) {
    const response = await fetch(url, {
    headers: {
        "Content-Type": "application/json",
        "Accept": "application/json, text-plain, */*",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN": token
    },
    method: 'POST', 
    
    cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
    credentials: 'same-origin',
    
    body: JSON.stringify(data)
    });
    return response.json(); 
}


function filter(){
    if(ingredients.selectedOptions.length<=0){
        if (types.selectedOptions.length>0) {
            const valuesTypes = Array.from(types.selectedOptions).map(el => el.value);
            getData('/filters/recipes/types', { types: valuesTypes, time: maxTime })
            .then(data => {
                recipesContainer.innerHTML =data.html; 
            });
        }
    }else{
        const valuesIngredients = Array.from(ingredients.selectedOptions).map(el => el.value);
        getData('/filters/recipes/ingredients', { ingredients: valuesIngredients, time: maxTime  })
        .then(data => {
            recipesContainer.innerHTML =data.html; 
        });
    }
}

