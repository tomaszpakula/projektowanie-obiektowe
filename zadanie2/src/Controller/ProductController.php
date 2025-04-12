<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController
{   
    /**
    * @Route("/products", name="product_list", methods={"GET"})
    */
    public function getProducts(EntityManagerInterface $em, SessionInterface $session): Response
    {   
        $user = $session->get('user');
        $products = $em->getRepository(Product::class)->findAll();
        
        return $this->render('product/index.html.twig', [
            'products' => $products,
            'user'=> $user
        ]);

    }

    /**
    * @Route("/products/{id}", name="product_get", methods={"GET"})
    */
    public function getProductById(EntityManagerInterface $em,int $id): Response
    {
        $product = $em->getRepository(Product::class)->find($id);
        if (!$product) {
            return $this->render('product/not_found.html.twig', [
                'id' => $id
            ]);
        }

        return $this->render('product/show.html.twig', [
            'product' => $product,
        ]);
    
    }
    /**
    * @Route("/products", name="product_create", methods={"POST"})
    */
    public function createProduct(Request $request, EntityManagerInterface $em): Response
    {
        $name = $request->request->get('name');
        $price = $request->request->get('price');

        if (!$name || !$price) {
            return new JsonResponse(['error' => 'Invalid input'], Response::HTTP_BAD_REQUEST);
        }

        $product = new Product();
        $product->setName($name);
        $product->setPrice($price);

        $em->persist($product);
        $em->flush();

        return $this->redirectToRoute('product_list');

    }

     /**
    * @Route("/products/{id}", name="product_update", methods={"PUT"})
    */
    public function updateProduct(Request $request, EntityManagerInterface $em, int $id): Response
    {
        $product = $em->getRepository(Product::class)->find($id);

        if (!$product) {
            return new Response(['error' => 'Product not found'], Response::HTTP_NOT_FOUND);
        }

        $name = $request->request->get('name');
        $price = $request->request->get('price');

        if ($name) {
            $product->setName($name);
        }

        if ($price !== null) {
            $product->setPrice($price);
        }

        $em->flush();

        return $this->redirectToRoute('product_list');
    }

    /**
    * @Route("/products/{id}", name="product_delete", methods={"DELETE"})
    */
    public function deleteProduct(EntityManagerInterface $em, int $id): Response
    {
        $product = $em->getRepository(Product::class)->find($id);

        if (!$product) {
            return new Response(['error' => 'Product not found'], Response::HTTP_NOT_FOUND);
        }

        $em->remove($product);
        $em->flush();

        return $this->redirectToRoute('product_list');
    }
}
