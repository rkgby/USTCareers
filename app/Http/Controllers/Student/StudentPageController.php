<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Student;
use App\Submission;
use App\Summary;
use Auth;
use Hash;
use Illuminate\Support\Facades\Session;

class StudentPageController extends Controller
{
    public function index()
    {
    $student = Student::where('user_id', 'LIKE', Auth::user()->id)->get();
    return view('student.index', compact('student'));
    }

    public function resume()
    {
    $student = Student::where('user_id', 'LIKE', Auth::user()->id)->get();
    $submissions = Submission::where('emailadd', 'LIKE', Auth::user()->email)->get();
    $evaluated = Submission::withTrashed()->where('emailadd', Auth::user()->email)->get();
    $i = 0;
    return view('student.resume', compact('student','resumes','evaluated','i'));
    }
    public function password()
    {
    $userId = Auth::id();
    $student = Student::where('user_id', 'LIKE', Auth::user()->id)->get();
    $user = User::findOrFail($userId);
    return view('student.password', compact('student', 'user','userId'));
    }
    public function changepass(Request $request)
    {
        $request->validate([
            'password' => 'confirmed|min:8',
        ]);

        $input['password'] = bcrypt($request->password);
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        if(Hash::check($request->curpass, $user->password) ){
            $user->update($input);
        }
        else{
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'match' => ['Current password does not match'],
             ]);
             throw $error;
        }   
        Session::flash('success', 'You successfully updated your password');
        return redirect('/student');
    }
    public function summary($id)
    {
        $student = Student::where('user_id', 'LIKE', Auth::user()->id)->get();
        $users = User::where('id', Auth::user()->id)->get();
        $summary = Summary::findOrFail($id);
        $contact1 = trim($summary->contact_info_1, '[]"');
        $contact2 = trim($summary->contact_info_2, '[]"');
        $contact3 = trim($summary->contact_info_3, '[]"');
        $contact_comment = $summary->contact_info_comment;
        $educ1 = trim($summary->education_1, '[]"');
        $educ2 = trim($summary->education_1, '[]"');
        $educ3 = trim($summary->education_1, '[]"');
        $educ_comment = $summary->education_comment;
        $experience1 = trim($summary->experience_1, '[]"');
        $experience2 = trim($summary->experience_2, '[]"');
        $experience3 = trim($summary->experience_3, '[]"');
        $experience_comment = $summary->experience_comment;
        $involvement1 = trim($summary->involvement_1, '[]"');
        $involvement2 = trim($summary->involvement_2, '[]"');
        $involvement3 = trim($summary->involvement_3, '[]"');
        $involvement_comment = $summary->involvement_comment;
        $visual1 = trim($summary->visual_1, '[]"');
        $visual2 = trim($summary->visual_2, '[]"');
        $visual3 = trim($summary->visual_3, '[]"');
        $visual_comment = $summary->visual_comment;
        $organization1 = trim($summary->organization_1, '[]"');
        $organization2 = trim($summary->organization_2, '[]"');
        $organization3 = trim($summary->organization_3, '[]"');
        $organization_comment = $summary->organization_comment;
        $grammar1 = trim($summary->grammar_1, '[]"');
        $grammar2 = trim($summary->grammar_2, '[]"');
        $grammar3 = trim($summary->grammar_3, '[]"');
        $grammar_comment = $summary->grammar_comment;
        return view('student.summary', compact('contact1','contact2','contact3','contact_comment','educ1','educ2','educ3','educ_comment','experience1',
                    'experience2', 'experience3', 'experience_comment','involvement1', 'involvement2', 'involvement3', 'involvement_comment','visual1', 'visual2',
                    'visual3', 'visual_comment', 'organization1', 'organization2', 'organization3', 'organization_comment', 'grammar1', 'grammar2', 'grammar3',
                    'grammar_comment', 'users','student'));
    }
}
