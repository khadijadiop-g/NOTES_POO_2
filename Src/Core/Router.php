<?php
require_once dirname(__DIR__).'/Controller/IncriptionController.php';
require_once dirname(__DIR__).'/Controller/AuthController.php';
class Router
{
    public static function router(): void
    {
 
        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
        $uri = rtrim($uri, '/');
        if ($uri === '') {
            $uri = '/';
        }

        switch ($uri) {

            
            case '/recherche':
            IncriptionController::showInscription();
                break;
                  case '/':
                  case '/login':
            AuthController::login();
                break;
                 case '/logout':
            AuthController::logout();
                break;
            default:
                http_response_code(404);
                echo "404 - Page introuvable : " . htmlspecialchars($uri);
                break;
        }
    }
}
