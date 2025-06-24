<!-- Hamburger Button (visible only on small screens) -->
<div class="hamburger " id="hamburger">
    <span></span>
    <span></span>
    <span></span>
</div>

@push('styles')
    <style>
        /* Hamburger Button */
        .hamburger {
            display: inline-block;
            cursor: pointer;
            z-index: 1001;
        }

        .hamburger span {
            display: block;
            width: 25px;
            height: 3px;
            background-color: black;
            margin: 5px 0;
            transition: 0.4s;
        }

        /* Navigation Menu */
        .nav-menu {
            position: fixed;
            top: 10px;
            left: 100px;
            width: 250px;
            height: 100vh;
            background: #162241;
            color: #162241;
            padding-top: 60px;
            transition: right 0.4s ease;
            z-index: 1000;
        }

        .nav-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-menu ul li {
            padding: 15px 20px;
        }

        .nav-menu ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        /* Show menu when active */
        .nav-menu.active {
            right: 0;
        }

        /* Optional: change hamburger style on open */
        .hamburger.open span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .hamburger.open span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.open span:nth-child(3) {
            transform: rotate(-45deg) translate(5px, -5px);
        }

        .hamburger {
            position: fixed;
            top: 20px;
            right: 20px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('navbarmain');

        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('open');
            navMenu.classList.toggle('active');
        });
    </script>
@endpush
