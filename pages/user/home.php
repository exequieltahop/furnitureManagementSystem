<?php 
    // SESSION START PARA SA MGA SESSION VARIABLE NA MAGAMIT
    session_start();
    // PARA IG AG USER DILI MAKA LOGIN MU OUT SA KINI NGA PAGE
    if(!isset($_SESSION['hasLoginStatus'])){
        header('Location: ../../index.php');
        exit;
    }
    if($_SESSION['userRole'] !== 'user'){
        header('Location: ../../index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- BOOTSTRAP CDN PARA MAGAMIT AG BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- BOOTSTRAP GIHAPON PERO PANG OFFLINE NA -->
    <link rel="stylesheet" href="../../bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../bs/css/bootstrap.css">
    <!-- ANHI AG BOOTSTRAP ICON CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <!-- HEADER -->
    <header class="container-fluid d-flex bg-white border shadow p-3 flex-wrap w-100 justify-content-between">
        <div class="d-flex">
            <img src="../../assets/bgphoto.jpeg" alt="logo" style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover; box-shadow: 0 0 5px black;">
            <nav class="nav">
                <div class="nav-item">
                    <a href="home.php" class="nav-link">Home</a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">About Us</a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">Account</a>
                </div>
            </nav>
        </div>
        <!-- SEARCH UG PRODUCT ANHI -->
        <section class="d-flex justify-content-end">
            <form action="" method="post" class="d-flex gap-2">
                <input type="search" name="productName" class="form-control border border-dark">
                <button type="submit" class="btn">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </section>
    </header>
    <main></main>
</body>
</html>