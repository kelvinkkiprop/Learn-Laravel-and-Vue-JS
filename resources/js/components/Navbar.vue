<template>
    <nav class="navbar navbar-expand-sm bg-info navbar-dark mb-2">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="#">Articles</a>
              <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar"> 
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/">Articles</a>
                    </li>

                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Create Content
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Add Article</a>
                        <a class="dropdown-item" href="#">Edit Article</a>
                    </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav> 
</template>