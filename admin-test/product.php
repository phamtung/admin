<script type="text/javascript" language="Javascript">
    function del(){
        return confirm("Bạn có muốn xóa sản phẩm này không ???");  
    }
</script>
<?php
include_once('prod.php');
?>
<div id = "product">
    <p><a href="admin.php?page_layout=prod-add"><input type="button" value="Thêm sản phẩm"></a><p>
    <table border="1" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td width="5%">ID</td>
            <td width="30%">Tên sản phẩm</td>
            <td width="15%">Giá sản phẩm</td>
            <td width="10%">Ảnh sản phẩm</td>
            <td width="30%">Chi tiết</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>
        <?php
            $Pagination = new pagination();
            $Pagination->totalRow('product');
            $Pagination->totalPage(3);
            $page = $Pagination->page();
            $firstRow = $Pagination->firstRow($page,3);

            $Prod = new prod();
            $sql = "SELECT * FROM product ORDER BY product_id DESC LIMIT ".$firstRow.",3";
            $Prod->query($sql);
    		while($row = $Prod->fetch()){
    	?>
        <tr>
            <td><?php echo $row['product_id'] ?></td>
            <td><?php echo $row['product_name']?></td>
            <td><?php echo $row['product_price']?></td>
            <td><img width="100%" src="themes/images/<?php echo $row['product_image']?>"></td>
            <td><?php echo $row['product_detail']?></td>
            <td><a href="admin.php?page_layout=prod-edit&product_id=<?php echo $row['product_id'] ?>"><span>Sửa</span></a></td>
            <td><a onclick= "return del();" href="admin.php?page_layout=prod-del&product_id=<?php echo $row['product_id'] ?>"><span>Xóa</span></a></</td>
        </tr>
        <?php
    		}
		?>
    </table>
    <div class="page">
        <?php
            for ( $page = 0; $page <= ($Pagination->totalPage(3) - 1); $page++ ){
                if($page == $_GET['page']){
                    echo '<span>'.($page+1).'</span>';
                }
                else{
                    echo "<a href='admin.php?page_layout=product&page=".$page."'>".($page+1)."</a>";
                }
            }
        ?>
    </div>
</div>