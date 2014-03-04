<?php

namespace Blogger\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blogger\BlogBundle\Entity\Comment;
use Blogger\BlogBundle\Entity\Blog;

/**
 * Description of CommentFixtures
 *
 * @author cyber02
 */
class CommentFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $comment = new Comment();
        $comment->setUser('Mental');
        $comment->setComment('Awesome frame.');
        $comment->setBlog($manager->merge($this->getReference('blog-1')));
        $manager->persist($comment);
        
        $comment = new Comment();
        $comment->setUser('Daniel');
        $comment->setComment('Crush is great for clearing a room.');
        $comment->setBlog($manager->merge($this->getReference('blog-1')));
        $manager->persist($comment);
        
        $comment = new Comment();
        $comment->setUser('Daniel');
        $comment->setComment('Bleh. Doesn\'t tickle my fancy.');
        $comment->setBlog($manager->merge($this->getReference('blog-2')));
        $manager->persist($comment);
        
        $comment = new Comment();
        $comment->setUser('Hendrik');
        $comment->setComment('It\'s OK but there are quite a few frames that are infinitely more usefull.');
        $comment->setBlog($manager->merge($this->getReference('blog-2')));
        $manager->persist($comment);
        
        $comment = new Comment();
        $comment->setUser('Mental');
        $comment->setComment('Ironskin, STOMP!');
        $comment->setBlog($manager->merge($this->getReference('blog-3')));
        $manager->persist($comment);
        
        $comment = new Comment();
        $comment->setUser('Hendrik');
        $comment->setComment('I concur.');
        $comment->setBlog($manager->merge($this->getReference('blog-3')));
        $manager->persist($comment);
        
        $comment = new Comment();
        $comment->setUser('Daniel');
        $comment->setComment('I love Volt even tho it\'s a bit squishy sometimes.');
        $comment->setBlog($manager->merge($this->getReference('blog-4')));
        $manager->persist($comment);
        
        $comment = new Comment();
        $comment->setUser('Hendrik');
        $comment->setComment('It\'s not bad.');
        $comment->setBlog($manager->merge($this->getReference('blog-4')));
        $manager->persist($comment);
        
        $comment = new Comment();
        $comment->setUser('Mental');
        $comment->setComment('A demi-goddess with the right build.');
        $comment->setBlog($manager->merge($this->getReference('blog-5')));
        $manager->persist($comment);
        
        $comment = new Comment();
        $comment->setUser('Daniel');
        $comment->setComment('Boring.');
        $comment->setBlog($manager->merge($this->getReference('blog-5')));
        $manager->persist($comment);
        
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 2;
    }
}
