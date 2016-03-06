// JavaScript Document

	var SigninStatus,countchk=0;
	var ann_id,defaulturl,defaulttitle,defaultkeyw,defaultdesc;
	
	
	function isAsciiNumeric(num){
		return num > 47 && num < 58 ? true : false;
	}
	
	function purchasingListener(){
		$(".btn-purchase-view").click(function(){
			if(confirm('โปรดยืนยันว่าคุณต้องการซื้อสินค้าชิ้นนี้?')){
				var pro_code = $(this).attr('data-pro-code');
				if(isOnline()){
					$.ajax({
						url : 'purchase_order.php?rand='+Math.random(),
						data : {'PRO_CODE' : pro_code},
						dataType:"JSON",
						type:"POST",
						timeout:60000,
						success: function(response,status,xhr){
							var state = response.status;
							var desc = response.desc;
							var code = response.code;
							if(state){
								showNote('<p align="center">' + desc + '</p>',true);
								setTimeout(function(){
									showContent('payment.php',false);
								},4000);
							}else{
								showNote('<p align="center">' + desc + '</p>',true);	
								setTimeout(function(){
									
								},4000);
							}
						},
						error: function(){
							alert("มีบางอย่างผิดพลาด โปรดลองใหม่อีกครั้ง");
						}
					});
				}else{
					popup_close();
					showContent('showpage.php?Node=register',false);
				}
			}
		});
	}
	
	function addProductListener(){
		
		$('#btn-submit-upload').click(function(){
			$('#add_product').submit();
		});
		
		$('#PRO_PRICE').keydown(function(e){
			var num = e.which;
			if(num == 27 || num == 9 || num == 116 || num == 8){
				return true;	
			}else{
				return isAsciiNumeric(num) ? true : false;
			}
		});
		
		$('#btn-submit-addproduct').click(function(){
			if(!chk_blank_form('#add_product :input')){
				return false;	
			}else{
				$.ajax({
					url : 'add_product_ss.php',
					data : {
						'PRO_NAME' : $('#PRO_NAME').val(),
						'PRO_MODEL' : $('#PRO_MODEL').val(),
						'PRO_PRICE' : $('#PRO_PRICE').val(),
						'PRO_DESC' : $('#PRO_DESC').val()							
					},
					dataType : "JSON",
					type : "POST",
					success: function(response,status,xhr){
						var stat = response.status;
						var desc = response.desc;
						if(stat){
							alert(desc);
							$("#add_product :input").val("");
							$("iframe").attr("src","");
							$("#PRO_NAME").focus();	
						}else{
							alert(desc);	
						}
					},
					error: function(){
						
					}
				});
			}
		});
	}
	
	function nowLoading(Obj,success){
		Obj.load("loading.html",function(){
			success();
		});
	}
	
	function loadUserBox(e){
		$(".row-user").delegate($(this),'click change',function(e){
			var cls = "#" + $(this).attr("id") + " td input";
			var label = "#" + $(this).attr("id") + " td label";
			$(cls).click();
			$(label).click(function(e){
				e.stopPropagation();
			});
		});
	}
	
	function loadUserSetting(){
		var active = $("#loadUser").attr("id");
		$("#loadUser").toggleClass('btn-flat-clicked');
		
		function resetBtn(){
			$('.btn-flat-clicked').toggleClass('btn-flat-clicked');	return true;
		}
		
		function swapClass(Obj,Cls){
			Obj.toggleClass(Cls); return true;
		}
		
		$("#loadUser").click(function(){
			var a = $(this).attr("id");
			if(active != a){
				nowLoading($("#playground"),function(){
					$("#playground").load("loadUser_ss.php?rand="+Math.random());
					if(active == false){
						alert("hey");
					}
				});
				resetBtn();
				swapClass($(this),'btn-flat-clicked');
				active = a;	
			}
		});			
		
		$("#loadUserAnn").click(function(){
			alert("loadUserAnn");
		});	
		
		$("#loadTrash").click(function(){
			alert("loadUserAnn");
		});
		
		$("#loadInform").click(function(){
			var a = $(this).attr("id");
			if(active != a){
				nowLoading($("#playground"),function(){
					$("#playground").load("contact.php");
				});
				resetBtn();
				//$(this).toggleClass('btn-flat-clicked');
				swapClass($(this),'btn-flat-clicked');
				active = a;
			}
		});
		
		$("#loadConfirmPayment").click(function(){
			var a = $(this).attr("id");
			if(active != a){
				nowLoading($("#playground"),function(){
					$("#playground").load("confirm_order.php");
				});
				resetBtn();
				//$(this).toggleClass('btn-flat-clicked');
				swapClass($(this),'btn-flat-clicked');
				active = a;
			}
		});		
		
	}
	
	function loadSetting(){
		var active = $("#loadUser").attr("id");
		$("#loadUser").toggleClass('btn-flat-clicked');
		
		function resetBtn(){
			$('.btn-flat-clicked').toggleClass('btn-flat-clicked');	return true;
		}
		
		function swapClass(Obj,Cls){
			Obj.toggleClass(Cls); return true;
		}
		
		$("#loadUser").click(function(){
			var a = $(this).attr("id");
			if(active != a){
				nowLoading($("#playground"),function(){
					$("#playground").load("loadUser_ss.php?rand="+Math.random());
					if(active == false){
						alert("hey");
					}
				});
				resetBtn();
				swapClass($(this),'btn-flat-clicked');
				active = a;	
			}
		});			
		
		$("#loadUserAnn").click(function(){
			alert("loadUserAnn");
		});
		
		$("#loadInform").click(function(){
			alert("loadInform");
		});
		
		$("#loadConfirmPayment").click(function(){
			alert("loadConfirmPayment");
		});
		
		$("#loadManageProduct").click(function(){
			var a = $(this).attr("id");
			if(active != a){
				nowLoading($("#playground"),function(){
					$("#playground").load("add_product.php");
				});
				resetBtn();
				//$(this).toggleClass('btn-flat-clicked');
				swapClass($(this),'btn-flat-clicked');
				active = a;
			}
		});
		
		$("#loadAdvertising").click(function(){
			alert("loadAdvertising");
		});
		
		
	}
	
	function setHoverFadeTo(Obj){
		Obj.fadeTo(500,0.7);
		Obj.hover(function(){
			$(this).fadeTo(500,1).css("background-color","#efefef");
		},function(){
			$(this).fadeTo(500,0.7).css("background-color","transparent");
		});	
	}
	
	function setHeightContent(){
		var left = $("#content-left").css("height").replace("px","");
		var right = $("#content-right").css("height").replace("px","");
		var main = $("#content-main").css("height").replace("px","");
		//alert(left + " " + main + " " + right);
		var maxval = Math.max(left,main,right)+280;	   
		$("#content-left").css("height",maxval);
		$("#content-right").css("height",maxval);
		$("#content-main").css("height",maxval);	
	}
	
	function loadFB(){
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	}
	
	function informListener(){
		/*btn-submit-inform
			INF_EMAIL
			INF_PHONE
			INF_MESSAGE*/
		$("#btn-submit-inform").click(function(){
			var INF_EMAIL = $("#INF_EMAIL").val();
			var INF_PHONE = $("#INF_PHONE").val();
			var INF_MESSAGE = $("#INF_MESSAGE").val();
			showNote('<p align="center">กำลังดำเนินการ</p>');
			$.ajax({
				url : "contact_ss.php?rand="+Math.random(),
				data : {
					'INF_EMAIL' : INF_EMAIL,
					'INF_PHONE' : INF_PHONE,
					'INF_MESSAGE' : INF_MESSAGE	
				},
				type : 'POST',
				dataType : 'JSON',
				success : function(response,status,xhr){
					if(response.status == true){
						showNote('<p align="center">' + response.msg + '</p>');
						setTimeout('popup_close(); ',3000);
					}else{
						showNote('<p align="center">' + response.msg + '</p>');
						setTimeout('popup_close(); ',1500);
					}
				},
				error : function(){
					alert("Informing had something wrong.\nPlease try again.");
				}
			});
		});
		
	}
	
	function submitEditListener(){
		$('#btn-submit-edit').click(function(){
			var ANN_CODE = $("#ANN_CODE");
			var ANN_TITLE = $("#ANN_TITLE");
			var ANN_KEYWORD = $("#ANN_KEYWORD");
			var ANN_SHORT_DESCRIBE = $("#ANN_SHORT_DESCRIBE");
			var ANN_DESCRIBE = $("#ANN_DESCRIBE");
			var ANN_JOB_TYPE = $("#ANN_JOB_TYPE");
			var ANN_EDU_LEVEL = $("#ANN_EDU_LEVEL");
			if(chk_blank_form("#add_ann :input") == false){
				return false;	
			}
			
			showNote('<p align="center">กำลังดำเนินการ</p>',true);
			$.ajax({
				url:'edit_annoucement_ss.php?rand='+Math.random(),
				data:{
					'ANN_CODE':ANN_CODE.val(),
					'ANN_TITLE':ANN_TITLE.val(),
					'ANN_KEYWORD':ANN_KEYWORD.val(),
					'ANN_SHORT_DESCRIBE':ANN_SHORT_DESCRIBE.val(),
					'ANN_DESCRIBE':ANN_DESCRIBE.val(),
					'ANN_JOB_TYPE':ANN_JOB_TYPE.val(),
					'ANN_EDU_LEVEL':ANN_EDU_LEVEL.val()
				},
				type:'post',
				success:function(data,status,xhr){
					showNote(data,true);
					setTimeout('$(".content-popup").html(""); popup_close($(".bgpopup")); window.location.href="index.php?Node=annoucement_box";',1500);
					return false;
				},
				error:function(){
					alert("Have something wrong in this progress.\nPlease try again.");
					return false;
				}
			});
		});
	}
		
	function chkClickListener(Obj,Selector){
			if(Obj.attr('checked') == 'checked'){
				$('.chk_all').removeAttr('checked');
				Obj.removeAttr('checked');
				var ind = Obj.index(Selector)+2;
				$('tr.tr_ann:nth-child('+ind+')').css('background-color','none');
				countchk = countchk < 1 ? countchk : --countchk;
			}else{
				Obj.attr('checked','checked');
				var ind = Obj.index(Selector)+2;
				$('tr.tr_ann:nth-child('+ind+')').css('background-color','#CCC');	
				++countchk;
				/*if(countchk == $('.chk_ann').length){
					$('.chk_all').attr('checked','checked');
				}
				ทำให้ chk_all checked = false ทำไมทำไม่ได้*/
			}
			//alert("This is : "+countchk);
	}
	
	function chkAllClickListener(Obj1,Obj2,Selector){
			if(Obj1.attr('checked') == 'checked'){
				Obj1.removeAttr('checked');
				Obj2.removeAttr('checked');
				$(Selector).css('background-color','none');
				countchk = 0;
			}else{
				Obj1.attr('checked','checked');
				Obj2.removeAttr('checked');
				Obj2.click();
				$(Selector).css('background-color','#CCC');
				countchk = Obj2.length;
			}
			//alert("This is : "+countchk);
	}
	
	function whoChecked(Obj){
		var b=0,va="",chkvalue = [];
		Obj.each(function(){
			if($(this).attr('checked') == 'checked'){
				chkvalue[b++] = $(this).val() + " ";	
			}
		});
		/*for(index=0;index<chkvalue.length;index++){
			va += chkvalue[index];
		}
		alert(va);*/
		return chkvalue;
	}
	
	function loadBox(USER_CODE){
		var chkstatus = 0;
		$.ajax({
			url : 'loadBox.php?rand='+Math.random(),
			data : {
				'USER_CODE' : USER_CODE	
			},
			dataType : "HTML",
			type : 'POST',
			success : function(response,status,xhr){
				if(response != "fail"){
					$('.ann-box').append(response).toggleClass('ann-box').fadeIn(1500);
					$('#chk_all').change(function(){
						chkAllClickListener($(this),$('.chk_ann'),'tr.tr_ann');
					});
					
					$('.chk_ann').change(function(){
						chkClickListener($(this),'.chk_ann');
						chkstatus = 1;
						//alert('hey');
					});
					
					$('.tr_ann').click(function(){
						if(chkstatus == 0){
							var ind = $(this).index('.tr_ann');
							$('.chk_ann:eq('+ind+')').click();
							//alert('tr');
						}else{
							chkstatus = 0;	
						}
					});
					
					$('#btn-delete').click(function(){
						if(countchk > 0){
							if(confirm("Are you sure to move these item to recycle bin?")){
								showNote('<p align="center">กำลังดำเนินการ</p>',true);
								var value = whoChecked($('.chk_ann'));
								$.ajax({
										url : 'movetrash_annoucement_ss.php?rand=' + Math.random(),
										data : {'value' : value,
											'status' : '1'
										},
										type : 'POST',
										dataType : 'HTML',
										success : function(response,status,xhr){
											if(!response){
												showNote('<p align="center">'+response+'</p>',true);		
												setTimeout('popup_close();',3000);
											}else{
												showNote('<p align="center">ย้ายลงถังขยะเรียบร้อย</p>',true);		
												setTimeout('location.reload();',2000);
											}
										},
										error : function(){
											showNote('<p align="center">Deleting had something wrong!</p>');
										}
								});							
							}
						}
						
					});
					
					$('#btn-add').click(function(){
						showContent('showpage.php?Node=add_annoucement');
					});
					
					$('#btn-edit').click(function(){
						if(countchk > 1){
							alert("กรุณาเลือกรายการที่ต้องแก้ไขเพียงรายการเดียว");
						}else if(countchk < 1){
							alert("กรุณาเลือกรายการที่ต้องแก้ไข");
						}else{
							var a = "something";
							var ann_id = whoChecked($('.chk_ann'));
							//showContent('showpage.php?Node=edit_annoucement&ann_id=' + ann_id);
							$.ajax({
								url : 'edit_annoucement_starter.php?rand='+Math.random(),
								data : {'ann_id' : ann_id[0]},
								dataType : 'HTML',
								type : 'POST',
								success: function(response,status,xhr){
									showContent('showpage.php?Node=edit_annoucement&ann_id=' + response);
								},
								error: function(){
									showNote("<p align='center'>มีบางอย่างผิดพลาดโปรดลองอีกครั้ง!</p>",true);	
									setTimeout('popup_close();', 2000);
								}
							});
						}
					});
				}
				
			},
			error : function(){
				alert("loadBox had something wrong!");
				return false;
			},
			async : false
		});
	}
	
	function loadTrash(USER_CODE){
		var chkstatus = 0;
		$.ajax({
			url : 'loadTrash.php?rand='+Math.random(),
			data : {
				'USER_CODE' : USER_CODE	
			},
			dataType : "HTML",
			type : 'POST',
			success : function(response,status,xhr){
				if(response != "fail"){
					$('.ann-box').append(response).toggleClass('ann-box').fadeIn(1500);
					$('#chk_all').change(function(){
						chkAllClickListener($(this),$('.chk_ann'),'tr.tr_ann');
					});
					
					$('.chk_ann').change(function(){
						chkClickListener($(this),'.chk_ann');
						chkstatus = 1;
						//alert('hey');
					});
					
					$('.tr_ann').click(function(){
						if(chkstatus == 0){
							var ind = $(this).index('.tr_ann');
							$('.chk_ann:eq('+ind+')').click();
							//alert('tr');
						}else{
							chkstatus = 0;	
						}
					});
					
					$('#btn-delete').click(function(){
						if(countchk > 0){
							if(confirm("Are you sure to move these item to recycle bin?")){
								showNote('<p align="center">กำลังดำเนินการ</p>',true);
								var value = whoChecked($('.chk_ann'));
								$.ajax({
										url : 'delete_annoucement_ss.php?rand=' + Math.random(),
										data : {'value' : value},
										type : 'POST',
										dataType : 'HTML',
										success : function(response,status,xhr){
											if(!response){
												showNote('<p align="center">'+response+'</p>',true);		
												setTimeout('popup_close();',3000);
											}else{
												showNote('<p align="center">ลบรายการเสร็จเรียบร้อย</p>',true);		
												setTimeout('location.reload();',2000);
											}
										},
										error : function(){
											showNote('<p align="center">Deleting had something wrong!</p>');
										}
								});							
							}
						}
						
					});
					
					$('#btn-recover').click(function(){
						if(countchk > 0){
							if(confirm("Are you sure to recovery these item?")){
								showNote('<p align="center">กำลังดำเนินการ</p>',true);
								var value = whoChecked($('.chk_ann'));
								$.ajax({
										url : 'movetrash_annoucement_ss.php?rand=' + Math.random(),
										data : {'value' : value,
											'status' : '0'
										},
										type : 'POST',
										dataType : 'HTML',
										success : function(response,status,xhr){
											if(!response){
												showNote('<p align="center">'+response+'</p>',true);		
												setTimeout('popup_close();',3000);
											}else{
												showNote('<p align="center">กู้คืนเสร็จเรียบร้อย</p>',true);		
												setTimeout('location.reload();',2000);
											}
										},
										error : function(){
											showNote('<p align="center">Recovery had something wrong!</p>');
										}
								});							
							}
						}
						
					});
					
				}
				
			},
			error : function(){
				alert("loadTrash had something wrong!");
				return false;
			},
			async : false
		});
	}
	
	function viewCount(anncount_id,user_code){
		var result = false;
		$.ajax({
			url : 'viewCount.php?rand='+Math.random(),
			data : {'ann_id' : anncount_id,
				'USER_CODE' : user_code},
			dataType : 'JSON',
			type : 'post',
			success : function(response,status,xhr){
				result = response.value == true ? true : false;
				//alert('This is : ' + response.value + '\nMsg : ' + response.msg);
				return false;
			},
			error : function(){
				alert('viewCount() has something wrong!');
				return false;
			},
			async : false
		});
		return result;
	}
	
	function hyperlink(url,target){
		target = target != '' ? target : '_self';
		window.open(url,target);
		return false;
	}
	
	function showContent(path,isLock){	
		popup_close();
		nowLoading($(".content-popup"),function(){
			$(".content-popup").load(path);	
		});
		$(".bgpopup").fadeIn(1200,function(){
			$(this).css("display","block");	
			if(isLock != true){
				img_del_listener(isLock);
			}
		});
		//popup_listener(isLock); //comment ไว้ก่อนเพราะว่า เวลาเปลี่ยนหน้า showContent แล้วมันหายไปเอง
		if(isLock != true){
			$(document).bind('keydown',function(e){
				if(e.which == 27){
					popup_close($('.bgpopup'));
				}
			});
		}
		return false;
	}
	
	function img_del_listener(isLock){
		$('.content-popup').prepend('<img id="img_del" title="[Esc] to Close." src="images/delete.png" />');
		$('#img_del').addClass('img_del')
			.bind('click',function(){
			popup_close();						
		});
		return false;
	}
	
	function showNote(msg,isLocks){
		popup_close();
		nowLoading($(".content-popup"),function(){
			$(".content-popup").html(msg);
		});
		$(".bgpopup").fadeIn(1200,function(){
			$(this).css("display","block");
		});
		
		//popup_listener(isLock);
		if(isLocks != true){
			$(document).bind('keydown',function(e){
				if(e.which == 27){
					popup_close($('.bgpopup'));
				}
			});
		}
		return false;
	}
	
	function popup_close(obj){
		$('.content-popup').undelegate('click');
		$('.bgpopup').fadeOut(100,function(){
			$(this).css("display","none");	
			getDefaultMetaData();
			$('#img_del').unbind('click');
			return false;
		});
		$(document).unbind('keydown');
		return false;
	}
	
	function popup_listener(isLock){
		var b = 0;
		$(".content-popup").hover(function(){
			b = 1;
			return false;
		},function(){
			b = 0;
			return false;	
		});
		$(".bgpopup").unbind('click')
			.bind('click',function(){
			if(b == 0 && isLock != true){
				$('.content-popup').html("");
				popup_close($(this));
			}
		});
	}
	
	function chk_blank_form(frm){
		frm = $(frm);
		var a = 0;
		frm.each(function(){
			if($(this).val() == ""){
				alert("Please input your data completely!");
				$(this).focus();
				a = 1;
				return false;
			}
		});	
		return a == 1? false : true;
	}
	
		function registerListener(){
			$('#btn-submit-register').click(function(){
				if(chk_blank_form("#frm-register :input") == true){
					var USER_NAME = $("#USER_NAME").val();
					var USER_LASTNAME = $("#USER_LASTNAME").val();
					var USER_PASSWORD = $("#USER_PASSWORD").val();
					var USER_EMAIL = $("#USER_EMAIL").val();
					var USER_TEL = $("#USER_TEL").val();
					var USER_OFFICE_TEL = $("#USER_OFFICE_TEL").val();
					var USER_ORG_NAME = $("#USER_ORG_NAME").val();
					var USER_ADDRESS = $("#USER_ADDRESS").val();
					var USER_WEBSITE = $("#USER_WEBSITE").val();
					$.ajax({
						url : 'register_ss.php',
						data : {
							'USER_NAME' : USER_NAME,
							'USER_LASTNAME' : USER_LASTNAME,
							'USER_PASSWORD' : USER_PASSWORD,
							'USER_EMAIL' : USER_EMAIL,
							'USER_TEL' : USER_TEL,
							'USER_OFFICE_TEL' : USER_OFFICE_TEL,
							'USER_ORG_NAME' : USER_ORG_NAME,
							'USER_ADDRESS' : USER_ADDRESS,
							'USER_WEBSITE' : USER_WEBSITE
						},
						type : 'post',
						success : function(data,status,xhr){
							$('.content-popup').html(data);
							//setTimeout('showContent("SignIn.php",true);',5000);
							setTimeout('window.location.href="index.php?On=Success";',4000);
							return false;
						},
						error : function(){
							alert("Have something wrong in this progress.\nPlease try again.");
							return false;
						}
					});
				}
				return false;	
			});
		}
	
	function SignIn(usr,pwd){
		if(chk_blank_form("#frm-register :input")){
			$.ajax({
				url : 'SignIn_ss.php',
				data : {
					'usr' : usr,
					'pwd' : pwd
				},
				dataType : 'JSON',
				type : 'post',
				success : function(response,status,xhr){
					if(response.status == true){
						SigninStatus = true;
						var conf_stat = response.confirm_status;
						showNote("<div align=\'center\'>Welcome " + response.name + "!</div>",true);
						if(conf_stat == 2){
							setTimeout(' window.location.href = "index.php?On=Success";',1800);
						}else if(conf_stat == 1){
							setTimeout(' window.location.href = "index.php?Node=purchase";',1800);
						}
					}else{
						SigninStatus = false;
						showNote("<div align=\'center\'>" + response.name + "</div>");
						setTimeout('  showContent("SignIn.php");',3000);
					}
					return false;
				},
				error : function(){
					alert("Signing In have any problem please try again!");	
					return false;
				}
			});
			return true;
		}else{
			return false;	
		}
	}
	
	function SigninListener(){
		$('.content-popup').delegate('#btn-cancel-signin','click',function(){
			popup_close();	
			return false;
		});
		
		$('.content-popup').delegate('#btn-submit-signin','click',function(){
			var USER_EMAIL = $('#USER_EMAIL').val();
			var USER_PASSWORD = $('#USER_PASSWORD').val();
			SignIn(USER_EMAIL,USER_PASSWORD);	
			return false;
		});	
	}
	
	
	function isOnline(){
		var x = null;
		$.ajax({
			url : 'isOnline_ss.php?rand=' + Math.random(),
			data : {'val':1},
			type : 'post',
			dataType : 'JSON',
			success : function(response,status,xhr){
				x = !response.val ? false : true;
				return false;
			},
			error : function(){
				alert("Connecting had any problem please try again!");	
				return false;
			},async : false
		}); 
		return x;
	}	
	
	function getDefaultMetaData(){
		setUrlWithoutReload("","",defaulturl);
		setMetaKeywords(defaultkeyw);
		setMetaDescription(defaultdesc);
		setTitle(defaulttitle);
	}
	
	function setUrlWithoutReload(obj,title,url){
		defaulturl = document.URL;
		window.history.pushState(obj, title, url);	
	}
	
	function setMetaKeywords(keyw){
		defaultkeyw = $('head meta[name="keywords"]').attr("content");
		$('head meta[name="keywords"]').attr("content",keyw);
		//alert($('head meta[name="keywords"]').attr("content"));
		return false;
	}
	
	function setMetaDescription(desc){
		defaultdesc = 
		$('head meta[name="description"]').attr("content");
		$('head meta[name="description"]').attr("content",desc);
		//alert($('head meta[name="description"]').attr("content"));
		return false;
	}
	
	function setTitle(desc){
		defaulttitle = $('head title').text();
		$('head title').text(desc);
		//alert($('head title').text());
		return false;
	}
		
	function add_annoucement(){
		
			$('#btn-submit-add').click(function(){
				var ANN_TITLE = $("#ANN_TITLE");
				var ANN_KEYWORD = $("#ANN_KEYWORD");
				var ANN_SHORT_DESCRIBE = $("#ANN_SHORT_DESCRIBE");
				var ANN_DESCRIBE = $("#ANN_DESCRIBE");
				var ANN_JOB_TYPE = $("#ANN_JOB_TYPE");
				var ANN_EDU_LEVEL = $("#ANN_EDU_LEVEL");
				if(chk_blank_form("#add_ann :input") == false){
					return false;	
				}
				/*url:
					data: {DATA1 : VALUE}
					dataType: HTML, XML, JSON
					error: function()
					success: function()
					type: GET, POST*/
				$.ajax({
					url:'add_annoucement_ss.php',
					data:{
						'ANN_TITLE':ANN_TITLE.val(),
						'ANN_KEYWORD':ANN_KEYWORD.val(),
						'ANN_SHORT_DESCRIBE':ANN_SHORT_DESCRIBE.val(),
						'ANN_DESCRIBE':ANN_DESCRIBE.val(),
						'ANN_JOB_TYPE':ANN_JOB_TYPE.val(),
						'ANN_EDU_LEVEL':ANN_EDU_LEVEL.val()
					},
					type:'post',
					success:function(data,status,xhr){
						$('.content-popup').html(data);
						setTimeout('$(".content-popup").html(""); popup_close($(".bgpopup")); window.location.href="index.php";',1500);
						return false;
					},
					error:function(){
						alert("Have something wrong in this progress.\nPlease try again.");
						return false;
					}
				});
			});
			
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
