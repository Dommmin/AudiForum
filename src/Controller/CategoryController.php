<?php

namespace App\Controller;

use App\Entity\Question;
use App\Form\QuestionType;
use App\Repository\CategoryRepository;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/{slug}/{name}/', name: 'app_car')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $generals = $categoryRepository->findGenerals();

        $technicals = $categoryRepository->findTechnicals();

        $tunings = $categoryRepository->findTunings();

        return $this->render('car/index.html.twig', [
            'generals' => $generals,
            'technicals' => $technicals,
            'tunings' => $tunings,
        ]);
    }

    #[Route('/{slug}/{name}/{category}/', name: 'app_category')]
    public function view(QuestionRepository $questionRepository): Response
    {
        $questions = $questionRepository->findBy([], ['id' => 'desc']);

        return $this->render('category/index.html.twig', [
            'questions' => $questions,
        ]);
    }

    #[Route('/{slug}/{name}/{category}/nowy/temat', name: 'app_questions')]
    public function post(Request $request, EntityManagerInterface $entityManager, string $slug, string $name, string $category): Response
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

            return $this->redirectToRoute('app_category', [
                'slug' => $slug,
                'name' => $name,
                'category' => $category,
            ]);
        }

        return $this->render('category/question.html.twig', [
            'question' => $form->createView(),
        ]);
    }
}
