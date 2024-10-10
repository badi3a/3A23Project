<?php

namespace App\Controller;

use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/crud/author')]
class CrudAuthorController extends AbstractController
{
    #[Route('/list', name: 'app_crud_author')]
    public function list(AuthorRepository $repository): Response
    {
        $list=$repository->findAll();
        return $this->render('crud_author/list.html.twig',
        ['list'=>$list]);
    }
    //method search an author by name
    #[Route("/search/{name}",name:'app_crud_search')]
    public function searchByName(AuthorRepository $repository,Request $request ):Response
    {   //get the data name from the request
        $name=$request->get('name');
        //var_dump($name);die();
        //use a magic method to make a reearch by Name
        $authors=$repository->findByName($name);
        //var_dump($authors);die();
        return $this->render('crud_author/list.html.twig',
        ['list'=>$authors]);

    }
    //method to insert a new author

    //method to delete an author

    //method to update an author
}
