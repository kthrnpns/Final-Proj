// Admin Dashboard JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Confirm before delete actions
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (!confirm('Are you sure you want to delete this item?')) {
                e.preventDefault();
            }
        });
    });
    
    // Form validation
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            let valid = true;
            
            // Check required fields
            const requiredFields = form.querySelectorAll('[required]');
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    valid = false;
                    field.style.borderColor = 'red';
                } else {
                    field.style.borderColor = '';
                }
            });
            
            // Check password match
            const password = form.querySelector('#password');
            const confirmPassword = form.querySelector('#confirm_password');
            if (password && confirmPassword && password.value !== confirmPassword.value) {
                valid = false;
                confirmPassword.style.borderColor = 'red';
                alert('Passwords do not match');
            }
            
            if (!valid) {
                e.preventDefault();
            }
        });
    });
    
    // Date picker restrictions (future dates only)
    const dateInputs = document.querySelectorAll('input[type="date"]');
    dateInputs.forEach(input => {
        const today = new Date().toISOString().split('T')[0];
        input.min = today;
    });
    
    // Toggle sidebar on mobile
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
    }
});