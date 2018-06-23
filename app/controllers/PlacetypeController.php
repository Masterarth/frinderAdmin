<?php

class PlacetypeController extends \Phalcon\Mvc\Controller {

    public function deleteAction($id) {
        $placetype = Placetype::findFirstByid($id);
        if (!$placetype) {
            $this->flash->error("placetype was not found");
            $this->dispatcher->forward([
                'controller' => "place",
                'action' => 'show',
                'params' => [$placetype->place_id]
            ]);
            return;
        }
        if (!$placetype->delete()) {
            foreach ($place->getMessages() as $message) {
                $this->flash->error($message);
            }
            $this->dispatcher->forward([
                'controller' => "place",
                'action' => 'show',
                'params' => [$placetype->place_id]
            ]);
            return;
        }
        $this->flash->success("placetype was deleted successfully");
        $this->response->redirect("/place/show/" . $placetype->place_id);
    }

}
