<!DOCTYPE HTML>
<html>
    <head>
        <title>Post-It || Home Page</title>
        <style>
            <?php include '../Styling/index.css' ?>
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>

        <?php include 'header.php' ?> 

        <div class="main">

            <?php 
              if (isset($_SESSION['Name'])){
                  echo "<p class=title>$_SESSION[Name]</p>";
              }else {
                echo "<p class=title>Welcome Guest</p>";
              }
            ?>
          

            <h1>Recommended Quotes For You</h1>
            <div class="content" id="content">

            </div>
            
        </div>

    <script type="text/javascript" src="../JS/index.js"></script>
    </body>
</html>