<?php

require '../conn.php';
include '../Model/User.php';

class User_Controller{

    private static $dbHelper;
    private static $user;

    private static $stmt;   
    private static $row;
    private static $result;

    private static string $SQL;
    private static string $email;
    private static string $password;
    private static string $Message;
    private static Array $response;

    private static $encodedData;
    private static $decode;


    function __construct(){
        self::$dbHelper = new DatabaseHelper;
        self::$dbHelper::init();

        self::$encodedData = file_get_contents("php://input");
        self::$decode = json_decode(self::$encodedData, true);

            
        if (self::$decode['Type'] == 'Login'){
            self::authenticate(self::$dbHelper::$conn);
        }else if (self::$decode['Type'] == 'Register'){
            self::create(self::$dbHelper::$conn);
        }      
    }

    private function authenticate($conn){
        /**
         * Handles user authentication
         * @param connection
         * @return JSON
         */

        self::$email = isset(self::$decode['Email']) ? self::$decode['Email'] : "";
        self::$password = isset(self::$decode['Password']) ? self::$decode['Password'] : "";

         if ($conn){

            self::$SQL = "SELECT * FROM users WHERE Email = ?";
            self::$stmt = $conn->prepare(self::$SQL);

            self::$stmt->bind_param('s', self::$email);
            self::$result = self::$stmt->get_result();            
            self::$row = self::$result->fetch_assoc();

            if (isset(self::$row)){
                if (password_verify(self::$password, self::$row['Password'])){
                    unset(self::$response);

                    self::$Message = "Authenticated";
                    session_start();

                    $_SESSION['Token'] = '';
                    $_SESSION['Name'] = '';        

                    self::$response[] = array
                    (
                        'Token' => $_SESSION['Token'], 
                        'Name' => $_SESSION['Name'],
                        'Message' => self::$Message
                    );                    
                }else {
                    unset(self::$response);

                    self::$Message = "Invalid Password";
                    self::$response[] = array('Message' => self::$Message);
                }
            }else {
                unset(self::$response);

                self::$Message = "Account Not Found";

                self::$response[] = array('Message' => self::$Message);
            }
         }

         echo json_encode(self::$response);
    }

    private function create($conn){
        if ($conn){
            try {
                unset(self::$response);

                $user_obj = array(
                    'User_ID' => self::$decode['UUID'],
                    'FullName' => self::$decode['FullName'],
                    'Email' => self::$decode['Email'],
                    'Password' => password_hash(self::$decode['Password'], PASSWORD_ARGON2ID)
                );

                self::$user = new User($user_obj);
                
                self::$SQL = "INSERT INTO users(User_ID, FullName, Email, Password) VALUES (?,?,?,?)";
                self::$stmt = $conn->prepare(self::$SQL);

                self::$stmt->bind_param('ssss', 
                    self::$user->Get_ID(), 
                    self::$user->Get_Name(), 
                    self::$user->Get_Email(),
                    self::$user->Get_Password()
                );
                self::$stmt->execute();

                session_start();

                $_SESSION['Token'] = '';
                $_SESSION['Name'] = '';        

                self::$response[] = array
                (
                    'Token' => $_SESSION['Token'], 
                    'Name' => $_SESSION['Name'],
                    'Message' => self::$Message
                );                    

            }catch (Exception $e){
                unset(self::$response);
                
                self::$Message = $ex;
                self::$response[] = array('Message' => self::$Message);
            }
        }

        echo json_encode(self::$response);
    }
}

$user_controller = new UserController();