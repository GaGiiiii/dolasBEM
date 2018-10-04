// $("#form").on("change keyup paste", function(){
//   alert("1");
// })

$("#form-user").submit(function(e) {
  
    var missingFirstName = true;
    var missingLastName = true;
    var missingStreet = true;
    var missingCity = true;
    var missingCountry = true;
      
    var firstname = $("#firstname-input").val();
    var lastname = $("#lastname-input").val();
    var street = $("#street-input").val();
    var city = $("#city-input").val();
    var country = $("#country-input").val();

    if(!firstname == ""){

      // IF FIELD IS NOT EMPTY REMOVE ERROR CLASS AND ERROR MSG

      missingFirstName = false;
      $("#firstname-input").removeClass('error-input');
      $("p.fnerror").html("");
    }else{

      // IF FIELD IS EMPTY ADD ERROR CLASS AND ERROR MSG

      $("p.fnerror").html("Please Enter First Name.");
      $("#firstname-input").addClass('error-input');
    }

    if(!lastname == ""){
      missingLastName = false;
      $("p.lnerror").html("");
      $("#lastname-input").removeClass('error-input');
    }else{
      $("p.lnerror").html("Please Enter Last Name.");
      $("#lastname-input").addClass('error-input');
    }

    if(!street == ""){
      missingStreet = false;
      $("p.streeterror").html("");
      $("#street-input").removeClass('error-input');
    }else{
      $("p.streeterror").html("Please Enter Street Name.");
      $("#street-input").addClass('error-input');
    }

    if(!city == ""){
      missingCity = false;
      $("p.cityerror").html("");
      $("#city-input").removeClass('error-input');
    }else{
      $("p.cityerror").html("Please Enter City.");
      $("#city-input").addClass('error-input');
    }

    if(!country == ""){
      missingCountry = false;
      $("p.countryerror").html("");
      $("#country-input").removeClass('error-input');
    }else{
      $("p.countryerror").html("Please Enter Country.");
      $("#country-input").addClass('error-input');
    }

    if(!missingFirstName && !missingLastName && !missingCity && !missingCountry && !missingStreet){
      // alert("RADI");
      return true;
    }else{
      // alert("NE RADI");
      return false;
    }
  });