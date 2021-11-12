$(document).ready(function() {
	$('#butsave').on('click', function() {
		$("#butsave").attr("disabled", "disabled");
        var parentElement = this.parentElement;
        console.log(parentElement);
        //console.log()
        var elements = parentElement.children;
        var fieldsArray = [];
        var valuesArray = [];
        var dataString = "";
        for (i=0; i<elements.length; i++){
            //populate the fieldsArray and valuesArray
            if (elements[i].tagName.toLowerCase() != "label") {
                fieldsArray[i] = elements[i].name;
                valuesArray[i] = elements[i].value;

                dataString = dataString + `${elements[i].name} : ${elements[i].value}, `
            }
        }   
		/*var name = $('#name').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		var city = $('#city').val();*/
		/*if(name!="" && email!="" && phone!="" && city!=""){*/
			$.ajax({
				url: "../includes/writeto.inc.php",
				type: "POST",
				data: {
					dataString
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#butsave").removeAttr("disabled");
						$('#fupForm').find('input:text').val('');
						$("#success").show();
						$('#success').html('Data added successfully !'); 						
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
		/*}
		else{
			alert('Please fill all the field !');
		}*/
	});
});


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