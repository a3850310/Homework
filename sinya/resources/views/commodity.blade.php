<html>
    <head>
        <title>App Name -</title>
        <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
        <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    <body>
        <div class="center">
            <div class="left">
                <div class="search_box">
                    @foreach($type as $item)
                        <div class="form-check">
                            @if (in_array($item->BrandName,$brand))
                                <input class="form-check-input" type="checkbox" value="{{$item->BrandName}}" id="Check_{{$item->BrandName}}" checked/>
                                <label class="form-check-label" for="Check_{{$item->BrandName}}">{{$item->BrandName}}</label>
                            @else
                                <input class="form-check-input" type="checkbox" value="{{$item->BrandName}}" id="Check_{{$item->BrandName}}" />
                                <label class="form-check-label" for="Check_{{$item->BrandName}}">{{$item->BrandName}}</label>
                            @endif
                        </div>
                    @endforeach
                    <div class="form-group">
                        <label for="InputMinPrice">最低價錢</label>
                        <input type="number" class="form-control" id="InputMinPrice" placeholder="Enter price" value="{{$min_price}}">
                    </div>
                    ~
                    <div class="form-group">
                        <label for="InputMaxPrice">最高價錢</label>
                        <input type="number" class="form-control" id="InputMaxPrice" placeholder="Enter price" value="{{$max_price}}">
                    </div>
                    <button type="button" onclick="snedSearch()" class="btn btn-outline-primary">送出</button>
                </div>
            </div>
            <div class="right">
                <div class="website">
                    <div class="commodity_box">
                        @foreach ($commodity as $item)
                            <div class="commodity">
                                <div class="commodity_image">
                                    <image src="{{ asset('Images/Image3.jpg') }}" width="299"></image>.
                                </div>
                                <div class="commodity_text" title="{{$item->CommodityName}}">
                                    {{$item->CommodityName}}
                                </div>
                                <div class="commodity_price">
                                    <span style="color:red">{{$item->CommodityRealPrice}}</span> /  <span style="text-decoration:line-through">{{$item->CommodityPrice}}</span>
                                </div>
                                <button type="button" class="btn btn-primary">加入購物車</button>
                            </div>
                        @endforeach
                    </div>
                    <div class="page_box">
                        <div class="page">
                            <ul class = "pagination" > 
                            <li onclick="changePage('back',{{$page}},{{$total}})"><a href = " # " > &laquo; </a></li> 
                            @for ($i = 1; $i <= $total; $i++)
                                @if ($page == $i)
                                    <li onclick="goToPage({{$i}},{{$page}},{{$total}})"><a href = "#" style="color: rgb(255, 9, 9)"> {{$i}} </a></li> 
                                @else
                                    <li onclick="goToPage({{$i}},{{$page}},{{$total}})"><a href = "#" > {{$i}} </a></li> 
                                @endif
                            @endfor
                            <li onclick="changePage('next',{{$page}},{{$total}})"><a href = " # " > &raquo; </a></li> 
                            </ul> 
                        </div>  
                    </div>
                </div>
            <div class="right">
        </div>
    </body>

<style lang="css">
    .center{
        display: flex;
        flex-direction:row;
    }
    .left{
        display: flex;
    }
    .search_box{
        width: 100%;
        min-width: 200px;
        height: 500px;

    }
    .right{
        display: flex;
    }
    .website{
        margin: 5px
    }
    .commodity_box{
        /* position: relative; */
        margin: auto;
        /* background: rgb(201, 201, 201); */
        display: flex;
        flex-wrap: wrap;
        max-width: 1369px;
        min-width: 1355px;
        width:100%;
        height: 800px;
    }
    .commodity{
        /* position: absolute; */
        /* background: rgb(110, 49, 49); */
        border: 1px grey solid;

        margin: 5px;
        width: 320px;
        height: 388px;
        display: flex;
        flex-direction: column;
    }
    .commodity_image{
        /* border: 1px red solid; */
        margin: 5px;
        width: 300px;
        height: 250px;
        margin: 0px auto;
    }
    .commodity_text{
        /* border: 1px grey solid; */
        width: 300px;
        height: 55px;
        margin: 3px auto;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }
    .commodity_price{
        /* border: 1px grey solid; */
        width: 300px;
        height: 27;
        margin: 0px auto;
    }
    .btn-primary{
        margin: auto;
    }
    .page_box{
        display:flex;
        margin: 0 auto;
        flex-direction: column;
    }
    .page{
        display:flex;

    }
</style>
<script type="text/javascript">
    //去到前一頁或下一頁
    function changePage(type,page,total)
    {
        let number;
        let param = this.getParam();
        let brand = param.brand;
        let min_price = param.min_price;
        let max_price = param.max_price;

        if (type === "next"){
            number = page+1;
            if (number <= total) {
                window.location.href = "/info/"+number+"?brand="+brand+"&min_price="+min_price+"&max_price="+max_price;
            }
        } else if(type === "back"){
            number = page-1;
            if (number > 0) {
                window.location.href = "/info/"+number+"?brand="+brand+"&min_price="+min_price+"&max_price="+max_price;
            }
        }
    }

    //去到指定頁數
    function goToPage(i,page,total)
    {
        let param = this.getParam();
        let brand = param.brand;
        let min_price = param.min_price;
        let max_price = param.max_price;

        window.location.href = "/info/"+i+"?brand="+brand+"&min_price="+min_price+"&max_price="+max_price;
    }

    //搜尋送出
    function snedSearch()
    {
        let json = {};
        let i = 1;
        let check_input = $(".form-check-input");
        let min_price = $("#InputMinPrice")[0].value;
        let max_price = $("#InputMaxPrice")[0].value;
        for (let checkbox of check_input){
            if (checkbox.checked==true) {
                json[i] = checkbox.value;
                i++;
            }
        }

        let status =  this.verification();
        if (status) {
            window.location.href = "/info/1?brand="+JSON.stringify(json)+"&min_price="+min_price+"&max_price="+max_price;            
        } else {
            alert("請同時輸入最大值和最小值~!!");
        }
    }

    //獲取當前url參數
    function getParam()
    {
        const href = window.location.href;
        var url = new URL(href);
        let brand = url.searchParams.get("brand");
        let min_price = url.searchParams.get("min_price");
        let max_price = url.searchParams.get("max_price");

        if (!url.searchParams.has('brand')) {
            brand = {};
        }
        if (!url.searchParams.has('min_price')) {
            min_price = "";
        }if (!url.searchParams.has('max_price')) {
            max_price = "";
        }

        return {'brand':brand,'min_price':min_price,'max_price':max_price};
    }

    //金額的防呆
    function verification()
    {
        let status = true;
        let min_price = $("#InputMinPrice")[0].value;
        let max_price = $("#InputMaxPrice")[0].value;

        if ((min_price == ""&&max_price != "") || (min_price != ""&&max_price == "")) {
            status = false;
        }

        return status;
    }
</script>
</html>
