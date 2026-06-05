const toggle = document.querySelector('.menu-toggle');
const nav = document.querySelector('.site-nav');
const backdrop = document.querySelector('.nav-backdrop');
const closeControls = document.querySelectorAll('[data-close-menu]');

if (toggle && nav) {
    const closeMenu = () => {
        nav.classList.remove('open');
        document.body.classList.remove('menu-open');
        toggle.setAttribute('aria-expanded', 'false');
    };

    const openMenu = () => {
        nav.classList.add('open');
        document.body.classList.add('menu-open');
        toggle.setAttribute('aria-expanded', 'true');
    };

    toggle.addEventListener('click', () => {
        if (nav.classList.contains('open')) {
            closeMenu();
            return;
        }

        openMenu();
    });

    closeControls.forEach((control) => {
        control.addEventListener('click', closeMenu);
    });

    nav.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', closeMenu);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeMenu();
        }
    });
}
