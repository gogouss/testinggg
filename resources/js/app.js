const ready = (fn) => {
    if (document.readyState !== 'loading') {
        fn();
    } else {
        document.addEventListener('DOMContentLoaded', fn);
    }
};

const initCarousels = () => {
    document.querySelectorAll('[data-carousel]').forEach((root) => {
        const slides = Array.from(root.querySelectorAll('[data-carousel-slide]'));
        if (slides.length === 0) return;

        const counter = root.querySelector('[data-carousel-counter]');
        const prevButtons = root.querySelectorAll('[data-carousel-prev]');
        const nextButtons = root.querySelectorAll('[data-carousel-next]');
        let index = 0;

        const render = () => {
            slides.forEach((slide, i) => slide.classList.toggle('hidden', i !== index));
            if (counter) counter.textContent = `${index + 1} / ${slides.length}`;
        };

        const goTo = (target) => {
            index = (target + slides.length) % slides.length;
            render();
        };

        prevButtons.forEach((button) => {
            button.addEventListener('click', () => goTo(index - 1));
        });

        nextButtons.forEach((button) => {
            button.addEventListener('click', () => goTo(index + 1));
        });

        root.querySelectorAll('[data-carousel-goto]').forEach((button) => {
            button.addEventListener('click', () => goTo(Number(button.dataset.carouselGoto)));
        });

        root.addEventListener('keydown', (event) => {
            if (event.key === 'ArrowLeft') {
                event.preventDefault();
                goTo(index - 1);
            }

            if (event.key === 'ArrowRight') {
                event.preventDefault();
                goTo(index + 1);
            }
        });

        render();
    });
};

const initPagers = () => {
    document.querySelectorAll('[data-pager]').forEach((root) => {
        const pages = Array.from(root.querySelectorAll('[data-pager-page]'));
        if (pages.length < 2) return;

        const buttons = Array.from(root.querySelectorAll('[data-pager-goto]'));
        const prev = root.querySelector('[data-pager-prev]');
        const next = root.querySelector('[data-pager-next]');
        let index = 0;

        const render = () => {
            pages.forEach((page, i) => page.classList.toggle('hidden', i !== index));
            buttons.forEach((button, i) => button.classList.toggle('is-active', i === index));

            prev?.classList.toggle('is-disabled', index === 0);
            next?.classList.toggle('is-disabled', index === pages.length - 1);
        };

        const goTo = (target) => {
            index = Math.min(Math.max(target, 0), pages.length - 1);
            render();
        };

        buttons.forEach((button) => {
            button.addEventListener('click', () => goTo(Number(button.dataset.pagerGoto)));
        });

        prev?.addEventListener('click', () => goTo(index - 1));
        next?.addEventListener('click', () => goTo(index + 1));

        render();
    });
};

const closeMenus = (except) => {
    document.querySelectorAll('[data-menu-panel]').forEach((panel) => {
        if (except && except.contains(panel)) return;

        panel.classList.add('hidden');
        panel.parentElement?.querySelector('[data-menu-toggle]')?.setAttribute('aria-expanded', 'false');
    });
};

const initMenus = () => {
    document.querySelectorAll('[data-menu]').forEach((root) => {
        const toggle = root.querySelector('[data-menu-toggle]');
        const panel = root.querySelector('[data-menu-panel]');
        if (!toggle || !panel) return;

        toggle.addEventListener('click', (event) => {
            event.stopPropagation();
            const willOpen = panel.classList.contains('hidden');
            closeMenus();
            panel.classList.toggle('hidden', !willOpen);
            toggle.setAttribute('aria-expanded', String(willOpen));
        });

        panel.addEventListener('click', (event) => event.stopPropagation());
    });

    document.addEventListener('click', () => closeMenus());
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') closeMenus();
    });
};

ready(() => {
    initCarousels();
    initPagers();
    initMenus();
});
