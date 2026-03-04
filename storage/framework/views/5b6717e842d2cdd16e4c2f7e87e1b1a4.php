<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('topbar-actions'); ?>
    <a href="<?php echo e(route('portfolio.index')); ?>" target="_blank" class="btn-admin btn-admin-outline btn-admin-sm">
        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
        View Portfolio
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon-wrap">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M2 17l10 5 10-5M2 12l10 5 10-5M12 2L2 7l10 5 10-5z"/></svg>
        </div>
        <div>
            <div class="stat-value"><?php echo e($stats['projects']); ?></div>
            <div class="stat-label">Projects</div>
        </div>
    </div>
    <div class="stat-card stat-card--green">
        <div class="stat-icon-wrap">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
        </div>
        <div>
            <div class="stat-value"><?php echo e($stats['skills']); ?></div>
            <div class="stat-label">Skills</div>
        </div>
    </div>
    <div class="stat-card stat-card--orange">
        <div class="stat-icon-wrap">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
        </div>
        <div>
            <div class="stat-value"><?php echo e($stats['messages']); ?></div>
            <div class="stat-label">Total Messages</div>
        </div>
    </div>
    <div class="stat-card stat-card--red">
        <div class="stat-icon-wrap">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 17H2a3 3 0 004-3V9a8 8 0 0116 0v5a3 3 0 004 3"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg>
        </div>
        <div>
            <div class="stat-value"><?php echo e($stats['unread']); ?></div>
            <div class="stat-label">Unread</div>
        </div>
    </div>
</div>


<div class="admin-card">
    <h3>
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
        Recent Messages
    </h3>

    <?php if($recentMessages->isEmpty()): ?>
        <p style="text-align:center;padding:2.5rem;color:var(--a-muted)">No messages yet.</p>
    <?php else: ?>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Sender</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $recentMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <strong><?php echo e($msg->name); ?></strong>
                        <br><small><?php echo e($msg->email); ?></small>
                    </td>
                    <td><?php echo e($msg->subject ?? '(no subject)'); ?></td>
                    <td><?php echo e($msg->created_at->diffForHumans()); ?></td>
                    <td>
                        <?php if($msg->is_read): ?>
                            <span class="badge badge-secondary">Read</span>
                        <?php else: ?>
                            <span class="badge badge-danger">Unread</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('admin.messages.show', $msg)); ?>" class="btn-admin btn-admin-outline btn-admin-sm">View</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div style="margin-top:1.25rem;padding-top:1rem;border-top:1px solid var(--a-border)">
            <a href="<?php echo e(route('admin.messages')); ?>" class="btn-admin btn-admin-outline btn-admin-sm">
                View all messages
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>
    <?php endif; ?>
</div>


<div style="display:grid;grid-template-columns:1fr 1fr;gap:1.25rem">
    <div class="admin-card">
        <h3>
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
            Quick Actions
        </h3>
        <div class="quick-actions">
            <a href="<?php echo e(route('admin.projects.create')); ?>" class="btn-admin btn-admin-primary">
                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Add New Project
            </a>
            <a href="<?php echo e(route('admin.skills')); ?>" class="btn-admin btn-admin-success">
                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Add Skill
            </a>
            <a href="<?php echo e(route('admin.settings')); ?>" class="btn-admin btn-admin-secondary">
                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
                Update Profile
            </a>
        </div>
    </div>

    <div class="admin-card">
        <h3>
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="2"/><line x1="8" y1="6" x2="16" y2="6"/><line x1="8" y1="10" x2="16" y2="10"/><line x1="8" y1="14" x2="12" y2="14"/></svg>
            System Info
        </h3>
        <table class="system-info-table">
            <tr><td>Laravel</td><td><?php echo e(app()->version()); ?></td></tr>
            <tr><td>PHP</td><td><?php echo e(PHP_VERSION); ?></td></tr>
            <tr><td>Environment</td><td><?php echo e(app()->environment()); ?></td></tr>
            <tr><td>Logged in as</td><td><?php echo e(auth()->user()->name); ?></td></tr>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portfolio-laravel\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>