<?php

namespace App\Http\Controllers;

use App\Models\Add;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AddController extends Controller
{
    public function index()
    {

        $adds = Add::query()->orderBy('created_at', 'desc')->paginate(5);

        return view('adds.index', compact('adds'));

    }

    public function create(Add $id = null)
    {
        return view('adds.create');

    }

    public function save(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'min:1'],
            'description' => ['required', 'min:1']
        ]);

        Add::create(
            [
                'title' => $data['title'],
                'description' => $data['description'],
                'user_id' => Auth::user()->id,
            ]
        );

        return redirect()->route('home');
    }

    public function show(Request $request)
    {
        $add = Add::where('id', $request->route('id'))->firstOrFail();

        return view('adds.show', compact('add'));

    }

    public function edit(Request $request)
    {
        $add = Add::where('id', $request->route('id'))->firstOrFail();

        return view('adds.edit', compact('add'));
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'title' => ['required', 'min:1'],
            'description' => ['required', 'min:1']
        ]);

        Add::where('id', $id)->update([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);


        return redirect()->route('home');
    }

    public function destroy(Request $request)
    {
        Add::where('id', $request->route('id'))->delete();
        return redirect()->route('home');
    }
}
