<!DOCTYPE html><html lang="zh"><head data-base="/">
<meta http-equiv="Cache-Control" content="no-transform">
<meta http-equiv="Cache-Control" content="no-siteapp"> 
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="renderer" content="webkit"> 
  <title>启英机械全站搜索</title>
<meta name="keywords" content="启英机械全站搜索">
<meta name="description" content="东莞市启英机械设备有限公司是华南地区较具实力的传动元件生产厂家及服务商。主营产品有直线模组，同步带模组，半封闭模组，丝杆模组，价格合理。"> 
  <link href="css/reset.css?1532518551511" rel="stylesheet"> 
  <script src="js/nsw.pc.min.js"></script> 
  <link href="5b3c8dd3e4b054d709326363.css" rel="stylesheet">
 
<script src="js/uaredirect.js"></script>
<script>uaredirect("http://www.kee-qy.com/mobile/search.php");</script></head> 
 <body class="body-color"> 
  <div class="h_top"> 
 <div class="header pr"> 
  <h1 class="wow slideInLeft animated t_logo fl"><span><a href="index.html" title="启英机械"><img alt="启英2" src="resource/images/7ccbb53ccf864a0b84acd13cc9485a8b_26.png" title="启英2"></a></span></h1> 
  <div class="wow slideInRight animated fr menu"> 
   <ul> 
     
     <li class="cur"> <a href="/" title="首页"> 首页 </a> </li> 
     
     <li> <a href="/helps/gyqy.html" title="关于启英"> 关于启英 </a> </li> 
     
     <li> <a href="product/pdmz.html" title="产品中心"> 产品中心 </a> </li> 
     
     <li> <a href="/article/zsdl.html" title="招商代理"> 招商代理 </a> </li> 
     
     <li> <a href="/article/qydt.html" title="启英动态"> 启英动态 </a> </li> 
     
     <li> <a href="/helps/lxqy.html" title="联系启英"> 联系启英 </a> </li> 
     
     <li> <a href="https://gdssmc.1688.com/" title="阿里巴巴"> 阿里巴巴 </a> </li> 
     
   </ul> 
  </div> 
 </div> 
  
</div> 
  <div> 
 <div class="ty-banner-1"> 
   
   <a href="product/tbi.html" title="启英专注机械功能配件二次加工"> <img alt="启英专注机械功能配件二次加工" src="resource/images/ad576ceeabfd4de480f0400510d70dd3_50.jpg" title="启英专注机械功能配件二次加工"> </a> 
    
   
   
   
 </div> 
</div> 
  <div class="p1-search-1 b"> 
 <div class="blk-main"> 
  <div class="blk-md blk"> 
   <div class="p1-search-1-inp fr"> 
    <input class="p1-search-1-inp1" id="key" placeholder="请输入关键字" type="text"> 
    <input class="p1-search-1-inp2" onclick="searchInfo();" type="button"> 
   </div> 
   <p> 热门关键词： 
     
     <a href="" onclick="searchLink(this);"></a> 
     </p> 
  </div> 
 </div> 
  
 <!-- CSS --> 
  
</div> 
  <div class="blk-main"> 
   <div class="blk plc"> 
 <!-- HTML --> 
 <div class="p12-curmbs-1" navcrumbs=""> 
  <b> 您的位置: </b> 
  <a href="index.html"> 首页 </a> 
  <span> &gt; </span> 
   
   <i class=""> <a href="http://www.kee-qy.com/search.php"> 全站搜索 </a>  </i> 
   
 </div> 
  
  
</div> 
  </div> 
  <div style="background-color:#fff;"> 
   <div class="blk-main"> 
    


<?php     
    date_default_timezone_set('prc');
	
	
	
	
	/**
	 * 数组分页函数 核心函数 array_slice
	 * 用此函数之前要先将数据库里面的所有数据按一定的顺序查询出来存入数组中
	 * $count  每页多少条数据
	 * $page  当前第几页
	 * $array  查询出来的所有数组
	 * order 0 - 不变   1- 反序
	 */
	function page_array($count,$page,$array,$order){
	  global $countpage; #定全局变量
	  $page=(empty($page))?'1':$page; #判断当前页面是否为空 如果为空就表示为第一页面 
	    $start=($page-1)*$count; #计算每次分页的开始位置
	  if($order==1){
	   $array=array_reverse($array);
	  }  
	  $totals=count($array); 
	  $countpage=ceil($totals/$count); #计算总页面数
	  $pagedata=array();
	  $pagedata=array_slice($array,$start,$count);
	  return $pagedata; #返回查询数据
	}
	
	
	$json_string = file_get_contents(base64_decode("ZGF0YS5qc29u"));
	
	//将json数组转为php数组
	 $de_json =   json_decode($json_string,TRUE);
	 
     $de_arr = $de_json["data"];//文章或产品列表
     $de_module =  $de_json["module"];//频道列表
     $basePath = $de_json["basePath"];
    // echo $basePath;
     
	 $count_json = count( $de_arr);
	 //echo $count_json;
	 //遍历数组查询条件   根据关键字匹配，放入新的数组		
	 
	 $keywd = null;//关键字
	 $pageNum = 1;//当前页

	 $page_count = 10;//分页显示数量
	 
	 
        if(isset($_GET["key"])){
            $keywd = $_GET["key"];
            if($keywd!=null){
             $keywd = trim($keywd); 
            }
        }
	  if(isset($_GET["pageNum"])&&$_GET["pageNum"]!=null){
	  	$pageNum = $_GET["pageNum"];
	  }
	  
	
	  
	  
    
	 
	 $array = array();
	 
	 
	 for($i = 0;$i < $count_json;$i++){
	  	$d_model = $de_arr[$i];
	  	$d_title = $d_model['title'];
	  	$d_desc = $d_model['desc'];
	  	$d_type = $d_model['type'];
	  	
	
      $keywdTemp = strtoupper($keywd);
	  	if($keywd != null &&( strstr(strtoupper($d_title),$keywdTemp)||strstr(strtoupper($d_desc),$keywdTemp))){
	  		if(isset($type)&& $type!=null && $type != 'all'){
	  			  $d_model['title'] =eregi_replace($keywd,"<i style='color:red'>$keywd</i>", $d_title);
	  			  $d_model['desc'] =eregi_replace($keywd,"<i style='color:red'>$keywd</i>", $d_desc);
	  			  $array[] = $d_model;//将符合条件的加入到数组

	  		}else{
	  		      $d_model['title'] =eregi_replace($keywd,"<i style='color:red'>$keywd</i>", $d_title);
	  			  $d_model['desc'] =eregi_replace($keywd,"<i style='color:red'>$keywd</i>", $d_desc);
  			      $array[] = $d_model;
	  		}
	  	}else if($keywd == null){

	  	}

	 }
	 
	 $array_temp = array();
	 
	 $allPageNum = 0;
	 $arrcount = 0;
	 
	 
 	if(count($array)>0){
		 //计算总页数
		 $allPageNum =  count($array)%$page_count==0?count($array)/$page_count:count($array)/$page_count+1;
		 $arrcount =   count($array);
		 $array = page_array($page_count, $pageNum, $array, 0);
	}
	 
	 
?>

	 
	
	  
        <div class="blk-main">
            <div class="xnznr-search-1-tit tit-md"><h3>搜索结果</h3></div>
            <div class="xnznr-search-1-main">
            <?php		
				if(count($array)==0){
					echo htmlspecialchars("没有找到你要的东西，请尝试修改关键词再次搜索!");
				}
             
			  	foreach ($array as $key => $value) {
			?>
			
	                   <dl>
	                      <?php 
	                      if($value['icon'] != null){
	                      ?>
	                     <dt><a href="<?php echo htmlspecialchars($value['href']) ?>"><img src="<?php echo htmlspecialchars($value['icon']) ?>" ></a></dt>
	       				 <?php 
	                      }
	       				 ?>
	                       <dd>
	                           <h4><a class="t1-article-link" href="<?php echo htmlspecialchars($value['href']) ?>"><?php echo $value['title'] ?></a></h4>
	                           <div class="xnznr-search-1-desc">
	                            <?php echo $value['desc'] ?>
	                           </div>
	                       </dd>
	                   </dl>
	        	
			<?php 
			  	}
			?>
			</div>
              <div class="clear"></div>
              <div class="xnznr-page-main"></div>
              <div id="saveid" style="display:none;"></div>
        </div>
	

    <script src="js/laypage.js"></script>
<script type="text/javascript">
	<?php 
	 if(isset($_GET["key"]) && $_GET["key"] != null){
	?>
     if(document.getElementById("key")){
         document.getElementById("key").value="<?php echo htmlspecialchars( $_GET["key"]) ?>";
     }else{
        $('#saveid').text('<?php echo htmlspecialchars($_GET["key"]) ?>');
     }
	<?php 
		}
	?>
	
	 $(function(){
         laypage({
             cont: $('.xnznr-page-main'),
             pages: <?php echo htmlspecialchars($allPageNum) ?>,
             skip: false,
             skin: '',
             groups: 3,
             curr: <?php echo htmlspecialchars($pageNum) ?>,
             prev: '<img src="images/p12-pagination1.jpg" title="上一页">', //若不显示，设置false即可
                first: false,
                last: false,
                next: '<img src="images/p12-pagination2.jpg" title="下一页">', //若不显示，设置false即可 
             hash: true,
             jump: function(obj, flag) {
              if(document.getElementById("key")){
                 var key = document.getElementById("key").value;
                 
                }else{
                var key = $('#saveid').text();
                
                }
                 var base = "http://www.kee-qy.com/search.php?key="+key+"&pageNum="+obj.curr;
                
                
                 if (!flag) {
                    window.location.href = base;
                 }
                 
             }
         });
     })


	
</script>

<style>
            .xnznr-page{text-align: center;margin-top: 25px;}
            .xnznr-page-main{margin-bottom:30px;}
            .xnznr-page a{display:inline-block;width: 30px;height: 30px;line-height: 30px; text-align: center;border:1px solid #aaa;vertical-align: middle;margin-right: 4px;}
            .xnznr-page a.cur{color: #fff;background: #124a62;border: 1px solid #124a62;}
            .xnznr-page a img{display: block;}
            .xnznr-search-1-tit{border-bottom: 1px solid #ccc;}
            .xnznr-search-1-tit h3{width: 145px;height: 46px;text-align: center;line-height: 46px;background: #333;color: #fff;font-weight: normal;position: relative;top: 1px;font-size:24px;}
            .xnznr-search-1-main dl{padding: 23px 0;clear: both;border-bottom: 1px solid #cbcbcb;display: inline-block;width: 100%;}
            .xnznr-search-1-main dt{width: 18%;padding-right: 23px;float: left;}
            .xnznr-search-1-main dt img{width: 100%;}
            .xnznr-search-1-main dd{float: left;width: 79%;}
            .xnznr-search-1-main dd h4{font-size: 18px;font-weight: normal;}
            .xnznr-search-1-main dd h4 span{color: #f00;}
            .xnznr-search-1-desc{line-height: 30px;height: 60px;padding-top: 8px;overflow: hidden;}
            
            
             .xnznr-page-main {
                text-align: center;
                margin-top: 25px;
            }
            
            .xnznr-page-main a,.xnznr-page-main span {
                display: inline-block;
                width: 30px;
                height: 30px;
                line-height: 30px;
                text-align: center;
                border: 1px solid #aaa;
                vertical-align: middle;
                margin-right: 4px;
            }
            .xnznr-page-main .laypage_curr {
                color: #fff;
                background: #666;
                border: 1px solid #666;
            }
            
            .xnznr-page-main a img {
                display: block;
            }
            </style>

 
    <div class="clear"></div> 
   </div> 
  </div> 
  <div class="f_bj"> 
 <div class="f_con footer"> 
  <div class="f_code fr"> 
   <p><img alt="启英机械" src="resource/images/b4af6dafb17c42e486a9b868efe02f31_2.png" title="启英机械"><span>扫一扫<br>启英机械</span></p> 
    
  </div> 
  <div class="f_logo fl"> 
   <span><a href="index.html" target="_blank" title="启英机械"><img alt="启英机械" src="resource/images/ad576ceeabfd4de480f0400510d70dd3_98.png" title="启英机械"></a></span> 
   <div class="f_nav"> 
     
     <a href="http://www.roll68.com/products/pdmz.html/hiwinz.html" target="_blank" title="同步带模组">同步带模组</a> 
     
     <a href="http://www.roll68.com/product/bfbsgm.html" target="_blank" title="丝杆模组">丝杆模组</a> 
     
     <a href="http://www.roll68.com/product/bfbpdm.html" target="_blank" title="半封闭模组">半封闭模组</a> 
     
     <a href="http://www.roll68.com/product/qfbpdm.html" target="_blank" title="全封闭模组">全封闭模组</a> 
     
     <a href="article/qydt.html" title="新闻资讯">新闻资讯</a> 
     
     <a href="helps/gyqy.html" title="关于启英">关于启英</a> 
     
     <a href="product/index.html" title="产品中心">产品中心</a> 
     
     <a href="help/zlxz.html" title="资料下载">资料下载</a> 
     
   </div> 
  </div> 
  <div class="f_text fl"> 
   <div class="f_pho">
     13712894698　13829234591 
   </div> 
   <p>启英机械　备案号：<a href="https://beian.miit.gov.cn/#/Integrated/index" rel="nofollow" target="_blank">粤ICP备2023126730号</a> </p> 
   <p>邮箱： dgqidajidian@163.com　　Q Q： 1119358236</p> 
   <p>百度统计</p> 
  </div> 
 </div> 
 <div class="f_wz"> 
  <div class="footer">
    版权所有 © 2017-2030 东莞市启英机械设备有限公司 保留一切权利 
  </div> 
 </div> 
  
</div> 
  <div class="client-2"> 
 <ul id="client-2"> 
  <li class="my-kefu-qq"> 
   <div class="my-kefu-main"> 
    <div class="my-kefu-left"> 
     <a class="online-contact-btn" href="http://wpa.qq.com/msgrd?v=3&amp;uin=1119358236&amp;site=qq&amp;menu=yes" qq="" target="_blank"> <i></i> <p> QQ咨询 </p> </a> 
    </div> 
    <div class="my-kefu-right"></div> 
   </div> </li> 
  <li class="my-kefu-tel"> 
   <div class="my-kefu-tel-main"> 
    <div class="my-kefu-left"> 
     <i></i> 
     <p>咨询热线</p> 
    </div> 
    <div class="my-kefu-tel-right" phone400="">13712894698</div> 
   </div> </li> 
  <li class="my-kefu-liuyan"> 
   <div class="my-kefu-main"> 
    <div class="my-kefu-left"> 
     <a href="Tools/leaveword.html" title="在线留言"> <i></i> <p> 在线留言 </p> </a> 
    </div> 
    <div class="my-kefu-right"></div> 
   </div> </li> 
  <li class="my-kefu-weixin"> 
   <div class="my-kefu-main"> 
    <div class="my-kefu-left"> 
     <i></i> 
     <p> 微信扫一扫 </p> 
    </div> 
    <div class="my-kefu-right"> 
    </div> 
    <div class="my-kefu-weixin-pic"> 
     <img src="resource/images/b4af6dafb17c42e486a9b868efe02f31_2.png"> 
    </div> 
   </div> </li> 
   
  <li class="my-kefu-ftop"> 
   <div class="my-kefu-main"> 
    <div class="my-kefu-left"> 
     <a href="javascript:;"> <i></i> <p> 返回顶部 </p> </a> 
    </div> 
    <div class="my-kefu-right"> 
    </div> 
   </div> </li> 
 </ul> 
  
  
</div> 
  <script src="js/public.js"></script> 
  <script src="5b3c8dd3e4b054d709326363.js" type="text/javascript"></script>
 
<script>  var sysBasePath = null ;var projPageData = {};</script><script>(function(){var bp = document.createElement('script');
var curProtocol = window.location.protocol.split(':')[0];
if (curProtocol === 'https')
{ bp.src = 'https://zz.bdstatic.com/linksubmit/push.js'; }
else
{ bp.src = 'http://push.zhanzhang.baidu.com/push.js'; }
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(bp, s);
})();</script><script src="js/ab77b6ea7f3fbf79.js" type="text/javascript"></script>
<script type="application/ld+json">
{"@content":"https://ziyuan.baidu.com/contexts/cambrian.jsonld","@id":"http://www.kee-qy.com/http://www.kee-qy.com/search.php","appid":"","title":"启英机械全站搜索","images":[],"description":"","pubDate":"","upDate":"2026-06-24T16:14:42","lrDate":""}
</script></body></html>