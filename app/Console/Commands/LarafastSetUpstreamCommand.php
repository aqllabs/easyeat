<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class LarafastSetUpstreamCommand extends Command
{
    protected $signature = 'larafast:set-upstream';

    protected $description = 'Set Larafast upstream repository to keep up to date with the latest changes.';

    public function handle(): int
    {
        // Check if the .git directory exists
        if (! is_dir(base_path('.git'))) {
            $this->error('This directory is not a git repository.');

            return 1;
        }

        $commands = [
            'git remote add larafast https://github.com/karakhanyans-tools/larafast-tall.git',
        ];

        foreach ($commands as $command) {
            $process = Process::fromShellCommandline($command);

            try {
                $process->mustRun();
                $this->info($process->getOutput());
            } catch (ProcessFailedException $exception) {
                $this->error($exception->getMessage());

                return 1;
            }
        }

        $this->info('Upstream repository added successfully.');

        return 0;
    }
}
