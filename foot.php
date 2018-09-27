<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
<script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
<script>
document.cookie="name=gfy";
console.log(document.cookie);
//使用jquery实现tab切换效果
$(function(){
	$(".box .level1 > a").on("click", function(){
		//console.log("ok");
		//给当前元素添加"current"样式
		$(this).addClass("current") 
		//下一个元素显示
		.next().show()
		//父元素的兄弟元素的子元素<a>
		.parent().siblings().children("a").
		//移除上面找到的所有<a>的current 样式
		removeClass("current")
		//上面所有<a>的下一个元素隐藏
		.next().hide();
		//获取当前li标签在兄弟中的序号
		console.log($(this).parent().index());
		document.cookie="menuNum="+$(this).parent().index()+";";
		return false;
	})
});
console.log(document.cookie);
var menuNum = document.cookie.substr(-1,1);
$(".box .menu>li").eq(menuNum).find("ul").show();

$(".box .menu>li").eq(menuNum).find("a").eq(0).addClass("current");

</script>

