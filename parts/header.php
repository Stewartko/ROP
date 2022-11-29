    <nav>
    <div class="profile">
        <a href="login.php" class="login"><?php if($_SESSION != true) echo "Log In"; ?></a>
        <a href="logout.php" class="login"><?php if($_SESSION == true) echo "Log Out"; ?></a>
    </div>

    <div class="logo">
        <a href="index.php">
            <img src="media/logo/gprotect-01.svg" alt="">
        </a>
    </div>

    <ul class="nav-menu">
        
                <li class="nav-item">
                    <a href="#" class="nav-link">Sklá</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Kontakt</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Profil</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
    </nav>