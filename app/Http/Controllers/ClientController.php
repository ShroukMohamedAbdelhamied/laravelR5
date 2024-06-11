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
        $clients = Client::with('city')->get();
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
            'city' => 'required|in:Cairo,Giza,Alex',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];

        // Validate the input
        $data = $request->validate($rules, $messages);
    
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
        //$client = Client::with('city')->findOrFail($id);
        $client = Client::findOrFail($id);
        return view('showClient', compact('client'));
    }

    // Other methods...

    /**
     * Error Custom Messages
     */
    public function errMsg()
    {
        return [
            'clientname.required' => 'The Client name is missing, please insert it.',
            'clientname.min' => 'The Client name should be at least 5 characters long.',
            'city' => 'Select a city from the following: Cairo, Giza, Alex.', // Updated message for city
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
