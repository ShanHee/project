$(function(){
    $.ajax({
        url:"../data/cart/list.php",
        type:"get",
        dataType:"json",
        success:function(data){
            var result=data.data;
            console.log(result);

            var mname=[];
           for(var p of result){
               mname.push(p.mname);
           }
            //console.log(repeat(mname));
            var repname=repeat(mname);
            console.log(repname);
            var hash={},data={};
            for(var j=0;j<repname.length;j++){
                //hash[repname[j]]=null;
                for(var i=0;i<result.length;i++){
                    if(result[i].mname=repname[j]){
                        hash.filed[i]=result[i];
                    }
                }
            }
            // console.log(repname[j].push(result[i]))
            console.log(hash)


            // if(data.code==200){
            //     var headHtml=`
            // <div style="line-height:45px;padding-left:30px;background-color:#188eee;color:#fff;font-size:24px;">
            //     店铺:${res[0].name} <a style="font-size:14px;color:#fff;" href="#"><i class="fa fa-user"></i>联系卖家</a>
            // </div>
            // <div style="height: 35px; line-height: 35px; border-bottom-color: rgb(204, 204, 204);
            //     border-bottom-width: 1px; border-bottom-style: solid;">
            //
            //
            //     <ul>
            //         <li style="width: 100px;"><b>商品图片</b></li>
            //         <li style="width: 130px;"><b>商品编号</b></li>
            //         <li style="width: 200px;"><b>商品名称</b></li>
            //
            //         <li style="width: 100px;"><b>价格(元)</b></li>
            //
            //         <li style="width: 100px;"><b>数量</b></li>
            //         <li style="width: 100px;"><b>操作</b></li>
            //     </ul>
            // </div>
            //     `;
            //     var html="";
            //     for(var p of res){
            //         html+=`
            //
            // <div class="cart_prolist">
            //
            //     <ul>
            //         <li style="width: 100px;clear:both;"><a href="#" target="_blank">
            //             <img style="margin-top: 5px;"
            //                  src="/meal/upload/temp/4bed2e738bd4b31c1422d93e80d6277f9e2ff81d.jpg" width="60"
            //                  height="60"></a></li>
            //         <li style="width: 130px;">
            //             <input id="itemid" name="itemid" value="079725" type="hidden">
            //             <a href="shangpindetails.jsp?id=0" target="_blank">SP0001</a>
            //         </li>
            //         <li style="width: 200px;height:60px;overflow:hidden;">海鲜</li>
            //
            //
            //         <li style="width: 100px;">15.0元</li>
            //
            //         <li style="width: 120px;">
            //             <span id="spSP0001Shuliang"> 1</span>
            //             <span style="display:none;" id="spSP0001Edit"> <input id="txtSP0001Shuliang" type="text"
            //                                                                   value="1" style="width:20px"/> </span>
            //         </li>
            //
            //         <li style="width: 100px;">
            //
            //             <a spid="1" spno="SP0001" class="modifyShuliang" href="#">
            //                 修改数量
            //             </a>
            //             <a href="/meal/admin/dingdanmanager.do?actiontype=removeShangpin&forwardurl=/e/shopcart.jsp&spid=1">移除</a>
            //         </li>
            //
            //     </ul>
            //
            //
            //     <div style="height: 1px; line-height: 1px; clear: both;">
            //     </div>
            //
            // </div>
            //         `;
            //         $("#cartList").html(headHtml+html);
            //     }
            // }
        },
        error:function(){


        }
        
    })
    function repeat(arr){
        var hash={};res=[];
        for(var i=0;i<arr.length;i++){
            if(hash[arr[i]]===undefined)
            {
                hash[arr[i]]=true;
                res.push(arr[i]);
            }
        }
        return res;
    }
});