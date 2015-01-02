$(document).ready(function(){
    //首先将#back-to-top隐藏
    $("#back-to-top").hide();
    //当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
    $(function () {
    $(window).scroll(function(){
    if ($(window).scrollTop()>100){
    $("#back-to-top").fadeIn(500);
    }
    else
    {
    $("#back-to-top").fadeOut(500);
    }
    });
    //当点击跳转链接后，回到页面顶部位置
    $("#back-to-top").click(function(){
    $('body,html').animate({scrollTop:0},100);
    return false;
    });
    });
    });

/*$(document).ready(function(){
    //首先将#back-to-top隐藏
    
    //当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
    $(function () {
    $(window).scroll(function(){
    if ($(window).scrollTop()>100){
    $("#bottom").fadeOut(200);
    }
    else
    {
    $("#bottom").fadeIn(200);
    }
    });
   
    });
    });*/

/*function touchMoveFunc(evt) {
    try {
        //evt.preventDefault(); //阻止触摸时浏览器的缩放、滚动条滚动等
        var touch = evt.touches[0]; //获取第一个触点
        var x = Number(touch.pageX); //页面触点X坐标
        var y = Number(touch.pageY); //页面触点Y坐标
        if (y - startY > 0) {
            //向下滑
            $("#bottom").fadeIn();
 
        } else {
            //向上滑
            $("#bottom").fadeOut();
        }
    }
    catch (e) {
        alert('touchMoveFunc：' + e.message);
    }
}*/
 
