<?php

namespace App\DataFixtures;

use App\Entity\Car;
use App\Entity\Model;
use App\Entity\Question;
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

        /* questions */
        $question = new Question();
        $question->setName('Lorem Ipsum');
        $question->setQuestion('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');
        $question->setAskedAt(new \DateTime());

        $question2 = new Question();
        $question2->setName('Lorem Ipsum');
        $question2->setQuestion('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');
        $question2->setAskedAt(new \DateTime());

        $question3 = new Question();
        $question3->setName('Lorem Ipsum');
        $question3->setQuestion('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');
        $question3->setAskedAt(new \DateTime());

        $question4 = new Question();
        $question4->setName('Lorem Ipsum');
        $question4->setQuestion('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');
        $question4->setAskedAt(new \DateTime());

        $question5 = new Question();
        $question5->setName('Lorem Ipsum');
        $question5->setQuestion('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');
        $question5->setAskedAt(new \DateTime());

        $question6 = new Question();
        $question6->setName('Lorem Ipsum');
        $question6->setQuestion('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');
        $question6->setAskedAt(new \DateTime());

        $question7 = new Question();
        $question7->setName('Lorem Ipsum');
        $question7->setQuestion('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');
        $question7->setAskedAt(new \DateTime());

        $question8 = new Question();
        $question8->setName('Lorem Ipsum');
        $question8->setQuestion('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');
        $question8->setAskedAt(new \DateTime());

        $question9 = new Question();
        $question9->setName('Lorem Ipsum');
        $question9->setQuestion('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');
        $question9->setAskedAt(new \DateTime());

        $question10 = new Question();
        $question10->setName('Lorem Ipsum');
        $question10->setQuestion('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');
        $question10->setAskedAt(new \DateTime());

        /* categories */

//        $category->addModel($model1);
//        $category->addModel($model2);
//        $category->addModel($model3);
//        $category->addModel($model4);



//
//        $category3 = new Category();
//        $category3->setName('Silniki wysokoprężne');
//        $category3->addModel($model1);
//
//        $category4 = new Category();
//        $category4->setName('Skrzynia biegów i układ napędowy');
//        $category4->addModel($model1);
//
//        $category5 = new Category();
//        $category5->setName('Zawieszenie');
//
//        $category6 = new Category();
//        $category6->setName('Elektryka');
//
//        $category7 = new Category();
//        $category7->setName('Nadwozie');
//
//        $category8 = new Category();
//        $category8->setName('Wnętrze');
//
//        $category9 = new Category();
//        $category9->setName('Układ chłodzenia, klimatyzacja oraz ogrzewanie');
//
//        $category10 = new Category();
//        $category10->setName('Układ hamulcowy');
//
//        $category11 = new Category();
//        $category11->setName('Koła');
//
//        $category12 = new Category();
//        $category12->setName('Nagłośnienie');
//
//        $category13 = new Category();
//        $category13->setName('Tuning wizualny');
//
//        $category14 = new Category();
//        $category14->setName('Tuning mechaniczny');




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

//        $manager->persist($category3);
//        $manager->persist($category4);
//        $manager->persist($category5);
//        $manager->persist($category6);
//        $manager->persist($category7);
//        $manager->persist($category8);
//        $manager->persist($category9);
//        $manager->persist($category10);
//        $manager->persist($category11);
//        $manager->persist($category12);
//        $manager->persist($category13);
//        $manager->persist($category14);
        $manager->persist($question);
        $manager->persist($question2);
        $manager->persist($question3);
        $manager->persist($question4);
        $manager->persist($question5);
        $manager->persist($question6);
        $manager->persist($question7);
        $manager->persist($question8);
        $manager->persist($question9);
        $manager->persist($question10);
        $manager->flush();
    }
}
