<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.index')->with('clients', Client::all());
    }

    /**
     * Show new form for creating a client
     */
    public function new(){
        return view('client.new');
    }

    /**
     * Post function to create a client
     */
    public function create(Request $data)
    {
        Client::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'phoneNumber' => $data['phoneNumber'],
            'glueAllergy' => $data->input('glueAllergy') == 'on'
        ]);


        return redirect('clients');
    }

    /**
     * Show the form to edit a client
     */
    public function edit($id){
        $client = Client::with('bills')->where('id', $id)->get();

        $client['numberOfReferClient'] = Client::where('idReferringClient', $id)
            ->count();

        return view('client.edit')
            ->with('client', $client);
    }

    /**
     * Post function to edit a client
     */
    public function editPost(Request $data){
        $client = Client::where('id', $data['id'])->first();

        if($client != null) {
            $client->firstName = $data['firstName'];
            $client->lastName = $data['lastName'];
            $client->phoneNumber = $data['phoneNumber'];
            $client->glueAllergy = $data->input('glueAllergy') == 'on';
            $client->style = $data->get('style');
            $client->curve = $data->get('curve');
            $client->eyelashNote = $data['eyelashNote'];
            $client->idReferringClient = $data['idReferringClient'];
            $client->save();
        }
        else{
            // todo return error 502 .. return redirect('')
        }

        return redirect('clients');

    }

    public function getInformations($id)
    {
        return Client::where('id', $id)->first();
    }

    public function searchClientsByName($id)
    {
        $clients = Client::where('firstName', 'like', '%' . $id . '%')
            ->orWhere('lastName', 'like', '%' . $id . '%')
            ->get();

        return $clients;
    }
}

