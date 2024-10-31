
jQuery(document).ready(function(){

    jQuery(".op_remon_embed").remove();
    jQuery(".op_rem_on_slidein, .op_rem_on_lightbox, .op_rem_on_stickybar").remove();
    
    var temp_select = optinable_vars.temp_select;
    
    if(temp_select != 0){

        setTimeout(function() { 
            document.getElementById("optinable_template_gallery").click();
            //console.log(2);
        }, 100);

        jQuery('.op_template_gobk_btn').attr('data-type', 'dashboard');
    }

    if(jQuery('.optinable-column').length > 0){
       
        let nohtml = jQuery('.optinable-column').html();
        
        if (!nohtml || nohtml.trim() === '') {
            jQuery(".remodal-overlay").addClass("insert-optin-layout");
            jQuery("[data-remodal-id=insert-optin-layout]").remodal().open();
        }
    }

    var op_basic_c = jQuery(".op_basic_blocks").find(".optinable-html-block-options").length;
    //jQuery(".op_basic_block_count").html("("+op_basic_c+")");
    var op_basic_c = jQuery(".op_advanced_blocks").find(".optinable-html-block-options").length;
   // jQuery(".op_adv_block_count").html("("+op_basic_c+")");

    if (location.href.indexOf("#") != -1) {
        hash = location.href.substr(location.href.indexOf("#"));
    }

    if (hash) {
        //console.log('a[href="#'+hash+'"]');
        jQuery('a[href="'+hash+'"]').get(0).click();
    }

    jQuery('.opable-elem-container').Opz_build_prop().buildProp();
    jQuery('.optinable-html-block-options').Opz_build_prop().enableDropping();

    // main container
    jQuery('.opable-optinable-init-wrapper').optinAbleClickDragResize({
        handleW: '.opz_containerWidth',
        handleH: '.opz_containerHeight',
        container: false,
    });

    // blur the bg 
    jQuery(".opable-elem-container").optinAbleClickDragResize({
        handleW: ".optinable_bg_blur",
        blur: true,
    });

    jQuery(".opable-elem-container").optinAbleClickDragResize({
        handleW: ".optin_field_width_slider",
        optin: true,
    });

    jQuery(".opable-elem-container").optinAbleClickDragResize({
        handleW: ".element_outer_width_slider",
        elements_outer: true,
    });

    // col
    jQuery(".op-col").optinAbleClickDragResize({
        handleW: ".opable_col_width_slider",
        column: true,
    });

    jQuery(".opable-elem-container").optinAbleClickDragResize({
        handleH: ".optinable_height_slider",
        elements: true,
    });
});

document.addEventListener('DOMContentLoaded', function () {

    if(optinable_vars_fonts.campFonts != '|' && optinable_vars_fonts.campFonts != undefined){
        var fontLink = document.createElement("link");
        fontLink.href = "https://fonts.googleapis.com/css?family=" + optinable_vars_fonts.campFonts;
        fontLink.rel = "stylesheet";
        fontLink.type = "text/css";
        document.head.appendChild(fontLink);
    }
});
