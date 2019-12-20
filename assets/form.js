document.addEventListener('DOMContentLoaded', function(e) {
    console.log('This is Ready!');
    let testimonialForm = document.getElementById('book-testimonial-form');

    testimonialForm.addEventListener('submit', (e) => {
        e.preventDefault();
        // reset the form messages
        resetMessages();

        // collect all the data
        let data = {
            name: testimonialForm.querySelector('[name="name"]').value,
            email: testimonialForm.querySelector('[name="email"]').value,
            message: testimonialForm.querySelector('[name="message"]').value
        }
        console.log(data);


        // validate all the detail
        if (!data.name) {
            testimonialForm.querySelector('[data-error="invalidName"]').classList.add('show');
            return;
        }

        if (!validateEmail(data.email)) {
            testimonialForm.querySelector('[data-error="invalidEmail"]').classList.add('show');
            return;
        }

        if (!data.message) {
            testimonialForm.querySelector('[data-error="invalidMessage"]').classList.add('show');
            return;
        }

        // ajax http post request
        let url = testimonialForm.dataset.url;
        let params = new URLSearchParams(new FormData(testimonialForm));

        testimonialForm.querySelector('.js-form-submission').classList.add('show');

        fetch(url, {
                method: "POST",
                body: params,
            }).then(res => res.json())
            .catch(error => {
                resetMessages();
                testimonialForm.querySelector('.js-form-error').classList.add('show');
            })
            .then(response => {
                resetMessages();

                if (response === 0 || response.status === 'error') {
                    testimonialForm.querySelector('.js-form-error').classList.add('show');
                    return;
                }

                testimonialForm.querySelector('.js-form-success').classList.add('show');
                resetForm(testimonialForm);
            });


    })
});

function resetMessages() {
    document.querySelectorAll('.field-msg').forEach(f => f.classList.remove('show'));
}

function validateEmail(email) {
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function resetForm(form) {
    form.querySelector('[name="name"]').value = '';
    form.querySelector('[name="email"]').value = '';
    form.querySelector('[name="message"]').value = '';
}