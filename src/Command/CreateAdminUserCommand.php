<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateAdminUserCommand extends Command
{
  protected static $defaultName = 'app:create-admin';
  private $entityManager;

  public function __construct(EntityManagerInterface $entityManager)
  {
    parent::__construct();

    $this->entityManager = $entityManager;
  }

  protected function configure()
  {
    $this
      ->setDescription('Creates a new user.')
      ->addArgument('email', InputArgument::REQUIRED, 'email')
      ->addArgument('password', InputArgument::REQUIRED, 'password')
      ->addArgument('Nom', InputArgument::REQUIRED, 'Nom')
      ->addArgument('Prenom', InputArgument::REQUIRED, 'Prenom')
      ->setHelp('This command allows you to create a user...');
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $user = new User();
    $user->setEmail($input->getArgument('email'));
    $user->setPassword($input->getArgument('password'));
    $user->setNom($input->getArgument('Nom'));
    $user->setPrenom($input->getArgument('Prenom'));
    $user->setRoles(['ROLE_ADMIN']);

    $this->entityManager->persist($user);
    $this->entityManager->flush();

    $output->writeln('Admin created!');

    return Command::SUCCESS;
  }
}
