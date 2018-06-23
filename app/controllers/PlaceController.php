<?php

use Phalcon\Paginator\Adapter\Model as Paginator;

class PlaceController extends ControllerBase {

    public function indexAction($numberPage = null) {
        $this->view->setVar("title", "places");
        if (!$numberPage) {
            $numberPage = 1;
        }
        if ($this->request->get("searchstring")) {
            $paginator = new Paginator(
                    [
                "data" => $places = Place::find(
                        [
                            "conditions" => "name LIKE ?1",
                            "bind" => [
                                1 => "%" . $this->request->get("searchstring") . "%",
                            ]
                ]),
                "limit" => 20,
                "page" => $currentPage,
                    ]
            );
        } else {
            $paginator = new Paginator([
                'data' => Place::find(),
                'limit' => 10,
                'page' => $numberPage
            ]);
        }
        $this->view->page = $paginator->getPaginate();
    }

    public function showAction($id = null) {
        if (!$id) {
            $this->flash->error("place was not found");
            $this->dispatcher->forward([
                'controller' => "place",
                'action' => 'index'
            ]);
            return;
        }
        $place = Place::findFirstByid($id);
        if (!$place) {
            $this->flash->error("place was not found");
            $this->dispatcher->forward([
                'controller' => "place",
                'action' => 'index'
            ]);
            return;
        }
        $this->view->setVar("place", $place);
        $this->view->setVar("title", $place->name);
    }

    public function editAction($id) {
        if (!$this->request->isPost()) {
            $place = Place::findFirstByid($id);
            if (!$place) {
                $this->flash->error("place was not found");
                $this->dispatcher->forward([
                    'controller' => "place",
                    'action' => 'index'
                ]);
                return;
            }
            $this->view->setVar("title", "Place bearbeiten");
            $this->view->place = $place;
        }
    }

    public function saveAction() {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "place",
                'action' => 'index'
            ]);
            return;
        }
        $place = Place::findFirstByid($this->request->getPost("id"));
        if (!$place) {
            $this->flash->error("place does not exist " . $this->request->getPost("id"));
            $this->dispatcher->forward([
                'controller' => "place",
                'action' => 'index'
            ]);
            return;
        }

        $place->name = $this->request->getPost("name");
        $place->badge = $this->request->getPost("badge");
        $place->gid = $this->request->getPost("gid");
        $place->description = $this->request->getPost("description");
        $place->lat = $this->request->getPost("lat");
        $place->lon = $this->request->getPost("lon");

        if (!$place->save()) {
            foreach ($place->getMessages() as $message) {
                $this->flash->error($message);
            }
            $this->dispatcher->forward([
                'controller' => "place",
                'action' => 'edit',
                'params' => [$place->id]
            ]);
            return;
        }
        $this->flash->success("place was updated successfully");
        $this->response->redirect("/place/index");
    }

    public function newAction() {
        $this->view->setVar("title", "Neuer Place");
    }

    public function createAction() {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "place",
                'action' => 'index'
            ]);
            return;
        }

        $place = new Place();
        $place->name = $this->request->getPost("name");
        $place->badge = $this->request->getPost("badge");
        $place->gid = $this->request->getPost("gid");
        $place->description = $this->request->getPost("description");
        $place->lon = $this->request->getPost("lon");
        $place->lat = $this->request->getPost("lat");

        $success = $place->save();
        if ($this->checkSqlResult($success, $place)) {
            $this->flash->success("Place konnte nicht erstellt werden");
        }

        $this->response->redirect("/place/index");
    }

    public function deleteAction($id) {
        $place = Place::findFirstByid($id);
        if (!$place) {
            $this->flash->error("place was not found");
            $this->dispatcher->forward([
                'controller' => "place",
                'action' => 'index'
            ]);
            return;
        }
        if (!$place->delete()) {
            foreach ($place->getMessages() as $message) {
                $this->flash->error($message);
            }
            $this->dispatcher->forward([
                'controller' => "place",
                'action' => 'index'
            ]);
            return;
        }
        $this->flash->success("place was deleted successfully");
        $this->response->redirect("/place/index");
    }

}
