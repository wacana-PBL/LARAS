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

// Popup notifikasi (frame "notif - ..." di Figma): satu mesin untuk semua dialog.
let activeDialog = null;
let lastFocused = null;
let autoAdvance = null;

const openDialog = (id) => {
    const dialog = document.querySelector(`[data-notif-dialog="${id}"]`);

    if (!dialog) {
        return;
    }

    if (!activeDialog) {
        lastFocused = document.activeElement;
    }

    if (activeDialog) {
        activeDialog.hidden = true;
        activeDialog.classList.remove('flex');
    }

    window.clearTimeout(autoAdvance);

    dialog.hidden = false;
    dialog.classList.add('flex');
    document.body.style.overflow = 'hidden';
    activeDialog = dialog;

    (dialog.querySelector('[data-dialog-panel]') ?? dialog).focus();

    if (dialog.dataset.notifAuto) {
        autoAdvance = window.setTimeout(
            () => openDialog(dialog.dataset.notifAuto),
            Number(dialog.dataset.notifDelay || 1600),
        );
    }
};

const closeDialog = () => {
    if (!activeDialog) {
        return;
    }

    window.clearTimeout(autoAdvance);
    activeDialog.hidden = true;
    activeDialog.classList.remove('flex');
    activeDialog = null;
    document.body.style.overflow = '';
    lastFocused?.focus();
    lastFocused = null;
};

// Tombol pemicu: data-notif-open, dengan cek isian kosong atau centang syarat.
document.addEventListener('click', (event) => {
    const opener = event.target.closest('[data-notif-open]');

    if (opener) {
        const fields = opener.dataset.notifFields;

        if (fields && [...document.querySelectorAll(fields)].some((field) => !field.value.trim())) {
            openDialog(opener.dataset.notifEmpty);
            return;
        }

        const checkbox = opener.dataset.notifCheckbox;

        if (checkbox && !document.querySelector(checkbox)?.checked) {
            openDialog(opener.dataset.notifUnchecked);
            return;
        }

        openDialog(opener.dataset.notifOpen);
        return;
    }

    const action = event.target.closest('[data-notif-act]');

    if (action) {
        const act = action.dataset.notifAct;

        if (act === 'pengajuan-kirim') {
            openDialog(navigator.onLine ? 'notif-pengajuan-mengirim' : 'notif-pengajuan-gagal');
            return;
        }

        if (act.startsWith('open:')) {
            openDialog(act.slice(5));
            return;
        }

        closeDialog();
        return;
    }

    if (activeDialog && event.target === activeDialog) {
        closeDialog();
    }
});

document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && activeDialog) {
        closeDialog();
    }
});
