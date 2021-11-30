<?php
namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

class ResetPasswordCommand extends Command
{
    protected function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser->addArgument('password', [
            'help' => 'New password for priveledged owner account'
        ]);
        return $parser;
    }

    public function execute(Arguments $args, ConsoleIo $io)
    {
        $password = $args->getArgument('password');
        
		
		//Reset Password in users table
		$this->loadModel('Users');
		$user = $this->Users->get(1);
		$user->password = $password;
		if ($this->Users->save($user)) {
			$io->out("Password has been reset for owner account");
		} else {
			$io->error("Password cannot be reset for owner account, please contact system admin.");
		}
		
	}
}