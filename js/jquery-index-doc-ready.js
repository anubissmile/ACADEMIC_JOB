// JavaScript Document

	///// DOCUMENT.READY /////
	$(document).ready(function(){	
	
		defaulttitle = $('title').html();
		defaultkeyw = $('meta[name="keywords"]').attr('content');
		defaultdesc = $('meta[name="description"]').attr('content');
		defaulturl = document.URL;
		
		setTitle(defaulttitle);
		setMetaKeywords(defaultkeyw);
		setMetaDescription(defaultdesc);
	
		loadFB();
				
		setHeightContent();		
		
		/*$('a').click(function(event){
			if($('.content-popup').html() != "" && $(this).attr('href') != "#"){
				window.open(event.target,"_blank");
			}
		});*/
		
		$('#btn-submit-find').click(function(){
			$("#form-find-annoucement").submit();					 
		});
		
		$('#btn-submit-view').click(function(){
			$("#frm-view-annoucement").submit();
		});
		
		//popup_listener();
		
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