<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
    	return 'list user on controller';
    }
    public function create()
    {
    	return view('backend.user.create');
    }
    public function store(Request $request)
    {
    	// dd giống var_dum()
    	dd(__METHOD__,$request->all());
    }
    public function update(Request $rq)
    {
    	dd(__METHOD__,$rq->all());
    }
}
