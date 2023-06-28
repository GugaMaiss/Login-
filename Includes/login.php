<?php

require_once __DIR__ . '/../Controllers/LoginController.php';

use Controllers\LoginController;

(new LoginController())->loginUser();