<?php

require_once __DIR__ . '/../Controllers/RegisterController.php';

use Controllers\RegisterController;

(new RegisterController())->signupUser();