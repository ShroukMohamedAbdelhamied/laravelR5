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
       //return dd($request->all())
      $messages = $this->errMsg();

       $data = $request->validate([
        'clientname' => 'required|max:100|min:5',
        'phone' =>'required|min:11',
        'email' =>'required|email:rfc',
        'website'=>'required',
        'City'=>'required|max:30',
        'image'=>'required',
       ], $messages);

       $imgExt = $request->image->getClientOriginalExtension();
       $fileName = time() . '.' . $imgExt;
       $path = 'assets/images';
       $request->image->move($path, $fileName);

       $data['image'] = $fileName;

       $data['active'] = isset($request->active);
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

    $client = Client::findOrFail($id);
    $client->update($data);
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

    /**
     * ForceDelete
     */
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
// Error Custom Messages
public function errMsg(){
return [
    'clientname.required' => 'The Client name is missed, Please Insert',
    'clientname.min' => 'length less than 5, Please Insert More Chars',
    'City' => 'Select a city from the following:',
];
}
}