<!DOCTYPE html>

<html>
<head>
    <title>Honora's Adverntures</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body> 

    <?php
    $nameErr = $emailErr = $ageErr ="";
    $name = $email = $comment = $age ="";
    ?>
    

    <div id = "banner">
        <h1>Honora's Adventures</h1>
        <h2>Contact Me</h2>
    </div>
    
    <div id = "nav">
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="food.html">Food</a></li>
        <li><a href="places.html">Places</a></li>
        <li><a href="contact.php">Contact Me</a></li>
    </ul>
    </div>
    
    <div id = "form">
        
    
    <form action="contact.php" method="post">
        Fill in the form for food and travel recommendations. <p></p>
        
        * Required field
        <p></p>
    
        Name: <input type="text" name="name">
        * <?php echo $nameErr;?>
        <br><br>
        
        E-mail: <input type="text" name="email">
        * <?php echo $emailErr;?>
        <br><br>
        
        Age:
        <input type="radio" name="age" value="under or equal to 30">Below 30
        <input type="radio" name="age" value="above 30">30 or above
        * <?php echo $ageErr;?>
        <br><br>
   
        Comment: <textarea name="comment" rows="5" cols="40"></textarea>
        <br><br>
        
    <input type="submit" name="submit" value="Submit"> 
    </form>
    </div>
    
    <p></p>
    
    <?php
    if (isset($_POST["submit"])) {
    
            
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST["name"])) {
        }
            
        else {
            $name = $_POST["name"];
        }
            
        if (!preg_match("/^[a-zA-Z._0-9]+@[a-zA-Z0-9]+[.][a-zA-Z]+$/",$_POST["email"])) {
        }
            
        else {
            $email = $_POST["email"];
        
            $age = $_POST["age"];
        }

        if (empty($_POST["comment"])) {
            $comment = "";
        }
        
        else {
            $comment = $_POST["comment"];
        }
        
        if ($name!= "" && $email!= "" && $age!= "") {
            
            echo "<div id='form'>
            
            Thank you for your input,
            $name
            <br>
            
            Your email address is:
            $email  
            <br>
            
            Your age is:
            $age
            <p></p>
            
            Based on your age, interesting food items and places I recommend are: <br>";
    
            $items = array(
                "Green Tea Lava Cake" => "under or equal to 30",
                "Cream Mochi" => "above 30",
                "Chicken Stew" => "both",
                "Ming Tomb" => "above 30",
                "The House of Dancing Water" => "under or equal to 30",
                "Atami Seaside" => "both"
            );
            
            /* User defined function that recommends food items and places based on age */
            function recommend($age, $items) {
                foreach($items as $itemname => $category) {
                    
                    if ($category == $age || $category == "both") {
                        echo $itemname;
                        echo"<br>";
                    }
                }
            }
            
            recommend($age, $items);
            echo"<p></p>
            
            Your comment is:
            $comment
            <br>
            <p></p>
            </div>";
        }
        
        else {
            echo "<div id='form'> Please fill in the required fields correctly.
            </div><p></p>";
        }
    }
    ?>
    
    
    </div>
        
    <div id = "footer">
        All pictures are taken by the site's author. <p>
    </div>

    
</body>

</html>