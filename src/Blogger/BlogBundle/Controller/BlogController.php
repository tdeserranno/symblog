<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of BlogController
 *
 * @author cyber02
 */
class BlogController extends Controller
{
    public function showAction($id, $slug)
    {
        $em = $this->getDoctrine()->getManager();
        
        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);
        
        if (!$blog) {
            throw $this->createNotFoundException('Unable to find blog post.');
        }
        
        $comments = $em->getRepository('BloggerBlogBundle:Comment')
                ->getCommentsForBlog($blog->getId());
        
        return $this->render(
                'BloggerBlogBundle:Blog:show.html.twig',
                array(
                    'blog' => $blog,
                    'comments' => $comments,
                ));
    }
}
