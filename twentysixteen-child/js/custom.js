jQuery( document ).ready(function() {
  jQuery('table').addClass('table');
  if ( jQuery( ".document" ).length ) {
    jQuery( ".content-area" ).append('<div id="documents"></div>');
    jQuery( ".document" ).each(function( index ) {
      jQuery( this ).appendTo('#documents');
    });
    /*jQuery( ".document__content").find("img" ).each(function( index ) {
      var currentImg = jQuery(this).parent().attr('href');
       currentImg = currentImg.slice(0,-10);
      if(currentImg){
        jQuery(this).after( "<a href="+currentImg+" class='bt-expand'><i class='fa fa-expand'></i><span>Agrandir<span></a>" );
        jQuery(this).parent().after( "<a href="+currentImg+" class='bt-download'><i class='fa fa-download'></i><span>télécharger</span></a>" );
      }
    });*/
  }
  if ( jQuery( ".portrait-img" ).length ) {
    jQuery( ".content-area" ).append('<div id="portraits"></div>');
    jQuery( ".portrait-img" ).each(function( index ) {
      jQuery( this ).appendTo('#portraits');
    });
    jQuery( ".portrait__content img" ).each(function( index ) {
      var currentImg= jQuery(this).parent().attr('href');
      jQuery(this).css('display','none');
      jQuery(this).parent().parent().parent().parent().find('.portrait__image').css('background-image','url(' + currentImg + ')');
    });
  }
  /*if ( jQuery('.site-main').height() < 100 ) {
    jQuery('.site-main').css('display','none');
    jQuery('#documents').css('margin-top','-20px');

  }*/

});
jQuery( ".document__content > p > a > img" ).parent().parent().css('padding','0');

jQuery( ".carte" ).length&&jQuery('#main').css('background','none').css('padding','0')&&jQuery('.entry-content').addClass('carte_flex')&&jQuery('img').parent('p').css('padding','0').css('margin','0')&&jQuery('.carte__content p').each(function() {
    var $this = jQuery(this);
    if($this.html().replace(/\s| /g, '').length == 0)
        $this.remove();
});


jQuery( document ).ready(function() {
//* Bind to the resize event of the window object
	jQuery( ".bienvenue" ).length&&jQuery( ".bienvenue" ).css('height',(jQuery('.item.active').height()));
});
jQuery(window).bind( "resize", function () {
	jQuery( ".bienvenue" ).length&&jQuery( ".bienvenue" ).css('height',(jQuery('.item.active').height()));
});



/*
jQuery(".carte").length&&(jQuery(".content-area").append('<div id="cartes"></div>'),
jQuery(".carte").each(function(){
	jQuery(this).appendTo("#cartes");
}),
jQuery(".carte__content > p > a > img").parent().parent().css("padding","0"),
jQuery(".carte__content > p > img").parent().css("padding","0"));
*/