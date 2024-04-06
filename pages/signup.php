<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- BOOTSTRAP CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- BOOTSTRAP CSS OFFLINE -->
    <link rel="stylesheet" href="../bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bs/css/bootstrap.css">
    <!-- SCRIPT -->
    <script src="../js/signup.js"></script>
    <!-- SWEET ALERT CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-light">
    <!-- FORM SIGNUP -->
    <main class="bg-image" style="background-image: url('../assets/bgphoto.jpeg'); background-position: center; background-size: cover; background-repeat:norepeat;">
        <section class="container vh-100 d-flex justify-content-center align-items-center" >
            <form action="../process/all/signUpProcess.php" method="post" class=" w-100 p-3 shadow-lg rounded border border-dark bg-white" style="max-width: 500px; opacity: 80%;">
            <!-- style="max-width: 500px; backdrop-filter: blur(40px); background-color: rgba(0, 0 , 0, 0.01);" -->
                <h1>Sign Up</h1>
                <div class="form-group">
                    <label for="email" class="fw-bold">Email</label>
                    <input type="email" class="form-control border border-dark" name="email" id="email" placeholder="Email/Username" required>
                </div>
                <div class="form-group">
                    <label for="password" class="fw-bold">Password</label>
                    <input type="password" name="password" id="password" class="form-control border border-dark" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="showPass">
                    <label for="showPass">Show Password</label>
                </div>
                <div class="form-group">
                    <label for="fullname" class="fw-bold">Full Name</label>
                    <input type="text" name="fullname" id="fullname" class="form-control border border-dark" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                    <label for="age" class="fw-bold">Age</label>
                    <input type="number" class="form-control border border-dark" name="age" id="age" placeholder="Age" required>
                </div>
                <a href="../index.php" class="d-block text-center text-dark w-100">Already Have An Account?</a>
                <div class="d-flex gap-3 mt-3">
                    <button class="btn btn-primary w-50" type="submit" name="signUpBtn">Sign Up</button>
                    <button class="btn btn-danger w-50" type="reset">Cancel</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>