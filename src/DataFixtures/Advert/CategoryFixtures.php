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
    public const TRANSPORT_CATEGORY = 'transport';
    public const REAL_ESTATE_CATEGORY = 'real_estate';
    public const JOB_CATEGORY = 'job';
    public const SERVICE_CATEGORY = 'service';
    public const ELECTRONICS_CATEGORY = 'electronics';

    /**
     * {@inheritDoc}
     *
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $categories = [
            self::TRANSPORT_CATEGORY => (new Category())
                ->setName('transport')
                ->setSlug('transport')
                ->setDescription('Транспорт'),
            self::REAL_ESTATE_CATEGORY => (new Category())
                ->setName('real_estate')
                ->setSlug('real_estate')
                ->setDescription('Недвижимость'),
            self::JOB_CATEGORY => (new Category())
                ->setName('job')
                ->setSlug('job')
                ->setDescription('Работа'),
            self::SERVICE_CATEGORY => (new Category())
                ->setName('service')
                ->setSlug('service')
                ->setDescription('Услуги'),
            self::ELECTRONICS_CATEGORY => (new Category())
                ->setName('electronics')
                ->setSlug('electronics')
                ->setDescription('Электротехника'),
        ];
        foreach ($categories as $category) {
            $manager->persist($category);
        }
        $manager->flush();
        foreach ($categories as $referenceName => $category) {
            $this->addReference($referenceName, $category);
        }
    }
}
