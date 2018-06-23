<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller {

    public function checkSqlResult($success, $obj) {
        if (!$success) {
            $messages = $obj->getMessages();
            foreach ($messages as $message) {
                var_dump($message);
            }
            return false;
        }
        return true;
    }

}
