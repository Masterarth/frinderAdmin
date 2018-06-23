<?php

class PhotoController extends ControllerBase {

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
        $this->view->setVar("title", "Foto hinzufügen");
    }

    public function createAction() {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "place",
                'action' => 'index'
            ]);
            return;
        }

        $photo = new Photo();
        $photo->src = $this->request->getPost("src");
        $photo->place_id = $this->request->getPost("placeid");

        $success = $photo->save();
        if ($this->checkSqlResult($success, $photo)) {
            $this->flash->success("Foto konnte nicht erstellt werden");
        }

        $this->response->redirect("/place/show/" . $photo->place_id);
    }

    public function deleteAction($id) {
        $photo = Photo::findFirstByid($id);
        if (!$photo) {
            $this->flash->error("place was not found");
            $this->dispatcher->forward([
                'controller' => "place",
                'action' => 'show',
                'params' => [$photo->place_id]
            ]);
            return;
        }
        if (!$photo->delete()) {
            foreach ($photo->getMessages() as $message) {
                $this->flash->error($message);
            }
            $this->dispatcher->forward([
                'controller' => "place",
                'action' => 'index',
                'params' => [$photo->place_id]
            ]);
            return;
        }
        $this->flash->success("photo was deleted successfully");
        $this->response->redirect("/place/show/" . $photo->place_id);
    }

}
