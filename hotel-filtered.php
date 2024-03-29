<?php
/*qui sono presenti tutti gli alberghi con parcheggi o senza parcheggi in base a quello che seleziono in form*/
    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];


    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-hotel</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body data-bs-theme="dark">

<div class="container">

<table class="table">
<thead>
<tr>   
<?php
       /* qui popolo dinamicamente la heaad della mia tabella usando la funzione "array_keys"*/
      $hotelProp = array_keys( $hotels[0]);
      echo "
      <tr>
      "; 
      foreach ( $hotelProp as $prop ) {
          echo "
            <th>
            $prop
            </th>
          ";
      }
      echo "
      </tr>
      ";
?>
<tr>
<thead>
<?php
/* parte che controlla i parcheggi */
 if($_GET['parcheggi'] == true){

foreach($hotels as $currentHotel){
    echo "
    <tbody>
    <tr>
            ";
      foreach($currentHotel as $key => $value){

       

            if( $currentHotel['parking'] == 1){
                
                echo "<td>$value</td>";
            }
        
            
      }
      echo "
      </tr>
  </tbody> 
  ";
}

} 

/* parte che controlla le stelle */
elseif($_GET['stelle'] > 0){

    foreach($hotels as $currentHotel){
        echo "
        <tbody>
        <tr>
                ";
          foreach($currentHotel as $key => $value){
    
           
    
                if( $currentHotel['vote'] >= $_GET['stelle']   ){
                    
                    echo "<td>$value</td>";
                }
            
                
          }
          echo "
          </tr>
      </tbody> 
      ";
    }

}

/* parte che controlla che entrambe le condizioni siano contemporaneamente verificate (ovverp che ci siano parcheggi e che il numero di stellle abbia il valore scelto.) */
elseif($_GET['stelle'] > 0 && $_GET['parcheggi'] == true){

    foreach($hotels as $currentHotel){
        echo "
        <tbody>
        <tr>
                ";
          foreach($currentHotel as $key => $value){
    
           
    
                if( $currentHotel['vote'] >= $_GET['stelle'] && $currentHotel['parking'] == 1   ){
                    
                    echo "<td>$value</td>";
                }
            
                
          }
          echo "
          </tr>
      </tbody> 
      ";
    }

}

/* mi stampa la tabella originale se non vongono selezionate ne l'opzione stelle ne parcheggi ne tutti e due contemporaneamente*/
 else{
    foreach($hotels as $currentHotel){
        echo "
        <tbody>
        <tr>
                ";
          foreach($currentHotel as $key => $value){
                 echo "<td>$value</td>";
          }
          echo "
          </tr>
      </tbody> 
      ";
    }
 }
?>

</table>

</div>

   <!-- bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>