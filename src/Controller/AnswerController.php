<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Question;
use App\Form\AnswerType;
use App\Repository\AnswerRepository;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnswerController extends AbstractController
{
//    #[Route('/{car}/{name}/show/{slug}', name: 'answer_question')]
//    #[ParamConverter('question', class: Question::class, options: ['mapping' => ['slug' => 'slug']])]
//    public function answer(Question $question, QuestionRepository $questionRepository, Request $request, EntityManagerInterface $entityManager, string $slug, string $name, string $car, AnswerRepository $answerRepository): Response
//    {
//        $questions = $questionRepository->findOneBySlug($slug);
//
//        $answers = $answerRepository->findAnswers($slug);
//
//        $form = $this->createForm(AnswerType::class);
//
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//            $data = $form->getData();
//
//            $answer = new Answer();
//            $answer->setContent($data->getContent());
//            $answer->setAnsweredAt(new \DateTime);
//            $answer->setQuestion($question);
//
//            $entityManager->persist($answer);
//            $entityManager->flush();
//
//            return $this->redirectToRoute('show_question', [
//                'slug' => $slug,
//                'name' => $name,
//                'car' => $car,
//            ]);
//        }
//
//        return $this->render('answer/index.html.twig', [
//            'questions' => $questions,
//            'answers' => $answers,
//            'answer' =>  $form->createView(),
//        ]);
//    }
}
