/**
 * Gesahan News Framework Engine v2.0.0
 * Pure Vanilla JavaScript (No jQuery / No Library Dependencies)
 */

document.addEventListener('DOMContentLoaded', () => {
    // Inisialisasi Fitur Utama
    gesahanInitDarkMode();
    gesahanInitMobileMenu();
    gesahanInitStickyHeader();
    gesahanInitSearchModal();
    gesahanInitReadingProgressBar();
    gesahanInitShareButtons();
});

/**
 * Pengaturan Dark Mode Switcher & Persistent Storage Logic
 */
function gesahanInitDarkMode() {
    const toggleBtn = document.querySelector('.gn-dark-mode-toggle');
    if (!toggleBtn) return;

    toggleBtn.addEventListener('click', () => {
        const isDark = document.body.classList.contains('gn-dark-mode');
        
        if (isDark) {
            document.body.classList.remove('gn-dark-mode');
            localStorage.setItem('gn-dark-mode', 'disabled');
            toggleBtn.setAttribute('aria-label', 'Aktifkan Dark Mode');
        } else {
            document.body.classList.add('gn-dark-mode');
            localStorage.setItem('gn-dark-mode', 'enabled');
            toggleBtn.setAttribute('aria-label', 'Aktifkan Light Mode');
        }
    });
}

/**
 * Mobile Navigation Drawer Slide-Out Logic & Accessibility ARIA mapping
 */
function gesahanInitMobileMenu() {
    const menuToggle = document.querySelector('.gn-menu-toggle');
    const drawer = document.querySelector('.gn-mobile-drawer');
    const drawerClose = document.querySelector('.gn-mobile-drawer__close');
    const drawerOverlay = document.querySelector('.gn-mobile-drawer__overlay');
    const burgerIcon = document.querySelector('.gn-hamburger-icon');
    const closeIcon = document.querySelector('.gn-close-icon');

    if (!menuToggle || !drawer) return;

    function openDrawer() {
        drawer.classList.add('gn-mobile-drawer--active');
        drawer.setAttribute('aria-hidden', 'false');
        menuToggle.setAttribute('aria-expanded', 'true');
        document.body.classList.add('gn-lock-scroll');
        if (burgerIcon && closeIcon) {
            burgerIcon.style.display = 'none';
            closeIcon.style.display = 'block';
        }
    }

    function closeDrawer() {
        drawer.classList.remove('gn-mobile-drawer--active');
        drawer.setAttribute('aria-hidden', 'true');
        menuToggle.setAttribute('aria-expanded', 'false');
        document.body.classList.remove('gn-lock-scroll');
        if (burgerIcon && closeIcon) {
            burgerIcon.style.display = 'block';
            closeIcon.style.display = 'none';
        }
    }

    menuToggle.addEventListener('click', (e) => {
        e.stopPropagation();
        const isOpen = drawer.classList.contains('gn-mobile-drawer--active');
        if (isOpen) {
            closeDrawer();
        } else {
            openDrawer();
        }
    });

    if (drawerClose) drawerClose.addEventListener('click', closeDrawer);
    if (drawerOverlay) drawerOverlay.addEventListener('click', closeDrawer);
}

/**
 * Premium Sticky Navigation Engine on Scroll
 * Mengunci strip kategori (.gn-nav) di posisi atas layar saat disekrol melewati batas
 */
function gesahanInitStickyHeader() {
    const navBar = document.getElementById('gnNavBar');
    if (!navBar) return;

    const stickyPoint = navBar.offsetTop;

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > stickyPoint) {
            navBar.classList.add('gn-nav--sticky');
        } else {
            navBar.classList.remove('gn-nav--sticky');
        }
    });
}

/**
 * Fullscreen Interactive Search Overlay Modal Logic
 */
function gesahanInitSearchModal() {
    const trigger = document.querySelector('.gn-search-trigger');
    const modal = document.querySelector('.gn-search-modal');
    const closeBtn = document.querySelector('.gn-search-modal__close');
    const overlay = document.querySelector('.gn-search-modal__overlay');
    const searchField = document.querySelector('.gn-search-modal .search-field');

    if (!trigger || !modal) return;

    function openSearch() {
        modal.classList.add('gn-search-modal--active');
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('gn-lock-scroll');
        setTimeout(() => {
            if (searchField) searchField.focus();
        }, 300);
    }

    function closeSearch() {
        modal.classList.remove('gn-search-modal--active');
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('gn-lock-scroll');
    }

    trigger.addEventListener('click', openSearch);
    if (closeBtn) closeBtn.addEventListener('click', closeSearch);
    if (overlay) overlay.addEventListener('click', closeSearch);

    // ESC Key listener to close modal quickly
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.classList.contains('gn-search-modal--active')) {
            closeSearch();
        }
    });
}

/**
 * Reading Progress Bar Controller
 */
function gesahanInitReadingProgressBar() {
    const bar = document.getElementById('gnReadingBar');
    if (!bar) return;

    window.addEventListener('scroll', () => {
        const winScroll = document.documentElement.scrollTop || document.body.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        bar.style.width = scrolled + '%';
    });
}

/**
 * premium Copy To Clipboard Share Button Handler
 */
function gesahanInitShareButtons() {
    const copyBtn = document.querySelector('.gn-share-btn--copy');
    if (!copyBtn) return;

    copyBtn.addEventListener('click', () => {
        const url = copyBtn.getAttribute('data-url');
        if (!url) return;

        navigator.clipboard.writeText(url).then(() => {
            const originalText = copyBtn.textContent;
            copyBtn.textContent = 'Disalin!';
            copyBtn.style.background = 'var(--gn-color-success)';
            copyBtn.style.color = '#ffffff';

            setTimeout(() => {
                copyBtn.textContent = originalText;
                copyBtn.style.background = '';
                copyBtn.style.color = '';
            }, 2000);
        }).catch(err => {
            console.error('Gagal menyalin tautan: ', err);
        });
    });
}