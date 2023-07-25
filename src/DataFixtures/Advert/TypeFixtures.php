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
    public const SELL_TYPE = 'sell';
    public const BUY_TYPE = 'buy';
    public const MAKE_SERVICE_TYPE = 'make_service';
    public const GET_SERVICE_TYPE = 'get_service';
    public const RENT_TYPE = 'rent';
    public const RENT_OUT_TYPE = 'rent_out';

    /**
     * {@inheritDoc}
     *
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $types = [
            self::SELL_TYPE => (new Type())->setName('sell')->setSlug('sell'),
            self::BUY_TYPE => (new Type())->setName('buy')->setSlug('buy'),
            self::MAKE_SERVICE_TYPE => (new Type())->setName('make_service')->setSlug('make_service'),
            self::GET_SERVICE_TYPE => (new Type())->setName('get_service')->setSlug('get_service'),
            self::RENT_TYPE => (new Type())->setName('rent')->setSlug('rent'),
            self::RENT_OUT_TYPE => (new Type())->setName('rent_out')->setSlug('rent_out'),
        ];

        foreach ($types as $type) {
            $manager->persist($type);
        }

        $manager->flush();

        foreach ($types as $referenceName => $type) {
            $this->addReference($referenceName, $type);
        }
    }
}
