<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Traits\UploudFile;

class ClientController extends Controller
{
    use UploudFile;

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
        // Validation rules
        $messages = $this->errMsg();
        $rules = [
            'clientname' => 'required|max:100|min:5',
            'phone' => 'required|min:11',
            'email' => 'required|email:rfc',
            'website' => 'required',
            'City' => 'required|in:Cairo,Giza,Alex',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];

        // Validate the input
        $data = $request->validate($rules, $messages);
    
        // Get the client record
    $client = Client::findOrFail($id);

// Handle the file upload
if ($request->hasFile('image')) {
    $image = $request->file('image');
    // Log file details for debugging
    \Log::info('Uploaded file details:', [
        'Original Name' => $image->getClientOriginalName(),
        'Size' => $image->getSize(),
        'Mime Type' => $image->getMimeType(),
        'Extension' => $image->getClientOriginalExtension(),
    ]);
    // Handle image upload
    $fileName = $this->upload($request->image, 'assets/newFolder');
    $data['image'] = $fileName;
}

        // Set the active status
        $data['active'] = isset($request->active);

        // Create the new client record
        Client::create($data);

        // Redirect to the clients page
        return redirect('Clients');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::with('city')->findOrFail($id);
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

    public function update(Request $request, string $id)
    {
        // Validation rules
        $messages = $this->errMsg();
        $rules = [
            'clientname' => 'required|max:100|min:5',
            'phone' => 'required|min:11',
            'email' => 'required|email:rfc',
            'website' => 'required',
            'City' => 'required|in:Cairo,Giza,Alex',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    
        // Validate the input
        $data = $request->validate($rules, $messages);
    
        // Get the client record
        $client = Client::findOrFail($id);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Validate image
            $validated = $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            // Handle image upload
            //$fileName = time() . '.' . $image->getClientOriginalExtension();
            //$image->move(public_path('assets/images'), $fileName);
            // Update data with new image file name
            $fileName = $this->upload($request->image, 'assets/newFolder');
            $data['image'] = $fileName;
        }
    
        // Set the active status
        $data['active'] = isset($request->active);
    
        // Update the client record
        $client->update($data);
    
        // Redirect to the clients page
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
    public function errMsg()
    {
        return [
            'clientname.required' => 'The Client name is missing, please insert it.',
            'clientname.min' => 'The Client name should be at least 5 characters long.',
            'City' => 'Select a city from the following: Cairo, Giza, Alex.',
            'image.image' => 'The file you have chosen is not a valid image.',
            'image.mimes' => 'The file extension is not one of the specified types (jpeg, png, jpg, gif, svg).',
        ];
    }

    /**
     * Method to handle image upload
     */
    private function handleImageUpload(Request $request, $client = null)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Log file details for debugging
            \Log::info('Uploaded file details:', [
                'Original Name' => $image->getClientOriginalName(),
                'Size' => $image->getSize(),
                'Mime Type' => $image->getMimeType(),
                'Extension' => $image->getClientOriginalExtension(),
            ]);
            // Handle the upload logic here
        }
    }
}
