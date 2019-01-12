function dropdownmenu() {
  //---- Start-------------
   $(".submenuitem").hide();  
    	 $('.menuitemlink').click(function () {

				$('.submenuitem').slideUp('fast');

				$('.menuitemlink').removeClass('menuitemlinkiconon');

				$('.menuitemlink').addClass('menuitemlinkiconoff');

				$(this).removeClass('menuitemlinkiconoff');

				$(this).addClass('menuitemlinkiconon');

			    $(this).next().slideDown(2000);

				

				//alert($(this).next());

		});
  
  //---- End -------------	
}