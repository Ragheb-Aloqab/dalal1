<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'web_icon' => 'nullable|string',
            'apk_icon' => 'nullable|string',
            'link' => 'nullable|string|max:255',
        ]);

        Contact::create($request->all());

        return redirect()->route('admin.contacts.index')->with('success', 'تم إنشاء جهة الاتصال بنجاح.');
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'web_icon' => 'nullable|string|max:255',
            'apk_icon' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
        ]);

        $contact->update($request->all());

        return redirect()->route('admin.contacts.index')->with('success', 'تم تحديث جهة الاتصال بنجاح.');
    }


    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'تم حذف جهة الاتصال بنجاح.');
    }
}
