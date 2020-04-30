<?php

namespace App\Controller;

use App\Core\Controller;
use App\Entity\Book;
use Doctrine\ORM\EntityManager;
use Symfony\Component\VarDumper\VarDumper;

class BookController extends Controller
{
    function list()
    {
        /** @var EntityManager $em */
        $em = $this->getModel()->getEntityManager();
        $books = $em->getRepository(Book::class)->findAll();
        return $this->getView()->render('book/list.html.twig', [
            'books' => $books
        ]);
    }

    function create()
    {
        return $this->getView()->render('book/create.html.twig');
    }

    function add($request)
    {
        VarDumper::dump($request);
    }

    function view()
    {
        return $this->getView()->render('book/view.html.twig');
    }


    function update()
    {
        return $this->getView()->render('book/update.html.twig');
    }

    function delete()
    {

    }
}
