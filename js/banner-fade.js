// banner 简易 fade 轮播（替代 nsw 的 fold 效果，避免响应式高度变化冲突）
(function () {
    function initBanner() {
        if (typeof jQuery === 'undefined') return;
        var $b = jQuery('.banner');
        if (!$b.length) return;
        var $ul = $b.find('.ban_p ul');
        var $lis = $ul.find('li');
        var $ems = $b.find('.ban_t em');
        if ($lis.length < 2) return;
        // 关键：父容器（ban_p ul）必须是 positioned，li 才能正确在 banner 内叠加
        $ul.css('position', 'relative');
        // 初始态：所有 li 绝对定位叠加，第一张显示，其他淡出
        $lis.css({position: 'absolute', left: 0, top: 0, width: '100%'}).hide();
        $lis.eq(0).show();
        $ems.removeClass('on');
        $ems.eq(0).addClass('on');
        var idx = 0;
        function show(n) {
            if (n === idx) return;
            $lis.eq(idx).stop(true).fadeOut(600);
            $lis.eq(n).stop(true).fadeIn(600);
            $ems.removeClass('on').eq(n).addClass('on');
            idx = n;
        }
        function next() {
            show((idx + 1) % $lis.length);
        }
        // 自动播放
        var timer = setInterval(next, 5000);
        // 指示点点击
        $ems.on('click', function () {
            clearInterval(timer);
            show($ems.index(this));
            timer = setInterval(next, 5000);
        });
    }
    if (document.readyState === 'complete') initBanner();
    else window.addEventListener('load', initBanner);
})();