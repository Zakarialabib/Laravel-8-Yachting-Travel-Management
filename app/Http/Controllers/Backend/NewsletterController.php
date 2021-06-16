<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Mail;
use App\Models\Emailsetting;
use App\Models\User;
use App\Models\Setting;
use App\Models\Language;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use nilsenj\Toastr\Facades\Toastr;

class NewsletterController extends Controller
{

    public function newsletter(Request $request){
        
        $newsletters = Newsletter::orderBy('id', 'DESC')->get();

        return view('pages.backend.newsletter.index', compact('newsletters'));
    }

    // Add newsletter Category
    public function add(){
        return view('pages.backend.newsletter.add');
    }

    // Store newsletter Email
    public function store(Request $request){
        

        $request->validate([
            'email' => 'required|max:150',
        ]);

        Newsletter::create($request->all());
 
        return redirect()->back();
    }

    // newsletter Email Delete
    public function delete($id){

        $newsletter = Newsletter::find($id);
        $newsletter->delete();

        Toastr::warning("Email Ajoutée avec succès !");

        return back();
    }

    // newsletter Category Edit
    public function edit($id){

        $newsletter = Newsletter::find($id);
        return view('pages.backend.newsletter.edit', compact('newsletter'));

    }

    // Update newsletter Category
    public function update(Request $request, $id){

        $id = $request->id;
         $request->validate([
            'email' => 'required|max:150',
        ]);

        $newsletter = Newsletter::find($id);
        $newsletter->update($request->all());

        Toastr::warning("Email Mise à jour avec succès !");
      
        return redirect(route('admin.newsletter'));
    }


    public function mailsubscriber() {
        return view('pages.backend.newsletter.mail');
      }

  
    public function subscsendmail(Request $request) {
        $request->validate([
          'subject' => 'required',
          'content_message' => 'required'
        ]);
  
        $sub = $request->subject;
        $msg = $request->content_message;
        $users = Newsletter::all();
        foreach ($users as $user){
            Mail::send('pages.backend.newsletter.test', ['subject'=>$sub, 'content'=>$msg, 'user'=>$user],
             function($message) use ($user){
                $message->to($user->email)->from('no_reply@rentacstours.com','Rentacs Tours')
                ->subject('Rentacs Tours');
             });
        }

        Toastr::succes("Email à jour avec succès !");


        return redirect(route('admin.newsletter'));
      }


}