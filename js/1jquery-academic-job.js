// JavaScript Document

	
	function showContent(path){
		//bgpopup  content-popup
		$(".content-popup").load(path);	
		$(".bgpopup").fadeIn('normal',function(){
			$(this).css("display","block");												   
		});
		
	}
	
	function clearsubmenu(){
		$(".sub-menu").css({
			"display" : "none"});
		return false;
	}
	
	function loadsubmenu(){
		$(".sub-menu").css({
			"display" : "none",
			"position" : "absolute",
			"z-index" : 10,
			"text-align" : "left",
			"margin" : "8% 0% 0% -10%"});
		$(".sub-menu").each(function(index){
			$(this).load("menu/" + $(this).attr("id") + ".php");
		});
		return false;
	}
	
	function showsubmenu(id){
		$(".wrap-menu").hover(function(){
			//alert("#strShow"+id);
			clearsubmenu();
			$("#strShow"+id).css({
				"display" : "block"});						   
		},
		function(){
			clearsubmenu();
		});
		return false;
	}

	$(document).ready(function(){
		
		setTimeout('$("#banner").css("display","block").hide().slideToggle("slow");',500);
		
		loadsubmenu();
		
		$("#close").click(function(){
			$(".bgpopup").fadeOut('normal',function(){
				$(this).css("display","none").hide();								   
			});							 
		});
		
		$(".ref-menu").hover(function(){
			$(this).hide().toggleClass("ref-menu-hover").fadeIn(800);
			showsubmenu($(this).attr("id"));
		},
		function(){
			$(this).show().toggleClass("ref-menu-hover");
		});
		
		
	});