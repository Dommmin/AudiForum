<?php

namespace App\Controller;

use App\Entity\Question;
use App\Form\QuestionType;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/{slug}/{name}/', name: 'app_car')]
    public function index(QuestionRepository $questionRepository): Response
    {
        $questions = $questionRepository->findAll();

        return $this->render('car/index.html.twig', [
            'questions' => $questions
        ]);
    }

    #[Route('/{slug}/{name}/nowy/temat', name: 'app_questions')]
    public function post(Request $request, EntityManagerInterface $entityManager, string $slug, string $name): Response
    {
        $form = $this->createForm(QuestionType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $question = new Question();
            $question->setName($data->getName());
            $question->setQuestion($data->getQuestion());
            $question->setAskedAt(new \DateTime());

            $entityManager->persist($question);
            $entityManager->flush();

            return $this->redirectToRoute('app_car', [
                'slug' => $slug,
                'name' => $name,
            ]);
        }

        return $this->render('category/question.html.twig', [
            'question' => $form->createView(),
        ]);
    }
}
