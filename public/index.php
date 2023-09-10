<?php
include_once "../vendor/autoload.php";

$app = \core\Application::getInstance();

$app->router->get("/login",[\controller\LoginController::class,'loginPage']);
$app->router->post("/login",[\controller\LoginController::class,'login']);

$app->run();