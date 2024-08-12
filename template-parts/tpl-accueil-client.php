<?php

/**
 * Template Name: Accueil client
 */

get_header("client"); ?>
    <div class="floating-chat">
            <div class="new-message hidden">
                <i class="fa-solid fa-1"></i>
            </div>
            
            <i class="fa fa-comments" aria-hidden="true"></i>
            <div class="chat container-fluid">
                <div class="header">
                    <span class="title">
                        ChatLive
                    </span>
                    <button type="button" class="btn-close btn-close-white" aria-label="Close"></button>
                </div>
                <ul id="chat" class="messages">
                </ul>
                <div class=" footer">
                    <div class="container">
                        <div class="row ">
                            <div id="response" class="col-12 hidden">
                                <input type="text" id="responseInput" placeholder="Entrez votre réponse" class="form-control text-box " />
                            </div>
                            
                            <div id="simpleMessage" class="col-12 hidden">
                                <input type="text" id="simpleMessageInput" placeholder="Entrez un message" class=" form-control text-box " />
                            </div>
                            
                            
                            <div id="fileInput" class="col-9 hidden mt-2 ">
                                <input type="file" id="fileInputValue" class="form-control  " title=" "/>
                            </div>
                            
                            
                            <div id="sendButton" class="col-2 mt-2 hidden ">
                                <button type="button" onclick="sendResponse()" class=" btn btn-primary ">Send</button>
                            </div>
                            <div id="sendSimpleMessageButton" class="col-2 mt-2 hidden">
                                <button type="button" onclick="sendMessage()" class=" btn btn-primary ">Send</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php get_footer('client'); ?>
