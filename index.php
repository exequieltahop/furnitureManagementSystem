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
<body class="bg-light">
    <main class="bg-image" style="background-image: url('assets/indexbg.jpg'); background-position: center; background-repeat: norepeat;background-size: cover;">
        <!-- SECTION FORM LOGIN -->
        <section class="container vh-100 d-flex justify-content-center align-items-center">
            <form action="process/all/loginProcess.php" method="post" class="p-3 bg-white border rounded shadow w-100 border-dark" style="max-width: 500px; opacity: 80%;">
                <h1 class="text-center">Login</h1>
                <div class="form-group">
                    <label for="username" class="fw-bold">Username: </label>
                    <input type="email" class="form-control border border-dark" name="username" id="username" autocomplete="email" required placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password" class="fw-bold">Password: </label>
                    <input type="password" class="form-control border border-dark" name="password" id="password" autocomplete="current-password" required placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="checkbox" id="showpassword">
                    <label for="showpassword">Show Password</label>
                </div>
                <a href="pages/signup.php" class="d-block text-dark text-center">Don't Have An Account? Sign Up Here!</a>
                <div class="d-flex gap-2 mt-3">
                    <button class="btn btn-primary w-50" type="submit" name="btnSubmit">Login</button>
                    <button type="reset" class="btn btn-danger w-50">Clear</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>