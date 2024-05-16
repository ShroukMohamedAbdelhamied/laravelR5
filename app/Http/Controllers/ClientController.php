<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use DB;

class ClientController extends Controller
{
    private $columns = ['clientname', 'phone', 'email', 'website'];
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
            $clients = Client::get();
            return view('clients', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addClient');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //    $client=new Client();
    //    $client->clientname=$request->input('clientname');
    //   $client->phone=$request->input('phone');
    //   $client->email=$request->input('email');
    //    $client->website=$request->input('website');
       //$client->save();
       $data = $request->validate([
        'clientname' => 'required|max:100|min:5',
        'phone' =>'required|min:11',
        'email' =>'required|email:rfc',
        'website'=>'required',
       ]);
       Client::create($data);
       return redirect('Clients');
       //return view('clients');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::findOrFail($id);
        return view('showClient', compact('client'));    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) 
    {
        $client = Client::findOrFail($id);
        return view('editClient', compact('client'));
    }

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    $data = $request->validate([
        'clientname' => 'required|max:100|min:5',
        'phone' =>'required|min:11',
        'email' =>'required|email:rfc',
        'website'=>'required',
    ]);

    Client::where('id', $id)->update($data);
    return redirect('Clients');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Client::where('id', $id)->delete();
        return redirect('Clients');
    }
    public function forceDelete(Request $request)
    {
        $id = $request->id;
        Client::where('id', $id)->forceDelete();
        return redirect('trashClient');
    }
// Trash
public function trash()
{
$trashed = Client::onlyTrashed()->get();
return view('trashClient', compact('trashed'));
}
// Restore
public function restore(string $id)
{
    Client::where('id', $id)->restore();
    return redirect('Clients');
}
}