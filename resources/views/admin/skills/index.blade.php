@extends('layouts.admin')

@section('page-title', 'Skills Management')

@section('content')

    {{-- Edit Skill Modal --}}
    <div id="editSkillModal"
        style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:1000; align-items:center; justify-content:center;">
        <div
            style="background:#1e1e2e; border-radius:12px; padding:2rem; width:100%; max-width:420px; border:1px solid #333;">
            <h3 style="margin-bottom:1.5rem">✏️ Edit Skill</h3>
            <form method="POST" id="editSkillForm" class="admin-form">
                @csrf @method('PUT')
                <div class="form-group">
                    <label>Category</label>
                    <select name="skill_category_id" id="editSkillCategory" required>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Skill Name</label>
                    <input type="text" name="name" id="editSkillName" required />
                </div>
                <div class="form-group">
                    <label>Proficiency Level</label>
                    <select name="level" id="editSkillLevel" required>
                        <option value="Basic">Basic</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Experienced">Experienced</option>
                    </select>
                </div>
                <div style="display:flex; gap:1rem; margin-top:1rem">
                    <button type="submit" class="btn-admin btn-admin-primary">Save Changes</button>
                    <button type="button" onclick="closeSkillModal()" class="btn-admin btn-admin-danger">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Edit Category Modal --}}
    <div id="editCatModal"
        style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:1000; align-items:center; justify-content:center;">
        <div
            style="background:#1e1e2e; border-radius:12px; padding:2rem; width:100%; max-width:380px; border:1px solid #333;">
            <h3 style="margin-bottom:1.5rem">✏️ Edit Category</h3>
            <form method="POST" id="editCatForm" class="admin-form">
                @csrf @method('PUT')
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="name" id="editCatName" required />
                </div>
                <div style="display:flex; gap:1rem; margin-top:1rem">
                    <button type="submit" class="btn-admin btn-admin-primary">Save Changes</button>
                    <button type="button" onclick="closeCatModal()" class="btn-admin btn-admin-danger">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <div style="display:grid; grid-template-columns:1fr 2fr; gap:1.5rem; align-items:start">

        {{-- Add Forms --}}
        <div>
            <div class="admin-card">
                <h3>➕ Add Skill Category</h3>
                <form method="POST" action="{{ route('admin.skill-categories.store') }}" class="admin-form">
                    @csrf
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="name" placeholder="e.g. Frontend Development" required />
                    </div>
                    <button type="submit" class="btn-admin btn-admin-primary">Add Category</button>
                </form>
            </div>

            <div class="admin-card" style="margin-top:1.5rem">
                <h3>➕ Add Skill</h3>
                <form method="POST" action="{{ route('admin.skills.store') }}" class="admin-form">
                    @csrf
                    <div class="form-group">
                        <label>Category</label>
                        <select name="skill_category_id" required>
                            <option value="">Select category...</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Skill Name</label>
                        <input type="text" name="name" placeholder="e.g. React" required />
                    </div>
                    <div class="form-group">
                        <label>Proficiency Level</label>
                        <select name="level" required>
                            <option value="Basic">Basic</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Experienced">Experienced</option>
                        </select>
                    </div>
                    <button type="submit" class="btn-admin btn-admin-success">Add Skill</button>
                </form>
            </div>
        </div>

        {{-- Skills List --}}
        <div>
            @forelse($categories as $category)
                <div class="admin-card">
                    <h3 style="display:flex;justify-content:space-between;align-items:center">
                        {{ $category->name }}
                        <div style="display:flex;gap:0.5rem">
                            <button onclick="openCatModal({{ $category->id }}, '{{ addslashes($category->name) }}')"
                                class="btn-admin btn-admin-primary btn-admin-sm">✏️ Edit</button>
                            <form method="POST" action="{{ route('admin.skill-categories.destroy', $category) }}"
                                onsubmit="return confirm('Delete this category and all its skills?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-admin btn-admin-danger btn-admin-sm">Delete</button>
                            </form>
                        </div>
                    </h3>

                    @if ($category->skills->isEmpty())
                        <p style="color:#aaa; font-size:0.85rem">No skills in this category yet.</p>
                    @else
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Skill</th>
                                    <th>Level</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category->skills as $skill)
                                    <tr>
                                        <td><strong>{{ $skill->name }}</strong></td>
                                        <td>
                                            @php
                                                $levelClass = match ($skill->level) {
                                                    'Experienced' => 'badge-success',
                                                    'Intermediate' => 'badge-info',
                                                    default => 'badge-secondary',
                                                };
                                            @endphp
                                            <span class="badge {{ $levelClass }}">{{ $skill->level }}</span>
                                        </td>
                                        <td style="display:flex;gap:0.4rem">
                                            <button
                                                onclick="openSkillModal({{ $skill->id }}, '{{ addslashes($skill->name) }}', '{{ $skill->level }}', {{ $skill->skill_category_id }})"
                                                class="btn-admin btn-admin-primary btn-admin-sm">✏️</button>
                                            <form method="POST" action="{{ route('admin.skills.destroy', $skill) }}"
                                                onsubmit="return confirm('Delete this skill?')">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    class="btn-admin btn-admin-danger btn-admin-sm">🗑</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            @empty
                <div class="admin-card">
                    <p style="text-align:center; color:#888; padding:2rem">No skill categories yet. Create one to get
                        started!</p>
                </div>
            @endforelse
        </div>
    </div>

    <script>
        function openSkillModal(id, name, level, categoryId) {
            document.getElementById('editSkillForm').action = `/admin/skills/${id}`;
            document.getElementById('editSkillName').value = name;
            document.getElementById('editSkillLevel').value = level;
            document.getElementById('editSkillCategory').value = categoryId;
            document.getElementById('editSkillModal').style.display = 'flex';
        }

        function closeSkillModal() {
            document.getElementById('editSkillModal').style.display = 'none';
        }

        function openCatModal(id, name) {
            document.getElementById('editCatForm').action = `/admin/skill-categories/${id}`;
            document.getElementById('editCatName').value = name;
            document.getElementById('editCatModal').style.display = 'flex';
        }

        function closeCatModal() {
            document.getElementById('editCatModal').style.display = 'none';
        }

        document.getElementById('editSkillModal').addEventListener('click', function(e) {
            if (e.target === this) closeSkillModal();
        });
        document.getElementById('editCatModal').addEventListener('click', function(e) {
            if (e.target === this) closeCatModal();
        });
    </script>

@endsection
