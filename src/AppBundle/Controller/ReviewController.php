<?php
/**
 * Created by PhpStorm.
 * User: wilder19
 * Date: 19/05/18
 * Time: 17:17
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ReviewController
 * @package AppBundle\Controller
 * @Route("review")
 * @Method("GET")
 */
class ReviewController extends Controller
{
    /**
     * Lists all Reviews
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="review_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reviews = $em->getRepository('AppBundle:Review')->findAll();
        return $this->render("review/index.html.twig", [
            "reviews" => $reviews,
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/new/", name="review_new")
     * @Method({"GET", "POST"})
     */
    public function newAction()
    {
        return $this->render("review/new.html.twig");
    }
}