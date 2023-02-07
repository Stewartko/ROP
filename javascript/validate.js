const form = document.getElementById('form');
const firstName = document.getElementById('firstName');
const lastName = document.getElementById('lastName');
const email = document.getElementById('email');
const phone = document.getElementById('phone');
const password = document.getElementById('password');
const confirmpassword = document.getElementById('confirmpassword');

form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
});

const setError = (element, message) => {
    const forms = element.parentElement;
    const errorDisplay = forms.querySelector('.error');

    errorDisplay.innerText = message;
    forms.classList.add('error');
    forms.classList.remove('success')
}

const setSuccess = element => {
    const forms = element.parentElement;
    const errorDisplay = forms.querySelector('.error');

    errorDisplay.innerText = '';
    forms.classList.add('success');
    forms.classList.remove('error');
};

const isValidEmail = email => {
    return /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(email).toLowerCase());
}

const isValidPhone = phone => {
    return /^\+(?:[0-9] ?){6,14}[0-9]$/.test(phone);
}

const validateInputs = () => {
    const firstNameValue = firstName.value.trim();
    const lastNameValue = lastName.value.trim();
    const emailValue = email.value.trim();
    const phoneValue = phone.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = confirmpassword.value.trim();


    if(firstNameValue === '') {
        setError(firstName, 'Meno je povinné');
    } 
    else {
        if(!(/^[A-Ž][a-ž]+$/.test(firstNameValue))){
            setError(firstName, 'Meno obsahuje zakázané znaky');
        } else {
            setSuccess(firstName);
        }
    }

    if(lastNameValue === '') {
        setError(lastName, 'Priezvisko je povinné');
    } if(!(/^[A-Ž][a-ž]+$/.test(lastNameValue))){
        setError(lastName, 'Priezvisko obsahuje zakázané znaky');
    } else {
        setSuccess(lastName);
    }

    if(emailValue === '') {
        setError(email, 'Email je povinný');
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Neplatná email adresa');
    } else {
        setSuccess(email);
    }

    if(phoneValue === '') {
        setError(phone, 'Číslo je povinné');
    } else if (!isValidPhone(phoneValue)) {
        setError(phone, 'Neplatné telefónne číslo');
    } else {
        setSuccess(phone);
    }

    if(passwordValue === '') {
        setError(password, 'Heslo je povinné');
    } else if (passwordValue.length < 6 ) {
        setError(password, 'Heslo musí obsahovať aspoň 6 znakov')
    } else {
        setSuccess(password);
    }

    if(password2Value === '') {
        setError(confirmpassword, 'Potvrdte heslo');
    } else if (password2Value !== passwordValue) {
        setError(confirmpassword, "Heslá sa nezhodujú");
    } else {
        setSuccess(confirmpassword);
    }
};
