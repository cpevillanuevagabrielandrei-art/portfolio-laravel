<?php $__env->startSection('page-title', 'Skills Management'); ?>

<?php $__env->startSection('content'); ?>

    
    <div id="editSkillModal"
        style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:1000; align-items:center; justify-content:center;">
        <div
            style="background:#1e1e2e; border-radius:12px; padding:2rem; width:100%; max-width:420px; border:1px solid #333;">
            <h3 style="margin-bottom:1.5rem">✏️ Edit Skill</h3>
            <form method="POST" id="editSkillForm" class="admin-form">
                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                <div class="form-group">
                    <label>Category</label>
                    <select name="skill_category_id" id="editSkillCategory" required>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

    
    <div id="editCatModal"
        style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:1000; align-items:center; justify-content:center;">
        <div
            style="background:#1e1e2e; border-radius:12px; padding:2rem; width:100%; max-width:380px; border:1px solid #333;">
            <h3 style="margin-bottom:1.5rem">✏️ Edit Category</h3>
            <form method="POST" id="editCatForm" class="admin-form">
                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
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

        
        <div>
            <div class="admin-card">
                <h3>➕ Add Skill Category</h3>
                <form method="POST" action="<?php echo e(route('admin.skill-categories.store')); ?>" class="admin-form">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="name" placeholder="e.g. Frontend Development" required />
                    </div>
                    <button type="submit" class="btn-admin btn-admin-primary">Add Category</button>
                </form>
            </div>

            <div class="admin-card" style="margin-top:1.5rem">
                <h3>➕ Add Skill</h3>
                <form method="POST" action="<?php echo e(route('admin.skills.store')); ?>" class="admin-form">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="skill_category_id" required>
                            <option value="">Select category...</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

        
        <div>
            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="admin-card">
                    <h3 style="display:flex;justify-content:space-between;align-items:center">
                        <?php echo e($category->name); ?>

                        <div style="display:flex;gap:0.5rem">
                            <button onclick="openCatModal(<?php echo e($category->id); ?>, '<?php echo e(addslashes($category->name)); ?>')"
                                class="btn-admin btn-admin-primary btn-admin-sm">✏️ Edit</button>
                            <form method="POST" action="<?php echo e(route('admin.skill-categories.destroy', $category)); ?>"
                                onsubmit="return confirm('Delete this category and all its skills?')">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn-admin btn-admin-danger btn-admin-sm">Delete</button>
                            </form>
                        </div>
                    </h3>

                    <?php if($category->skills->isEmpty()): ?>
                        <p style="color:#aaa; font-size:0.85rem">No skills in this category yet.</p>
                    <?php else: ?>
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Skill</th>
                                    <th>Level</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $category->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><strong><?php echo e($skill->name); ?></strong></td>
                                        <td>
                                            <?php
                                                $levelClass = match ($skill->level) {
                                                    'Experienced' => 'badge-success',
                                                    'Intermediate' => 'badge-info',
                                                    default => 'badge-secondary',
                                                };
                                            ?>
                                            <span class="badge <?php echo e($levelClass); ?>"><?php echo e($skill->level); ?></span>
                                        </td>
                                        <td style="display:flex;gap:0.4rem">
                                            <button
                                                onclick="openSkillModal(<?php echo e($skill->id); ?>, '<?php echo e(addslashes($skill->name)); ?>', '<?php echo e($skill->level); ?>', <?php echo e($skill->skill_category_id); ?>)"
                                                class="btn-admin btn-admin-primary btn-admin-sm">✏️</button>
                                            <form method="POST" action="<?php echo e(route('admin.skills.destroy', $skill)); ?>"
                                                onsubmit="return confirm('Delete this skill?')">
                                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                <button type="submit"
                                                    class="btn-admin btn-admin-danger btn-admin-sm">🗑</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="admin-card">
                    <p style="text-align:center; color:#888; padding:2rem">No skill categories yet. Create one to get
                        started!</p>
                </div>
            <?php endif; ?>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portfolio-laravel\resources\views/admin/skills/index.blade.php ENDPATH**/ ?>