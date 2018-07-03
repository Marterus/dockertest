<?php
/**
 * Created by PhpStorm.
 * User: Игорь
 * Date: 03.07.2018
 * Time: 1:09
 */

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticleController
{

    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('Да! Єто моя первая страничка на Симфони!!!');
    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug = '')
    {
        return new Response(sprintf('This page - %s', $slug));
    }
}