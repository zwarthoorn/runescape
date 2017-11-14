<?php
/**
 * Created by PhpStorm.
 * User: WalterWiesnekker
 * Date: 13-Nov-17
 * Time: 22:01
 */

// src/AppBundle/Command/CreateUserCommand.php
namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use GuzzleHttp\Client;
use AppBundle\Entity\Product;

class TestCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('runescape:setup')

            // the short description shown while running "php bin/console list"
            ->setDescription('Initial setup.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command will setup the application and seed the servers')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output->writeln([
            'Starting seeding',
            '============',
            '',
        ]);

        $entityManager = $this->getContainer()->get('doctrine')->getEntityManager();

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://rsbuddy.com/exchange/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
            'verify' => false
        ]);

        $response = $client->get('summary.json');

        $body = json_decode($response->getBody(),true);

        $flushCounter = 0;
        foreach ($body as $key=>$value)
        {
            if ($flushCounter > 20){
                $entityManager->flush();
                $flushCounter = 0;
            }
            $flushCounter++;

            $isMember = ($value['members']) ? 1 : 0;

            $product = new Product();

            $product->setId($value['id']);
            $product->setName($value['name']);
            $product->setMember($isMember);
            $product->setPriceAverage($value['overall_average']);
            $product->setPriceHigh($value['sell_average']);
            $product->setPriceLow($value['buy_average']);

            $entityManager->persist($product);

        }

        $entityManager->flush();



        // outputs a message without adding a "\n" at the end of the line
        $output->write('done');
        $output->write('create a user.');
    }
}