<?php

namespace App\Http\Controllers;

use App\Models\PetType;
use App\Search\FindService;
use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    public function __construct(protected FindService $searchService) {}

    public function index()
    {
        return view("pets.index", array(
            'pets' => Pet::with('type')
                ->orderBy("created_at","desc")
                ->get(),
            'highlight' => false
        ));
    }

    public function create()
    {
        return view("pets.create", array('types' => PetType::all(), 'highlight' => false));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $type = PetType::where('type', $input['type'])->first();
        Pet::create([
            'name'          => $input['name'],
            'description'   => $input['description'],
            'type_id'          => $type->id,
        ]);

        return redirect()->route('pets.index');
    }

    public function search()
    {
        return view('pets.search', array('types' => PetType::all()));
    }

    public function find(Request $request)
    {
        $input = $request->all();
        $searchSerivce = $this->searchService;
        $pets = $searchSerivce($input);
        return view('pets.index', array(
            'pets' => $pets->sortBy('created_at')->reverse(),
            'highlight' => $input['name'] ?? false
        ));
    }
}
