<?php
$z[0]=Array("field","",356,375);
$z[0][4]['name']="title";
$z[1]=Array("global","",376,402);
$z[1][4]['name']="cfg_webname";
$z[2]=Array("field","",451,480);
$z[2][4]['name']="keywords";
$z[3]=Array("field","",528,586);
$z[3][4]['name']="description";
$z[3][4]['function']="html2text(@me)";
$z[4]=Array("global","",1161,1186);
$z[4][4]['name']="cfg_cmsurl";
$z[5]=Array("global","",1446,1472);
$z[5][4]['name']="cfg_cmspath";
$z[6]=Array("include","",1665,1700);
$z[6][4]['filename']="head.htm";
$z[7]=Array("list","\r\n\r\n                <div class=\"clearfix article-box\">\r\n                <a href=\"[field:arcurl/]\" class=\"a-img\" target=\"_blank\"><img src=\"[field:litpic/]\"/></a>\r\n                <div class=\"article-box-ctt\">\r\n                    <h4><a href=\"[field:arcurl/]\" target=\"_blank\">[field:fulltitle/]</a></h4>\r\n                    <div class=\"box-other\">\r\n                        <span class=\"source-quote\"><a href=\"/member/index.php?uid=[field:mid runphp='yes']global \$dsql;\$sql='SELECT userid FROM dede_member WHERE mid='.@me;\$spaceurl = \$dsql->GetOne(\$sql);@me=\$spaceurl['userid'];[/field:mid]\" target=\"_blank\">[field:writer/]</a></span>\r\n                        <time>[field:pubdate function=\"GetDateTimeMK(@me)\"/]</time>\r\n                        <span class=\"comment-box\"><i class=\"icon-comment\"></i><a href=\"/plus/feedback.php?aid=[field:id/]\" target=\"_blank\"><script src=\"/plus/pls.php?aid=[field:id/]#odby\" language=\"javascript\"></script></a></span></div><div class=\"article-summary\">[field:description/]</div><p class=\"tags-box\">[field:id function=GetTags(@me)/]</p></div></div>\r\n                            \r\n    ",1981,3145);
$z[7][4]['pagesize']="10";
$z[7][4]['noflag']="h";
$z[8]=Array("pagelist","",3267,3345);
$z[8][4]['listitem']="info,index,end,pre,next,pageno,option";
$z[8][4]['listsize']="5";
$z[9]=Array("include","",3470,3506);
$z[9][4]['filename']="right.htm";
$z[10]=Array("include","",3543,3580);
$z[10][4]['filename']="footer.htm";
$z[11]=Array("include","",3691,3727);
$z[11][4]['filename']="login.htm";

?>