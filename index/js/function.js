// 1、兼容的通过类名获取元素（为了兼容）
function getClass(classname,obj){
	var obj = obj || document;
	if (obj.getElementsByClassName) {
		return obj.getElementsByClassName(classname);
	}else{
		var all = obj.getElementsByTagName('*');
		var newarr = [];
		for(var i=0; i<all.length ;i++){

					// "aa bb" "aa" "aabb" 	'aa'
			if( check(all[i].className,classname) ){
				newarr.push(all[i]);
			}
		}
		return newarr;
	}
}
				// "cc bb"  "aa"
function check(class1,class2){
	var arr = class1.split(" "); // ['cc','bb']
	for (var i = 0; i < arr.length; i++) {
		if (arr[i] == class2) {
			return true;
		}
	}
	return false;
}

// 2、兼容的获取元素的内容
		// 一个参数：获取元素的内容
		// 两个参数：设置元素的内容
function getText(obj,val){
	if(val==undefined){
		if(obj.innerText){
		return obj.innerText;
	}else{
		return obj.textContent;
	}
}else{
	if(obj.innerText){
		obj.innerText=val;
	}else{
		obj.textContent=val;
	}
	}
}

// 3、兼容的获取元素的样式
function getStyle(obj,Attr){
	if(obj.currentStyle){ 
		return obj.currentStyle[Attr];  //IE
	}else{
		return getComputedStyle(obj,null)[Attr]; //W3c
	}

}

// 4   正则/^[a-zA-z][a-z0-6A-Z]{0,8}$/.text=(seletor)
function $(seletor,obj){
	   if(typeof seletor == "string"){
	   	seletor=seletor.replace(/^\s*|\s*$/g,"")
	   var obj=obj||document;
	   if(seletor.charAt(0)=="."){
	   	    return getClass(seletor.slice(1),obj)
	   }else if(seletor.charAt(0)=="#"){
	   	     return document.getElementById(seletor.slice(1))
	   }else if(/^[a-zA-z][a-z0-6A-Z]{0,8}$/.test(seletor)){
	   	    return obj.getElementsByTagName(seletor);
	   
	    }else if(/^<[a-z]+\d*>$/g.test(seletor)){
	    	return document.createElement(seletor.slice(1,-1));
	    }
   }else if(typeof seletor=="function"){
   	window.onload=function(){
   		seletor();
   	}
   }


}

// 5、元素节点或者元素文本节点 
function getChilds(obj,type){
	var arr=[];
	var type=type||"no";
	var childs=obj.childNodes;
	for(var i=0;i<childs.length;i++){
		if(type=="no"){
			if(childs[i].nodeType==1){
				arr.push(childs[i]);
			}
			
		}else if(type=="yes"){
			if(childs[i].nodeType==1||childs[i].nodeType==3&&childs[i].nodeValue.replace(/^\s*|\s*$/g,"")){
				arr.push(childs[i]);
			}
			
		}
	}
	return arr;
}

function getFirst(obj,type){
	var type=type||"no";
	if(type=="no"){
		return getChilds(obj,'no')[0];

	}else if(type="yes"){
		return getChilds(obj,'yes')[0];

	}
}


function getLast(obj,type){
	var type=type||"no";
	if(type=="no"){
		return getChilds(obj,'no')[getChilds(obj,'no').length-1];

	}else if(type="yes"){
		return getChilds(obj,'yes')[getChilds(obj,'yes').length-1];

	}
}


function getNum(obj,num,type){
	var type=type||"no";
	if(type=="no"){
		return getChilds(obj,'no')[num-1];

	}else if(type="yes"){
		return getChilds(obj,'yes')[num-1];

	}
}

function getNext(obj,type){
	var type=type||"no";
	var next=obj.nextSibling;
	if (type=="no") {
		if(next==null){
			return false;
		}
		while(next.nodeType==3||next.nodeType==8){
			next=next.nextSibling
		}
			

	} else if(type=="yes"){
		if(next==null){
			return false;
		}
		while(next.nodeType==3&&!next.nodeValue.replace(/^\s*|\s*$/g,"")||next.nodeType==8){
			next=next.nextSibling
		}

	}
	return next;
}


//前一个节点
function getPrev(obj,type){
	var type=type||"no";
	var prev=obj.previousSibling;
	if (type=="no") {
		if(prev==null){
			return false;
		}
		while(prev.nodeType==3||prev.nodeType==8){
			prev=prev.previousSibling
		}
			

	} else if(type=="yes"){
		if(prev==null){
			return false;
		}
		while(prev.nodeType==3&&!prev.nodeValue.replace(/^\s*|\s*$/g,"")||prev.nodeType==8){
			prev=prev.previousSibling
		}

	}
	return prev;
}


//封装insertBefore
function insertBefore(newObj,beforeObj){
	
	var parent=beforeObj.parentNode;
	parent.insertBefore(newObj,beforeObj)

}


function insertAfter(newObj,beforeObj){
	var next=getNext(beforeObj,"yes")
	var parent=beforeObj.parentNode;
	if(next){
		parent.insertBefore(newObj,next)
	}else{
		parent.appendChild(newObj)
	}
}



// 事件绑定
function addEvent(obj,event,fun){
	if(obj.addEventListener){
		// 绑定在obj身上的是funEvent;
		obj.addEventListener(event,funEvent,false);
	}else{
		// 绑定在obj身上的是funEvent;
		obj.attachEvent("on"+event,funEvent);
	
	}
	return funEvent;
	function funEvent(e){
		// 兼容事件对象
		var ev=e||window.event;
		// 改变this指针，并且传递事件对象
		fun.call(obj,ev)
	}
}

function removeEvent(obj,event,fun){
	if(obj.addEventListener){
		obj.removeEventListener(event,fun,false)
	}else{
		obj.detachEvent("on"+event,fun)
	}
}


// 滚轮事件
function mousewheel(obj,upFun,downFun){
	if(obj.attachEvent){
		obj.attachEvent("onmousewheel",fun);
	}else{
		obj.addEventListener("mousewheel",fun,false);
		obj.addEventListener("DOMMouseScroll",fun,false);

	}
	function fun(e){
		var ev=e||window.event;
		var num=ev.wheelDelta||ev.detail
		if (num==120||num==-3){
			upFun.call(obj);
		}else if(num==-120||num==3){
			downFun.call(obj);
		}
	}

}


//轮播
function floor(){

			var boxb=$(".yy-left");
			console.log(boxb)
			for(var i=0;i<boxb.length;i++){
				luobobo(i);
			}
		}
		function luobobo(i){
			var imgbox=$(".imgbox")[i];
			var imgboxli=$(".oneli",$(".imgbox")[i]);
			var lunbodian=$(".lunbodian")[i];
			var lunbodianli=$("li",$(".lunbodian")[i]);
			var leftglt=$(".glt")[i];
			var rightggt=$(".ggt")[i];
			var width=parseInt(getStyle(imgboxli[0],"width"));
			var num=0;
			var a=setInterval(momu,5000);
			function momu(){
				num++;
				if(num>lunbodianli.length-1){
					num=0;
				}
				for(var i =0;i<lunbodianli.length;i++){
					lunbodianli[i].className="";
				}
				lunbodianli[num].className="one";
				animate(imgbox,{left:-width*num},500);
			}
			imgbox.onmouseover=function(){
				clearInterval(a);
				// console.log(1);
			}
			imgbox.onmouseout=function(){
				a=setInterval(momu,5000);
			}
			rightggt.onclick=function(){
				momu();
			}
			leftglt.onclick=function(){
				num--;
				if(num<0){
					num=lunbodianli.length-1;
				}
				for(var i =0;i<lunbodianli.length;i++){
					lunbodianli[i].className="";
				}
				lunbodianli[num].className="one";
				animate(imgbox,{left:-width*num},500);
			}
			for(var j =0;j<lunbodianli.length;j++){
				lunbodianli[j].aa=j;
				lunbodianli[j].onclick=function(){
					for(var i =0;i<lunbodianli.length;i++){
						lunbodianli[i].className="";
						this.className="one";
						animate(imgbox,{left:-width*this.aa},500);
						num=this.aa;
					}
				}
			}
		}
		floor();



//15.hover
//判断某个元素是否包含有另外一个元素
 function contains (parent,child) {
  if(parent.contains){
     return parent.contains(child) && parent!=child;
  }else{
    return (parent.compareDocumentPosition(child)===20);
  }
 }

//判断鼠标是否真正的从外部移入，或者是真正的移出到外部；
  function checkHover (e,target) {
   if(getEvent(e).type=="mouseover"){
      return !contains(target,getEvent(e).relatedTarget || getEvent(e).fromElement)&&
    !((getEvent(e).relatedTarget || getEvent(e).fromElement)===target)
   }else{
    return !contains(target,getEvent(e).relatedTarget || getEvent(e).toElement)&&
    !((getEvent(e).relatedTarget || getEvent(e).toElement)===target)
    }
  }
//鼠标移入移出事件
/*
  obj   要操作的对象
  overfun   鼠标移入需要处理的函数
  outfun     鼠标移除需要处理的函数
*/
function hover (obj,overfun,outfun) {
    if(overfun){
      obj.onmouseover=function  (e) {
        if(checkHover(e,obj)){
           overfun.call(obj,[e]);
        }
      }
    }
    if(outfun){
      obj.onmouseout=function  (e) {
        if(checkHover(e,obj)){
           outfun.call(obj,[e]);
        }
      }
    }
}
 function getEvent (e) {
      return e||window.event;
 }
/********************************/
