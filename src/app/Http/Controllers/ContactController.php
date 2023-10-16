<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name','first_name','gender','email','zip11','addr11','address2','content']);

        return view('confirm',compact('contact'));
    }

    public function store(Request $request)
    {
        $contact = $request->only(['last_name','first_name','gender','email','zip11','addr11','address2','content']);
        Contact::create($contact);

        return view('thanks');
    }

    public function find()
    {
        $contacts = Contact::Paginate(5);

        return view('find', compact('contacts'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();

        return redirect('/search');
    }

    public function search(Request $request)
    {
        $contacts = Contact::all()->NameSearch($request->name)->GenderSearch($request->gender)->FromDateSearch($request->from_date)->ToDateSearch($request->to_date)->EmailSearch($request->email)->get();

        return view('find', compact('contacts'));
    }

}
