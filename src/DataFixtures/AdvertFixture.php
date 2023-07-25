<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\DataFixtures\Advert\CategoryFixtures;
use App\DataFixtures\Advert\TypeFixtures;
use App\Entity\Advert;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

/**
 * Class AdvertFixture.
 */
class AdvertFixture extends Fixture implements DependentFixtureInterface
{
    public const CAR_SELL_VW = 'car_sell_1';
    public const CAR_SELL_SOLARIS = 'car_sell_2';
    public const FLAT_RENT_OUT_1 = 'flat_rent_out_1';
    public const SELL_IPHONE = 'sell_iphone';
    public const JOB_GET_1 = 'job_get_1';

    /**
     * {@inheritDoc}
     *
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager)
    {
        $adverts = [
            self::CAR_SELL_VW => (new Advert())
                ->setName('Volkswagen Golf 2.0 AT, 1993, 222 222 км')
                ->setType($this->getReference(TypeFixtures::SELL_TYPE))
                ->setCategory($this->getReference(CategoryFixtures::TRANSPORT_CATEGORY))
                ->setPrice('150000.00')
                ->setDescription('Продаю.не спешу.если это ваш авто вас дождется')
                ->setSlug('advert'),
            self::CAR_SELL_SOLARIS => (new Advert())
                ->setName('Hyundai Solaris 1.4 MT, 2016, 222 300 км')
                ->setType($this->getReference(TypeFixtures::SELL_TYPE))
                ->setCategory($this->getReference(CategoryFixtures::TRANSPORT_CATEGORY))
                ->setPrice('357000.00')
                ->setDescription('Продам авто в отличном рабочем состоянии. Своевременно обслужен.
                 Имеется лицензия такси. Цвет синий. Авто под белой плёнкой. Торг. В салон и т д не поставлю.
                  Выкупа нет.')
                ->setSlug('advert'),
            self::FLAT_RENT_OUT_1 => (new Advert())
                ->setName('3-к. квартира, 80 м², 4/5 эт.')
                ->setType($this->getReference(TypeFixtures::RENT_OUT_TYPE))
                ->setCategory($this->getReference(CategoryFixtures::REAL_ESTATE_CATEGORY))
                ->setPrice('35000.00')
                ->setDescription('Уютная квартира в тихом центре. Просторная кухня-гостевая,
                 отдельно 2 спальни. Подробнее по телефону')
                ->setSlug('advert'),
            self::SELL_IPHONE => (new Advert())
                ->setName('iPhone 13 Pro 256GB Sierra Blue')
                ->setType($this->getReference(TypeFixtures::SELL_TYPE))
                ->setCategory($this->getReference(CategoryFixtures::ELECTRONICS_CATEGORY))
                ->setPrice('84000.00')
                ->setDescription('iPhone 13 Pro 256GB Небесно-голубой.
                В наличии есть другие цвета / память /модели! Оригинал, полный комплект, без вскрытий и ремонтов')
                ->setSlug('advert'),
            self::JOB_GET_1 => (new Advert())
                ->setName('Учитель для нейросети по литературе (в Яндекс)')
                ->setType($this->getReference(TypeFixtures::GET_SERVICE_TYPE))
                ->setCategory($this->getReference(CategoryFixtures::JOB_CATEGORY))
                ->setPrice('75000.00')
                ->setDescription('Работа тренером/редактором искусственного интеллекта в Яндекс.
                 Удаленная работа со стабильным заработком в компанию Яндекс. Кого ищем?
                 Это новая профессия – AI-тренер для всех, кто работает с текстами: учителей, редакторов,
                 копирайтеров, переводчиков, журналистов, контент-менеджеров и не только. Вместе с инженерами Яндекса
                 вы будете обучать нейросети, которые смогут не хуже человека отвечать на вопросы из самых разных
                 предметных областей. Если вы любите необычные задачи, не боитесь постоянно изучать новое и хотите
                 развивать технологии, которыми пользуются десятки миллионов людей, мы будем рады вашему отклику.
                 Это удаленная работа за компьютером.')
                ->setSlug('advert'),
        ];

        foreach ($adverts as $advert) {
            $manager->persist($advert);
        }
        $manager->flush();
        foreach ($adverts as $referenceName => $advert) {
            $this->addReference($referenceName, $advert);
        }
    }

    /**
     * {@inheritDoc}
     *
     * @return string[]
     */
    public function getDependencies(): array
    {
        return [
            TypeFixtures::class,
            CategoryFixtures::class,
        ];
    }
}
