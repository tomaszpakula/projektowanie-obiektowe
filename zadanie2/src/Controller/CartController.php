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
    public function getCart(EntityManagerInterface $em): JsonResponse
    {
        
        $cart = $em->getRepository(Cart::class)->findAll();
        $data = [];

        foreach ($cart as $cartItem) {
            $data[] = [
                'id' => $cartItem->getId(),
                'productId' => $cartItem->getProductId(),
                'quantity' => $cartItem->getQuantity(),
            ];
        }

        return new JsonResponse($data);
    }

    /**
    * @Route("/cart/{id}", name="cart_get", methods={"GET"})
    */
    public function getcartByProductId(EntityManagerInterface $em,int $id): JsonResponse
    {
        $cart = $em->getRepository(cart::class)->findBy(['productId' => $id]);
        if (!$cart) {
            return new JsonResponse(['error' => 'cart not found with prdouctId: ' . $id], Response::HTTP_NOT_FOUND);
        }
    
        foreach ($cart as $cartItem) {
            $data[] = [
                'id' => $cartItem->getId(),
                'productId' => $cartItem->getProductId(),
                'quantity' => $cartItem->getQuantity(),
            ];
        }

        return new JsonResponse($data);
    
    }
    /**
    * @Route("/cart", name="cart_create", methods={"POST"})
    */
    public function createCart(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $quantity = $data['quantity'] ?? null;
        $productId = $data['productId'] ?? null;
    
        if (!$quantity || !$productId) {
            return new JsonResponse(['error' => 'Invalid input'], Response::HTTP_BAD_REQUEST);
        }

        $cart = new cart();
        $cart->setQuantity($quantity);
        $cart->setProductId($productId);

        $em->persist($cart);
        $em->flush();

        return new JsonResponse(['message' => 'cart created successfully', 'id' => $cart->getId()]);
    }

     /**
    * @Route("/cart/{id}", name="cart_update", methods={"PUT"})
    */
    public function updatecart(Request $request, EntityManagerInterface $em, int $id): JsonResponse
    {
        $cart = $em->getRepository(cart::class)->find($id);

        if (!$cart) {
            return new JsonResponse(['error' => 'cart not found'], Response::HTTP_NOT_FOUND);
        }

        $data = json_decode($request->getContent(), true);
        $quantity = $data['quantity'] ?? null;
        $productId = $data['productId'] ?? null;

        if ($quantity) {
            $cart->setQuantity($quantity);
        }
        if($productId){
            $cart->setProductId($productId);
        }

        $em->flush();

        return new JsonResponse(['message' => 'cart updated successfully']);
    }

    /**
    * @Route("/cart/{id}", name="cart_delete", methods={"DELETE"})
    */
    public function deletecart(EntityManagerInterface $em, int $id): Response
    {
        $cart = $em->getRepository(Cart::class)->find($id);

        if (!$cart) {
            return new JsonResponse(['error' => 'cart not found'], Response::HTTP_NOT_FOUND);
        }

        $em->remove($cart);
        $em->flush();

        return new JsonResponse(['message' => 'cart deleted successfully']);
    }
}
