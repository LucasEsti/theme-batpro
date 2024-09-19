    <!-- Footer vaovao -->
    <footer>
        <?php 
                    $version = "";
if (get_field('version_page') == "en") {
                        $version = "_en";
                    }
                    ?>
        
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 d-flex align-items-center">
                    <div class="row">
                        <a href="<?php echo get_home_url(); ?>" class="logo-footer col-6">
                            <?php if( get_field('logo_footer', 'option') ): ?>
                                <img src="<?php the_field('logo_footer', 'option'); ?>" class="img-fluid" width="200" alt="Logo">
                            <?php endif; ?>
                        </a>
                        <?php if( get_field('logo_footer2', 'option') ): ?>
                            <div class="logos col-6 row d-flex justify-content-center">
                                <a href="<?php the_field('lien_certification' . $version, 'option'); ?>"><img src="<?php the_field('logo_footer2', 'option'); ?>" class="img-fluid" alt="Logo"></a>
                                <a href="<?php the_field('lien_certification' . $version, 'option'); ?>">ISO 9001</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- <div class="col-sm-2 menus">
                    <div class="titres">Informations</div>
                    <?php // wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'menu-footer', 'menu_id' => 'menu-footer' ) ); ?>
                </div> -->
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 noustrouver">
                    <div class="titres"><?php the_field('nous_trouver' . $version, 'option'); ?></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p><strong>Antananarivo</strong></p>
                            <ul class="infos">
                                <?php if( get_field('antananarivo_adresse', 'option') ): ?>
                                    <li><i class="fas fa-map-marker-alt"></i><?php the_field('antananarivo_adresse', 'option'); ?></li>
                                <?php endif; ?>
                                <?php if( get_field('email_antananarivo', 'option') ): ?>
                                    <li><a href="mailto:<?php the_field('email_antananarivo', 'option'); ?>"><i class="fas fa-envelope"></i><?php the_field('email_antananarivo', 'option'); ?></a></li>
                                <?php endif; ?>
                                <?php if( get_field('tel_antananarivo', 'option') ): ?>
                                    <li><i class="fas fa-phone-alt"></i><?php the_field('tel_antananarivo', 'option'); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <p><strong>Toamasina</strong></p>
                            <ul class="infos">
                                <?php if( get_field('toamasina_adresse', 'option') ): ?>
                                    <li><i class="fas fa-map-marker-alt"></i><?php the_field('toamasina_adresse', 'option'); ?></li>
                                <?php endif; ?>
                                <?php if( get_field('email_toamasina', 'option') ): ?>
                                    <li><a href="mailto:<?php the_field('email_toamasina', 'option'); ?>">
                                            <i class="fas fa-envelope"></i><?php the_field('email_toamasina', 'option'); ?></a></li>
                                <?php endif; ?>
                                <?php if( get_field('tel_toamasina', 'option') ): ?>
                                    <li><i class="fas fa-phone-alt"></i><?php the_field('tel_toamasina', 'option'); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-2 col-sm-2 partenaires d-flex justify-content-center align-items-center flex-column">
                    <?php if( get_field('icone_plaquette', 'option') ): ?>
                        <img src="<?php the_field('icone_plaquette', 'option'); ?> " class="img-fluid" alt="Logo">
                        <a class="" href="<?php the_field('url_plaquette_digital' . $version, 'option'); ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php the_field('plaquette' . $version, 'option'); ?>" style="text-align: center; color: red;">
                            <strong><?php if (get_field('version_page') === "fr"): echo "FR"; else: echo "EN"; endif; ?></strong>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>
   
    <!-- Copyright -->
    <div id="copyright" style="background: url('<?php the_field('background', 'option'); ?>'); background-repeat: no-repeat; background-size: cover;  background-position: center;">
<!--        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <?php // if( get_field('copyright', 'option') ): ?>
                        <div>
                            <?php // the_field('copyright', 'option'); ?> 
                        ‎</div>
                    <?php // endif; ?>
                </div>
            </div>
        </div>-->
    </div>

    <div class="floating-chat hidden">
            <div class="new-message hidden">
                <i class="fa-solid fa-1"></i>
            </div>
            
            <i class="fa fa-comments" aria-hidden="true"></i>
            <div class="chat container-fluid">
                <div class="header">
                    <span class="title" style="align-self: flex-end;">
                        BatSupport
                    </span>
                    <button type="button" class="btn btn-link" aria-label="Close"><i class="fa-regular fa-window-minimize text-white"></i></button>
                </div>
                <ul id="chat" class="messages">
                </ul>
                <div class=" footer">
                    <div class="container">
                        <div class="row ">
                            <div id="response" class="col-8 hidden">
                                <input type="text" id="responseInput" placeholder="Entrez votre réponse" class="form-control text-box " />
                            </div>
                            
                            <div id="simpleMessage" class="col-8 hidden">
                                <input type="text" id="simpleMessageInput" placeholder="Entrez un message" class=" form-control text-box " />
                            </div>
                            
                            
                            <div id="fileInput" class="col-2 hidden ">
                                <label for="fileInputValue" class="custom-file-upload">
                                        <i class="fa-regular fa-file"></i>
                                </label>
                                <input type="file" id="fileInputValue" class="form-control" title=" "/>
                            </div>
                            
                            
                            <div id="sendButton" class="col-2 hidden ">
                                <button type="button" onclick="sendResponse()" class=" btn btn-primary "><i class="fa-regular fa-paper-plane"></i></button>
                            </div>
                            <div id="sendSimpleMessageButton" class="col-2 hidden">
                                <button type="button" onclick="sendMessage()" class=" btn btn-primary "><i class="fa-regular fa-paper-plane"></i></button>
                            </div>
                            
                        </div>
                    </div>
                    
                    
                    
                </div>
            </div>
        </div>

<!--<script src="<?php bloginfo("template_url");  ?>/js/jquery-3.4.1.min.js"></script>-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<!--<script src="<?php bloginfo("template_url");  ?>/js/popper.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


<!--<script src="<?php bloginfo("template_url");  ?>/js/bootstrap.min.js"></script>-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!--<script src="<?php bloginfo("template_url");  ?>/js/slick.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--<script src="<?php bloginfo("template_url");  ?>/js/jquery.waypoints.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.0/jquery.waypoints.min.js" integrity="sha512-oy0NXKQt2trzxMo6JXDYvDcqNJRQPnL56ABDoPdC+vsIOJnU+OLuc3QP3TJAnsNKXUXVpit5xRYKTiij3ov9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="<?php bloginfo("template_url");  ?>/js/count.js"></script>


<!--<script src="<?php // bloginfo("template_url");  ?>/js/aos.js"></script>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php wp_footer(); ?>
<script src="<?php bloginfo("template_url");  ?>/js/script.js"></script> 

<script>
    
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        
        var langue = $("#upline").attr('lang');
        var more = "en savoir plus";
        var cartButton = " ajouter au panier";
        if($("#cookie-notice").length > 0 && langue == "en") {
            $("#cn-notice-text").text("We use cookies to ensure you get the best experience on our website. If you continue to use this site we will assume that you are happy with it."); 
            $("#cn-more-info").text("Privacy Policy");
            $("#cn-more-info").attr('href', 'https://batpro-madagascar.com/privacy-policy/');
            more = "learn more";
            cartButton = " add to cart";
        }
        
        $(".text_more").text(more);
        $(".cartButton span").text(cartButton);
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            autoplay:true,
            navText: ["<i class='fa-solid fa-angle-left '></i>", "<i class='fa-solid fa-angle-right '></i>"],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });
    });
</script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<?php
    $source = get_bloginfo("template_url");

    $uploadsUrl = $source . "/realtime-batpro/uploads/";
    ?>
    
    <script>
        function playNotificationSound() {
            const audio = new Audio('https://batpro-madagascar.com/wp-content/uploads/2024/09/livechat-129007.mp3'); 
            audio.play(); // Joue le son
        }
        var clientId = $.cookie('clientId');
        var newMessage = $(".new-message");
        
        let connex = "";
        if (clientId !== undefined) {
            connex = 'wss://batpro-madagascar.com/wp-content/themes/theme-batpro/realtime-batpro/server?type=client&userId=' + clientId;
        } else {
            connex = 'wss://batpro-madagascar.com/wp-content/themes/theme-batpro/realtime-batpro/server?type=client';
        }
        var conn = new WebSocket(connex);
        
        // Définir l'URL des uploads depuis PHP
        const uploadsUrl = '<?php echo $uploadsUrl; ?>';
        function isObject(value) {
            return value !== null && typeof value === 'object' && value.constructor === Object;
        }
        
        conn.onclose = function() {
                console.log('WebSocket is closed now.');
            };
        conn.onerror = function(error) {
            console.log('WebSocket error: ' + error.message);
        };
        
        var chat = document.getElementById('chat');
        var responseInput = document.getElementById('response');
        var sendButton = document.getElementById('sendButton');
        var simpleMessageInput = document.getElementById('simpleMessage');
        var sendSimpleMessageButton = document.getElementById('sendSimpleMessageButton');
        var fileInput = document.getElementById('fileInput');
//        var sendFileButton = document.getElementById('sendFileButton');
        var currentQuestionId = null;
        const imageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        
        conn.onopen = function() {
            console.log('WebSocket connection opened');
            $(".floating-chat").removeClass("hidden");
            const elementBounce = document.querySelector('.fa-comments');
            elementBounce.classList.add('animate__animated', 'animate__tada', "animate__delay-3s", "animate__infinite");
            setInterval(function() {
                console.log('Envoi du ping au serveur');
                conn.send(JSON.stringify({ type: 'ping' }));
            }, 120000);
        };
        
        conn.onmessage = function(e) {
            var data = JSON.parse(e.data);
            if (data.type === 'pong') {
                console.log('Pong reçu du serveur');
            }
//            var chatBox = document.getElementById('chatBox');
            if (data.type === 'id') {
                $.cookie('clientId', data.id, { expires: 7, path: '/' });
            } 
            
            if (data.type === 'listMessages') {
                console.log("listMessages");
                if (data.messageClient) {
                    console.log(data);
                    var statusMessage = 0;
                    
                    data.messageClient.forEach(message => {
                        
                        isClient = 'self';
                        if (message.isAdmin) {
                            isClient = 'other';
                        }

                        if (message.filePath) {
                            if (imageTypes.includes(message.fileType)) {
                                let img = document.createElement('img');
                                img.src = uploadsUrl + message.filePath;
                                img.className = "img-fluid";

                                var li = document.createElement('li');
                                li.className = isClient;
                                li.appendChild(img);
                                
                                chat.appendChild(li);
                                
                            } else {
                                let link = document.createElement('a');
                                link.href = uploadsUrl + message.filePath;
                                link.textContent = message.filePath;

                                var li = document.createElement('li');
                                li.className = isClient;
                                li.appendChild(link);
                                
                                chat.appendChild(li);
                                
                            }
                        }

                        if (message.message) {
                            var li = document.createElement('li');
                            li.className = isClient;
                            li.innerHTML = message.message;
                            chat.appendChild(li);
                        }
                        statusMessage = message.isReadClient;
                    });
                    
                    if (statusMessage == false) {
                        newMessage.removeClass("hidden");
                    }
                }
                if (data.lastQuestionSave == null) {
                    console.log("affiche");
                    simpleMessageInput.classList.remove('hidden');
                    sendSimpleMessageButton.classList.remove('hidden');
                    fileInput.classList.remove('hidden');
                    $(".choices").remove();
                    
                    responseInput.classList.add('hidden');
                    sendButton.classList.add('hidden');
                    
                } else {
                    console.log("affiche 2");
                    responseInput.classList.remove('hidden');
                    sendButton.classList.remove('hidden');
                    $(".choices").remove();
                    
                    simpleMessageInput.classList.add('hidden');
                    sendSimpleMessageButton.classList.add('hidden');
                    fileInput.classList.remove('hidden');
                }
                
            }
            
            if (data.questionOld) {
                console.log("questionOld");
                if (Object.keys(data.choicesOld).length > 0) {
                    var li = document.createElement('li');
                    li.className = 'other';
                    
                    for (var choice in data.choicesOld) {
                        var chatMessage = document.createElement('div');
                        chatMessage.textContent = data.choicesOld[choice];
                        
                        li.appendChild(chatMessage);
                        
                    }
                    
                    chat.appendChild(li);
                    
                } 
                
                var li = document.createElement('li');
                li.className = 'self';
                li.textContent = data.reponseQuestion;
                chat.appendChild(li);
            }
            
            let self = "other";
            if (data.self) {
                self = "self";
            }
            
            if (data.question) {
                
                console.log('question');
                console.log(data);
                currentQuestionId = data.question_id;  // Mise à jour de currentQuestionId
                
                var li = document.createElement('li');
                li.className = "other";
                console.log(data.question);
                li.textContent = data.question;
                chat.appendChild(li);
                
                $(".choices").remove();
                if (Object.keys(data.choices).length > 0) {
                    console.log('choice object');
                    var li = document.createElement('li');
                    li.classList.add('other', 'choices', 'class3');
                    
                    for (var choice in data.choices) {
                        var button = document.createElement('button');
                        button.innerHTML = data.choices[choice];
                        button.setAttribute('type', 'button');
                        button.classList.add('btn', 'btn-outline-primary', 'me-1', 'mb-1', 'mt-1');
                        button.onclick = (function(choice) {
                            return function() {
                                sendChoice(choice);
                            };
                        })(choice);
                        
                        li.appendChild(button);
                    }
                    
                    chat.appendChild(li);
                    
                    responseInput.classList.add('hidden');
                    sendButton.classList.add('hidden');
                    simpleMessageInput.classList.add('hidden');
                    sendSimpleMessageButton.classList.add('hidden');
                    fileInput.classList.add('hidden');
//                    sendFileButton.classList.add('hidden');
                } else {
                    console.log('not choices 1');
                    responseInput.classList.remove('hidden');
                    sendButton.classList.remove('hidden');
                    
                    simpleMessageInput.classList.add('hidden');
                    sendSimpleMessageButton.classList.add('hidden');
                    
                    if (!data.lien) {
                        fileInput.classList.add('hidden');
                    } else {
                        fileInput.classList.remove('hidden');
                    }
                    
//                    sendFileButton.classList.add('hidden');
                }
            } else if (data.message) {
                console.log("message");
                console.log(data.message);
                
                
                if (isObject(data.message)) {
                    if (imageTypes.includes(data.message["type"])) {
                        let img = document.createElement('img');
                        img.src = uploadsUrl + data.message["file-name"];
                        img.className = "img-fluid";

                        var li = document.createElement('li');
                        li.className = self;
                        li.appendChild(img);

                        chat.appendChild(li);
                    } else {
                        
                        let link = document.createElement('a');
                        link.href = uploadsUrl + data.message["file-name"];
                        link.target = '_blank';
                        link.textContent = data.message["file-name"];

                        var li = document.createElement('li');
                        li.className = self;
                        li.appendChild(link);

                        chat.appendChild(li);
                        
                    }
                } else {
                    
                    var li = document.createElement('li');
                    li.className = self;

                    var chatMessage = document.createElement('div');
                    chatMessage.textContent = data.message;

                    li.appendChild(chatMessage);
                    chat.appendChild(li);
                    
                    // Show input for simple message and file upload if the questionnaire is complete
                    if (data.message.includes('Bienvenue au service commercial')) {
                        simpleMessageInput.classList.remove('hidden');
                        sendSimpleMessageButton.classList.remove('hidden');
                        fileInput.classList.remove('hidden');
                        $(".choices").remove();
                        responseInput.classList.add('hidden');
                        sendButton.classList.add('hidden');
                    }
                    
                }
                if (self == "self") {
                    newMessage.addClass("hidden");
                } else {
                    newMessage.removeClass("hidden");
                }
                
            }
            
            var container = $('#chat');
            
            var target = $('#chat li:last');
            container.animate({
                scrollTop: target.offset().top - container.offset().top + container.scrollTop()
            }, 'slow');
            
            
        };

        
        function sendResponse() {
            console.log('sendResponse');
            var response = $('#responseInput').val();
            var file = document.getElementById('fileInputValue').files[0];
            if (currentQuestionId !== null) {
                var dataResp = { type: 'client', question_id: currentQuestionId};
                dataResp.response = "";
                
                if (file) {
                    var reader = new FileReader();
                    var readFile = null;
                    reader.onload = function(e) {
                        var base64File = e.target.result.split(',')[1];
                        dataResp.file = { name: file.name, data: base64File };
                        
                        conn.send(JSON.stringify(dataResp));
                        $('#responseInput').val('');
                    };
                    reader.readAsDataURL(file);
                    $('#fileInputValue').val(''); // Clear the file input
                } else {
                    if (response) {
                        dataResp.response = response;
                        conn.send(JSON.stringify(dataResp));
                        $('#responseInput').val('');
                    }
                    
                }
                conn.send(JSON.stringify({type: 'client', isReadClient: 1 }));
                newMessage.addClass("hidden");
                
            }
        }
        
        function sendMessage() {
            console.log('sendMessage');
            var message2 = $('#simpleMessageInput').val();
            var file = document.getElementById('fileInputValue').files[0];
            if (message2) {
                conn.send(JSON.stringify({type: 'client', simple_message: message2 }));
                $('#simpleMessageInput').val('');
            }
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var base64File = e.target.result.split(',')[1];
                    conn.send(JSON.stringify({type: 'client', file: { name: file.name, data: base64File } }));
                };
                reader.readAsDataURL(file);
                $('#fileInputValue').val(''); // Clear the file input
            }
            conn.send(JSON.stringify({type: 'client', isReadClient: 1 }));
            newMessage.addClass("hidden");
        }
        
        
        
        function sendChoice(choice) {
            if (currentQuestionId !== null) {
                conn.send(JSON.stringify({type: 'client', question_id: currentQuestionId, response: choice }));
                conn.send(JSON.stringify({type: 'client', isReadClient: 1 }));
                newMessage.addClass("hidden");
            }
        }

        

        var element = $('.floating-chat');
        var myStorage = localStorage;

        if (!myStorage.getItem('chatID')) {
            myStorage.setItem('chatID', createUUID());
        }

        setTimeout(function() {
            element.addClass('enter');
        }, 1000);

        element.click(openElement);

        function openElement() {
            var messages = element.find('.messages');
            var textInput = element.find('.text-box');
            element.find('>i').hide();
            element.addClass('expand');
            element.find('.chat').addClass('enter');
            var strLength = textInput.val().length * 2;
            textInput.keydown(onMetaAndEnter).prop("disabled", false).focus();
            element.off('click', openElement);
            element.find('.header button').click(closeElement);
            element.find('#sendMessage').click(sendNewMessage);
            messages.scrollTop(messages.prop("scrollHeight"));
            newMessage.addClass("hidden");

            if (conn.readyState === conn.OPEN) {
                //vue sur message
                conn.send(JSON.stringify({type: 'client', isReadClient: 1 }));
            }

        }

        function closeElement() {
            element.find('.chat').removeClass('enter').hide();
            element.find('>i').show();
            element.removeClass('expand');
            element.find('.header button').off('click', closeElement);
            element.find('#sendMessage').off('click', sendNewMessage);
            element.find('.text-box').off('keydown', onMetaAndEnter).prop("disabled", true).blur();
            setTimeout(function() {
                element.find('.chat').removeClass('enter').show()
                element.click(openElement);
            }, 500);
        }

        function createUUID() {
            // http://www.ietf.org/rfc/rfc4122.txt
            var s = [];
            var hexDigits = "0123456789abcdef";
            for (var i = 0; i < 36; i++) {
                s[i] = hexDigits.substr(Math.floor(Math.random() * 0x10), 1);
            }
            s[14] = "4"; // bits 12-15 of the time_hi_and_version field to 0010
            s[19] = hexDigits.substr((s[19] & 0x3) | 0x8, 1); // bits 6-7 of the clock_seq_hi_and_reserved to 01
            s[8] = s[13] = s[18] = s[23] = "-";

            var uuid = s.join("");
            return uuid;
        }

        function sendNewMessage() {
            var userInput = $('.text-box');
            var newMessage = userInput.html().replace(/\<div\>|\<br.*?\>/ig, '\n').replace(/\<\/div\>/g, '').trim().replace(/\n/g, '<br>');

            if (!newMessage) return;

            var messagesContainer = $('.messages');

            messagesContainer.append([
                '<li class="self">',
                newMessage,
                '</li>'
            ].join(''));

            // clean out old message
            userInput.html('');
            // focus on input
            userInput.focus();

            messagesContainer.finish().animate({
                scrollTop: messagesContainer.prop("scrollHeight")
            }, 250);
        }

        function onMetaAndEnter(event) {
            if ((event.metaKey || event.ctrlKey) && event.keyCode == 13) {
                sendNewMessage();
            }
        }
    </script>
    
</body>
</html>
    
