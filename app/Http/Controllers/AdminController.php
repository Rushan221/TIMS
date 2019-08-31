<?php

namespace App\Http\Controllers;

use App\Jobs\SendTeacherUserEmail;
use App\Teacher;
use App\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function addAsUser($id)
    {
        $teacher = Teacher::whereId($id)->first();
        $teacherPassword = (strtolower(str_random(7)));

        $addUser = $this->addToUser($teacher, $teacherPassword);

        if ($addUser) {
            return redirect()->route('admin.teachers.index')->with('success', 'The login credentials have been sent to respective Email.');
        } else {
            return redirect()->route('admin.teachers.index')->with('warning', 'Sorry, there was some problem. Try again!');
        }

    }

    protected function addToUser($teacher, $teacherPassword)
    {
        return DB::transaction(function () use (&$teacher, $teacherPassword) {
            //transaction
            DB::beginTransaction();
            try {
                $user = User::create([
                    'name' => $teacher->name,
                    'email' => $teacher->email,
                    'password' => bcrypt($teacherPassword),
                ]);
                $latestUserId = User::orderBy('created_at', 'DESC')->value('id');
                Teacher::whereId($teacher->id)->update([
                    'user_id' => $latestUserId,
                ]);
            } catch (\Throwable $th) {
                DB::rollback();
                throw $th;
            }
            DB::commit();
            dispatch(new SendTeacherUserEmail($teacher,$teacherPassword));
            return $user;
        });
    }
}
