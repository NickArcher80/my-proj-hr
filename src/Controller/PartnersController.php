<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class PartnersController extends Controller {

  /**
   * @Route("/partners", name="partners")
   */
  public function index() {
    return $this->render('partners/index.html.twig', [
                'controller_name' => 'PartnersController',
    ]);
  }

}
