<?php

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

$filteredHotels = $hotels;

if ( isset($_GET['parking']) && $_GET['parking'] == '1' ) {
    $hotelWithParking = [];

    foreach($filteredHotels as $element){
        if ($element['parking']) {
            $hotelWithParking[] = $element;
        }
    }

    $filteredHotels = $hotelWithParking;
};

if (isset($_GET['vote']) && $_GET['vote'] !== '' ) {
    $hotelWithParking = [];

    foreach($filteredHotels as $element){
        if ($element['vote'] >= $_GET['vote']) {
            $hotelWithParking[] = $element;
        }
    }

    $filteredHotels = $hotelWithParking;
}



?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <h1 class="text-center mt-5">Hotels</h1>

    <div class="container mt-5">
        
            <form action="index.php" method="get">
                <div class="row">
                    <div class="col-4">
                        <select name="parking" class="form-select" >
                            <option selected <?= isset($_GET['parking']) && $_GET['parking'] == '1' ? '' : 'selected' ?> >Parking</option>
                            <option value="1" <?= isset($_GET['parking']) && $_GET['parking'] == '1' ? 'selected' : '' ?> >Yes</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <div>
                            <input type="number" name="vote" id="vote" min="0" max="5" placeholder="Vote" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        
    </div>


    <div class="container mt-5">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Parking</th>
            <th scope="col">Vote</th>
            <th scope="col">Distance to center</th>
            </tr>
        </thead>
        <tbody>

            

            <?php foreach($filteredHotels as $hotel): ?>
                <tr>
                    <td> <?= $hotel['name'] ?> </td>
                    <td> <?= $hotel['description'] ?> </td>
                    <td> <?= ($hotel['parking']) ? 'Yes' : 'No' ?> </td>
                    <td> <?= $hotel['vote'] ?> </td>
                    <td> <?= $hotel['distance_to_center'] ?> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    
</body>
</html>