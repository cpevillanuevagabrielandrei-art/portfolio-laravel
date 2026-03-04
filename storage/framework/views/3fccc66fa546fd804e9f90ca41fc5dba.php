<?php $__env->startSection('page-title', 'Add New Project'); ?>

<?php $__env->startSection('topbar-actions'); ?>
    <a href="<?php echo e(route('admin.projects')); ?>" class="btn-admin btn-admin-outline btn-admin-sm">← Back to Projects</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="admin-card" style="max-width:700px">
    <form method="POST" action="<?php echo e(route('admin.projects.store')); ?>" enctype="multipart/form-data" class="admin-form">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label>Project Title *</label>
            <input type="text" name="title" value="<?php echo e(old('title')); ?>" placeholder="My Awesome Project" required />
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="3" placeholder="Brief description of the project..."><?php echo e(old('description')); ?></textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>GitHub URL</label>
                <input type="url" name="github_url" value="<?php echo e(old('github_url')); ?>" placeholder="https://github.com/..." />
            </div>
            <div class="form-group">
                <label>Live Demo URL</label>
                <input type="url" name="live_url" value="<?php echo e(old('live_url')); ?>" placeholder="https://..." />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Sort Order</label>
                <input type="number" name="sort_order" value="<?php echo e(old('sort_order', 0)); ?>" />
                <p class="form-hint">Lower numbers appear first</p>
            </div>
            <div class="form-group form-check" style="margin-top:1.5rem">
                <input type="checkbox" name="is_active" id="is_active" value="1" <?php echo e(old('is_active', true) ? 'checked' : ''); ?> />
                <label for="is_active">Active (visible on portfolio)</label>
            </div>
        </div>

        <div class="form-group">
            <label>Project Image</label>
            <input type="file" name="image" accept="image/*" />
            <p class="form-hint">Max 2MB. Recommended: 16:9 ratio</p>
        </div>

        <div style="display:flex; gap:1rem">
            <button type="submit" class="btn-admin btn-admin-primary">💾 Create Project</button>
            <a href="<?php echo e(route('admin.projects')); ?>" class="btn-admin btn-admin-outline">Cancel</a>
        </div>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portfolio-laravel\resources\views/admin/projects/create.blade.php ENDPATH**/ ?>