<?php
require("top.inc.php");

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update categories set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
    
    if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from categories where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select sub_categories.*,categories.categories from sub_categories,categories where categories.id=sub_categories.categories_id order by sub_categories.sub_categories asc";
$res=mysqli_query($con,$sql);
?>
<div class="detailsCategory">
            <div class="recentCategory">
                <div class="card-header">
                    <h2>Sub Categories </h2>
                    <a href="manage_sub_categories.php" class="catBtn">Add Sub Categories</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td class="serial">#</td>
                            <td>ID</td>
                            <td>Categories</td>
                            <td>Sub Categories</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i=1;
                        while($row=mysqli_fetch_assoc($res)){?>
                        <tr>
                            <td class="serial"><?php echo $i?></td>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['categories']?></td>
                            <td><?php echo $row['sub_categories']?></td>
                            <td class="statusButtons">  
                            <?php
                            if ($row['status']==1) {
                                echo "<a href='?type=status&operation=deactive&id=".$row['id']."' class='status activeBtn' >Active</a>&nbsp;";}
                            else{
                                echo "<a href='?type=status&operation=active&id=".$row['id']."' class='status deactiveBtn'>Deactive</a>&nbsp;";
                            }
                            echo "<a href='manage_sub_categories.php?id=".$row['id']."' class='status editBtn'>Edit</a></span>&nbsp;";
                            echo "<a href='?type=delete&id=".$row['id']."'class='status deleteBtn'>Delete</a></span>";
                            $i=$i+1;
                            ?>
                            </td>
                        </tr>
                        <?php } ?>

                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
require("footer.inc.php");
?>