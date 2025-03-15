(function($){
	$.fn.extend({
	    /* Edge button - jQuery plugin
	     * 
	     * If you need a button on the edge of your browser, you might want to take a
	     * look at this jQuery plugin
	     * 
	     * How to use:
	     * $("#myEdgeButton").edgeButton();
	     * 
	     * The options:
	     * buttonPrefix    = Add a prefix to the classes (for multiple buttons)
	     * buttonText      = The text that is put in the button (can be empty if you use an image)
	     * buttonTop       = Number of pixels the button is located from top
	     * buttonDirection = Location of the button: "right" or "left"
	     * buttonPosition  = Behavior of the button: "fixed" or "absolute"
	     * buttonFunction  = The function of the button:
	     *                   "scrollTop": onClick you will scroll to the top of the page
	     *                   "scrollBottom": onClick you will scroll to the bottom of the page
	     *                   "scrollUp": onClick you will scroll up to the next page
	     *                   "scrollDown": onClick you will scroll down to the next page
	     *                   "link": onclick you will go to the URL that is in the button (you need
	     *                           an anchor tag in the button with the class "buttonLink")
	     * colorText       = Color of the text inside the button
	     * colorBackground = Color of the background in the button
	     * rotateButton    = Rotate the button: "rotateLeft", "rotateRight" or "rotateUpsideDown". This
	     *                   doesn't work in IE or Opera
	     * debugInfo       = Turn on if your button doesn't work propperly. It will provide info about
	     *                   some possible explenations
	     * 
	     * If you are using buttonFunction "link" you need to add an anchor tag in your button. Give
	     * your anchor a class "buttonLink" and the button will use that link!
	     * 
	     * If you want to use a button with a background, you can easely do that by adding a img tag
	     * in the button. Give is a class "buttonImage", and the button will automaticly use that image
	     * as background. It will also use the width and height of that image. The image will be loaded
	     * 500 milliseconds after the page is loaded!
	     * 
	     * Developed with jQuery version: 1.4.2
	     * 
	     * Version: 1.0.0
	     * Name: edgeButton
	     * 
	     * Author: S.C. Tijdeman
	     * E-mail: senne@howardshome.com
	     */
	    
		edgeButton: function(custom_settings) {
            // default settings
            var defaults = {
                buttonPrefix: "edgeButton_",
                buttonText: "I am a button",
                buttonTop: 100,
                buttonDirection: "left",
                buttonPosition: "fixed",
                buttonFunction: "scrollTop",
                colorText: "#ffffff",
                colorBackground: "#999999",
                rotateButton: false,
                debugInfo: false
            };
            
            var settings = $.extend(defaults, custom_settings);
            
            return this.each(function() {
            
                var obj                  = $(this),
                    theButton            = "<div class=\""+ settings.buttonPrefix +"edgeButton\">"+ settings.buttonText +"</div>",
                    scrollTopDistance    = "",
                    scrollBottomDistance = "",
                    scrollDistance       = "",
                    durationTop          = "",
                    durationBottom       = "",
                    durationScroll       = "",
                    buttonLink           = "",
                    buttonImage          = "",
                    buttonWidth          = "",
                    buttonHeight         = "",
                    scrollTimer          = 0;
                        
                // Append theButton in the obj
                obj.append(theButton);
                
                // Add some styling to the obj
                obj.css("margin", 0)
                   .css("top", settings.buttonTop +"px")
                   
                   .css("cursor", "hand")
                   .css("cursor", "pointer")

                   .css("color", settings.colorText)
                   .css("background", settings.colorBackground)
                   .css("position", "absolute");
                
                if(settings.buttonDirection == "left"){
                    obj.css("left", 0);
                }else if(settings.buttonDirection == "right"){
                    obj.css("right", 0);
                }else{
                    if (settings.debugInfo) {
                        alert("The \"buttonDirection\" is not set correctly!");
                    }
                }
                
                if(settings.buttonPosition == "fixed"){
                    $(window).scroll(function () {
                        obj.css("top",settings.buttonTop + $(document).scrollTop());
                    });
                }else if(settings.buttonPosition == "absolute"){
                    obj.css("position", "absolute");
                }else{
                    if (settings.debugInfo) {
                        alert("The \"buttonPosition\" is not set correctly!");
                    }
                }
                
                buttonWidth  = obj.width();
                buttonHeight = obj.height();
                
                //Add some styling to theButton
                $("."+ settings.buttonPrefix +"edgeButton").css("padding", "5px");
                
                $(document).ready(function(){
                    $("."+ settings.buttonPrefix +"edgeButton").click(handleClick);
                    
                    buttonImage = obj.find(".buttonImage").attr("src");
                    
                    if(buttonImage){
                        setTimeout(setBackgroundImage, 500);
                    }
                    
                    if(settings.rotateButton){
                        rotateButton();
                    }
                });

                
                function handleClick()
                {
                    durationTop    = $(window).scrollTop();
                    durationBottom = $(document).height() - $(window).scrollTop();
                    durationScroll = $(window).height();
                    
                    if(settings.buttonFunction == "scrollTop"){
                        scrollTopDistance = 0;
                        
                        $("html, body").animate({scrollTop: scrollTopDistance}, durationTop);
                    }else if(settings.buttonFunction == "scrollBottom"){
                        scrollBottomDistance = $(document).height() - $(window).height();
                        
                        $("html, body").animate({scrollTop: scrollBottomDistance}, durationBottom);
                    }else if(settings.buttonFunction == "scrollDown"){
                        scrollDistance = $(window).scrollTop() + $(window).height() - 50;
                        
                        $("html, body").animate({scrollTop: scrollDistance}, durationScroll);
                    }else if(settings.buttonFunction == "scrollUp"){
                        scrollDistance = $(window).scrollTop() - $(window).height() + 50;
                        
                        $("html, body").animate({scrollTop: scrollDistance}, durationScroll);
                    }else if(settings.buttonFunction == "link"){
                        buttonLink = obj.find(".buttonLink").attr("href");
                        
                        if(buttonLink){
                            obj.click(function(){
                                window.open(buttonLink);
                            });
                        }else{
                            if (settings.debugInfo) {
                                alert("There is no link present!");
                            }
                        }
                    }
                }
                
                function setBackgroundImage()
                {
                    var imageHeight = obj.find(".buttonImage").height(),
                        imageWidth = obj.find(".buttonImage").width();
                    
                    $("."+ settings.buttonPrefix +"edgeButton").css("padding", 0)
                                                               .css("background", "url("+ buttonImage +")")
                                                               .css("height", imageHeight +"px")
                                                               .css("width", imageWidth +"px");
                }
                
                function rotateButton()
                {
                    if (!$.browser.msie && !$.browser.opera) {
                        var rotationOffset = "",
                            rotateDeg      = "";
                        
                        if(settings.rotateButton == "rotateLeft"){
                            rotateDeg      = 90;
                            rotationOffset = (buttonWidth - buttonHeight) / 2;
                        }else if(settings.rotateButton == "rotateRight"){
                            rotateDeg      = 270;
                            rotationOffset = (buttonWidth - buttonHeight) / 2;
                        }else if(settings.rotateButton == "rotateUpsideDown"){
                            rotateDeg = 180;
                        }else{
                            if (settings.debugInfo) {
                                alert("The \"rotateButton\" is not set correctly!");
                            }
                        }
                        
                        if(settings.buttonDirection == "left"){
                            obj.css("margin-left", "-"+ rotationOffset +"px");
                        }else if(settings.buttonDirection == "right"){
                            obj.css("margin-right", "-"+ rotationOffset +"px");
                        }
                        
                        obj.css("-moz-transform", "rotate("+ rotateDeg +"deg)")
                           .css("-webkit-transform", "rotate(-"+ rotateDeg +"deg)")
                           .css("-o-transform", "rotate(-"+ rotateDeg +"deg)")
                           .css("-transform", "rotate(-"+ rotateDeg +"deg)");
                            
                    }else{
                        if (settings.debugInfo){
                            alert("The \"rotateButton\" doesn't work in IE and Opera!");
                        }
                    }
                }
            });
        }
	});
})(jQuery);