<?php

namespace Blogger\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blogger\BlogBundle\Entity\Blog;

/**
 * Description of BlogFixtures
 *
 * @author cyber02
 */
class BlogFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $blog1 = new Blog();
        $blog1->setTitle('Mag');
        $blog1->setBlog('Mag Warframe');
        $blog1->setImage('250px-MAG.jpg');
        $blog1->setAuthor('dsyph3r');
        $blog1->setTags('symfony2, php, warframe, symblog');
        $blog1->setCreated(new \DateTime());
        $blog1->setUpdated($blog1->getCreated());
        $manager->persist($blog1);
        
        $blog2 = new Blog();
        $blog2->setTitle('Ash');
        $blog2->setBlog('Ash Warframe');
        $blog2->setImage('250px-Ash.jpg');
        $blog2->setAuthor('Alad V');
        $blog2->setTags('symfony2, php, warframe, symblog');
        $blog2->setCreated(new \DateTime());
        $blog2->setUpdated($blog2->getCreated());
        $manager->persist($blog2);
        
        $blog3 = new Blog();
        $blog3->setTitle('Rhino');
        $blog3->setBlog('Rhino Warframe');
        $blog3->setImage('250px-Rhino.jpg');
        $blog3->setAuthor('Phorid');
        $blog3->setTags('symfony2, php, warframe, symblog');
        $blog3->setCreated(new \DateTime());
        $blog3->setUpdated($blog3->getCreated());
        $manager->persist($blog3);
        
        $blog4 = new Blog();
        $blog4->setTitle('Volt');
        $blog4->setBlog('Volt Warframe');
        $blog4->setImage('250px-Volt.jpg');
        $blog4->setAuthor('Banshee');
        $blog4->setTags('symfony2, php, warframe, symblog');
        $blog4->setCreated(new \DateTime());
        $blog4->setUpdated($blog4->getCreated());
        $manager->persist($blog4);
        
        $blog5 = new Blog();
        $blog5->setTitle('Trinity');
        $blog5->setBlog('Trinity Warframe');
        $blog5->setImage('250px-Trinity.jpg');
        $blog5->setAuthor('Sgt. Ruk');
        $blog5->setTags('symfony2, php, warframe, symblog');
        $blog5->setCreated(new \DateTime());
        $blog5->setUpdated($blog5->getCreated());
        $manager->persist($blog5);
        
        $manager->flush();
        
        $this->addReference('blog-1', $blog1);
        $this->addReference('blog-2', $blog2);
        $this->addReference('blog-3', $blog3);
        $this->addReference('blog-4', $blog4);
        $this->addReference('blog-5', $blog5);
    }
    
    public function getOrder()
    {
        return 1;
    }
}
