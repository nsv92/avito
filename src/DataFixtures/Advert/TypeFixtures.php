<?php

declare(strict_types=1);

namespace App\DataFixtures\Advert;

use App\Entity\Advert\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Class TypeFixtures.
 */
class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $manager->persist(
            (new Type())->setName('sell')->setSlug('sell')
        );
        $manager->persist(
            (new Type())->setName('buy')->setSlug('buy')
        );
        $manager->persist(
            (new Type())->setName('make_service')->setSlug('make_service')
        );
        $manager->persist(
            (new Type())->setName('get_service')->setSlug('get_service')
        );
        $manager->persist(
            (new Type())->setName('rent')->setSlug('rent')
        );
        $manager->flush();
    }
}
