<?php

namespace App\Jobs;

use App\Mail\TeacherUserEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendTeacherUserEmail implements ShouldQueue
{   protected $teacher;
    protected $teacherPassword;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($teacher,$teacherPassword)
    {
        $this->teacher = $teacher;
        $this->teacherPassword = $teacherPassword;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new TeacherUserEmail($this->teacher, $this->teacherPassword);
        Mail::to($this->teacher->email)->send($email);
    }
}
