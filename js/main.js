<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery_3.5.1.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/validator_0.11.9.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/contact.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/video_player.js"></script>

<script type="text/javascript">
  
// ================= SCROLL TO TOP

  var prevScrollpos = $(".logo").offset().top;
    $("#top_btn").click(function() {
        return $(".scroll_wrapper").animate({
            scrollTop: 0
        }),
        !1
    })


    $(".scroll_wrapper" ).scroll(function() {
      var currentScrollPos = $(".ghost").offset().top;

      if (prevScrollpos < currentScrollPos) {
        scrollpower = parseFloat(prevScrollpos) - parseFloat(currentScrollPos);

        if(scrollpower < -25){
         
          $(".logo").css("opacity", "1");  
          $("#navbar").css("top","0px");
        }
        
      } else {
        $(".logo").css("opacity", "0.2");      
        $("#navbar").css("top","-90px");        
        $("#top_btn").css("display","block");
      }

      if(currentScrollPos == 100){
          $("#top_btn").css("display","none");
      }

      prevScrollpos = currentScrollPos;


    });


  $(window).on('load', function() {





    const cookieContainer = document.querySelector(".cookie_message");
    const cookieButton = document.querySelector("#cookie_btn");

    cookieButton.addEventListener("click", () => {
      cookieContainer.classList.remove("active");
      localStorage.setItem("cookieBannerDisplayed", "true");
    });

    setTimeout(() => {
      if (!localStorage.getItem("cookieBannerDisplayed")) {
        cookieContainer.classList.add("active");
      }
    }, 2000);



    document.getElementsByTagName("body")[0].setAttribute("ontouchstart", "");

    $("#loading_screen").fadeOut(200);






    $("#mobile_trigger").on('click', function(event) {

      if($(".mobile_menu").css("left") == "1200px"){
        setTimeout(mobile_display, 1);
        $(".mobile_menu").css("display","block");        
        $(".header").css("height","100%");
      }
      else{
        $(".mobile_menu").css("left","1200px");
        setTimeout(header_height, 500);

      }

      function header_height() {
        $(".header").css("height","0%");
        $(".mobile_menu").css("display","none");
      }

      function mobile_display(){
        $(".mobile_menu").css("left","0px");

      }

    });

  });

  $(document).ready(function() {


    $(window).resize( function(){
      var theWidth = $(window).width();
      var theHeight = $(window).height();
      var newWidth = (theHeight*1.77777778);
      var newHeight = (theWidth/1.77777778);

      if ( (theWidth > 1280) && (newHeight > theHeight)) {
        $('.fullvid').css({'width':theWidth, 'height':newHeight});
      }

      if ( (theHeight > 720) && (newWidth > theWidth)) {
        $('.fullvid').css({'height':theHeight, 'width':newWidth});
      }else{
        $('.vidcover').css({'height':theHeight, 'width':theWidth});
      }

      if (theWidth < 1025) {
        $('.fullvid').css({'width':'auto', 'height':'100%', 'aspect-ratio':'16/9'});
      }

      if ((theWidth < 1025) && (theHeight < 720)){
        $('.fullvid').css({'width':'auto', 'height':'120%', 'aspect-ratio':'16/9'});
      }

    }).resize();
  });




  /* *************** VIDEOPLAYER ***************** */




  ////////////////////////////////////////
  // VIDEO POPUP PLAYER
  ////////////////////////////////////////

  $(document).ready(function(){
    // Initiate FitVid.js
    $(".video_container").fitVids();

    // Overlay Iframe/player variables
    var popup_iframe = $('#video_popup');
    var popup_player = new Vimeo.Player(popup_iframe);


    // Open on play
    $('.popup_play').click(function(){
      $('.video_overlay').css('left', 0);
      $('.video_overlay').addClass('show');

      popup_player.loadVideo(this.dataset.id);

      setTimeout(function() {
      popup_player.play();
    }, 300);
    });


    // Closes on click outside
    $('.video_overlay').click(function(){
      $('.video_overlay').removeClass('show')
      setTimeout(function() {
        $('.video_overlay').css('left', '-100%')
      }, 300);
      popup_player.pause();
    });
  });

  ////////////////////////////////////////
  // EMBED VIDEO PLAYER
  ////////////////////////////////////////

  var playButtons = $('.play-button');
  var pauseButtons = $('.pause-button');
  var fullvidUnmuteButton = $('.video_unmute');
  var fullvidFullscreenButton = $('.video_fullscreen');
  var fullvidID = document.getElementById('fullvid');

  if(fullvidID){
    var fullvid = new Vimeo.Player('fullvid', options);
    fullvid.setVolume(0);
  }
  var ghost = $('.ghost');

  for(var i=0; i<playButtons.length;i++) {

      playButtons[i].addEventListener('click', function(){
          var iframe = document.getElementById(this.dataset.id);
          var embed_player = new Vimeo.Player(iframe);
          playVideo(this);
      });

  }

  function playVideo(arg){
    var iframe = document.getElementById(arg.dataset.id);
    var overlay = document.getElementById('overlay_' + arg.dataset.id);
    var embed_player = new Vimeo.Player(iframe);  

    embed_player.getPaused().then(function(paused){
      if(paused){
        embed_player.play();
   
        if($(arg).children("use").length){
          $(arg).children("use").attr("href","#pause-button-shape")
        }else{
          $(arg).children("div").toggleClass('btn_pause_icon', "swing");
        }
        
        $(arg).toggleClass('hide', "swing");
        $(overlay).toggleClass('hide', "swing");

      }else{
        embed_player.pause();
        if($(arg).children("use").length){
          $(arg).children("use").attr("href","#play-button-shape")
        }else{
          $(arg).children("div").toggleClass('btn_pause_icon', "swing");
        }
        
        $(arg).toggleClass('hide', "swing");
        $(overlay).toggleClass('hide', "swing");      
      }
    });
    
  }


  var options = {
      id: 530265076,
      loop: true,
      muted: true,
      autoplay: true
  };

  fullvidFullscreenButton.click(function () {
    fullvid.requestFullscreen();
    fullvid.setVolume(1);
    ghost.toggleClass('gradient', "swing");
    fullvidUnmuteButton.children("use").attr("href","#unmute-button-shape");    
  });

  fullvidUnmuteButton.click(function() {


    fullvid.getVolume().then(function(volume){
      if(volume == 1){
        fullvidUnmuteButton.children("use").attr("href","#mute-button-shape");
        fullvid.setVolume(0);
        ghost.toggleClass('gradient', "swing");

      }else{
        fullvidUnmuteButton.children("use").attr("href","#unmute-button-shape");
        fullvid.setVolume(1);
        ghost.toggleClass('gradient', "swing");
      }
    });

  });

</script>