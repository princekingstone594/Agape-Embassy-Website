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

const paymentModal = document.querySelector('[data-payment-modal]');
const paymentForm = document.querySelector('[data-payment-form]');

if (paymentModal && paymentForm) {
    const paymentContext = paymentModal.querySelector('[data-payment-context]');
    const paymentType = paymentModal.querySelector('[data-payment-type]');
    const paymentStatus = paymentModal.querySelector('[data-payment-status]');
    const paymentSubmit = paymentModal.querySelector('[data-payment-submit]');
    const firstInput = paymentForm.querySelector('input[name="name"]');

    const setPaymentStatus = (message, type = 'info') => {
        paymentStatus.hidden = false;
        paymentStatus.textContent = message;
        paymentStatus.dataset.status = type;
    };

    const clearPaymentStatus = () => {
        paymentStatus.hidden = true;
        paymentStatus.textContent = '';
        delete paymentStatus.dataset.status;
    };

    const closePaymentModal = () => {
        paymentModal.classList.remove('open');
        paymentModal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('modal-open');
    };

    document.querySelectorAll('[data-payment-open]').forEach((button) => {
        button.addEventListener('click', () => {
            const givingType = button.dataset.givingType || 'Giving';
            const givingAction = button.dataset.givingAction || 'Approve';

            paymentType.value = givingType;
            paymentContext.textContent = `${givingAction} for ${givingType}. Enter your details to request payment approval.`;
            paymentSubmit.textContent = 'Approve';
            clearPaymentStatus();
            paymentForm.reset();
            paymentType.value = givingType;

            paymentModal.classList.add('open');
            paymentModal.setAttribute('aria-hidden', 'false');
            document.body.classList.add('modal-open');
            firstInput.focus();
        });
    });

    paymentModal.querySelectorAll('[data-payment-close]').forEach((control) => {
        control.addEventListener('click', closePaymentModal);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && paymentModal.classList.contains('open')) {
            closePaymentModal();
        }
    });

    paymentForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        clearPaymentStatus();
        paymentSubmit.disabled = true;
        paymentSubmit.textContent = 'Approving...';

        try {
            const response = await fetch(paymentForm.action, {
                method: 'POST',
                body: new FormData(paymentForm),
                headers: {
                    Accept: 'application/json',
                },
            });
            const result = await response.json();

            if (!response.ok || !result.ok) {
                setPaymentStatus(result.message || 'Payment approval could not be started.', 'error');
                return;
            }

            setPaymentStatus(result.message, 'success');
        } catch (error) {
            setPaymentStatus('Payment approval could not be started. Please try again.', 'error');
        } finally {
            paymentSubmit.disabled = false;
            paymentSubmit.textContent = 'Approve';
        }
    });
}
