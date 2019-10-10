<template>
  <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
      <div class="container">
          <a class="navbar-brand" href='/'>AutoSell</a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->

              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="/about">Apie</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/ads">Skelbimai</a>
                </li>
              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                    <li class="nav-item">
                      <a class="nav-link" href="/login">Log in</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/register">Register</a>
                    </li>

              </ul>
          </div>
      </div>
  </nav>

</template>
