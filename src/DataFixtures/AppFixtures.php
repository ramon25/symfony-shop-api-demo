<?php

namespace App\DataFixtures;

use App\Factory\ArticleFactory;
use App\Factory\CartFactory;
use App\Factory\CategoryFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        CategoryFactory::createMany(10);
        ArticleFactory::createMany(30, function() {
            // each Post will have a random Category (chosen from those created above)
            return [
                'categories' => CategoryFactory::randomRange(0, 3),
            ];
        });
        CartFactory::createMany(5, function() {
            // each Post will have a random Category (chosen from those created above)
            return [
                'articles' => ArticleFactory::randomRange(0, 3),
            ];
        });
    }
}