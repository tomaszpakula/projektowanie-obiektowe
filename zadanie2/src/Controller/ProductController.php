<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController extends AbstractController
{   
    /**
    * @Route("/products", name="product_list", methods={"GET"})
    */
    public function getProducts(EntityManagerInterface $em): JsonResponse
    {
        
        $products = $em->getRepository(Product::class)->findAll();
        $data = [];

        foreach ($products as $product) {
            $data[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
            ];
        }

        return new JsonResponse($data);
    }

    /**
    * @Route("/products/{id}", name="product_get", methods={"GET"})
    */
    public function getProductById(EntityManagerInterface $em,int $id): JsonResponse
    {
        $product = $em->getRepository(Product::class)->find($id);
        if (!$product) {
            return new JsonResponse(['error' => 'Product not found with id: ' . $id], Response::HTTP_NOT_FOUND);
        }
    
        $data = [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
        ];

        return new JsonResponse($data);
    
    }
    /**
    * @Route("/products", name="product_create", methods={"POST"})
    */
    public function createProduct(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $name = $data['name'] ?? null;
        $price = $data['price'] ?? null;

        if (!$name || !$price) {
            return new JsonResponse(['error' => 'Invalid input'], Response::HTTP_BAD_REQUEST);
        }

        $product = new Product();
        $product->setName($name);
        $product->setPrice($price);

        $em->persist($product);
        $em->flush();

        return new JsonResponse(['message' => 'Product created successfully', 'id' => $product->getId()]);
    }

     /**
    * @Route("/products/{id}", name="product_update", methods={"PUT"})
    */
    public function updateProduct(Request $request, EntityManagerInterface $em, int $id): JsonResponse
    {
        $product = $em->getRepository(Product::class)->find($id);

        if (!$product) {
            return new JsonResponse(['error' => 'Product not found'], Response::HTTP_NOT_FOUND);
        }

        $data = json_decode($request->getContent(), true);
        $name = $data['name'] ?? null;
        $price = $data['price'] ?? null;

        if ($name) {
            $product->setName($name);
        }

        if ($price !== null) {
            $product->setPrice($price);
        }

        $em->flush();

        return new JsonResponse(['message' => 'Product updated successfully']);
    }

    /**
    * @Route("/products/{id}", name="product_delete", methods={"DELETE"})
    */
    public function deleteProduct(EntityManagerInterface $em, int $id): Response
    {
        $product = $em->getRepository(Product::class)->find($id);

        if (!$product) {
            return new JsonResponse(['error' => 'Product not found'], Response::HTTP_NOT_FOUND);
        }

        $em->remove($product);
        $em->flush();

        return new JsonResponse(['message' => 'Product deleted successfully']);
    }
}
