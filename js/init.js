var mainInterval, lastId, mainMenu, mainMenuHeight, menuItems, scrollItems;

$(document).ready(function() {

    console.log("YAY");
  	var timelineBlocks = $('.timeline-block'),
  		offset = 0.8;

  	//hide timeline blocks which are outside the viewport
  	hideBlocks(timelineBlocks, offset);

  	//on scolling, show/animate timeline blocks when enter the viewport
  	$(window).on('scroll', function(){
  		(!window.requestAnimationFrame)
  			? setTimeout(function(){ showBlocks(timelineBlocks, offset); }, 100)
  			: window.requestAnimationFrame(function(){ showBlocks(timelineBlocks, offset); });

        var toTop = $(this).scrollTop() + mainMenuHeight;

        var cur = scrollItems.map(function() {
          if ($(this).offset().top < toTop) {
            return this;
          }
        });

        cur = cur[cur.length - 1];

        var id = cur && cur.length ? cur[0].id : "";

        if (lastId !== id) {
          lastId = id;
          menuItems.removeClass("active");
          menuItems.filter("[href='#" + id + "']").addClass("active");
        }
  	});

  	function hideBlocks(blocks, offset) {
  		blocks.each(function(){
  			( $(this).offset().top > $(window).scrollTop()+$(window).height()*offset ) && $(this).find('.timeline-connector, .timeline-content').addClass('is-hidden');
  		});
  	}

  	function showBlocks(blocks, offset) {
  		blocks.each(function(){
  			( $(this).offset().top <= $(window).scrollTop()+$(window).height()*offset && $(this).find('.timeline-connector').hasClass('is-hidden') ) && $(this).find('.timeline-content').removeClass('is-hidden').addClass('bounce-in') && $(this).find('.timeline-connector').removeClass('is-hidden');
  		});
  	}

  console.log("ready");
  mainMenu = $(".left-navigation");
  mainMenuHeight = 15;
  console.log(mainMenuHeight);
  menuItems = mainMenu.find("a");
  scrollItems = menuItems.map(function() {
    var item = $($(this).attr("href"));
    if (item.length) {
      return item;
    }
  })

  $(".masonry").mouseenter(function() {
    $(this).children(".masonry-info").fadeTo('fast', 1);
  });
  $(".masonry").mouseleave(function() {
    $(this).children(".masonry-info").fadeTo('fast', 0);
  });
  $(".masonry").click(function() {
    var url = $(this).attr("data-url");

    window.location.href = url;
  })
});

$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

$('.text-left').find('a').click(function() {

  if ($('.mobile-bar').css('display') === 'block') {
    closeMenu();
  }
})

$(".nav-hamburger").click(function() {

  if ($('.left-navigation').hasClass('toggled')) {
    closeMenu();
  } else {
    $('.left-navigation').fadeIn().addClass('toggled');
    $('.nav-hamburger').addClass('menu-active');
  }
})

$(document).ready(function() {

  $("#blog-rotate").children("li").first().css("display", "inline-block");

  startRotate(1);

  $("span").click(function() {

    clearInterval(mainInterval);

    var adjustmentIndex = $(this).index();

    currentIndex = adjustmentIndex + 1;

    startRotate(currentIndex);
  })
})

function startRotate(index) {
  var currentIndex = index;

  $(".blog-info").find("span").removeClass('rotator-full');
  $(".blog-info").find("span:nth-child(" + currentIndex + ")").addClass("rotator-full");

  $("#blog-rotate").children("li").css("display", "none");
  $("#blog-rotate").children("li:nth-child(" + currentIndex + ")").css("display", "inline-block");

  mainInterval = setInterval(function() {

    if (currentIndex == 3) {
      currentIndex = 0;
    }

    $("#blog-rotate").children("li").fadeOut(400);
    $(".blog-info").find("span").removeClass("rotator-full");

    $("#blog-rotate").children("li:nth-child(" + (currentIndex + 1) + ")").delay(400).fadeIn();
    $(".blog-info").find("span:nth-child(" + (currentIndex + 1) + ")").addClass("rotator-full");

    currentIndex++;


  }, 5000);
}

function closeMenu() {
  $('.left-navigation').fadeOut().removeClass('toggled');
  $('.nav-hamburger').removeClass("menu-active");
}
