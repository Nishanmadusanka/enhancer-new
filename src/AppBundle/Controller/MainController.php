<?php
/**
 * Created by PhpStorm.
 * User: Nuwan rathnayaka
 * Date: 8/27/2017
 * Time: 8:16 AM
 */

namespace AppBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AppBundle\Entity\Issue;

class MainController extends Controller
{
    /**
     * Creates a new issue entity.
     *
     * @Route("/questions", name="new_questions")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        //db access and get the title list
        $em = $this->getDoctrine()->getManager()->getConnection();
        $result = $em->prepare("SELECT a.title FROM issues a");
        $result->execute();
        $ids=$result->fetchAll();
        $titles = array_map('current', $ids);

        $defaultData = array('message' => 'Type your message here');
        $form = $this->createFormBuilder($defaultData)
            ->add('q1',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[0] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))
            ->add('q2',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[1] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))
            ->add('q3',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[2] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))
            ->add('q4',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[3] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))
            ->add('q5',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[4] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))
            ->add('q6',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[5] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))
            ->add('q7',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[6] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))
            ->add('q8',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[7] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))
            ->add('q9',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[8] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))
            ->add('q10',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[9] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))
            ->add('q11',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[10] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))
            ->add('q12',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[11] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))
            ->add('q13',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[12] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))
            ->add('q14',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[13] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))
            ->add('q15',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[14] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))
            ->add('q16',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[15] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))
            ->add('q17',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[16] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))
            ->add('q18',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[17] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))
            ->add('q19',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[18] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))
            ->add('q20',ChoiceType::class,array('choices'=>array('Low'=>1,'Medium'=>2,'High'=>3),'label'=>$titles[19] , 'attr'=>array('class'=>"form-control",'placeholder'=>'Post Title' )))

            ->getForm();

        $form->handleRequest($request);


        var_dump($titles[0]);

        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();
        }

        return $this->render('question.html.twig', array(
            'form'=>$form->createView(),
            'titles'=>$titles
        ));
    }

}