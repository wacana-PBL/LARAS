// Preferensi warna aksen: pilihan disimpan per perangkat, token brand digeser
// lewat atribut data-accent di <html> (lihat resources/css/app.css).
const ACCENT_KEY = 'laras:accent';
const accentOptions = document.querySelectorAll('[data-accent-option]');

const paintAccent = (active) => {
    accentOptions.forEach((option) => {
        option.setAttribute('aria-pressed', String(option.dataset.accentOption === active));
    });
};

const applyAccent = (name) => {
    if (!name || name === 'oren') {
        delete document.documentElement.dataset.accent;
    } else {
        document.documentElement.dataset.accent = name;
    }
};

const savedAccent = window.localStorage.getItem(ACCENT_KEY) ?? 'oren';
applyAccent(savedAccent);
paintAccent(savedAccent);

accentOptions.forEach((option) => {
    option.addEventListener('click', () => {
        const name = option.dataset.accentOption;
        applyAccent(name);
        paintAccent(name);
        window.localStorage.setItem(ACCENT_KEY, name);
    });
});

// Lonceng notifikasi: buka/tutup panel, tutup lewat klik luar atau Escape,
// dan tandai semua notifikasi sudah dibaca.
document.querySelectorAll('[data-notif]').forEach((menu) => {
    const toggle = menu.querySelector('[data-notif-toggle]');
    const panel = menu.querySelector('[data-notif-panel]');

    if (!toggle || !panel) {
        return;
    }

    const setOpen = (open) => {
        panel.hidden = !open;
        toggle.setAttribute('aria-expanded', String(open));
    };

    setOpen(false);

    toggle.addEventListener('click', () => setOpen(panel.hidden));

    document.addEventListener('click', (event) => {
        if (!menu.contains(event.target)) {
            setOpen(false);
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !panel.hidden) {
            setOpen(false);
            toggle.focus();
        }
    });

    menu.querySelector('[data-notif-read-all]')?.addEventListener('click', (event) => {
        menu.querySelectorAll('[data-notif-item]').forEach((item) => {
            item.setAttribute('data-read', 'true');
        });
        menu.querySelector('[data-notif-badge]')?.remove();
        event.currentTarget.remove();
        toggle.setAttribute('aria-label', 'Notifikasi, tidak ada yang belum dibaca');
    });
});
