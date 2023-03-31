<?php

namespace App\MessageHandler;

use App\Entity\User;
use App\Message\ResetPasswordRequestMessage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\RouterInterface;
use SymfonyCasts\Bundle\ResetPassword\ResetPasswordHelperInterface;

#[AsMessageHandler]
final class ResetPasswordRequestMessageHandler
{

    public function __construct(
        private ResetPasswordHelperInterface $resetPasswordHelper,
        private EntityManagerInterface $entityManager,
        private MailerInterface $mailer,
        private RouterInterface $router,
        private string $hostname,
        private string $emailFrom,
    ) {
    }

    public function __invoke(ResetPasswordRequestMessage $message)
    {
        $email = $message->getEmail();

        $user = $this->entityManager->getRepository(User::class)->findOneBy([
            'email' => $email,
        ]);

        // Do not reveal whether a user account was found or not.
        if (!$user) {
            throw new \Exception('User not found');
        }

        $resetToken = $this->resetPasswordHelper->generateResetToken($user);

        $this->router->getContext()->setHost($this->hostname)->setScheme('https');

        $email = (new TemplatedEmail())
            ->from(new Address($this->emailFrom, 'Shop Demo'))
            ->to($user->getEmail())
            ->subject('Your password reset request')
            ->htmlTemplate('reset_password/email.html.twig')
            ->context([
                'resetToken' => $resetToken,
            ])
        ;

        $this->mailer->send($email);
    }
}
