<?php

  // DB INC

  include('db.php');

  if(isset($_POST['senduser'])){

    // IS EMPTY

    $missingFirstName = true;
    $missingLastName = true;
    $missingStreet = true;
    $missingCity = true;
    $missingCountry = true;

    // SECURE

    $firstname = htmlentities($_POST['firstname']);
    $lastname = htmlentities($_POST['lastname']);
    $street = htmlentities($_POST['street']);
    $city = htmlentities($_POST['city']);
    $country = htmlentities($_POST['country']);

    if(!empty($firstname)){
      $missingFirstName = false;
    }

    if(!empty($lastname)){
      $missingLastName = false;  
    }

    if(!empty($street)){
      $missingStreet = false;
    }

    if(!empty($city)){
      $missingCity = false;
    }

    if(!empty($country)){
      $missingCountry = false;
    }

    // SAVE USER IF THERE ARE NO ERRORS

    if(!$missingFirstName && !$missingLastName && !$missingCity && !$missingCountry && !$missingStreet){    
      $sql = "INSERT INTO users(firstname, lastname, street, city, country) VALUES(:firstname, :lastname, :street, :city, :country)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        'firstname' => $firstname,
        'lastname' => $lastname,
        'street' => $street,
        'city' => $city,
        'country' => $country
      ]);

      header("Location: users.php");
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
  <!-- MOBILE RESPONSIVE -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- TITLE -->
  <title>Dolas BEM Apps Project</title> 
  <!-- CSS -->
  <link rel="stylesheet" href="style.css">
  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
    
  <!--  CONTENT START -->
    
    <div id="content-container">
      <div id="form">

        <h2 id='form-title'>User Details</h2>

        <!-- FORM START -->

          <form id="form-user" method="POST">
            
            <!-- FIRST NAME -->

            <div id="FLName">
	            <div id="firstname">
                <p class="error-msg fnerror">
                  <?php 
                    if(isset($missingFirstName) && $missingFirstName){ ?>
                      <?php echo "Name field is required.";
                    }
                  ?>
                </p>
	              <input type="text" class='input' name="firstname" id="firstname-input" placeholder="First Name" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>">
	            </div>

            <!-- LAST NAME -->  

              <div id="lastname">
                <p class="error-msg lnerror">
                  <?php 
                    if(isset($missingFirstName) && $missingFirstName){ ?>
                      <?php echo "Name field is required.";
                    }
                  ?>
                </p>
	              <input type="text" class='input' name="lastname" id="lastname-input" placeholder="Last Name" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>">
              </div>
            </div>  

            <!-- STREET -->  
            
            <div id="SCC">
              <div id="street">
                <p class="error-msg streeterror">
                  <?php 
                    if(isset($missingFirstName) && $missingFirstName){ ?>
                      <?php echo "Name field is required.";
                    }
                  ?>
                </p>
	              <input type="text" class='input' name="street" id="street-input" placeholder="Street / Number" value="<?php if(isset($_POST['street'])) echo $_POST['street']; ?>">
	            </div>

            <!-- CITY -->  

              <div id="city">
                <p class="error-msg cityerror">
                  <?php 
                    if(isset($missingFirstName) && $missingFirstName){ ?>
                      <?php echo "Name field is required.";
                    }
                  ?>
                </p>
	              <input type="text" class='input' name="city" id="city-input" placeholder="City" value="<?php if(isset($_POST['city'])) echo $_POST['city']; ?>">
	            </div>

            <!-- COUNTRY -->  

              <div id="country">
                <p class="error-msg countryerror">
                  <?php 
                    if(isset($missingFirstName) && $missingFirstName){ ?>
                      <?php echo "Name field is required.";
                    }
                  ?>
                </p>
	              <input type="text" class='input' name="country" id="country-input" placeholder="Country" value="<?php if(isset($_POST['country'])) echo $_POST['country']; ?>">
	            </div>

						<!-- SUBMIT -->

            <div id="submit">
              <input type="submit" class='input' name="senduser" value="Add User">
            </div>
          </div>  

          </form>

        <!-- FORM END -->
      </div>
      <div id="map">
        map
      </div>
    </div>

    <div style="text-align: center; margin-top: 3rem;">
      <a href="users.php" >Show All Users.</a>
    </div>



  
  <!--  CONTENT END -->

  <script>

    function initMap(){

      // Map options

      var options = {
        zoom: 8,
        center: {lat: 44.7866, lng: 20.4489}
      }

      // New Map Object

      var map = new google.maps.Map(document.getElementById('map'), options);
    
      // Add Marker
      
      var marker = new google.maps.Marker({
        position: {lat: 44.7866, lng: 20.4489},
        map: map
      });
  
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCa9dYQ4MfLiAXhOHtXyNy0XEv1Nan4TYQ&callback=initMap" async defer></script>
  <script src="script.js"></script>
</body>
</html>