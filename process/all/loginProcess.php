<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php 
    // SESSION START PARA MAGAMIT AG MGA SESSION VARIABLES
    session_start();
    // INCLUDE AG DATABASE CONNECTION
    include_once '../../dbconn/conn.php';
    // MAIN
    try {
        // ECHECK KUNG AG SERVER REQUEST METHOD KUNG POST BA KUNG DILI MU THROW UG EXCEPTION
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            throw new Exception('
                <script>
                    console.log("Server Request Method Not POST!");
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "SERVER ERROR",
                        footer: ""
                    }).then(()=>{
                        window.location.href = "../../index.php";
                    });
                </script>
            ');
        }
        // KUHAON AG MGA LOGIN CREDENTIALS NGA NAKA POST
        $email = $_POST['username'];
        $password = $_POST['password'];
        $status = validateUser($email, $password, $conn);
        if($status == true){
            $_SESSION['hasLoginStatus'] = 1;
            $_SESSION['userEmail'] = $email;
            if($_SESSION['userRole'] == 'user'){
                echo '
                    <script>
                        Swal.fire({
                            title: "Good job!",
                            text: "Successfully Login!",
                            icon: "success"
                        }).then(()=>{
                            window.location.href = "../../pages/user/home.php";
                        });
                    </script>
                ';
            }else{
                echo '
                    <script>
                        Swal.fire({
                            title: "Good job!",
                            text: "Successfully Register Account!",
                            icon: "success"
                        }).then(()=>{
                            window.location.href = "../../pages/admin/home.php";
                        });
                    </script>
                ';
            }
        }
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
    // FUNCTION PARA MAGVALIDATE SA EMAIL
    function validateUser(string $email, string $password, mysqli $conn) : bool {
        try {
            $query = 'SELECT * FROM users 
                      WHERE BINARY email = ?
                      AND roles = "user"';
            $stmt = $conn->prepare($query);
            if(!$stmt){
                throw new Exception('
                    <script>
                        console.log("validateUser() stmt preparation incorrect! - '.$conn->errno.'/'.$conn->errno.'");
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "SERVER ERROR",
                            footer: ""
                        }).then(()=>{
                            window.location.href = "../../index.php";
                        });
                    </script>
                ');
                
            }
            if(!$stmt->bind_param('s', $email)){
                throw new Exception('
                    <script>
                        console.log("validateUser() stmt bind_param incorrect! - '.$conn->errno.'/'.$conn->errno.'");
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "SERVER ERROR",
                            footer: ""
                        }).then(()=>{
                            window.location.href = "../../index.php";
                        });
                    </script>
                ');
                
            }
            if(!$stmt->execute()){
                throw new Exception('
                    <script>
                        console.log("validateUser() stmt execution failed! - '.$conn->errno.'/'.$conn->errno.'");
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "SERVER ERROR",
                            footer: ""
                        }).then(()=>{
                            window.location.href = "../../index.php";
                        });
                    </script>
                ');
                
            }
            $result = $stmt->get_result();
            if($result->num_rows != 1){
                throw new Exception('
                    <script>
                    console.log("Username Was Invalid!");
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Invalid Username!",
                            footer: ""
                        }).then(()=>{
                            window.location.href = "../../index.php";
                        });
                    </script>
                ');
                
            }
            if($row = $result->fetch_assoc()){
                $hashedPassword = $row['password'];
                $role = $row['roles'];
            }
            if(!password_verify($password, $hashedPassword)){
                throw new Exception('
                    <script>
                        console.log("Username Was Invalid!");
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Invalid Password!",
                            footer: ""
                        }).then(()=>{
                            window.location.href = "../../index.php";
                        });
                    </script>
                ');
            }
            $_SESSION['userRole'] = $role;
            $stmt->close();
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
?>
</body>