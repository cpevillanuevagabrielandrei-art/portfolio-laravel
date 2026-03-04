// Admin CMS JavaScript

document.addEventListener('DOMContentLoaded', function () {
    // Mobile sidebar toggle
    const toggleBtn = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('adminSidebar');

    if (toggleBtn) {
        toggleBtn.style.display = 'flex';
        toggleBtn.addEventListener('click', function () {
            sidebar.classList.toggle('open');
        });
    }

    // Auto-dismiss alerts
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 4000);
    });

    // Image preview for file inputs
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function () {
            const file = this.files[0];
            if (!file || !file.type.startsWith('image/')) return;

            let preview = this.nextElementSibling;
            if (!preview || preview.tagName !== 'IMG') {
                preview = document.createElement('img');
                preview.style.cssText = 'width:80px;height:60px;object-fit:cover;border-radius:6px;margin-top:0.5rem;display:block';
                this.parentNode.insertBefore(preview, this.nextSibling);
            }

            const reader = new FileReader();
            reader.onload = e => preview.src = e.target.result;
            reader.readAsDataURL(file);
        });
    });
});
