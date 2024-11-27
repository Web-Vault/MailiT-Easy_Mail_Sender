<?php

namespace App\Http\Controllers;

use App\Models\application;
use Illuminate\Http\Request;
use App\Models\Applicant;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MailiTController extends Controller
{
    public function send_mail(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'company_email' => 'required|email',
        ]);

        $user = Applicant::where('id', session('user_id'))->first();

        $filename = $user->user_resume;



        $send_mail = new application();

        $email = session('user_email');
        $data = array('company_name' => $request->company_name, 'company_email' => $request->company_email, 'user_name' => $user->user_name, 'email' => $email, 'resume' => $filename);

        Mail::send('mail_format', ["data1" => $data], function ($message) use ($data) {
            $message->to($data['company_email']);
            $message->subject('Internship Application');
            $message->from("aryanlathigara@gmail.com", "Aryan Soni");

            $filePath = public_path('resume/' . $data['resume']);

            if (file_exists($filePath)) {
                $message->attach($filePath);
            }
        });

        $send_mail->company_name = $request->company_name;
        $send_mail->company_email = $request->company_email;
        $send_mail->user_resume = $filename;
        $send_mail->user_id = $user->id;

        $send_mail->save();

        return redirect()->route('index');

    }

    public function remove_resume() {
        $uid = session('user_id'); 
    
        $user = Applicant::find($uid); 
    
        if ($user && !empty($user->user_resume)) {
            $filePath = public_path('resume/' . $user->user_resume);
    
            if (file_exists($filePath)) {
                unlink($filePath);
            }
    
            $user->user_resume = null;
            $user->save(); 
        }
    
        return redirect()->route('index')->with('success', 'Resume removed successfully.');
    }
    
    public function upload_resume(Request $request)
    {
        $request->validate([
            'resume' => 'required|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $filename = $file->getClientOriginalName();

            $file->move(public_path('resume'), $filename);

            $user = Applicant::where('id', session('user_id'))->first();
            if ($user) {
                $user->user_resume = $filename;
                $user->save();

                return redirect()->route('index')->with('success', 'Resume uploaded successfully.');
            } else {
                return redirect()->back()->with('error', 'User not found.');
            }
        }

        return back()->with('error', 'Failed to upload resume. Please try again.');
    }


    public function logout()
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login');
    }

    public function index()
    {

        $user_id = session('user_id');

        $user = Applicant::where('id', $user_id)->first();

        $company = application::where('user_id', $user_id)->get();

        return view('index', compact('user', 'company'));
    }

    public function indexLogin(Request $request)
    {
        $request->validate([
            'loginEmail' => 'required|email',
            'loginPassword' => 'required',
        ], [
            'loginEmail.required' => 'Please enter your email.',
            'loginEmail.email' => 'Please enter a valid email.',
            'loginPassword.required' => 'Please enter your password.',
        ]);

        $user = Applicant::where('user_email', $request->loginEmail)->first();

        if ($user && $request->loginPassword) {
            session(['user_email' => $user->user_email]);
            session(['user_id' => $user->id]);

            return redirect()->route('index');
        }

        return back()->withErrors(['error' => 'Invalid email or password.'])->withInput();
    }

    public function indexSignup(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:applicants,user_email',
            'password' => 'required|min:8',
        ], [
            'fullname.required' => 'Full Name must be entered!',
            'fullname.string' => 'Name cannot contain numbers or special characters!',
            'email.unique' => 'A user with this email already exists.',
        ]);

        $newUser = new Applicant();
        $newUser->user_name = $request->fullname;
        $newUser->user_email = $request->email;
        $newUser->user_password = $request->password;

        if ($newUser->save()) {
            return redirect()->route('login')->with('success', 'Account created successfully! Please login.');
        } else {
            return redirect()->route('login');
        }

    }
}
