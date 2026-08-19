<?php
require_once dirname(__DIR__).'/Src/Core/Router.php';
require_once dirname(__DIR__) . '/Src/Core/Database.php';
require_once dirname(__DIR__) . '/Src/Core/Debug.php';
require_once dirname(__DIR__).'/Src/Core/SessionManager.php';
SessionManager::init_session();
Router::router();