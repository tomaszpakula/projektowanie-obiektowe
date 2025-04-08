<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryController extends AbstractController
{   
    /**
    * @Route("/category", name="category_list", methods={"GET"})
    */
    public function getCategory(EntityManagerInterface $em): JsonResponse
    {
        
        $categories = $em->getRepository(Category::class)->findAll();
        $data = [];

        foreach ($categories as $category) {
            $data[] = [
                'id' => $category->getId(),
                'name' => $category->getName(),
            ];
        }

        return new JsonResponse($data);
    }

    /**
    * @Route("/category/{id}", name="vategory_get", methods={"GET"})
    */
    public function getCategoryById(EntityManagerInterface $em,int $id): JsonResponse
    {
        $Category = $em->getRepository(Category::class)->find($id);
        if (!$Category) {
            return new JsonResponse(['error' => 'Category not found with id: ' . $id], Response::HTTP_NOT_FOUND);
        }
    
        $data = [
            'id' => $Category->getId(),
            'name' => $Category->getName(),
        ];

        return new JsonResponse($data);
    
    }
    /**
    * @Route("/category", name="Category_create", methods={"POST"})
    */
    public function createCategory(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $name = $data['name'] ?? null;
    
        if (!$name) {
            return new JsonResponse(['error' => 'Invalid input'], Response::HTTP_BAD_REQUEST);
        }

        $Category = new Category();
        $Category->setName($name);

        $em->persist($Category);
        $em->flush();

        return new JsonResponse(['message' => 'Category created successfully', 'id' => $Category->getId()]);
    }

     /**
    * @Route("/category/{id}", name="category_update", methods={"PUT"})
    */
    public function updateCategory(Request $request, EntityManagerInterface $em, int $id): JsonResponse
    {
        $category = $em->getRepository(Category::class)->find($id);

        if (!$category) {
            return new JsonResponse(['error' => 'Category not found'], Response::HTTP_NOT_FOUND);
        }

        $data = json_decode($request->getContent(), true);
        $name = $data['name'] ?? null;

        if ($name) {
            $category->setName($name);
        }

        $em->flush();

        return new JsonResponse(['message' => 'Category updated successfully']);
    }

    /**
    * @Route("/category/{id}", name="Category_delete", methods={"DELETE"})
    */
    public function deleteCategory(EntityManagerInterface $em, int $id): Response
    {
        $category = $em->getRepository(Category::class)->find($id);

        if (!$category) {
            return new JsonResponse(['error' => 'Category not found'], Response::HTTP_NOT_FOUND);
        }

        $em->remove($category);
        $em->flush();

        return new JsonResponse(['message' => 'Category deleted successfully']);
    }
}
