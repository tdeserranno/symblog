<?php

namespace Blogger\BlogBundle\Tests\Entity;

use Blogger\BlogBundle\Entity\Blog;

/**
 * Description of BlogTest
 *
 * @author cyber02
 */
class BlogTest extends \PHPUnit_Framework_TestCase
{
    public function testSlugify()
    {
        $blog = new Blog();

        $this->assertEquals('hello-world', $blog->slugify('Hello World'));
        $this->assertEquals('a day with symfony2', $blog->slugify('A Day With Symfony2'));
        $this->assertEquals('hello-world', $blog->slugify('Hello    world'));
        $this->assertEquals('symblog', $blog->slugify('symblog '));
        $this->assertEquals('symblog', $blog->slugify(' symblog'));
    }
    
    public function testSetTitle()
    {
        $blog = new Blog();

        $blog->setTitle('Hello World');
        $this->assertEquals('hello-world', $blog->getSlug());
    }
}
