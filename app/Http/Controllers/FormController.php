<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Http;



class FormController extends Controller
{

    public function create()
    {
        return view('create');
    }

public function store(Request $request)
{
    $request->validate([
        'number' => 'required|numeric',
        'joint_piece' => 'image|mimes:jpeg,web,png,jpg,gif,svg|max:2048',
    ]);

    $form = new Form([
        'name' => $request->name,
        'number' => $request->number,
    ]);

    if ($request->hasFile('joint_piece')) {
        $piecePath = $request->file('joint_piece')->store('images', 'public');
        $form->joint_piece = $piecePath;
    }

    $form->save();  // Saving input data

    $image = asset('storage/' . $form->joint_piece);



    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://graph.facebook.com/v19.0/246754498512181/messages',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode([
    "messaging_product" => "whatsapp",
    "recipient_type" => "individual",
    "to" => $form->number,
    "type" => "image",
    "image" => [
        "link" => $image
    ],
]),

        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer EAAE8EXMyiysBOwE9u6ijA52zlSZBTZCkqBNqqLvBic1wMMh6XS3ZCpCEq9vOTYEbGgZAdaTYfqw8l9OC2A70KuuQepzTViLW9MQOMfTd1rwjlzMT8Lg8sJNJbtbdtrOiSwLpzByu4pMOfGI0NS87Srm5PwCrYFdTZAo9j3TgScLg43qHSE51hG9GIkQtU1o9n393DQfQUPZCuyYv8ZBs80ZD',
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);



    curl_close($curl);

    if ($response !== false) {
        $form->update(['status' => 'message envoyé']);
    } else {
        $form->update(['status' => 'message non envoyé']);
    }

    //dd($image);

    return redirect()->route('list');
}


    public function list()
    {
        $forms = Form::all();

        return view('list',)->with('forms',$forms);
    }

}
