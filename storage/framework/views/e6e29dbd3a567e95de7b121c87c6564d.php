<?php $__env->startSection('page-title', 'Projects'); ?>

<?php $__env->startSection('topbar-actions'); ?>
    <a href="<?php echo e(route('admin.projects.create')); ?>" class="btn-admin btn-admin-primary">
        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Add Project
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="admin-card">
    <?php if($projects->isEmpty()): ?>
        <div style="text-align:center;padding:3rem;color:var(--a-muted)">
            <svg width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" style="margin:0 auto 1rem;opacity:0.3"><path d="M2 17l10 5 10-5M2 12l10 5 10-5M12 2L2 7l10 5 10-5z"/></svg>
            <p style="margin-bottom:1rem">No projects yet.</p>
            <a href="<?php echo e(route('admin.projects.create')); ?>" class="btn-admin btn-admin-primary">Add your first project</a>
        </div>
    <?php else: ?>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Links</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:0.875rem">
                            <img src="<?php echo e($project->image_url); ?>" alt="<?php echo e($project->title); ?>"
                                 style="width:56px;height:40px;object-fit:cover;border-radius:6px;border:1px solid var(--a-border);flex-shrink:0" />
                            <div>
                                <strong><?php echo e($project->title); ?></strong>
                                <?php if($project->description): ?>
                                    <br><small><?php echo e(Str::limit($project->description, 55)); ?></small>
                                <?php endif; ?>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="display:flex;gap:0.4rem;flex-wrap:wrap">
                            <?php if($project->github_url): ?>
                                <a href="<?php echo e($project->github_url); ?>" target="_blank" class="btn-admin btn-admin-outline btn-admin-sm">GitHub</a>
                            <?php endif; ?>
                            <?php if($project->live_url): ?>
                                <a href="<?php echo e($project->live_url); ?>" target="_blank" class="btn-admin btn-admin-outline btn-admin-sm">Live</a>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td style="font-family:var(--a-font-mono);font-size:0.8rem"><?php echo e($project->sort_order); ?></td>
                    <td>
                        <?php if($project->is_active): ?>
                            <span class="badge badge-success">Active</span>
                        <?php else: ?>
                            <span class="badge badge-secondary">Hidden</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div style="display:flex;gap:0.4rem;align-items:center">
                            <a href="<?php echo e(route('admin.projects.edit', $project)); ?>" class="btn-admin btn-admin-outline btn-admin-sm">
                                <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                Edit
                            </a>
                            <form method="POST" action="<?php echo e(route('admin.projects.destroy', $project)); ?>"
                                  onsubmit="return confirm('Delete this project?')">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn-admin btn-admin-danger btn-admin-sm">
                                    <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portfolio-laravel\resources\views/admin/projects/index.blade.php ENDPATH**/ ?>