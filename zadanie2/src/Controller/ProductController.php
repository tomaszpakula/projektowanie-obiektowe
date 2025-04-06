<?php

namespace App\Controller;

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
    public function getProducts(): JsonResponse
    {
        $dbPath = $this->getParameter('kernel.project_dir') . '/var/data.db';
        $pdo = new \PDO('sqlite:' . $dbPath);

        $stmt = $pdo->query('SELECT * FROM product');
        $products = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return new JsonResponse($products);
    }

    /**
    * @Route("/products/{id}", name="product_get", methods={"GET"})
    */
    public function getProductById(int $id): JsonResponse
    {
        $dbPath = $this->getParameter('kernel.project_dir') . '/var/data.db';
        $pdo = new \PDO('sqlite:' . $dbPath);

        $stmt = $pdo->prepare('SELECT * FROM product WHERE id = :id');
        $stmt->execute([':id' => $id]);
       
        $product = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!$product) {
            return new JsonResponse(['error' => 'Product not found with id: ' . $id], Response::HTTP_NOT_FOUND);
        }
    
        return new JsonResponse($product);
    }

    /**
    * @Route("/products", name="product_create", methods={"POST"})
    */
    public function createProduct(Request $request): JsonResponse
    {
        $name = $request->request->get('name');
        $price = $request->request->get('price');
        $dbPath = $this->getParameter('kernel.project_dir') . '/var/data.db';
        $pdo = new \PDO('sqlite:' . $dbPath);

        $stmt = $pdo->prepare('INSERT INTO product (name, price) VALUES (:name, :price)');
        $stmt->execute([':name' => $name, ':price' => $price]);

        
        return new JsonResponse(['message' => 'Product created successfully']);
    }

     /**
    * @Route("/products/{id}", name="product_update", methods={"PUT"})
    */
    public function updateProduct(Request $request, int $id): JsonResponse
    {
        $name = $request->request->get('name');
        $price = $request->request->get('price');
        $dbPath = $this->getParameter('kernel.project_dir') . '/var/data.db';
        $pdo = new \PDO('sqlite:' . $dbPath);

        $stmt = $pdo->prepare('UPDATE product SET name = :name, price = :price WHERE id = :id');
        $stmt->execute([':name' => $name, ':price' => $price, ':id' => $id]);

    
        return new JsonResponse(['message' => 'Product updated successfully']);
    }

    /**
    * @Route("/products/{id}", name="product_delete", methods={"DELETE"})
    */
    public function deleteProduct(int $id): Response
    {
        $dbPath = $this->getParameter('kernel.project_dir') . '/var/data.db';
        $pdo = new \PDO('sqlite:' . $dbPath);

        $stmt = $pdo->prepare('DELETE FROM product WHERE id = :id');
        $stmt->execute([':id' => $id]);
        return new JsonResponse(['message' => 'Product deleted successfully']);
    }
}
