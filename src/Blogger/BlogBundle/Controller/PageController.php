<?php
// src/Blogger/BlogBundle/Controller/PageController.php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
//contact namespaces
use Blogger\BlogBundle\Entity\Enquiry;
use Blogger\BlogBundle\Form\EnquiryType;

class PageController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $blogs = $em->getRepository('BloggerBlogBundle:Blog')
                    ->getLatestBlogs();

        return $this->render('BloggerBlogBundle:Page:index.html.twig', array(
            'blogs' => $blogs
        ));
    }
    
    public function aboutAction()
    {
        return $this->render('BloggerBlogBundle:Page:about.html.twig');
    }
    
    public function contactAction(Request $request)
    {
        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);

//        $request = $this->getRequest();//from tutorial, deprecated?
        $form->handleRequest($request);//see symfony book, forms, handling form submissions
        
//        if ($request->getMethod() == 'POST') {
//            $form->bindRequest($request);
//            /*binds the values of the form elements to the properties/members of the
//             *enquiry object, from this point on the enquiry object holds the
//             *actual data the user submitted via the form*/
        //above from tutorial, deprecated??

            if ($form->isValid()) {
                // Perform some action, such as sending an email
                $message = \Swift_Message::newInstance()
                        ->setSubject('Contact enquiry from symblog')
                        ->setFrom('enquiries@symblog.co.uk')
                        ->setTo($this->container->getParameter('blogger_blog.emails.contact_email'))
                        ->setBody($this->renderView('BloggerBlogBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));
                $this->get('mailer')->send($message);
                
                $this->get('session')->getFlashBag()->add(
                        'blogger-notice',
                        'Your contact enquiry was sent successfully. Thank you!'
                        );
                //above is different from tutorial, tutorial deprecated?
                

                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page
                return $this->redirect($this->generateUrl('BloggerBlogBundle_contact'));
            }
//        }

        return $this->render('BloggerBlogBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
    public function sidebarAction()
    {
        $em = $this->getDoctrine()->getManager();
        //get tagweights
        $tags = $em->getRepository('BloggerBlogBundle:Blog')->getTags();//necessary 
        $tagWeights = $em->getRepository('BloggerBlogBundle:Blog')->getTagWeights($tags);
        
        //get commentlimit from config
        $commentLimit = $this->container->getParameter('blogger_blog.comments.latest_comment_limit');
        //get latest comments
        $latestComments = $em->getRepository('BloggerBlogBundle:Comment')
                ->getLatestComments($commentLimit);
        
        //render template
        return $this->render(
                'BloggerBlogBundle:Page:sidebar.html.twig',
                array(
                    'tags' => $tagWeights,
                    'latestComments' => $latestComments,
                ));
    }
}