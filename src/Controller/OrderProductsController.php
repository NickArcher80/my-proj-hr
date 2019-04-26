<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\OrderProducts;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Orders;
use App\Entity\Products;


class OrderProductsController extends Controller {

  /**
   * @Route("/order/products", name="order_products")
   */
  public function index() {
    return $this->render('order_products/index.html.twig', [
                'controller_name' => 'OrderProductsController',
    ]);
  }
   /**
   * @Route("/get_order", name="getOrderSum", methods="GET")
   */
  public function getOrderSum($id) {
    $prod = $this->getDoctrine()
            ->getRepository(OrderProduct::class)
            ->findBy(array('order_id'=>$id));
    $sum=0;
    foreach ($prod as $value){
      $sum+=$value->getQuantity() * $value->getPrice(); 
    }

        return $sum;
  }
  public function getProductsByOrderId($id) {
    $products = $this->getDoctrine()
            ->getRepository(\App\OrderProduct::class)
            ->findBy(array('order'=>$id));

        return $products;
  }

}
