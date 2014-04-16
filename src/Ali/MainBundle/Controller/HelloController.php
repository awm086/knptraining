<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ali
 * Date: 4/14/14
 * Time: 11:20 AM
 * To change this template use File | Settings | File Templates.
 */

// src/Acme/HelloBundle/Controller/HelloController.php

namespace Ali\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HelloController extends Controller
{
    public function indexAction($name)
    {
        return $this->render(
            'MainBundle:Hello:index.html.twig',
            array('name' => $name));
    }

    public function _latestTweetsAction()
    {
        $res = new Response('latest tweetssss');
        $res->setSharedMaxAge(20);

        return $res;
    }
}