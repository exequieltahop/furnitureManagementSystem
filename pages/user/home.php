<?php 
    // SESSION START PARA SA MGA SESSION VARIABLE NA MAGAMIT
    session_start();
    // INCLUDE THE DATABASE CONNECTION
    include_once '../../dbconn/conn.php';
    // PARA IG AG USER DILI MAKA LOGIN MU OUT SA KINI NGA PAGE
    if(!isset($_SESSION['hasLoginStatus'])){
        header('Location: ../../index.php');
        exit;
    }
    if($_SESSION['userRole'] !== 'user'){
        header('Location: ../../index.php');
        exit;
    }
    // ANHI IPANG INCLUDES AG MGA DATA PARA SA KINI NGA PAGE
    include '../../process/user/homeController.php';
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
    <!-- EXTERNAL CSS FILE PARA SA KINI NGA PAGE -->
    <link rel="stylesheet" href="../../css/user/home.css">
    <!-- FAVICON KANA BTW ICON SA IBABAW SA WEBSITE SA TAB -->
    <link rel="shortcut icon" href="../../assets/logo.jpg" type="image/x-icon">
    <!-- JAVASCRIPT FILE PARA SA KINI NGA PAGE -->
    <script src="../../js/user/home.js"></script>
</head>
<body class="bg-light">
    <!-- HEADER -->
    <header class="container-fluid d-flex border shadow p-3 flex-wrap w-100 justify-content-between gap-1">
        <div class="d-flex align-items-center" id="nav-container">
            <img src="../../assets/logo.jpg" alt="logo" style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover; box-shadow: 0 0 5px black;">
            <!-- BURGER MENU MUDISPLAY NI CJA UG MUGAMAY AG SCREEN -->
            <div class="burger-wrapper" id="burger-menu">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <!-- NAVIGATION -->
            <nav class="nav" id="nav">
                <div class="nav-item active-link">
                    <a href="home.php" class="nav-link fw-bold">Home</a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link fw-bold">About Us</a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link fw-bold">Account</a>
                </div>
                <div class="nav-item">
                    <a href="../logout.php" class="nav-link fw-bold">Logout</a>
                </div>
            </nav>
        </div>
        <!-- HIDDEN NAVIGATION -->
        <section class="container-fluid w-100 p-0" id="hidden-nav">
            <nav class="d-flex flex-column w-100">
                <div class="d-flex w-100 justify-content-center p-1 hidden-nav-item">
                    <a href="home.php" class="nav-link fw-bold">Home</a>
                </div>
                <div class="d-flex w-100 justify-content-center p-1 hidden-nav-item">
                    <a href="#" class="nav-link fw-bold">About Us</a>
                </div>
                <div class="d-flex w-100 justify-content-center p-1 hidden-nav-item">
                    <a href="#" class="nav-link fw-bold">Account</a>
                </div>
                <div class="d-flex w-100 justify-content-center p-1 hidden-nav-item">
                    <a href="../logout.php" class="nav-link fw-bold">Logout</a>
                </div>
            </nav>
        </section>
        <!-- SEARCH UG PRODUCT ANHI -->
        <section class="d-flex justify-content-end" id="search-container">
            <search>
                <form action="" method="post" class="d-flex gap-2">
                    <input type="search" name="productName" class="form-control border rounded-pill" required>
                    <button type="submit" class="btn">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </search>
        </section>
    </header>
    <!-- MAIN -->
    <main>
        <!-- ANHI AG MGA PRODUCT MAKITA NAKA GROUP PER CATEGORY-->
        <section class="container mt-3">
            <!-- ANHI MA DISPLAY AG PRODUCTS PER CATEGORY -->
            <?php 
                try {
                    $products = new Products($conn);
                    echo $products->displayProducts();
                } catch (\Throwable $th) {
                    echo $th;
                }
            ?>
        </section>
    </main> 
</body>
</html>
<!-- CLOSE DATABASE CONNECTION -->
<?php 
    if(isset($conn)){
        $conn->close();
    }
?>