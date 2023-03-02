<main>
    <nav class=" navbar-expand-lg navbar-light bg-light topnav">
        <a class="navbar-brand text-white fw-bold" href="#">DoorDekho.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse topnav-right" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto float-end">
                <li class="nav-item active">
                    <a class="nav-link text-light nav-menu mx-3 active" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light nav-menu mx-3" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light nav-menu mx-3" href="#">Contact Us</a>
                </li>
            </ul>
            <?= $this->Html->link("Login", ['controller' => 'users', 'action' => 'login'], ['class' => 'btn btn-outline-light fw-bold py-1 mx-3']) ?>
        </div>
    </nav>