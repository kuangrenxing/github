<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>3级级联菜单</title>
<script language="javascript">
//定义主数组
var arr_m=new Array();
//定义主一级分类数组
arr_m[0]=new Array();
arr_m[1]=new Array();
arr_m[2]=new Array();
//定义第一个二级分类数组
arr_m[0][0]=new Array();
arr_m[0][1]=new Array();
arr_m[0][2]=new Array();
arr_m[0][3]=new Array();
//第义第二个二级分类数组
arr_m[1][0]=new Array();
arr_m[1][1]=new Array();
arr_m[1][2]=new Array();
//第义第三个二级分类数组
arr_m[2][0]=new Array();
arr_m[2][1]=new Array();
//分别定义数组元素
arr_m[0][0][0]="1";
arr_m[0][0][1]="1-1";
arr_m[0][0][2]="1-2";
arr_m[0][0][3]="1-3";
//定义数组元素
arr_m[0][1][0]="1-1-1";
arr_m[0][1][1]="1-1-2";
arr_m[0][1][2]="1-1-3";
//定义数组元素
arr_m[0][2][0]="1-2-1";
arr_m[0][2][1]="1-2-2";
arr_m[0][2][2]="1-2-3";
//定义数组元素
arr_m[0][3][0]="1-3-1";
arr_m[0][3][1]="1-3-2";
//定义数组元素
arr_m[1][0][0]="2";
arr_m[1][0][1]="2-1";
arr_m[1][0][2]="2-2";
//定义数组元素
arr_m[1][1][0]="2-1-1";
arr_m[1][1][1]="2-1-2";
//定义数组元素
arr_m[1][2][0]="2-2-1";
arr_m[1][2][1]="2-2-2";
//定义数组元素
arr_m[2][0][0]="3";
arr_m[2][0][1]="3-1";
arr_m[2][1][0]="3-1-1";
//建立初始化函数
function init()
{
obj1=document.getElementById("s_1");       //获取对象1
obj2=document.getElementById("s_2");       //对取对象2
obj3=document.getElementById("s_3");       //获取对象3
for(var i=0;i<arr_m.length;i++)        //遍历主分类
{
    op=document.createElement("option");      //创建option子节点
    op_text=document.createTextNode(arr_m[i][0][0]);    //创建文本节点
    op.appendChild(op_text);         //为option添加文本节点
    op.setAttribute("value",arr_m[i][0][0]);       //为option设置value属性
    obj1.appendChild(op);         //为obj1添加子节点
}
for(var i=1;i<arr_m[0][0].length;i++)       //遍历二级分类
{
    op=document.createElement("option");      //创建option元素
    op_text=document.createTextNode(arr_m[0][0][i]);    //创建文本节点
    op.appendChild(op_text);         //为option添加文本节点
    op.setAttribute("value",arr_m[0][0][i]);       //设置value属性
    obj2.appendChild(op);         //为obj2添加子节点
}
for(var i=0;i<arr_m[0][1].length;i++)       //遍历三级分类
{
    op=document.createElement("option");      //创建option元素
    op_text=document.createTextNode(arr_m[0][1][i]);    //创建文本节点
    op.appendChild(op_text);         //为option添加文本节点
    op.setAttribute("value",arr_m[0][1][i]);       //设置value属性
    obj3.appendChild(op);         //添加子节点
}
}
function change_1(t)           //主分类改变函数
{
obj1=document.getElementById("s_1");
obj2=document.getElementById("s_2");
obj3=document.getElementById("s_3");
while(obj2.hasChildNodes())         //清除所有以前的子节点
{
    obj2.removeChild(obj2.childNodes[0]);
}
while(obj3.hasChildNodes())
{
    obj3.removeChild(obj3.childNodes[0]);
}
for(var i=1;i<arr_m[t][0].length;i++)
{
    op=document.createElement("option");
    op_text=document.createTextNode(arr_m[t][0][i]);
    op.appendChild(op_text);
    op.setAttribute("value",arr_m[t][0][i]);
    obj2.appendChild(op);
}
for(var i=0;i<arr_m[t][1].length;i++)
{
    op=document.createElement("option");
    op_text=document.createTextNode(arr_m[t][1][i]);
    op.appendChild(op_text);
    op.setAttribute("value",arr_m[t][1][i]);
    obj3.appendChild(op);
}
}
function change_2(t)
{
obj1=document.getElementById("s_1");
obj2=document.getElementById("s_2");
obj3=document.getElementById("s_3");
n=obj1.selectedIndex;          //获取主分类的选择项
while(obj3.hasChildNodes())         //清除三级分类子节点
{
    obj3.removeChild(obj3.childNodes[0]);
}
for(var i=0;i<arr_m[n][t+1].length;i++)       //遍历三级分类
{
    op=document.createElement("option");
    op_text=document.createTextNode(arr_m[n][t+1][i]);
    op.appendChild(op_text);
    op.setAttribute("value",arr_m[n][t+1][i]);
    obj3.appendChild(op);         //为三级分类添加子节点
}
}
function go()            //显示选择结果
{
obj1=document.getElementById("s_1");
obj2=document.getElementById("s_2");
obj3=document.getElementById("s_3");
str="选择结果为：";
str=str+"一级分类为："+obj1.value+"二级分类为："+obj2.value;
str=str+"三级分类为："+obj3.value;
document.all.r.innerHTML=str;
}
</script>
</head>
<body onload="init()">
<center>
<font size=4 color="#ff0000">
三级联动列表框
</font>
<p>
<table border="1">
<form action="#">
<tr>
<td width="30%">一级列表：</td>
<td widht="70%">
<select id="s_1" onchange="change_1(this.selectedIndex)" style="width:100px">
</select>
</td>
</tr>
<tr>
<td>二级列表：</td>
<td>
<select id="s_2" onchange="change_2(this.selectedIndex)" style="width:100px">
</select>
</td>
</tr>
<tr>
<td>三级列表：</td>
<td>
<select id="s_3" style="width:100px">
</td>
</tr>
<tr>
<td colspan="2"><center>
<input type="button" value="确认提交" onclick="go()">
</center></td>
</tr>
<tr>
<td colspan="2"><center>
<div id="r"></div>
</center></td>
</tr>
</form>
</table>
</center>
</body>
</html>
