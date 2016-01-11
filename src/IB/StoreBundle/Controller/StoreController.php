<?php

namespace IB\StoreBundle\Controller;

use IB\StoreBundle\Document\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('StoreBundle:Default:index.html.twig');
    }

    /**
     * @Route("/create")
     */
    public function createAction()
	{
	    $product = new Product();
	    $product->setName('A Foo Next Bar');
	    $product->setPrice('20.99');

	    $dm = $this->get('doctrine_mongodb')->getManager();
	    $dm->persist($product);
	    $dm->flush();

	    return new Response('Created product id '.$product->getId());
	}

    /**
     * @Route("/show")
     */
	public function showAction($id = '568cfbe027ea12cc488b4567')
	{
	    $product = $this->get('doctrine_mongodb')
	        ->getRepository('StoreBundle:Product')
	        ->find($id);

	    if (!$product) {
	        throw $this->createNotFoundException('No product found for id '.$id);
	    }
	  //  echo "<pre>";exit(\Doctrine\Common\Util\Debug::dump($product)).'--';
	    // do something, like pass the $product object into a template
	}	
}
