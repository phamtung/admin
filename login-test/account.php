<script type="text/javascript" language="Javascript">
    function del(){
        return confirm("Bạn có muốn xóa tài khoản này không ???");  
    }
</script>
<div id="content">
    <table border="1" cellpadding="0" cellspacing="0" width="80%">
            <tr>
                <td width="5%">ID</td>
                <td width="25%">Tên tài khoản</td>
                <td width="20%">Mật khẩu</td>
                <td width="30%">Địa chỉ</td>
                <td width="5%">Sửa</td>
                <td width="5%">Xóa</td>
            </tr>
            <?php
            $Pagination = new pagination();
            $Pagination->totalRow('user');
            $Pagination->totalPage(5);
            $page = $Pagination->page();
            $firstRow = $Pagination->firstRow($page,5);

            $User = new user();
            $sql = "SELECT * FROM user ORDER BY user_id DESC LIMIT ".$firstRow.",5"; 
            $User->query($sql);
    		while($row = $User->fetch()){
    		?>
            <tr>
                <td><?php echo $row['user_id'] ?></td>
                <td><?php echo $row['user_name']?></td>
                <td><?php echo $row['password']?></td>
                <td><?php echo $row['address']?></td>
                <td><a href="admin.php?page_layout=user-edit&user_id=<?php echo $row['user_id'] ?>"><span>Sửa</span></a></td>
                <td><a onclick= "return del();" href="admin.php?page_layout=user-del&user_id=<?php echo $row['user_id'] ?>"><span>Xóa</span></a></</td>
            </tr>
            <?php
    		}
    		?>
    </table>
    <div class="page">
        <?php
            for ( $page = 0; $page <= ($Pagination->totalPage(5) - 1); $page++ ){
                if($page == $_GET['page']){
                    echo '<span>'.($page+1).'</span>';
                }
                else{
                    echo "<a href='admin.php?page_layout=account&page=".$page."'>".($page+1)."</a>";
                }
            }
        ?>
    </div>
</div>