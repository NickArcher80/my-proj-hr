<?php

namespace App\Controller;

use App\Entity\Orders;
use App\Form\OrdersType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Controller\OrderProductsController;
use App\Controller\ProductsController;

/**
 * @Route("/orders")
 */
class OrdersController extends Controller {

  /**
   * @Route("/", name="orders_index", methods={"GET"})
   */
  public function index(): Response {
    $orders = $this->getDoctrine()
            ->getRepository(Orders::class)
            ->findAll();
    foreach ($orders as $value) {
      $value->setSum($this->SumProd($value));
    }

    return $this->render('orders/index.html.twig', [
                'orders' => $orders,
    ]);
  }

  public function SumProd($value) {
    $prodInOrder = $value->getProducts();
    $sum = 0;
    foreach ($prodInOrder as $val) {
      $sum += $val->getPrice() * $val->getQuantity();
    }
    return ($sum);
  }
  /**
   * @Route("/new", name="orders_new", methods={"GET","POST"})
   */
  public function new(Request $request): Response
  {
  $order = new Orders();
  $form = $this->createForm(OrdersType::class, $order);
  $form->handleRequest($request);

  if ($form->isSubmitted() && $form->isValid()) {
  $entityManager = $this->getDoctrine()->getManager();
  $entityManager->persist($order);
  $entityManager->flush();

  return $this->redirectToRoute('orders_index');
}

return $this->render('orders/new.html.twig', [
            'order' => $order,
            'form' => $form->createView(),
        ]);
}

/**
 * @Route("/{id}", name="orders_show", methods={"GET"})
 */
public function show(Orders $order): Response {
return $this->render('orders/show.html.twig', [
            'order' => $order,
        ]);
}

/**
 * @Route("/{id}/edit", name="orders_edit", methods={"GET","POST"})
 */
public function edit(Request $request, Orders $order): Response {
$form = $this->createForm(OrdersType::class, $order);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
  $this->getDoctrine()->getManager()->flush();

  return $this->redirectToRoute('orders_index', [
              'id' => $order->getId(),
  ]);
}

return $this->render('orders/edit.html.twig', [
            'order' => $order,
            'form' => $form->createView(),
        ]);
}

/**
 * @Route("/{id}", name="orders_delete", methods={"DELETE"})
 */
public function delete(Request $request, Orders $order): Response {
if ($this->isCsrfTokenValid('delete' . $order->getId(), $request->request->get('_token'))) {
  $entityManager = $this->getDoctrine()->getManager();
  $entityManager->remove($order);
  $entityManager->flush();
}

return $this->redirectToRoute('orders_index');
}

}
