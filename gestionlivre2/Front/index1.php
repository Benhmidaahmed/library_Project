<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: ../../controllers/login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bibliothèque - Votre bibliothèque en ligne</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
     .header-carousel .owl-carousel-item {
    height: 650px;
}

.header-carousel img {
    width: 100%;
    height: 100%; 
    object-fit: cover;
}
.hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    .hover-card .card-img-top {
        transition: transform 0.3s ease;
    }

    </style>
    

</head>

<body>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
   <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary" id="home" ><i class="fa fa-book me-3"></i>Bookphilia</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="#home" class="nav-item nav-link active">Home</a>
            <a href="#about" class="nav-item nav-link">About Us</a>
            <a href="#catalog" class="nav-item nav-link">Categories</a>
           
            <a href="#Books" class="nav-item nav-link">Books</a>
        </div>
        <a href="../../controllers/logout.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Log Out<i class="fa fa-sign-out ms-3"></i></a>
    </div>
</nav>
<div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/image11.jpg" alt="Library Books">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Explore Our Collection</h5>
                            <h1 class="display-3 text-white animated slideInDown">Discover Thousands of Books</h1>
                            <p class="fs-5 text-white mb-4 pb-2">Find your next favorite book from our extensive collection of novels, research papers, and more.</p>
                            <a href="#" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">View Catalog</a>
                            <a href="#" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/image22.jpg" alt="Reading Area">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">A Space to Learn</h5>
                            <h1 class="display-3 text-white animated slideInDown">Read, Study, and Grow</h1>
                            <p class="fs-5 text-white mb-4 pb-2">Our library offers a quiet and inspiring environment to help you focus on your studies and personal growth.</p>
                            <a href="#" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Our Services</a>
                            <a href="#" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Get in Touch</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book text-primary mb-4"></i>
                            <h5 class="mb-3">Large Collection</h5>
                            <p>Explorez notre vaste collection de livres dans divers genres et catégories.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-user text-primary mb-4"></i>
                            <h5 class="mb-3">Services personnalisés</h5>
                            <p>Bénéficiez de recommandations personnalisées basées sur vos préférences.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3">Accès en ligne</h5>
                            <p>Accédez à nos services et collections où que vous soyez.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="img/about.jpg" alt="About the Library" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3" id="about">About Us</h6>
                <h1 class="mb-4">Welcome to Our Library</h1>
                <p class="mb-4">Our library is a gateway to knowledge, learning, and inspiration. With a rich collection of books, digital resources, and quiet spaces, we aim to foster a love for reading and lifelong learning in our community.</p>
                <p class="mb-4">Whether you're here to borrow a novel, conduct research, or simply find a quiet place to study, our library provides a welcoming environment for all. Explore our extensive resources and discover something new every time you visit.</p>
                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Extensive Book Collection</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Study and Reading Areas</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Digital Resources</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Community Events</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Research Assistance</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Friendly Staff</p>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="about.html">Learn More</a>
            </div>
        </div>
    </div>
</div>
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3" id="catalog" >Categories</h6>
                <h1 class="mb-5">Books Categories</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/ComicSpread.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Comics Books</h5>
                                    <small class="text-primary">49 books</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/fiction.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Fiction Books</h5>
                                    <small class="text-primary">50 Books</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/hack.webp" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Cybersecurity BooKs</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/history1.jpg" alt="" style="object-fit: cover;">
                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin:  1px;">
                            <h5 class="m-0">History</h5>
                            <small class="text-primary">49 Courses</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h4 class="section-title bg-white text-center text-primary px-3"id="Books" >Our Books</h4>
    </div>

    <div class="row">
        <?php
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=gestionlivre;charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare("SELECT * FROM livre");
            $stmt->execute();
            $livres = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($livres as $livre) {
                $image_url = isset($livre['image_url']) ? htmlspecialchars($livre['image_url']) : 'default.jpg';
                $imagePath = "http://localhost:/projetphpfinalDSI2211/gestionlivre2/" . $image_url;
                $nom_livre = isset($livre['nom_livre']) ? htmlspecialchars($livre['nom_livre']) : 'Book without name';
                $nom_auteur = isset($livre['nom_auteur']) ? htmlspecialchars($livre['nom_auteur']) : 'Unknown author';
                $nb_page = isset($livre['nb_page']) ? htmlspecialchars($livre['nb_page']) : 'Not defined';
                $genre = isset($livre['genre']) ? htmlspecialchars($livre['genre']) : 'Genre not defined';
                $is_in_stock = $livre['quantite'] > 0;
                echo '
                <div class="col-md-3 mb-4"> <!-- Réduit la taille des cartes -->
                    <div class="card h-100 hover-card" id="book_' . $livre['id_livre'] . '">
                        <!-- Affichage de l\'image avec le bon chemin -->
                        <img src="' . $imagePath . '" alt="Book Cover" class="card-img-top" style="max-width: 100%; height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title" style="margin-bottom: 5px; font-weight: bold;">' . $nom_livre . '</h5>
                            <p class="card-text" style="margin-bottom: 2px; font-weight: bold; display: inline;">Author: </p>
                            <p class="card-text" style="margin-bottom: 2px; display: inline;">' . $nom_auteur . '</p>
                            <br>
                            <p class="card-text" style="margin-bottom: 2px; font-weight: bold; display: inline;">Pages: </p>
                            <p class="card-text" style="margin-bottom: 2px; display: inline;">' . $nb_page . '</p>
                            <br>
                            <p class="card-text" style="margin-bottom: 2px; font-weight: bold; display: inline;">Genre: </p>
                            <p class="card-text" style="margin-bottom: 2px; display: inline;">' . $genre . '</p>
                        </div>
                        <div class="card-footer text-center">';
                if ($is_in_stock) {
                    echo '
                        <form action="javascript:void(0);" method="post" class="d-inline" id="emprunter_form_' . $livre['id_livre'] . '" onsubmit="emprunterLivre(' . $livre['id_livre'] . ')">
                            <input type="hidden" name="id_livre" value="' . $livre['id_livre'] . '">
                            <button type="submit" name="emprunter" class="btn btn-secondary">Borrow</button>
                        </form>';
                } else {
                    echo '<button class="btn btn-secondary" disabled>Borrowed</button>';
                    echo '<div class="alert alert-warning mt-3" role="alert">
                            This book is out of stock!
                          </div>';
                }

                echo '</div>
                    </div>
                </div>';
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </div>
</div>

<script>
    function emprunterLivre(id_livre) {
        var xhr = new XMLHttpRequest();
        var formData = new FormData();
        formData.append('id_livre', id_livre);
        xhr.open("POST", "emprunter.php", true);
        xhr.onload = function() {
            if (xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);

                if (response.success) {
                    var card = document.getElementById('book_' + id_livre);
                    card.querySelector('.btn').disabled = true;
                    card.querySelector('.btn').textContent = "Borrowed";
                    var successMessage = document.createElement('div');
                    successMessage.classList.add('mt-3');
                    successMessage.style.color = 'green';
                    successMessage.style.fontWeight = 'bold'; 
                    successMessage.textContent = "The book has been successfully borrowed!";
                    card.appendChild(successMessage);
                    setTimeout(function() {
                        successMessage.remove();
                    }, 3000);
                } else {
                    alert("Error while borrowing the book.");
                }
            }
        };
        xhr.send(formData);
    }
</script>
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Quick Links</h4>
                <a class="btn btn-link" href="">About Us</a>
                <a class="btn btn-link" href="">Contact Us</a>
                <a class="btn btn-link" href="">Privacy Policy</a>
                <a class="btn btn-link" href="">Terms & Conditions</a>
                <a class="btn btn-link" href="">FAQs & Help</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Contact</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Location, City, Country</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Gallery</h4>
                <div class="row g-2 pt-2">
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Newsletter</h4>
                <p>Stay updated with the latest books and news from our library.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="email" placeholder="Your email" required>
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
              
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="">Home</a>
                        <a href="">Cookies</a>
                        <a href="">Help</a>
                        <a href="">FAQs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    <script src="https://cdn.jsdelivr.net/npm/vue@3.2.45"></script>
   
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
     <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script> 
    <script src="js/main.js"></script>
</body>

</html>