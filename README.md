# php 拍賣網站
## 第一步
    去route\web.php找到info/{page}這支route進入controller
## 第二步
    App\Http\Controllers\Commodity\CommodityController.php找getInfo這支function
    *以下為function所做的事情*
- 42行前面為接取request
- 44~46行獲取所有廠牌
- 49行去到CommodityRepository獲取商品資訊的 builder
- 51行計算商品總數算取總頁數 (get builder並加總)
- 53行獲取商品資訊的結果，並對剛剛獲取的商品資訊的 builder做分頁(一頁8筆)
- 最後將結果丟到前端 
## 第三步
    去到視圖resources\views\commodity.blade.php(運用laravel內建php語法 和 js組成)
    
  
