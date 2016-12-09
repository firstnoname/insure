<?php
if(isset($_POST['page'])){
    //Include pagination class file
    include('Pagination.php');
    
    //Include database configuration file
    require_once 'init_inc.php';
	$db=new DB;
    
    $start = !empty($_POST['page'])?$_POST['page']:0;
    $limit = 3;
    
    //get number of rows
   // $queryNum = $db->query("SELECT COUNT(*) as postNum FROM posts");
   // $resultNum = $queryNum->fetch_assoc();
    $rowCount =1;
    
    //initialize pagination class
    $pagConfig = array('baseURL'=>'getchcampaignData.php', 'totalRows'=>$rowCount, 'currentPage'=>$start, 'perPage'=>$limit, 'contentDiv'=>'posts_content');
    $pagination =  new Pagination($pagConfig);
    
    //get rows
	$sql="SELECT
														insurance_customer_activity.vehicle_id,
														insurance_customer_activity.track_last_status,
														insurance_customer_activity.activity_Date,
														insurance_customer_activity.activity_IsClose,
														insurance_activity.activity_name,
														insurance_emp_view.emp_be,
														insurance_emp_view.emp_name,
														insurance_emp_view.empsurname
														FROM
														insurance_customer_activity
														INNER JOIN insurance_emp_view ON insurance_emp_view.id_card = insurance_customer_activity.emp_id_card
														INNER JOIN insurance_activity ON insurance_activity.id = insurance_customer_activity.activity_id
														 ";
															$sql.=" WHERE vehicle_id='$vehicle_id' AND ";
															$sql.=" activity_id='$act_id'  ORDER BY id DESC LIMIT $start,$limit";
	
    $query = mysqli_query($db->con,$sql);
    
    if($query->num_rows > 0){ ?>
        <div class="posts_list">
        <?php
            while($row = $query->fetch_assoc()){ 
                $postID = $row['vehicle_id'];
        ?>
            <div class="list_item"><a href="javascript:void(0);"><h2><?php echo $row["activity_name"]; ?></h2></a></div>
        <?php } ?>
        </div>
        <?php echo $pagination->createLinks(); ?>
<?php }
}
?>