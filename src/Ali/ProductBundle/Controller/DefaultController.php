<?php

namespace Ali\ProductBundle\Controller;


use Ali\ProductBundle\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Ali\ProductBundle\Entity\Product;

class DefaultController extends Controller
{
    public function newAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $product = new Product();
        $product->setname('Product');

        $type = new ProductType();
        $form = $this->createForm($type, $product);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // perform some action, such as saving the task to the database
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirect($this->generateUrl('product_new'));

           // var_dump($form->getData());
          //  die();
        }

        return $this->render(
            'ProductBundle:Default:new.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }


    public function listAction(Request $request)
    {
        // these 2 lines are equivalent
        // $em = $this->container->get('doctrine')->getManager();
        $em = $this->getDoctrine()->getManager();
        /** @var \Ali\ProductBundle\Entity\ProductRepository $repo */
        $repo = $em->getRepository('ProductBundle:Product');

        $products = $repo->createQueryBuilder('p')
          ->orderBy('p.name', 'ASC')
          ->getQuery()
          ->execute();

       //    $products = $repo->findAll();

        return $this->render(
            'ProductBundle:Default:index.html.twig',
            array(
                'products' => $products,
            )
        );

    }

    /**
     * Finds and displays a Event entity.
     *
     */
    public function viewAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Event entity.');
        }


        return $this->render('ProductBundle:Default:show.html.twig', array(
                'entity'      => $entity,
        ));
    }



}
