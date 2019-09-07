$(document).ready(function() {
//    $("#contentiner").fadeOut();
	$("#progressbar").show();
});

$(window).load(function() {
	$("#progressbar").hide();
    $("#contentiner").fadeIn(2000);
    $("#contentiner").show();
});
$(function(){
	$(".button-collapse").sideNav({
	    menuWidth: 280, // Default is 300
	    edge: 'left', // Choose the horizontal origin
	    closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
	    draggable: true, // Choose whether you can drag to open on touch screens,
	    onOpen: function(el) { /* Do Stuff */ }, // A function to be called when sideNav is opened
	    onClose: function(el) { /* Do Stuff */ }, // A function to be called when sideNav is closed
	});
			
			//for mobile sidebar colaps
	$("#close").click(function(){$('.button-collapse').sideNav('hide');});
})