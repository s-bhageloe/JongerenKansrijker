<?php 

class database {
    private $host;
    private $dbh;
    private $user;
    private $pass;
    private $db;

        function __construct(){
            $this->host = 'localhost';
            $this->user = 'root';
            $this->pass = '';
            $this->db = 'jongerenkansrijker';

            $dsn = "mysql:host=$this->dbh;db_name=$this->dbh;charset=utf8mb4";

            
            try{
                $dsn = "mysql:host=$this->host;dbname=$this->db";
                $this->dbh = new PDO($dsn, $this->user, $this->pass); 
            }catch(PDOException $e){
                throw new PDOException($e->getMessage(), (int)$e->getCode());
            }
        }

        public function insert($statement, $placeholders, $location=null){
            try {
                $this->db_connection->beginTransaction();
    
                // create PDOStatementObject and execute
                $stmt = $this->db_connection->prepare($statement);
                $stmt->execute($placeholders);
    
                $this->db_connection->commit();
                if(!is_null($location)){
                    header("location: $location.php");
                }
            }catch (Exception $e){
                $this->db_connection->rollback();
                throw $e;
            }
        }

        public function login($username, $password){
            $sql = "SELECT medewerkercode, medewerkergebruikersnaam, medewerkerwachtwoord
                    FROM medewerker 
                    WHERE medewerkergebruikersnaam = :username";
    
            $stmt = $this->db->prepare($sql);
    
            $stmt->execute([
                'username'=>$username,
            ]);
    
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if(is_array($result) && count($result) > 0){
                
                if($username && password_verify($password, $result['medewerkerwachtwoord'])){
                    session_start();
    
                    $_SESSION['medewerkerscode'] = $result['medewerkercode'];
                    $_SESSION['medewerkersgebruikersnaam'] = $result['medewerkergebruikersnaam'];
                    $_SESSION['is_logged_in'] = true;
    
                    $date = date("Y-m-d H:i:s");
    
                    header("location: welcome.php");
    
    
                }else{
                    echo 'Username and/or password is incorrect. Please fix your input errors and try again';
                }
               
            }else{
                echo 'Username and/or password is incorrect. Please fix your input errors and try again.';
            }
        }


}


?>