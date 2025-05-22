<?php

/**
 * Template Name: Admin chat
 */

get_header('admin'); ?>
<div class="wrapper">
        <div class="container pt-2 pb-5 m-4">
            <div class="mb-2">
                <input type="text" id="searchInput" required placeholder="Rechercher...">
                <button onclick="rechercher()">Rechercher</button>
                <button id="reset" onclick="reinitialiser()" disabled>Reinitialiser le filtre</button>
            </div>
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
