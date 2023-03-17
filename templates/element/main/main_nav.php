<main>
    <nav class=" navbar-expand-lg navbar-light bg-light topnav">
        <a class="navbar-brand text-white fw-bold" href="/users">DoorsDekho.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse topnav-right" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto float-end">
                <li class="nav-item active">
                    <a class="nav-link text-light nav-menu px-3 mx-3 active" href="/users">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light nav-menu px-3 mx-3" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light nav-menu px-3 mx-3" href="#">Contact Us</a>
                </li>
            </ul>
            <?= $this->Html->link("Login", ['controller' => 'Users', 'action' => 'login'], ['type' => 'button', 'class' => 'btn btn-light text-dark fw-bold py-1 mx-3']) ?>
        </div>
    </nav>