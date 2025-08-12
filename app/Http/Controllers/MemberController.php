<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::orderBy('id','desc')->paginate(10);
        return view('home', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'age' => 'required|integer|between:1,120',
            'phone' => 'required|string',
            'address' => 'required|string',
            'professional_summary' => 'nullable|string'
        ]);
        Member::create($validated);
        return redirect()->route('home')->with('success','Member created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        logger('Update method called for member id: ' . $member->id);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'age' => 'required|integer|between:1,120',
            'phone' => 'required|string|max:50',
            'address' => 'required|string',
        ]);

        $member->update($validated);

        logger('Member updated');

        return redirect()->route('home')->with('success','Member updated successfully.');

        // $member->update($validated);
        // return redirect()->route('home')->with('success','Member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */// Show the confirmation page
     public function destroyConfirm(Member $member)
     {
         return view('members.destroy', compact('member'));
     }
     
     // Actually delete the member
     public function destroy(Member $member)
     {
         $member->delete();
         return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
     }
}
