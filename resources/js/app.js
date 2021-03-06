
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});

import $ from 'jquery';
import 'jquery-ui/ui/widgets/autocomplete.js';
import 'jquery-ui/ui/widgets/tooltip.js';
import 'jquery-ui/ui/widgets/dialog.js';


$('.tltp').tooltip();


$(document).ready(function(){


	$.ajaxSetup({
    	headers : {
        	'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content')
    	}
	});


     $('#delete').click(function(event) {
        event.preventDefault();
        var forward_url = $(this).attr('href');

        /** Create div element for delete confirmation dialog*/
        var dynamicDialog = $('<div><span class="material-icons" >warning</span> This action will permanently delete this item.</div>');
        
        dynamicDialog.dialog({
                title : "Are you sure?",
                closeOnEscape: true,
                modal : true,
                dialogClass: "alert",
               	buttons : 
                        [{
                            text : "Delete this Item",
                            click : function() {
                                $(this).dialog("close");
	            				window.location.href = forward_url;
                            }
                        },
                        {
                            text : "Cancel",
                            click : function() {
                                    $(this).dialog("close");
                            }
                        }]
        });
        return false;
    });


    $( ".searchlist" ).on('focus', function(){
      $(this).autocomplete({
	      source:"/api/" + $(this).attr("id"),
	      minLength: 2,
	      focus: function( event, ui ) {
	        $( this ).val( ui.item.name );
	        return false;
	      },
	      select: function( event, ui ) {
	        $( this ).val( ui.item.name );
	        $( "#" + $(this).attr("id") + "id" ).val( ui.item.id );
	        if($(this).attr("id") == "countries"){
	           $( "#countryphonecode" ).val( ui.item.calling_code );
	        }
	        return false;
      		}
     	})
    	.autocomplete( "instance" )._renderItem = function( ul, item ) {
      		return $( "<li>" )
        	.append( "<div>" + item.name + "</div>" )
        	.appendTo( ul );
    	};
    });
    $("#language_specific").click(function(){
        var $chk = $(this).attr('checked');
        if( !$chk ){
            $(".conditional").each(function(){
                $(this).removeClass('hidden');
                $("#language_specific").attr("checked", "checked");
            });
        }else{
            $(".conditional").each(function(){
                $(this).addClass('hidden');
                $("#language_specific").removeAttr("checked");
            });
        }

    });

});
