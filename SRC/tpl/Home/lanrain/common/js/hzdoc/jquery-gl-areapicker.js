!function(a){function e(e,r){this.container=e,this.options={plinkCallback:null,clinkCallback:null,dataUrl:null,selArea:null,hideProvince:null,provinceTpl:"<li><a href='javascript:void(0);' name='province' class='J_ProvinceLink' data-val='{{areaId}}' data-nosub='{{nosub}}' title='{{areaName}}'>{{areaName}}</a></li>",cityTpl:"<li><a href='javascript:void(0);' name='city' class='J_CityLink' data-val='{{areaId}}' parent-id='{{parentAreaId}}' parent-name='{{parentAreaName}}' title='{{areaName}}'>{{areaName}}</a></li>"},this.areaInfo={},a.extend(this.options,r),this._init()}a.extend(e.prototype,{_init:function(){var a=this;a._getData(),a._bindEvent()},_getData:function(){var a=this;a.areaInfo=r,a.options.hideProvince&&a.options.selArea.provinceId?(a.rendCity(a.options.selArea.provinceId),a.container.find(".J_HotCity").hide(),a.container.find(".J_ProvinceContainer").hide(),a.container.find(".J_CityContainer .content-title").hide(),a.options.selArea.cityId&&a.container.find(".J_CityLink[data-val='"+a.options.selArea.cityId+"']").addClass("on"),a.container.find(".J_CityContainer").show()):a.rendProvince()},_render:function(a,e){for(var r=/{{([^}}]+)?}}/;match=r.exec(a);)a=a.replace(match[0],e[match[1]]);return a},_getProvince:function(a){for(var e=this,r=e.areaInfo.length,d=0;r>d;d++)if(e.areaInfo[d].areaId==a)return e.areaInfo[d];return null},rendProvince:function(){var e=this;if(e.options.provinceTpl){var r=["<li><a href='javascript:void(0);' name='province' class='J_ProvinceLink' data-val='all' data-nosub='1'>全国</a></li>"];a.each(e.areaInfo,function(){var a=this;a.nosub=1,a.cities&&a.cities.length>0&&(a.nosub=0),r.push(e._render(e.options.provinceTpl,a))}),e.container.find(".J_ProvinceUl").html(r.join(""))}},rendCity:function(e){var r=this,d=r._getProvince(e);if(r.options.provinceTpl&&d){var I=["<li><a href='javascript:void(0);' name='city' class='J_CityLink' data-val='all' parent-id='"+e+"' parent-name='"+d.areaName+"'>不限</a></li>"];a.each(d.cities,function(){var a=this;a.parentAreaName=d.areaName,a.parentAreaId=e,I.push(r._render(r.options.cityTpl,a))}),r.container.find(".J_CityWrap").append("<ul class='J_City"+e+"'>"+I.join("")+"</ul>")}},_bindEvent:function(){var e=this;e.container.find(".close").click(function(){GreenLine.Util.isIE6()||GreenLine.Util.isIE7()?e.container.parents(".J_AreaFilter").css("z-index",0):e.container.css("z-index",0),e.container.hide()}),e.container.delegate(".J_ProvinceLink","click",function(r){r.preventDefault();var d=a(r.target),I=d.attr("data-val"),m=d.text(),N=d.attr("data-nosub");I&&0==N&&(e.container.find(".J_CityWrap ul").hide(),e.container.find(".J_SelProvince").text(m),e.container.find("J_City"+I).length>0?e.container.find("J_City"+I).show():e.rendCity(I)),e.options.plinkCallback&&e.options.plinkCallback.call(e,a(this))}),e.container.delegate(".J_CityLink","click",function(r){r.preventDefault(),e.options.clinkCallback&&e.options.clinkCallback.call(e,a(this)),GreenLine.Util.isIE6()||GreenLine.Util.isIE7()?e.container.parents(".J_AreaFilter").css("z-index",0):e.container.css("z-index",0),e.container.hide()}),e.container.delegate(".J_AreaBack","click",function(a){a.preventDefault(),e.container.find(".J_ProvinceContainer").show(),e.container.find(".J_CityContainer").hide()}),a(document).mousedown(function(r){!a(r.target).hasClass("J_Area")&&!a(r.target).parents(".J_Area").length>0&&(GreenLine.Util.isIE6()||GreenLine.Util.isIE7()?e.container.parents(".J_AreaFilter").css("z-index",0):e.container.css("z-index",0),e.container.hide())})}}),a.fn.glAreapicker=function(r){return this.data("areapicker")?this:this.each(function(){var d=a(this),I=new e(d,r);d.data("areapicker",I)})};var r=[{areaId:"2",areaName:"上海",cities:[{areaId:"3306",areaName:"黄浦区"},{areaId:"3307",areaName:"长宁区"},{areaId:"3308",areaName:"杨浦区"},{areaId:"3309",areaName:"静安区"},{areaId:"3310",areaName:"普陀区"},{areaId:"3311",areaName:"浦东区"},{areaId:"3312",areaName:"卢湾区"},{areaId:"3313",areaName:"虹口区"},{areaId:"3314",areaName:"闵行区"},{areaId:"3315",areaName:"徐汇区"},{areaId:"3316",areaName:"闸北区"},{areaId:"3317",areaName:"宝山区"},{areaId:"3318",areaName:"嘉定区"},{areaId:"3319",areaName:"金山区"},{areaId:"3320",areaName:"松江区"},{areaId:"3322",areaName:"青浦区"},{areaId:"3323",areaName:"南汇区"},{areaId:"3324",areaName:"奉贤区"},{areaId:"3325",areaName:"崇明县"}]},{areaId:"1",areaName:"北京",cities:[{areaId:"3326",areaName:"海淀区"},{areaId:"3327",areaName:"朝阳区"},{areaId:"3328",areaName:"东城区"},{areaId:"3329",areaName:"西城区"},{areaId:"3330",areaName:"崇文区"},{areaId:"3331",areaName:"宣武区"},{areaId:"3332",areaName:"丰台区"},{areaId:"3333",areaName:"石景山区"},{areaId:"3334",areaName:"通州区"},{areaId:"3335",areaName:"顺义区"},{areaId:"3336",areaName:"昌平区"},{areaId:"3337",areaName:"平谷区"},{areaId:"3338",areaName:"大兴区"},{areaId:"3340",areaName:"怀柔区"},{areaId:"3342",areaName:"房山区"},{areaId:"3343",areaName:"门头沟区"},{areaId:"3344",areaName:"延庆县"},{areaId:"3345",areaName:"密云县"}]},{areaId:"29",areaName:"广东",cities:[{areaId:"79",areaName:"广州"},{areaId:"80",areaName:"佛山"},{areaId:"81",areaName:"深圳"},{areaId:"82",areaName:"汕头"},{areaId:"102",areaName:"珠海"},{areaId:"103",areaName:"韶关"},{areaId:"104",areaName:"江门"},{areaId:"105",areaName:"湛江"},{areaId:"107",areaName:"茂名"},{areaId:"108",areaName:"肇庆"},{areaId:"110",areaName:"惠州"},{areaId:"111",areaName:"梅州"},{areaId:"112",areaName:"汕尾"},{areaId:"113",areaName:"河源"},{areaId:"115",areaName:"阳江"},{areaId:"116",areaName:"清远"},{areaId:"117",areaName:"东莞"},{areaId:"119",areaName:"中山"},{areaId:"120",areaName:"潮州"},{areaId:"121",areaName:"揭阳"},{areaId:"122",areaName:"云浮"}]},{areaId:"22",areaName:"江苏",cities:[{areaId:"280",areaName:"南京"},{areaId:"577",areaName:"苏州"},{areaId:"291",areaName:"扬州"},{areaId:"292",areaName:"无锡"},{areaId:"293",areaName:"徐州"},{areaId:"294",areaName:"常州"},{areaId:"296",areaName:"南通"},{areaId:"297",areaName:"连云港"},{areaId:"298",areaName:"淮安"},{areaId:"299",areaName:"盐城"},{areaId:"300",areaName:"镇江"},{areaId:"301",areaName:"泰州"},{areaId:"302",areaName:"宿迁"}]},{areaId:"30",areaName:"湖南",cities:[{areaId:"254",areaName:"长沙"},{areaId:"255",areaName:"株洲"},{areaId:"256",areaName:"湘潭"},{areaId:"257",areaName:"衡阳"},{areaId:"258",areaName:"邵阳"},{areaId:"259",areaName:"岳阳"},{areaId:"260",areaName:"常德"},{areaId:"261",areaName:"张家界"},{areaId:"262",areaName:"益阳"},{areaId:"263",areaName:"郴州"},{areaId:"264",areaName:"永州"},{areaId:"265",areaName:"怀化"},{areaId:"266",areaName:"娄底"},{areaId:"267",areaName:"湘西州"}]},{areaId:"8",areaName:"山西",cities:[{areaId:"422",areaName:"太原"},{areaId:"423",areaName:"大同"},{areaId:"425",areaName:"阳泉"},{areaId:"426",areaName:"长治"},{areaId:"428",areaName:"晋城"},{areaId:"429",areaName:"朔州"},{areaId:"430",areaName:"晋中"},{areaId:"431",areaName:"运城"},{areaId:"432",areaName:"忻州"},{areaId:"434",areaName:"临汾"},{areaId:"436",areaName:"吕梁"}]},{areaId:"21",areaName:"山东",cities:[{areaId:"401",areaName:"济南"},{areaId:"402",areaName:"青岛"},{areaId:"403",areaName:"淄博"},{areaId:"404",areaName:"枣庄"},{areaId:"406",areaName:"东营"},{areaId:"409",areaName:"烟台"},{areaId:"411",areaName:"潍坊"},{areaId:"412",areaName:"威海"},{areaId:"413",areaName:"济宁"},{areaId:"414",areaName:"泰安"},{areaId:"415",areaName:"日照"},{areaId:"416",areaName:"莱芜"},{areaId:"417",areaName:"德州"},{areaId:"418",areaName:"聊城"},{areaId:"419",areaName:"滨州"},{areaId:"420",areaName:"菏泽"},{areaId:"580",areaName:"临沂"}]},{areaId:"19",areaName:"湖北",cities:[{areaId:"229",areaName:"武汉"},{areaId:"232",areaName:"黄石"},{areaId:"236",areaName:"襄樊"},{areaId:"237",areaName:"十堰"},{areaId:"238",areaName:"荆州"},{areaId:"239",areaName:"宜昌"},{areaId:"241",areaName:"荆门"},{areaId:"242",areaName:"鄂州"},{areaId:"243",areaName:"孝感"},{areaId:"245",areaName:"黄冈"},{areaId:"246",areaName:"咸宁"},{areaId:"248",areaName:"随州"},{areaId:"249",areaName:"恩施土家族苗族自治州"},{areaId:"250",areaName:"仙桃"},{areaId:"251",areaName:"潜江"},{areaId:"252",areaName:"天门"},{areaId:"253",areaName:"神农架林区"}]},{areaId:"24",areaName:"浙江",cities:[{areaId:"552",areaName:"杭州"},{areaId:"553",areaName:"宁波"},{areaId:"555",areaName:"温州"},{areaId:"556",areaName:"嘉兴"},{areaId:"558",areaName:"湖州"},{areaId:"559",areaName:"绍兴"},{areaId:"560",areaName:"金华"},{areaId:"561",areaName:"衢州"},{areaId:"563",areaName:"舟山"},{areaId:"569",areaName:"台州"},{areaId:"570",areaName:"丽水"}]},{areaId:"3",areaName:"天津"},{areaId:"9",areaName:"陕西",cities:[{areaId:"437",areaName:"西安"},{areaId:"439",areaName:"铜川"},{areaId:"441",areaName:"宝鸡"},{areaId:"444",areaName:"咸阳"},{areaId:"445",areaName:"渭南"},{areaId:"446",areaName:"延安"},{areaId:"447",areaName:"汉中"},{areaId:"452",areaName:"榆林"},{areaId:"453",areaName:"安康"},{areaId:"581",areaName:"商洛"}]},{areaId:"23",areaName:"安徽",cities:[{areaId:"36",areaName:"合肥"},{areaId:"37",areaName:"芜湖"},{areaId:"38",areaName:"蚌埠"},{areaId:"39",areaName:"淮南"},{areaId:"40",areaName:"马鞍山"},{areaId:"41",areaName:"淮北"},{areaId:"42",areaName:"铜陵"},{areaId:"43",areaName:"安庆"},{areaId:"44",areaName:"黄山"},{areaId:"45",areaName:"滁州"},{areaId:"46",areaName:"阜阳"},{areaId:"47",areaName:"宿州"},{areaId:"48",areaName:"巢湖"},{areaId:"49",areaName:"六安"},{areaId:"50",areaName:"亳州"},{areaId:"51",areaName:"池州"},{areaId:"52",areaName:"宣城"}]},{areaId:"20",areaName:"河南",cities:[{areaId:"189",areaName:"郑州"},{areaId:"190",areaName:"开封"},{areaId:"191",areaName:"洛阳"},{areaId:"192",areaName:"平顶山"},{areaId:"193",areaName:"焦作"},{areaId:"194",areaName:"鹤壁"},{areaId:"195",areaName:"新乡"},{areaId:"196",areaName:"安阳"},{areaId:"198",areaName:"濮阳"},{areaId:"199",areaName:"许昌"},{areaId:"200",areaName:"漯河"},{areaId:"201",areaName:"三门峡"},{areaId:"203",areaName:"南阳"},{areaId:"205",areaName:"商丘"},{areaId:"206",areaName:"信阳"},{areaId:"207",areaName:"周口"},{areaId:"208",areaName:"驻马店"},{areaId:"209",areaName:"济源"}]},{areaId:"15",areaName:"四川",cities:[{areaId:"455",areaName:"成都"},{areaId:"456",areaName:"自贡"},{areaId:"457",areaName:"攀枝花"},{areaId:"458",areaName:"泸州"},{areaId:"459",areaName:"德阳"},{areaId:"460",areaName:"绵阳"},{areaId:"461",areaName:"广元"},{areaId:"462",areaName:"遂宁"},{areaId:"464",areaName:"内江"},{areaId:"465",areaName:"乐山"},{areaId:"467",areaName:"南充"},{areaId:"468",areaName:"宜宾"},{areaId:"469",areaName:"广安"},{areaId:"470",areaName:"达州"},{areaId:"472",areaName:"眉山"},{areaId:"473",areaName:"雅安"},{areaId:"475",areaName:"巴中"},{areaId:"477",areaName:"资阳"},{areaId:"479",areaName:"阿坝州"},{areaId:"480",areaName:"甘孜州"},{areaId:"481",areaName:"凉山州"},{areaId:"3742",areaName:"康定市"}]},{areaId:"12",areaName:"青海",cities:[{areaId:"392",areaName:"西宁"},{areaId:"393",areaName:"海东地区"},{areaId:"394",areaName:"海北州"},{areaId:"396",areaName:"黄南州"},{areaId:"397",areaName:"海南州"},{areaId:"398",areaName:"果洛州"},{areaId:"399",areaName:"玉树州"},{areaId:"400",areaName:"海西州"}]},{areaId:"5",areaName:"辽宁",cities:[{areaId:"356",areaName:"沈阳"},{areaId:"357",areaName:"大连"},{areaId:"358",areaName:"鞍山"},{areaId:"359",areaName:"抚顺"},{areaId:"360",areaName:"本溪"},{areaId:"361",areaName:"丹东"},{areaId:"362",areaName:"锦州"},{areaId:"363",areaName:"营口"},{areaId:"365",areaName:"阜新"},{areaId:"367",areaName:"辽阳"},{areaId:"368",areaName:"盘锦"},{areaId:"369",areaName:"铁岭"},{areaId:"370",areaName:"朝阳"},{areaId:"371",areaName:"葫芦岛"},{areaId:"3748",areaName:"营州市"}]},{areaId:"33",areaName:"内蒙古",cities:[{areaId:"372",areaName:"呼和浩特"},{areaId:"373",areaName:"包头"},{areaId:"374",areaName:"乌海"},{areaId:"375",areaName:"赤峰"},{areaId:"376",areaName:"通辽"},{areaId:"377",areaName:"鄂尔多斯"},{areaId:"378",areaName:"呼伦贝尔"},{areaId:"380",areaName:"巴彦淖尔"},{areaId:"381",areaName:"乌兰察布"},{areaId:"382",areaName:"锡林郭勒盟"},{areaId:"384",areaName:"兴安盟"},{areaId:"385",areaName:"阿拉善盟"}]},{areaId:"25",areaName:"江西",cities:[{areaId:"305",areaName:"南昌"},{areaId:"306",areaName:"景德镇"},{areaId:"307",areaName:"萍乡"},{areaId:"309",areaName:"九江"},{areaId:"313",areaName:"新余"},{areaId:"314",areaName:"鹰潭"},{areaId:"315",areaName:"赣州"},{areaId:"316",areaName:"吉安"},{areaId:"352",areaName:"宜春"},{areaId:"353",areaName:"抚州"},{areaId:"355",areaName:"上饶"}]},{areaId:"7",areaName:"黑龙江",cities:[{areaId:"211",areaName:"哈尔滨"},{areaId:"212",areaName:"齐齐哈尔"},{areaId:"214",areaName:"鸡西"},{areaId:"215",areaName:"鹤岗"},{areaId:"218",areaName:"双鸭山"},{areaId:"220",areaName:"大庆"},{areaId:"221",areaName:"伊春"},{areaId:"222",areaName:"佳木斯"},{areaId:"223",areaName:"七台河"},{areaId:"224",areaName:"牡丹江"},{areaId:"225",areaName:"黑河"},{areaId:"226",areaName:"绥化"},{areaId:"227",areaName:"大兴安岭"}]},{areaId:"16",areaName:"河北",cities:[{areaId:"171",areaName:"石家庄"},{areaId:"172",areaName:"唐山"},{areaId:"173",areaName:"秦皇岛"},{areaId:"175",areaName:"邯郸"},{areaId:"177",areaName:"邢台"},{areaId:"179",areaName:"保定"},{areaId:"183",areaName:"张家口"},{areaId:"184",areaName:"承德"},{areaId:"185",areaName:"沧州"},{areaId:"186",areaName:"廊坊"},{areaId:"187",areaName:"衡水"}]},{areaId:"17",areaName:"云南",cities:[{areaId:"526",areaName:"昆明"},{areaId:"527",areaName:"曲靖"},{areaId:"528",areaName:"玉溪"},{areaId:"531",areaName:"保山"},{areaId:"532",areaName:"昭通"},{areaId:"535",areaName:"丽江"},{areaId:"536",areaName:"思茅"},{areaId:"537",areaName:"临沧"},{areaId:"539",areaName:"文山州"},{areaId:"544",areaName:"红河州"},{areaId:"545",areaName:"西双版纳州"},{areaId:"546",areaName:"楚雄州"},{areaId:"547",areaName:"大理州"},{areaId:"548",areaName:"德宏州"},{areaId:"549",areaName:"怒江州"},{areaId:"550",areaName:"迪庆州"}]},{areaId:"6",areaName:"吉林",cities:[{areaId:"268",areaName:"长春"},{areaId:"269",areaName:"吉林"},{areaId:"270",areaName:"四平"},{areaId:"272",areaName:"辽源"},{areaId:"273",areaName:"通化"},{areaId:"274",areaName:"白山"},{areaId:"275",areaName:"松原"},{areaId:"276",areaName:"白城"},{areaId:"277",areaName:"延边朝鲜族自治州"}]},{areaId:"18",areaName:"贵州",cities:[{areaId:"141",areaName:"贵阳"},{areaId:"142",areaName:"六盘水"},{areaId:"144",areaName:"遵义"},{areaId:"145",areaName:"安顺"},{areaId:"146",areaName:"铜仁"},{areaId:"147",areaName:"毕节"},{areaId:"148",areaName:"黔西南"},{areaId:"149",areaName:"黔东南"},{areaId:"152",areaName:"黔南布"},{areaId:"3741",areaName:"都军市"}]},{areaId:"31",areaName:"广西",cities:[{areaId:"123",areaName:"南宁"},{areaId:"124",areaName:"桂林"},{areaId:"125",areaName:"柳州"},{areaId:"126",areaName:"梧州"},{areaId:"127",areaName:"北海"},{areaId:"128",areaName:"防城港"},{areaId:"129",areaName:"钦州"},{areaId:"131",areaName:"贵港"},{areaId:"133",areaName:"玉林"},{areaId:"134",areaName:"百色"},{areaId:"137",areaName:"贺州"},{areaId:"138",areaName:"河池"},{areaId:"139",areaName:"来宾"},{areaId:"140",areaName:"崇左"}]},{areaId:"4",areaName:"重庆"},{areaId:"10",areaName:"宁夏",cities:[{areaId:"387",areaName:"银川"},{areaId:"388",areaName:"石嘴山"},{areaId:"389",areaName:"吴忠"},{areaId:"390",areaName:"固原"},{areaId:"391",areaName:"中卫"}]},{areaId:"11",areaName:"甘肃",cities:[{areaId:"64",areaName:"兰州"},{areaId:"65",areaName:"金昌"},{areaId:"66",areaName:"白银"},{areaId:"67",areaName:"天水"},{areaId:"68",areaName:"嘉峪关"},{areaId:"69",areaName:"武威"},{areaId:"70",areaName:"张掖"},{areaId:"71",areaName:"平凉"},{areaId:"72",areaName:"酒泉"},{areaId:"74",areaName:"庆阳"},{areaId:"75",areaName:"定西"},{areaId:"76",areaName:"陇南"},{areaId:"77",areaName:"临夏州"},{areaId:"78",areaName:"甘南州"}]},{areaId:"27",areaName:"福建",cities:[{areaId:"53",areaName:"福州"},{areaId:"54",areaName:"厦门"},{areaId:"57",areaName:"莆田"},{areaId:"58",areaName:"三明"},{areaId:"59",areaName:"泉州"},{areaId:"60",areaName:"漳州"},{areaId:"61",areaName:"南平"},{areaId:"62",areaName:"龙岩"},{areaId:"63",areaName:"宁德"}]},{areaId:"32",areaName:"海南",cities:[{areaId:"153",areaName:"海口"},{areaId:"154",areaName:"三亚"},{areaId:"155",areaName:"五指山"},{areaId:"157",areaName:"琼海"},{areaId:"158",areaName:"儋州"},{areaId:"159",areaName:"文昌"},{areaId:"160",areaName:"万宁"},{areaId:"161",areaName:"东方"},{areaId:"162",areaName:"白沙"},{areaId:"164",areaName:"昌江"},{areaId:"165",areaName:"乐东"},{areaId:"167",areaName:"陵水"},{areaId:"168",areaName:"保亭"},{areaId:"170",areaName:"琼中"}]},{areaId:"13",areaName:"新疆",cities:[{areaId:"504",areaName:"乌鲁木齐"},{areaId:"505",areaName:"克拉玛依"},{areaId:"508",areaName:"吐鲁番"},{areaId:"509",areaName:"哈密"},{areaId:"510",areaName:"和田"},{areaId:"511",areaName:"阿克苏"},{areaId:"513",areaName:"喀什"},{areaId:"514",areaName:"克孜勒苏柯尔克孜"},{areaId:"515",areaName:"巴音郭楞蒙古"},{areaId:"517",areaName:"昌吉"},{areaId:"518",areaName:"博尔塔拉蒙古"},{areaId:"519",areaName:"伊犁哈萨克"},{areaId:"520",areaName:"塔城"},{areaId:"521",areaName:"阿勒泰"},{areaId:"522",areaName:"石河子"},{areaId:"523",areaName:"阿拉尔"},{areaId:"524",areaName:"图木舒克"},{areaId:"525",areaName:"五家渠"}]},{areaId:"14",areaName:"西藏",cities:[{areaId:"491",areaName:"拉萨"},{areaId:"493",areaName:"那曲"},{areaId:"494",areaName:"昌都"},{areaId:"495",areaName:"山南"},{areaId:"496",areaName:"日喀则"},{areaId:"497",areaName:"阿里"},{areaId:"498",areaName:"林芝"}]}]}(jQuery);