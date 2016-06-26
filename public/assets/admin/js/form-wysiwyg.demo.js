/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 1.8.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v1.8/admin/
*/

var handleFormWysihtml5 = function () {
	"use strict";
	$('#wysihtml5').wysihtml5({
        "font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
        "emphasis": true, //Italics, bold, etc. Default true
        "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
        "html": false, //Button which allows you to edit the generated HTML. Default false
        "link": true, //Button to insert a link. Default true
        "image": false, //Button to insert an image. Default true,
        "color": true //Button to change color of font  
    });
};

var FormWysihtml5 = function () {
	"use strict";
    return {
        //main function
        init: function () {
            $.getScript('/assets/admin/plugins/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js').done(function() {
                $.getScript('/assets/admin/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js').done(function() {
                    handleFormWysihtml5();
                });
            });
        }
    };
}();
