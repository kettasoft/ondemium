<?php

namespace Modules\Question\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class DeactivateExpiredQuestions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'kettasoft:flush-questions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear question and answers after a specified period.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $expireQuestions = Question::where('created_at', '<=', now()->subWeek())->get();

        event(new QuestionExpired($expireQuestions));
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
