GH.run(function(){function _responsive(){$(window).width()>=1280?$("body").addClass("g-1200px"):$("body").removeClass("g-1200px")}function numberChange(id){var zone=id.substring(0,6),year="19"+id.substring(6,8),mdo=id.substring(8,15);id=zone+year+mdo;var getNum=eval(7*id.charAt(0)+9*id.charAt(1)+10*id.charAt(2)+5*id.charAt(3)+8*id.charAt(4)+4*id.charAt(5)+2*id.charAt(6)+1*id.charAt(7)+6*id.charAt(8)+3*id.charAt(9)+7*id.charAt(10)+9*id.charAt(11)+10*id.charAt(12)+5*id.charAt(13)+8*id.charAt(14)+4*id.charAt(15)+2*id.charAt(16));switch(getNum%=11){case 0:lastNumber="1";break;case 1:lastNumber="0";break;case 2:lastNumber="X";break;case 3:lastNumber="9";break;case 4:lastNumber="8";break;case 5:lastNumber="7";break;case 6:lastNumber="6";break;case 7:lastNumber="5";break;case 8:lastNumber="4";break;case 9:lastNumber="3";break;case 10:lastNumber="2"}return id+lastNumber}for(var i=0;i<$GF.length;i++)$GF[i].call();if($GU.iwant.init(),$GU.fingerPrint(),$GU.logs("0"),$GM.init(),$GFO.init(),!GreenLine.Util.isEmbedFrame()){var adjustHieght=function(){$("#content").css("min-height",$(window).height()-346+"px"),$("#gc").css("min-height",$(window).height()-$("#gh").outerHeight()-$("#gf").outerHeight()-$("#J_notify").outerHeight()-1+"px")};adjustHieght(),$(window).resize(GL.throttle(function(){adjustHieght()},300,500))}var cfg=$("#g-cfg");if("1"==cfg.data("is-responsive")&&(_responsive(),$(window).resize(GL.throttle(_responsive,200,500))),window.top===window.self&&"1"!=cfg.data("is-fluid")&&$("body").css("min-width","980px"),function(e){function t(e,t,i){r++;var a=new RegExp(t,"g"),s="/search/experts?q=",o="疾病";return"hos"==e?(s="/search/hospitals?q=",o="医院"):"doc"==e&&(o="医生"),{label:i.name.replace(a,"<em>"+t+"</em>"),value:i.name,childNode:"<a href='"+$GC.guahaoServer+s+encodeURIComponent(i.name)+n+"'>"+i.name.replace(a,"<em>"+t+"</em>")+"<i>"+o+"</i></a>"}}function i(e,i){e.suggest.disease&&$.each(e.suggest.disease,function(){i.push(t("dis",e.q,this))}),e.suggest.doctor&&$.each(e.suggest.doctor,function(){i.push(t("doc",e.q,this))})}function a(e,i){e.suggest.hospital&&$.each(e.suggest.hospital,function(){10>r&&i.push(t("hos",e.q,this))})}if(0!=e.length){e.submit(function(){return""==$.trim($(this).find("input[name='q']").val())?($(this).find("input[name='q']").val(""),!1):($GUM.link($(this).attr("action")+"?"+$(this).serialize(),"SOU"),!0)}),e.find("a").click(function(){return $(this).hasClass("js-search-inhos")?e.attr("action","/search/experts"):e.find("input[name='hospitalId']").remove(),$(this).parent().trigger("submit"),!1}),e.find("input").keypress(function(t){$(this).parent();13==t.keyCode&&(t.preventDefault(),setTimeout(function(){e.find("a:eq(0)").trigger("click")},200))});var n="",r=0;$GU.checkSubdomain("shanghai")&&(n="&p=上海&pi=2"),e.find("input").autocomplete({source:"/search/suggest",ofElement:e.find(".gh-search-input"),customCls:"gh-search-autocomplete",normalize:function(e){var t=[];return r=0,$GU.checkPageName("gp-search-hos")?(a(e,t),i(e,t)):(i(e,t),a(e,t)),t}}),$(window).resize(GL.throttle(function(){e.find("input").autocomplete("close")},200,200)),e.hover(function(){$(this).find(".gh-search-input").addClass("gh-search-focus")},function(){$(this).find(".gh-search-input").removeClass("gh-search-focus")}),e.find("#js-q").glPlaceholder()}}($(".gh-search-form")),function(e){0!==e.length&&GH.run(function(){function t(e){var t=!0,a=$.trim(e.val()),r=n.find(".tips-error");if(a)t=i(e,r);else if(t=!1,e.hasClass("required")&&e.hasClass("form-input")){e.addClass("error");var s=e.parent();s.hasClass("g-iptph-wrap")&&(s=s.parent())}return t}function i(e,t){var i=!0,a=$.trim(e.val());return"password"===e.attr("type")&&(e.data("pattern","^([a-zA-Z0-9]|[~`!@#$%^&*()_+-={}]|[:;\"'<>,./?]){6,16}$"),e.data("message","登录名或密码错误.")),e.data("pattern")&&(i=new RegExp(e.data("pattern")).test(a),i===!0?(t.text("").hide(),e.hasClass("form-input")&&e.removeClass("error")):e.data("message")&&(e.addClass("error"),t.text(e.data("message")).show())),i}function a(){var e,i=n.find("input.form-input"),a=!0;return i.length>0&&$.each(i,function(i,n){e=t($(n)),0==e&&(a=!1)}),a}var n=e.find("form:eq(0)");e.find(".J_Social").each(function(){var e=$(this);e.attr("href",e.attr("href")+"?target="+encodeURIComponent(location.href))}),e.find(".J_MoreLogin").on("click",function(){return $(".J_LoginList").toggle(),!1}),$("#gh .login").click(function(){return $GU.checkSubdomain("fecity")?window.location.href=$GC.guahaoServer+"/58fastlogin/entry":(n.find("input").removeClass("error"),n.find(".tips-error").text("").hide(),n.find("i.error").remove(),e.find(".captcha").trigger("click"),$GM.loadDirectModal($(this),e)),!1}),e.find(".captcha").click(function(){return $(this).find("img").attr("src","/validcode/genimage/"+Math.floor(1e7*Math.random())),!1}),n.find("#poploginId").glPlaceholder("gm-login"),n.find("input.form-input").focus(function(){var e=$(this);e.addClass("focus"),e.removeClass("error");var t=e.parent();t.hasClass("g-iptph-wrap")&&(t=t.parent()),t.find("i").remove()}).blur(function(){var e=$(this);e.removeClass("focus")}),e.find("#loginbtn").click(function(){n.find(".tips-error").hide(),n.find(".tips-succ").hide();var t=$(this);if($GUB.isActive($(this))&&a()){$GUB.disable($(this),"登录中..."),n.find("input[name='password']").val($().crypt({method:"md5",source:n.find("#password").val()}));var i="/user/login_a";$GU.logs(i,"post"),$.ajax({type:"POST",url:i,data:n.serialize(),dataType:"json",timeout:3e4,success:function(i){var a="";i.hasError?null!=i.data&&"0"==i.data.status&&"1"==i.data.userType?a="/doctor/toupdateloginpage?docsigndata="+i.data.docsigndata:(null!=i.data&&e.find("#resendform #email").attr("value",i.data.loginId),n.find(".tips-error").html(i.message).show(),$GUB.enable(t,"登录"),e.find(".captcha").trigger("click")):"1"==i.data.userType&&i.data.doctorTargetUrl?a=i.data.doctorTargetUrl:$GM.modalTrigger.hasClass("login")||$GM.modalTrigger.hasClass("login-to-see")?window.location.reload(!0):a=$GM.modalTrigger.attr("href"),""!=a&&setTimeout(function(){window.location.href=a},300)},error:function(){n.find(".tips-error").text("系统异常，请稍后再试！").show(),$GUB.enable(t,"登录"),e.find(".captcha").trigger("click")}})}return!1}),e.find("input.form-input").keyup(function(t){return 13==t.keyCode&&e.find(".actionbt #loginbtn").trigger("click"),!1})},[GH.modules.crypt])}($("#gm-login")),$(".g-fastorder-box").length>0&&$GW.fastOrder.init($(".g-fastorder-box")),$("#freshcode").length>0&&$GU.refreshCaptcha($("#freshcode"),$("#vcode_img")),function(e){e.length>0&&e.find(".list-left").css("height",e.find(".list-content").height()+"px")}($(".g-foucus-warp")),$("#gh .gh-search").length>0&&"1"==cfg.data("header-fixed")&&!GreenLine.Util.isIE6()){var num=$("#gh .gh-menu").offset().top+$("#gh .gh-menu").height();$(window).scroll(function(){if($(".gh-main").hasClass("gh-mini")||!($(document).height()-$(window).height()<num)){var e=$("#gh .gh-nav").height()+75,t=$("#gh .gh-menu").height()+20,i=$(document).scrollTop();if(i>e){if($(".gh-main").hasClass("gh-mini"))return;$(".gh-search-form").find("input").autocomplete("close"),$(".ui-autocomplete").css({position:"fixed"}),$(".gh-main").addClass("gh-mini"),$(".gh-main").css({position:"fixed"}),$(".gh-mini").animate({top:0},"100000"),$(".gh-main").find(".search-key").hide(),$(".gh-search-tips").length>0&&($(".gh-main").find(".gh-search-tips").hide(),$(".gh-main .gh-search").removeClass("gh-search-left"))}if(t>i){if(!$(".gh-main").hasClass("gh-mini"))return;$(".gh-main").removeClass("gh-mini"),$(".gh-main").css({top:"-35px",position:"static"}),$(".gh-search-form").find("input").autocomplete("close"),$(".ui-autocomplete").css({position:"absolute"}),$(".gh-main").find(".search-key").show(),$(".gh-search-tips").length>0&&($(".gh-main").find(".gh-search-tips").show(),$(".gh-main .gh-search").addClass("gh-search-left"))}}})}$("#idNumber").click(function(){var e=$("#idNumber").attr("data-number"),t=numberChange(e),i=$GD.init({title:"温馨提醒",extClass:"gm-user-numb",content:"<div class='per-num'>您的十八身份证号码如下："+t+",<br/>请核对您的18位身份证信息，如有错误，请联系网络客服人员。</div>",noCancelBtn:!1,okTxt:"确认",okCall:function(){$.ajax({type:"post",url:"/my/fristCertToTwo",data:"certno="+t,success:function(e){i=$GD.init(e.hasError?{title:"温馨提醒",extClass:"num-error",content:"<div class='error-des'>"+e.message+"</div>",noCancelBtn:!0,okTxt:"知道了"}:{title:"温馨提醒",extClass:"num-suc",content:"<div class='suc-des'>您已修改成功！</div>",noCancelBtn:!0,okTxt:"知道了",okCall:function(){location.reload()}})}})}})}),$(".js-apply-jkdjt-rule").length>0&&$(".js-apply-jkdjt-rule").click(function(){$GD.init({title:"申请成为讲堂专家",extClass:"gm-jkdjtnew-dialog",content:'<form action="javascript:;"><ul><li>请填写以下信息，以便及时与您取得联系：</li><li><label for="name">您的姓名：</label><input type="text"  data-required="1" placeholder="您的姓名" data-phtext="您的姓名" id="name" name="fullName" /></li><li><label for="hospital">您所在的医院：</label><input placeholder="您所在的医院" data-phtext="您所在的医院" data-required="1" type="text" id="hospital" name="hospitalName" /></li><li><label for="phone">您的联系电话：</label><input placeholder="您的联系电话" data-required="1" data-phtext="您的联系电话" type="text" id="phone" name="phone" /></li><li class="jk-goodat"><label for="goodat">您的擅长：</label><textarea id="goodat" name="goodat" maxlength="500" placeholder="请输入您的擅长" pattern ="^(.|\n){1,500}$" data-message ="请输入1-500个字符"  data-phtext="请输入您的擅长" data-required="1" ></textarea></li></ul></form><div class="jk-des">健康大讲堂由国家卫生和计划生育委员会、国家食品药品监督管理总局、中国科学技术协会联合主办，挂号网为官方指定支持单位。后续将用三年时间进入全国百座城市，通过名医大讲堂和专家咨询等多样活动。大力宣传健康生活方式和安全用药常识。</div><div class="success hide"><i></i><span>反馈成功！</span></div>',width:460,okCls:"gbn gbt-blue1 gbt-ps",okTxt:"提交",noCancelBtn:!1,okCall:function(){var e=$GD.find(".js-ok");if($GUB.isActive(e)){var t=$(".gm-jkdjtnew-dialog").find("form");return t.validator({formEvent:"null"}),t.data("validator").checkValidity()&&($GUB.disable(e,"提交中…"),$.ajax({url:"/jkzgx/doctorapply?",cache:!1,dataType:"json",type:"post",data:t.serialize(),success:function(t){$GUB.enable(e,"确定"),t.errors?$GD.showError(t.errors[0].defaultMessage):($(".gm-jkdjtnew-dialog").find("form").hide(),$(".gm-jkdjtnew-dialog").find(".jk-des").html("反馈成功！"),setTimeout(function(){$(".gm-jkdjtnew-dialog").find(".js-close").trigger("click")},2e3))},error:function(){$GUB.enable(e,"确定"),$GD.showError("系统繁忙，请稍后再试")}})),!1}}}),$(".gm-jkdjtnew-dialog").glNewPlaceholder()})},[GH.modules.autocomplete,GH.modules.bxslider,GH.modules.fingerprint]);