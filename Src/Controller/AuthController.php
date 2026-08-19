<?php
require_once dirname(__DIR__).'/Model/Repository/SuperViseurRepository.php';
class AuthController{

 private  function __construct(){}

public static function login(){
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $email = $_POST['email'];
        $password=$_POST['password'];
        $result= SuperViseurRepository::getUser($email);
        if($result!==null && $result->getMotDePasse()===$password){
        SessionManager::set_session('connect',$result);
        header('Location:http://localhost:8000/recherche');
        exit;
        }
        header('Location:http://localhost:8000/');
        exit;
    }

require_once dirname(__DIR__).'/View/login.html.php';
}

public static function logout(){
SessionManager::destroy_session();
header('Location:http://localhost:8000/');
exit;

}


}