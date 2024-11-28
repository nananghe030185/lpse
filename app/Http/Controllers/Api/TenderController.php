<?php

namespace App\Http\Controllers\Api;

use App\ApiTender;
use App\Http\Controllers\Controller;
use App\Livewire\Forms\LoginForm;
use App\Models\Lpse;
use App\Models\Outbox;
use App\Models\Tender;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;



class TenderController extends Controller
{
    protected $result;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return dump(User::where(['group_id' => '2', 'state' => true])->orWhere(['group_id' => '3', 'state' => true])->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        ApiTender::execute();

        return redirect(route('tender.index'));
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
