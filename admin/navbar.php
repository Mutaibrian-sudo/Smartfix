<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .navbar {
        background: linear-gradient(to right,rgb(0, 17, 116),rgb(6, 102, 126)); /* Gradient Blue */
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;
        width: 100vw;
        position: relative;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .navbar .logo {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .nav-links {
        list-style: none;
        display: flex;
        gap: 20px;
    }

    .nav-links li a {
        color: white;
        text-decoration: none;
        font-weight: bold;
    }

    .nav-links li a:hover {
        text-decoration: underline;
    }

    .hamburger {
        display: none;
        font-size: 24px;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .nav-links {
            display: none;
            flex-direction: column;
            background-color: #007bff;
            position: absolute;
            top: 60px;
            right: 20px;
            width: 160px;
            border-radius: 8px;
            padding: 10px;
        }

        .nav-links.active {
            display: flex;
        }

        .hamburger {
            display: block;
        }
    }
</style>

<nav class="navbar">
    <div class="logo">SmartFix</div>
    <ul class="nav-links" id="navLinks">
        <li><a href="../admin/admin_dashboard.php">Dashboard</a></li>
        <li><a href="../admin/admin_manage_services.php">Manage Services</a></li>
        <li><a href="../admin/admin_manage_users.php">Manage users</a></li>
        <li><a href="../pages/contact.php">Contact</a></li>
        <li><a href="../authentication/logout.php">Logout</a></li>
    </ul>
    <div class="hamburger" id="hamburger">&#9776;</div>
</nav>

<script>
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('navLinks');

    hamburger.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });
</script>
