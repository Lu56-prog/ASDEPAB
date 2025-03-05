(() => {
    'use strict'
  
    const forms = document.querySelectorAll('.needs-validation')
  
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            const emailInput = document.getElementById('email-egresado-formcontc');
            const emailEmptyError = document.getElementById('email-incomplete');
            const emailFormatError = document.getElementById('email-error');
            const emailValue = emailInput.value;
  
            emailEmptyError.style.display = 'none';
            emailFormatError.style.display = 'none';
  
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
  
            if (emailValue === '') {
                emailInput.classList.add('is-invalid');
                emailEmptyError.style.display = 'block'; 
            } else if (!emailValue.includes('@')) {
                emailInput.classList.add('is-invalid');
                emailFormatError.style.display = 'block'; 
                emailInput.classList.add('is-valid');
            }

            form.classList.add('was-validated');
        }, false)
    })
})();