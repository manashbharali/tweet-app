<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Author;


class AuthorsController extends Controller
{
    public function store()
    {
        $author = Author::create($this->validateRequest());
        return redirect('/');
    }

    public function validateRequest()
    {
        return request()->validate([
            'name' =>'required',
            'email' =>'required',
            'bio' => 'required',
        ]);
    }
}
