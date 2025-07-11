<?php

use function PHPSTORM_META\elementType;
// Suppress warnings and notices, but still show fatal errors
error_reporting(E_ERROR);
ini_set('display_errors', 0); // Don't show them in browser
function component($room_id, $price, $image)
{
    $url = "reserve_room.php?room_id=" . $room_id . "&price=" . $price;
    $old_price = $price + 10;
    $element = "
    <div class=\"col-md-3 col-sm-6 my-md-0\">
    <form action=\"#\" method=\"get\">
        <div class=\"card shadow\">
            <div>
                <img src=\"res/img/$image\" alt=\"Room Image\" class=\"img-fluid card-img-top myimage\">
            </div>
            <div class=\"card-body my-card-body\">
                <h5 class=\"card-title\">Room $room_id</h5>
                <h6>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"far fa-star\"></i>
                </h6>
                <p class=\"card-text\">
                    Some quick example text to build on the card.                                
                </p>
                <h5>
                    <small><s class=\"text-secondary\">€$old_price</s></small>
                    <span class=\"price\">€$price</span>
                </h5>
                <a href=\"$url\" <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"room_id=room_$room_id\">Book  <i class=\"fa-solid fa-cart-shopping\"></i></button></a>
            </div>
        </div>
    </form>

</div>
    
    ";
    echo $element;
}


function news_component($news_id, $news_image, $news_title, $news_text, $news_date)
{
    // TODO: implement news divs!


    $element = "
    <div class=\"card shadow news_card\">
    <form>
        <div>
            <img src=\"uploads/news/$news_image\" alt=\"$news_title\" class=\"img-fluid card-img-top myimage\">
        </div>
        <div class=\"card-body\">
            <h5 class=\"card-title\">$news_title</h5>
            <p class=\"card-text\">
                <small>{$news_text} <br><div class=\"text-right\"><b >Created on: {$news_date}</b></div></small>
            </p>
        </div>
    </form>
    <br>
    </div>
    ";
    echo $element;
}

function news_component_admin($news_id, $news_image, $news_title, $news_text, $news_date)
{

    $element = "
    <div class=\"card shadow news_card\">
    <form class=\"news_card\" action=\"./inc/delete_news.php?news_id=$news_id\" method=\"post\">
        <div>
        <img src=\"uploads/news/$news_image\" alt=\"$news_title\" class=\"img-fluid card-img-top myimage\">
        </div>
            <div class=\"card-body\">
            <h5 class=\"card-title\">$news_title</h5>
            <p class=\"card-text\">
                <small>{$news_text} <br><div class=\"text-right\"><b >Created on: {$news_date}</b></div></small>
            </p>
            <button type=\"submit\" class=\"btn admin-button float-end\" name=\"news_$news_id\">Delete</button>
        </div>
    </form>
    <br>
    <div>
    ";

    echo $element;
}

function insert_upload_form()
{
    $element = "
    <form action=\"./inc/upload.php\" method=\"POST\" enctype=\"multipart/form-data\">
        <div class=\"mb-3\">
            <label for=\"title\" class=\"form-label\">Title:</label>
            <input type=\"text\" class=\"form-control my-text\" id=\"title\" placeholder=\"Title of the News\" name=\"title\">
        </div>
        <div class=\"mb-3\">
            <label for=\"textarea\" class=\"form-label\">input your text below:</label>
            <textarea class=\"form-control my-text\"id=\"textarea\" rows=\"5\" name=\"text\"></textarea>
        </div>
        <div class=\"mb-3\">
            <label for=\"formFile\" class=\"form-label\">Default file input example</label>
            <input class=\"form-control  my-text\" type=\"file\" id=\"formFile\" name=\"file\">
        </div>
        <button class=\"btn btn-primary\" type=\"submit\" name=\"submit\">UPLOAD</button>
    </form>
    ";

    echo $element;
}

function reserveComponent($username, $room_id, $from_date, $to_date, $price,  $has_animal, $has_parking, $has_breakfast, $reserved_on, $is_approved)
{
    // TODO: IMPLEMENT
    //echo $username,$room_id, $from_date, $to_date,$price,  $has_animal, $has_parking, $has_breakfast, $reserved_on, $is_approved;

    $approved_label = ($is_approved) ? 'Approved' : '';
    $breakfast_label = ($has_breakfast) ? 'checked' : '';
    $animal_label = ($has_animal) ? 'checked' : '';
    $parking_label = ($has_parking) ? 'checked' : '';
    $approved_switch_label = ($is_approved) ? 'checked' : '';
    $from_date_label = substr($from_date, 0, 10);
    $to_date_label = substr($to_date, 0, 10);


    $element = "
<div class=\"row text-center py-2\">
    <div class=\"col-md-12 col-sm-12 my-12 my-md-12\">
    <form action=\"./inc/approve.php\" method=\"get\">
        <div class=\"card shadow news_card\">
            <div>

            </div>
            <div class=\"card-body news_card\">
                <h5 class=\"card-title\">Room $room_id</h5>
                <h6>


                    <ol class=\"list-group list-group\">
                        <li class=\"list-group-item  justify-content-between align-items-start my-reserve\">
                            <span id=\"blue-approved\" class=\"badge bg-primary rounded-pill position-absolute top-0 end-0\">$approved_label</span>
                            <div class=\"ms-2 me-auto\">

                                <ul class=\"list-group list-group-horizontal \">
                                    <li class=\"list-group-item flex-fill news_card\">
                                        <p class=\"card-text\">
                                        <div>Username: $username</div>
                                        <input type=\"hidden\" id=\"custId\" name=\"username\" value=\"$username\">
                                        <div>Room Number: $room_id</div>

                                        <div>Reserved On: $reserved_on</div>
                                        <input type=\"hidden\" id=\"custId\" name=\"reserved_on\" value=\"$reserved_on\">

                                        </p>
                                    </li>
                                    <li class=\"list-group-item flex-fill news_card\">
                                        <p>
                                        <div><input class=\"form-check-input me-1 my-check\" type=\"checkbox\" value=\"\" aria-label=\"...\" $breakfast_label>
                                            <!--checked-->
                                            Breakfast
                                        </div>
                                        <div><input class=\"form-check-input me-1 my-check\" type=\"checkbox\" value=\"\" aria-label=\"...\" $animal_label>
                                            Animal</div>
                                        <div><input class=\"form-check-input me-1 my-check\" type=\"checkbox\" value=\"\" aria-label=\"...\" $parking_label>
                                            Parking</div>
                                        </p>
                                    </li>
                                    <li class=\"list-group-item flex-fill news_card\">
                                        <p>
                                        <div>From Date: $from_date_label </div>
                                        <div>To Date: $to_date_label</div>
                                        <div>Price: $price €</div>
                                        </p>
                                    </li>
                                </ul>



                                <div class=\"row justify-content-evenly news_card\">
                                    <div class=\"col-4\">
                                        <div class=\"form-check form-switch approved\">
                                            <span id=\"approvedText\">Approve</span>
                                            <input class=\"form-check-input my-reserve\" type=\"checkbox\" role=\"switch\" id=\"flexSwitchCheckChecked\" name=\"approve\" $approved_switch_label>
                                            <!--checked-->
                                        </div>
                                    </div>
                                    <div class=\"col-4\">
                                        <button type=\"submit\" class=\"btn btn-danger my-3\" >Save <i class=\"fa-solid fa-cart-shopping \"></i></button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ol>
            </div>
        </div>
    </form>

    </div>   
</div> 
    ";

    echo $element;
}

function reserveUserComponent($username, $room_id, $from_date, $to_date, $price,  $has_animal, $has_parking, $has_breakfast, $reserved_on, $is_approved)
{
    // TODO: IMPLEMENT
    //echo $username,$room_id, $from_date, $to_date,$price,  $has_animal, $has_parking, $has_breakfast, $reserved_on, $is_approved;

    $approved_label = ($is_approved) ? 'Approved' : '';
    $breakfast_label = ($has_breakfast) ? 'checked' : '';
    $animal_label = ($has_animal) ? 'checked' : '';
    $parking_label = ($has_parking) ? 'checked' : '';
    $approved_switch_label = ($is_approved) ? 'checked' : '';
    $from_date_label = substr($from_date, 0, 10);
    $to_date_label = substr($to_date, 0, 10);


    $element = "
<div class=\"row text-center py-2\">
<div class=\"col-md-12 col-sm-12 my-12 my-md-12\">
<form action=\"./inc/delete_reservation.php\" method=\"get\">
    <div class=\"card shadow\">
        <div>

        </div>
        <div class=\"card-body my-reserve-rooms\">
            <h5 class=\"card-title\">Room $room_id</h5>
            <h6>


                <ol class=\"list-group list-group\">
                    <li class=\"list-group-item news_card justify-content-between align-items-start\">
                        <span id=\"blue-approved\" class=\"badge bg-primary rounded-pill position-absolute top-0 end-0\">$approved_label</span>
                        <div class=\"ms-2 me-auto\">

                            <ul class=\"list-group list-group-horizontal\">
                                <li class=\"list-group-item news_card flex-fill \">
                                    <p class=\"card-text\">
                                    <div>Username: $username</div>
                                    <input type=\"hidden\" id=\"custId\" name=\"username\" value=\"$username\">
                                    <div>Room Number: $room_id</div>

                                    <div>Reserved On: $reserved_on</div>
                                    <input type=\"hidden\" id=\"custId\" name=\"reserved_on\" value=\"$reserved_on\">

                                    </p>
                                </li>
                                <li class=\"list-group-item news_card flex-fill \">
                                    <p>
                                    <div><input class=\"form-check-input me-1\" type=\"checkbox\" value=\"\" aria-label=\"...\" $breakfast_label disabled>
                                        <!--checked-->
                                        Breakfast
                                    </div>
                                    <div><input class=\"form-check-input me-1\" type=\"checkbox\" value=\"\" aria-label=\"...\" $animal_label disabled>
                                        Animal</div>
                                    <div><input class=\"form-check-input me-1\" type=\"checkbox\" value=\"\" aria-label=\"...\" $parking_label disabled>
                                        Parking</div>
                                    </p>
                                </li>
                                <li class=\"list-group-item news_card flex-fill \">
                                    <p>
                                    <div>From Date: $from_date_label </div>
                                    <div>To Date: $to_date_label</div>
                                    <div>Price: $price €</div>
                                    </p>
                                </li>
                            </ul>



                            <div class=\"row justify-content-evenly\">
                                <div class=\"col-4\">
                                    <div class=\"form-check form-switch approved\">
                                        <span id=\"approvedText\">Approve</span>
                                        <input class=\"form-check-input\" type=\"checkbox\" role=\"switch\" id=\"flexSwitchCheckChecked\" name=\"approve\" $approved_switch_label disabled>
                                        <!--checked-->
                                    </div>
                                </div>
                                <div class=\"col-4\">
                                    <button type=\"submit\" class=\"btn btn-danger my-3\" >Cancel</button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ol>
        </div>
    </div>
</form>

</div>   
</div> 
";

    echo $element;
}

function userComponent($username, $first_name, $last_name, $email, $gender,  $password, $title, $is_admin, $is_active)
{

    $is_active_label = ($is_active) ? 'Active' : '';
    $is_active_switch_label = ($is_active) ? 'checked' : '';

    $element = "
    <div class=\"row text-center py-2 news_card user_card rounded-bottom\">
        <form action=\"./users_modify.php\" method=\"get\" class=\"news_card user_card\">
            <div class=\"card shadow news_card\">
                <div>
    
                </div>
                <div class=\"card-body news_card\">
                    <h5 class=\"card-title\">Username $username</h5>
                    <input type=\"hidden\" id=\"custId\" name=\"username\" value=\"$username\">

                    <h6>
    
    
                        <ol class=\"list-group list-group news_card\">
                            <li class=\"list-group-item news_card justify-content-between align-items-start\">
                                <span id=\"blue-approved\" class=\"badge bg-primary rounded-pill position-absolute top-0 end-0\">$is_active_label</span>
                                <div class=\"ms-2 me-auto news_card\">
    
                                    <ul class=\"list-group list-group-horizontal\">
                                        <li class=\"list-group-item flex-fill news_card\">
                                            <p class=\"card-text\">
                                            <div>Username: $username</div>
                                            
                                            <div>First Name : $first_name</div>
    
                                            <div>Last Name: $last_name</div>
    
                                            </p>
                                        </li>
                                        <li class=\"list-group-item flex-fill news_card\">
                                            <p>
                                                <div>Email: $email</div>
                                                
                                                <div>Gender: $gender</div>
        
                                                <div>Title: $title </div>
                                            </p>
                                        </li>
                                        <li class=\"list-group-item flex-fill news_card\">
                                            <p>
                                            <div>Is Admin: $is_admin </div>
                                            <div>Is Active: $is_active</div>

                                            </p>
                                        </li>
                                    </ul>
    
    
    
                                    <div class=\"row justify-content-evenly\">
                                        <div class=\"col-4\">
                                            <div class=\"form-check form-switch approved\">
                                                <span id=\"approvedText\">Avtive</span>
                                                <input class=\"form-check-input\" type=\"checkbox\" role=\"switch\" id=\"flexSwitchCheckChecked\" $is_active_switch_label>
                                                <!--checked-->
                                            </div>
                                        </div>
                                        <div class=\"col-4\">
                                            <button type=\"submit\" class=\"btn btn-success my-3\" >Edit User</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ol>
                </div>
            </div>
        </form>
    
    </div> 
        ";

    echo $element;
}
