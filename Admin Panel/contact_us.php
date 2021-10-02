<?php
require("top.inc.php");
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from contact_us where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from contact_us order by id desc";
$res=mysqli_query($con,$sql);
?>
<div class="detailsCategory">
            <div class="recentCategory">
                <div class="card-header">
                    <h2>Contact Us </h2>
                   
                </div>
                <table>
                    <thead>
                        <tr>
                            <td class="serial">#</td>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Mobile</td>
                            <td>Query</td>
                            <td>Date</td>
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
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['mobile']?></td>
                            <td><?php echo $row['comment']?></td>
                            <td><?php echo $row['added_on']?></td>
                            <td class="statusButtons">  
                            <?php
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