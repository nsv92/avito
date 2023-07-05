<?php

declare(strict_types=1);

namespace App\DataFixtures\Advert;

use App\Entity\Advert\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Class CategoryFixtures.
 */
class CategoryFixtures extends Fixture
{
    /**
     * @return void
     */
    public function load(ObjectManager $manager)
    {
        $manager->persist(
            (new Category())->setName('Transport')->setSlug('transport')->setDescription('Транспорт')
        );
        $manager->persist(
            (new Category())->setName('Real_estate')->setSlug('real_estate')->setDescription('Недвижимость')
        );
        $manager->persist(
            (new Category())->setName('Job')->setSlug('job')->setDescription('Работа')
        );
        $manager->persist(
            (new Category())->setName('Services')->setSlug('services')->setDescription('Услуги')
        );
        $manager->persist(
            (new Category())->setName('Electronics')->setSlug('electronics')->setDescription('Электротехника')
        );
        $manager->flush();
    }
}
