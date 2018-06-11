$(document).ready(function(){
  var search = $(".search-icon").offset().top;
  var fav  = $(".fav-icon").offset().top;
  var add = $(".add-icon").offset().top;
  var share  = $(".share-icon").offset().top;
  $(document).scroll(function(){
    var topscroll = $(document).scrollTop();


    if (topscroll >= search) {
        $(".search-icon").addClass("search-icon_enable");
    }
    else{
      $(".search-icon").removeClass("search-icon_enable");

    }

    if (topscroll>= fav) {
      $(".search-icon").removeClass("search-icon_enable");
      $(".fav-icon").addClass("fav-icon_enable");
    }
    else{
      $(".fav-icon").removeClass("fav-icon_enable");

    }
    if (topscroll>=add) {
      $(".fav-icon").removeClass("fav-icon_enable");
      $(".add-icon").addClass("add-icon_enable");
    }
    else {
      $(".add-icon").removeClass("add-icon_enable");
    }

    if (topscroll>=share) {
      $(".add-icon").removeClass("add-icon_enable");
      $(".share-icon").addClass("share-icon_enable");
    }
    else {
      $(".share-icon").removeClass("share-icon_enable");

    }
  })
  })

/**
scroll search = 570
scroll like = 912
scroll add = 1140
scroll share = 14421
**/
