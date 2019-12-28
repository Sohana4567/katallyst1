<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2 style="center">Course List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
                            <th width="10%">No</th>
						    <th width="10%">Image</th>
							<th width="10%">course_title</th>
							<th width="10%">course_description</th>
                            </tr>
					</thead>
                    <tbody>
					<?php
                      $query="SELECT * FROM `tbl_course`";
                      $course=$db->select($query);
                      if($course){
                           $i=0;
                          while($result=$course->fetch_assoc()){
                            $i++;
                      ?>
                       <tr class="odd gradeX">
							<td ><?php echo $i; ?></td>
                            <td><img src="<?php echo $result['image'];?>" height="90"/></td>
                            <td><a href="courselist.php?courseid=<?php echo $result['course_id'];?>"><?php echo $result['course_title']; ?></a></td>
                            <td><?php echo  $fm->textShorten($result['course_description']);?></td>
                            </tr>
						   <?php } } ?>	
					</tbody>
				</table>
	
               </div>
            </div>
		</div>
		<script type="text/javascript">
			$(document).ready(function () {
				setupLeftMenu();
				$('.datatable').dataTable();
				setSidebarHeight();
			});
		</script>