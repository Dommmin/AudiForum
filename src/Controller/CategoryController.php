<?php

namespace App\Controller;

use App\Entity\Question;
use App\Form\QuestionType;
use App\Repository\GeneralRepository;
use App\Repository\ModelRepository;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/{slug}/{name}/', name: 'app_car')]
    public function index(string $name, ModelRepository $modelRepository): Response
    {
        $models = $modelRepository->findOneByName($name);

        return $this->render('car/index.html.twig', [

            'models' => $models,
        ]);
    }

    #[Route('/{slug}/{name}/{general}/', name: 'app_category')]
    public function view(QuestionRepository $questionRepository, string $general, GeneralRepository $generalRepository): Response
    {
        $g_questions = $questionRepository->findGeneralQuestions();
        $questions = $generalRepository->findGeneralQuestions($general);

        return $this->render('category/index.html.twig', [
            'g_questions' => $g_questions,
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
