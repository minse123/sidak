import './bootstrap';
import Offcanvas from 'bootstrap/js/dist/offcanvas';

document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('appSidebar');
    if (!sidebar) return;

    const DESKTOP_WIDTH = 992;
    let isCleaningUp = false;

    const forceCleanup = () => {
        document.querySelectorAll('.offcanvas-backdrop').forEach((el) => el.remove());
        document.body.classList.remove('modal-open');
        document.body.style.removeProperty('overflow');
        document.body.style.removeProperty('padding-right');

        sidebar.classList.remove('show');
        sidebar.removeAttribute('aria-modal');
        sidebar.removeAttribute('role');
        sidebar.style.removeProperty('visibility');
    };

    const closeSidebarOnDesktop = () => {
        if (window.innerWidth < DESKTOP_WIDTH || isCleaningUp) return;

        const instance = Offcanvas.getInstance(sidebar);

        if (instance && sidebar.classList.contains('show')) {
            isCleaningUp = true;
            instance.hide();
            return;
        }

        forceCleanup();
    };

    sidebar.addEventListener('hidden.bs.offcanvas', () => {
        forceCleanup();
        isCleaningUp = false;
    });

    window.addEventListener('resize', closeSidebarOnDesktop);
    window.addEventListener('orientationchange', closeSidebarOnDesktop);

    closeSidebarOnDesktop();
});