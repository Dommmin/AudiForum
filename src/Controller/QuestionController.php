<?php


namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Model;
use App\Entity\Question;
use App\Form\AnswerType;
use App\Form\QuestionType;
use App\Repository\AnswerRepository;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Pagerfanta\Pagerfanta;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    #[Route('/{slug}/{name}/new_question', name: 'new_question')]
    public function new(Request $request, EntityManagerInterface $entityManager, string $slug, string $name, Model $model): Response
    {
        $form = $this->createForm(QuestionType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $question = new Question();
            $question->setName($data->getName());
            $question->setQuestion($data->getQuestion());
            $question->setAskedAt(new \DateTime());
            $question->setModel($model);
            $question->setOwner($this->getUser());

            $entityManager->persist($question);
            $entityManager->flush();

            return $this->redirectToRoute('app_car', [
                'slug' => $slug,
                'name' => $name,
                'model' => $model,
            ]);
        }

        return $this->render('category/question.html.twig', [
            'question' => $form->createView(),
        ]);
    }

    #[Route('/{car}/{name}/show/{slug}', name: 'show_question')]
    #[ParamConverter('question', class: Question::class, options: ['mapping' => ['slug' => 'slug']])]
    public function show(Question $question, QuestionRepository $questionRepository, Request $request, EntityManagerInterface $entityManager, string $slug, string $name, string $car): Response
    {
        $queryBuilder = $questionRepository->findBySlugPager($slug);

//        $queryBuilder = $answerRepository->findAnswers($slug);

        $pagerfanta = new Pagerfanta(
            new QueryAdapter($queryBuilder)
        );

        $pagerfanta->setMaxPerPage(5);

        $form = $this->createForm(AnswerType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $answer = new Answer();
            $answer->setContent($data->getContent());
            $answer->setAnsweredAt(new \DateTime);
            $answer->setQuestion($question);
            $answer->setOwner($this->getUser());

            $entityManager->persist($answer);
            $entityManager->flush();

            return $this->redirectToRoute('show_question', [
                'slug' => $slug,
                'name' => $name,
                'car' => $car,
            ]);
        }

        return $this->render('question/index.html.twig', [
//            'questions' => $questions,
            'pager' => $pagerfanta,
            'answer' =>  $form->createView(),
        ]);
    }
}
