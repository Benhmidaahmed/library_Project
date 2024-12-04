<?php
session_start();
if($_SESSION['user_type'] === 'user') {
    header("Location: ../gestionlivre2/Front/index1.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter un Livre | Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style1.css">
</head>
<body>
  <div class="container">
    <div class="navigation">
      <ul>
        <li><a href="#" ><span class="icon"><i class="fas fa-book"></i></span><span class="title">BookPhilia</span></a></li>
        <li><a href="index.php" id="dash-book-link"><span class="icon"><ion-icon name="home-outline"></ion-icon></span><span class="title">Dashboard</span></a></li>
      </ul>
    </div>

    <div class="main">
      <div class="topbar">
        <div class="toggle"><ion-icon name="menu-outline"></ion-icon></div>
        <div class="search">
          <label><input type="text" placeholder="Search here"><ion-icon name="search-outline"></ion-icon></label>
        </div>
      </div>
   
       <?php
       include "../viewsphtml/ajouter.phtml";
       
       ?>
    
    </div>
  </div>

  <script src="assets/js/main2.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
