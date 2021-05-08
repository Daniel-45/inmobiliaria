document.addEventListener('DOMContentLoaded', function () {
    eventListeners();
});

// Dark Mode
const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');

function cambiarTema(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark'); // add this
        document.body.classList.add('dark-mode');
    } else {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light'); // add this
        document.body.classList.remove('dark-mode');
    }
}

const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;

if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);

    if (currentTheme === 'dark') {
        toggleSwitch.checked = true;
        document.body.classList.add('dark-mode');
    }
}

function eventListeners() {
    const navbarTogglerIcon = document.querySelector('.navbar-toggler-icon');
    navbarTogglerIcon.addEventListener('click', navegacionResponsive);

    toggleSwitch.addEventListener('change', cambiarTema, false);

    // Mostrar campos del formulario de contacdo de forma condicional
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');

    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');
}

function mostrarMetodosContacto(e) {
    const divContacto = document.querySelector('#contacto');

    if (e.target.value === 'telefono') {
        divContacto.innerHTML = `
        <label for="telefono">Número teléfono</label>
        <input type="tel" id="telefono" name="contacto[telefono]" placeholder="Tu teléfono">
        <p>Seleccione la fecha y la hora para llamarle</p>

        <label for="nombre">Fecha</label>
        <input type="date" id="nombre" name="contacto[fecha]">

        <label for="hora">Hora</label>
        <input type="time" id="hora" name="contacto[hora]" min="09:00" max="18:00">
        `;
    } else {
        divContacto.innerHTML = `
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="contacto[email]" placeholder="name@example.com" required>
        `;
    }
}