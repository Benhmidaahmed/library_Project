<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../controllers/login.php');
    exit();
}
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
    <title>Responsive Admin Dashboard | BookPhilia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                        <span class="icon"><i class="fas fa-book"></i></span>
                        </span>
                        <span class="title">BookPhilia</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#" data-section="customers" id="loadCustomers">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="#" data-section="books" id="loadBooks">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Books</span>
                    </a>
                </li>
                <li>
                    <a href="#" id="add-book-link">
                        <span class="icon">
                            <ion-icon name="add-circle-outline"></ion-icon>
                        </span>
                        <span class="title">add books</span>
                    </a>
                </li>   
            </ul>
        </div>
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <button class="logout-btn" onclick="logout()">Logout</button>

            </div>
            <div class="cardBox">
                <div class="card" id="subscribersCard">
                    <div>
                        <div class="numbers" id="subscribersCount"></div>
                        <div class="cardName">Subscribers</div>
                    </div>

                    <div class="iconBx">
                        <i class="bi bi-people"></i>
                    </div>
                </div>

                <div class="card" id="reservedBooksCard">
                    <div>
                        <div class="numbers" id="reservedBooksCount"></div>
                        <div class="cardName">Reserved Books</div>
                    </div>
                    
                    <div class="iconBx">
                        <i class="bi bi-book"></i>
                    </div>
                </div>

                <div class="card" id="returnedBooksCard">
                    <div>
                        <div class="numbers" id="returnedBooksCount"></div>
                        <div class="cardName">Returned Books</div>
                    </div>

                    <div class="iconBx">
                        <i class="bi bi-book-half"></i>
                    </div>
                </div>

                <div class="card" id="totalBooksCard">
                    <div>
                        <div class="numbers" id="totalBooksCount"></div>
                        <div class="cardName">Available Copies</div>
                    </div>

                    <div class="iconBx">
                        <i class="bi bi-book-fill"></i>
                    </div>
                </div>
            </div>
            <div class="details">
                <div class="mainComp" id="dynamic-content">
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script>
        function logout() {
    window.location.href = '../controllers/logout.php';
  }
</script>
    </script>
</body>

</html>
