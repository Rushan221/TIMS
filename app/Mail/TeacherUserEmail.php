<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TeacherUserEmail extends Mailable
{   
    protected $teacher;
    protected $teacherPassword;    
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($teacher,$teacherPassword)
    {
        $this->teacher = $teacher;
        $this->teacherPassword = $teacherPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.teacherUserMail')->with([
            'teacher'=>$this->teacher,
            'teacherPassword'=>$this->teacherPassword
        ]);
    }
}
