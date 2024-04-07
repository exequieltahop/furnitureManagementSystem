<?php 
    // PRODUCT CLASS
    class Products {
        private $conn;
        // CONTRUCTOR FUNCTION
        function __construct($conn) {
            $this->conn = $conn;
        }
        // MAIN METHOD
        function displayProducts() : string {
            try {
                $return = '';
                // KUHAON AG MGA PRODUCT CATEGORY
                $categories = $this->productCategory();
                // KUNG EMPTY AG CATEGORIES THEN RETURN UG NO PRODUCTS
                if(empty($categories)){
                    return '<h1>No Products</h1>';
                }
                // E LOOP AG PRODUCT CATEGORY
                foreach($categories as $category){
                    // ECONCAT SA RETURN STRING AG UNANG PART SA RETURN CODE
                    $return .= '
                        <div class="card shadow-lg p-1 mt-3">
                            <div class="card-header border-dark">
                                <!-- CATEGORY NAME -->
                                <h3>'.$category.'</h3>
                            </div>
                            <div class="card-body bg-white overflow-auto d-flex gap-3">
                    ';
                    // EPREPARE AG QUERY
                    $query = 'SELECT * FROM products
                              WHERE category = ?';
                    $stmt = $this->conn->prepare($query);
                    // ECHECK AG QUERY KUNG MALI BA
                    if(!$stmt){
                        throw new Exception('Class Products::displayProducts() stmt preparation failed! - '
                        .$this->conn->errno.'/'.$this->conn->error);
                    }
                    // ECHECK AG QUERY KUNG NA BIND BAG VALUES
                    if(!$stmt->bind_param('s', $category)){
                        throw new Exception('Class Products::displayProducts() stmt bind_param failed! - '
                        .$this->conn->errno.'/'.$this->conn->error);
                    }
                    // ECHECK AG QUERY KUNG NA EXECUTE BA
                    if(!$stmt->execute()){
                        throw new Exception('Class Products::displayProducts() stmt execution failed! - '
                        .$this->conn->errno.'/'.$this->conn->error);
                    }
                    // KUHAON AG RESULT GIKAN SA DATABASE
                    $result = $stmt->get_result();
                    // ESAVE AG RESULT SA $return vaiable NGA MAO PD GAMITON PARA SA RETURN
                    while($row = $result->fetch_assoc()){
                        // ECONCAT AG MGA DATA SA PRODUCT PER CATEGORY SA RETURN STRING
                        $return .= '
                                    <!-- BOX MAO NIG PER PRODUCT PER CATEGORY -->
                                    <div class="box p-3 border border-dark rounded shadow product-box">
                                        <!-- CLICKABLE NI PARA MAS MAVIEW AG PRODUCT -->
                                        <a href="#">
                                            <img src="../../assets/product images/tables/'.$row['product_img'].'" alt="tableA1" class="img-fluid rounded product-img">
                                        </a>
                                        <div class="d-flex flex-column mt-3">
                                            <span><strong>Name: </strong>'.$row['product_name'].'</span>
                                            <span><strong>Description: </strong>'.$row['product_description'].'</span>
                                            <span><strong>Price: </strong>'.$row['product_price'].' PHP</span>
                                        </div>
                                        <!-- BUY LINK KUNG ECLICK MU ADTU SA PAGE NGA MAKITA AG OPTIONS SA BUY -->
                                        <div class="d-flex justify-content-end">
                                            <a href="#" class="d-block align-self-end">Buy</a>
                                        </div>
                                    </div>
                        ';
                    }
                    // AG SUMPAY SA CODE ECONCAT GIHAPON
                    $return .= '</div>
                            </div>';
                }
                // CLOSE AG STMT
                $stmt->close();
                // THEN MU RETURN SA DATA
                return $return;
            } catch (\Throwable $th) {
                throw $th;
            }
        }
        // GET PRODUCT CATEGORY
        private function productCategory() : array {
            try {
                $return = [];
                // MYSQL QUERY
                $query = 'SELECT DISTINCT category FROM products';
                // PREPARE STATEMENT
                $stmt = $this->conn->prepare($query);
                // ECHECK KUNG ANG QUERY SAKTO BA KUNG DILI MU THROW UG EXCEPTION
                if(!$stmt){
                    throw new Exception('Class Products::productCategory() stmt preparation failed! - '
                    .$this->conn->errno.'/'.$this->conn->error);
                }
                // ECHECK KUNG ANG STMT NING EXECUTE BA KUNG DILI MU THROW UG EXCEPTION
                if(!$stmt->execute()){
                    throw new Exception('Class Products::productCategory() stmt execution failed! - '
                    .$this->conn->errno.'/'.$this->conn->error);
                    
                }
                // KUHAON AG RESULT SA STMT/ QUERY
                $result = $stmt->get_result();
                // KUNG WAY RESULT MU RETURN UG EMPTY ARRAY
                if($result->num_rows < 1){
                    $stmt->close();
                    return [];
                }
                // KUNG NAAY RESULT, ESAVE AG RESULT SA ARRAY
                while($row = $result->fetch_assoc()){
                    $return[] = $row['category'];
                }
                // THE AG NA SAVE NA DATA SA ARRAY E RETURN
                return $return;
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }
?>