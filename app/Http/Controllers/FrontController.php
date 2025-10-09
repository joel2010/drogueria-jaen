<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComplaintBookRequest;
use App\Http\Resources\BrandListResource;
use App\Http\Resources\CategoryListResource;
use App\Http\Resources\LandingPageListResource;
use App\Http\Resources\ProductListResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductsListFrontResource;
use App\Http\Resources\SpecialtyListResource;
use App\Http\Resources\TypeListResource;
use App\Mail\ComplaintBookMail;
use App\Mail\ContactMail;
use App\Models\LandingPage;
use App\Models\Product;
use App\Services\BrandService;
use App\Services\CategoryService;
use App\Services\ComplaintBookService;
use App\Services\ContactService;
use App\Services\ProductService;
use App\Services\SpecialtyService;
use App\Services\TypeService;
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
    
    public function products(Request $request)
    {
        if ($request->ajax()) {
            $data = (new ProductService())->listForFront($request);
            return ProductsListFrontResource::collection($data);
        }
        $mainProducts = (new ProductService())->main();
        $types = (new TypeService())->availables();
        $categories = (new CategoryService())->availables();
        $specialties = (new SpecialtyService())->availables();
        $brands = (new BrandService())->availables();

        return view('products.index', compact('mainProducts', 'types', 'categories', 'specialties', 'brands'));
    }

    public function productDetails(string $slug)
    {
        $mainProducts = (new ProductService())->main();
        $record = Product::where('slug', $slug)
            ->where('active', true)
            ->first();
        if (!$record) {
            return redirect()->to('/');
        }

        return view('products.detail', compact('record', 'mainProducts'));
    }

    public function complaintsBook()
    {
        return view('complaints-book.index');
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
