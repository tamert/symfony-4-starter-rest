<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Book;
use Faker\Factory;


class AppFixtures extends Fixture
{
    protected $faker;


    /**
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {

        $this->faker = Factory::create('tr_TR');
        $dateImmutable = new \DateTime();


        for ($i = 0; $i < 20; $i++) {
            $book= new Book();
            $book->setTitle($this->faker->name);
            $book->setIsbn($this->faker->isbn10);
            $book->setDescription($this->faker->text);
            $book->setAuthor($this->faker->name);
            $book->setPublicationDate($dateImmutable);
            $manager->persist($book);
        }

        $manager->flush();
    }
}
