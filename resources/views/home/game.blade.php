<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>JavaScript实例</title>
        <style>
            #did{width:500px;height:500px;position:relative;background:url("{{asset('imgs/game/bg2.png')}}") no-repeat 0px -1036px;overflow:hidden;}
            #gid{position:absolute; top:300px;left:150px;}
            #pd1,#pd2,#pd3,#pd4,#pd5{position:absolute;display:none;width:3px;height:17px;}
            #d1,#d2,#d3,#bm{position:absolute;display:none;}
        
        </style>
    </head>
    <body>
        <h2 id="hid">微游戏</h2>
        <div id="did">
            
            <img id="pd1" src="{{asset('imgs/game/pd.png')}}"/>
            <img id="pd2" src="{{asset('imgs/game/pd.png')}}"/>
            <img id="pd3" src="{{asset('imgs/game/pd.png')}}"/>
            <img id="pd4" src="{{asset('imgs/game/pd.png')}}"/>
            <img id="pd5" src="{{asset('imgs/game/pd.png')}}"/>
            
            <img id="d1" src="{{asset('imgs/game/e0.png')}}"/>
            <img id="d2" src="{{asset('imgs/game/e1.png')}}"/>
            <img id="d3" src="{{asset('imgs/game/e2.png')}}"/>
            
            <img id="bm"  src="{{asset('imgs/game/boom.gif')}}"/>
            
            <img id="gid" src="{{asset('imgs/game/me.png')}}"/>
            
        </div>
        <script  type="text/javascript">
           //获取gid
           var gid = document.getElementById("gid");
           var bm =  document.getElementById("bm"); 
           var b=0;
           //为当前页面添加键盘事件
           window.document.onkeydown = function(ent){
                //获取兼容的事件对象
                var event = ent || window.event;
                
                //获取键盘值
                //alert(event.keyCode);
                //空格32 左37 上38  右39 下40  回车13
                //根据键盘值执行对应的动作反应
                switch(event.keyCode){
                    case 37: //左移动
                        gid.style.left = Math.max(0,gid.offsetLeft-10)+"px";
                        break;
                    case 38: //上移动
                        gid.style.top = Math.max(0,gid.offsetTop-10)+"px";
                        break;
                    case 39: //右移动
                        gid.style.left = Math.min(460,gid.offsetLeft+10)+"px";
                        break;
                    case 40: //下移动
                        gid.style.top = Math.min(460,gid.offsetTop+10)+"px";
                        break;
                        
                    case 32: //发送炮弹
                        fire(gid.offsetTop,gid.offsetLeft+53);
                        break;
                }
           }
           
           //发射炮弹的函数
           function fire(top,left){
                //遍历找出没有使用炮弹发射
                for(var i=1;i<6;i++){
                    var pd = document.getElementById("pd"+i);
                    //判断是否可用
                    if(pd.style.display!="block"){
                        pd.style.top = top+"px";
                        pd.style.left = left+"px";
                        pd.style.display = "block";
                        return;
                    }
                }
           }
           
           //游戏主线程
           function running(){
                //1.负责移动可见的炮弹
                for(var i=1;i<6;i++){
                    var pd = document.getElementById("pd"+i);
                    if(pd.style.display=="block"){
                        pd.style.top = (pd.offsetTop-5)+"px";
                        //判断检测是否碰撞
                        if(doCheck(pd)){
                           bm.style.top = pd.offsetTop+100+"px";
                           bm.style.left = pd.offsetLeft+100+"px";
                           bm.style.display = "block";
                           b=0;
                        }
                        //回收炮弹
                        if(pd.offsetTop<-17){
                            pd.style.display="none";
                        }
                    }
                }
                
                //2. 随机放敌机进来
                if(Math.round(Math.random()*100000)%30==20){
                    show();
                }
                //3. 负责敌机移动
                for(var i=1;i<4;i++){
                    var dj = document.getElementById("d"+i);
                    if(dj.style.display=="block"){
                        dj.style.top = (dj.offsetTop+3)+"px";
                        //回收敌机
                        if(dj.offsetTop>500){
                            dj.style.display="none";
                        }
                    }
                }
                
                //4. 负责绘制爆炸
                if(b<5){
                    b++;
                }else{
                    bm.style.display = "none";
                }
                    
                setTimeout("running()",33);
           }
           
           //碰撞检测
           function doCheck(pd){
                //遍历可见的敌机
                for(var i=1;i<4;i++){
                    var dj = document.getElementById("d"+i);
                    if(dj.style.display=="block"){ 
                        //获取炮弹的位置
                        var x = pd.offsetLeft+1;
                        var y = pd.offsetTop;
                        var x1 = dj.offsetLeft+8;
                        var x2 = dj.offsetLeft+98;
                        var y1 = dj.offsetTop+40;
                        var y2 = dj.offsetTop+60;
                        //判断
                        if(x>x1 && x<x2 && y>y1 && y<y2){
                            pd.style.display="none";
                            dj.style.display="none";
                            return true;
                        }
                    }
                }
                return false;
           }
           
           //负责随机一个敌机
           function show(){
                //遍历所有敌机
                for(var i=1;i<4;i++){
                    var dj = document.getElementById("d"+i);
                    if(dj.style.display!="block"){
                        dj.style.top = -100+"px";
                        dj.style.left= (Math.round(Math.random()*100000)%450)+"px";
                        dj.style.display = "block";
                        return;
                    }
                }
            }
           
           //负责滚动背景图片
           var did = document.getElementById("did");
           var m=-1036;
           setInterval(function(){
                m+=2;
                if(m>-268){
                    m=-1036;
                }
                did.style.backgroundPosition = "0px "+m+"px";
           },30);
           
           running();
        </script>
    </body>
</html>