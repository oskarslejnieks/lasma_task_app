<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use Carbon\Carbon;

class DeleteExpiredTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all tasks that has been expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tasks = Task::where('due_datetime', '<', Carbon::now())->get();
        foreach ($tasks as $task) {
            $task->delete();
        }
    }
}
