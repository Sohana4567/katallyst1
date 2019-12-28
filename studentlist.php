<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2 style="center">Student List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
                            <th width="10%">No</th>
						    <th width="10%">Student Name</th>
							<th width="10%">Student Description</th>
						
                            </tr>
					</thead>
                    <tbody>
					<?php
                      $query="SELECT * FROM `tbl_student`";
                      $student=$db->select($query);
                      if($student){
                           $i=0;
                          while($result=$student->fetch_assoc()){
                            $i++;
                      ?>
                       <tr class="odd gradeX">
							<td ><?php echo $i; ?></td>
                            <td><a href="studentlist.php?studentid=<?php echo $result['student_id'];?>"><?php echo $result['student_name']; ?></a></td>
                            <td><?php echo  $fm->textShorten($result['student_description']);?></td>
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