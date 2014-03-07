<?php

namespace Blogger\BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Description of BlogControllerTest
 *
 * @author cyber02
 */
class BlogControllerTest extends WebTestCase
{
    public function testAddBlogComment()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/26/Mag');

        $this->assertEquals(1, $crawler->filter('h2:contains("Mag")')->count());

        // Select based on button value, or id or name for buttons
        $form = $crawler->selectButton('Submit')->form();

        $crawler = $client->submit($form, array(
            'blogger_blogbundle_comment[user]'          => 'name',
            'blogger_blogbundle_comment[comment]'       => 'lameass comment',
        ));

        // Need to follow redirect
        $crawler = $client->followRedirect();

        // Check comment is now displaying on page, as the last entry. This ensure comments
        // are posted in order of oldest to newest
        $articleCrawler = $crawler->filter('section .previous-comments article')->last();

        $this->assertEquals('name', $articleCrawler->filter('header span.highlight')->text());
        $this->assertEquals('lameass comment', $articleCrawler->filter('p')->last()->text());

        // Check the sidebar to ensure latest comments are display and there is 10 of them

        $this->assertEquals(5, $crawler->filter('aside.sidebar section')->last()
                                        ->filter('article')->count()
        );

        $this->assertEquals('name', $crawler->filter('aside.sidebar section')->last()
                                            ->filter('article')->first()
                                            ->filter('header span.highlight')->text()
        );
    }
}
