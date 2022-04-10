<?php

namespace App\Controller;

use App\Entity\Email;
use App\Entity\Emails;
use App\Repository\LeadsRepository;
use App\Service\SendMailService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class EmailsController extends AbstractController
{
    #[Route('/email', name: 'email')]
    public function index(): Response
    {
        
        return $this->render('email/index.html.twig', [
            'controller_name' => 'EmailController',
        ]);
    }

    
    #[Route('/send/{idlead}', name: 'courriel', methods: ['GET', 'POST'])]
    public function courriel(Request $request,Emails $Email, EntityManagerInterface $entityManager,SendMailService $mail, LeadsRepository $l ): Response
    {
    

        $data= $request->getPathInfo();

       $res= explode('/',$data,4);
     
        $param=$res[3];
      //  dd($param);die;
       $paranfinal= intval($param);

      
       $maill = new Emails();
       $form = $this->createForm(EmailsType::class, $maill);
       $onelead=$l->findOneById($paranfinal);
       // dd($onelead);die;
       //$request->get('lead')->setId(2); 
    
       $form->get('lead')->setData($onelead);  
        $form->handleRequest($request);
       
   //    $result= $mailRepository->findEmailByLead($paranfinal );
      
       
       $maillead=$onelead->getCourriel();
 

        if ($form->isSubmitted() && $form->isValid()) {

            //$entityManager->persist($maill);
            $context = [
                'mail' => $form->get('sendto')->getData(),
                'emailuser' => $form->get('sendfrom')->getData(),
                'sujet' => $form->get('sujet')->getData(),
                'text' => $form->get('text')->getData(),
            ];

           
            $mail->send(
                $form->get('sendto')->getData(), $form->get('sendfrom')->getData(),$form->get('sujet')->getData(),$form->get('text')->getData(),
               
            $context 
              
            );
         /*   $mailsend = (new Email())
            ->from('expediteur@demo.test')
            ->to('destinataire@demo.test')
            ->subject('Mon beau sujet')
            ->html('<p>Ceci est mon message en HTML</p>')
         ;
   
         $mail->send($mailsend);*/
   


         
           // $entityManager->flush('message', 'Mail de contact envoyé');
           
            $uri = $request->getUri();

            return $this->redirectToRoute('courriel',array('idlead' => $paranfinal));


        }
        return $this->renderForm('Email/send.html.twig', [
           
            'form' => $form,
        ]);

       
    }












}
