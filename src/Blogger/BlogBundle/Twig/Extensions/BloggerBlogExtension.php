<?php

namespace Blogger\BlogBundle\Twig\Extensions;

/**
 * Description of BloggerBlogExtension
 *
 * @author cyber02
 */
class BloggerBlogExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('created_ago', array($this, 'createdAgo'))
        );
    }
    
    public function createdAgo(\DateTime $dateTime)
    {
        //calculate time difference between now and given DateTime
        $delta = time() - $dateTime->getTimestamp();
        if ($delta < 0) {
            throw new \InvalidArgumentException('createdAgo is unable to handles dates in the future');
        }
        
        $duration = '';
        //seconds
        if ($delta < 60) {
            $time = $delta;
            $duration = $time . ' second'.(($time === 0 || $time > 1) ? 's' : '').' ago';
        }
        //minutes
        elseif ($delta < 3600) {
            $time = floor($delta / 60);
            $duration = $time . ' minute'.(($time > 1) ? 's' : '').' ago';
        }
        //hours
        elseif ($delta < 86400) {
            $time = floor($delta / 3600);
            $duration = $time . ' hour'.(($time > 1) ? 's' : '').' ago';
        }
        //days
        else {
            $time = floor($delta / 86400);
            $duration = $time . ' day'.(($time > 1) ? 's' : '').' ago';
        }
        
        return $duration;
    }
    
    public function getName()
    {
        return 'blogger_blog_extension';
    }
}
