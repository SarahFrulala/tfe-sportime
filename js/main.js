$(document).ready(function() {

    var scrolling = function(){
        var speed     = 800;
        jQuery('a[href^="#"]').bind('click',function(){
            var id = jQuery(this).attr('href');
            if(id == '#')
                goTo('body');
            else
                goTo(id);
            return(false);
         void(0);
        });
        function goTo(ancre){jQuery('html,body').animate({scrollTop:jQuery(ancre).offset().top},speed,'swing',function(){
              if(ancre != 'body')
                    window.location.hash = ancre;
              else
                  window.location.hash = '#';
              jQuery(ancre).attr('tabindex','-1');
         
              jQuery(ancre).removeAttr('tabindex');
          });
        }
    };
    jQuery(function(){
        scrolling();
    });

    /***************************************************************************************/
    /* Toggle calendrier */
    /***************************************************************************************/

    $('#affcalclicktext').click(function() {

        var calendrier = $('#affcalclick'),
            liste = $('#afflisteclick');

        calendrier.toggle();
        liste.toggle();

    });

    /***************************************************************************************/
    /* Toggle amis */
    /***************************************************************************************/

    
    (function() {

        $fenetre_amis = $('#amis-click');

        $('.bouton-amis').click(function() {

            $fenetre_amis.toggle();

        });

        $('.bouton-close-amis').click(function() {

            $fenetre_amis.toggle();

        });

        $(document).keyup(function(e) {

            if (e.keyCode == 27) { // ESC key

                $fenetre_amis.hide();

            }

        });

    })();



    /***************************************************************************************/
    /* Connexion */
    /***************************************************************************************/

    (function() {

        var $display_sign_in_form = $('#bouton-co');

        $('#bouton-co').click(function() {

            $(this).hide();

            $('#login-form').show();

        });

    })();

    /***************************************************************************************/
    /* Close modal */
    /***************************************************************************************/

    (function() {

        var $modal_close = $('.modal-close'),
            $body = $('body');

        $modal_close.click(function() {

            $(this).parent('header').parent('.modal').parent('.modal-container').fadeOut(133);

            $body.removeClass('modal-open');

        });

        $(document).keyup(function(e) {

            if ($body.hasClass('modal-open') && e.keyCode == 27) { // ESC key

                $modal_close.parent('header').parent('.modal').parent('.modal-container').fadeOut(133);

                $body.removeClass('modal-open');

            }

        });

    })();

    /***************************************************************************************/
    /* Show Sign up modal */
    /***************************************************************************************/

    (function() {

        var $sign_up = $('.sign-up'),
            $inscription_box = $('#inscription-box'),
            $body = $('body');

        $sign_up.click(function(e) {

            e.preventDefault();

            $body.addClass('modal-open');

            $inscription_box.fadeIn(266);

            $('#inscription-box .innom').focus();

        });

    })();

    /***************************************************************************************/
    /* Select focus */
    /***************************************************************************************/

    (function() {

        if ($('body').hasClass('membre')) {

            
            $('select').focus(function() {

                $(this).parent()
                    .removeClass('blink-border')
                    .css('border-color', '#aaa');

            });

            $('select').blur(function() {

                $(this).parent().css('border-color', 'white');

            });

        }

    })();

   

/***************************************************************************************/
/* End of jQuery */
/***************************************************************************************/

});


function showHide() {
    var betabox = document.getElementById("shadow-box-beta");
    if(betabox.style.display == "block") {
        betabox.style.display = "none";
      }
    else {
        betabox.style.display = "block";
    }
}

function showHide2() {
    var menuhide = document.getElementById("menu-id");
    var boutonhide = document.getElementById("hidemenu");

    if ($('#menu-id').hasClass('menushow')) {
        $('#menu-id').removeClass('menushow');
        $('#menu-id').addClass('menuhide');
    }
    else {
         $('#menu-id').addClass('menushow');
          $('#menu-id').removeClass('menuhide');
    }

    if ($('#hidemenu').hasClass('boutonnormal')) {
        $('#hidemenu').removeClass('boutonnormal');
        $('#hidemenu').addClass('boutonright');
    }
    else {
         $('#hidemenu').addClass('boutonnormal');
          $('#hidemenu').removeClass('boutonright');
    }
    
}











