<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\SkillCategory;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // ===================== DASHBOARD =====================

    public function dashboard()
    {
        $stats = [
            'projects'  => Project::count(),
            'skills'    => Skill::count(),
            'messages'  => ContactMessage::count(),
            'unread'    => ContactMessage::where('is_read', false)->count(),
        ];
        $recentMessages = ContactMessage::latest()->take(5)->get();
        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }

    // ===================== SETTINGS =====================

    public function settings()
    {
        $settings = Setting::getAll();
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $fields = [
            'name',
            'title',
            'subtitle',
            'about_text',
            'experience_years',
            'education',
            'email',
            'linkedin_url',
            'github_url',
            'resume_url',
            'profile_pic',
            'about_pic',
        ];

        foreach ($fields as $field) {
            if ($field === 'profile_pic' || $field === 'about_pic') {
                if ($request->hasFile($field)) {
                    $path = $request->file($field)->store('images', 'public');
                    Setting::set($field, $path);
                }
            } else {
                Setting::set($field, $request->input($field, ''));
            }
        }

        return back()->with('success', 'Settings updated successfully!');
    }

    // ===================== PROJECTS =====================

    public function projects()
    {
        $projects = Project::orderBy('sort_order')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function createProject()
    {
        return view('admin.projects.create');
    }

    public function storeProject(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'github_url'  => 'nullable|url',
            'live_url'    => 'nullable|url',
            'sort_order'  => 'integer',
            'is_active'   => 'boolean',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', true);
        Project::create($validated);

        return redirect()->route('admin.projects')->with('success', 'Project created!');
    }

    public function editProject(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function updateProject(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'github_url'  => 'nullable|url',
            'live_url'    => 'nullable|url',
            'sort_order'  => 'integer',
            'is_active'   => 'boolean',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) Storage::disk('public')->delete($project->image);
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', true);
        $project->update($validated);

        return redirect()->route('admin.projects')->with('success', 'Project updated!');
    }

    public function destroyProject(Project $project)
    {
        if ($project->image) Storage::disk('public')->delete($project->image);
        $project->delete();
        return back()->with('success', 'Project deleted!');
    }

    // ===================== SKILLS =====================

    public function skills()
    {
        $categories = SkillCategory::with('skills')->orderBy('sort_order')->get();
        return view('admin.skills.index', compact('categories'));
    }

    public function storeSkillCategory(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        SkillCategory::create([
            'name' => $request->name,
            'sort_order' => SkillCategory::max('sort_order') + 1,
        ]);
        return back()->with('success', 'Category added!');
    }

    public function updateSkillCategory(Request $request, SkillCategory $category)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $category->update(['name' => $request->name]);
        return back()->with('success', 'Category updated!');
    }

    public function destroySkillCategory(SkillCategory $category)
    {
        $category->delete();
        return back()->with('success', 'Category deleted!');
    }

    public function storeSkill(Request $request)
    {
        $request->validate([
            'skill_category_id' => 'required|exists:skill_categories,id',
            'name'  => 'required|string|max:255',
            'level' => 'required|in:Basic,Intermediate,Experienced',
        ]);

        Skill::create([
            'skill_category_id' => $request->skill_category_id,
            'name'       => $request->name,
            'level'      => $request->level,
            'sort_order' => Skill::where('skill_category_id', $request->skill_category_id)->max('sort_order') + 1,
        ]);

        return back()->with('success', 'Skill added!');
    }

    public function updateSkill(Request $request, Skill $skill)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'level' => 'required|in:Basic,Intermediate,Experienced',
            'skill_category_id' => 'required|exists:skill_categories,id',
        ]);
        $skill->update([
            'name'  => $request->name,
            'level' => $request->level,
            'skill_category_id' => $request->skill_category_id,
        ]);
        return back()->with('success', 'Skill updated!');
    }

    public function destroySkill(Skill $skill)
    {
        $skill->delete();
        return back()->with('success', 'Skill deleted!');
    }

    // ===================== MESSAGES =====================

    public function messages()
    {
        $messages = ContactMessage::latest()->paginate(20);
        return view('admin.messages', compact('messages'));
    }

    public function showMessage(ContactMessage $message)
    {
        $message->update(['is_read' => true]);
        return view('admin.message-show', compact('message'));
    }

    public function destroyMessage(ContactMessage $message)
    {
        $message->delete();
        return redirect()->route('admin.messages')->with('success', 'Message deleted!');
    }
}
