<?php

namespace Blogger\BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Description of PageControllerTest
 *
 * @author cyber02
 */
class PageControllerTest extends WebTestCase
{
    public function testAbout()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/about');
        
        //assert that the requested page contains an H1 tag containing the text 'About symblog'
        $this->assertEquals(1, $crawler->filter('h1:contains("About symblog")')->count());
    }
    
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        
        //assert that the requested page contains 1 or more article.blog nodes
        $this->assertTrue($crawler->filter('article.blog')->count() > 0);
        
        //find first link, get title, ensure this is loaded on the next page
        $blogLink = $crawler->filter('article.blog h2 a')->first();
        $blogTitle = $blogLink->text();
        $crawler = $client->click($blogLink->link());
        
        //check the H2 has the blog title in it
        $this->assertEquals(1, $crawler->filter('h2:contains('.$blogTitle.')')->count());
    }
    
    public function testContact()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contact');

        //assert that requested page H1 contains 'Contact symblog'
        $this->assertEquals(1, $crawler->filter('h1:contains("Contact symblog")')->count());

        // Select based on button value, or id or name for buttons
        //get form from form submit button
        $form = $crawler->selectButton('Submit')->form();
        
//        var_dump($form->getValues());

        //populate form values
        $form['contact[name]']       = 'name';
        $form['contact[email]']      = 'email@email.com';
        $form['contact[subject]']    = 'Subject';
        $form['contact[body]']       = 'The comment body must be at least 50 characters long as there is a validation constrain on the Enquiry entity';

        //submit form
        //enable profiler for next request
        //submitting form will cause a request of the contact page
        $client->enableProfiler();
        $crawler = $client->submit($form);
        
        // Check email has been sent
        //if we can get the profile we run the test, if not don't run test(profiler may be unavailable due to environment config (ie. prod env))
        if ($profile = $client->getProfile())
        {
            $swiftMailerProfiler = $profile->getCollector('swiftmailer');

            // Only 1 message should have been sent
            $this->assertEquals(1, $swiftMailerProfiler->getMessageCount());

            // Get the first message
            $messages = $swiftMailerProfiler->getMessages();
            $message  = array_shift($messages);

            $symblogEmail = $client->getContainer()->getParameter('blogger_blog.emails.contact_email');
            // Check message is being sent to correct address
            $this->assertArrayHasKey($symblogEmail, $message->getTo());
        } else {
            var_dump('cudnt get profile');
        }
        
        //force test environment to follow redirect
        $crawler = $client->followRedirect();
        
        //assert that form was submitted successfully by checking if the flash message is present in the element with class="blogger-notice"
        $this->assertEquals(1, $crawler->filter('.blogger-notice:contains("Your contact enquiry was sent successfully. Thank you!")')->count());
    }
}
