<?php

namespace Modules\Device\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Modules\Device\Models\VerifyDevice;
use Modules\Device\Events\FlushExpiredCodeDeviceVerify;

class DeleteExpiredCodeVerifyDevice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'ondemium:flush-expired-code-verify-device';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

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
        $expiredCode = VerifyDevice::where('created_at', '<=', now()->subHours(2))->get();
        event(new FlushExpiredCodeDeviceVerify($expiredCode));
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
