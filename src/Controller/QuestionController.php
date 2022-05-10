<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Question;
use App\Form\AnswerType;
use App\Form\QuestionType;
use App\Repository\AnswerRepository;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    #[Route('/{slug}/{name}/{category}/{question}', name: 'question')]
    public function index(QuestionRepository $questionRepository, string $question, Request $request, EntityManagerInterface $entityManager, string $slug, $name, $category, AnswerRepository $answerRepository): Response
    {
        $questions = $questionRepository->findOneBySlug($question);

        $answers = $answerRepository->findAll();

        $form = $this->createForm(AnswerType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $answer = new Answer();
            $answer->setContent($data->getContent());
            $answer->setAnsweredAt(new \DateTime);

            $entityManager->persist($answer);
            $entityManager->flush();

            return $this->redirectToRoute('question', [
                'slug' => $slug,
                'name' => $name,
                'category' => $category,
                'question' => $question,
            ]);
        }

        return $this->render('question/index.html.twig', [
            'questions' => $questions,
            'answers' => $answers,
            'answer' =>  $form->createView(),
        ]);
    }
}
