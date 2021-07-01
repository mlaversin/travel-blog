<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i<= 20; $i ++) {
            $article = new Article();
            $article->setTitle("Titre de l'article n°$i")
                    ->setContent("<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus, repellat animi. Quibusdam pariatur eligendi sint? Amet a animi fugiat sint impedit eveniet assumenda esse officia debitis inventore. Distinctio aut dolorem repellat tempore corrupti architecto quod voluptas dolorum minima possimus! Quaerat eveniet deserunt voluptas error, expedita excepturi a ipsa ducimus repudiandae sequi beatae. Modi consectetur quos itaque beatae, non ipsa sint quibusdam repudiandae dolores adipisci assumenda, sapiente praesentium odio vel hic sed recusandae, quae magni aperiam blanditiis magnam quo! Quis dignissimos veritatis perspiciatis, perferendis non quo hic quos ex optio alias magni rerum ut porro cupiditate quod eveniet adipisci, amet natus, delectus velit. Maiores eos officiis, incidunt magni numquam magnam reiciendis placeat quaerat laboriosam quia, velit aliquam eum possimus quod molestias facilis earum ducimus nostrum repellendus suscipit odit nihil error quo fugit! Molestiae, veritatis tenetur. Repellendus rerum, quia alias possimus, harum earum, nobis aperiam esse deleniti et voluptatibus qui fuga. Minus optio id consequatur quos reprehenderit repudiandae nobis deleniti mollitia! Eum ut quae a? Debitis a numquam iure ipsum ad, repellat molestiae quia, rem itaque vel autem reprehenderit perferendis provident. Quibusdam voluptate culpa voluptas, sint dolorem ea exercitationem ullam a veniam minus error doloribus eveniet? Iste, expedita? Doloremque sint alias sed.</p>")
                    ->setImage("http://placehold.it/350x150")
                    ->setCreatedAt(new \DateTime());

                    $manager->persist($article);
        }

        $manager->flush();
    }
}
