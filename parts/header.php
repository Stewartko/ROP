<nav>
    <div class="profile">
        <?php if(!empty($_SESSION["id"])) {
            ?>
                <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
        <?php
        }else{
            ?>
            <a href="login.php"><i class="fa fa-user" aria-hidden="true"></i></a>
        <?php
        }
        ?>
        <a  href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
        <a><div id="cartAmount" class="cartAmount"><?php if(!empty($_SESSION["shopping_cart"])){ echo COUNT($_SESSION["shopping_cart"]);}else{echo '0';}?></div></a> 
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
        <?php
        if(!empty($_SESSION["id"])){
        ?>
            <li class="nav-item">
                <a href="profile.php" class="nav-link">Profil</a>
            </li>
        <?php
        }
        ?>
    </ul>
    <div class="hamburger">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    </nav>