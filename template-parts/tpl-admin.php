<?php

/**
 * Template Name: Admin chat
 */

get_header('admin'); ?>
<div class="wrapper">
        <div class="container">
            <div class="left">
                <div class="top">
                </div>
                <ul id="listPeople" class="people">
                </ul>
                <button id="loadMoreBtn">Afficher plus</button>
            </div>


            <div id="messageContainer" class="right">
                <div class="top"><span>To: <span class="name"></span></span></div>

            </div>
        </div>
    </div>
<?php get_footer('admin'); ?>
