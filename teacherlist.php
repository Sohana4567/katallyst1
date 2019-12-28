<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2 style="center">Teacher List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
                            <th width="10%">No</th>
						    <th width="10%">Teacher Name</th>
							<th width="10%">Teacher Description</th>
						
                            </tr>
					</thead>
                    <tbody>
					<?php
                      $query="SELECT * FROM `tbl_teacher`";
                      $teacher=$db->select($query);
                      if($teacher){
                           $i=0;
                          while($result=$teacher->fetch_assoc()){
                            $i++;
                      ?>
                       <tr class="odd gradeX">
							<td ><?php echo $i; ?></td>
                            <td><a href="teacherlist.php?teacherid=<?php echo $result['teacher_id'];?>"><?php echo $result['teacher_name']; ?></a></td>
                            <td><?php echo  $fm->textShorten($result['teacher_description']);?></td>
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