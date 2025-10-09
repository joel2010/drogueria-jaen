<?php

namespace App\Services;

use App\Models\LandingPage;
use Illuminate\Http\Request;

final class LandingPageService
{

    public function list()
    {
        return LandingPage::orderBy('order', 'asc')
            ->get();
    }

    public function showId($id): LandingPage
    {
        $record = LandingPage::find($id);

        if (!$record) {
            throw new \Exception("El registro seleccionado no existe", 500);
        }

        return $record;
    }

    public function fillModel(LandingPage $record, Request $data): LandingPage
    {
        $record->title        = $data->title;
        $record->order  = $data->order ?? (LandingPage::max('order') ?? 0) + 1;

        return $record;
    }

    public function store(Request $data): LandingPage
    {
        $record = $this->fillModel(new LandingPage(), $data);
        $record->save();

        return $record;
    }

    public function update(string $id, Request $data): ?LandingPage
    {
        $landingPage = LandingPage::find($id);
        if (!$landingPage) {
            return null;
        }

        $this->fillModel($landingPage, $data)->save();

        return $landingPage;
    }

    public function delete($id)
    {
        $landingPage = LandingPage::find($id);
        if ($landingPage) {
            $landingPage->delete();
            return true;
        }
        return false;
    }
}
