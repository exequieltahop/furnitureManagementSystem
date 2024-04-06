<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php 
    // INCLUDE DB
    include_once '../../dbconn/conn.php';
    // MAIN
    try {
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            throw new Exception('
                <script>
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "SERVER ERROR",
                        footer: ""
                    }).then(()=>{
                        window.location.href = "../../pages/signup.php";
                    });
                </script>
            ');
        }
        // POST VARIABLES
        $email = $_POST['email'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $age = $_POST['age'];
        if(strlen($password) < 8){
            throw new Exception('
                                <script>
                                    Swal.fire({
                                        icon: "error",
                                        title: "Oops...",
                                        text: "Password must be atleast 8 characters long!",
                                        footer: ""
                                    }).then(()=>{
                                        window.location.href = "../../pages/signup.php";
                                    });
                                </script>
                            ');
        }
        // VALIDATE EMAIL
        $validate = validate($email, $conn);
        if($validate === true){
            throw new Exception('
                                <script>
                                    Swal.fire({
                                        icon: "error",
                                        title: "Oops...",
                                        text: "Email Already Exist!",
                                        footer: ""
                                    }).then(()=>{
                                        window.location.href = "../../pages/signup.php";
                                    });
                                </script>
                            ');
        }
        // REGISTER ACCOUNT
        $status = registerAccount($email, $password, $fullname, $age, $conn);
        if($status === false){
            echo '
                <script>
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Email Already Exist!",
                        footer: ""
                    }).then(()=>{
                        window.location.href = "../../pages/signup.php";
                    });
                </script>
            ';
        }
        echo '
                <script>
                    Swal.fire({
                        title: "Good job!",
                        text: "Successfully Register Account!",
                        icon: "success"
                    }).then(()=>{
                        window.location.href = "../../index.php";
                    });
                </script>
            ';
    } catch (\Throwable $th) {
        echo $th->getMessage();;
    } finally {
        if(isset($conn)){
            $conn->close();
        }
    }
    // REGISTER USER
    function registerAccount(string $email, 
                             string $password, 
                             string $fullname, 
                             int $age,
                             mysqli $conn) : bool {
        try {
            $newDate = new DateTime('now', new DateTimeZone('Asia/Manila'));
            $now = $newDate->format('y-m-d:H:i:s');
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $role = 'user';
            $query = 'INSERT INTO users(email,
                                        fullname,
                                        password,
                                        age,
                                        created_at,
                                        roles)
                      VALUES(?, ?, ?, ?, ?, ?)';
            $stmt = $conn->prepare($query);
            if(!$stmt){
                throw new Exception('<script>
                                        Swal.fire({
                                            icon: "error",
                                            title: "Oops...",
                                            text: "Failed To Register! Account",
                                            footer: ""
                                        }).then(()=>{
                                                window.location.href = "../../pages/signup.php";
                                            });
                                        );
                                    </script>');
            }
            if(!$stmt->bind_param('sssiss', $email, $fullname, $hashedPassword, $age, $now, $role)){
                throw new Exception('<script>
                                        Swal.fire({
                                            icon: "error",
                                            title: "Oops...",
                                            text: "Failed To Register! Account",
                                            footer: ""
                                        })
                                        .then(()=>{
                                            window.location.href = "../../pages/signup.php";
                                        });
                                    </script>');
            }
            if(!$stmt->execute()){
                throw new Exception('<script>
                                        Swal.fire({
                                            icon: "error",
                                            title: "Oops...",
                                            text: "Failed To Register! Account",
                                            footer: ""
                                        }).then(()=>{
                                            window.location.href = "../../pages/signup.php";
                                        });
                                    </script>');
            }
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    // CHECK USER ACCOUNT  IF EXISTS
    function validate(string $email, mysqli $conn) : bool {
        try {
            $query = 'SELECT * FROM users WHERE BINARY email = ?';
            $stmt = $conn->prepare($query);
            if (!$stmt) {
                throw new Exception('<script>
                                        Swal.fire({
                                            icon: "error",
                                            title: "Oops...",
                                            text: "Failed to Register Account!",
                                            footer: ""
                                        }).then(()=>{
                                            window.location.href = "../../pages/signup.php";
                                        });
                                    </script>');
            }
            if(!$stmt->bind_param('s', $email)){
                throw new Exception('<script>
                                        Swal.fire({
                                            icon: "error",
                                            title: "Oops...",
                                            text: "Failed to Register Account!",
                                            footer: ""
                                        });
                                        .then(()=>{
                                            window.location.href = "../../pages/signup.php";
                                        });
                                    </script>');
            }
            if(!$stmt->execute()){
                throw new Exception('<script>
                                        Swal.fire({
                                            icon: "error",
                                            title: "Oops...",
                                            text: "Failed to Register Account!",
                                            footer: ""
                                        });
                                        .then(()=>{
                                            window.location.href = "../../pages/signup.php";
                                        });
                                    </script>');
            }
            $result = $stmt->get_result();
            if($result->num_rows < 1){
                $stmt->close();
                return false;
            }else{
                $stmt->close();
                return true;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
?>
</body>
