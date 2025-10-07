<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

final class ContactService
{
    public function list(Request $request): LengthAwarePaginator
    {
        $name = $request->name;
        $document = $request->document;
        $email = $request->email;

        return Contact::select('id', 'name', 'created_at', 'document', 'email', 'message', 'phone')
            ->when($name, fn ($query) => $query->where('name', 'like', "%{$name}%"))
            ->when($document, fn ($query) => $query->where('document', 'like', "%{$document}%"))
            ->when($email, fn ($query) => $query->where('email', 'like', "%{$email}%"))
            ->orderBy('created_at', 'DESC')
            ->paginate(25);
    }

    public function store(Request $request): void
    {
        $record = new Contact();
        $record->name = $request->name;
        $record->document = $request->document;
        $record->phone = $request->phone;
        $record->email = $request->email;
        $record->message = $request->message;
        $record->save();
    }
}
