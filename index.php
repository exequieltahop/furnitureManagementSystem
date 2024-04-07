<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- BOOTSTRAP CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="bs/css/bootstrap.css">
    <!-- SCRIPT -->
    <script src="js/index.js"></script>
</head>
<body>
    <main class="d-flex justify-content-center align-items-center bg-light" style="height: 100%; min-height: 100vh;">
    <!-- <main class="bg-image" style="background-image: url('assets/indexbg.jpg'); background-position: center; background-repeat: norepeat;background-size: cover;"> -->
        <!-- SECTION FORM LOGIN -->
        <section class="container d-flex justify-content-center flex-wrap bg-white p-3" style="width: 95%; box-shadow: -10px 10px 30px -15px black;">
            <div class="d-flex w-100" style="max-width: 500px;">
                <img src="assets/logo.jpg" alt="logo" class="img-fluid w-100" style="aspect-ratio: 1/1;">
            </div>
            <form action="process/all/loginProcess.php" method="post" class="p-4  rounded w-100 bg-white d-flex flex-column justify-content-center" style="max-width: 500px; height: stretch;">
            <!-- style="max-width: 500px; background-color: rgba(0, 0, 0, 0.01); backdrop-filter: blur(10px);" -->
                <h1 class="text-center text-dark">Login</h1>
                <div class="form-group mt-3">
                    <label for="username" class="fw-bold text-dark">Username: </label>
                    <input type="email" class="form-control border border-dark bg-transparent text-dark" name="username" id="username" autocomplete="email" required placeholder="Email">
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="fw-bold text-dark">Password: </label>
                    <input type="password" class="form-control border border-dark bg-transparent text-dark" name="password" id="password" autocomplete="current-password" required placeholder="Password">
                </div>
                <div class="form-group d-flex align-items-center gap-2 mt-3">
                    <input type="checkbox" id="showpassword" style="height: 15px; width: 15px;">
                    <label for="showpassword" class="text-dark">Show Password</label>
                </div>
                <a href="pages/signup.php" class="d-block text-dark text-center">Don't Have An Account? Sign Up Here!</a>
                <div class="d-flex gap-2 mt-3">
                    <button class="btn btn-primary fw-bold w-50" type="submit" name="btnSubmit">Login</button>
                    <button type="reset" class="btn btn-danger w-50 fw-bold">Clear</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>