<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index(Request $request)
    {
        $search     = trim((string) $request->query('search', ''));
        $categoryId = $request->query('category_id');
        $status     = $request->query('status');

        $query = Equipment::with('category');

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('asset_code', 'like', "%{$search}%")
                  ->orWhere('specification', 'like', "%{$search}%");
            });
        }

        if (!empty($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        if (!empty($status) && $status !== 'semua') {
            $query->where('status', $status);
        }

        $equipments = $query->orderByDesc('id')
            ->paginate(5)
            ->appends($request->query());

        $categories = Category::orderBy('id')->get();

        return view('equipments.index', compact('equipments', 'categories', 'search', 'categoryId', 'status'));
    }

    public function create() {}
    public function store(Request $request) {}
    public function show($id) {}
}