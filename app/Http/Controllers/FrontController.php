<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComplaintBookRequest;
use App\Http\Resources\BrandListResource;
use App\Http\Resources\CategoryListResource;
use App\Http\Resources\LandingPageListResource;
use App\Http\Resources\ProductListResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SpecialtyListResource;
use App\Http\Resources\TypeListResource;
use App\Mail\ComplaintBookMail;
use App\Mail\ContactMail;
use App\Services\BrandService;
use App\Services\CategoryService;
use App\Services\ComplaintBookService;
use App\Services\ContactService;
use App\Services\LandingPageService;
use App\Services\ProductService;
use App\Services\SpecialtyService;
use App\Services\TypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function __construct(
        protected  LandingPageService   $landingPageService,
        protected  BrandService         $brandService,
        protected  SpecialtyService     $specialtyService,
        protected  CategoryService      $categoryService,
        protected  ProductService       $productService,
        protected  TypeService          $typeService,
    ) {}

    public function home()
    {
        $data = $this->landingPageService->listFront();
        $landingPage = LandingPageListResource::collection($data)->resolve();
        return view('home.index', compact('landingPage'));
    }

    public function about()
    {
        $data = $this->landingPageService->listFront();
        $landingPage = LandingPageListResource::collection($data)->resolve();
        return view('about.index', compact('landingPage'));
    }

    public function contact()
    {
        return view('contact.index');
    }

    public function services()
    {
        return view('services.index');
    }

    public function homeCare()
    {
        $data = $this->landingPageService->listFront();
        $landingPage = LandingPageListResource::collection($data)->resolve();
        return view('home-care.index', compact('landingPage'));
    }

    public function products(Request $request)
    {
        $categories  = CategoryListResource::collection($this->categoryService->listFront())->resolve();
        $brands      = BrandListResource::collection($this->brandService->listFront())->resolve();
        $types       = TypeListResource::collection($this->typeService->listFront())->resolve();
        $specialties = SpecialtyListResource::collection($this->specialtyService->listFront())->resolve();

        return view('products.index', compact('products', 'categories', 'brands', 'types', 'specialties'));
    }

    public function productDetail($id)
    {
        $data           = $this->landingPageService->listFront();
        $landingPage    = LandingPageListResource::collection($data)->resolve();
        $product        = new ProductResource($this->productService->showId($id))->resolve();
        return view('products.detail', compact('product', 'landingPage'));
    }

    public function complaintsBook()
    {
        return view('complaints-book.index');
    }

    public function listProducts(Request $request)
    {
        $search  = $request->input('search');
        $filters = $request->only(['category_id', 'brand_id', 'type_id', 'specialty_id']);

        $perPage = (int) $request->input('per_page', 10);
        $sortDirection = $request->input('sort_direction', 'desc');

        $products = $this->productService->list($search, $filters, $perPage, $sortDirection);

        return ProductListResource::collection($products);
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
