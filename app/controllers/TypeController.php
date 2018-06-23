<?php

class TypeController extends ControllerBase {

    public function addAction($id = null) {
        if (!$id) {
            $this->flash->error("place was not found");
            $this->dispatcher->forward([
                'controller' => "place",
                'action' => 'index'
            ]);
            return;
        }
        $this->view->setVar("placeid", $id);
        $this->view->setVar("title", "Type hinzufügen");
    }

    public function createAction() {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "place",
                'action' => 'index'
            ]);
            return;
        }

        $place = Place::findFirst($this->request->getPost("placeid"));
        if (!$place) {
            $this->dispatcher->forward([
                'controller' => "place",
                'action' => 'index'
            ]);
            return;
        }

        $type = new Type();
        $type->name = $this->request->getPost("name");

        $success = $type->save();
        if ($this->checkSqlResult($success, $type)) {
            $this->flash->success("Type konnte nicht erstellt werden");
        }

        $placeType = new Placetype();
        $placeType->place_id = $place->id;
        $placeType->type_id = $type->id;
        $success = $placeType->save();
        if ($this->checkSqlResult($success, $placeType)) {
            $this->flash->success("placetype konnte nicht erstellt werden");
        }

        $this->response->redirect("/place/show/" . $this->request->getPost("placeid"));
    }

    public function deleteAction($id) {
        $type = Type::findFirstByid($id);
        if (!$type) {
            $this->flash->error("place was not found");
            $this->dispatcher->forward([
                'controller' => "place",
                'action' => 'show',
                'params' => [$type->Place->id]
            ]);
            return;
        }
        if (!$type->delete()) {
            foreach ($type->getMessages() as $message) {
                $this->flash->error($message);
            }
            $this->dispatcher->forward([
                'controller' => "place",
                'action' => 'index',
                'params' => [$type->Place->id]
            ]);
            return;
        }
        $this->flash->success("photo was deleted successfully");
        $this->response->redirect("/place/show/" . $type->Place->id);
    }

}
