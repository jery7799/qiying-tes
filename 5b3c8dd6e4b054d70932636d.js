
        
        $(function(){
            var image = new Image();
            image.onload = function() {
                var imgWidth=$('.ty-banner-1 img').width();
               var windowWidth=$(window).width();
               var length = (imgWidth-windowWidth)/2;
               if(length>0){
                    $('.ty-banner-1 img').attr('style','margin-left:'+ (-length) + 'px');
               }
               $('.ty-banner-1 img').addClass('show');
            }
            image.src = $('.ty-banner-1 img').attr('src');
           
        });
    

       var key = document.getElementById("key");

            function searchInfo() {
                var base = $('head').data('base');
                if (key.value) {
                    location.href = base + "search.php?key=" + key.value;
                } else {
                    alert('请输入您要搜索的关键词！');
                }
            }
            key.addEventListener('keypress', function(event) {
                var keycode = event.keycode || event.which;
                if (keycode == "13") {
                    searchInfo();
                }
            });

        function searchLink(el) {
            var href = $(el).attr("href");
            location.href = href ? href : "/search.php?key=" + $(el).html();
        }
    

        $("[navcrumbs]").find("dd a").last().addClass('cur');
    

        function resetForm() {
            $('#intentionalOrderFormId input[type=text]').val('');
            $('#intentionalOrderFormId textarea').val('');
        }
        var timeinterval = $('.timeinterval').text();
        var isvalidate = $('.isvalidate').text();
        $('#intentionalOrderFormId').nsw({
            btnCell: '.p4-order-form-1-b1',
            timeInterval: timeinterval,
            row: '.findrow li',
            errorModal: true,
            isValidate: isvalidate
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
    
