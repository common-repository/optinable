
var OPZ_APP = {
	
	duration: 250,
	topBars: ".wp-s-o-r-head",
	order: 1,
	autoCloseSeconds:5000,
	autoCloseTimer: false,
	hashTracking: false,
	instance: jQuery(this),
	draggable: "._editmodezilla .__absolute", 
	init: function(){
		OPZ_APP.bind();
	},
	pagesAnimation: function(_this){ // via url show only what needed

		jQuery(_this).find(jQuery('*[data-s-o-r-order='+OPZ_APP.order+']')).show();
		
	},
	setPageBar: function(){
		
		if(jQuery(OPZ_APP.topBars).length){
			jQuery(OPZ_APP.topBars).find('a').removeClass('active');
			jQuery('*[data-optinable-bar-number='+OPZ_APP.order+']').addClass('active');
		}
	},
	animateItems: function(_this){
		
		jQuery(jQuery('*[data-s-o-r-order='+OPZ_APP.order+']').find('[data-s-o-r-anim]')).each(function() {
																									  
			var anim = jQuery(this).attr('data-s-o-r-anim');
			jQuery(this).stop(true, true).show("slide", {direction: anim}, OPZ_APP.duration);
			//console.log(anim);
		});	
	},
	restItems: function(number){
		
		jQuery(jQuery('*[data-s-o-r-order='+number+']').find('[data-s-o-r-anim]')).each(function() {
			var anim = jQuery(this).attr('data-s-o-r-anim');
			jQuery(this).stop(true, true).hide("slide", {direction: anim}, OPZ_APP.duration);
			//console.log(anim);
		});	
	},
	resetRatingPage: function(order){
		
		jQuery('*[data-s-o-r-order='+OPZ_APP.order+']').stop(true, true).hide("slide", {direction: "down"}, OPZ_APP.duration);
		jQuery('*[data-s-o-r-order='+order+']').hide();
		jQuery('.wp-optinable-info-div, .wp-s-o-r-container-inner').stop(true, true).hide("slide", {direction: "down"}, OPZ_APP.duration);
		jQuery('.wp-optinable-info-div, .wp-s-o-r-container-inner').hide();
	},
	hideContainers: function(number, _this){
		//console.log(_this);
		jQuery(_this).find(jQuery('*[data-s-o-r-order='+number+']')).hide();
		
	},
	// What are bindings such as hover, on click etc such as hover on search and click to close to search.
	bind: function(){
		
		//console.log("binding working");
		jQuery('body').on('click', '*[data-optinable-navi-page]', function(e){
			
			e.preventDefault();
			
			var _in = jQuery(this);

			alert(total_pg);
			
			OPZ_APP.restItems(OPZ_APP.order);
			
			setTimeout(function(){
				
				OPZ_APP.hideContainers(OPZ_APP.order, _in.parents('.remodal'));
				
				OPZ_APP.order = OPZ_APP.order+1;
				
				jQuery('*[data-s-o-r-order='+OPZ_APP.order+']').fadeIn();
				
				OPZ_APP.setPageBar();
				
			}, OPZ_APP.duration);
			
			return;
		});
		
		// might skip due to position absolute and mobile compatible issue
		jQuery('body').on('mousedown', OPZ_APP.draggable, function(e){
				
			if(!jQuery(document).find("._editmodezilla").length)
			{
				console.log("dont have _editmodezilla");
				return false;
			}	

			var dr = jQuery(this).addClass("drag");
			
			height = dr.outerHeight();
			width = dr.outerWidth();
			
			max_left = dr.parent().offset().left + + jQuery("#optinable-column").width();
			max_top = dr.parent().offset().top + jQuery("#optinable-column").height();

			min_left = dr.parent().offset().left-100;
			min_top = dr.parent().offset().top-100;

			ypos = dr.offset().top + height - e.pageY;
			xpos = dr.offset().left + width - e.pageX;

			jQuery(document.body).on('mousemove', function(e){

				var itop = e.pageY + ypos - height;
				var ileft = e.pageX + xpos - width;
				 
				if(dr.hasClass("drag")){
					if(itop <= min_top ) { itop = min_top; }
					if(ileft <= min_left ) { ileft = min_left; }
					if(itop >= max_top ) { itop = max_top; }
					if(ileft >= max_left ) { ileft = max_left; }
					dr.offset({ top: itop,left: ileft});
				}
			}).on('mouseup', function(e){
					dr.removeClass("drag");
			});
		});
	},
};

jQuery(document).ready(function(){
	OPZ_APP.init();
});



