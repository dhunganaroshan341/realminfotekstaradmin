import './bootstrap';

import Dropzone from 'dropzone';
import 'dropzone/dist/dropzone.css';

Dropzone.autoDiscover = false;


// Dropzone
export function initTestimonialDropzone() {
    // Your dropzone initialization code here
}


// Portfolio theme
function initTheme() {

    const themeToggle = document.getElementById('theme-toggle');

    if (!themeToggle) {
        return;
    }

    const html = document.documentElement;

    themeToggle.addEventListener('click', () => {

        const isDark = html.classList.toggle('dark');

        localStorage.setItem(
            'theme',
            isDark ? 'dark' : 'light'
        );

    });
}


document.addEventListener('DOMContentLoaded', () => {

    initTestimonialDropzone();

    initTheme();

});
