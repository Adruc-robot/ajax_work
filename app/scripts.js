
function setRecipe(recipeNumber,recipeName) {
    console.log("this was hit");
    //update the #recipe_name
    document.getElementById("recipe_name").innerText = recipeName;
    //identify the places where the recipe name needs to be set and locked
    var elements = document.getElementsByClassName("recipe_holder");
    for (i=0; i < elements.length; i++) {
        elements[i].value = recipeNumber;
    }
}