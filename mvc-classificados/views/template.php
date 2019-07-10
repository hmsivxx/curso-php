<html>
  <head>
    <title>My website</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/main.css">
  </head>
  <body>
    <!-- NAV -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="<?php echo BASE_URL; ?>">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <?php if(isset($_SESSION['clogin']) && !empty($_SESSION['clogin'])): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL; ?>offers">My Offers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL; ?>login/exit">Log Out</a>
              </li>
            <?php else:  ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL; ?>register">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL; ?>login">Log In</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

    
    <?php $this->loadViewInTemplate($viewName, $viewData); ?>

    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
  </body>
</html>