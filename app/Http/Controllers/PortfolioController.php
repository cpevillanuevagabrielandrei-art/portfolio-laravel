<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Setting;
use App\Models\SkillCategory;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $settings = Setting::getAll();
        $skillCategories = SkillCategory::with(['skills' => function ($q) {
            $q->where('is_active', true)->orderBy('sort_order');
        }])->orderBy('sort_order')->get();
        $projects = Project::where('is_active', true)->orderBy('sort_order')->get();

        return view('portfolio.index', compact('settings', 'skillCategories', 'projects'));
    }

    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Your message has been sent! I\'ll get back to you soon.');
    }
}
