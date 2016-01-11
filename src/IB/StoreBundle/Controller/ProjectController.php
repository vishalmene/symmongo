<?php

namespace IB\StoreBundle\Controller;

use IB\StoreBundle\Document\Project;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProjectController extends Controller
{
    /**
     * @Route("/new" , name="new_project")
     */
    public function newAction(Request $request)
    {
    	       // create a project and give it some dummy data for this example
    	$project = new Project();
        $form = $this->createFormBuilder($project)
            ->add('name', TextType::class)
            ->add('currencyType', CurrencyType::class)
            ->add('cost', NumberType::class)
            ->add('initDate', DateType::class)
            ->add('refDoc', FileType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Project'))
            ->getForm();

         $form->handleRequest($request);

		    if ($form->isSubmitted() && $form->isValid()) {
		        // ... perform some action, such as saving the task to the database
	      	 //	$data =  $form->getData();
	         	//$upload = $data['refDoc'];
	         	$uploadedFile = $project->getRefDoc();
	         	$project->setRefDoc($uploadedFile->getPathname());
				$dm = $this->get('doctrine_mongodb')->getManager();
	    		$dm->persist($project);
	    		$dm->flush();
	    		$prjObj = $this->get('doctrine_mongodb')
	        ->getRepository('StoreBundle:Project')
	        ->find($project->getId());
	      echo "<pre>";exit(\Doctrine\Common\Util\Debug::dump($prjObj)).'--';
    
		    }
   
        return $this->render('StoreBundle:Project:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
