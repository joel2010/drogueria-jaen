<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComplaintBookRequest;
use App\Mail\ComplaintBookMail;
use App\Mail\ContactMail;
use App\Models\LandingPage;
use App\Services\ComplaintBookService;
use App\Services\ContactService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function index()
    {
        $banners = LandingPage::with(['computer', 'mobile'])
            ->select('title', 'id')
            ->orderBy('order')
            ->get();
        $mainProducts = (new ProductService())->main();

        return view('home.index', compact('banners', 'mainProducts'));
    }
    
    public function about()
    {
        $mainProducts = (new ProductService())->main();

        return view('about.index', compact('mainProducts'));
    }
    public function services()
    {
        return view('services.index');
    }

    public function homeCare()
    {
        $mainProducts = (new ProductService())->main();

        return view('home-care.index', compact('mainProducts'));
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'max:200',
            ],
            'document' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    $length = strlen($value);
                    if (!in_array($length, [8, 11])) {
                        $fail('El campo ' . $attribute . ' debe tener 8 o 11 dígitos.');
                    }
                },
            ],
            'phone' => [
                'required',
                'digits_between:7,15',
            ],
            'email' => [
                'required',
                'max:200',
                'email',
            ],
            'message' => [
                'required',
                'max:500',
            ],
        ], [], [
            'name' => 'nombre',
            'phone' => 'teléfono',
            'document' => 'número de documento',
            'email' => 'correo electrónico',
            'message' => 'mensaje',
        ]);

        (new ContactService())->store($request);
        Mail::to(config('mail.to.email'))->send(new ContactMail($request->all()));

        return redirect()->back()->with('ok', '1');
    }

    public function complaintsBookStore(ComplaintBookRequest $request)
    {
        (new ComplaintBookService())->store($request->validated());
        $data = $request->except('files');
        $files = $request->hasFile('files') ? $request->file('files') : [];
        Mail::to(config('mail.to.email'))->send(new ComplaintBookMail($data, $files));
        return redirect()->back()->with('ok', '1');
    }
}
