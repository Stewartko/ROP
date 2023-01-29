<nav>
    <div class="profile">
        <?php if($_SESSION == true) {
            ?>
                <a href="logout.php"><i class="fa fa-user" aria-hidden="true"></i></a>
                <div class="dropdown-content" >
                    <a href="logout.php" class="login">Odhlásenie</a>
                    <a href="profile.php" class="nav-link">Profil</a>
                </div>
        <?php
        }else{
            ?>
            <a href="login.php"><i class="fa fa-user" aria-hidden="true"></i></a>
        <?php
        }
        ?>
        <a  href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
        <a><div id="cartAmount" class="cartAmount">0</div></a> 
    </div>

    <div class="logo">
        <a href="index.php">
            <img src="media/logo/gprotect-01.svg" alt="">
        </a>
    </div>

    <ul class="nav-menu">
        
                <li class="nav-item">
                    <a href="products.php" class="nav-link">Sklá</a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link">Kontakt</a>
                </li>
                <li class="nav-item">
                    <a href="recenzie.php" class="nav-link">Recenzie</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
    </nav>