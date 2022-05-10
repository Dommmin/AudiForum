<?php

namespace App\DataFixtures;

use App\Entity\Car;
use App\Entity\Category;
use App\Entity\General;
use App\Entity\Model;
use App\Entity\Technical;
use App\Entity\Tuning;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        /* users */
        $user = new User();
        $user->setEmail('admin@localhost.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->passwordHasher->hashPassword($user, 'admin'));

        $user2 = new User();
        $user2->setEmail('john@localhost.com');
        $user2->setRoles(['ROLE_USER']);
        $user2->setPassword($this->passwordHasher->hashPassword($user, 'user'));

        $manager->persist($user);
        $manager->persist($user2);
        $manager->flush();

        /* cars */
        $car1 = new Car();
        $car1->setName('Audi A3 / S3 / RS3');

        $car2 = new Car();
        $car2->setName('Audi A4 / S4 / RS4');

        $car3 = new Car();
        $car3->setName('Audi A5 / S5 / RS5');

        $car4 = new Car();
        $car4->setName('Audi A6 / S6 / RS6');

        $car5 = new Car();
        $car5->setName('Audi A7 / S7 / RS7');

        $car6 = new Car();
        $car6->setName('Audi A8 / S8');

        /* movies */
        $model1 = new Model();
        $model1->setName('8V');
        $model1->setCar($car1);

        $model2 = new Model();
        $model2->setName('8Y');
        $model2->setCar($car1);

        $model3 = new Model();
        $model3->setName('B8');
        $model3->setCar($car2);

        $model4 = new Model();
        $model4->setName('B9');
        $model4->setCar($car2);

        $model5 = new Model();
        $model5->setName('8T');
        $model5->setCar($car3);

        $model6 = new Model();
        $model6->setName('F5');
        $model6->setCar($car3);

        $model7 = new Model();
        $model7->setName('C7');
        $model7->setCar($car4);

        $model8 = new Model();
        $model8->setName('C8');
        $model8->setCar($car4);

        $model9 = new Model();
        $model9->setName('4G');
        $model9->setCar($car5);

        $model10 = new Model();
        $model10->setName('4K');
        $model10->setCar($car5);

        $model11 = new Model();
        $model11->setName('D4');
        $model11->setCar($car6);

        $model12 = new Model();
        $model12->setName('D5');
        $model12->setCar($car6);

        /* categories */
        $category = new Category();
        $category->setName('Twoje Audi');

        $category2 = new Category();
        $category2->setName('Silniki benzynowe');

        $category3 = new Category();
        $category3->setName('Silniki wysokoprężne');

        $category4 = new Category();
        $category4->setName('Skrzynia biegów i układ napędowy');

        $category5 = new Category();
        $category5->setName('Zawieszenie');

        $category6 = new Category();
        $category6->setName('Elektryka');

        $category7 = new Category();
        $category7->setName('Nadwozie');

        $category8 = new Category();
        $category8->setName('Wnętrze');

        $category9 = new Category();
        $category9->setName('Układ chłodzenia, klimatyzacja oraz ogrzewanie');

        $category10 = new Category();
        $category10->setName('Układ hamulcowy');

        $category11 = new Category();
        $category11->setName('Koła');

        $category12 = new Category();
        $category12->setName('Nagłośnienie');

        $category13 = new Category();
        $category13->setName('Tuning wizualny');

        $category14 = new Category();
        $category14->setName('Tuning mechaniczny');

        /* subcategories */
        $general = new General();
        $general->addCategory($category);

        $technical = new Technical();
        $technical->addCategory($category2);

        $technical2 = new Technical();
        $technical2->addCategory($category3);

        $technical3 = new Technical();
        $technical3->addCategory($category4);

        $technical4 = new Technical();
        $technical4->addCategory($category5);

        $technical5 = new Technical();
        $technical5->addCategory($category6);

        $technical6 = new Technical();
        $technical6->addCategory($category7);

        $technical7 = new Technical();
        $technical7->addCategory($category8);

        $technical8 = new Technical();
        $technical8->addCategory($category9);

        $technical9 = new Technical();
        $technical9->addCategory($category10);

        $technical10 = new Technical();
        $technical10->addCategory($category11);

        $technical11 = new Technical();
        $technical11->addCategory($category12);

        $tuning = new Tuning();
        $tuning->addCategory($category13);

        $tuning2 = new Tuning();
        $tuning2->addCategory($category14);


        $manager->persist($car1);
        $manager->persist($car2);
        $manager->persist($car3);
        $manager->persist($car4);
        $manager->persist($car5);
        $manager->persist($car6);
        $manager->persist($model1);
        $manager->persist($model2);
        $manager->persist($model3);
        $manager->persist($model4);
        $manager->persist($model5);
        $manager->persist($model6);
        $manager->persist($model7);
        $manager->persist($model8);
        $manager->persist($model9);
        $manager->persist($model10);
        $manager->persist($model11);
        $manager->persist($model12);
        $manager->persist($category);
        $manager->persist($category2);
        $manager->persist($category3);
        $manager->persist($category4);
        $manager->persist($category5);
        $manager->persist($category6);
        $manager->persist($category7);
        $manager->persist($category8);
        $manager->persist($category9);
        $manager->persist($category10);
        $manager->persist($category11);
        $manager->persist($category12);
        $manager->persist($category13);
        $manager->persist($category14);
        $manager->persist($general);
        $manager->persist($technical);
        $manager->persist($technical2);
        $manager->persist($technical3);
        $manager->persist($technical4);
        $manager->persist($technical5);
        $manager->persist($technical6);
        $manager->persist($technical7);
        $manager->persist($technical8);
        $manager->persist($technical9);
        $manager->persist($technical10);
        $manager->persist($technical11);
        $manager->persist($tuning);
        $manager->persist($tuning2);
        $manager->flush();
    }
}