<?php

namespace Drupal\admin_enquires\Controller;

use Drupal\Core\Controller\ControllerBase;

class AdminEnquiresController extends ControllerBase {

    public function hello(){
        return array(
            '#title' => 'Hello world',
            '#markup' => 'this is some content'
        );
    }

}