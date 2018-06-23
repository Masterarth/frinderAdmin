<?php

class IndexController extends ControllerBase {

    public function indexAction() {
        return $this->dispatcher->forward(
                        [
                            "controller" => "place",
                            "action" => "index",
                        ]
        );
    }

}
