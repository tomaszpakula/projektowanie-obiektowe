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
    public function getCategory(EntityManagerInterface $em): Response
    {
        
        $categories = $em->getRepository(Category::class)->findAll();
        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
    * @Route("/category/{id}", name="category_get", methods={"GET"})
    */
    public function getCategoryById(EntityManagerInterface $em,int $id): Response
    {
        $category = $em->getRepository(Category::class)->find($id);
        if (!$category) {
            return $this->render('category/not_found.html.twig', [
                'id' => $id
            ]);
        }

        return $this->render('category/show.html.twig', [
            'category' => $category,
        ]);
    
    }
    /**
    * @Route("/category", name="category_create", methods={"POST"})
    */
    public function createCategory(Request $request, EntityManagerInterface $em): Response
    {
        $name = $request->request->get('name');

        if (!$name) {
            return new JsonResponse(['error' => 'Invalid input'], Response::HTTP_BAD_REQUEST);
        }

        $category = new Category();
        $category->setName($name);

        $em->persist($category);
        $em->flush();

        return $this->redirectToRoute('category_list');
    }

     /**
    * @Route("/category/{id}", name="category_update", methods={"PUT"})
    */
    public function updateCategory(Request $request, EntityManagerInterface $em, int $id): Response
    {
        $category = $em->getRepository(Category::class)->find($id);

        if (!$category) {
            return new Response(['error' => 'Category not found'], Response::HTTP_NOT_FOUND);
        }

        $name = $request->request->get('name');

        if ($name) {
            $category->setName($name);
        }

        $em->flush();

        return new Response(['message' => 'Category updated successfully']);
    }

    /**
    * @Route("/category/{id}", name="Category_delete", methods={"DELETE"})
    */
    public function deleteCategory(EntityManagerInterface $em, int $id): Response
    {
        $category = $em->getRepository(Category::class)->find($id);

        if (!$category) {
            return new Response(['error' => 'Category not found'], Response::HTTP_NOT_FOUND);
        }

        $em->remove($category);
        $em->flush();

        return new Response(['message' => 'Category deleted successfully']);
    }
}
