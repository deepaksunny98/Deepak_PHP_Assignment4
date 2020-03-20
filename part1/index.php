
<?php
            $cash = 0; //initializing the variables
			$remaining = 0;
            $product = '';
            include ('Vending.php');


            if(isset($_POST['one']))
            {
                $cash = $_REQUEST['cash'] + 1;
            }
            if(isset($_POST['five']))
            {
                $cash = $_POST['cash'] + 0.5;
            }
            if(isset($_POST['ten']))
            {
                $cash = $_POST['cash'] + 0.10;
            }
            if(isset($_POST['twentyfive']))
            {
                $cash = $_POST['cash'] +0.25;
            }
            
            if(isset($_POST['cancel']))
            {
                header('Location: index.php');
            }


//form submit
            if(isset($_POST['submit']))
            {
                if(!isset($_POST['snack']))
                    echo "Please choose a product";
                else
                {
                    $cash = $_POST['cash'];
                    $product = $_POST['snack'];
                    
                    switch ($product) {
                        case "Chocolate":
                            if($cash < 1.25)
                                echo "Please provide enough amount to buy the product";
                            else
                            {
                               $chocolate = new Vending('Chocolate', $cash, 1.25);
                               $chocolate->buy();    
                            }
                            break;
                        case "Pop":
                            if($cash < 1.50)
                                echo "Please provide enough amount to buy the Product";
                            else
                            {
                               $chocolate = new Vending('Pop', $cash, 1.50);
                               $chocolate->buy();
                            }
                            break;
                        case "Chips":
                            if($cash < 1.75)
                                echo "Please provide enough amount to buy the product";
                            else
                            {
                               $chocolate = new Vending('Chips', $cash, 1.75);
                               $chocolate->buy();
                            }
                            break;
                    }     
                }     
            }
        ?>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
        <marquee>Please insert the coins and choose the product</marquee>
    <div class="form">
    
        <form action='' method='post'>
            Money: <input type="text" name="cash" id='cash' value="<?php echo $cash;?>" onclick="err();" />
            <br>
            Snacks:<br>
            <input type="radio" name="snack" value="Chocolate" <?php if(isset($product)){ if($product=='Chocolate' ) echo 'checked = "checked"' ; else echo '' ;} ?>>Chocolate Bar $1.25<br>
            <input type="radio" name="snack" value="Pop" <?php if(isset($product)){ if($product=='Pop' ) echo 'checked = "checked"' ; else echo '' ;} ?>> Pop $1.50<br>
            <input type="radio" name="snack" value="Chips" <?php if(isset($product)){ if($product=='Chips' ) echo 'checked = "checked"' ; else echo '' ;} ?>>Chips $1.75<br>
            <br>
            
            Coins:
            <button name='one' id='one'>1$</button>
            <button name='five' id='five'>50 Cents</button>
            <button name='ten' id='ten'>10 Cens</button>
            <button name='twentyfive' id='twentyfive'>25 Cents</button><br><br>
            <input type="submit" name="submit" value="submit">
            <button name='cancel' id='cancel'>Cancel</button><br><br>

        </form>
    </div>
    <script>
        function err() {
            alert("Please use the buttons to insert money");
        }
    </script>
</body>
</html>
