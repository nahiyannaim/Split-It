<?php

$total = (double)$_POST["totalBill"];
$numPeople = (double)$_POST["numPeople"];
$tax = (double)$_POST["tax"];
$tip = (double)$_POST["tip"];

if($numPeople > 0) // Avoiding division by zero when form is empty when app is launched
{
    $result = ( $total * (($tax/100) + 1) + $tip ) / $numPeople ;
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <title> Split It </title>
</head>

<body>
    
  <div class="main">

        <div class="header">
            <h1 class="display-4"> Split It </h1>
            <p class="lead"> Bill splitting, made easy. </p>
        </div>
        
    
        <form class="form" action="" method="post">

            <div class="form-group row">
                <h3 for="totalBill" class="col-sm-2 col-form">Total Bill: </h3>
                <div class="col-sm-2">
                    <input type="number" name="totalBill" class="form-control" id="totalBill" placeholder="$">
                </div>
            </div>

            <div class="form-group row">
                <h3 for="numPeople" class="col-sm-2 col-form"> Number of People: </h3>
                <div class="col-sm-2">
                    <input type="number" name="numPeople" class="form-control" id="numPeople" placeholder="E.g. 5">
                </div>
            </div>

            <div class="form-group row">
                <h3 for="tax" class="col-sm-2 col-form"> Tax Percentage: </h3>
                <div class="col-sm-2">
                    <input type="number" name="tax" class="form-control" id="tax" placeholder="E.g. 13 for MB">
                </div>
            </div>

            <div class="form-group row">

                <h3 for="tip" class="col-sm-2 col-form"> Tip:  </h3>

                <div class="input-group mb-3 col-sm-2">

                    <div class="input-group-prepend">
                        
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Type</button>
                        
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">In dollars ($)</a>
                            <a class="dropdown-item" href="#">In percentage (%)</a>
                        </div>
                        
                    </div>

                    <input type="number" name="tip" class="form-control" id="tip" placeholder="E.g. 4">
                
                </div>

            </div>
        
            <button type="submit" class="btn btn-primary split-button" > Split </button>

        </form>

        
        <div class="result">
            <h3> $<?= round($result, 1); ?> per person </h3>  
        </div>

  </div>

</body>

</html>
