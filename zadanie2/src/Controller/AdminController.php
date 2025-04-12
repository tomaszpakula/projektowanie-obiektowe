<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/login", name="mock_login")
     */
    public function mockLogin(SessionInterface $session, Request $request): Response
    {
        return $this->render('admin/login.html.twig');

    }

     /**
     * @Route("/logout", name="logout")
     */
    public function logout(SessionInterface $session, Request $request): Response
    {
        $session->set('user',null);
        return $this->redirectToRoute('product_list');
    }

    /**
     * @Route("/admin", name="admin_panel")
     */
    public function adminPanel(SessionInterface $session): Response
    {
        $user = $session->get('user');


        return $this->render('admin/panel.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("/signin", name="signin", methods={"POST"})
     */
    public function signin(SessionInterface $session, Request $request): Response
    {   
  
        $login = $request->request->get('login');
        $password = $request->request->get('password');

        if ($login == "admin" && $password == "admin") {
            $session->set("user", $login);
        }
        else{
            $session->set("user", null);
        }
       

        return $this->redirectToRoute('admin_panel');
    }
}
