<template>
    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topbar-right-menu float-right mb-0">

            

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown"
                   href="#" role="button" aria-haspopup="false"
                   aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="images/users/avatar-1.jpg" alt="user-image"
                                             class="rounded-circle">
                                    </span>
                    <span>
                                        <span class="account-user-name">Dominic Keller</span>
                                        <span class="account--user-name"><router-link to="/logout">Logout</router-link></span>
                                        
                                    </span>
                </a>
               
            </li>

        </ul>
        <button class="button-menu-mobile open-left disable-btn">
            <i class="mdi mdi-menu"></i>
        </button>
        <div class="app-search">
            <form>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="mdi mdi-magnify"></span>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end Topbar -->
</template>