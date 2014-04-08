<?php

namespace ScaledModule\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController {

    public function indexAction() {
        try{
            $em = $this->getServiceLocator()->get('orm_scaledmodule');
        } catch (Exception $e) {
            echo '<p>Could not find the objectmanager</p>';
            echo '<pre>';
            echo $e->getMessage();
            exit;
        }
    }

}