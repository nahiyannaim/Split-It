<?php

include 'application.php';
$app = new Application; 

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" href="/images/icon.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
    <title> Split It </title>
</head>

<body>

  <div class="main">

        <div class="header">
            <a href="index.php"> 
                <h1 class="display-4"> Split It </h1>
                <p class="lead"> Bill splitting, made easy. </p> 
            </a> 
        </div>
    
        <form class="form" action="" method="post">

            <div class="form-group row">

                <img src="/images/bill.svg" class="bill-img">
                <h3 for="totalBill" class="col-sm-5 col-form">Total Bill: </h3>

                <div class="col-sm-4">
                    <input type="number" min="0" name="totalBill" class="form-control" id="totalBill" value=<?= $_POST["totalBill"] ?> placeholder="$">
                </div>
            </div>

            <div class="form-group row">

                <img src="/images/people.svg" class="people-img">
                <h3 for="numPeople" class="col-sm-5 col-form"> Number of People: </h3>

                <div class="col-sm-4">
                    <input type="number" min="1" name="numPeople" class="form-control" id="numPeople" value=<?= $_POST["numPeople"] ?> placeholder="E.g. 5">
                    <!-- <em>E.g. 5</em> -->
                </div>
            </div>

            <div class="form-group row">

                <img src="/images/tax.svg" class="tax-img">
                <h3 for="tax" class="col-sm-5 col-form"> Tax Percentage: </h3>

                <div class="col-sm-4">
                    <input type="number" min="0" max="100" name="tax" class="form-control" id="tax" value=<?= $_POST["tax"] ?> placeholder="E.g. 13 for MB">
                    <!-- <em>E.g. 13 for MB</em> -->
                </div>
            </div>

            <div class="form-group row">

                <img src="/images/tip.svg" class="tip-img">
                <h3 for="tip" class="col-sm-5 col-form"> Tip:  </h3>

                <div class="input-group mb-3 col-sm-4">
                    <div class="input-group-prepend"> 
                        <select name="tipType" id="tipType" class="currentSelection">
                            <option class="dropdown-item" value="dollars"> $ </option>
                            <option class="dropdown-item" value="percentage"> % </option>
                        </select>
                    </div>

                    <input type="number" name="tip" class="form-control" id="tip" value=<?= $_POST["tip"] ?> placeholder="E.g. 4">  

                </div>

            </div>
        
            <button type="submit" class="btn btn-danger split-button" > <h5> Split </h5> </button>

        </form>

        
        <?php if($app->compute() == 0): ?>
            <div class="result">
                <h3> $<?= $app->compute() ?> per person </h3>  
            </div>
        <?php else: ?>
            <div class="result">
                <h3> <span class="badge badge-warning" > <?= "$" . $app->compute() ?>  per person </span> </h3>  
            </div>
        <?php endif; ?>
        
  </div>



<script>

    // To display the correct Tip Type in dropdown list after form submission 
    if("<?= $_POST['tipType'];?>".length > 0) // Length of $_POST['tipType'] > 0 so show the one selected by user
    {
        document.getElementById('tipType').value = "<?= $_POST['tipType'];?>";
    }
    else // For initial launch of app, show dollars as default in dropdown since $_POST['tipType'] is empty initially 
    {
        document.getElementById('tipType').value = "dollars";
    }

    // To correctly switch between max and min range of input allowed for tip in dollars (0-9999999) and tip in percentage (0-100)
    $(function() 
    {
        $('.currentSelection').change(function() 
        {
            if($(this).val() === 'dollars')
            {
                document.getElementById('tip').min = "0";
                document.getElementById('tip').max = "9999999";
            }
            else
            {
                document.getElementById('tip').min = "0";
                document.getElementById('tip').max = "100";
            }

        }).change(); 
    });

</script>



<!-- To disable resubmission of form when refresh is clicked
<script>
    if (window.history.replaceState) 
    {
        window.history.replaceState(null, null, window.location.href);
    }
</script> 
-->

<!-- Icons downloaded from: https://fontawesome.com/license/free -->

</body>

</html>
