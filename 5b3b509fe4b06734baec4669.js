
	            jQuery(".banner").slide({
	                titCell: ".ban_t em",
	                mainCell: ".ban_p ul",
	                effect: "fold",
	                autoPlay: true,
	                delayTime: 700
	            });
	        
 
    function search(){
     var key = document.getElementById('key').value;
     location.href="search.php?key="+key;
    }


        $(function() {
            $(".probox").slide({
                titCell: ".pro_t li",
                titOnClassName: "cur",
                mainCell: ".pro_c .pro_cl",
                vis: 1,
                scroll: 1,
                effect: "leftLoop",
                autoPlay: "true",
                prevCell: '.prev1',
                nextCell: '.next1'
            });
        })
    

			    $(function() {
			        $(".case").slide({
			        	titCell:".casetil li",
			            mainCell: ".case_cl",
			            titOnClassName:"cur",
			            vis:1,
			            scroll: 1,
			            effect: "leftLoop",
			            autoPlay:"true",
			            prevCell: '.prev2',
			            nextCell: '.next2'
			        });
			    }) 
		    

	if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
		new WOW().init();
	};
	

		$(function(){
	        $(".tec_pc li").hover(function(){
	            $(this).addClass("cur");
	            },function(){
	                $(this).removeClass("cur");
	                })

		});
	

        $(function() {
            var time;
            //var winHeight = top.window.document.body.clientHeight || $(window.parent).height();
            $('.client-2').css({
                'marginTop': -($('.client-2').height() / 2)
            });
            $('#client-2 li').on({
                'mouseenter': function() {
                    var scope=this;
                    time = setTimeout(function() {
                        var divDom = $(scope).children('div');
                        var maxWidth = divDom.width();
                        $(scope).stop().animate({
                            left: 77-maxWidth
                        }, 'normal', function() {
                            var pic = $(scope).find('.my-kefu-weixin-pic');
                            if (pic.length > 0) {
                                pic.show();
                            }
                        });
                    }, 100)
                },
                'mouseleave': function() {
                    var pic = $(this).find('.my-kefu-weixin-pic');
                    var divDom = $(this).children('div');
                    var maxWidth = divDom.width();
                    if (pic.length > 0) {
                        pic.hide();
                    }
                    clearTimeout(time);
                    var divDom = $(this).children('div');
                    $(this).stop().animate({
                        left: 0
                    }, "normal", function() {});
                }
            });
            //返回顶部
            $(window).scroll(function() {
                var scrollTop = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop;
                var eltop = $("#client-2").find(".my-kefu-ftop");
                if (scrollTop > 0) {
                    eltop.show();
                } else {
                    eltop.hide();
                }
            });
            $("#client-2").find(".my-kefu-ftop").click(function() {
                var scrollTop = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop;
                if (scrollTop > 0) {
                    $("html,body").animate({
                        scrollTop: 0
                    }, "slow");
                }
            });
        });
    
