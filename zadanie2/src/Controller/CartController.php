<?php

namespace App\Controller;

use App\Entity\Cart;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CartController extends AbstractController
{   
    /**
    * @Route("/cart", name="cart_list", methods={"GET"})
    */
    public function getCart(EntityManagerInterface $em): Response
    {
        
        $cart = $em->getRepository(Cart::class)->findAll();
        return $this->render('cart/index.html.twig', [
            'cart' => $cart,
        ]);
    }

    /**
    * @Route("/cart/{id}", name="cart_get", methods={"GET"})
    */
    public function getCartById(EntityManagerInterface $em, int $id): Response
    {
        $cartItem = $em->getRepository(Cart::class)->find($id);

        if (!$cartItem) {
            return $this->render('cart/not_found.html.twig', [
                'id' => $id
            ]);
        }

        return $this->render('cart/show.html.twig', [
            'cart' => $cartItem,
        ]);
    }
    /**
    * @Route("/cart", name="cart_create", methods={"POST"})
    */
    public function createCart(Request $request, EntityManagerInterface $em): Response
    {
        $productId = $request->request->get('productId');
            $quantity = $request->request->get('quantity');

            if (!$productId || !$quantity) {
                return new JsonResponse(['error' => 'Invalid input'], Response::HTTP_BAD_REQUEST);
            }

            $cart = new Cart();
            $cart->setProductId($productId);
            $cart->setQuantity($quantity);

            $em->persist($cart);
            $em->flush();

            return $this->redirectToRoute('cart_list');
    }

     /**
    * @Route("/cart/{id}", name="cart_update", methods={"PUT"})
    */
    public function updatecart(Request $request, EntityManagerInterface $em, int $id): Response
    {
        $cart = $em->getRepository(Cart::class)->find($id);

        if (!$cart) {
            return new JsonResponse(['error' => 'Cart not found'], Response::HTTP_NOT_FOUND);
        }

        $data = json_decode($request->getContent(), true);
        $quantity = $data['quantity'] ?? null;
        $productId = $data['productId'] ?? null;

        if ($quantity) {
            $cart->setQuantity($quantity);
        }
        if ($productId) {
            $cart->setProductId($productId);
        }

        $em->flush();

        return new JsonResponse(['message' => 'Cart updated successfully']);
    }

    /**
    * @Route("/cart/{id}", name="cart_delete", methods={"DELETE"})
    */
    public function deletecart(EntityManagerInterface $em, int $id): Response
    {
        $cart = $em->getRepository(Cart::class)->find($id);

        if (!$cart) {
            return new JsonResponse(['error' => 'Cart not found'], Response::HTTP_NOT_FOUND);
        }

        $em->remove($cart);
        $em->flush();

        return new JsonResponse(['message' => 'Cart deleted successfully']);
    }
}
