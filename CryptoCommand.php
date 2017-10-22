<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Matok\Crypto\HexToAscii;
use Matok\Crypto\Base64;
use Matok\Crypto\BinaryToDecimal;

class CryptoCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('matok:crypto:decode')
            ->addArgument('type', InputArgument::REQUIRED)
            ->addArgument('input', InputArgument::REQUIRED)
            ->setDescription('Crypto.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $type = $input->getArgument('type');
        $encoded = $input->getArgument('input');
        switch ($type) {
            case 'hex2ascii':
                $hex2acsii = new HexToAscii($encoded);
                $decoded = $hex2acsii->decode();
                $output->writeln($decoded);
                break;

            case 'base64':
                $encoder = new Base64();
                $decoded = $encoder->decode($encoded);
                $output->writeln($decoded);
                break;

            case 'bin2dec':
                $encoder = new BinaryToDecimal(8);
                $decoded = $encoder->decode($encoded);
                $output->writeln($decoded);
                break;


            // decryption
            case 'null':
                break;
        }
    }
}