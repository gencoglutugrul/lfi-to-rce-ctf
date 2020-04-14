<?php 
// start session for session stored rce
session_start();
if(isset($_POST["user"])){
  $_SESSION["user"] = $_POST["user"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Doors Fan Website with PHP-Session!</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/full-width-pics.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">The Doors Fan Page</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item<?php echo !isset($_GET["page"]) ? " active":""; ?>">
            <a class="nav-link" href="/">Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link<?php echo (isset($_GET["page"]) && $_GET["page"]=="about.php") ? " active":""; ?>" href="/index.php?page=about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link<?php echo (isset($_GET["page"]) && $_GET["page"]=="services.php") ? " active":""; ?>" href="/index.php?page=services.php">Services</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header - set the background image for the header in the line below -->
  <header class="bg-image-full" style="background-image: url('./the-doors.jpg');">
  </header>
  <?php 
    if(isset($_GET["page"]) && $_GET["page"]!="index.php"){
      include($_GET["page"]);
    }else{
        //home page
  ?>

      <!-- Content section -->
      <section class="py-5">
        <div class="container">
          <h1><?php echo isset($_SESSION["user"]) ? "Hello, ".htmlentities($_SESSION["user"]) : "Hello i love you" ; ?></h1>
          <?php if(!isset($_SESSION["user"])){ ?>
              <p class="lead">Won't you tell me your name?</p>
              <form method="POST">
                <input name="user" type="text" placeholder="mr mojo risin"> <input type="submit" value="Tell me!">
              </form>
          <?php }else{ ?>
              <p class="lead">Lorem ipsum dolor sit amet.</p>
          <?php } ?>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p>
        </div>
      </section>

      <!-- Content section -->
      <section class="py-5">
        <div class="container">
          <h1>Hey Doors Lover!</h1>
          <p class="lead">Please don't hack us if you love The Doors.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p>
        </div>
      </section>

      <!-- Content section -->
      <section class="py-5">
        <div class="container">
          <h1>This is not hard one...</h1>
          <p class="lead">Well, you need just little old php experience.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p>
        </div>
      </section>

  <?php
    }
  ?>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyleft &copy; Mr. Mojo Risin'  2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
