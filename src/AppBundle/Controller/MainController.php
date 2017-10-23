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
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;

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
            ->add('q1',ChoiceType::class,array('choices'=>array(-32=>'Pathetic',-16=>'Bad',0=>'Neutral',16=>'Good',32=>'Excellent'),'data' => 0,'label'=>$titles[0] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q2',ChoiceType::class,array('choices'=>array(-16=>'Frequent',-8=>'Always',0=>'Neutral',8=>'Random',16=>'Never'),'data' => 0,'label'=>$titles[1] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q3',ChoiceType::class,array('choices'=>array(-32=>'Pathetic',-16=>'Bad',0=>'Neutral',16=>'Good',32=>'Excellent'),'data' => 0,'label'=>$titles[2] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q4',ChoiceType::class,array('choices'=>array(-24=>'Pathetic',-12=>'Bad',0=>'Neutral',12=>'Good',24=>'Excellent'),'data' => 0,'label'=>$titles[3] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q5',ChoiceType::class,array('choices'=>array(-20=>'Pathetic',-10=>'Bad',0=>'Neutral',10=>'Good',20=>'Excellent'),'data' => 0,'label'=>$titles[4] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q6',ChoiceType::class,array('choices'=>array(-24=>'Pathetic',-12=>'Bad',0=>'Neutral',12=>'Good',24=>'Excellent'),'data' => 0,'label'=>$titles[5] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q7',ChoiceType::class,array('choices'=>array(-8=>'Pathetic',-4=>'Bad',0=>'Neutral',4=>'Good',8=>'Excellent'),'data' => 0,'label'=>$titles[6] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q8',ChoiceType::class,array('choices'=>array(-12=>'Pathetic',-6=>'Bad',0=>'Neutral',6=>'Good',12=>'Excellent'),'data' => 0,'label'=>$titles[7] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q9',ChoiceType::class,array('choices'=>array(-8=>'Pathetic',-4=>'Bad',0=>'Neutral',4=>'Good',8=>'Excellent'),'data' => 0,'label'=>$titles[8] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q10',ChoiceType::class,array('choices'=>array(-24=>'Pathetic',-12=>'Bad',0=>'Neutral',12=>'Good',24=>'Excellent'),'data' => 0,'label'=>$titles[9] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q11',ChoiceType::class,array('choices'=>array(-4=>'Pathetic',-2=>'Bad',0=>'Neutral',2=>'Good',4=>'Excellent'),'data' => 0,'label'=>$titles[10] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q12',ChoiceType::class,array('choices'=>array(-12=>'Frequent',-6=>'Always',0=>'Neutral',6=>'Random',12=>'Never'),'data' => 0,'label'=>$titles[11] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q13',ChoiceType::class,array('choices'=>array(-8=>'Frequent',-4=>'Always',0=>'Neutral',4=>'Random',8=>'Never'),'data' => 0,'label'=>$titles[12] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q14',ChoiceType::class,array('choices'=>array(-8=>'Pathetic',-4=>'Bad',0=>'Neutral',4=>'Good',8=>'Excellent'),'data' => 0,'label'=>$titles[13] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q15',ChoiceType::class,array('choices'=>array(-16=>'Pathetic',-8=>'Bad',0=>'Neutral',8=>'Good',16=>'Excellent'),'data' => 0,'label'=>$titles[14] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q16',ChoiceType::class,array('choices'=>array(-4=>'Pathetic',-2=>'Bad',0=>'Neutral',2=>'Good',4=>'Excellent'),'data' => 0,'label'=>$titles[15] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q17',ChoiceType::class,array('choices'=>array(-28=>'Pathetic',-14=>'Bad',0=>'Neutral',14=>'Good',28=>'Excellent'),'data' => 0,'label'=>$titles[16] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q18',ChoiceType::class,array('choices'=>array(-12=>'Never',-6=>'Not using',0=>'Neutral',6=>'Using',12=>'Highly using'),'data' => 0,'label'=>$titles[17] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q19',ChoiceType::class,array('choices'=>array(-16=>'Pathetic',-8=>'Bad',0=>'Neutral',8=>'Good',16=>'Excellent'),'data' => 0,'label'=>$titles[18] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q20',ChoiceType::class,array('choices'=>array(-4=>'Never',-2=>'Not using',0=>'Neutral',2=>'Using',4=>'Highly using'),'data' => 0,'label'=>$titles[19] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q21',ChoiceType::class,array('choices'=>array(-8=>'Frequent',-4=>'Always',0=>'Neutral',4=>'Random',8=>'Never'),'data' => 0,'label'=>$titles[20] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q22',ChoiceType::class,array('choices'=>array(-8=>'Frequent',-4=>'Always',0=>'Neutral',4=>'Random',8=>'Never'),'data' => 0,'label'=>$titles[21] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q23',ChoiceType::class,array('choices'=>array(-4=>'Pathetic',-2=>'Bad',0=>'Neutral',2=>'Good',4=>'Excellent'),'data' => 0,'label'=>$titles[22] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q24',ChoiceType::class,array('choices'=>array(-8=>'Frequent',-4=>'Always',0=>'Neutral',4=>'Random',8=>'Never'),'data' => 0,'label'=>$titles[23] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q25',ChoiceType::class,array('choices'=>array(-32=>'Pathetic',-16=>'Bad',0=>'Neutral',16=>'Good',32=>'Excellent'),'data' => 0,'label'=>$titles[24] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q26',ChoiceType::class,array('choices'=>array(-32=>'Pathetic',-16=>'Bad',0=>'Neutral',16=>'Good',32=>'Excellent'),'data' => 0,'label'=>$titles[25] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q27',ChoiceType::class,array('choices'=>array(-12=>'Never',-6=>'Not using',0=>'Neutral',6=>'Using',12=>'Highly using'),'data' => 0,'label'=>$titles[26] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q28',ChoiceType::class,array('choices'=>array(-4=>'Frequent',-2=>'Always',0=>'Neutral',2=>'Random',4=>'Never'),'data' => 0,'label'=>$titles[27] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q29',ChoiceType::class,array('choices'=>array(-20=>'Pathetic',-10=>'Bad',0=>'Neutral',10=>'Good',20=>'Excellent'),'data' => 0,'label'=>$titles[28] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q30',ChoiceType::class,array('choices'=>array(-4=>'Frequent',-2=>'Always',0=>'Neutral',2=>'Random',4=>'Never'),'data' => 0,'label'=>$titles[29] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q31',ChoiceType::class,array('choices'=>array(-4=>'Frequent',-2=>'Always',0=>'Neutral',2=>'Random',4=>'Never'),'data' => 0,'label'=>$titles[30] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q32',ChoiceType::class,array('choices'=>array(-20=>'Pathetic',-10=>'Bad',0=>'Neutral',10=>'Good',20=>'Excellent'),'data' => 0,'label'=>$titles[31] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q33',ChoiceType::class,array('choices'=>array(-12=>'Never',-6=>'Not using',0=>'Neutral',6=>'Using',12=>'Highly using'),'data' => 0,'label'=>$titles[32] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q34',ChoiceType::class,array('choices'=>array(-8=>'Frequent',-4=>'Always',0=>'Neutral',4=>'Random',8=>'Never'),'data' => 0,'label'=>$titles[33] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q35',ChoiceType::class,array('choices'=>array(-8=>'Pathetic',-4=>'Bad',0=>'Neutral',4=>'Good',8=>'Excellent'),'data' => 0,'label'=>$titles[34] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q36',ChoiceType::class,array('choices'=>array(-12=>'Pathetic',-6=>'Bad',0=>'Neutral',6=>'Good',12=>'Excellent'),'data' => 0,'label'=>$titles[35] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q37',ChoiceType::class,array('choices'=>array(-4=>'Pathetic',-2=>'Bad',0=>'Neutral',2=>'Good',4=>'Excellent'),'data' => 0,'label'=>$titles[36] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q38',ChoiceType::class,array('choices'=>array(-4=>'Pathetic',-2=>'Bad',0=>'Neutral',2=>'Good',4=>'Excellent'),'data' => 0,'label'=>$titles[37] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q39',ChoiceType::class,array('choices'=>array(-24=>'Never',12=>'Not using',0=>'Neutral',12=>'Using',24=>'Highly using'),'data' => 0,'label'=>$titles[38] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q40',ChoiceType::class,array('choices'=>array(-12=>'Pathetic',-6=>'Bad',0=>'Neutral',6=>'Good',12=>'Excellent'),'data' => 0,'label'=>$titles[39] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q41',ChoiceType::class,array('choices'=>array(-20=>'Never',-10=>'Not using',0=>'Neutral',10=>'Using',20=>'Highly using'),'data' => 0,'label'=>$titles[40] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q42',ChoiceType::class,array('choices'=>array(-20=>'Pathetic',-10=>'Bad',0=>'Neutral',10=>'Good',20=>'Excellent'),'data' => 0,'label'=>$titles[41] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q43',ChoiceType::class,array('choices'=>array(-4=>'Pathetic',-2=>'Bad',0=>'Neutral',2=>'Good',4=>'Excellent'),'data' => 0,'label'=>$titles[42] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q44',ChoiceType::class,array('choices'=>array(-4=>'Frequent',-2=>'Always',0=>'Neutral',2=>'Random',4=>'Never'),'data' => 0,'label'=>$titles[43] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q45',ChoiceType::class,array('choices'=>array(-8=>'Frequent',-4=>'Always',0=>'Neutral',4=>'Random',8=>'Never'),'data' => 0,'label'=>$titles[44] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q46',ChoiceType::class,array('choices'=>array(-8=>'Pathetic',-4=>'Bad',0=>'Neutral',4=>'Good',8=>'Excellent'),'data' => 0,'label'=>$titles[45] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q47',ChoiceType::class,array('choices'=>array(-12=>'Frequent',-6=>'Always',0=>'Neutral',6=>'Random',12=>'Never'),'data' => 0,'label'=>$titles[46] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q48',ChoiceType::class,array('choices'=>array(-4=>'Highly disagree',-2=>'Disagree',0=>'Neutral',2=>'Agreed',4=>'Highly Agreed'),'data' => 0,'label'=>$titles[47] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q49',ChoiceType::class,array('choices'=>array(-28=>'Pathetic',-14=>'Bad',0=>'Neutral',14=>'Good',28=>'Excellent'),'data' => 0,'label'=>$titles[48] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q50',ChoiceType::class,array('choices'=>array(-28=>'Pathetic',14=>'Bad',0=>'Neutral',14=>'Good',28=>'Excellent'),'data' => 0,'label'=>$titles[49] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q51',ChoiceType::class,array('choices'=>array(-8=>'Frequent',-4=>'Always',0=>'Neutral',4=>'Random',8=>'Never'),'data' => 0,'label'=>$titles[50] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q52',ChoiceType::class,array('choices'=>array(-4=>'Pathetic',-2=>'Bad',0=>'Neutral',2=>'Good',4=>'Excellent'),'data' => 0,'label'=>$titles[51] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q53',ChoiceType::class,array('choices'=>array(-8=>'Pathetic',-4=>'Bad',0=>'Neutral',4=>'Good',8=>'Excellent'),'data' => 0,'label'=>$titles[52] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title','style'=>'width:200px;float:right' )))
            ->add('q54',ChoiceType::class,array('choices'=>array(-4=>'Pathetic',-2=>'Bad',0=>'Neutral',2=>'Good',4=>'Excellent'),'data' => 0,'label'=>$titles[53] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q55',ChoiceType::class,array('choices'=>array(-4=>'Frequent',-2=>'Always',0=>'Neutral',2=>'Random',4=>'Never'),'data' => 0,'label'=>$titles[54] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q56',ChoiceType::class,array('choices'=>array(-16=>'Pathetic',-8=>'Bad',0=>'Neutral',8=>'Good',16=>'Excellent'),'data' => 0,'label'=>$titles[55] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q57',ChoiceType::class,array('choices'=>array(-12=>'Frequent',-6=>'Always',0=>'Neutral',6=>'Random',12=>'Never'),'data' => 0,'label'=>$titles[56] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q58',ChoiceType::class,array('choices'=>array(-12=>'Frequent',-6=>'Always',0=>'Neutral',6=>'Random',12=>'Never'),'data' => 0,'label'=>$titles[57] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q59',ChoiceType::class,array('choices'=>array(-4=>'Frequent',-2=>'Always',0=>'Neutral',2=>'Random',4=>'Never'),'data' => 0,'label'=>$titles[58] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q60',ChoiceType::class,array('choices'=>array(-4=>'Pathetic',-2=>'Bad',0=>'Neutral',2=>'Good',4=>'Excellent'),'data' => 0,'label'=>$titles[59] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q61',ChoiceType::class,array('choices'=>array(-8=>'Frequent',-4=>'Always',0=>'Neutral',4=>'Random',8=>'Never'),'data' => 0,'label'=>$titles[60] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('q62',ChoiceType::class,array('choices'=>array(-16=>'Pathetic',-8=>'Bad',0=>'Neutral',4=>'Good',8=>'Excellent'),'data' => 0,'label'=>$titles[61] , 'attr'=>array('class'=>"form-control div123",'placeholder'=>'Post Title' ,'style'=>'width:200px;float:right')))
            ->add('send', SubmitType::class,array('attr'=>array('class'=>"btn btn-default form-control div123")))
            ->getForm();

        $form->handleRequest($request);


        //var_dump($titles[0]);

        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();
            //var_dump($data);
            $sum=0;
            $selected_option=2;
            $issues=62;
            $marked_issues=array();
            for($i=0;$i<$issues;$i++){
                $index="q".(int)($i+1);
                $selected_option=$data[$index];
                $sum+=$selected_option;
                if($selected_option!=5){
                    array_push($marked_issues,$titles[$i]);
                }
            }
            //var_dump($sum);
            //get the selected options
            
            return $this->render('score.html.twig',array(
                'issues'=>$marked_issues,
                'score'=>$sum
            ));
        }

        return $this->render('question.html.twig', array(
            'form'=>$form->createView(),
            'titles'=>$titles
        ));
    }

    /**
     * show recommendations
     *
     * @Route("/allRecommendations", name="all_recommendations")
     * @Method({"GET", "POST"})
     */
    public function showRecommendationAction(Request $request){
//        $request = $this->container->get('request');
//        $q_id = $request->query->get('id');
//        //$id..............
//        $em = $this->getDoctrine()->getManager()->getConnection();
//        $result = $em->prepare("SELECT title FROM recommendations WHERE id = :id");
//        var_dump($q_id);
//        $result->bindValue('id', $q_id);
//        $result->execute();
//        $ids=$result->fetchAll();
//        $recommendations = array_map('current', $ids);
//        var_dump($recommendations);
        $data=$request->request->get('orderid');
        $id=intval($data)+1;
        
        //get data from the database
        $em = $this->getDoctrine()->getManager()->getConnection();
        $result = $em->prepare("SELECT title FROM recommendations WHERE issue_id = :id");
        $result->bindValue('id', $id);
        $result->execute();
        $ids=$result->fetchAll();
        $recommendations = array_map('current', $ids);

        $html_out='<h2>Recommendations</h2><ul>';
        for ($i=0; $i<sizeof($recommendations);$i++)
        {
            $iteration='<li>'.$recommendations[$i].'</li>';
            $html_out.=$iteration;
        }
        
        $html_out.='</ul>';
        
        $response = array("code" => 100, "success" => true,"recommendations"=>$recommendations,"html"=>$html_out);
        //you can return result as JSON
        return new Response(json_encode($response));
    }

    /**
     * Creates a new issue entity.
     *
     * @Route("/recommendations", name="recommendations")
     * @Method({"GET", "POST"})
     * 
     */
    public function recommendationAction(Request $request){
        //get data from the database
        $em = $this->getDoctrine()->getManager()->getConnection();
        $result = $em->prepare("SELECT title FROM issues");
        $result->execute();
        $ids=$result->fetchAll();
        $issues = array_map('current', $ids);
        return $this->render('recommendations.html.twig',array(
            'titles'=>$issues
        ));
    }


    /**
     * @Route("/listposts/" ,name="postlist")
     * @Method({"GET", "POST"})
     */
    public function postListAction(Request $request)
    {
        var_dump("awa");
        $response = array("code" => 100, "success" => true);
        //you can return result as JSON
        return new Response(json_encode($response));
    }

    /**
     * @Route("/home/" ,name="home")
     *
     */
    public function homeAction(Request $request)
    {
        return $this->render('index.html.twig');
    }


    /**
     * show recommendations
     *
     * @Route("/resources", name="resources")
     * @Method({"GET", "POST"})
     */
    public function getResourcesAction(Request $request){
//        $request = $this->container->get('request');
//        $q_id = $request->query->get('id');
//        //$id..............
//        $em = $this->getDoctrine()->getManager()->getConnection();
//        $result = $em->prepare("SELECT title FROM recommendations WHERE id = :id");
//        var_dump($q_id);
//        $result->bindValue('id', $q_id);
//        $result->execute();
//        $ids=$result->fetchAll();
//        $recommendations = array_map('current', $ids);
//        var_dump($recommendations);
        $data=$request->request->get('orderid');
        $id=intval($data)+1;

        //get data from the database
        $em = $this->getDoctrine()->getManager()->getConnection();
        $result = $em->prepare("SELECT title FROM resources WHERE recID = :id");
        $result->bindValue('id', $id);
        $result->execute();
        $ids=$result->fetchAll();
        $titles = array_map('current', $ids);

        $result = $em->prepare("SELECT src FROM resources WHERE recID = :id");
        $result->bindValue('id', $id);
        $result->execute();
        $ids=$result->fetchAll();
        $srcs = array_map('current', $ids);

        //var_dump($resources);
        $html_out='<h2>Resources</h2><ul>';
        for ($i=0; $i<sizeof($titles);$i++)
        {
            $iteration='<li><a href="'.$srcs[$i].'">'.$titles[$i].'</a></li><br>';
            $html_out.=$iteration;
        }

        $html_out.='</ul>';

        $response = array("code" => 100, "success" => true,"resources"=>$titles,"html"=>$html_out);
        //you can return result as JSON
        return new Response(json_encode($response));
    }

    /**
     * @Route("/documents/" ,name="documents")
     *
     */
    public function documentsAction(Request $request)
    {
        return $this->render('documents.html.twig');
    }

    /**
     * @Route("/materials/" ,name="materials")
     *
     */
    public function materialsAction(Request $request)
    {
        return $this->render('materials.html.twig');
    }

    /**
     * @Route("/help/" ,name="help")
     *
     */
    public function helpAction(Request $request)
    {
        return $this->render('help.html.twig');
    }

}