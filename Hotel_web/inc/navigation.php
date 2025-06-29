<?php
// edit account in line 120 and ..
session_start();

function insert_nav(){
    //echo "inside insert_nav";
    if(isset($_SESSION["username"])){
        if(isset($_SESSION["is_admin"])){
            if($_SESSION["is_admin"]=="1"){
                insert_nav_admin();
            }else{
                insert_nav_user();
            }
        }
    }else{
        insert_nav_guest();
    }
}

function insert_nav_guest(){
    // echo "inside insert_nav_guest";
    $first_name = "Guest";
    $last_name = "User";
    $username = "Guest";
    $element = "
    <nav class=\"navbar navbar-dark bg-dark fixed-top my-nav\">
      <div class=\"container-fluid\">
        <a class=\"navbar-brand header-font\" href=\"#\">Nirvana Hotel</a>
        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasDarkNavbar\" aria-controls=\"offcanvasDarkNavbar\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"offcanvas offcanvas-end text-bg-dark\" tabindex=\"-1\" id=\"offcanvasDarkNavbar\" aria-labelledby=\"offcanvasDarkNavbarLabel\">
          <div class=\"offcanvas-header my-nav-header name-text\">
            <h5 class=\"offcanvas-title\" id=\"offcanvasDarkNavbarLabel\">$first_name $last_name</h5>
            <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
          </div>
          <div class=\"offcanvas-body my-right-nav\">
            <ul class=\"navbar-nav justify-content-end flex-grow-1 pe-3\">
            <li class=\"nav-item\">
              <a class=\"nav-link active my-font-register\" aria-current=\"page\" href=\"rooms.php\">Home</a>
            </li>
            
            <li class=\"nav-item\">
                  <a class=\"nav-link my-font-register\" href=\"news_page.php\">News</a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link my-font-register\" href=\"about-me.php?page=about-us.php\">About</a>
            </li>
            <li class=\"nav-item\">
            <a class=\"nav-link my-font-register\" href=\"help.php\">Help</a>
            </li>            
            <li class=\"nav-item\">
            <a class=\"nav-link my-font-register\" href=\"contact-us.php\">Contact Us</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link my-font-register\" href=\"room_information.php\">Check Availability</a>
            </li>
              <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle my-font-register\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                  Log In
                </a>
                <ul class=\"dropdown-menu dropdown-menu-dark  my-dropdown\">
                  <li><a class=\"dropdown-item\" href=\"index.php\">Sign In</a></li>
                  <li><a class=\"dropdown-item\" href=\"register.php\">Sign Up</a></li>
                  
                    
                </ul>
              </li>
            </ul>
            <form class=\"d-flex mt-3\" role=\"search\" action=\"./inc/search.php\">
              <input class=\"form-control me-2 font-blue my-card-body\" type=\"search\" placeholder=\"Find places near the hotel\" aria-label=\"Search\" name=\"searched_item\">
              <button class=\"btn btn-success my_button my-font-register\" type=\"submit\">Search</button>
            </form>
          </div>
        </div>
      </div>
    </nav>
    
    <!-- end of nav bar Code -->
    ";
    echo $element;

}
    
function insert_nav_user(){
    // echo "inside insert_nav_guest";
    $first_name = $_SESSION["first_name"];
    $last_name = $_SESSION["last_name"];
    $username = $_SESSION["username"];
    $element = "
    <nav class=\"navbar navbar-dark bg-dark fixed-top my-nav\">
      <div class=\"container-fluid\">
        <a class=\"navbar-brand header-font\" href=\"#\">Nirvana Hotel</a>
        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasDarkNavbar\" aria-controls=\"offcanvasDarkNavbar\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"offcanvas offcanvas-end text-bg-dark\" tabindex=\"-1\" id=\"offcanvasDarkNavbar\" aria-labelledby=\"offcanvasDarkNavbarLabel\">
          <div class=\"offcanvas-header my-nav-header name-text\">
            <h5 class=\"offcanvas-title\" id=\"offcanvasDarkNavbarLabel\">$first_name $last_name</h5>
            <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
          </div>
          <div class=\"offcanvas-body my-right-nav\">
            <ul class=\"navbar-nav justify-content-end flex-grow-1 pe-3\">
              <li class=\"nav-item\">
                <a class=\"nav-link active my-font-register\" aria-current=\"page\" href=\"rooms.php\">Home</a>
              </li>
              
              <li class=\"nav-item\">
                    <a class=\"nav-link my-font-register\" href=\"news_page.php\">News</a>
              </li>
              <li class=\"nav-item\">
                <a class=\"nav-link my-font-register\" href=\"about-me.php?page=about-us.php\">About</a>
              </li>
              <li class=\"nav-item\">
              <a class=\"nav-link my-font-register\" href=\"help.php\">Help</a>
              </li>
              <li class=\"nav-item\">
            <a class=\"nav-link my-font-register\" href=\"contact-us.php\">Contact Us</a>
            </li>
              <li class=\"nav-item\">
              <a class=\"nav-link my-font-register\" href=\"reserve_user.php\">My Reservations</a>
              </li>      
              <li class=\"nav-item\">
                <a class=\"nav-link my-font-register\" href=\"room_information.php\">Check Availability</a>
              </li>
              <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle my-font-register\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                  Account
                </a>
                <ul class=\"dropdown-menu dropdown-menu-dark my-dropdown\">
                  <li><a class=\"dropdown-item\" href=\"index.php\">Switch User</a></li>
                  <li><a class=\"dropdown-item\" href=\"inc/delete_session.php\">Log out</a></li>
                  <li>
                    <hr class=\"dropdown-divider\">
                    </li>
                    <li><a class=\"dropdown-item\" href=\"user.php\">Edit Account</a></li>
                                        
                </ul>
              </li>
            </ul>
            <form class=\"d-flex mt-3\" role=\"search\" action=\"./inc/search.php\">
              <input class=\"form-control me-2 my-card-body font-blue\" type=\"search\" placeholder=\"Find places near the hotel\" aria-label=\"Search\" name=\"searched_item\">
              <button class=\"btn btn-success my_button my-font-register\" type=\"submit\">Search</button>
            </form>
          </div>
        </div>
      </div>
    </nav>
    
    <!-- end of nav bar Code -->
    ";
    echo $element;


}

function insert_nav_admin(){
    //echo "inside insert_nav_admin";
    $first_name = $_SESSION["first_name"];
    $last_name = $_SESSION["last_name"];
    $username = $_SESSION["username"];
    $element = "
    <nav class=\"navbar navbar-dark bg-dark fixed-top my-nav \">
      <div class=\"container-fluid\">
        <a class=\"navbar-brand header-font\" href=\"#\">Nirvana Hotel</a>
        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasDarkNavbar\" aria-controls=\"offcanvasDarkNavbar\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"offcanvas offcanvas-end text-bg-dark\" tabindex=\"-1\" id=\"offcanvasDarkNavbar\" aria-labelledby=\"offcanvasDarkNavbarLabel\">
          <div class=\"offcanvas-header my-nav-header\">
            <h5 class=\"offcanvas-title name-text\" id=\"offcanvasDarkNavbarLabel\">$first_name $last_name</h5>
            <h4 class=\"offcanvas-title\" id=\"offcanvasDarkNavbarLabel\" style=\"color:#F2D399 ;\">You're Admin!</h4>
            <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
          </div>
          <div class=\"offcanvas-body my-right-nav\">
            <ul class=\"navbar-nav justify-content-end flex-grow-1 pe-3\">
            <li class=\"nav-item\">
              <a class=\"nav-link active my-font-register\" aria-current=\"page\" href=\"rooms.php\">Home</a>
            </li>
            
            <li class=\"nav-item\">
                  <a class=\"nav-link my-font-register\" href=\"news_page.php\">News</a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link my-font-register\" href=\"about-me.php?page=about-us.php\">About</a>
            </li>
            <li class=\"nav-item\">
            <a class=\"nav-link my-font-register\" href=\"help.php\">Help</a>
            </li>
            <li class=\"nav-item\">
            <a class=\"nav-link my-font-register\" href=\"contact-us.php\">Contact Us</a>
            </li>
            <li class=\"nav-item\">
            <a class=\"nav-link my-font-register\" href=\"reserves.php\">Reservations</a>
            </li> 
            <li class=\"nav-item\">
            <a class=\"nav-link my-font-register\" href=\"users.php\">Users</a>
            </li> 
            <li class=\"nav-item\">
                <a class=\"nav-link my-font-register\" href=\"room_information.php\">Check Availability</a>
              </li>
              <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle  my-font-register\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                  Account
                </a>
                <ul class=\"dropdown-menu dropdown-menu-dark my-dropdown\">
                  <li><a class=\"dropdown-item\" href=\"index.php\">Switch User</a></li>
                  <li><a class=\"dropdown-item\" href=\"inc/delete_session.php\">Log out</a></li>
                  <li>
                    <hr class=\"dropdown-divider\">
                    </li>
                    <li><a class=\"dropdown-item\" href=\"user.php\">Edit Account</a></li>
                                        
                </ul>
              </li>
            </ul>
            <form class=\"d-flex mt-3\" role=\"search\" action=\"./inc/search.php\">
              <input class=\"form-control me-2 my-card-body font-blue\" type=\"search\" placeholder=\"Find places near the hotel\" aria-label=\"Search\" name=\"searched_item\">
              <button class=\"btn my_button my-font-register\" type=\"submit\">Search</button>
            </form>
          </div>
        </div>
      </div>
    </nav>
    
    <!-- end of nav bar Code -->
    ";
    echo $element;


}
